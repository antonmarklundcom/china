<?php
/**
 * The quote wizard on /cotizar/. Posts to /enviar.php with the same contract
 * as partials/lead-form.php (same hidden fields, same honeypot, same
 * thank-you), so the CRM cannot tell the two apart except by form_id.
 *
 * Progressive enhancement:
 *   - Without JS it is ONE ordinary form: all three steps visible, the need as
 *     radio cards, the details as a single `message` box (enviar.php forwards
 *     `message` and no other free field), then the contact fields. enviar.php
 *     answers with a redirect to /contacto/?enviado=1&s=<slug>.
 *   - assets/js/quote-wizard.js turns it into three steps, swaps the single
 *     box for the per-need questions in $quoteCopy['details'], and composes
 *     those answers into a labelled multi-line `message` before posting.
 *     Everything that only makes sense with JS is rendered `hidden` here and
 *     revealed by the script; everything that only makes sense without it
 *     carries data-qz-static and is hidden by the script.
 *
 * Variables the caller sets:
 *   $quoteCopy     array   the 'quote' key of the '/cotizar/' page record
 *   $quoteNeed     string  pre-selected need key, or ''
 *   $quoteService  string  a validated lead-values slug, or ''
 *
 * The detail inputs are named q_<need>_<field>: they never collide with the
 * contract's own names (name, phone, …) and enviar.php ignores them.
 */

declare(strict_types=1);

/** @var array $quoteCopy */
$quoteNeed    = $quoteNeed ?? '';
$quoteService = $quoteService ?? '';
$qzNeeds      = content('ui')['needs'];
$qzSteps      = $quoteCopy['steps'];
$qzTotal      = count($qzSteps);

/* The lead record behind the current pre-selection: the service when the link
   named one, else the chip, else the neutral default. It decides the tier the
   page starts with and the thank-you rendered (hidden) below. */
$qzLead = $quoteService !== ''
    ? lead_value($quoteService)
    : lead_value_for_need($quoteNeed !== '' ? $quoteNeed : 'otro');

/* Per need: the service, tier and WhatsApp prefill that answer maps to. The
   link's service wins for its own need only. */
$qzRouting = [];
foreach (array_keys($qzNeeds) as $qzKey) {
    $qzRecord = ($quoteService !== '' && $qzLead['need'] === $qzKey)
        ? $qzLead
        : lead_value_for_need($qzKey);
    $qzRouting[$qzKey] = [
        'service' => $quoteService !== '' && $qzLead['need'] === $qzKey ? $quoteService : '',
        'tier'    => (string) $qzRecord['tier'],
        'wa'      => whatsapp_link($qzRecord['whatsappText']) ?? '',
    ];
}

$qzWhatsapp    = whatsapp_link($qzLead['whatsappText']);
$qzIdempotency = bin2hex(random_bytes(16));
$qzUtmKeys     = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'gclid', 'fbclid'];

/* Simple line icons, 24px grid, drawn for this page. */
$qzIcons = [
    'compras'  => '<path d="M5.5 8h13l-1.1 12.1a1 1 0 0 1-1 .9H7.6a1 1 0 0 1-1-.9L5.5 8Z"/><path d="M9 10V7a3 3 0 0 1 6 0v3"/>',
    'importar' => '<path d="M12 2.8 20.2 7v10L12 21.2 3.8 17V7L12 2.8Z"/><path d="M3.8 7 12 11.3 20.2 7M12 11.3v9.9"/><path d="m7.9 4.9 8.2 4.3"/>',
    'aduana'   => '<path d="M14 3H7a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V7l-4-4Z"/><path d="M14 3v4h4"/><path d="m9.2 14.2 2 2 3.8-4.2"/>',
    'viajes'   => '<path d="M17.8 19.2 16 11l3.5-3.5c1.2-1.2 1.6-3 .9-3.9-.9-.7-2.7-.3-3.9.9L13 8 4.8 6.2c-.5-.1-.9.1-1.1.5l-.3.5c-.2.5-.1 1 .3 1.3L9 12l-2 3H4l-1 1 3 2 2 3 1-1v-3l3-2 3.5 5.3c.3.4.8.5 1.3.3l.5-.2c.4-.3.6-.7.5-1.2Z"/>',
    'otro'     => '<circle cx="12" cy="12" r="9"/><path d="M9.5 9.5a2.5 2.5 0 1 1 3.5 2.3c-.6.3-1 .9-1 1.6v.6M12 17h.01"/>',
];
$qzIcon = static fn (string $body, string $class = 'qz-icon'): string =>
    '<svg class="' . $class . '" viewBox="0 0 24 24" aria-hidden="true" focusable="false" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">' . $body . '</svg>';
?>
<div class="qz-layout">

  <div class="qz-card">
    <form class="qz" action="/enviar.php" method="post" data-quote-wizard
          data-total="<?= $qzTotal ?>"
          data-progress="<?= e($quoteCopy['progress']) ?>"
          data-msg-required="<?= e($quoteCopy['required']) ?>"
          data-msg-choice="<?= e($quoteCopy['required_choice']) ?>"
          data-msg-phone="<?= e($quoteCopy['invalid_phone']) ?>"
          data-msg-email="<?= e($quoteCopy['invalid_email']) ?>"
          data-msg-email-needed="<?= e($quoteCopy['email_needed']) ?>"
          data-message-title="<?= e($quoteCopy['message_title']) ?>"
          data-channel-label="<?= e($quoteCopy['channel_label']) ?>"
          data-done-title="<?= e($quoteCopy['done_title']) ?>"
          data-start-need="<?= e($quoteNeed) ?>"
          data-from-link="<?= $quoteNeed !== '' ? '1' : '0' ?>">

      <!-- Progress: revealed by the script, meaningless without it. -->
      <div class="qz-progress" data-qz-progress hidden>
        <p class="qz-progress__label">
          <span class="qz-progress__count" data-qz-count></span>
          <span class="qz-progress__title" data-qz-count-title></span>
        </p>
        <ol class="qz-progress__steps">
          <?php foreach ($qzSteps as $qzI => $qzStep): ?>
            <li class="qz-progress__step" data-qz-dot="<?= $qzI + 1 ?>">
              <span class="qz-progress__num" aria-hidden="true">
                <span class="qz-progress__digit"><?= $qzI + 1 ?></span>
                <?= $qzIcon('<path d="m5 12.5 4.2 4.2L19 7"/>', 'qz-progress__tick') ?>
              </span>
              <span class="qz-progress__name"><?= e($qzStep['short']) ?></span>
            </li>
          <?php endforeach; ?>
        </ol>
        <div class="qz-progress__bar" aria-hidden="true"><span data-qz-bar></span></div>
      </div>
      <p class="visually-hidden" aria-live="polite" data-qz-live></p>

      <div class="qz-steps" data-qz-steps>

        <!-- Step 1: the need. Real radios, so it survives without JS. -->
        <section class="qz-step" data-qz-step="1" aria-labelledby="qz-h-1">
          <header class="qz-step__head">
            <p class="qz-step__eyebrow" data-qz-static><?= e(sprintf($quoteCopy['progress'], 1, $qzTotal)) ?></p>
            <h2 class="qz-step__title" id="qz-h-1" tabindex="-1"><?= e($qzSteps[0]['title']) ?></h2>
            <p class="qz-step__hint"><?= e($qzSteps[0]['hint']) ?></p>
          </header>
          <fieldset class="qz-options">
            <legend class="visually-hidden"><?= e($qzSteps[0]['title']) ?></legend>
            <?php $qzFirst = true; foreach ($qzNeeds as $qzKey => $qzLabel): ?>
              <label class="qz-option">
                <input class="qz-option__input" type="radio" name="need" value="<?= e($qzKey) ?>"
                       data-tier="<?= e($qzRouting[$qzKey]['tier']) ?>"
                       data-service="<?= e($qzRouting[$qzKey]['service']) ?>"
                       data-wa="<?= e($qzRouting[$qzKey]['wa']) ?>"
                       <?= $qzFirst ? 'required' : '' ?>
                       <?= $quoteNeed === $qzKey ? 'checked' : '' ?>>
                <span class="qz-option__icon"><?= $qzIcon($qzIcons[$qzKey] ?? $qzIcons['otro']) ?></span>
                <span class="qz-option__text">
                  <span class="qz-option__title"><?= e($qzLabel) ?></span>
                  <?php if (!empty($quoteCopy['needs'][$qzKey])): ?>
                    <span class="qz-option__sub"><?= e($quoteCopy['needs'][$qzKey]) ?></span>
                  <?php endif; ?>
                </span>
                <span class="qz-option__check" aria-hidden="true"><?= $qzIcon('<path d="m5 12.5 4.2 4.2L19 7"/>', 'qz-option__tick') ?></span>
              </label>
            <?php $qzFirst = false; endforeach; ?>
          </fieldset>
          <p class="qz-error" data-qz-error-for="need" hidden></p>
        </section>

        <!-- Step 2: details. -->
        <section class="qz-step" data-qz-step="2" aria-labelledby="qz-h-2">
          <header class="qz-step__head">
            <p class="qz-step__eyebrow" data-qz-static><?= e(sprintf($quoteCopy['progress'], 2, $qzTotal)) ?></p>
            <h2 class="qz-step__title" id="qz-h-2" tabindex="-1"><?= e($qzSteps[1]['title']) ?></h2>
            <p class="qz-step__hint"><?= e($qzSteps[1]['hint']) ?></p>
            <p class="qz-step__picked" data-qz-picked hidden>
              <span data-qz-picked-label></span>
              <button class="qz-link" type="button" data-qz-goto="1"><?= e($quoteCopy['edit']) ?></button>
            </p>
          </header>

          <!-- Without JS: one box, because `message` is the only free field
               enviar.php forwards. -->
          <label class="field qz-field" data-qz-static>
            <span><?= e($quoteCopy['static_label']) ?></span>
            <textarea name="message" rows="4" maxlength="4500"
                      placeholder="<?= e($quoteCopy['static_hint']) ?>" data-qz-message></textarea>
          </label>

          <?php foreach ($quoteCopy['details'] as $qzKey => $qzFields): ?>
            <div class="qz-details" data-qz-details="<?= e($qzKey) ?>" hidden>
              <?php foreach ($qzFields as $qzField):
                $qzName = 'q_' . $qzKey . '_' . $qzField['name'];
                $qzReq  = !empty($qzField['required']);
              ?>
                <?php if ($qzField['type'] === 'choice'): ?>
                  <fieldset class="qz-choice" data-qz-field data-qz-label="<?= e($qzField['label']) ?>"
                            <?= $qzReq ? 'data-qz-required' : '' ?>>
                    <legend class="qz-q">
                      <?= e($qzField['question']) ?>
                      <?php if (!$qzReq): ?><span class="qz-q__opt"><?= e($quoteCopy['optional']) ?></span><?php endif; ?>
                    </legend>
                    <div class="qz-chips">
                      <?php foreach ($qzField['options'] as $qzOi => $qzOption):
                        $qzOption  = is_array($qzOption) ? $qzOption : ['label' => $qzOption];
                        $qzOptId   = $qzName . '-' . $qzOi;
                        $qzOptLead = !empty($qzOption['service']) ? lead_value($qzOption['service']) : null;
                      ?>
                        <input class="qz-chip__input" type="radio" id="<?= e($qzOptId) ?>"
                               name="<?= e($qzName) ?>" value="<?= e($qzOption['label']) ?>"
                               <?php if ($qzOptLead !== null && $qzOptLead['slug'] !== null): ?>
                                 data-service="<?= e($qzOptLead['slug']) ?>"
                                 data-tier="<?= e((string) $qzOptLead['tier']) ?>"
                                 data-wa="<?= e(whatsapp_link($qzOptLead['whatsappText']) ?? '') ?>"
                               <?php endif; ?>>
                        <label class="qz-chip" for="<?= e($qzOptId) ?>"><?= e($qzOption['label']) ?></label>
                      <?php endforeach; ?>
                    </div>
                    <p class="qz-error" data-qz-error hidden></p>
                  </fieldset>
                <?php else: ?>
                  <label class="field qz-field" data-qz-field data-qz-label="<?= e($qzField['label']) ?>"
                         <?= $qzReq ? 'data-qz-required' : '' ?>>
                    <span class="qz-q">
                      <?= e($qzField['question']) ?>
                      <?php if (!$qzReq): ?><span class="qz-q__opt"><?= e($quoteCopy['optional']) ?></span><?php endif; ?>
                    </span>
                    <input type="text" name="<?= e($qzName) ?>" maxlength="300" autocomplete="off"
                           placeholder="<?= e($qzField['placeholder'] ?? '') ?>">
                    <span class="qz-error" data-qz-error hidden></span>
                  </label>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
          <?php endforeach; ?>
        </section>

        <!-- Step 3: contact. The same names as partials/lead-form.php. -->
        <section class="qz-step" data-qz-step="3" aria-labelledby="qz-h-3">
          <header class="qz-step__head">
            <p class="qz-step__eyebrow" data-qz-static><?= e(sprintf($quoteCopy['progress'], 3, $qzTotal)) ?></p>
            <h2 class="qz-step__title" id="qz-h-3" tabindex="-1"><?= e($qzSteps[2]['title']) ?></h2>
            <p class="qz-step__hint"><?= e($qzSteps[2]['hint']) ?></p>
          </header>

          <div class="qz-grid">
            <label class="field qz-field" data-qz-field>
              <span class="qz-q"><?= e(ui('form.name')) ?></span>
              <input type="text" name="name" autocomplete="name" maxlength="200" required>
              <span class="qz-error" data-qz-error hidden></span>
            </label>
            <label class="field qz-field" data-qz-field data-qz-kind="phone">
              <span class="qz-q"><?= e(ui('form.phone')) ?></span>
              <input type="tel" name="phone" inputmode="tel" autocomplete="tel" maxlength="30"
                     placeholder="<?= e(ui('form.phone_hint')) ?>" required>
              <span class="qz-error" data-qz-error hidden></span>
            </label>
            <label class="field qz-field" data-qz-field data-qz-kind="email">
              <span class="qz-q"><?= e(ui('form.email')) ?></span>
              <input type="email" name="email" autocomplete="email" maxlength="320">
              <span class="qz-error" data-qz-error hidden></span>
            </label>
            <label class="field qz-field">
              <span class="qz-q"><?= e(ui('form.company')) ?></span>
              <input type="text" name="company" autocomplete="organization" maxlength="200">
            </label>
          </div>

          <!-- The preferred channel travels inside the composed message, so it
               only exists when the script composes one. -->
          <fieldset class="qz-choice" data-qz-enhanced hidden>
            <legend class="qz-q"><?= e($quoteCopy['channel_label']) ?></legend>
            <div class="qz-chips">
              <?php foreach ($quoteCopy['channels'] as $qzCi => $qzChannel): ?>
                <input class="qz-chip__input" type="radio" id="qz-canal-<?= $qzCi ?>" name="q_canal"
                       value="<?= e($qzChannel) ?>" <?= $qzCi === 0 ? 'checked' : '' ?>
                       <?= $qzCi === count($quoteCopy['channels']) - 1 ? 'data-qz-email-channel' : '' ?>>
                <label class="qz-chip" for="qz-canal-<?= $qzCi ?>"><?= e($qzChannel) ?></label>
              <?php endforeach; ?>
            </div>
          </fieldset>
        </section>
      </div>

      <!-- Honeypot: bots fill it, humans never see it. -->
      <div class="honeypot" aria-hidden="true">
        <label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
      </div>

      <input type="hidden" name="form_id" value="cotizar-wizard">
      <input type="hidden" name="source_page" value="/cotizar/">
      <input type="hidden" name="idempotency_key" value="<?= e($qzIdempotency) ?>">
      <!-- enviar.php re-derives the tier from service/need; value_tier is only
           what the page believed, never trusted. -->
      <input type="hidden" name="service" value="<?= e($quoteService) ?>" data-qz-service>
      <input type="hidden" name="value_tier" value="<?= e((string) $qzLead['tier']) ?>" data-qz-tier>
      <input type="hidden" name="tool_result" value="">
      <?php foreach ($qzUtmKeys as $qzUtm): ?>
        <?php if (!empty($_GET[$qzUtm]) && is_string($_GET[$qzUtm])): ?>
          <input type="hidden" name="<?= e($qzUtm) ?>" value="<?= e(substr($_GET[$qzUtm], 0, 200)) ?>">
        <?php endif; ?>
      <?php endforeach; ?>

      <p class="form-status form-status--error" data-qz-fail hidden role="alert">
        <strong><?= e(ui('form.error_title')) ?></strong>
        <?= e(ui('form.error_text')) ?>
      </p>

      <div class="qz-nav" data-qz-nav>
        <button class="qz-back" type="button" data-qz-back hidden>
          <?= $qzIcon('<path d="M19 12H5M11 6l-6 6 6 6"/>', 'qz-btn-icon') ?>
          <?= e($quoteCopy['back']) ?>
        </button>
        <button class="btn btn--primary qz-next" type="button" data-qz-next hidden>
          <?= e($quoteCopy['next']) ?>
          <?= $qzIcon('<path d="M5 12h14M13 6l6 6-6 6"/>', 'qz-btn-icon') ?>
        </button>
        <button class="btn btn--primary qz-submit" type="submit" data-qz-submit
                data-sending="<?= e($quoteCopy['sending']) ?>">
          <?= e($quoteCopy['submit']) ?>
          <?= $qzIcon('<path d="M5 12h14M13 6l6 6-6 6"/>', 'qz-btn-icon') ?>
        </button>
      </div>

      <p class="note qz-privacy">
        <?= e(ui('form.privacy_note')) ?>
        <a href="/privacidad/"><?= e(ui('nav.privacy')) ?></a>.
      </p>

      <?php
        /* The same per-service thank-you lead-form.php shows, hidden until the
           script reveals it with the copy from enviar.php's response. */
        $thanksLead   = $qzLead;
        $thanksHidden = true;
        $thanksAttrs  = 'data-qz-ok tabindex="-1"';
        require ROOT_DIR . '/partials/lead-thanks.php';
      ?>
    </form>
  </div>

  <aside class="qz-aside" aria-label="<?= e($quoteCopy['aside']['title']) ?>">
    <div class="qz-panel">
      <h2 class="qz-panel__title"><?= e($quoteCopy['aside']['title']) ?></h2>
      <ol class="qz-timeline">
        <?php foreach (content('ui')['contact']['steps'] as $qzI => $qzText): ?>
          <li><span class="qz-timeline__num" aria-hidden="true"><?= $qzI + 1 ?></span><span><?= e($qzText) ?></span></li>
        <?php endforeach; ?>
      </ol>
    </div>

    <ul class="qz-assure">
      <li>
        <?= $qzIcon('<circle cx="12" cy="12" r="9"/><path d="m8 12.3 2.7 2.7L16.2 9.5"/>') ?>
        <span><?= e($quoteCopy['aside']['free']) ?></span>
      </li>
      <li>
        <?= $qzIcon('<path d="M12 3 4.5 6v5.5c0 4.6 3.1 8.2 7.5 9.5 4.4-1.3 7.5-4.9 7.5-9.5V6L12 3Z"/><path d="M12 8v4.5M12 15.5h.01"/>') ?>
        <span><?= e($quoteCopy['aside']['official']) ?></span>
      </li>
    </ul>

    <?php if ($qzWhatsapp !== null): ?>
      <div class="qz-wa on-ink" data-service="<?= e((string) ($qzLead['slug'] ?? '')) ?>">
        <p class="qz-wa__title"><?= e($quoteCopy['aside']['whatsapp_title']) ?></p>
        <p class="qz-wa__text"><?= e($quoteCopy['aside']['whatsapp_text']) ?></p>
        <a class="btn btn--whatsapp qz-wa__btn" href="<?= e($qzWhatsapp) ?>" rel="noopener"
           data-qz-wa data-service="<?= e((string) ($qzLead['slug'] ?? '')) ?>">
          <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false" class="qz-wa__icon"><path fill="currentColor" d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2 22l5.25-1.38a9.9 9.9 0 0 0 4.79 1.22h.01c5.46 0 9.91-4.45 9.91-9.91C21.96 6.45 17.5 2 12.04 2Zm5.8 14.06c-.24.68-1.4 1.3-1.94 1.35-.5.05-.95.23-3.2-.67-2.7-1.06-4.4-3.8-4.53-3.98-.13-.18-1.08-1.44-1.08-2.75 0-1.3.68-1.95.93-2.21.24-.27.53-.33.7-.33.18 0 .35 0 .5.01.16.01.38-.06.6.46.23.55.77 1.9.84 2.03.07.14.11.3.02.48-.09.18-.13.29-.27.44-.13.16-.28.35-.4.47-.13.13-.27.28-.12.54.15.27.67 1.1 1.44 1.79.99.88 1.82 1.16 2.08 1.29.26.13.41.11.56-.07.15-.18.65-.76.82-1.02.18-.27.35-.22.59-.13.24.09 1.53.72 1.79.85.26.13.44.2.5.31.07.11.07.63-.17 1.31Z"/></svg>
          <?= e(ui('cta.whatsapp_long')) ?>
        </a>
      </div>
    <?php endif; ?>
  </aside>

</div>
<?php
/* An include shares the caller's scope (house convention). */
unset(
    $quoteCopy, $quoteNeed, $quoteService, $qzNeeds, $qzSteps, $qzTotal, $qzLead, $qzRouting,
    $qzKey, $qzRecord, $qzWhatsapp, $qzIdempotency, $qzUtmKeys, $qzUtm, $qzIcons, $qzIcon,
    $qzI, $qzStep, $qzFirst, $qzLabel, $qzFields, $qzField, $qzName, $qzReq, $qzOi, $qzOption,
    $qzOptId, $qzOptLead, $qzCi, $qzChannel, $qzText
);

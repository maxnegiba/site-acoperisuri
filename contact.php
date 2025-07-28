<?php
$page_title = "Kontakt - Dachdecker Meisterbetrieb";
$assets_path = 'assets/';
include(__DIR__ . '/includes/header.php');
include(__DIR__ . '/includes/contact-float.php');
?>

<!-- ===== HERO ===== -->
<section class="hero hero--small">
  <img src="<?= $assets_path ?>img/contact-hero.jpg" alt="Team am Dach" class="hero__bg">
  <div class="hero__overlay">
    <div class="container">
      <h1>Kontakt – Wir freuen uns auf Ihre Anfrage.</h1>
    </div>
  </div>
</section>

<!-- ===== 3 CĂI RAPIDE ===== -->
<section class="quick-contact">
  <div class="container grid-3">
    <a href="tel:+491626781242" class="quick-card">
      <i class="fas fa-phone"></i>
      <h3>Rufen Sie uns an</h3>
      <span>+49 162 678 12 42</span>
    </a>

    <a href="https://wa.me/491626781242?text=Guten%20Tag%2C%20ich%20m%C3%B6chte%20gerne%20ein%20Angebot%20f%C3%BCr%20mein%20Dach%20anfragen" target="_blank" class="quick-card">
      <i class="fab fa-whatsapp"></i>
      <h3>WhatsApp</h3>
      <span>+49 162 678 1 242</span>
    </a>

    <a href="mailto:info@hausmeistermichael-gmbh.de
" class="quick-card">
      <i class="fas fa-envelope"></i>
      <h3>E-Mail</h3>
      <span id="mail">info@hausmeistermichael-gmbh.de
</span>
    </a>
  </div>
</section>

<!-- ===== FORMULAR ===== -->
<section id="contact-form" class="form-section">
  <div class="container">
    <h2>Anfrageformular</h2>

    <form action="php/send-mail.php" method="POST" id="ajaxForm" novalidate>
      <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

      <div class="grid-2">
        <label>
          Vor- & Nachname *
          <input type="text" name="name" required>
        </label>

        <label>
          Telefon
          <input type="tel" name="phone">
        </label>

        <label>
          E-Mail
          <input type="email" name="email">
        </label>

        <label>
          Adresse des Objekts *
          <input type="text" name="address" required>
        </label>

        <label>
          Art der Dienstleistung *
          <select name="service" required>
            <option value="">Bitte wählen</option>
            <option value="Neueindeckung">Neueindeckung</option>
            <option value="Dachsanierung">Dachsanierung</option>
            <option value="Dämmung">Dämmung</option>
            <option value="Solarmontage">Solarmontage</option>
            <option value="Notdienst">Notdienst</option>
          </select>
        </label>

        <label>
          Wunschtermin
          <input type="date" name="date">
        </label>
      </div>

      <label>
        Nachricht / weitere Angaben
        <textarea name="message" rows="4"></textarea>
      </label>

      <label class="gdpr">
        <input type="checkbox" name="gdpr" required>
        Ich stimme der <a href="privacy.php" target="_blank">Datenschutzerklärung</a> zu. *
      </label>

      <!-- honeypot -->
      <input type="text" name="website" style="display:none">

      <button type="submit" class="btn btn--primary">
        <span>Absenden</span>
        <i class="fas fa-spinner fa-spin" style="display:none;"></i>
      </button>

      <p class="form-msg"></p>
    </form>
  </div>
</section>

<!-- ===== HARTĂ + PROGRAM ===== -->
<section class="map-info">
  <div class="container grid-2">
    <div class="map-wrapper">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2663.7!2d11.555!3d48.135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDjCsDA4JzA2LjAiTiAxMcKwMzMnMTguMCJF!5e0!3m2!1sde!2sde!4v1650000000000"
        allowfullscreen=""
        loading="lazy"
      ></iframe>
      <a class="map-link" href="https://goo.gl/maps/xxxxx" target="_blank">→ Route planen</a>
    </div>

    <div class="address">
      <h3>Adresse & Öffnungszeiten</h3>
      <p>Landsberger Allee 366<br> 12681 Berlin <br> Deutschland</p>
      <table>
        <tr><td>Mo – Fr:</td><td>07:00 – 17:00</td></tr>
        <tr><td>Sa:</td><td>08:00 – 12:00</td></tr>
        <tr><td>So:</td><td>Geschlossen</td></tr>
      </table>
      <p><em>Nur 15 min von Berlin Zentrum</em></p>
    </div>
  </div>
</section>

<!-- ===== FAQ ===== -->
<section class="faq">
  <div class="container">
    <h2>Häufige Fragen</h2>
    <details>
      <summary>Wie lange dauert eine Dachsanierung?</summary>
      <p>Je nach Größe des Objekts 5–10 Arbeitstage.</p>
    </details>
    <details>
      <summary>Können Sie auch Solaranlagen montieren?</summary>
      <p>Ja – wir sind zertifiziert für Photovoltaik- und Solarthermie-Systeme.</p>
    </details>
    <details>
      <summary>Welche Materialien verwenden Sie?</summary>
      <p>Überwiegend Ziegel, Betonsteine, Metall und moderne Kunststoffe.</p>
    </details>
    <details>
      <summary>Gibt es eine Garantie?</summary>
      <p>Mindestens 5 Jahre – gerne Details im Angebot.</p>
    </details>
  </div>
</section>

<!-- ===== NOTDIENST BANNER ===== -->
<?php
$now = (int) date('Hi');
$open = ($now >= 700 && $now < 1700) || ($now >= 800 && $now < 1200 && date('N') == 6);
if (!$open): ?>
<div class="emergency-banner">
  <div class="container">
    <i class="fas fa-exclamation-triangle"></i>
    <span><strong>Notdienst:</strong> +49 162 678 12 42</span>
    <a href="sms:+491626781242?body=Notdienst%20Anfrage" class="btn btn--small">SMS senden</a>
  </div>
</div>
<?php endif; ?>

<!-- ===== MICRO-CONVERSII ===== -->
<section class="extras">
  <div class="container grid-2">
    <div class="download-box">
      <h3>PDF-Katalog</h3>
      <p>Fordern Sie unseren kostenlosen Katalog an.</p>
      <button class="btn btn--outline" id="catalogBtn">Download</button>
    </div>
    <div class="newsletter-box">
      <h3>Newsletter</h3>
      <p>Tipps & Aktionen rund ums Dach.</p>
      <form id="newsletterForm">
        <input type="email" placeholder="Ihre E-Mail" required>
        <button type="submit" class="btn btn--outline">Anmelden</button>
      </form>
    </div>
  </div>
</section>

<!-- ===== SCRIPTS ===== -->
<script src="https://www.google.com/recaptcha/api.js?render=6Lfd6IwrAAAAAAq9AnqQDYHssazEzrcAQaCfQLDj"></script>
<script type="module">
  import {initContactForm} from '<?= $assets_path ?>js/modules/contact-form.js';
  initContactForm();
</script>

<?php include(__DIR__ . '/includes/footer.php'); ?>
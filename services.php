
<?php
$page_title = "Dienstleistungen - Dachdecker Meisterbetrieb";
$assets_path = 'assets/';
include(__DIR__ . '/includes/header.php');
include(__DIR__ . '/includes/contact-float.php');
?>


<!-- ===== HERO ===== -->
<section class="hero hero--small">
  <img src="<?= $assets_path ?>img/services/services-hero.webp" alt="Unsere Dienstleistungen" class="hero__bg" width="1920" height="1080">
  <div class="hero__overlay">
    <div class="container">
      <h1>Unsere Dienstleistungen</h1>
      <p>Alles rund ums Dach – aus einer Hand</p>
    </div>
  </div>
</section>

<!-- ===== QUICK NAV ===== -->
<nav class="service-nav" aria-label="Service-Sprungmarken">
  <div class="container">
    <a href="#bitumen">Bitumenschweißbahn</a>
    <a href="#reparatur">Reparatur & Pflege</a>
    <a href="#neu-eindeckung">Neueindeckung</a>
    <a href="#klempner">Klempner</a>
    <a href="#zimmerer">Zimmermann</a>
    <a href="#velux">Dachfenster</a>
    <a href="#gauben">Gauben</a>
    <a href="#hochdruck">Hochdruck</a>
  </div>
</nav>

<!-- ===== BITUMEN ===== -->
<section id="bitumen" class="service-detail">
  <div class="container grid-2">
    <div class="text">
      <h2>Bitumenschweißbahn</h2>
      <p>Moderne Abdichtung für Flach- und Schrägdächer – 10 Jahre Garantie.</p>
      <ul>
        <li>Heißluft- oder Flammenverfahren</li>
        <li>UV- und witterungsbeständig</li>
        <li>Extrem langlebig</li>
      </ul>
      <a href="#contact-form" class="btn btn--primary">Angebot anfordern</a>
    </div>
    <figure>
      <video class="service-video video-thumb" controls preload="none">
        <source src="<?= $assets_path ?>video/services/repartur.mp4" type="video/mp4">
      </video>
    </figure>
  </div>
</section>

<!-- ===== REPARATUR ===== -->
<section id="reparatur" class="service-detail alt">
  <div class="container grid-2">
    <figure>
      <video controls preload="none" poster="<?= $assets_path ?>img/services/repair-poster.webp">
        <source src="<?= $assets_path ?>video/repair.mp4" type="video/mp4">
      </video>
    </figure>
    <div class="text">
      <h2>Reparatur & Wartung</h2>
      <p>Kleine undichte Stelle oder kompletter Check-up – wir richten alles wieder.</p>
      <ul>
        <li>Kostenlose Erstinspektion</li>
        <li>Hochdruckreinigung</li>
        <li>Notdienst 24/7</li>
      </ul>
      <a href="<?= $assets_path ?>downloads/checkliste.pdf" class="btn btn--outline" download>Checkliste herunterladen</a>
    </div>
  </div>
</section>

<!-- ===== NEUEINDECKUNG ===== -->
<section id="neu-eindeckung" class="service-detail">
   <div class="container">
    <h2>Neueindeckung</h2>
    <p> Wählen Sie aus Bitumenschweißbahn Tondach-ziegel oder Trapez-Blech.</p>
    <div class="material-chooser">
      <input type="radio" name="material" id="ziegel" checked>
      <label for="ziegel">
        <img src="<?= $assets_path ?>img/services/Bitumenschweinbahn.webp" alt="Ziegel">
        <span>Bitumenschweißbahn</span>
      </label>
      <input type="radio" name="material" id="metal">
      
      <input type="radio" name="material" id="membrane">
      <label for="membrane">
        <img src="<?= $assets_path ?>img/services/metal.webp" alt="Membrane">
        <span>Membrane</span>
      </label>

      <label for="metal">
        <img src="<?= $assets_path ?>img/services/trapez.webp" alt="Trapezblech">
        <span>Trapezblech</span>
      </label>
    </div>
    <div id="price-preview" class="price-box">
     
      <small>inkl. Entsorgung & Montage</small>
    </div>
    <a href="#contact-form" class="btn btn--primary">Individuelles Angebot</a>
  </div>

    <!-- IMAGINI – SWIPER -->
    <h3 class="section-title">Neueindeckung – Galerie (39 Bilder)</h3>
    <div class="swiper neueindeckung-swiper">
      <div class="swiper-wrapper">
        <?php for ($i = 1; $i <= 39; $i++): ?>
          <a class="swiper-slide" href="<?= $assets_path ?>img/Neueindeckung/Neueindeckung<?= $i ?>.jpg" data-lightbox="neueindeckung">
            <img src="<?= $assets_path ?>img/Neueindeckung/Neueindeckung<?= $i ?>.jpg" loading="lazy" alt="Neueindeckung <?= $i ?>">
          </a>
        <?php endfor; ?>
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

    <!-- VIDEO – GRID LIGHTBOX (uniformizat ca la Zimmermann) -->
    <h3 class="section-title">Neueindeckung – Videos (9 Clips)</h3>
    <div class="video-grid">
      <?php for ($v = 1; $v <= 9; $v++): ?>
        <a href="<?= $assets_path ?>video/neueindeckung/Neueindeckung<?= $v ?>.mp4" class="video-thumb" data-lightbox="neueindeckung-video">
          <video muted preload="metadata" >
            <source src="<?= $assets_path ?>video/neueindeckung/Neueindeckung<?= $v ?>.mp4" type="video/mp4">
          </video>
          <span class="play-icon">▶</span>
        </a>
      <?php endfor; ?>
    </div>

    <a href="#contact-form" class="btn btn--primary">Individuelles Angebot</a>
  </div>
</section>

<!-- ===== KLEMPNER ===== -->
<section id="klempner" class="service-detail alt">
  <div class="container">
    <h2>Klempnerarbeiten</h2>
    <div class="intro-block">
      <h3>Maßgefertigte Dachrinnen</h3>
      <p>
        Kupfer, Zink oder Edelstahl – jede Rinne wird exakt auf Ihr Dach zugeschnitten.
        Inklusive Regenwasser-Einleitung, Laubschutz und 24-h-Reparaturservice.
      </p>
    </div>

    <!-- IMAGINI – SWIPER -->
    <h3 class="section-title">Klempner – Galerie (8 Bilder)</h3>
    <div class="swiper klempner-swiper">
      <div class="swiper-wrapper">
        <?php for ($i = 1; $i <= 8; $i++): ?>
          <a class="swiper-slide" href="<?= $assets_path ?>img/services/gutter-<?= $i ?>.webp" data-lightbox="klempner">
            <img src="<?= $assets_path ?>img/services/gutter-<?= $i ?>.webp" loading="lazy" alt="Dachrinne <?= $i ?>">
          </a>
        <?php endfor; ?>
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

    <!-- VIDEO – GRID LIGHTBOX (uniformizat ca la Zimmermann) -->
    <h3 class="section-title">Klempner – Videos (3 Clips)</h3>
    <div class="video-grid">
      <?php for ($v = 1; $v <= 3; $v++): ?>
        <a href="<?= $assets_path ?>video/services/gutter-install-<?= $v ?>.mp4" class="video-thumb" data-lightbox="klempner-video">
          <video muted preload="metadata" poster="<?= $assets_path ?>img/services/gutter-install-<?= $v ?>-poster.webp">
            <source src="<?= $assets_path ?>video/services/gutter-install-<?= $v ?>.mp4" type="video/mp4">
          </video>
          <span class="play-icon">▶</span>
        </a>
      <?php endfor; ?>
    </div>

    <button class="btn btn--primary" data-open="gutterModal">Defekt melden</button>
  </div>
</section>

<!-- ===== ZIMMERMANN ===== -->
<section id="zimmerer" class="service-detail">
  <div class="container">
    <h2>Zimmermann & Holzbau</h2>
    <div class="intro-block">
      <h3>Massive Holzbauten nach Maß</h3>
      <p>
        Carports, Terrassenüberdachungen, Dachstühle – alles aus FSC-zertifiziertem Holz,
        inklusive statischer Berechnung und Aufbau in 3 Tagen.
      </p>
    </div>

    <!-- IMAGINI – SWIPER -->
    <h3 class="section-title">Zimmermann – Galerie (6 Bilder)</h3>
    <div class="swiper zimmermann-swiper">
      <div class="swiper-wrapper">
        <?php for ($i = 1; $i <= 6; $i++): ?>
          <a class="swiper-slide" href="<?= $assets_path ?>img/zim/zim<?= $i ?>.jpg" data-lightbox="zimmermann">
            <img src="<?= $assets_path ?>img/zim/zim<?= $i ?>.jpg" loading="lazy" alt="Zimmermann Projekt <?= $i ?>">
          </a>
        <?php endfor; ?>
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

    <!-- VIDEO – GRID LIGHTBOX (deja uniformizat) -->
    <h3 class="section-title">Zimmermann – Videos (6 Clips)</h3>
    <div class="video-grid">
      <?php for ($v = 1; $v <= 6; $v++): ?>
        <a href="<?= $assets_path ?>video/services/zim<?= $v ?>.mp4" class="video-thumb" data-lightbox="zimm-video">
          <video muted preload="metadata">
            <source src="<?= $assets_path ?>video/services/zim<?= $v ?>.mp4" type="video/mp4">
          </video>
          <span class="play-icon">▶</span>
        </a>
      <?php endfor; ?>
    </div>

    <a href="#contact-form" class="btn btn--primary">Kostenloser Termin</a>
  </div>
</section>

<!-- ===== VELUX ===== -->
<section id="velux" class="service-detail alt">
  <div class="container">
    <h2>Velux Dachfenster</h2>
    <p>Mehr Licht & frische Luft – Einbau in nur einem Tag.</p>

    <div class="velux-grid">
      <div>
        <h3>Modelle</h3>
        <ul>
          <li>Top-Hung</li>
          <li>Center-Pivot</li>
          <li>Elektrisch / Solar</li>
        </ul>
      </div>
      <div>
        <h3>Extras</h3>
        <ul>
          <li>Verdunkelungs-Rollo</li>
          <li>Insektenschutz</li>
          <li>Smart-Home-ready</li>
        </ul>
      </div>
    </div>

    <!-- IMAGINI – SWIPER -->
    <h3 class="section-title">Velux – Galerie (6 Bilder)</h3>
    <div class="swiper velux-swiper">
      <div class="swiper-wrapper">
        <?php for ($i = 1; $i <= 6; $i++): ?>
          <a class="swiper-slide" href="<?= $assets_path ?>img/velux/velux<?= $i ?>.jpg" data-lightbox="velux">
            <img src="<?= $assets_path ?>img/velux/velux<?= $i ?>.jpg" loading="lazy" alt="Velux <?= $i ?>">
          </a>
        <?php endfor; ?>
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

    <!-- VIDEO – GRID LIGHTBOX (uniformizat ca la Zimmermann) -->
    <h3 class="section-title">Velux – Videos (3 Clips)</h3>
    <div class="video-grid">
      <?php for ($v = 1; $v <= 3; $v++): ?>
        <a href="<?= $assets_path ?>video/velux/velux<?= $v ?>.mp4" class="video-thumb" data-lightbox="velux-video">
          <video muted preload="metadata">
            <source src="<?= $assets_path ?>video/velux/velux<?= $v ?>.mp4" type="video/mp4">
          </video>
          <span class="play-icon">▶</span>
        </a>
      <?php endfor; ?>
    </div>

    <button class="btn btn--primary" data-open="veluxModal">Modell wählen</button>
  </div>
</section>

<!-- ===== GAUBEN ===== -->
<section id="gauben" class="service-detail">
  <div class="container">
    <h2>Gauben</h2>
    <div class="intro-block">
      <h3>Mehr Raum, mehr Licht</h3>
      <p>
        Sie gewinnen viel Raum, haben eine zusätzliche Lüftungsmöglichkeit und Lichtquelle.
        Verschiedene Formen: Schleppdach, Satteldach, Trapezdach u.v.m.
      </p>
    </div>

    <!-- IMAGINI – SWIPER -->
    <h3 class="section-title">Gauben – Galerie (8 Bilder)</h3>
    <div class="swiper gauben-swiper">
      <div class="swiper-wrapper">
        <?php for ($i = 1; $i <= 8; $i++): ?>
          <a class="swiper-slide" href="<?= $assets_path ?>img/gauben/gauben-<?= $i ?>.jpg" data-lightbox="gauben">
            <img src="<?= $assets_path ?>img/gauben/gauben-<?= $i ?>.jpg" loading="lazy" alt="Gaube <?= $i ?>">
          </a>
        <?php endfor; ?>
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

    <!-- VIDEO – GRID LIGHTBOX (uniformizat ca la Zimmermann) -->
    <h3 class="section-title">Gauben – Videos (4 Clips)</h3>
    <div class="video-grid">
      <?php for ($v = 1; $v <= 4; $v++): ?>
        <a href="<?= $assets_path ?>video/gauben/gauben-<?= $v ?>.mp4" class="video-thumb" data-lightbox="gauben-video">
          <video muted preload="metadata" poster="<?= $assets_path ?>img/gauben/video<?= $v ?>-poster.webp">
            <source src="<?= $assets_path ?>video/gauben/gauben-<?= $v ?>.mp4" type="video/mp4">
          </video>
          <span class="play-icon">▶</span>
        </a>
      <?php endfor; ?>
    </div>

    <a href="#contact-form" class="btn btn--primary">Beratung anfragen</a>
  </div>
</section>

<!-- ===== HOCHDRUCK ===== -->
<section id="hochdruck" class="service-detail alt">
  <div class="container">
    <h2>Hochdruckreiniger & Nano-Versiegelung</h2>
    
    <div class="intro-block">
      <h3>Ihr Fachbetrieb für Dachreinigung in Berlin & Brandenburg</h3>
      <p>
        Professionelle Reinigung von Dächern, Fassaden, Steinflächen, PV-Anlagen und Graffiti-Entfernung – 
        alles aus einer Hand. Mit Nano-Versiegelung für langanhaltenden Schutz.
      </p>
    </div>

    <!-- Benefits Grid -->
    <div class="benefits-grid">
      <div class="benefit-item">
        <div class="benefit-icon">💧</div>
        <h4>Umweltfreundlich</h4>
        <p>Ohne aggressive Chemikalien</p>
      </div>
      <div class="benefit-item">
        <div class="benefit-icon">⚡</div>
        <h4>Schnell & Effizient</h4>
        <p>In nur einem Tag erledigt</p>
      </div>
      <div class="benefit-item">
        <div class="benefit-icon">🛡️</div>
        <h4>Langanhaltender Schutz</h4>
        <p>Nano-Versiegelung bis 5 Jahre</p>
      </div>
      <div class="benefit-item">
        <div class="benefit-icon">🏠</div>
        <h4>Mehrwert</h4>
        <p>Erhöht den Immobilienwert</p>
      </div>
    </div>

    <!-- Why Section -->
    <div class="hochdruck-why">
      <h3>Warum Dachreinigung?</h3>
      <ul class="check-list">
        <li>Subjektive Wertsteigerung Ihrer Immobilie</li>
        <li>Gepflegte und ansprechende Erscheinung</li>
        <li>Effektive Moos- und Algenentfernung</li>
        <li>Nanobeschichtung gegen erneuten Bewuchs</li>
      </ul>
    </div>

    <!-- IMAGINI – SWIPER -->
    <h3 class="section-title">Reinigung – Galerie (6 Bilder)</h3>
    <div class="swiper hochdruck-swiper">
      <div class="swiper-wrapper">
        <?php for ($i = 1; $i <= 6; $i++): ?>
          <a class="swiper-slide" href="<?= $assets_path ?>img/hock/hock<?= $i ?>.jpg" data-lightbox="hochdruck">
            <img src="<?= $assets_path ?>img/hock/hock<?= $i ?>.jpg" loading="lazy" alt="Reinigung <?= $i ?>">
          </a>
        <?php endfor; ?>
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

    <!-- VIDEO – GRID -->
    <h3 class="section-title">Reinigung in Aktion (6 Videos)</h3>
    <div class="video-grid">
      <?php for ($v = 1; $v <= 6; $v++): ?>
        <a href="<?= $assets_path ?>video/hock/hock<?= $v ?>.mp4" class="video-thumb" data-lightbox="hoch-video">
          <video muted preload="metadata" poster="<?= $assets_path ?>img/hock/hock<?= $v ?>-poster.webp">
            <source src="<?= $assets_path ?>video/hock/hock<?= $v ?>.mp4" type="video/mp4">
          </video>
          <span class="play-icon">▶</span>
        </a>
      <?php endfor; ?>
    </div>

    <a href="#contact-form" class="btn btn--primary">Kostenlose Beratung</a>
  </div>
</section>

<!-- ===== ANTIKONDENSATIONSFILZ ===== -->
<section id="antikondensation" class="service-detail">
  <div class="container">
    <h2>Antikondensationsfilz gegen Kondenswasser</h2>
    
    <div class="grid-2">
      <div class="text">
        <div class="intro-block">
          <p>
            Ein Antikondensationsfilz (optional), der direkt auf die innere Panzerung des Trapezblechs aufgebracht wird, schützt vor Kondensation. Die Filzschicht schließt die Feuchtigkeit ein, die dann bei wechselnden Wetterbedingungen in die unmittelbare Umgebung verdunstet.
          </p>
        </div>

        <div class="company-statement">
          <p>
            Als erfahrener Dachdecker sind wir aktuell auf der Suche nach neuen Aufträgen und haben Kapazitäten frei.
          </p>
        </div>

        <h3>Unser Angebot für das Jahr 2025</h3>
        <p>Unser Angebot umfasst diverse Leistungen rund um die Dachdeckung:</p>
        
        <div class="services-2025">
          <ul class="services-list-2025">
            <li>Metall- und Blechdächer</li>
            <li>Flachdächer jeglicher Art</li>
            <li>Trapezblech in verschiedenen Farben</li>
            <li>Carports inklusive Holzkonstruktion</li>
            <li>Erneuerung von Dachrinnen</li>
            <li>Materialbeschaffung</li>
            <li>Renovierung von Bungalow- und Gartenhausdächern</li>
            <li>Stalldächer und Scheunen mit speziellen Angeboten bis zu 30% Rabatt</li>
            <li>Reparaturen aller Art an Dächern</li>
            <li>Zimmermannsarbeiten</li>
            <li>Sanierung von Flachdächern</li>
            <li>Montage von Velux-Dachfenstern</li>
            <li>Austausch und Reparatur von Balken</li>
            <li>Sanierung von Ziegeldächern</li>
          </ul>
        </div>
      </div>

      <figure class="antikondensation-image">
        <img src="<?= $assets_path ?>img/services/antikondensationsfilz.jpg" 
             alt="Antikondensationsfilz Trapezblech" 
             loading="lazy">
        <figcaption>Antikondensationsfilz schützt vor Kondenswasser</figcaption>
      </figure>
    </div>

    <!-- Asbest Section -->
    <div class="asbest-section">
      <h3>Asbestdachsanierung - Fachgerechte Entsorgung</h3>
      
      <div class="asbest-content">
        <div class="asbest-intro">
          <p>
            <strong>Wir unterstützen Sie bei der fachgerechten Entsorgung und Sanierung von Asbestdächern.</strong>
          </p>
          <p>
            Die Sanierung des Daches einer Scheune, Garage, Industrie-, Gewerbe-, Lager-, oder Montagehalle mit Asbest kann aus verschiedenen Gründen erforderlich sein. Ist zum Beispiel Ihr Dach undicht? Reicht die Isolationswirkung nicht aus?
          </p>
        </div>

        <div class="asbest-warning">
          <h4>⚠️ Wichtiger Hinweis zu Asbest</h4>
          <p>
            Unabhängig davon sollten Sie eine Asbestdachsanierung nur von einem Fachmann durchführen lassen. Asbest birgt Gesundheitsrisiken und muss fachgerecht entsorgt werden. Asbestfasern können in die Lunge eindringen und werden vom menschlichen Organismus nicht mehr abgebaut. Die Folge sind häufig Erkrankungen wie die sogenannte Asbestose.
          </p>
        </div>

        <div class="asbest-facts">
          <div class="fact-item">
            <div class="fact-icon">📅</div>
            <div class="fact-content">
              <h4>Seit 1993 verboten</h4>
              <p>Die Verwendung von Asbest ist seit 1993 verboten, doch in zahlreichen Industriegebäuden sind Asbestmaterialien immer noch in besorgniserregender Häufigkeit zu finden.</p>
            </div>
          </div>
          
          <div class="fact-item">
            <div class="fact-icon">🛡️</div>
            <div class="fact-content">
              <h4>Fachgerechte Sanierung</h4>
              <p>Wir führen Ihre Sanierung fachgerecht und umweltschonend gemäß TRGS 519 (Technische Regeln für Gefahrstoffe) durch und sorgen für die fachgerechte Entsorgung gefährlicher Baustoffe.</p>
            </div>
          </div>
        </div>

        <div class="asbest-cta">
          <p>
            <strong>Gerne beraten wir Sie fachkundig zu Ihren Möglichkeiten der Asbestdachsanierung.</strong> Asbest ist nur dann besonders gefährlich, wenn mit Altlasten nicht ordnungsgemäß umgegangen wird.
          </p>
          <a href="#contact-form" class="btn btn--primary">Kostenlose Asbestberatung</a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include(__DIR__ . '/includes/footer.php'); ?>

<!-- ===== LIGHTBOX CSS/JS ===== -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>

<!-- ===== SWIPER JS ===== -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
// Inițializare Swiper pentru toate galeriile de imagini
document.querySelectorAll('.swiper').forEach(el => {
  new Swiper(el, {
    loop: true,
    spaceBetween: 16,
    pagination: {
      el: el.querySelector('.swiper-pagination'),
      clickable: true,
    },
    navigation: {
      nextEl: el.querySelector('.swiper-button-next'),
      prevEl: el.querySelector('.swiper-button-prev'),
    },
    breakpoints: {
      768: { slidesPerView: 1.2 },
      1024: { slidesPerView: 1.4 },
    }
  });
});
</script>

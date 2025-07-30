<?php
// index.php - Pagina principală a site-ului

// Setări SEO pentru pagina principală
$page_title = "Dachdecker Berlin Brandenburg | Klempner & Zimmermann | Der Hausmeister Michael GmbH";
$page_description = "Professionelle Dachdecker, Klempner & Zimmermann in Berlin & Brandenburg. Über 20 Jahre Erfahrung. Kostenlose Beratung & Angebot!";
$is_home = true; // Marchează explicit că aceasta este pagina principală

// Include antetul site-ului
include(__DIR__ . '/includes/header.php'); // Presupune că header.php este în /includes/
?>

<!-- HERO SECTION -->
<section class="hero-section">
    <video class="hero-video" autoplay muted loop playsinline preload="metadata" poster="<?php echo htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8'); ?>img/hero-poster.jpg">
        <source src="<?php echo htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8'); ?>video/hero-bg-video.mp4" type="video/mp4">
        Ihr Browser unterstützt das Video-Tag nicht.
    </video>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>Ihr Meisterbetrieb für Dach & Fassade in Berlin & Brandenburg</h1>
        <h2>Über 20 Jahre Erfahrung. Kostenlose Beratung. Top-Qualität. Termingerecht.</h2>
        <div class="btn-container">
            <a href="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>contact.php" class="btn-primary">Kostenloses Angebot anfragen</a>
            <a href="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>projects.php" class="btn-secondary">Unsere Referenzen</a>
        </div>
        <div class="trust-badges">
            <span><i class="fas fa-award"></i> Meisterbetrieb</span>
            <span><i class="fas fa-certificate"></i> Zertifiziert</span>
            <span><i class="fas fa-shield-alt"></i> Versichert</span>
        </div>
    </div>
    <div class="scroll-indicator" aria-hidden="true">
        <span></span>
    </div>
</section>

<!-- QUICK SERVICES -->
<section class="quick-services" id="dienstleistungen">
    <div class="section-header">
        <h2>Unsere Kernleistungen</h2>
        <p class="subheading">Entdecken Sie unsere umfassenden Dachdecker-Dienstleistungen - von Neubau bis Nachhaltigkeit. Qualität und Zuverlässigkeit garantiert.</p>
    </div>
    <div class="services-container">
        <div class="services-grid">
            <div class="service-card">
                <i class="fas fa-home"></i>
                <h3>Neubau & Dachausbau</h3>
                <p>Massivdächer, Holzdächer, Gauben & mehr - planen & bauen wir fachgerecht.</p>
                <a href="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>services.php#neubau" class="card-link" aria-label="Mehr über Neubau & Dachausbau">Mehr erfahren <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="service-card">
                <i class="fas fa-tools"></i>
                <h3>Reparatur & Wartung</h3>
                <p>Von kleinen Reparaturen bis zur professionellen Dachwartung - wir halten Ihr Dach sicher.</p>
                <a href="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>services.php#reparatur" class="card-link" aria-label="Mehr über Reparatur & Wartung">Mehr erfahren <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="service-card">
                <i class="fas fa-thermometer-half"></i>
                <h3>Dämmung & Sanierung</h3>
                <p>Energie sparen mit moderner Dachdämmung - staatlich gefördert.</p>
                <a href="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>services.php#daemmung" class="card-link" aria-label="Mehr über Dämmung & Sanierung">Mehr erfahren <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="service-card">
                <i class="fas fa-tint"></i>
                <h3>Hochdruckreinigung</h3>
                <p>Gründliche Reinigung von Dach, Fassade & Terrassen mit schonender Hochdrucktechnik.</p>
                <a href="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>services.php#hochdruck" class="card-link" aria-label="Mehr über Hochdruckreinigung">Mehr erfahren <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="service-card">
                <i class="fas fa-solar-panel"></i>
                <h3>Photovoltaik & Gründächer</h3>
                <p>Nachhaltige Energie und ökologische Dachbegrünung aus einer Hand.</p>
                <a href="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>services.php#photovoltaik" class="card-link" aria-label="Mehr über Photovoltaik & Gründächer">Mehr erfahren <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="service-card">
                <i class="fas fa-building"></i>
                <h3>Gauben & Dachausbau</h3>
                <p>Mehr Raum, Licht und Komfort – planen und bauen wir individuelle Gauben und Dachausbauten.</p>
                <a href="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>services.php#gauben" class="card-link" aria-label="Mehr über Gauben & Dachausbau">Mehr erfahren <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="btn-container">
            <a href="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>services.php" class="btn-secondary">Alle Dienstleistungen</a>
        </div>
    </div>
</section>

<!-- ABOUT SHORT -->
<section class="about-short">
    <div class="container">
        <div class="about-content">
            <h2>Meisterbetrieb mit Leidenschaft & Präzision</h2>
            <p>Von der Planung bis zur Fertigstellung arbeiten wir transparent, zuverlässig und termingerecht.</p>
            <p>Unser Team aus erfahrenen <strong>Dachdeckern</strong>, <strong>Klempnern</strong> und <strong>Zimmerleuten</strong> sorgt dafür, dass jedes Projekt mit höchster Präzision und Liebe zum Detail umgesetzt wird.</p>
            <a href="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>about.php" class="btn-secondary">Lerne unser Team kennen</a>
        </div>
    </div>
</section>

<!-- VIDEO PROJECTS CAROUSEL -->
<section class="cinematic-carousel loading" role="region" aria-label="Projekte Video">
    <div class="swiper videoProjectsSwiper">
        <div class="swiper-wrapper">
            <!-- Slide 1 – Dachsanierung -->
            <div class="swiper-slide">
                <div class="video-container">
                    <video class="bg-video" muted loop playsinline preload="none">
                        <source src="<?php echo htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8'); ?>video/project1-bg.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="video-overlay"></div>
                <div class="slide-content">
                    <span class="project-tag"><i class="icon-solar-panel"></i> Moderne Dachsanierung</span>
                    <h2 class="project-title">Moderne Dachsanierung mit Trapez-Blech</h2>
                    <p class="project-desc"><span class="location">Berlin Mitte</span><span class="year">2024</span></p>
                    <div class="project-stats">
                        <div class="stat"><span class="stat-number">170</span><span class="stat-label">m²</span></div>
                        <div class="stat"><span class="stat-number">4</span><span class="stat-label">Tage</span></div>
                    </div>
                    <a href="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>contact.php" class="btn-explore"><span>Jetzt Kostenvoranschlag anfragen</span> <i class="icon-arrow-right"></i></a>
                </div>
            </div>

            <!-- Slide 2 – Altbau-Dachausbau -->
            <div class="swiper-slide">
                <div class="video-container">
                    <video class="bg-video" muted loop playsinline preload="none">
                        <source src="<?php echo htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8'); ?>video/project2-bg.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="video-overlay"></div>
                <div class="slide-content">
                    <span class="project-tag"><i class="icon-home-alt"></i> Altbau-Sanierung</span>
                    <h2 class="project-title">Altbau-Dachausbau</h2>
                    <p class="project-desc"><span class="location">Berlin Charlottenburg</span><span class="year">2023</span></p>
                    <div class="project-stats">
                        <div class="stat"><span class="stat-number">210</span><span class="stat-label">m²</span></div>
                        <div class="stat"><span class="stat-number">11</span><span class="stat-label">Tage</span></div>
                    </div>
                    <a href="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>contact.php" class="btn-explore"><span>Jetzt Kostenvoranschlag anfragen</span> <i class="icon-arrow-right"></i></a>
                </div>
            </div>

            <!-- Slide 3 – Hochdruckreinigung / Nano-Versiegelung -->
            <div class="swiper-slide">
                <div class="video-container">
                    <video class="bg-video" muted loop playsinline preload="none">
                        <source src="<?php echo htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8'); ?>video/project3-bg.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="video-overlay"></div>
                <div class="slide-content">
                    <span class="project-tag"><i class="icon-solar-panel"></i> Hochdruckreinigung & Nano-Versiegelung</span>
                    <h2 class="project-title">Hochdruckreiniger</h2>
                    <p class="project-desc"><span class="location">Potsdam</span><span class="year">2024</span></p>
                    <div class="project-stats">
                        <div class="stat"><span class="stat-number">140</span><span class="stat-label">m²</span></div>
                        <div class="stat"><span class="stat-number">3</span><span class="stat-label">Tage</span></div>
                    </div>
                    <a href="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>contact.php" class="btn-explore"><span>Jetzt Kostenvoranschlag anfragen</span> <i class="icon-arrow-right"></i></a>
                </div>
            </div>

            <!-- Slide 4 – Einfamilienhaus Neubau -->
            <div class="swiper-slide">
                <div class="video-container">
                    <video class="bg-video" muted loop playsinline preload="none">
                        <source src="<?php echo htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8'); ?>video/project4-bg.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="video-overlay"></div>
                <div class="slide-content">
                    <span class="project-tag"><i class="icon-home"></i> Einfamilienhaus Neubau</span>
                    <h2 class="project-title">Einfamilienhaus Neubau</h2>
                    <p class="project-desc"><span class="location">Potsdam</span><span class="year">2024</span></p>
                    <div class="project-stats">
                        <div class="stat"><span class="stat-number">280</span><span class="stat-label">m²</span></div>
                        <div class="stat"><span class="stat-number">2</span><span class="stat-label">W</span></div>
                    </div>
                    <a href="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>contact.php" class="btn-explore"><span>Jetzt Kostenvoranschlag anfragen</span> <i class="icon-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="carousel-navigation">
            <button class="swiper-button-prev" aria-label="Vorheriges Projekt"></button>
            <button class="swiper-button-next" aria-label="Nächstes Projekt"></button>
        </div>

        <!-- Pagination -->
        <div class="carousel-pagination">
            <div class="swiper-pagination"></div>
            <div class="pagination-progress">
                <div class="progress-bar"></div>
            </div>
        </div>

        <!-- Slide Counter -->
        <div class="slide-counter">
            <span class="current-slide">01</span>
            <span class="divider">/</span>
            <span class="total-slides">04</span>
        </div>

        <!-- Autoplay Progress -->
        <div class="swiper-autoplay-progress">
            <svg viewBox="0 0 48 48">
                <circle cx="24" cy="24" r="20" fill="none" stroke="currentColor" stroke-width="4"></circle>
                <circle class="progress" cx="24" cy="24" r="20" fill="none" stroke="currentColor" stroke-width="4" stroke-dasharray="125.6" stroke-dashoffset="125.6"></circle>
            </svg>
        </div>
    </div>
</section>

<!-- Include Swiper JS (asigură-te că este încărcat corect înainte de închiderea </body>) -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>

<?php
// Include subsolul site-ului
include(__DIR__ . '/includes/footer.php'); // Presupune că footer.php este în /includes/
?>
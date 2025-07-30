<?php
// === CONFIGURAȚII & LOGICĂ PHP PENTRU PAGINA PRINCIPALĂ ===
// Aceste variabile sunt specifice paginii index.php și sunt folosite în header.php

// Determină URL-ul absolut al root-ului site-ului (presupunem HTTPs)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
$base_url = $protocol . $host . '/';
$assets_path = $base_url . 'assets/';

// Determină pagina curentă pentru meniul activ și logica CSS
$current_page = basename($_SERVER['PHP_SELF']); // e.g., 'index.php'
$request_uri = $_SERVER['REQUEST_URI'];
$is_home = true; // Explicit setat pentru pagina principală

// === SEO pentru Pagina Principală ===
$page_title = 'MeisterDach - Profesionisti in Domeniul Constructiilor';
$page_description = 'MeisterDach ofera servicii complete de constructii, renovari si intretinere in Berlin si Brandenburg. Calitate garantata, preturi competitive.';

// Include header-ul
include(__DIR__ . '/includes/header.php');
?>

        <!-- Hero Section -->
        <section class="hero-section" aria-labelledby="hero-heading">
            <video autoplay muted loop preload="metadata" class="hero-video" aria-hidden="true" playsinline>
                <source src="<?= $assets_path ?>video/hero-video.mp4" type="video/mp4">
                Ihr Browser unterstützt das Video-Tag nicht.
            </video>
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <h1 data-aos="fade-down" data-aos-delay="200">Profesioniști în Construcții</h1>
                <h2 data-aos="fade-down" data-aos-delay="400">Calitate Superioară, Garantată</h2>
                <p data-aos="fade-up" data-aos-delay="600">Oferim servicii complete de construcții, renovări și întreținere în Berlin și Brandenburg. Cu peste 20 de ani de experiență, suntem partenerul dvs. de încredere pentru orice proiect.</p>
                <div class="btn-container" data-aos="zoom-in" data-aos-delay="800">
                    <a href="<?= $base_url ?>contact.php" class="btn-secondary">Solicită o Ofertă</a>
                </div>
                <div class="trust-badges" data-aos="fade-up" data-aos-delay="1000">
                    <span><i class="fas fa-certificate"></i> Licențiat & Asigurat</span>
                    <span><i class="fas fa-award"></i> Peste 500 de Clienți Mulțumiți</span>
                    <span><i class="fas fa-shield-alt"></i> Garanție Extinsă</span>
                </div>
            </div>
            <div class="scroll-indicator" aria-label="Derulează în jos">
                <div class="scroll-arrow"></div>
            </div>
        </section>

        <!-- Quick Services Preview -->
        <section class="quick-services" aria-labelledby="services-heading">
            <div class="container">
                <h2 class="section-heading" id="services-heading">Serviciile Noastre</h2>
                <p class="subheading">Oferim o gamă largă de servicii pentru a vă satisface toate nevoile de construcții și renovări.</p>
                
                <div class="services-grid">
                    <div class="service-card" data-aos="fade-up">
                        <div class="card-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h3>Renovări Rezidențiale</h3>
                        <p>Transformăm spațiile dvs. de locuit cu soluții moderne și personalizate, de la bucătării și băi până la renovări complete.</p>
                        <a href="<?= $base_url ?>services.php#residential" class="card-link">Află mai multe <i class="fas fa-arrow-right"></i></a>
                    </div>
                    
                    <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="card-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <h3>Construcții Comerciale</h3>
                        <p>Servicii profesionale de construcții și întreținere pentru birouri, magazine și alte spații comerciale.</p>
                        <a href="<?= $base_url ?>services.php#commercial" class="card-link">Află mai multe <i class="fas fa-arrow-right"></i></a>
                    </div>
                    
                    <div class="service-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="card-icon">
                            <i class="fas fa-tools"></i>
                        </div>
                        <h3>Întreținere Generală</h3>
                        <p>Servicii rapide și fiabile de întreținere pentru a menține proprietatea dvs. în stare perfectă.</p>
                        <a href="<?= $base_url ?>services.php#maintenance" class="card-link">Află mai multe <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <div class="btn-container">
                    <a href="<?= $base_url ?>services.php" class="btn-secondary">Vezi Toate Serviciile</a>
                </div>
            </div>
        </section>

        <!-- About Us Short -->
        <section class="about-short" aria-labelledby="about-heading">
            <div class="about-bg" aria-hidden="true"></div>
            <div class="container">
                <div class="about-content">
                    <h2 class="section-heading" id="about-heading">De ce Să Ne Alegeți Pe Noi?</h2>
                    <p>Cu peste două decenii de experiență în domeniu, echipa noastră de profesioniști dedică fiecare proiect pasiunii și măiestriei. Ne mândrim cu munca noastră și cu relațiile de încredere pe care le construim cu clienții noștri.</p>
                    <a href="<?= $base_url ?>about.php" class="btn-secondary">Despre Noi</a>
                </div>
            </div>
        </section>

        <!-- Projects Carousel -->
        <section class="projects-carousel-section" aria-labelledby="projects-heading">
            <div class="container">
                <h2 class="section-heading" id="projects-heading">Proiectele Noastre Recente</h2>
                <p class="subheading">Descoperiți câteva dintre cele mai recente realizări ale echipei noastre.</p>
                
                <!-- Swiper -->
                <div class="swiper projectsSwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="<?= $assets_path ?>img/projects/project1.jpg" data-lightbox="projects" data-title="Renovare Bucătărie Modernă">
                                <img src="<?= $assets_path ?>img/projects/project1.jpg" alt="Renovare Bucătărie Modernă">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="<?= $assets_path ?>img/projects/project2.jpg" data-lightbox="projects" data-title="Extindere Casă de Lemn">
                                <img src="<?= $assets_path ?>img/projects/project2.jpg" alt="Extindere Casă de Lemn">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="<?= $assets_path ?>img/projects/project3.jpg" data-lightbox="projects" data-title="Reamenajare Spațiu Comercial">
                                <img src="<?= $assets_path ?>img/projects/project3.jpg" alt="Reamenajare Spațiu Comercial">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="<?= $assets_path ?>img/projects/project4.jpg" data-lightbox="projects" data-title="Instalare Tâmplărie PVC">
                                <img src="<?= $assets_path ?>img/projects/project4.jpg" alt="Instalare Tâmplărie PVC">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="<?= $assets_path ?>img/projects/project5.jpg" data-lightbox="projects" data-title="Reparații Acoperiș Țiglă">
                                <img src="<?= $assets_path ?>img/projects/project5.jpg" alt="Reparații Acoperiș Țiglă">
                            </a>
                        </div>
                    </div>
                    
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>

        <!-- Team Hero -->
        <section class="team-hero" aria-labelledby="team-heading">
            <div class="container">
                <div class="team-content">
                    <img src="<?= $assets_path ?>img/team-hero.webp" alt="Echipa MeisterDach" class="team-image" loading="lazy">
                    <div class="team-text">
                        <h2 class="section-heading" id="team-heading">Echipa Noastră</h2>
                        <p>O echipă de profesioniști pasionați, cu experiență vastă și abilități diverse, dedicată fiecărui detaliu al proiectului dvs. Colaborăm strâns pentru a oferi rezultate de neegalat.</p>
                        <a href="<?= $base_url ?>about.php#team" class="btn-secondary">Cunoaște Echipa</a>
                    </div>
                </div>
            </div>
        </section>

<?php
// Include footer-ul
include(__DIR__ . '/includes/footer.php');
?>
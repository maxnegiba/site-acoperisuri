<?php
// Determină URL-ul absolut al root-ului site-ului
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
$base_url = $protocol . $host . '/';
$assets_path = $base_url . 'assets/';
// Determină pagina curentă pentru meniul activ și logica CSS
$current_page = basename($_SERVER['PHP_SELF']);
$request_uri = $_SERVER['REQUEST_URI'];
$is_home = ($current_page === 'index.php' || $request_uri === '/' || $request_uri === '/');
// Asigură că $page_title și $page_description sunt definite pentru fiecare pagină
// Paginile individuale le vor seta explicit
if (!isset($page_title)) {
    $page_title = 'MeisterDach - Dachdecker Meisterbetrieb';
}
if (!isset($page_description)) {
    // Descriere generală implicită, dar ideal ar fi una specifică pentru fiecare pagină
    $page_description = 'Professionelle Dachdecker, Klempner & Zimmermann in Berlin & Brandenburg. Über 20 Jahre Erfahrung. Kostenlose Beratung & Angebot!';
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Titlu și Meta Description - Esențiale pentru SEO -->
    <title><?= htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8') ?></title>
    <meta name="description" content="<?= htmlspecialchars($page_description, ENT_QUOTES, 'UTF-8') ?>">
    <!-- Preload resurse critice pentru afișarea inițială -->
    <link rel="preload" href="<?= $assets_path ?>img/logo-text.jpg" as="image">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <!-- Dacă ai un font custom critic, preconectează și preîncarcă-l -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <!-- <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'"> -->
    <!-- <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap"></noscript> -->

    <!-- CSS Critic Inline pentru Header - Asigură afișarea corectă fără FOUC -->
    <style>
        /* === CRITICAL HEADER STYLES - INLINE === */
        .header {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(248, 249, 250, 0.95));
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
            border-bottom: 1px solid rgba(211, 47, 47, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1010;
            height: 100px;
            padding: 0;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .header .container {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100%;
            padding: 0 32px;
            position: relative;
        }

        /* === DESKTOP NAVIGATION - CRITICAL PARTS === */
        .nav-desktop {
            display: flex; /* Asigură afișarea corectă */
            align-items: center;
            gap: 8px;
            margin-left: 2rem;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(15px);
            border-radius: 50px;
            padding: 8px 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
            z-index: 1005;
        }

        .nav-desktop ul {
            display: flex; /* Asigură afișarea corectă */
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 8px;
            align-items: center;
        }

        .nav-desktop li {
            position: relative;
        }

        .nav-desktop a {
            text-decoration: none;
            color: #2c3e50;
            font-weight: 600;
            font-size: 15px;
            padding: 12px 20px;
            border-radius: 25px;
            position: relative;
            transition: all 0.3s ease;
            overflow: hidden;
            display: block; /* Asigură afișarea corectă */
        }

        /* === MOBILE NAVIGATION - CRITICAL PARTS (hidden by default) === */
        /* Acestea sunt esențiale pentru a ascunde corect meniul mobil pe desktop */
        .mobile-nav,
        .hamburger,
        .nav-mobile { /* <= LINIA IMPORTANTĂ CARE LIPSEA */
            display: none; /* Ascunde meniul mobil și hamburger pe desktop */
        }

        /* === MEDIA QUERY pentru mobil - CRITICAL === */
        /* Repetă partea esențială pentru a afișa mobil și ascunde desktop pe ecrane mici */
        @media (max-width: 991.98px) {
            .nav-desktop,
            .header .cta-button { /* Dacă .cta-button e doar în meniul mobil, ajustează */
                display: none; /* Ascunde pe mobil */
            }

            .mobile-nav,
            .hamburger,
            .nav-mobile { /* Asigură afișarea pe mobil */
                display: block; /* Afișează hamburger și meniu mobil */
            }
            /* Adaugă aici și stilurile critice minime pentru .hamburger și .nav-mobile dacă sunt esențiale pentru layout-ul inițial */
            .hamburger {
                position: relative;
                /* ... restul stilurilor critice minime pentru hamburger ... */
                display: flex; /* Asigură afișarea corectă */
            }
            .nav-mobile {
                /* Stiluri critice minime pentru poziționare inițială */
                position: fixed;
                top: 100px;
                left: -100%; /* Ascuns inițial */
                width: 85%;
                max-width: 300px;
                height: calc(100vh - 100px);
                transition: left 0.4s cubic-bezier(0.4, 0, 0.2, 1); /* Tranziția este critică */
                z-index: 1008;
            }
            .nav-mobile.active {
                left: 0; /* Afișat când e activ */
            }
        }

        /* Adaugă și alte media queries critice dacă afectează layout-ul imediat (ex: schimbări de înălțime pe mobil) */
        @media (max-width: 768px) {
            .header { height: 80px; }
            .nav-mobile { top: 80px; height: calc(100vh - 80px); }
            .header.scrolled { height: 70px; }
            /* Adaugă aici stiluri critice pentru logo dacă se schimbă dimensiunea */
            .logo-main, .logo-text { max-height: 40px; }
            .header.scrolled .logo-main,
            .header.scrolled .logo-text { max-height: 35px; }
        }

        /* === PRINT - CRITICAL === */
        @media print {
            .header { position: static; box-shadow: none; background: white; }
            .nav-desktop a, .nav-mobile a { color: black !important; }
        }
    </style>
    <!-- /CSS Critic Inline pentru Header -->

    <!-- Încărcare asincronă a CSS-ului non-critic sau specific paginii -->
    <!-- CSS-ul de bază care nu este critic (sau deja inline) -->
    
    <!-- Page specific CSS - încărcare asincronă -->
    <?php if ($is_home): ?>
        <!-- Pentru homepage, main.css este încărcat asincron dacă CSS-ul critic este inline -->
        <link rel="preload" href="<?= $assets_path ?>css/main.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= $assets_path ?>css/main.css"></noscript>
    <?php else: ?>
        <!-- Pentru alte pagini, încarcă CSS-ul specific -->
        <?php if ($current_page === 'contact.php'): ?>
            <link rel="preload" href="<?= $assets_path ?>css/contact.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
            <noscript><link rel="stylesheet" href="<?= $assets_path ?>css/contact.css"></noscript>
        <?php endif; ?>
        <?php if ($current_page === 'services.php'): ?>
            <link rel="preload" href="<?= $assets_path ?>css/services.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
            <noscript><link rel="stylesheet" href="<?= $assets_path ?>css/services.css"></noscript>
        <?php endif; ?>
        <?php if ($current_page === 'projects.php'): ?>
            <link rel="preload" href="<?= $assets_path ?>css/projects.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
            <noscript><link rel="stylesheet" href="<?= $assets_path ?>css/projects.css"></noscript>
        <?php endif; ?>
        <?php if ($current_page === 'about.php'): ?>
            <link rel="preload" href="<?= $assets_path ?>css/about.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
            <noscript><link rel="stylesheet" href="<?= $assets_path ?>css/about.css"></noscript>
        <?php endif; ?>
    <?php endif; ?>
    <!-- External libraries - încărcare asincronă -->
    <!-- Font Awesome CSS -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></noscript>
    <!-- Lightbox CSS -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'" crossorigin>
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css"></noscript>
    <!-- Swiper CSS -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'" crossorigin>
    <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"></noscript>
    <!-- JavaScript - încărcare deferred pentru a nu bloca parsarea HTML-ului -->
    <script src="<?= $assets_path ?>js/main.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer crossorigin></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js" defer crossorigin></script>
    <!-- Critical JavaScript pentru header -->
    <script>
    // Încărcăm scriptul principal imediat ce DOM-ul este disponibil
    document.addEventListener('DOMContentLoaded', function() {
        // Header scroll effect
        const header = document.querySelector('.header');
        const heroSection = document.querySelector('.hero-section'); // For homepage
        if (header) {
            // Scroll effect
            let scrollTimeout;
            window.addEventListener('scroll', function() {
                clearTimeout(scrollTimeout);
                scrollTimeout = setTimeout(function() {
                    if (window.scrollY > 50) {
                        header.classList.add('scrolled');
                    } else {
                        header.classList.remove('scrolled');
                    }
                }, 10);
            });
            // Update hero padding (only on homepage where heroSection exists)
            if (heroSection) {
                const updateHeroPadding = () => {
                    const headerHeight = header.offsetHeight;
                    heroSection.style.paddingTop = headerHeight + 'px';
                };
                updateHeroPadding();
                window.addEventListener('resize', updateHeroPadding);
            }
        }
        // Mobile menu
        const hamburger = document.querySelector('.hamburger');
        const mobileNav = document.querySelector('.nav-mobile');
        const mobileOverlay = document.querySelector('.mobile-overlay');
        if (hamburger && mobileNav) {
            hamburger.addEventListener('click', function() {
                const isActive = hamburger.classList.contains('active');
                hamburger.classList.toggle('active');
                mobileNav.classList.toggle('active');
                if (mobileOverlay) {
                    mobileOverlay.classList.toggle('active');
                }
                // Animate hamburger
                const spans = hamburger.querySelectorAll('span');
                if (!isActive) {
                    spans[0].style.transform = 'rotate(45deg) translate(7px, 7px)';
                    spans[1].style.opacity = '0';
                    spans[2].style.transform = 'rotate(-45deg) translate(7px, -7px)';
                    document.body.style.overflow = 'hidden';
                } else {
                    spans[0].style.transform = 'none';
                    spans[1].style.opacity = '1';
                    spans[2].style.transform = 'none';
                    document.body.style.overflow = '';
                }
            });
            // Close mobile menu when clicking outside
            document.addEventListener('click', function(e) {
                if (mobileNav && mobileNav.classList.contains('active') &&
                    !e.target.closest('.mobile-nav') &&
                    !e.target.closest('.nav-mobile')) {
                    hamburger.classList.remove('active');
                    mobileNav.classList.remove('active');
                    if (mobileOverlay) {
                        mobileOverlay.classList.remove('active');
                    }
                    const spans = hamburger ? hamburger.querySelectorAll('span') : [];
                    if (spans.length >= 3) {
                        spans[0].style.transform = 'none';
                        spans[1].style.opacity = '1';
                        spans[2].style.transform = 'none';
                    }
                    document.body.style.overflow = '';
                }
            });
            // Close mobile menu when clicking on links
            const mobileLinks = mobileNav ? mobileNav.querySelectorAll('a') : [];
            mobileLinks.forEach(link => {
                link.addEventListener('click', function() {
                    // Ensure elements exist before trying to manipulate them
                    if (hamburger && mobileNav) {
                         hamburger.classList.remove('active');
                         mobileNav.classList.remove('active');
                    }
                    if (mobileOverlay) {
                        mobileOverlay.classList.remove('active');
                    }
                    const spans = hamburger ? hamburger.querySelectorAll('span') : [];
                    if (spans.length >= 3) {
                        spans[0].style.transform = 'none';
                        spans[1].style.opacity = '1';
                        spans[2].style.transform = 'none';
                    }
                    document.body.style.overflow = '';
                });
            });
        }
        // Video autoplay handling (homepage)
        const video = document.querySelector('.hero-video');
        if (video) {
            video.addEventListener('loadedmetadata', function() {
                video.setAttribute('data-loaded', 'true');
            });
            const playPromise = video.play();
            if (playPromise !== undefined) {
                playPromise.catch(error => {
                    console.log('Autoplay prevented or failed:', error);
                    // Optional: Hide video or show fallback image if autoplay fails
                    // video.style.display = 'none';
                });
            }
        }
    });
    </script>
</head>
<body>
    <header class="header">
        <div class="container">
            <!-- Logo compus dintr-o imagine -->
            <a href="<?= $base_url ?>" class="logo">
                <img src="<?= $assets_path ?>img/logo-text.jpg" alt="Dachdecker Meisterbetrieb Der Hausmeister Michael GmbH" class="logo-text" width="200" height="50">
            </a>
            <!-- Meniu Desktop -->
            <nav class="nav-desktop" aria-label="Hauptnavigation">
                <ul>
                    <li><a href="<?= $base_url ?>" class="<?= $is_home ? 'active' : '' ?>">Heim</a></li>
                    <li><a href="<?= $base_url ?>about.php" class="<?= $current_page === 'about.php' ? 'active' : '' ?>">Über uns</a></li>
                    <li><a href="<?= $base_url ?>services.php" class="<?= $current_page === 'services.php' ? 'active' : '' ?>">Dienstleistungen</a></li>
                    <li><a href="<?= $base_url ?>projects.php" class="<?= $current_page === 'projects.php' ? 'active' : '' ?>">Unsere Projekte</a></li>
                    <li><a href="<?= $base_url ?>contact.php" class="<?= $current_page === 'contact.php' ? 'active' : '' ?> cta-button">Kontakt</a></li>
                </ul>
            </nav>
            <!-- Meniu Mobil -->
            <button class="hamburger mobile-nav" aria-label="Deschide meniul" aria-controls="nav-mobile" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <nav class="nav-mobile" id="nav-mobile">
                <ul>
                    <li><a href="<?= $base_url ?>" class="<?= $is_home ? 'active' : '' ?>">Heim</a></li>
                    <li><a href="<?= $base_url ?>about.php" class="<?= $current_page === 'about.php' ? 'active' : '' ?>">Über uns</a></li>
                    <li><a href="<?= $base_url ?>services.php" class="<?= $current_page === 'services.php' ? 'active' : '' ?>">Dienstleistungen</a></li>
                    <li><a href="<?= $base_url ?>projects.php" class="<?= $current_page === 'projects.php' ? 'active' : '' ?>">Unsere Projekte</a></li>
                    <li><a href="<?= $base_url ?>contact.php" class="<?= $current_page === 'contact.php' ? 'active' : '' ?>">Kontakt</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- Mobile overlay -->
    <div class="mobile-overlay"></div>
    <main>
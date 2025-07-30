<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- SEO Meta Tags -->
    <title><?= htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8') ?></title>
    <meta name="description" content="<?= htmlspecialchars($page_description, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="author" content="Der Hausmeister Michael GmbH">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?= $base_url ?>">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= $assets_path ?>img/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $assets_path ?>img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $assets_path ?>img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $assets_path ?>img/favicon-16x16.png">

    <!-- Preconnect pentru CDN-uri importante (Ajută la performanță) -->
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <!-- Dacă folosești Google Fonts, adaugă și preconnect pentru ele -->

    <!-- === CSS Concatenat și Minificat - Încărcare Asincronă === -->
    <!-- main.min.css conține: base/*, components/*, utilities/* -->
    <link rel="preload" href="<?= $assets_path ?>css/main.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?= $assets_path ?>css/main.min.css"></noscript>
    <!-- === Sfârșit CSS Concatenat și Minificat === -->

    <!-- External libraries - încărcare asincronă -->
    <!-- Font Awesome CSS -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></noscript>

    <!-- Lightbox CSS -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'" crossorigin>
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css"></noscript>

    <!-- Swiper CSS (doar pe homepage) -->
    <?php if ($is_home): ?>
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'" crossorigin>
    <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"></noscript>
    <?php endif; ?>
    <!-- === Sfârșit Biblioteci Externe === -->

    <!-- === CSS Critic Inline pentru Header - Asigură afișarea corectă fără FOUC === -->
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
    .logo {
        display: flex;
        align-items: center;
        text-decoration: none;
        z-index: 1011;
    }
    .logo-text {
        height: 40px;
        width: auto;
        transition: all 0.3s ease;
    }
    .nav-desktop {
        display: none;
    }
    .nav-mobile {
        display: none;
    }
    .hamburger {
        display: none;
        flex-direction: column;
        justify-content: space-between;
        width: 30px;
        height: 21px;
        background: transparent;
        border: none;
        cursor: pointer;
        padding: 0;
        z-index: 1012;
    }
    .hamburger span {
        width: 100%;
        height: 3px;
        background: #d32f2f;
        border-radius: 2px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        transform-origin: center;
    }
    .hamburger.active span:nth-child(1) {
        transform: translateY(9px) rotate(45deg);
    }
    .hamburger.active span:nth-child(2) {
        opacity: 0;
    }
    .hamburger.active span:nth-child(3) {
        transform: translateY(-9px) rotate(-45deg);
    }
    @media (min-width: 992px) {
        .hamburger {
            display: none;
        }
        .nav-mobile {
            display: none;
        }
        .nav-desktop {
            display: flex;
        }
        .nav-desktop ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            align-items: center;
            gap: 2rem;
        }
        .nav-desktop a {
            text-decoration: none;
            color: #333;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
        }
        .nav-desktop a:hover, .nav-desktop a.active {
            color: #d32f2f;
        }
        .nav-desktop a::before {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%) scaleX(0);
            width: 70%;
            height: 2px;
            background: #d32f2f;
            border-radius: 1px;
            transition: transform 0.3s ease;
        }
        .nav-desktop a:hover::before, .nav-desktop a.active::before {
            transform: translateX(-50%) scaleX(1);
        }
        .cta-button {
            background: linear-gradient(135deg, #d32f2f, #b71c1c);
            color: white !important;
            padding: 0.75rem 1.5rem !important;
            border-radius: 50px;
            font-weight: 700 !important;
            box-shadow: 0 4px 15px rgba(211, 47, 47, 0.3);
            transition: all 0.3s ease;
            border: none;
        }
        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(211, 47, 47, 0.4);
        }
        .cta-button::before {
            display: none;
        }
    }
    @media (max-width: 991.98px) {
        .nav-desktop, .header .cta-button {
            display: none;
        }
        .mobile-nav, .hamburger, .nav-mobile {
            display: block;
        }
        .hamburger {
            position: relative;
            display: flex;
        }
        .nav-mobile {
            position: fixed;
            top: 100px;
            left: -100%;
            width: 85%;
            max-width: 300px;
            height: calc(100vh - 100px);
            background: white;
            box-shadow: 5px 0 15px rgba(0, 0, 0, 0.1);
            transition: left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1008;
            padding: 2rem;
        }
        .nav-mobile.active {
            left: 0;
        }
        .nav-mobile ul {
            display: flex;
            flex-direction: column;
            list-style: none;
            padding: 0;
            margin: 0;
            gap: 1.5rem;
        }
        .nav-mobile a {
            text-decoration: none;
            color: #333;
            font-size: 1.2rem;
            font-weight: 600;
            padding: 0.5rem 0;
            display: block;
            transition: color 0.2s ease;
        }
        .nav-mobile a:hover, .nav-mobile a.active {
            color: #d32f2f;
        }
        .mobile-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1007;
            opacity: 0;
            visibility: hidden;
            transition: all 0.4s ease;
        }
        .mobile-overlay.active {
            opacity: 1;
            visibility: visible;
        }
    }
    @media (max-width: 768px) {
        .header {
            height: 80px;
        }
        .nav-mobile {
            top: 80px;
            height: calc(100vh - 80px);
        }
        .header.scrolled {
            height: 70px;
        }
        .logo-text {
            max-height: 35px;
        }
        .header.scrolled .logo-text {
            max-height: 30px;
        }
    }
    @media print {
        .header {
            position: static;
            box-shadow: none;
            background: white;
        }
        .nav-desktop a, .nav-mobile a {
            color: black !important;
        }
    }
    /* === PRINT - CRITICAL === */
    </style>
    <!-- /CSS Critic Inline pentru Header -->

    <!-- JavaScript pentru funcționalități critice (poate fi pus și în footer pentru non-critical JS) -->
    <script>
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
                    // Prevent body scroll when menu is open
                    document.body.style.overflow = isActive ? '' : 'hidden';
                });

                // Close menu if overlay is clicked
                if (mobileOverlay) {
                    mobileOverlay.addEventListener('click', function() {
                        hamburger.classList.remove('active');
                        mobileNav.classList.remove('active');
                        mobileOverlay.classList.remove('active');
                        document.body.style.overflow = '';
                    });
                }

                // Close menu if a link inside is clicked
                const mobileLinks = mobileNav.querySelectorAll('a');
                mobileLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        hamburger.classList.remove('active');
                        mobileNav.classList.remove('active');
                        if (mobileOverlay) {
                            mobileOverlay.classList.remove('active');
                        }
                        document.body.style.overflow = '';
                    });
                });
            }

            // Video autoplay handling (homepage)
            <?php if ($is_home): ?>
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
            <?php endif; ?>
        });
    </script>
</head>
<body>
    <header class="header">
        <div class="container">
            <!-- Logo compus dintr-o imagine -->
            <a href="<?= $base_url ?>" class="logo">
                <img src="<?= $assets_path ?>img/logo-text.jpg" alt="Dachdecker Meisterbetrieb Der Hausmeister Michael GmbH" class="logo-text" width="200" height="50" loading="eager"> <!-- loading=eager pentru logo -->
            </a>

            <!-- Meniu Desktop -->
            <nav class="nav-desktop" aria-label="Hauptnavigation">
                <ul>
                    <li><a href="<?= $base_url ?>" class="<?= $is_home ? 'active' : '' ?>">Heim</a></li>
                    <li><a href="<?= $base_url ?>about.php" class="<?= basename($_SERVER['PHP_SELF']) === 'about.php' ? 'active' : '' ?>">Über uns</a></li>
                    <li><a href="<?= $base_url ?>services.php" class="<?= basename($_SERVER['PHP_SELF']) === 'services.php' ? 'active' : '' ?>">Dienstleistungen</a></li>
                    <li><a href="<?= $base_url ?>projects.php" class="<?= basename($_SERVER['PHP_SELF']) === 'projects.php' ? 'active' : '' ?>">Unsere Projekte</a></li>
                    <li><a href="<?= $base_url ?>contact.php" class="<?= basename($_SERVER['PHP_SELF']) === 'contact.php' ? 'active' : '' ?> cta-button">Kontakt</a></li>
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
                    <li><a href="<?= $base_url ?>about.php" class="<?= basename($_SERVER['PHP_SELF']) === 'about.php' ? 'active' : '' ?>">Über uns</a></li>
                    <li><a href="<?= $base_url ?>services.php" class="<?= basename($_SERVER['PHP_SELF']) === 'services.php' ? 'active' : '' ?>">Dienstleistungen</a></li>
                    <li><a href="<?= $base_url ?>projects.php" class="<?= basename($_SERVER['PHP_SELF']) === 'projects.php' ? 'active' : '' ?>">Unsere Projekte</a></li>
                    <li><a href="<?= $base_url ?>contact.php" class="<?= basename($_SERVER['PHP_SELF']) === 'contact.php' ? 'active' : '' ?>">Kontakt</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Mobile overlay -->
    <div class="mobile-overlay"></div>

    <main>
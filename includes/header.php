<!DOCTYPE html>
<html lang="de"> <!-- Assuming German, adjust if needed -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Titlu și Meta Description - Esențiale pentru SEO -->
    <title><?= htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8') ?></title>
    <meta name="description" content="<?= htmlspecialchars($page_description, ENT_QUOTES, 'UTF-8') ?>">

    <!-- Preload resurse critice pentru afișarea inițială -->
    <link rel="preload" href="<?= $assets_path ?>img/logo-text.jpg" as="image">
    <!-- Preload your main CSS if needed (optional, often handled by the link tag itself) -->
    <!-- <link rel="preload" href="<?= $assets_path ?>css/main.css" as="style"> -->

    <!-- ===== MAIN STYLESHEET ===== -->
    <!-- This replaces all the individual CSS imports and the large inline critical CSS block -->
    <link rel="stylesheet" href="<?= $assets_path ?>css/main.css">
    <!-- ===== /MAIN STYLESHEET ===== -->

    <!-- Dacă ai un font custom critic, preconectează și preîncarcă-l -->
    <!-- Example for Google Fonts (if used and considered critical): -->
    <!--
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap"></noscript>
    -->

    <!-- Component CSS - încărcare asincronă (if you have other non-critical component CSS) -->
    <!-- Example for carousel if it's separate and non-critical -->
    <!--
    <link rel="preload" href="<?= $assets_path ?>css/components/carousel.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?= $assets_path ?>css/components/carousel.css"></noscript>
    -->
    <!-- Add other non-critical CSS files similarly if needed -->

    <!-- Google Analytics etc. would go here -->

</head>
<body>

    <!-- Header HTML Structure -->
    <header class="header">
        <div class="container">
            <a href="<?= $base_url ?>" class="logo">
                <img src="<?= $assets_path ?>img/logo-main.png" alt="Logo Der Hausmeister Michael GmbH" class="logo-main">
                <img src="<?= $assets_path ?>img/logo-text.jpg" alt="Der Hausmeister Michael GmbH" class="logo-text">
            </a>

            <!-- Desktop Navigation -->
            <nav class="nav-desktop">
                <ul>
                    <li><a href="<?= $base_url ?>index.php" class="<?= $current_page === 'index.php' ? 'active' : '' ?>">Home</a></li>
                    <li><a href="<?= $base_url ?>services.php" class="<?= $current_page === 'services.php' ? 'active' : '' ?>">Dienstleistungen</a></li>
                    <li><a href="<?= $base_url ?>projects.php" class="<?= $current_page === 'projects.php' ? 'active' : '' ?>">Unsere Projekte</a></li>
                    <li><a href="<?= $base_url ?>contact.php" class="<?= $current_page === 'contact.php' ? 'active' : '' ?>">Kontakt</a></li>
                </ul>
                <!-- CTA Button inside Desktop Nav (adjust if needed) -->
                <a href="<?= $base_url ?>contact.php" class="cta-button">Kostenlos Beraten</a>
            </nav>

            <!-- Mobile Hamburger Menu Toggle -->
            <button class="hamburger" aria-label="Menü umschalten" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>

    <!-- Mobile Navigation Menu (Hidden by CSS on desktop) -->
    <nav class="nav-mobile">
        <ul>
            <li><a href="<?= $base_url ?>index.php" class="<?= $current_page === 'index.php' ? 'active' : '' ?>">Home</a></li>
            <li><a href="<?= $base_url ?>services.php" class="<?= $current_page === 'services.php' ? 'active' : '' ?>">Dienstleistungen</a></li>
            <li><a href="<?= $base_url ?>projects.php" class="<?= $current_page === 'projects.php' ? 'active' : '' ?>">Unsere Projekte</a></li>
            <li><a href="<?= $base_url ?>contact.php" class="<?= $current_page === 'contact.php' ? 'active' : '' ?>">Kontakt</a></li>
            <!-- CTA Button inside Mobile Nav (adjust if needed) -->
            <li><a href="<?= $base_url ?>contact.php" class="btn btn--primary">Kostenlos Beraten</a></li>
        </ul>
    </nav>

    <!-- Mobile overlay -->
    <div class="mobile-overlay"></div>
    <!-- /Header HTML Structure -->

    <!-- JavaScript for Header Functionality -->
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

                    // Animate hamburger
                    const spans = hamburger.querySelectorAll('span');
                    if (!isActive) {
                        spans[0].style.transform = 'rotate(45deg) translate(7px, 7px)';
                        spans[1].style.opacity = '0';
                        spans[2].style.transform = 'rotate(-45deg) translate(7px, -7px)';
                        document.body.style.overflow = 'hidden'; // Prevent body scroll
                    } else {
                        spans[0].style.transform = 'none';
                        spans[1].style.opacity = '1';
                        spans[2].style.transform = 'none';
                        document.body.style.overflow = ''; // Restore body scroll
                    }
                });

                // Close mobile menu when clicking outside
                document.addEventListener('click', function(e) {
                    if (!hamburger.contains(e.target) && !mobileNav.contains(e.target) && hamburger.classList.contains('active')) {
                        hamburger.classList.remove('active');
                        mobileNav.classList.remove('active');
                        if (mobileOverlay) {
                            mobileOverlay.classList.remove('active');
                        }
                        // Reset hamburger animation
                        const spans = hamburger.querySelectorAll('span');
                        spans[0].style.transform = 'none';
                        spans[1].style.opacity = '1';
                        spans[2].style.transform = 'none';
                        document.body.style.overflow = ''; // Restore body scroll
                    }
                });
            }
        });
    </script>
    <!-- /JavaScript for Header Functionality -->

    <!-- Begin Main Content -->
    <main>
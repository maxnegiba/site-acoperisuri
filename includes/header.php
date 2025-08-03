<?php
// Determină URL-ul absolut al root-ului site-ului
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
$base_url = $protocol . $host . '/';
$assets_path = $base_url . 'assets/';

// Determină pagina curentă pentru meniul activ
$current_page = basename($_SERVER['PHP_SELF']);
$request_uri = $_SERVER['REQUEST_URI'];
$is_home = ($current_page === 'index.php' || $request_uri === '/' || $request_uri === '/');

// Asigură că $page_title și $page_description sunt definite
if (!isset($page_title)) {
    $page_title = 'MeisterDach - Dachdecker Meisterbetrieb';
}
if (!isset($page_description)) {
    $page_description = 'Professionelle Dachdecker, Klempner & Zimmermann in Berlin & Brandenburg. Über 20 Jahre Erfahrung. Kostenlose Beratung & Angebot!';
}

// Funcție pentru a determina toate fișierele CSS necesare
function getRequiredCSSFiles($current_page, $assets_path, $is_home) {
    $css_files = [];
    
    // Întotdeauna încarcă main.css pentru toate paginile
    $css_files[] = $assets_path . 'css/main.css';
    
    // Pentru paginile non-homepage, adaugă și CSS-ul specific
    if (!$is_home) {
        $page_specific_css = [
            'contact.php' => $assets_path . 'css/contact.css',
            'services.php' => $assets_path . 'css/services.css',
            'projects.php' => $assets_path . 'css/projects.css',
            'about.php' => $assets_path . 'css/about.css'
        ];
        
        if (isset($page_specific_css[$current_page])) {
            $css_files[] = $page_specific_css[$current_page];
        }
    }
    
    return $css_files;
}

// Obține toate fișierele CSS necesare
$required_css_files = getRequiredCSSFiles($current_page, $assets_path, $is_home);
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8') ?></title>
    <meta name="description" content="<?= htmlspecialchars($page_description, ENT_QUOTES, 'UTF-8') ?>">
    
    <!-- DNS Prefetch și Preconnect pentru optimizare -->
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    
    <!-- Preload resurse critice -->
    <link rel="preload" href="<?= $assets_path ?>css/main.css" as="style">
    <link rel="preload" href="<?= $assets_path ?>img/logo-text-optimized.webp" as="image" fetchpriority="high">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/webfonts/fa-solid-900.woff2" as="font" type="font/woff2" crossorigin>
    
    <?php if ($is_home): ?>
    <!-- Preload pentru homepage -->
    <link rel="preload" href="<?= $assets_path ?>img/hero-poster.jpg" as="image" fetchpriority="high">
    <link rel="preload" href="<?= $assets_path ?>video/hero-video.mp4" as="video" type="video/mp4">
    <?php endif; ?>
    
    <!-- CSS Critic Inline pentru eliminarea FOUC -->
    <style>
        /* === CRITICAL CSS === */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            margin: 0;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: #2c3e50;
            background: #ffffff;
            overflow-x: hidden;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        /* Header Critical Styles */
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
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            will-change: transform;
            contain: layout style paint;
        }
        
        .header.scrolled {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
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
        
        /* Logo Critical */
        .logo {
            display: flex;
            align-items: center;
            height: 100%;
            text-decoration: none;
            padding: 0;
            z-index: 1011;
            transition: transform 0.3s ease;
            gap: 8px;
            margin-right: auto;
        }
        
        .logo-text {
            width: 200px;
            height: 50px;
            object-fit: contain;
            filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.1));
            transition: all 0.3s ease;
            contain: layout;
        }
        
        /* Navigation Critical */
        .nav-desktop {
            display: flex;
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
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 8px;
            align-items: center;
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
            display: block;
        }
        
        .nav-desktop a.active {
            color: #fff;
            background: linear-gradient(135deg, #d32f2f, #b71c1c);
            box-shadow: 0 4px 15px rgba(211, 47, 47, 0.3);
            transform: translateY(-1px);
        }
        
        /* Mobile Navigation - Hidden by default */
        .hamburger,
        .nav-mobile,
        .mobile-overlay {
            display: none;
        }
        
        /* Main content spacing */
        main {
            flex: 1;
            width: 100%;
            margin-top: 100px;
            contain: layout;
        }
        
        /* Hero Section Critical (Homepage) */
        <?php if ($is_home): ?>
        .hero-section {
            position: relative;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: #000;
            contain: layout;
        }
        
        .hero-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 995;
            aspect-ratio: 16/9;
            background-color: #000;
            contain: layout style paint;
            will-change: transform, filter;
        }
        
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }
        
        .hero-content {
            position: relative;
            z-index: 1001;
            text-align: center;
            max-width: 1200px;
            width: 90%;
            padding: 2rem;
            color: white;
        }
        <?php endif; ?>
        
        /* Typography Critical */
        section h1, article h1, aside h1, nav h1 {
            font-size: 2.5rem !important;
        }
        
        /* Mobile Critical */
        @media (max-width: 991.98px) {
            .nav-desktop,
            .header .cta-button {
                display: none;
            }
            
            .hamburger {
                position: relative;
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(15px);
                border: 2px solid rgba(211, 47, 47, 0.1);
                border-radius: 12px;
                padding: 10px;
                width: 44px;
                height: 44px;
                display: flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
                min-width: 44px;
                min-height: 44px;
                z-index: 1012;
            }
            
            .hamburger span {
                position: absolute;
                left: 10px;
                height: 2px;
                width: 24px;
                background: linear-gradient(90deg, #d32f2f, #b71c1c);
                border-radius: 2px;
                transition: all 0.3s ease;
            }
            
            .hamburger span:nth-child(1) { top: 12px; }
            .hamburger span:nth-child(2) { top: 20px; }
            .hamburger span:nth-child(3) { top: 28px; }
            
            .nav-mobile {
                position: fixed;
                top: 100px;
                left: -100%;
                width: 85%;
                max-width: 300px;
                height: calc(100vh - 100px);
                background: linear-gradient(135deg, rgba(255, 255, 255, 0.98), rgba(248, 249, 250, 0.98));
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                box-shadow: 4px 0 30px rgba(0, 0, 0, 0.15);
                transition: left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                z-index: 1008;
                overflow-y: auto;
                border-right: 1px solid rgba(211, 47, 47, 0.1);
                display: block;
            }
            
            .nav-mobile.active {
                left: 0;
            }
            
            .mobile-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
                z-index: 1007;
                display: block;
            }
            
            .mobile-overlay.active {
                opacity: 1;
                visibility: visible;
            }
        }
        
        @media (max-width: 768px) {
            .header { height: 80px; }
            .nav-mobile { top: 80px; height: calc(100vh - 80px); }
            main { margin-top: 80px; }
            .logo-text { width: 160px; height: 40px; }
            section h1, article h1, aside h1, nav h1 { font-size: 2rem !important; }
        }
        
        /* Prevent FOUC */
        .no-js { visibility: hidden; }
    </style>
    
    <!-- Încărcare CSS principal -->
    <?php foreach ($required_css_files as $css_file): ?>
    <link rel="stylesheet" href="<?= $css_file ?>">
    <?php endforeach; ?>
    
    <!-- External CSS - încărcare asincronă -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></noscript>
    
    <!-- Swiper CSS -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"></noscript>
    
    <!-- GLightbox CSS (înlocuiește Lightbox2) -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css"></noscript>
    
    <!-- JavaScript Critic -->
    <script>
        // Remove no-js class
        document.documentElement.classList.remove('no-js');
        
        // Early header height detection
        window.addEventListener('DOMContentLoaded', function() {
            const header = document.querySelector('.header');
            if (header) {
                document.documentElement.style.setProperty('--header-height', header.offsetHeight + 'px');
            }
        });
    </script>
    
    <!-- JavaScript - încărcare optimizată -->
    <script src="<?= $assets_path ?>js/main.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js" defer></script>
    
    <!-- Structured Data pentru SEO -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "Der Hausmeister Michael GmbH",
        "description": "Professionelle Dachdecker, Klempner & Zimmermann in Berlin & Brandenburg",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Berlin",
            "addressRegion": "BE",
            "addressCountry": "DE"
        },
        "telephone": "+49XXXXXXXXX",
        "url": "<?= $base_url ?>",
        "priceRange": "€€",
        "openingHours": "Mo-Fr 08:00-18:00"
    }
    </script>
</head>
<body class="no-js">
    <!-- Skip to content link for accessibility -->
    <a href="#main" class="skip-link">Skip to main content</a>
    
    <header class="header">
        <div class="container">
            <!-- Logo -->
            <a href="<?= $base_url ?>" class="logo">
                <img src="<?= $assets_path ?>img/logo-text-optimized.webp" 
                     alt="Dachdecker Meisterbetrieb Der Hausmeister Michael GmbH" 
                     class="logo-text" 
                     width="200" 
                     height="50"
                     loading="eager"
                     decoding="async">
            </a>
            
            <!-- Desktop Navigation -->
            <nav class="nav-desktop" aria-label="Hauptnavigation">
                <ul>
                    <li><a href="<?= $base_url ?>" class="<?= $is_home ? 'active' : '' ?>">Heim</a></li>
                    <li><a href="<?= $base_url ?>about.php" class="<?= $current_page === 'about.php' ? 'active' : '' ?>">Über uns</a></li>
                    <li><a href="<?= $base_url ?>services.php" class="<?= $current_page === 'services.php' ? 'active' : '' ?>">Dienstleistungen</a></li>
                    <li><a href="<?= $base_url ?>projects.php" class="<?= $current_page === 'projects.php' ? 'active' : '' ?>">Unsere Projekte</a></li>
                    <li><a href="<?= $base_url ?>contact.php" class="<?= $current_page === 'contact.php' ? 'active' : '' ?> cta-button">Kontakt</a></li>
                </ul>
            </nav>
            
            <!-- Mobile Menu Button -->
            <button class="hamburger" aria-label="Menü öffnen" aria-controls="nav-mobile" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            
            <!-- Mobile Navigation -->
            <nav class="nav-mobile" id="nav-mobile" aria-label="Mobile Navigation">
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
    
    <main id="main">
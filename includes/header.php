<?php
// Determină URL-ul absolut al root-ului site-ului
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
$base_url = $protocol . $host . '/';
$assets_path = $base_url . 'assets/';

// Determină pagina curentă pentru meniul activ
$current_page = basename($_SERVER['PHP_SELF']);
$is_home = in_array($current_page, ['index.php', '']);

// CSS-uri necesare
$required_css_files = [
    $assets_path . 'css/main.css',
    'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css'
];
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MeisterDach - Acoperișuri de înaltă calitate</title>
    <meta name="description" content="Servicii profesionale de acoperișuri, reparații și întreținere. Lucrăm cu precizie și tradiție germană.">

    <!-- Preload fonturi critice -->
    <link rel="preload" href="<?= $assets_path ?>webfonts/fa-solid-900.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?= $assets_path ?>webfonts/fa-brands-400.woff2" as="font" type="font/woff2" crossorigin>

    <!-- Preload CSS critice -->
    <link rel="preload" href="<?= $assets_path ?>css/main.css" as="style">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" as="style">

    <!-- CSS Critic Inline pentru Header (evită FOUC) -->
    <style>
        /* === CRITICAL HEADER STYLES === */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: var(--z-header);
            height: var(--header-height);
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(248, 249, 250, 0.95));
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
            border-bottom: 1px solid rgba(211, 47, 47, 0.1);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            contain: layout style paint;
            will-change: transform;
        }
        .header.scrolled {
            height: 80px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .header .container {
            width: 100%;
            max-width: var(--max-container-width);
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100%;
            padding: 0 32px;
        }
        .logo-main, .logo-text {
            height: 60px;
            transition: height 0.3s ease;
        }
        .header.scrolled .logo-main,
        .header.scrolled .logo-text {
            height: 50px;
        }
        .nav-desktop a, .cta-button {
            opacity: 0;
            animation: fadeInUp 0.6s forwards;
        }
        @keyframes fadeInUp {
            to { opacity: 1; transform: translateY(0); }
        }

        /* === MOBILE NAV (hidden by default) === */
        .hamburger, .nav-mobile, .mobile-overlay {
            display: none;
        }

        @media (max-width: 991.98px) {
            .hamburger, .nav-mobile, .mobile-overlay {
                display: block;
            }
            .nav-desktop, .header .cta-button {
                display: none;
            }
        }
    </style>

    <!-- CSS Full -->
    <link rel="stylesheet" href="<?= $assets_path ?>css/main.css" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Prerender Swiper doar dacă e pe pagină -->
    <script>
        if (document.querySelector('.videoProjectsSwiper')) {
            const link = document.createElement('link');
            link.rel = 'stylesheet';
            link.href = 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css';
            document.head.appendChild(link);
        }
    </script>

    <!-- baguetteBox.js - în loc de lightbox2 (fără jQuery) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
</head>
<body>

<!-- Debug (șterge în producție) -->
<!--
Pagină curentă: <?= $current_page ?>
URL de bază: <?= $base_url ?>
Cale resurse: <?= $assets_path ?>
Este homepage: <?= $is_home ? 'Da' : 'Nu' ?>
-->

<header class="header">
    <div class="container">
        <!-- Logo -->
        <a href="<?= $base_url ?>" class="logo">
            <img src="<?= $assets_path ?>images/logo-main.svg" alt="MeisterDach - Acoperișuri de înaltă calitate" class="logo-main" width="160" height="60">
            <img src="<?= $assets_path ?>images/logo-text.svg" alt="MeisterDach" class="logo-text" width="200" height="50">
        </a>

        <!-- Navigație Desktop -->
        <nav class="nav-desktop">
            <a href="<?= $base_url ?>" class="<?= $is_home ? 'active' : '' ?>">Acasă</a>
            <a href="about.php" class="<?= $current_page === 'about.php' ? 'active' : '' ?>">Despre Noi</a>
            <a href="services.php" class="<?= $current_page === 'services.php' ? 'active' : '' ?>">Servicii</a>
            <a href="projects.php" class="<?= $current_page === 'projects.php' ? 'active' : '' ?>">Proiecte</a>
            <a href="contact.php" class="<?= $current_page === 'contact.php' ? 'active' : '' ?>">Contact</a>
        </nav>

        <!-- CTA Button -->
        <a href="contact.php" class="cta-button">
            <i class="fas fa-phone-alt"></i> Programați o consultare
        </a>

        <!-- Hamburger Menu (Mobil) -->
        <button class="hamburger" aria-label="Meniu mobil" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    <!-- Meniu Mobil -->
    <nav class="nav-mobile" aria-hidden="true">
        <ul>
            <li><a href="<?= $base_url ?>">Acasă</a></li>
            <li><a href="about.php">Despre Noi</a></li>
            <li><a href="services.php">Servicii</a></li>
            <li><a href="projects.php">Proiecte</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>

    <!-- Overlay Mobil -->
    <div class="mobile-overlay" aria-hidden="true"></div>
</header>

<!-- baguetteBox.js - galerii fără jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js" async></script>
<script>
    // Inițializează baguetteBox doar dacă există elemente cu galerie
    document.addEventListener('DOMContentLoaded', function () {
        if (document.querySelector('.gallery')) {
            baguetteBox.run('.gallery', {
                animation: 'fadeIn',
                noScrollbars: true,
                buttons: 'auto',
                fullScreen: false,
                callback: null
            });
        }
    });
</script>

<!-- JavaScript principal (defer) -->
<script src="<?= $assets_path ?>js/main.js" defer></script>

<!-- Swiper doar dacă există pe pagină -->
<script>
    if (document.querySelector('.videoProjectsSwiper')) {
        const script = document.createElement('script');
        script.src = 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js';
        script.defer = true;
        document.body.appendChild(script);
    }
</script>

<!-- Preconnect pentru CDN-uri -->
<link rel="preconnect" href="https://cdn.jsdelivr.net">
<link rel="preconnect" href="https://cdnjs.cloudflare.com">

<!-- Favicon -->
<link rel="icon" href="<?= $assets_path ?>images/favicon.ico">
<link rel="apple-touch-icon" sizes="180x180" href="<?= $assets_path ?>images/apple-touch-icon.png">
<body class="no-js">
    <!-- Skip to content link for accessibility -->
    <a href="#main" class="skip-link">Skip to main content</a>
    
    <header class="header">
        <div class="container">
            <!-- Logo -->
            <a href="<?= $base_url ?>" class="logo">
                <img src="<?= $assets_path ?>img/logo-text.webp" 
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
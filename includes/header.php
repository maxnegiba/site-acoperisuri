<?php
// Presupunem ca aceste variabile sunt setate in fisierul principal (index.php)
// $protocol, $host, $base_url, $assets_path
// $current_page, $is_home
// $page_title, $page_description

// Daca nu sunt setate, le putem defini aici ca fallback (de obicei sunt in index.php)
if (!isset($assets_path)) {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $base_url = $protocol . $host . '/';
    $assets_path = $base_url . 'assets/';
}

if (!isset($current_page)) {
    $current_page = basename($_SERVER['PHP_SELF']);
}
if (!isset($is_home)) {
    $request_uri = $_SERVER['REQUEST_URI'];
    $is_home = ($current_page === 'index.php' || $request_uri === '/' || $request_uri === '/');
}

// Asigura ca $page_title si $page_description sunt definite pentru fiecare pagina
// Paginile individuale le vor seta explicit
if (!isset($page_title)) {
    $page_title = 'MeisterDach - Dachdecker Meisterbetrieb';
}
if (!isset($page_description)) {
    // Descriere generala implicita, dar ideal ar fi una specifica pentru fiecare pagina
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

    <!-- Preconnect pentru CDN-uri - Ajută la performanță -->
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://cdn.jsdelivr.net">

    <!-- === CSS Concatenat si Minificat - Incarcare Asincrona === -->
    <!-- main.min.css contine: base/*, components/*, utilities/* -->
    <link rel="preload" href="<?= htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8') ?>css/main.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?= htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8') ?>css/main.min.css"></noscript>
    <!-- === Sfarsit CSS Concatenat si Minificat === -->

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

    <!-- === CSS Critic Inline pentru Header - Asigură afișarea corectă fără FOUC === -->
    <style>
        /* === CRITICAL HEADER STYLES - INLINE === */
        .header {
            --header-height: 100px;
            --header-height-scrolled: 70px;
            --z-header: 1010;
            --z-mobile-nav: 1008;
            --z-hero-video: -1;
            --z-overlay: 1005;
            --primary-color: #d32f2f;
            --primary-dark: #b71c1c;
            --secondary-color: #1976d2;
            --text-color: #333;
            --bg-color: #f8f9fa;
            --white: #ffffff;
            --light-gray: #f1f3f4;
            --border-color: rgba(211, 47, 47, 0.1);
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(248, 249, 250, 0.95));
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
            border-bottom: 1px solid var(--border-color);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: var(--z-header);
            height: var(--header-height);
            padding: 0;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .header.scrolled {
            height: var(--header-height-scrolled);
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.12);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
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
            transition: height 0.3s ease;
        }

        .header.scrolled .logo-text {
            height: 35px;
        }

        /* Desktop Navigation */
        .nav-desktop {
            display: flex;
            align-items: center;
        }

        .nav-desktop ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-desktop li {
            margin: 0 10px;
        }

        .nav-desktop a {
            text-decoration: none;
            color: var(--text-color);
            font-weight: 600;
            font-size: 16px;
            padding: 8px 12px;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-desktop a:hover,
        .nav-desktop a:focus,
        .nav-desktop a.active {
            color: var(--primary-color);
        }

        .nav-desktop a.active::after {
             content: '';
             position: absolute;
             bottom: -5px;
             left: 50%;
             transform: translateX(-50%);
             width: 60%;
             height: 3px;
             background-color: var(--primary-color);
             border-radius: 2px;
        }

        .nav-desktop .cta-button {
            background: var(--primary-color);
            color: white !important;
            padding: 10px 20px;
            margin-left: 15px;
            border-radius: 30px;
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(211, 47, 47, 0.2);
            transition: all 0.3s ease;
        }

        .nav-desktop .cta-button:hover,
        .nav-desktop .cta-button:focus {
            background: var(--primary-dark);
            box-shadow: 0 6px 16px rgba(211, 47, 47, 0.3);
            transform: translateY(-2px);
        }

        /* Mobile Navigation */
        .hamburger {
            display: none;
            flex-direction: column;
            justify-content: space-around;
            width: 30px;
            height: 30px;
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 0;
            z-index: 1012;
            transition: transform 0.3s ease;
        }

        .hamburger span {
            width: 100%;
            height: 3px;
            background: var(--text-color);
            border-radius: 10px;
            transition: all 0.3s ease;
            transform-origin: center;
        }

        .hamburger.active {
            transform: rotate(90deg);
        }

        .hamburger.active span:nth-child(1) {
            transform: rotate(45deg) translate(7px, 7px);
        }

        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -7px);
        }

        .nav-mobile {
            display: none;
            position: fixed;
            top: var(--header-height);
            left: -100%;
            width: 85%;
            max-width: 300px;
            height: calc(100vh - var(--header-height));
            background: var(--white);
            box-shadow: 2px 0 12px rgba(0, 0, 0, 0.1);
            z-index: var(--z-mobile-nav);
            transition: left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow-y: auto;
        }

        .nav-mobile.active {
            left: 0;
        }

        .nav-mobile ul {
            list-style: none;
            padding: 30px 0;
            margin: 0;
        }

        .nav-mobile li {
            margin-bottom: 5px;
        }

        .nav-mobile a {
            display: block;
            padding: 15px 30px;
            text-decoration: none;
            color: var(--text-color);
            font-weight: 600;
            font-size: 18px;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .nav-mobile a:hover,
        .nav-mobile a:focus,
        .nav-mobile a.active {
            background: var(--light-gray);
            color: var(--primary-color);
            border-left-color: var(--primary-color);
        }

        .nav-mobile .cta-button {
            background: var(--primary-color);
            color: white !important;
            padding: 12px 25px;
            margin: 20px 30px;
            border-radius: 30px;
            font-weight: 700;
            text-align: center;
            box-shadow: 0 4px 12px rgba(211, 47, 47, 0.2);
            transition: all 0.3s ease;
        }

        .nav-mobile .cta-button:hover,
        .nav-mobile .cta-button:focus {
            background: var(--primary-dark);
            box-shadow: 0 6px 16px rgba(211, 47, 47, 0.3);
        }

        .mobile-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1005;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .mobile-overlay.active {
            display: block;
            opacity: 1;
        }

        /* Responsive adjustments */
        @media (max-width: 991.98px) {
            .nav-desktop,
            .header .cta-button:not(.nav-mobile .cta-button) {
                /* Ascunde pe mobil, cu exceptia CTA-ului din meniul mobil daca exista acolo */
                display: none;
            }

            .mobile-nav,
            .hamburger,
            .nav-mobile {
                /* Asigura afisarea pe mobil */
                display: block;
            }

            /* Adaugă aici și stilurile critice minime pentru .hamburger și .nav-mobile dacă sunt esențiale pentru layout-ul inițial */
            .hamburger {
                position: relative;
                /* ... restul stilurilor critice minime pentru hamburger ... */
                display: flex;
                /* Asigură afișarea corectă */
            }

            .nav-mobile {
                /* Stiluri critice minime pentru poziționare inițială */
                position: fixed;
                top: var(--header-height);
                left: -100%;
                /* Ascuns inițial */
                width: 85%;
                max-width: 300px;
                height: calc(100vh - var(--header-height));
                transition: left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                /* Tranziția este critică */
                z-index: var(--z-mobile-nav);
            }

            .nav-mobile.active {
                left: 0;
                /* Afișat când e activ */
            }
        }

        /* Adaugă și alte media queries critice dacă afectează layout-ul imediat (ex: schimbări de înălțime pe mobil) */
        @media (max-width: 768px) {
            .header {
                --header-height: 80px;
                height: var(--header-height);
                padding: 0 20px;
            }

            .nav-mobile {
                top: var(--header-height);
                height: calc(100vh - var(--header-height));
            }

            .header.scrolled {
                --header-height-scrolled: 70px;
                height: var(--header-height-scrolled);
            }

            /* Adaugă aici stiluri critice pentru logo dacă se schimbă dimensiunea */
            .logo-text {
                height: 35px;
            }

            .header.scrolled .logo-text {
                height: 30px;
            }
        }

        /* === PRINT - CRITICAL === */
        @media print {
            .header {
                position: static;
                box-shadow: none;
                background: white;
            }

            .nav-desktop a,
            .nav-mobile a {
                color: black !important;
            }
        }
    </style>
    <!-- /CSS Critic Inline pentru Header -->

    <!-- Page specific CSS - încărcare asincronă -->
    <?php if ($current_page === 'contact.php'): ?>
        <link rel="preload" href="<?= htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8') ?>css/contact.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8') ?>css/contact.css"></noscript>
    <?php endif; ?>
    <?php if ($current_page === 'services.php'): ?>
        <link rel="preload" href="<?= htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8') ?>css/services.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8') ?>css/services.css"></noscript>
    <?php endif; ?>
    <!-- /Page specific CSS -->

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8') ?>img/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8') ?>img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8') ?>img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8') ?>img/favicon-16x16.png">

</head>
<body>
    <header class="header">
        <div class="container">
            <!-- Logo compus dintr-o imagine -->
            <a href="<?= htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8') ?>" class="logo">
                <img src="<?= htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8') ?>img/logo-text.jpg" alt="Dachdecker Meisterbetrieb Der Hausmeister Michael GmbH" class="logo-text" width="200" height="50" loading="eager"> <!-- Logo critical, load eagerly -->
            </a>

            <!-- Meniu Desktop -->
            <nav class="nav-desktop" aria-label="Hauptnavigation">
                <ul>
                    <li><a href="<?= htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8') ?>" class="<?= $is_home ? 'active' : '' ?>">Heim</a></li>
                    <li><a href="<?= htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8') ?>about.php" class="<?= $current_page === 'about.php' ? 'active' : '' ?>">Über uns</a></li>
                    <li><a href="<?= htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8') ?>services.php" class="<?= $current_page === 'services.php' ? 'active' : '' ?>">Dienstleistungen</a></li>
                    <li><a href="<?= htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8') ?>projects.php" class="<?= $current_page === 'projects.php' ? 'active' : '' ?>">Unsere Projekte</a></li>
                    <li><a href="<?= htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8') ?>contact.php" class="<?= $current_page === 'contact.php' ? 'active' : '' ?> cta-button">Kontakt</a></li>
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
                    <li><a href="<?= htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8') ?>" class="<?= $is_home ? 'active' : '' ?>">Heim</a></li>
                    <li><a href="<?= htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8') ?>about.php" class="<?= $current_page === 'about.php' ? 'active' : '' ?>">Über uns</a></li>
                    <li><a href="<?= htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8') ?>services.php" class="<?= $current_page === 'services.php' ? 'active' : '' ?>">Dienstleistungen</a></li>
                    <li><a href="<?= htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8') ?>projects.php" class="<?= $current_page === 'projects.php' ? 'active' : '' ?>">Unsere Projekte</a></li>
                    <li><a href="<?= htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8') ?>contact.php" class="<?= $current_page === 'contact.php' ? 'active' : '' ?>">Kontakt</a></li>
                    <!-- CTA mobil duplicat pentru accesibilitate -->
                    <li><a href="<?= htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8') ?>contact.php" class="cta-button">Kontakt</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Mobile overlay -->
    <div class="mobile-overlay"></div>

    <main>
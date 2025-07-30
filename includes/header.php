<?php
// header.php - Include pentru antetul site-ului

// Presupunem ca aceste variabile sunt setate in fisierul principal (ex: index.php, about.php)
// Daca nu sunt setate, le putem defini aici ca fallback

// Determina protocolul (HTTP/HTTPS)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];

// Construieste URL-ul de baza si calea catre asset-uri
$base_url = $protocol . $host . '/';
$assets_path = $base_url . 'assets/'; // Ajusteaza daca structura folderelor e diferita

// Determina pagina curenta
if (!isset($current_page)) {
    $current_page = basename($_SERVER['PHP_SELF']);
}

// Determina daca este pagina principala (home)
if (!isset($is_home)) {
    $request_uri = $_SERVER['REQUEST_URI'];
    // Verifica mai multe variante posibile pentru homepage
    $is_home = ($current_page === 'index.php' || $request_uri === '/' || $request_uri === '/index.php');
}

// Asigura ca $page_title si $page_description sunt definite pentru fiecare pagina
// Paginile individuale le vor seta explicit *inainte* de include('header.php')
if (!isset($page_title)) {
    $page_title = 'MeisterDach - Dachdecker Meisterbetrieb'; // Titlu implicit
}
if (!isset($page_description)) {
    $page_description = 'Professionelle Dachdecker, Klempner & Zimmermann in Berlin & Brandenburg. Über 20 Jahre Erfahrung. Kostenlose Beratung & Angebot!'; // Descriere implicita
}
?>
<!DOCTYPE html>
<html lang="de"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($page_description, ENT_QUOTES, 'UTF-8'); ?>">
    
    <!-- Preconnect pentru fonturi si CDN-uri (optional, dar bun pentru performanta) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8'); ?>img/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8'); ?>img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8'); ?>img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8'); ?>img/favicon-16x16.png">


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
            contain: layout style paint; /* Prevent shifts */
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
            display: flex;
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
            color: var(--text-primary);
            font-weight: 600;
            font-size: 15px;
            padding: 12px 20px;
            border-radius: 25px;
            position: relative;
            transition: all 0.3s ease;
            overflow: hidden;
            display: block;
        }

         /* === LOGO - CRITICAL === */
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

        .logo-main {
            height: 100%;
            width: auto;
            max-height: 60px;
            filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.1));
            transition: all 0.3s ease;
        }

        .logo-text {
            width: 200px;
            height: 50px;
            object-fit: contain;
        }

        /* === HAMBURGER MENU - CRITICAL === */
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
            z-index: 1011;
            position: relative;
        }

        .hamburger span {
            position: absolute;
            left: 0;
            height: 2px;
            width: 100%;
            background: linear-gradient(90deg, var(--primary-color), var(--primary-dark));
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .hamburger span:nth-child(1) { top: 12px; }
        .hamburger span:nth-child(2) { top: 20px; }
        .hamburger span:nth-child(3) { top: 28px; }

        .hamburger.active span:nth-child(1) { transform: rotate(45deg) translate(7px, 7px); }
        .hamburger.active span:nth-child(2) { opacity: 0; }
        .hamburger.active span:nth-child(3) { transform: rotate(-45deg) translate(7px, -7px); }

        /* === MOBILE NAVIGATION - CRITICAL === */
        .nav-mobile {
            position: fixed;
            top: 100px; /* Initial, va fi ajustat de JS/media queries */
            left: -100%;
            width: 85%;
            max-width: 300px;
            height: calc(100vh - 100px); /* Initial, va fi ajustat */
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.98), rgba(248, 249, 250, 0.98));
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 4px 0 30px rgba(0, 0, 0, 0.15);
            transition: left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1008;
            overflow-y: auto;
            border-right: 1px solid rgba(211, 47, 47, 0.1);
        }

        .nav-mobile.active {
            left: 0; /* Afișat când e activ */
        }

        /* Mobile overlay */
        .mobile-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1007;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .mobile-overlay.active {
            display: block;
            opacity: 1;
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

    <!-- Page specific CSS - încărcare asincronă -->
    <?php if ($is_home): ?>
        <!-- CSS specific paginii principale -->
        <link rel="preload" href="<?php echo htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8'); ?>css/main.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?php echo htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8'); ?>css/main.css"></noscript>
    <?php else: ?>
        <!-- CSS principal (pentru alte pagini, presupunand ca main.css contine stiluri globale) -->
        <link rel="preload" href="<?php echo htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8'); ?>css/main.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?php echo htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8'); ?>css/main.css"></noscript>

        <!-- CSS specifice pentru alte pagini (doar daca exista si sunt necesare) -->
        <?php if ($current_page === 'contact.php'): ?>
            <link rel="preload" href="<?php echo htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8'); ?>css/contact.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
            <noscript><link rel="stylesheet" href="<?php echo htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8'); ?>css/contact.css"></noscript>
        <?php endif; ?>

        <?php if ($current_page === 'services.php'): ?>
            <link rel="preload" href="<?php echo htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8'); ?>css/services.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
            <noscript><link rel="stylesheet" href="<?php echo htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8'); ?>css/services.css"></noscript>
        <?php endif; ?>

        <?php if ($current_page === 'projects.php'): ?>
            <link rel="preload" href="<?php echo htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8'); ?>css/projects.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
            <noscript><link rel="stylesheet" href="<?php echo htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8'); ?>css/projects.css"></noscript>
             <!-- Include Swiper CSS pentru projects.php -->
             <link rel="preload" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
             <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"></noscript>
        <?php endif; ?>

        <?php if ($current_page === 'about.php'): ?>
            <link rel="preload" href="<?php echo htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8'); ?>css/about.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
            <noscript><link rel="stylesheet" href="<?php echo htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8'); ?>css/about.css"></noscript>
        <?php endif; ?>
    <?php endif; ?>
    <!-- /Page specific CSS -->

</head>
<body>
    <header class="header">
        <div class="container">
            <!-- Logo -->
            <a href="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>" class="logo" aria-label="Zur Startseite">
                <img src="<?php echo htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8'); ?>img/logo-main.png" alt="MeisterDach Logo" class="logo-main" width="60" height="60">
                <img src="<?php echo htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8'); ?>img/logo-text.png" alt="MeisterDach" class="logo-text">
            </a>

            <!-- Navigatie Desktop -->
            <nav class="nav-desktop" aria-label="Hauptnavigation">
                <ul>
                    <li><a href="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>" class="<?php echo $is_home ? 'active' : ''; ?>">Heim</a></li>
                    <li><a href="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>about.php" class="<?php echo $current_page === 'about.php' ? 'active' : ''; ?>">Über uns</a></li>
                    <li><a href="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>services.php" class="<?php echo $current_page === 'services.php' ? 'active' : ''; ?>">Dienstleistungen</a></li>
                    <li><a href="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>projects.php" class="<?php echo $current_page === 'projects.php' ? 'active' : ''; ?>">Unsere Projekte</a></li>
                    <li><a href="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>contact.php" class="<?php echo $current_page === 'contact.php' ? 'active' : ''; ?> cta-button">Kontakt</a></li>
                </ul>
            </nav>

            <!-- Meniu Mobil -->
            <button class="hamburger mobile-nav" aria-label="Menü öffnen" aria-controls="nav-mobile" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <nav class="nav-mobile" id="nav-mobile" aria-label="Hauptnavigation mobil">
                <ul>
                    <li><a href="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>" class="<?php echo $is_home ? 'active' : ''; ?>">Heim</a></li>
                    <li><a href="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>about.php" class="<?php echo $current_page === 'about.php' ? 'active' : ''; ?>">Über uns</a></li>
                    <li><a href="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>services.php" class="<?php echo $current_page === 'services.php' ? 'active' : ''; ?>">Dienstleistungen</a></li>
                    <li><a href="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>projects.php" class="<?php echo $current_page === 'projects.php' ? 'active' : ''; ?>">Unsere Projekte</a></li>
                    <li><a href="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>contact.php" class="<?php echo $current_page === 'contact.php' ? 'active' : ''; ?>">Kontakt</a></li>
                    <!-- CTA mobil duplicat pentru accesibilitate -->
                    <li><a href="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>contact.php" class="cta-button">Kontakt</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Mobile overlay -->
    <div class="mobile-overlay" id="mobile-overlay"></div>

    <main>
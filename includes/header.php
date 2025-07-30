<?php
// header.php - Include pentru antetul site-ului
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
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" as="style" onload="this.rel='stylesheet'">
<style>
  @font-face {
    font-family: 'Font Awesome';
    font-display: swap;
    src: url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/webfonts/fa-solid-900.woff2') format('woff2'),
         url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/webfonts/fa-brands-400.woff2') format('woff2');
  }
</style>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">

    <!-- === CSS Concatenat si Minificat - Incarcare Asincrona === -->
    <!-- === CSS Concatenat si Minificat - Incarcare Asincrona (pentru TOATE paginile) === -->
    <link rel="preload" href="<?= htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8') ?>css/main.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?= htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8') ?>css/main.min.css"></noscript>
    <!-- === Sfarsit CSS Concatenat si Minificat === -->
    <link rel="preload" href="<?= $assets_path ?>img/logo-text.jpg" as="image">  
    <!-- External libraries - încărcare asincronă -->
     <script src="<?php echo htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8'); ?>js/main.js" defer></script>
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

   
    <!-- /CSS Critic Inline pentru Header -->

  <!-- Page specific CSS - încărcare asincronă -->
    <?php if ($is_home): ?>
        <!-- CSS specific paginii principale -->
        <link rel="preload" href="<?= htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8') ?>css/main.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8') ?>css/main.css"></noscript>
    <?php else: ?>

    

        <!-- CSS specifice pentru alte pagini -->
        <?php if ($current_page === 'contact.php'): ?>
            <link rel="preload" href="<?= htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8') ?>css/contact.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
            <noscript><link rel="stylesheet" href="<?= htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8') ?>css/contact.css"></noscript>
        <?php endif; ?>
        <?php if ($current_page === 'services.php'): ?>
            <link rel="preload" href="<?= htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8') ?>css/services.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
            <noscript><link rel="stylesheet" href="<?= htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8') ?>css/services.css"></noscript>
        <?php endif; ?>
        <?php if ($current_page === 'projects.php'): ?>
            <link rel="preload" href="<?= htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8') ?>css/projects.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
            <noscript><link rel="stylesheet" href="<?= htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8') ?>css/projects.css"></noscript>
        <?php endif; ?>
        <?php if ($current_page === 'about.php'): ?>
            <link rel="preload" href="<?= htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8') ?>css/about.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
            <noscript><link rel="stylesheet" href="<?= htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8') ?>css/about.css"></noscript>
        <?php endif; ?>
    <?php endif; ?>
    <!-- /Page specific CSS -->
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
                <<img src="<?= htmlspecialchars($assets_path, ENT_QUOTES, 'UTF-8') ?>img/logo-text.jpg" 
     alt="Dachdecker Meisterbetrieb Der Hausmeister Michael GmbH" 
     class="logo-text" width="200" height="50" loading="eager"
     style="background-color: rgba(255,255,255,0.1);">
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
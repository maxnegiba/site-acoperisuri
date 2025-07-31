<?php
$protocol    = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host        = $_SERVER['HTTP_HOST'];
$base_url    = $protocol . $host . '/';
$assets_path = $base_url . 'assets/';

$current_page = basename($_SERVER['PHP_SELF']);
$request_uri  = $_SERVER['REQUEST_URI'];
$is_home      = ($current_page === 'index.php' || $request_uri === '/' || $request_uri === '/');

$page_title       = $page_title ?? 'MeisterDach – Dachdecker Meisterbetrieb';
$page_description = $page_description ?? 'Professionelle Dachdecker, Klempner & Zimmermann in Berlin & Brandenburg. Über 20 Jahre Erfahrung. Kostenlose Beratung & Angebot!';
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8') ?></title>
    <meta name="description" content="<?= htmlspecialchars($page_description, ENT_QUOTES, 'UTF-8') ?>">

    <!-- Critical inline styles (header & layout) -->
    <style>
        :root{
            --primary-color:#d32f2f;
            --header-height:100px;
            --header-height-mobile:80px;
            --max-container-width:1400px;
            --z-high:1000;
        }
        *{margin:0;padding:0;box-sizing:border-box}
        body{font-family:'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;line-height:1.6;color:#2c3e50;overflow-x:hidden}
        .header{
            position:fixed;inset:0 0 auto;z-index:var(--z-high);
            height:var(--header-height);padding:0;
            background:linear-gradient(135deg,rgba(255,255,255,.95),rgba(248,249,250,.95));
            backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);
            box-shadow:0 8px 32px rgba(0,0,0,.08);
            transition:all .4s cubic-bezier(.4,0,.2,1);
        }
        .header .container{
            width:100%;max-width:var(--max-container-width);margin:0 auto;
            display:flex;align-items:center;justify-content:space-between;
            height:100%;padding:0 32px;
        }
        .logo img{max-height:50px;width:auto}
        .nav-desktop{display:flex;gap:.5rem;margin-left:auto}
        .nav-desktop ul{display:flex;gap:.5rem;list-style:none}
        .nav-desktop a{color:#2c3e50;font-weight:600;padding:.75rem 1.25rem;border-radius:25px;transition:all .3s}
        .nav-desktop a.active,.nav-desktop a:hover{background:var(--primary-color);color:#fff}
        .hamburger{display:none;flex-direction:column;gap:4px;background:transparent;border:none;cursor:pointer}
        .hamburger span{width:24px;height:2px;background:var(--primary-color);transition:.3s}
        .nav-mobile{display:none;position:fixed;top:var(--header-height);left:-100%;width:85%;max-width:300px;height:calc(100vh - var(--header-height));background:#fff;transition:left .4s;z-index:calc(var(--z-high) + 5)}
        .nav-mobile.active{left:0}
        @media(max-width:991.98px){
            .nav-desktop{display:none}
            .hamburger,.nav-mobile{display:block}
            .header{height:var(--header-height-mobile)}
            .nav-mobile{top:var(--header-height-mobile);height:calc(100vh - var(--header-height-mobile))}
        }
    </style>

    <!-- Unified CSS & external libs -->
    <link rel="preload" href="<?= $assets_path ?>css/all.css" as="style">
    <link rel="stylesheet" href="<?= $assets_path ?>css/all.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" media="print" onload="this.media='all'">

    <!-- Scripts (deferred) -->
    <script src="<?= $assets_path ?>js/main.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js" defer></script>
</head>
<body>
    <header class="header">
        <div class="container">
            <a href="<?= $base_url ?>" class="logo">
                <img src="<?= $assets_path ?>img/logo-text.jpg" alt="Der Hausmeister Michael GmbH" width="200" height="50">
            </a>

            <nav class="nav-desktop" aria-label="Hauptnavigation">
                <ul>
                    <li><a href="<?= $base_url ?>" class="<?= $is_home ? 'active' : '' ?>">Heim</a></li>
                    <li><a href="<?= $base_url ?>about.php" class="<?= $current_page==='about.php'?'active':'' ?>">Über uns</a></li>
                    <li><a href="<?= $base_url ?>services.php" class="<?= $current_page==='services.php'?'active':'' ?>">Dienstleistungen</a></li>
                    <li><a href="<?= $base_url ?>projects.php" class="<?= $current_page==='projects.php'?'active':'' ?>">Unsere Projekte</a></li>
                    <li><a href="<?= $base_url ?>contact.php" class="<?= $current_page==='contact.php'?'active':'' ?> cta-button">Kontakt</a></li>
                </ul>
            </nav>

            <button class="hamburger mobile-nav" aria-label="Menü öffnen" aria-controls="nav-mobile" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
            <nav class="nav-mobile" id="nav-mobile">
                <ul>
                    <li><a href="<?= $base_url ?>" class="<?= $is_home ? 'active' : '' ?>">Heim</a></li>
                    <li><a href="<?= $base_url ?>about.php" class="<?= $current_page==='about.php'?'active':'' ?>">Über uns</a></li>
                    <li><a href="<?= $base_url ?>services.php" class="<?= $current_page==='services.php'?'active':'' ?>">Dienstleistungen</a></li>
                    <li><a href="<?= $base_url ?>projects.php" class="<?= $current_page==='projects.php'?'active':'' ?>">Unsere Projekte</a></li>
                    <li><a href="<?= $base_url ?>contact.php" class="<?= $current_page==='contact.php'?'active':'' ?>">Kontakt</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="mobile-overlay"></div>
    <main>
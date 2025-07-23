<?php
// Determină URL-ul absolut al root-ului site-ului
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
$base_url = $protocol . $host . '/';
$assets_path = $base_url . 'assets/';

// Determină pagina curentă pentru meniul activ
$current_page = basename($_SERVER['PHP_SELF']);
$request_uri = $_SERVER['REQUEST_URI'];
$is_home = ($current_page === 'index.php' || $request_uri === '/' || $request_uri === '');
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?? 'MeisterDach - Dachdecker Meisterbetrieb' ?></title>
    <meta name="description" content="<?= $page_description ?? 'Professionelle Dachdeckerarbeiten vom Meisterbetrieb. Qualität, Zuverlässigkeit und Erfahrung seit Jahren.' ?>">
    
    <!-- Preload critical resources -->
    <link rel="preload" href="<?= $assets_path ?>css/base/variables.css" as="style">
    <link rel="preload" href="<?= $assets_path ?>css/base/reset.css" as="style">
    <link rel="preload" href="<?= $assets_path ?>img/logo-main.png" as="image">
    <link rel="preload" href="<?= $assets_path ?>img/logo-text.png" as="image">
    
    <!-- Critical CSS -->
    <link rel="stylesheet" href="<?= $assets_path ?>css/base/variables.css">
    <link rel="stylesheet" href="<?= $assets_path ?>css/base/reset.css">
    <link rel="stylesheet" href="<?= $assets_path ?>css/base/typography.css">
    <link rel="stylesheet" href="<?= $assets_path ?>css/base/animations.css">
    
    <!-- Component CSS -->
    <link rel="stylesheet" href="<?= $assets_path ?>css/components/header.css">
    <link rel="stylesheet" href="<?= $assets_path ?>css/components/buttons.css">
    
    <!-- Page specific CSS -->
    <?php if ($current_page === 'index.php' || $is_home): ?>
        <link rel="stylesheet" href="<?= $assets_path ?>css/main.css">
    <?php endif; ?>
    
    <?php if ($current_page === 'contact.php'): ?>
        <link rel="stylesheet" href="<?= $assets_path ?>css/contact.css">
    <?php endif; ?>
    
    <?php if ($current_page === 'services.php'): ?>
        <link rel="stylesheet" href="<?= $assets_path ?>css/services.css">
    <?php endif; ?>
    
    <?php if ($current_page === 'projects.php'): ?>
        <link rel="stylesheet" href="<?= $assets_path ?>css/projects.css">
    <?php endif; ?>
    
    <?php if ($current_page === 'about.php'): ?>
        <link rel="stylesheet" href="<?= $assets_path ?>css/about.css">
    <?php endif; ?>
    
    <!-- External libraries -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
   <!-- In header.php -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css">

<script src="<?= $assets_path ?>js/main.js" defer></script>



    
    <!-- Critical JavaScript pentru header -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Header scroll effect
        const header = document.querySelector('.header');
        const heroSection = document.querySelector('.hero-section');
        
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
            
            // Update hero padding
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
                if (mobileNav.classList.contains('active') && 
                    !e.target.closest('.mobile-nav') && 
                    !e.target.closest('.nav-mobile')) {
                    
                    hamburger.classList.remove('active');
                    mobileNav.classList.remove('active');
                    
                    if (mobileOverlay) {
                        mobileOverlay.classList.remove('active');
                    }
                    
                    const spans = hamburger.querySelectorAll('span');
                    spans[0].style.transform = 'none';
                    spans[1].style.opacity = '1';
                    spans[2].style.transform = 'none';
                    document.body.style.overflow = '';
                }
            });
            
            // Close mobile menu when clicking on links
            const mobileLinks = mobileNav.querySelectorAll('a');
            mobileLinks.forEach(link => {
                link.addEventListener('click', function() {
                    hamburger.classList.remove('active');
                    mobileNav.classList.remove('active');
                    
                    if (mobileOverlay) {
                        mobileOverlay.classList.remove('active');
                    }
                    
                    const spans = hamburger.querySelectorAll('span');
                    spans[0].style.transform = 'none';
                    spans[1].style.opacity = '1';
                    spans[2].style.transform = 'none';
                    document.body.style.overflow = '';
                });
            });
        }
        
        // Video autoplay handling
        const video = document.querySelector('.hero-video');
        if (video) {
            video.addEventListener('loadedmetadata', function() {
                video.setAttribute('data-loaded', 'true');
            });
            
            const playPromise = video.play();
            if (playPromise !== undefined) {
                playPromise.catch(error => {
                    console.log('Autoplay prevented:', error);
                    video.style.display = 'none';
                });
            }
        }
    });
    </script>
</head>
<body>
    <header class="header">
        <div class="container">
            <!-- Logo compus din două imagini -->
            <a href="<?= $base_url ?>" class="logo">
            
                <img src="<?= $assets_path ?>img/logo-text.jpg" alt="Dachdecker Meisterbetrieb" class="logo-text">
            </a>

            <!-- Meniu Desktop -->
            <nav class="nav-desktop">
                <ul>
                    <li><a href="<?= $base_url ?>" class="<?= $is_home ? 'active' : '' ?>">Heim</a></li>
                    <li><a href="<?= $base_url ?>about.php" class="<?= $current_page === 'about.php' ? 'active' : '' ?>">Über uns</a></li>
                    <li><a href="<?= $base_url ?>services.php" class="<?= $current_page === 'services.php' ? 'active' : '' ?>">Dienstleistungen</a></li>
                    <li><a href="<?= $base_url ?>projects.php" class="<?= $current_page === 'projects.php' ? 'active' : '' ?>">Unsere Projekte</a></li>
                    <li><a href="<?= $base_url ?>contact.php" class="cta-button">Kontakt</a></li>
                </ul>
            </nav>

            <!-- Meniu Mobil -->
         <button class="hamburger mobile-nav" aria-label="Deschide meniul" aria-controls="nav-mobile">
              <span></span>
             <span></span>
             <span></span>
          </button>
                
                <nav class="nav-mobile">
                    <ul>
                        <li><a href="<?= $base_url ?>" class="<?= $is_home ? 'active' : '' ?>">Heim</a></li>
                        <li><a href="<?= $base_url ?>about.php" class="<?= $current_page === 'about.php' ? 'active' : '' ?>">Über uns</a></li>
                        <li><a href="<?= $base_url ?>services.php" class="<?= $current_page === 'services.php' ? 'active' : '' ?>">Dienstleistungen</a></li>
                        <li><a href="<?= $base_url ?>projects.php" class="<?= $current_page === 'projects.php' ? 'active' : '' ?>">Unsere Projekte</a></li>
                        <li><a href="<?= $base_url ?>contact.php" class="<?= $current_page === 'contact.php' ? 'active' : '' ?>">Kontakt</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Mobile overlay -->
    <div class="mobile-overlay"></div>

    <main>
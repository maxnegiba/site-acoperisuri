<?php
// Adaugă în partea superioară a fișierului
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/site-acoperisuri/';
$assets_path = $base_url . 'assets/';
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <!-- Folosește variabilele la toate căile -->
    <link rel="stylesheet" href="<?= $assets_path ?>css/main.css">
    <link rel="stylesheet" href="<?= $assets_path ?>css/components/header.css">
    <script type="module" src="<?= $assets_path ?>js/main.js"></script>
</head>
<body>
    <header class="header">
        <div class="container">
            <!-- Logo cu cale corectă -->
            <a href="../" class="logo">
                <img src="assets/img/logo.jpg" alt="Dachdecker Meisterbetrieb" width="220" height="60">
            </a>

            <!-- Meniu Desktop -->
            <nav class="nav-desktop">
                <ul>
                    <li><a href="../" class="<?= basename($_SERVER['PHP_SELF']) === 'index.php' ? 'active' : '' ?>">Heim</a></li>
                    <li><a href="../about.php" class="<?= basename($_SERVER['PHP_SELF']) === 'about.php' ? 'active' : '' ?>">Über uns</a></li>
                    <li><a href="../services.php" class="<?= basename($_SERVER['PHP_SELF']) === 'services.php' ? 'active' : '' ?>">Dienstleistungen</a></li>
                    <li><a href="../projects.php" class="<?= basename($_SERVER['PHP_SELF']) === 'projects.php' ? 'active' : '' ?>">Unsere Projekte</a></li>
                    <li><a href="../contact.php" class="cta-button">Kontakt</a></li>
                </ul>
            </nav>

            <!-- Meniu Mobil -->
            <div class="mobile-nav">
                <button class="hamburger" aria-label="Menü öffnen">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                
                <nav class="nav-mobile">
                    <ul>
                        <li><a href="../">Heim</a></li>
                        <li><a href="../about.php">Über uns</a></li>
                        <li><a href="../services.php">Dienstleistungen</a></li>
                        <li><a href="../projects.php">Unsere Projekte</a></li>
                        <li><a href="../contact.php">Kontakt</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!-- În header.php -->


    <main>
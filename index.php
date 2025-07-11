<?php 
$page_title = "Heim - Professionelle Dachdecker";
include(__DIR__ . '/includes/header.php');
?>

<!-- HERO SECTION -->
<section class="hero">
    <!-- Video Background -->
    <video class="hero-video" autoplay muted loop playsinline>
        <source src="<?= $assets_path ?>video/hero-video.mp4" type="video/mp4">
        <!-- Fallback pentru mobile -->
        <img src="<?= $assets_path ?>img/hero-mobile.jpg" alt="Dachdecker Berlin">
    </video>

    <!-- Overlay -->
    <div class="hero-overlay"></div>

    <!-- Content -->
    <div class="hero-content">
        <h1>Herzlich Willkommen bei Der Hausmeister Michael GmbH</h1>
        <h2>Wir schützen Ihr Eigentum im Neubau und Bestand durch das traditionelle Dachdeckerhandwerk.</h2>
        <p>
            Dachdecker in <strong>Berlin & Brandenburg</strong> – von der kleinsten Dachreparatur bis zur kompletten Dacheindeckung. 
            <br><strong>Über 20 Jahre Erfahrung.</strong> 
            <br>Bund, Länder, Gemeinden & Privatkunden vertrauen uns.
        </p>
        <a href="#contact" class="cta-button">Jetzt unverbindlich anfragen</a>
        
        <!-- Trust Badges -->
        <div class="trust-badges">
            <span>🏆 20+ Jahre Meisterbetrieb</span>
            <span>📍 Berlin · Potsdam · Frankfurt (Oder)</span>
            <span>✅ Zertifiziert für öffentliche Aufträge</span>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="scroll-indicator">
        <span></span>
    </div>
</section>
  
 
<?php include(__DIR__ . '/includes/footer.php'); ?>
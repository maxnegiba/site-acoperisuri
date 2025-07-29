<?php
// Setări SEO pentru pagina de proiecte
$page_title = "Unsere Projekte | Dachdecker Meisterbetrieb Berlin Brandenburg";
$page_description = "Überzeugen Sie sich von unserer Qualität und Erfahrung. Entdecken Sie unsere abgeschlossenen Projekte in Berlin & Brandenburg.";

// Funcție pentru scanarea folderului și generarea array-ului de proiecte
function getProjectsFromFolder($folder_path = 'assets/img/projects/') {
    $projects = [];
    // Verifică dacă folderul există
    if (!is_dir($folder_path)) {
        return $projects;
    }
    // Scanează folderul pentru fișiere .jpg (versiunile normale)
    $files = glob($folder_path . '*.jpg');
    foreach ($files as $file) {
        $filename = basename($file, '.jpg');
        // Sare peste fișierele @2x
        if (strpos($filename, '@2x') !== false) {
            continue;
        }
        // Construiește căile pentru toate variantele
        $base_path = $folder_path . $filename;
        $web_path = '/' . $folder_path . $filename; // Asigură-te că $assets_path este corect definit în header sau aici
        // Verifică dacă toate variantele există
        $project = [
            'title' => ucfirst(str_replace(['proj', '_', '-'], ['Projekt ', ' ', ' '], $filename)),
            'src' => $web_path . '.jpg',
            'src2x' => $web_path . '@2x.jpg',
            'webp' => $web_path . '.webp',
            'webp2x' => $web_path . '@2x.webp'
        ];
        // Verifică dacă fișierele există fizic
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $project['src']) &&
            file_exists($_SERVER['DOCUMENT_ROOT'] . $project['src2x']) &&
            file_exists($_SERVER['DOCUMENT_ROOT'] . $project['webp']) &&
            file_exists($_SERVER['DOCUMENT_ROOT'] . $project['webp2x'])) {
            $projects[] = $project;
        } else {
            // Optional: Loghează fișierele lipsă pentru depanare
            // error_log("Missing project image files for base: " . $base_path);
        }
    }
    // Sortează proiectele după nume
    usort($projects, function($a, $b) {
        return strcmp($a['title'], $b['title']);
    });
    return $projects;
}

$projects = getProjectsFromFolder();
$total = count($projects);
// Determină assets_path corect în funcție de structura ta
// Dacă în header este definit ca $base_url . 'assets/', atunci:
// $assets_path = $base_url . 'assets/';
// Dar pentru căile locale din PHP, folosim direct 'assets/'
// iar pentru căile web (HTML), trebuie să fim siguri că sunt corecte.
// Presupunem că în header este setat corect $assets_path pentru HTML.
// Aici avem nevoie doar de calea locală pentru file_exists.
// Pentru consistență, îl definim aici dacă nu e deja disponibil.
$assets_path_for_html = 'assets/'; // Ajustează dacă e diferit în header.php

include(__DIR__ . '/includes/header.php');
?>

<section class="projects-hero">
    <div class="container">
        <h1>Unsere Projekte</h1>
        <p>Überzeugen Sie sich von unserer Handwerkskunst – hier eine Auswahl abgeschlossener Arbeiten in <strong>Berlin</strong> und <strong>Brandenburg</strong>.</p> <!-- Integrat cuvinte cheie -->
    </div>
</section>

<section class="projects-grid">
    <div class="container">
        <?php if (empty($projects)): ?>
            <div class="no-projects">
                <p>Momentan nu sunt proiecte disponibile.</p>
            </div>
        <?php else: ?>
            <div id="gallery" data-total="<?= $total ?>">
                <?php foreach (array_slice($projects, 0, 12) as $i => $p): ?>
                    <div class="project-card" data-index="<?= $i ?>">
                        <picture>
                            <source type="image/webp" srcset="<?= htmlspecialchars($p['webp']) ?> 1x, <?= htmlspecialchars($p['webp2x']) ?> 2x">
                            <img src="<?= htmlspecialchars($p['src']) ?>" srcset="<?= htmlspecialchars($p['src2x']) ?> 2x" loading="lazy" data-full="<?= htmlspecialchars($p['src2x']) ?>" alt="<?= htmlspecialchars($p['title']) ?> - Dachdecker Projekt"> <!-- ALT îmbunătățit -->
                        </picture>
                        <div class="overlay"><span><?= htmlspecialchars($p['title']) ?></span></div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if ($total > 12): ?>
                <div id="loader" style="text-align:center; margin:40px 0; display:none;">
                    <p>Se încarcă… <span id="loaded">12</span>/<?= $total ?></p>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>

<!-- Lightbox Modal -->
<div id="projectModal" class="modal">
    <span class="close">&times;</span>
    <button class="arrow left" aria-label="Previous image">&larr;</button>
    <img id="modalImg" alt="Vollbildansicht des Projekts"> <!-- ALT pentru imaginea din modal -->
    <button class="arrow right" aria-label="Next image">&rarr;</button>
    <div id="modalCaption"></div>
</div>

<script>
    // Pasează datele către JavaScript
    window.allProjects = <?= json_encode($projects, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;
    window.totalProjects = <?= $total ?>;
</script>
<script type="module" src="<?= $assets_path_for_html ?>js/projects.js"></script>

<?php include(__DIR__ . '/includes/footer.php'); ?>

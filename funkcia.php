<?php

function vygenerujPortfolio($dir) {
    $files = glob($dir . "/*.jpg");
    $json = file_get_contents(__DIR__ . "../portfolio.json");
    $data = json_decode($json, true);

    $i = 0;
    echo '<div class="row">';
    foreach ($files as $file) {
        $filename = basename($file);

        echo '<div class="col-25 portfolio">';
        echo '<a href=index.php>';
        echo '<img src="' . $file . '" alt="' . ($data[$filename] ?? "Bez názvu") . '">';
        echo '<div class="portfolio-text">';
        echo $data[$filename] ?? "Bez názvu";
        echo '</div>';

        echo '</div>';

        $i++;
        if ($i % 4 == 0 && $i != 0) {
            echo '</div><div class="row">';
        }
    }

    echo '</div>';
}
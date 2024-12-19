<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Charger un fichier YAML
function getYamlData($filename) {
    $path = $_SERVER['DOCUMENT_ROOT'] . "/Portfolio/YAML/" . $filename;
    if (file_exists($path)) {
        return yaml_parse_file($path);
    } else {
        return [];
    }
}

// Générer un captcha simple
function generateCaptcha() {
    $num1 = rand(1, 9);
    $num2 = rand(1, 9);
    $_SESSION['captcha_num1'] = $num1;
    $_SESSION['captcha_num2'] = $num2;
    $_SESSION['captcha_answer'] = $num1 + $num2; 
    return [$num1, $num2, $num1 + $num2];
}

// Afficher des étoiles pour les compétences
function renderStars($niveau) {
    $stars = str_repeat('<span class="star-full">★</span>', $niveau);
    $stars .= str_repeat('<span class="star-empty">☆</span>', 5 - $niveau);
    return $stars;
}

// Valider les champs d'un formulaire
function validateFormField($field) {
    return htmlspecialchars(trim($field));
}
?>

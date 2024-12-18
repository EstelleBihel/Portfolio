<link rel="stylesheet" href="assets/styles/portfolio.css">
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/Portfolio/PHP/functions.php";

require_once $_SERVER['DOCUMENT_ROOT'] . "/YAML/yaml/yaml.php";
$data = yaml_parse_file($_SERVER['DOCUMENT_ROOT'] . "/Portfolio/YAML/competences.yaml");
$accueil = $data['competences'] ?? [];
?>

<section id="competences">
    <h2>Compétences</h2>
    <?php foreach ($data as $domaine => $items): ?>
        <h3><?php echo $domaine; ?></h3>
        <ul>
            <?php foreach ($items as $competence => $niveau): ?>
                <li><?php echo $competence; ?> : <?php echo renderStars($niveau); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
</section>

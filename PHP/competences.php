<link rel="stylesheet" href="../assets/styles/portfolio.css">
<?php
require_once realpath(__DIR__ . "/functions.php");

$data = yaml_parse_file(realpath(__DIR__ . "/../YAML/competences.yaml"));
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

<link rel="stylesheet" href="assets/styles/portfolio.css">
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/Portfolio/PHP/functions.php";

require_once $_SERVER['DOCUMENT_ROOT'] . "/YAML/yaml/yaml.php";
$data = yaml_parse_file($_SERVER['DOCUMENT_ROOT'] . "/Portfolio/YAML/realisations.yaml");
$accueil = $data['realisations'] ?? [];
?>

<section id="realisations">
    <h2>Réalisations</h2>
    <?php foreach ($data as $realisations): ?>
        <article>
            <h3><?php echo $realisations['titre']; ?></h3>
            <p><strong>Description :</strong> <?php echo $realisations['description']; ?></p>
            <img src="<?php echo $realisations['illustration']; ?>" alt="Illustration de <?php echo $realisations['titre']; ?>">
            <ul>
                <?php foreach ($realisations['documents'] as $document): ?>
                    <li><a href="<?php echo $document; ?>" target="_blank"><?php echo basename($document); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </article>
    <?php endforeach; ?>
</section>

<link rel="stylesheet" href="../assets/styles/portfolio.css">
<?php
require_once realpath(__DIR__ . "/functions.php");

$data = yaml_parse_file(realpath(__DIR__ . "/../YAML/formation.yaml"));
$accueil = $data['formation'] ?? [];
?>

<section id="formation">
    <h2>Formations</h2>
    <?php foreach ($data['formations'] as $formation): ?>
        <div class="formation-item">
            <h3><?php echo $formation['nom']; ?></h3>
            <p><?php echo $formation['etablissement'] . ' - ' . $formation['lieu']; ?></p>
            <p><?php echo $formation['date_debut'] . " - " . $formation['date_fin']; ?></p>
            <p><?php echo $formation['contenu']; ?></p>
            
            <?php if (isset($formation['cv'])): ?>
                <a href="<?php echo $formation['cv']; ?>" target="_blank">Télécharger mon CV</a>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</section>

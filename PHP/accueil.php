
<link rel="stylesheet" href="PHP/assets/styles/portfolio.css">
<?php
require_once realpath(__DIR__ . "/functions.php");
$data = yaml_parse_file(realpath(__DIR__ . "/../YAML/accueil.yaml"));
$accueil = $data['accueil'] ?? [];
?>
<section id="accueil">
    <h1><?php echo $data['prenom'] . ' ' . $data['nom']; ?></h1>
    <p><?php echo $data['accroche']; ?></p>
    <div>
        <p><?php echo $data['presentation']; ?></p>
        <img src="<?php echo $data['photo']; ?>" alt="Photo de profil">
    </div>
</section>

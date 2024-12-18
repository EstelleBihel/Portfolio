<link rel="stylesheet" href="assets/styles/portfolio.css">
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/Portfolio/PHP/functions.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/YAML/yaml/yaml.php";
$data = yaml_parse_file($_SERVER['DOCUMENT_ROOT'] . "/Portfolio/YAML/accueil.yaml");
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

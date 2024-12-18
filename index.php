<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Estelle Bihel</title>
    <link rel="stylesheet" href="Portfolio/PHP/assets/styles/portfolio.css">
</head>
<body>
    <header>
        <h1>Mon Portfolio</h1>
        <nav>
            <ul>
                <li><a href="#accueil">Accueil</a></li>
                <li><a href="#competences">Compétences</a></li>
                <li><a href="#realisations">Réalisations</a></li>
                <li><a href="#formation">Formation</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="accueil"><?php include "Portfolio/PHP/accueil.php"; ?></section>
        <section id="competences"><?php include "Portfolio/PHP/competences.php"; ?></section>
        <section id="realisations"><?php include "Portfolio/PHP/realisations.php"; ?></section>
        <section id="formation"><?php include "Portfolio/PHP/formation.php"; ?></section>
        <section id="contact"><?php include "Portfolio/PHP/contact.php"; ?></section>
    </main>
    <footer>
        <p>Estelle Bihel - 
        <a href="https://www.linkedin.com/in/estelle-bihel-050131206" target="_blank">Mon LinkedIn</a></p>
    </footer>
</body>
</html>

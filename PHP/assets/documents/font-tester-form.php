<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de message</title>
</head>
<body>
    <?php
    // Vérifie si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération des valeurs du formulaire
        $message = htmlspecialchars($_POST["message"]);
        $taille = intval($_POST["taille"]);
        $couleur = htmlspecialchars($_POST["couleur"]);

        // Affichage du message avec les styles sélectionnés
        echo "<div style='font-size: {$taille}px; color: {$couleur};'>";
        echo nl2br($message); // nl2br pour gérer les sauts de ligne dans le message
        echo "</div>";
    }
    ?>

    <!-- Formulaire HTML -->
    <form method="POST" action="">
        <label for="message">Message :</label><br>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>

        <label for="taille">Taille du texte :</label><br>
        <input type="number" id="taille" name="taille" min="10" max="100" value="20" required><br><br>

        <label for="couleur">Couleur du texte :</label><br>
        <input type="color" id="couleur" name="couleur" value="#000000" required><br><br>

        <input type="submit" value="Afficher le message">
    </form>
</body>
</html>

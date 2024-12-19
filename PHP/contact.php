<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Inclure PHPMailer
require_once realpath(__DIR__ . "/../lib/PHPMailer/src/Exception.php");
require_once realpath(__DIR__ . "/../lib/PHPMailer/src/PHPMailer.php");
require_once realpath(__DIR__ . "/../lib/PHPMailer/src/SMTP.php");

require_once realpath(__DIR__ . "/functions.php");

$data = yaml_parse_file(realpath(__DIR__ . "/../YAML/contact.yaml"));
$error = $success = "";

if (!isset($_SESSION['captcha_num1']) || !isset($_SESSION['captcha_num2']))
    generateCaptcha();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = validateFormField($_POST['nom']);
    $email = validateFormField($_POST['email']);
    $objet = validateFormField($_POST['objet']);
    $message = validateFormField($_POST['message']);
    $user_captcha = (int)$_POST['captcha'];

    if ($user_captcha === $_SESSION['captcha_answer'] && !empty($nom) && !empty($email) && !empty($objet) && !empty($message)) {
        $mail = new PHPMailer(true);

        try {
            // Configuration du serveur SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Serveur SMTP Gmail
            $mail->SMTPAuth = true;
            $mail->Username = 'estelle.bihel@sts-sio-caen.info';
            $mail->Password = 'Caen/2024/Sup';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Paramètres de l'e-mail
            $mail->setFrom($email, $nom);
            $mail->addAddress('destinataire@gmail.com'); // Adresse du destinataire
            $mail->Subject = "Nouveau message de : $nom - $objet";
            $mail->Body = "Nom : $nom\nEmail : $email\n\nMessage:\n$message";

            // Envoyer l'e-mail
            $mail->send();
            $success = "Votre message a été envoyé avec succès.";
            unset($_SESSION['captcha_answer']);
        } catch (Exception $e) {
            $error = "L'envoi de l'e-mail a échoué : " . $mail->ErrorInfo;
        }
    } else {
        $error = "Tous les champs sont obligatoires ou le captcha est incorrect.";
    }

    [$random_num1, $random_num2, $_SESSION['captcha_answer']] = generateCaptcha();
    $_SESSION['captcha_num1'] = $random_num1;
    $_SESSION['captcha_num2'] = $random_num2;
}
?>

<link rel="stylesheet" href="assets/styles/portfolio.css">

<section id="contact">
    <h2>Contact</h2>
    <?php if ($error): ?><p style="color: red;"><?php echo $error; ?></p><?php endif; ?>
    <?php if ($success): ?><p style="color: green;"><?php echo $success; ?></p><?php endif; ?>
    <form method="post">
        <label>Nom : <input type="text" name="nom" required></label>
        <label>Email : <input type="email" name="email" required></label>
        <label>Objet : <input type="text" name="objet" required></label>
        <label>Message : <textarea name="message" required></textarea></label>
        <label>Captcha : Combien font <?php echo $_SESSION['captcha_num1'] . " + " . $_SESSION['captcha_num2']; ?> ?
            <input type="number" name="captcha" required>
        </label>
        <button type="submit">Envoyer</button>
    </form>
</section>

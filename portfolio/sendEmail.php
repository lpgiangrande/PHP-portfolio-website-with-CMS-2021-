<?php
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['message'])){
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    require_once 'PHPMailer/PHPMailer.php';
    require_once 'PHPMailer/SMTP.php';
    require_once 'PHPMailer/Exception.php';

    $mail = new PHPMailer();

    // SMTP settings
    $mail->isSMTP(); // Pour que PHPMail utilise SMTP
    $mail->Host = "smtp.gmail.com"; // Set the hostname of the mail server
    $mail->SMTPAuth = true;
    $mail->Username = "contact.photographe.test@gmail.com"; 
    $mail->Password = "TesT2021"; // mdp du mail 
    $mail->Port= 465; // TCP port to connect to for Gmail
    $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted 
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messagess
    //$mail->SMTPDebug = 2;

    // Email settings
    $mail->isHTML(true);
    $mail->setFrom($email); // expéditeur 
    $mail->addAddress("contact.photographe.test@gmail.com"); // DESTINATAIRE
    $mail->Subject = "Email from $phone $email"; 
    $mail->Body= $message; // corps du message

    if($mail->send()){
        $status = "success";
        $response = "L'email a été envoyé.";
    } else {
        $status = "failed";
        $response = "Erreur lors de l'envoi: <br>" . $mail->ErrorInfo;
    }

    exit(json_encode(array("status" => $status, "response" => $response)));
    // envoyer des informations, depuis un serveur vers un utilisateur, afin de les afficher sur une page web, ou inversement. 
} 
// liens PHPMAILER
// https://www.youtube.com/watch?v=DKq1n-awLcw&ab_channel=CodingSnow
// https://github.com/PHPMailer/PHPMailer/wiki/Tutorial


// liens POSTFIX
// https://www.youtube.com/watch?v=ZRJSQjXGjOA&ab_channel=LindsayMacvean
// http://hints.macworld.com/article.php?story=20081217161612647
// conf https://budiirawan.com/install-mail-server-mac-osx/
// https://budiirawan.com/install-mail-server-mac-osx/
?>
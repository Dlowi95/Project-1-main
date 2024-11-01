<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'model/phpmailer/Exception.php';
require 'model/phpmailer/PHPMailer.php';
require 'model/phpmailer/SMTP.php';

function sendRegistrationEmail($toEmail, $toName, $subject, $body) {
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'loisadnhan@gmail.com';                     //SMTP username
        $mail->Password   = 'ibkb ozcj nhec nxij';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                               // TCP port to connect to

        //Recipients
        $mail->setFrom('loisadnhan@gmail.com', 'Dlow2');
        $mail->addAddress($toEmail, $toName);                 // Add a recipient

        // Content
        $mail->isHTML(true);        
        $mail -> CharSet = "UTF-8";                          // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;

        // Bảo mật mail:
        $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
    );
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
}
?>

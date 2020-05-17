<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer library files
require 'includes/smtp/PHPMailer/Exception.php';
require 'includes/smtp/PHPMailer/PHPMailer.php';
require 'includes/smtp/PHPMailer/SMTP.php';

$mail = new PHPMailer;

// SMTP configuration
$mail->isSMTP();
$mail->Host     = $smtp_host;
$mail->SMTPAuth = true;
$mail->Username = $smtp_username;
$mail->Password = $smtp_password;
$mail->SMTPSecure = $smtp_securetype;
$mail->Port     = $smtp_port;

$mail->setFrom($verified_sendfromadd, $verified_sendfromname);
$mail->addReplyTo($replyto_email, $replyto_name);

// Add a recipient
$mail->addAddress('founder@cybertronics.org.in');

// Email subject
$mail->Subject = "Contact Form Submission From $site_name";

// Set email format to HTML
$mail->isHTML(true);

// Email body content
//Normalizing Variables
$con_form_name = $_POST['name'];
$con_form_email = $_POST['email'];
$con_form_subject = $_POST['subject'];
$con_form_message = $_POST['message'];

$mailContent = "There's been a Contact Form Submission on $site_name with Following Data :\n\nName : $con_form_name\n Email : $con_form_email\n Subject : $con_form_subject\n Message : $con_form_message";

//Using nl2br for Validating newline in Mail Body
$mail->Body = nl2br(strip_tags($mailContent));

// Send email
if(!$mail->send()){
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
}

?>

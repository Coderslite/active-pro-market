<?php
require 'composer/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;


$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'tulip.hostnownow.com';
$mail->SMTPAuth = true;
$mail->Username = 'support@Autoglobalfx.com'; // your mail address
$mail->Password = 'Mesomorph_11'; // your mail passwor
$mail->addReplyTo('support@Autoglobalfx.com', 'Your Name');
$mail->addAddress('abrahamgreatebele@gmail.com', 'Great');
$mail->SMTPSecure = 'ssl';
$mail->Port =  465;
// Sender info 
$mail->setFrom('support@Autoglobalfx.com', 'Active Pro Market Broker');

// Add a recipient 
// $mail->addAddress('abrahamgreatebele@gmail.com');
// Set email format to HTML 
$mail->isHTML(true); 

// Mail subject 
$mail->Subject = 'Login Successful';

// Mail body content 
$bodyContent = 
'<html>
<head></head>
<body>
<h1>Login Detection</h1>
<h2>we detected a login activity on your dashboard</h2>
<h2>If not you, login and change your password immediately</h2>
<a href="http://aftbroker.unaux.com/login.html">confirm now</a>
<body>
</html>';
// $bodyContent .= $template; 
$mail->Body = $bodyContent;
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'The email message was sent.';
}
?>
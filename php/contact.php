<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'composer/vendor/autoload.php';

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];


// create a new object
$mail = new PHPMailer();
// configure an SMTP
$mail->isSMTP();
$mail->Host = 'localhost';
$mail->SMTPAuth = false;
$mail->SMTPAutoTLS = false; 
$mail->Port = 25; 

$mail->setFrom('support@activepromarket.com', 'Active Pro Market');
$mail->addAddress('abrahamgreatebele@gmail.com', 'Me');
$mail->Subject = $subject;
// Set HTML
$mail->isHTML(TRUE);
$mail->Body = $message;
$mail->AltBody = $message;
// add attachment
$mail->addAttachment('//confirmations/yourbooking.pdf', 'yourbooking.pdf');
// send the message
if(!$mail->send()){
    // echo 'Message could not be sent.';
    $data = 'success';
    // echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    $data = 'failed';
    // echo 'Message has been sent';
}

header('content-Type: application/json');
echo json_encode($data);


?>
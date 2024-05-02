<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'composer/vendor/autoload.php';

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'cortextechnology20@gmail.com'; // your mail address
$mail->Password = 'CortexTech'; // your mail password
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$transaction_id = '55555';
// Sender info 
$mail->setFrom('cortextechnology20@gmail.com', 'Cortex_Technology'); 

// Add a recipient 
$mail->addAddress('abrahamgreatebele@gmail.com'); 

// Set email format to HTML 
$mail->isHTML(true); 

// Mail subject 
$mail->Subject = 'Confirm Payment';

// Mail body content 
$bodyContent = 
                    '<html>
                    <head>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                    </head>
                    <body>
                    <h2>Payment Confirmation Request</h2>
                    <h5>Some amount of USD has been made to your account</h5>
                    <p>'.'Transaction ID : '.$transaction_id.'</p>
                    <p>'.'Email: '.$transaction_id.'</p>
                    <a href="http://aftbroker.unaux.com/login.html" class="btn btn-success" style="border-radius:5px; border:0px green; color:white; padding:5px; background-color:green;">confirm now</a>
                    <body>
                    </html>';
// $bodyContent .= $template; 
$mail->Body = $bodyContent;

// Send email 
if (!$mail->send()) {
    echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
    // $data = 'notSent';
} else {
    echo'success';
}


?>
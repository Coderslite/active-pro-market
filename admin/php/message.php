<?php
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

// Define namespaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$email = $_POST['email'];
$message = nl2br($_POST['message']);
$subject = $_POST['subject'];

// Extract file details
@$fileName = $_FILES['file']['name'];
@$fileTmpName = $_FILES['file']['tmp_name'];
 
        //Create instance of PHPMailer
        $mail = new PHPMailer();
        //Set mailer to use smtp
            $mail->isSMTP();
        //Define smtp host
            $mail->Host = "autoglobalfx.com";
        //Enable smtp authentication
            $mail->SMTPAuth = true;
        //Set smtp encryption type (ssl/tls)
            $mail->SMTPSecure = "ssl";
        //Port to connect smtp
            $mail->Port = "465";
        //Set gmail username
            $mail->Username = "support@Autoglobalfx.com";
        //Set gmail password
            $mail->Password = "Autoglobalfx$$";
        //Email subject
            $mail->Subject = $subject;
        //Set sender email
            $mail->setFrom('support@Autoglobalfx.com');
            

    //Enable HTML
        $mail->isHTML(true);
        $mail->addAddress($email);
        $mail->addReplyTo('support@Autoglobalfx.com','Autoglobalfx');
        $mail->addAttachment($fileTmpName, $fileName);


// Email body
$mail->Body = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Email Subject</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
        }
        .logo {
            width: 100%;
            max-width: 300px;
        }
        .message {
            margin-top: 20px;
        }
        .button {
            text-align: center;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://Autoglobalfx.com/img/logo_dark.png" alt="Profitfxcoin" class="logo">
        </div>
        <div class="message">
            ' . $message . '
        </div>
        <div class="button">
            <a href="https://Autoglobalfx.com" class="btn">Login to the Website</a>
        </div>
    </div>
</body>
</html>';

// Finally, send the email
if ($mail->send()) {
    $data = 'success';
} else {
    $data = 'failed';
}

header('Content-Type: application/json');
echo json_encode($data);
?>

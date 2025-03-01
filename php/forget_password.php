<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'composer/vendor/autoload.php';
include "db_config.php";

$email = $_POST['email'];

$checkQuery = mysqli_query($con,"SELECT * FROM users WHERE email = '$email' ");
$num=mysqli_num_rows($checkQuery);
if ($num != 1){
    $result = "not_exist";
}
else{        
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
        $mail->Username = "support@autoglobalfx.com";
    //Set gmail password
        $mail->Password = "Autoglobalfx$$";
    //Email subject
    $mail->Subject = 'Reset Password';
    //Set sender email
        $mail->setFrom('support@autoglobalfx.com');
    //Enable HTML
    $mail->isHTML(true);

    $mail->setFrom('support@autoglobalfx.com', 'Autoglobalfx');

        // Mail subject 

        // Mail body content 
        // $bodyContent = 
        // '<html>
        // <head>
        // </head>
        // <body>
        // <h2>Account Created Successful</h2>
        // <h5>Dear '.$fname.' '.$lname.', '.'your account has been created successful, click the link below to activate your account.</h5>
        // <a href="https://www.autoglobalfx.com?username='.$fname .' '.$lname.'&email='.$email.'>activate now</a>
        // <body>
        // </html>';
        // $bodyContent .= $template; 
        // $mail->Body = $bodyContent;
        $mail->Body = '<html>
        <head></head>
        <body>
        Password reset requested.  <br> click on the link below to change your password
        <a href="https://www.autoglobalfx.com/reset_password.php?email='.$email.'">reset password</a>
        </body>
        </html>';
        $mail->AltBody = 'Password reset requested.  <br> click on the link below to change your password <a href="https://www.autoglobalfx.com/reset_password.php?email='.$email.'">reset password</a>';
        if($mail->send()){
                  // $_SESSION['email'] = $email;
                   $result= 'success';
                    }
                    else{
                    $data = 'failed';
                    }
}

header('content-Type: application/json');
echo json_encode($result);
// echo $upload; 
 

?>
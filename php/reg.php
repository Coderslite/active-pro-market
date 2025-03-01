<?php
// require 'composer/vendor/autoload.php';
include "db_config.php";
//Include required PHPMailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$fname = $_POST['fname'] . " ". $_POST['lname'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$country = $_POST['country'];
$password = $_POST['pass'];
$package = $_POST['package'];
$phone = $_POST['phone'];
$currency = $_POST['cur'];

$checkQuery = mysqli_query($con,"SELECT * FROM users WHERE email = '$email' ");
$num=mysqli_num_rows($checkQuery);
if ($num==1){
    $result = "exist";
}
else{

    $query = mysqli_query($con, "INSERT INTO users (fullName,email,phone,gender,nationality,password,package,currency,role,status,image,profit)VALUES('$fname','$email','$phone','$gender','$country','$password','$package','$currency','user','active','',0)");


    if($query){
        
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
            $mail->Username = "support@autoglobalfx.com";
        //Set gmail password
            $mail->Password = "Autoglobalfx$$";
        //Email subject
            $mail->Subject = "Registration Successful";
        //Set sender email
            $mail->setFrom('support@autoglobalfx.com');
        //Enable HTML
        $mail->isHTML(true);

        $mail->setFrom('support@autoglobalfx.com', 'Autoglobalfx');
        
        // Add a recipient 
        $mail->addAddress($email);
        
        // Set email format to HTML 
        $mail->isHTML(true); 
        
        // Mail subject 
        $mail->Subject = 'Account Created';

        $mail->Body = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
        </head>
        <body>
            <img src="https://Autoglobalfx.com/img/logo_dark.png" alt="Autoglobalfx" class="w-100" width="100vw">
                <h2>Hello '. $fname.'</h2>
         <p>   We’re really excited to welcome you to Autoglobalfx community. 
            <br>
            Here is one of the safest place to mine your crypto and make withdrawal immediately you round up your trade section, now sit back to enjoy while we make your money works for you. <br>   
            Your experience with Autoglobalfx about crypto mining will be the best so far. </p>
           <br>
            <p>Thank you for choosing <span>Autoglobalfx</p>
            <a class="btn btn-primary" href="https://Autoglobalfx.com">login to website</a>
        </body>
        </html>';


        if($mail->send()){
                  // $_SESSION['email'] = $email;
                   $result= 'success';
                    }
                    else{
                    $data = 'failed';
                    }

        $result = 'success';
    }
    else{
        $result = mysqli_error($con);
    }
}

header('content-Type: application/json');
echo json_encode($result);
// echo $upload; 
 

?>
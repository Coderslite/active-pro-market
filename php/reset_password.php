<?php

include "db_config.php";
$email = $_POST['email'];
$password = $_POST['password'];
$query="SELECT * FROM users WHERE email='$email'";
    $result= mysqli_query($con, $query);
     $num=mysqli_num_rows($result);
     if ($num==1){
            while ($row = mysqli_fetch_assoc($result)) {
                    $passwordUpdate = mysqli_query($con,"UPDATE users SET password = '$password' WHERE email ='$email' ");
                    if($passwordUpdate){
                        $data = 'success';
                    }
                    else{
                        echo "something went wrong";
                        // header('location:../something_went_wrong.php');
                        $data = 'failed';
                    }
                }
            }

            header('content-Type: application/json');
            echo json_encode($data);
            ?>



<?php

include "db_config.php";
$email = $_GET['email'];
// $email = 'meshack@gmail.com';
$username = $_GET['username'];
// $username = "Ossai Meshach";

$query="SELECT * FROM users WHERE email='$email'";
    $result= mysqli_query($con, $query);
     $num=mysqli_num_rows($result);
     if ($num==1){
            while ($row = mysqli_fetch_assoc($result)) {
                if($row['status']=='active'){
                    echo "account has already been activated";
                }
                else{
                    $statusUpdate = mysqli_query($con,"UPDATE users SET status = 'active'");
                    $bonusquery = mysqli_query($con, "INSERT INTO deposit(username,useremail,amount,bonus,method,transaction_id,status)VALUES('$username','$email','0','500','bonus','APM-BONUS','confirmed');");
                    if($bonusquery){
                        echo "account activated";
                        header('location:../account_activated.php');
                    }
                    else{
                        echo "something went wrong";
                        header('location:../something_went_wrong.php');
                    }
                }
            }
        }



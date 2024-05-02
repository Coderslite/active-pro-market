<?php
session_start();
include "db_config.php";
include "session.php";
$id = $_POST['id'];

$query = mysqli_query($con, "UPDATE deposit SET status = 'failed' WHERE id = '$id'");
if($query){
    $_SESSION['SuccessMessage'] = "Deposit Rejected";
    header('location:../deposit.php');
}
else{
    $_SESSION['ErrorMessage'] = "Failed to Update Transaction Status";
    header('location:../deposit.php');
}

?>
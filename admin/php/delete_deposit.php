<?php
session_start();
include "db_config.php";
include "session.php";
$transaction_id = $_POST['transaction_id'];
$query = mysqli_query($con,"DELETE FROM deposit WHERE transaction_id = '$transaction_id'");
if($query){
    $_SESSION['SuccessMessage'] = "Transaction Deleted Successfully";
    header('location:../deposit.php');
}
else{
    $_SESSION['ErrorMessage'] = "Failed to Delete Transaction";
    header('location:../deposit.php');
}

?>
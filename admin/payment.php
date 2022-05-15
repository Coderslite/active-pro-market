<?php
include "includes/header.php";
?>

<div class="page-wrapper">
    <div class="container py-5">
        <h2 class="text-center">Proceed to payment</h2>
        <p class="text-center">This wallet address will expire in 5mins</p>
        <p class="text-center">Make payment of USD 5 using the qrcode or wallet address below</p>
        <img src="assets/images/qr-code.png" alt="" width="200vw" class="d-flex m-auto">
        <div class="copy justify-content-center d-flex m-auto">
        <span class="bg-white p-2 mt-2">1NsmkVtZKpUqyArGxd9A7DXVYKjk3cE5E5<span></span><span class="btn btn-success mx-2">copy</span>
        </div>
        <a href="confirm_payment.php" class="btn btn-success">Confirm Payment</a>
        <h5>Note: h5ayment should be made only to the wallet address above, and confirm payment after deposit has been made.</h5>
    </div>
</div>

<?php
include "includes/footer.php";
?>
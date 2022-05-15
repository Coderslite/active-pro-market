<?php
include "includes/header.php"
?>

<div class="page-wrapper">
<div class="alert alert-warning" role="alert">Note: To get your transaction ID, go to your deposit history <a href="deposit_history.php"> click here</a></div>
    <div class="container p-5">
        <h3>Upload Proof of payment </h3>
        <!-- <img src="assets/images/qr-code.png" alt="" width="200px"> -->
        <form id="confirm_payment">
            <input type="file" name="file" id="" class="form-control col-md-6" required>
            <input type="text" name="transaction_id" id="" placeholder="Enter Transaction ID" class="form-control col-md-6 mt-2" required>
            <input type="hidden" name="email" id="" value="<?php echo $_SESSION['email'];?>" class="form-control col-md-6 mt-2" required>
            <button class="btn btn-primary btn-lg mt-2" type="submit">Upload </button>
        </form>
    </div>
</div>
<?php
include "includes/footer.php"
?>


<script>
    $(document).ready(function() {
        $('#confirm_payment').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: 'php/confirm_payment.php',
                type: 'POST',
                contentType: false,
                cache: false,
                processData: false,
                data: formData,
                dataType: 'json',
                beforeSend: function() {
                    Swal.fire({
                        html: '<div style="font-size: 15px; width:4rem; height:4rem;" class="spinner-border"></div>',
                        showConfirmButton: false
                    });
                },
                success: function(data) {
                    if (data.trim() == 'success') {
                        Swal.fire({
                            icon: 'success',
                            html: '<div class=""> Confirmation Uploaded</div>',
                            showConfirmButton: true,
                            allowOutsideClick: false,
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            location.href = "deposit_history.php";
                        })
                    }
                    else if (data.trim() == 'notExist') {
                        Swal.fire({
                            icon: 'error',
                            html: '<div class=""> Invalid Transaction ID</div>',
                            showConfirmButton: true,
                            allowOutsideClick: false,
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            location.href = "deposit_history.php";
                        })
                    }
                    else if (data.trim() == 'notSent') {
                        Swal.fire({
                            icon: 'error',
                            html: '<div class="">Mail Report fail to send</div>',
                            showConfirmButton: true,
                            allowOutsideClick: false,
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            location.href = "deposit_history.php";
                        })
                    }
                    else{
                        Swal.fire({
                        icon: 'error',
                        html: '<div class"">Something went wrong</div>',
                        showConfirmButton: true,
                        allowOutsideClick: true,
                    })
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        html: '<div class"">Failed</div>',
                        showConfirmButton: true,
                        allowOutsideClick: true,
                    })
                }
            })
        })
    })
</script>
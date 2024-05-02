<?php include "includes/header.php"; ?>
<?php
include "php/db_config.php";
$email = $_SESSION['email'];

$withdrawBonusAmount = 0;
$withdrawInvestedAmount = 0;
$withdrawProfitAmount = 0;

//investment query start
$fetchUser = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
if (mysqli_num_rows($fetchUser) > 0) {
    while ($userRow = mysqli_fetch_assoc($fetchUser)) {
        $fName = $userRow['fullName'];
        $phone = $userRow['phone'];
        $password = $userRow['password'];
    }
}
?>
<div class="content-body">
    <div class="container-fluid">
        <h2>Update Information</h2>
        <h6>Enter the right information in the field</h6>
        <hr>
        <form action="" id="profile">

            <div class="row">
                <div class="col-md-12">
                    <label for="">Full Name</label>
                    <input type="text" placeholder="Full Name" class="form-control" name="fullName" value="<?php echo $fName; ?>">
                    <input type="hidden" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
          
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Phone Number</label>
                    <input type="text" placeholder="" class="form-control" name="phone" value="<?php echo $phone; ?>">
                </div>
                <div class="col-md-6">
                    <label for="">Password</label>
                    <input type="text" placeholder="" class="form-control" name="password" value="<?php echo $password; ?>">
                </div>
            </div>
            <br>
            <div class="d-flex justify-content-center">
                <button class="btn btn-success" type="submit">Update</button>
            </div>

        </form>
    </div>

</div>
<?php include "includes/footer.php"; ?>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.4/dist/sweetalert2.all.js"></script>


<script>
    $('document').ready(function() {
        $('#profile').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: 'php/profile.php',
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
                            html: '<div class=""> Profile Updated Successfully</div>',
                            showConfirmButton: true,
                            allowOutsideClick: true
                        }).then((result) => {
                            location.href = "profile.php";

                        })
                    } else if (data.trim() == 'failed') {

                        Swal.fire({
                            icon: 'error',
                            html: '<div class=""> Failed to Make Deposit</div>',
                            showConfirmButton: true,
                            allowOutsideClick: true
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            html: '<div> something went wrong</div>',
                            allowOutsideClick: true
                        });
                    }
                },
                error: function() {},
            })

        })
    })
</script>
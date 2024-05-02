<?php
include "includes/header.php";
include "php/db_config.php";
include "php/session.php";

?>
<?php
$email = $_GET['email'];
$query = mysqli_query($con, "SELECT * FROM users WHERE email ='$email'");
$currentAmount = 0; 
if (mysqli_num_rows($query) > 0) {
  while ($amount = mysqli_fetch_assoc($query)) {
    $currentAmount = $currentAmount + $amount['profit'];
  }
}
?>
<div class="page-wrapper">
  <div class="col-md-6 py-5">
    <h4>Top Client Balance</h4>
    <h5>Current Amount : <?php echo $currentAmount ?></h5>
    <form action="" id="top-up">
      <!-- <input type="number" name="" id="" placeholder="<?php echo $currentAmount ?>" class="form-control" disabled> -->
      <input type="hidden" name="amount" class="form-control" value="<?php echo $currentAmount ?>">
      <input type="text" name="top_up" class="form-control" id="top_up">
      <input type="hidden" name="email" class="form-control" value="<?php echo $email ?>">
      <input type="submit" value="Top Up" class="btn btn-success">
    </form>
  </div>
</div>

<?php
include "includes/footer.php";

?>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.4/dist/sweetalert2.all.js"></script>
<script>
  $(document).ready(function() {
    $("#top_up").keydown(function(event) {


      if (event.shiftKey == true) {
        event.preventDefault();
      }

      if ((event.keyCode >= 48 && event.keyCode <= 57) ||
        (event.keyCode >= 96 && event.keyCode <= 105) ||
        event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 ||
        event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

      } else {
        event.preventDefault();
      }

      if ($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
        event.preventDefault();
      //if a decimal has been added, disable the "."-button

    });

    $('#top-up').on('submit', function(e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        url: 'php/top_up.php',
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
              html: '<div class="">Top up Successful</div>',
              showConfirmButton: true,
              allowOutsideClick: false,
              confirmButtonText: 'Done'
            }).then((result) => {
              location.href = "registered_users.php";
            })
          } else if (data.trim() == 'failed') {

            Swal.fire({
              icon: 'error',
              html: '<div class="">Something went wrong</div>',
              showConfirmButton: true,
              allowOutsideClick: false,
              confirmButtonText: 'OK'
            })
          };
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
<?php
include "includes/header.php";

?>

<div class="page-wrapper">
   <div class="container p-5">

      <ul class="nav nav-tabs" id="myTab" role="tablist">
         <li class="nav-item" role="presentation">
            <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Bank Withdrawal</a>
         </li>
         <li class="nav-item" role="presentation">
            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Crypto Withdrawal</a>
         </li>
      </ul>
      <div class="tab-content mt-2" id="myTabContent">
         <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">
            <form action="" id="bankForm">
               <h3 class="text-center">Bank Withdrawal Funds</h3>
               <div class="form-group">
                  <div class="row">
                     <div class="col-md-6">
                        <label for="amount">Amount</label>
                        <input type="number" name="amount" id="amount" placeholder="Amount" class="form-control">
                     </div>
                     <div class="col-md-6">
                        <label for="bank_name">Bank Name</label>
                        <input type="text" name="bank_name" id="bank_name" placeholder="Bank Name" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-md-6">
                        <label for="account_number">Account Number</label>
                        <input type="number" name="account_number" id="account_number" placeholder="Account Number" class="form-control">
                     </div>
                     <div class="col-md-6">
                        <label for="account_name">Acconut Name</label>
                        <input type="text" name="account_name" id="account_name" placeholder="Account Name" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-md-6">
                        <label for="sort">Sort Code</label>
                        <input type="number" name="sort_code" id="sort" placeholder="Sort Code" class="form-control">
                     </div>
                  </div>
                  <input type="hidden" name="email" id="email" placeholder="email" class="form-control" value="<?php echo $_SESSION['email']?>" required>
                  <button type="submit" class="btn btn-success mt-2">Submit Request</button>
               </div>
            </form>
         </div>

         <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <form action="" id="cryptoForm">
               <h3 class="text-center">Crypto Withdrawal Funds</h3>
               <div class="form-group">
                  <div class="row">
                     <div class="col-md-6">
                        <label for="amount">Amount</label>
                        <input type="number" name="amount" id="amount" placeholder="Amount" class="form-control" required>
                     </div>
                     <div class="col-md-6">
                        <label for="bank_name">Method</label>
                        <select name="method" id="method" class="form-control" required>
                           <option value="bitcoin">Bitcoin</option>
                           <option value="ethereum">Ethereum</option>
                           <option value="bank">Bank</option>
                           <option value="dogecoin">DogeCoin</option>
                           <option value="bnb">Bnb</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-md-6">
                        <label for="account_number">Wallet Address</label>
                        <input type="text" name="wallet_address" id="wallet_address" placeholder="Wallet Address" class="form-control" required>
                     </div>
                  </div>
               </div>

               <input type="hidden" name="email" id="email" placeholder="email" class="form-control" value="<?php echo $_SESSION['email']?>" required>

               <button class="btn btn-success mt-2" type="submit">Submit Request</button>
            </form>
         </div>
      </div>
   </div>

</div>
</div>

<?php
include "includes/footer.php";

?>

<script>
   $(document).ready(function(){
      $('#cryptoForm').on('submit',function(e){
         e.preventDefault();
         var formData = new FormData(this);
         $.ajax({
            url:'php/crypto_withdraw.php',
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
                html: '<div class=""> Withdraw Request Submitted</div>',
                showConfirmButton: true,
                allowOutsideClick: false,
                confirmButtonText:'Ok'
              }).then((result) => {
                location.href = "withdrawal_history.php";
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

      // bank withdrawal start

      $('#bankForm').on('submit',function(e){
         e.preventDefault();
         var formData = new FormData(this);
         $.ajax({
            url:'php/bank_withdraw.php',
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
                html: '<div class=""> Withdraw Request Submitted</div>',
                showConfirmButton: true,
                allowOutsideClick: false,
                confirmButtonText:'Ok'
              }).then((result) => {
                location.href = "withdrawal_history.php";
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

      // bank withdrawal ends
   })
</script>
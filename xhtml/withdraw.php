<?php include "includes/header.php";	
include "php/session.php";
$userquery = mysqli_query($con, "SELECT* FROM users WHERE email = '$email'");
if (mysqli_num_rows($userquery) > 0) {
    while ($row = mysqli_fetch_assoc($userquery)) {
        $fname = $row['fullName'];
    }
}
?>



 <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
				



                    <div class="col-xl-6 col-sm-6">
						<div class="card overflow-hidden">
							<div class="card-header align-items-start border-0 pb-0">
								<div class="me-auto">
									<!-- <p class="mb-2 fs-13"><i class="fa fa-caret-up scale5 me-2 text-success" aria-hidden="true"></i>Total Won</p> -->
									<h2 class="text-black mb-0 font-w600">Withdraw</h2>
									<h5>Note: You can only make a withdrawal via same method used for deposit</h5>
                                    <div class="form-group">
                                            <label for="rad" class="p-3">
                                            <input type="radio" name="cur" id="rad" checked> Bitcoin
                                            </label>
                                            <label for="rad2" class="p-3">
                                            <input type="radio" name="cur" id="rad2"> Bank Withdrawal
                                            </label>
                                            <!-- <label for="rad3" class="p-3">
                                            <input type="radio" name="cur" id="rad3"> Neteller
                                            </label> -->
                                    </div>
								</div>
				
							</div>
							<div class="card-body p-0">
								<canvas id="widgetChart4" class="max-h80 mt-auto"></canvas>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-sm-6">
						<div class="card overflow-hidden">
							<div class="card-header align-items-start border-0 pb-0">
								<div class="me-auto" id="btc">
									<!-- <p class="mb-2 fs-13"><i class="fa fa-caret-up scale5 me-2 text-success" aria-hidden="true"></i>Total loss</p> -->
									<h2 class="text-black mb-0 font-w600">Bitcoin</h2>
                                    <h6 class="text-success" id="btc">You've selected payment via Bitcoin (Btc), kindly enter amount in USD to make withdraw</h6>
                                    <div class="mr-0">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Withdraw</button>
                                    </div>
                                </div>
                                <div class="me-auto" id="skrill" style="display:none">
									<!-- <p class="mb-2 fs-13"><i class="fa fa-caret-up scale5 me-2 text-success" aria-hidden="true"></i>Total loss</p> -->
									<h2 class="text-black mb-0 font-w600">Bank Withdraw</h2>
                                    <h6 class="text-success" id="btc">You've selected payment via Bank Withdraw, kindly enter amount in USD to make withdraw</h6>
                                    <div class="mr-0">
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleBankModal">Withdraw</button>
                                    </div>
                                </div>
                                <div class="me-auto" id="neteller" style="display:none">
									<!-- <p class="mb-2 fs-13"><i class="fa fa-caret-up scale5 me-2 text-success" aria-hidden="true"></i>Total loss</p> -->
									<h2 class="text-black mb-0 font-w600">Neteller</h2>
                                    <h6 class="text-success" id="btc">You've selected payment via Neteller, kindly enter amount in USD to make deposit</h6>
                                    <div class="mr-0">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Deposit</button>
                                    </div>
                                </div>
								<svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M21.5566 23.893C21.1991 24.0359 20.8009 24.0359 20.4434 23.893L16.6064 22.3582L21 31.1454L25.3936 22.3582L21.5566 23.893Z" fill="#AC4CBC"/>
									<path d="M21 20.8846L26.2771 18.7739L21 10.3304L15.7229 18.7739L21 20.8846Z" fill="#AC4CBC"/>
									<path d="M21 0.00012207C9.40213 0.00012207 0.00012207 9.40213 0.00012207 21C0.00012207 32.5979 9.40213 41.9999 21 41.9999C32.5979 41.9999 41.9999 32.5979 41.9999 21C41.9871 9.40762 32.5924 0.0129395 21 0.00012207ZM29.8417 20.171L22.3417 35.171C21.9714 35.9121 21.0701 36.2124 20.3294 35.8421C20.0387 35.697 19.8034 35.4617 19.6583 35.171L12.1583 20.171C11.9253 19.7032 11.9519 19.1479 12.2284 18.7043L19.7284 6.70453C20.2269 6.00232 21.1996 5.83661 21.9018 6.33511C22.0451 6.43674 22.1701 6.56125 22.2717 6.70453L29.7712 18.7043C30.0482 19.1479 30.0747 19.7032 29.8417 20.171Z" fill="#AC4CBC"/>
								</svg>
							</div>
							<div class="card-body p-0">
								<canvas id="widgetChart4" class="max-h80 mt-auto"></canvas>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-lg-12 mt-5">
				<?php
  echo SuccessMessage();
  echo ErrorMessage();

  ?>
                        <div class="card">
                            <div class="card-header">
                                <h1>Bitcoin Withdraw History</h1>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table header-border table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Amount</th>
                                                <th>Method</th>
                                                <th>Wallet Address</th>
                                                <th>Debit From</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
										<?php
										$i = 0;
										$email = $_SESSION['email'];
										$query = "SELECT * FROM withdraw WHERE email = '$email' && method = 'bitcoin'";
										$query_run = mysqli_query($con, $query);
										if (mysqli_num_rows($query_run) > 0) {
										while ($row = mysqli_fetch_assoc($query_run)) {
											$i++;
										?>
                                        <tbody>

                                            <tr>
                                             
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row['amount'];?></td>
                                                <td><?php echo $row['method'];?></td>
                                                <td><?php echo $row['wallet_address'];?></td>
                                                <td><?php echo $row['debit_from'];?></td>
                                                <td><?php echo $row['date'];?></td>
                                                <td><?php echo $row['status'];?></td>
                                         
                                            </tr>
                                        </tbody>
										<?php }}?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

        <div class="col-lg-12 mt-5">
				<?php
  echo SuccessMessage();
  echo ErrorMessage();

  ?>
                        <div class="card">
                            <div class="card-header">
                                <h1>Bank Withdraw History</h1>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table header-border table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Amount</th>
                                                <th>Method</th>
                                                <th>Bank Name</th>
                                                <th>Bank Sort Code</th>
                                                <th>Account Name</th>
                                                <th>Account Number</th>
                                                <th>Debit From</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
										<?php
										$i = 0;
										$email = $_SESSION['email'];
										$query = "SELECT * FROM withdraw WHERE email = '$email' && method = 'bank'";
										$query_run = mysqli_query($con, $query);
										if (mysqli_num_rows($query_run) > 0) {
										while ($row = mysqli_fetch_assoc($query_run)) {
											$i++;
										?>
                                        <tbody>

                                            <tr>
                                             
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row['amount'];?></td>
                                                <td><?php echo $row['method'];?></td>
                                                <td><?php echo $row['bank_name'];?></td>
                                                <td><?php echo $row['sort_code'];?></td>
                                                <td><?php echo $row['account_name'];?></td>
                                                <td><?php echo $row['account_number'];?></td>
                                                <td><?php echo $row['debit_from'];?></td>
                                                <td><?php echo $row['date'];?></td>
                                                <td><?php echo $row['status'];?></td>
                                         
                                            </tr>
                                        </tbody>
										<?php }}?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
             </div>
		</div>
		
                
                    <?php include "includes/footer.php";?>	
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.4/dist/sweetalert2.all.js"></script>



<script>
    $(document).ready(function(){
        $('#rad').on('click',function(){
            $('#btc').show();
            $('#skrill').hide();
            $('#neteller').hide();
        })
        $('#rad2').on('click',function(){
            $('#btc').hide();
            $('#skrill').show();
            $('#neteller').hide();
        })
        $('#rad3').on('click',function(){
            $('#btc').hide();
            $('#skrill').hide();
            $('#neteller').show();
        })
    })
</script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Request Withdraw</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
			<form method="POST" id="withdraw">
			<div class="form-group">
				<label for="">Amount</label>
				<input type="text" class="form-control" id="myAmount" name="amount" required>
				<input type="hidden"  name="email" value="<?php echo $email ?>">
			</div>
			<div class="form-group">
				<label for="">Wallet Address</label>
				<input type="text" class="form-control" id="myAmount" name="wallet_address" required>
				<input type="hidden"  name="email" value="<?php echo $email ?>">
			</div>
			<div class="form-group">
				<label for="">Debit From</label>
				<select name="debit_from" id="" class="form-control" required>
					<option value="">--select where to withdraw from--</option>
                    <option value="profit">Profit</option>
					<option value="referral_bonus">Referral Bonus</option>
					<!-- <option value="invested">Invested</option>
					<option value="referral_bonus">Referral Bonus</option>
					<option value="investment_bonus">Investment Bonus</option> -->
				</select>
			</div>
			<div class="form-group">
				<label for="">Payment Gateway</label>
				<select name="method" id="" class="form-control" required>
					<option value="">--select payment gateway--</option>
					<option value="bitcoin">Bitcoin</option>
				</select>
			</div>
			<!-- <div class="alert text-white" style="background-color: grey;">Make sure you enter a valid wallet address</div> -->
	
			<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Procced</button>
      </div>
			</form>
      </div>

    </div>

  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleBankModal" tabindex="-1" aria-labelledby="exampleBankModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Request Bank Withdraw</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
			<form method="POST" id="bank_withdraw">
			<div class="form-group">
				<label for="">Amount</label>
				<input type="text" class="form-control" id="myAmount" name="amount" required>
				<input type="hidden"  name="email" value="<?php echo $email ?>">
			</div>
			<div class="form-group">
				<label for="">Bank Name</label>
				<input type="text" class="form-control" id="bankName" name="bankName" required>
			</div>
            <div class="form-group">
				<label for="">Account Number</label>
				<input type="text" class="form-control" id="accountNumber" name="accountNumber" required>
			</div>
            <div class="form-group">
				<label for="">Account Name</label>
				<input type="text" class="form-control" id="accountName" name="accountName" required>
			</div>
            <div class="form-group">
				<label for="">Bank Sort Code</label>
				<input type="text" class="form-control" id="sortCode" name="sortCode" required>
			</div>
			<div class="form-group">
				<label for="">Debit From</label>
				<select name="debit_from" id="" class="form-control" required>
					<option value="">--select where to withdraw from--</option>
					<option value="profit">Profit</option>
					<option value="referral_bonus">Referral Bonus</option>
					<!-- <option value="investment_bonus">Investment Bonus</option> -->
				</select>
			</div>
			<!-- <div class="alert text-white" style="background-color: grey;">Make sure you enter a valid wallet address</div> -->
	
			<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Procced</button>
      </div>
			</form>
      </div>

    </div>

  </div>
</div>

<script>
	$('document').ready(function(){
		$('#bank_withdraw').on('submit', function(e){
			e.preventDefault();    
           var formData = new FormData(this);
		   $.ajax({
          url: 'php/bank_withdraw.php',
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
		  success: function (data) {
                   if(data.trim() == 'success'){
                       
                       Swal.fire({
       icon:'success',					
       html:'<div class=""> Withdrawal Requested</div>',
       showConfirmButton:true,
       allowOutsideClick:true
       }).then((result) => {
       location.href="withdraw.php"; 

       })
       }
       else if(data.trim() == 'failed'){
                       
                       Swal.fire({
       icon:'error',					
       html:'<div class=""> Failed to Make Withdrawal</div>',
       showConfirmButton:true,
       allowOutsideClick:true
       })
       }
       
       else{
                   Swal.fire({
                   icon:'error',
                   html:'<div> something went wrong</div>',
                   allowOutsideClick:true
                   });
                           }		
               },
               error:function(){},
		})
		
	})
})
</script>


<script>
	$('document').ready(function(){
		$('#withdraw').on('submit', function(e){
			e.preventDefault();    
           var formData = new FormData(this);
		   $.ajax({
          url: 'php/withdraw.php',
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
		  success: function (data) {
                   if(data.trim() == 'success'){
                       
                       Swal.fire({
       icon:'success',					
       html:'<div class=""> Withdrawal Requested</div>',
       showConfirmButton:true,
       allowOutsideClick:true
       }).then((result) => {
       location.href="withdraw.php"; 

       })
       }
       else if(data.trim() == 'failed'){
                       
                       Swal.fire({
       icon:'error',					
       html:'<div class=""> Failed to Make Withdrawal</div>',
       showConfirmButton:true,
       allowOutsideClick:true
       })
       }
       
       else{
                   Swal.fire({
                   icon:'error',
                   html:'<div> something went wrong</div>',
                   allowOutsideClick:true
                   });
                           }		
               },
               error:function(){},
		})
		
	})
})
</script>
<?php include "includes/header.php";?>

 <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">

   
            <div class="col-lg-12 mt-5">
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
                                                <th>Payment Gateway</th>
                                                <th>Wallet Address</th>
                                                <th>Debit From</th>
                                                <th>Email</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <?php
        $i = 0;
        $query = "SELECT * FROM withdraw WHERE status = 'confirmed' && method= 'bitcoin'";
        $query_run = mysqli_query($con, $query);
        if (mysqli_num_rows($query_run) > 0) {
          while ($row = mysqli_fetch_assoc($query_run)) {
            $i++;
        ?>
                                        <tbody>
                                            <tr>
                                             
                                                <td><?php echo $i ;?></td>
                                                <td><?php echo $row['amount']?></td>
                                                <td><?php echo $row['method']?></td>
                                                <td><?php echo $row['wallet_address']?></td>
                                                <td><?php echo $row['debit_from']?></td>
                                                <td><?php echo $row['email']?></td>
                                                <td><?php echo $row['date']?></td>
                                                <td><?php echo $row['status'];?></td>
                                            </tr>
                                        </tbody>
                                        <?php }
        }?>
                                    </table>
                                </div>
                            </div>
                        </div>

             <div class="col-lg-12 mt-5">
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
        $query = "SELECT * FROM withdraw WHERE status = 'confirmed' && method= 'bank'";
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
                                        <?php }
        }?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
             </div>
            </div>
        </div>




<?php include "includes/footer.php";?>
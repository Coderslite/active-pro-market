<?php include "includes/header.php";
include "php/session.php";
?>
 <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">

   
            <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-header">
                                <h1>Deposit Confirmation</h1>
                            </div>
                            <div class="card-body">

      
                                <div class="table-responsive">
                                <?php
  echo SuccessMessage();
  echo ErrorMessage();

  ?>
                                    <table class="table header-border table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Email</th>
                                                <th>Transaction ID</th>
                                                <th>Amount</th>
                                                <th>Type</th>
                                                <th>Date</th>
                                                <th>Accept</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <?php
        $i = 0;
        $query = "SELECT * FROM deposit WHERE status = 'pending'";
        $query_run = mysqli_query($con, $query);
        if (mysqli_num_rows($query_run) > 0) {
          while ($row = mysqli_fetch_assoc($query_run)) {
            $i++;
        ?>
                                        <tbody>
                                            <tr>
                                             
                                                <td><?php echo $i ;?></td>
                                                <td><?php echo $row['email']?></td>
                                                <td><?php echo $row['transaction_id']?></td>
                                                <td><?php echo $row['amount']?></td>
                                                <td><?php echo $row['type']?></td>
                                                <td><?php echo $row['method']?></td>
                                                <td><?php echo $row['date']?></td> 
                                                <td>
                                                    <form action="php/accept_deposit.php" method="POST">
                                                        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                                    <button class="btn btn-primary" type="submit">Accept</button>
                                                    </form>
                                                </td>
                                                <td>
                                                <form action="php/reject_deposit.php" method="POST">
                                                        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                    </form>
                                                </td>
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
<?php include "includes/header.php";
include "php/session.php";
?>

<script>
function myFunction() {
  var input, filter, table, tr, td, td2, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <h1>Registered Users</h1>

                </div>
                <div class="card-body">
                    <?php
                    echo SuccessMessage();
                    echo ErrorMessage();

                    ?>
                    
                    <div class="table-responsive">
                    <label class="">
                            Search:   </label>
                            <input type="text"  id="myInput" onkeyup="myFunction()"  placeholder="search using first name" class="form-control col-12">
                     
                        <table class="table header-border table-responsive-sm" id="myTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <th>Country</th>
                                    <!-- <th>Account Type</th> -->
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Delete</th>
                                    <th>Clear Account</th>
                                    <th>More Option</th>
                                </tr>
                            </thead>
                            <?php
                            $i = 0;
                            $query = "SELECT * FROM users WHERE role = 'user'";
                            $query_run = mysqli_query($con, $query);
                            $investmentAmount = 0;
                            $bonusAmount = 0;
                            $profitAmount = 0;
                            $withdrawBonusAmount = 0;
                            $withdrawInvestedAmount = 0;
                            $withdrawProfitAmount = 0;
                            if (mysqli_num_rows($query_run) > 0) {
                                while ($row = mysqli_fetch_assoc($query_run)) {
                                    $i++;
                                    $useremail = $row['email'];

                        ?>
                                    <tbody>
                                        <tr>

                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row['fullName']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['password']; ?></td>
                                            <td><?php echo $row['gender']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td><?php echo $row['nationality']; ?></td>
                                            <td><?php echo $row['image']; ?></td>
                                            <td><?php echo $row['status']; ?></td>
                                            <td> <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#exampleModalCenter<?php echo $i ?>">Delete User</button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalCenter<?php echo $i ?>">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Are you sure you want to delete <?php echo $row['fName'] . " " . $row['lName']; ?></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                                </button>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-dark " data-bs-dismiss="modal">No</button>
                                                                <form action="php/delete_user.php" method="POST">
                                                                    <input type="hidden" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                                                                    <button type="submit" class=" btn btn-danger light">Delete User</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </td>
                                            <td> <button type="button" class="btn btn-outline-danger mb-2" data-bs-toggle="modal" data-bs-target="#exampleClearCenter<?php echo $i ?>">CLear Account</button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleClearCenter<?php echo $i ?>">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Are you sure you want to clear <?php echo $row['fName'] . " " . $row['lName']; ?> Account</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                                </button>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-dark " data-bs-dismiss="modal">No</button>
                                                                <form action="php/clear_account.php" method="POST">
                                                                    <input type="hidden" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                                                                    <button type="submit" class="dropdown-item">Clear Account</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </td>
                                            <td>

                                                <div class="card-body">

                                                    <div class="basic-dropdown">
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-primary " data-bs-toggle="dropdown">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <circle fill="#ffffff" cx="12" cy="5" r="2" />
                                                                        <circle fill="#ffffff" cx="12" cy="12" r="2" />
                                                                        <circle fill="#ffffff" cx="12" cy="19" r="2" />
                                                                    </g>
                                                                </svg>

                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="top_up.php?email=<?php echo $row['email'] ?>">Top UP</a>
                                                                <a class="dropdown-item" href="debit_from.php?email=<?php echo $row['email'] ?>">Debit From</a>

                                           
                                            <?php if ($row['status'] == 'blocked') {
                                                echo '  <form action="php/unblock_user.php" method="POST">
            <input type="hidden" name="email" class="form-control" value="' . $row['email'] . '">
            <button class="dropdown-item" type="submit">Unblock</button>
            </form>';
                                            } else {
                                                echo '  <form action="php/block_user.php" method="POST">
                <input type="hidden" name="email" class="form-control" value="' . $row['email'] . '">
                <button class="dropdown-item" type="submit">Block</button>
                </form>';
                                            } ?>
                                            <form action="php/login.php" method="POST">
                                                <input type="hidden" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                                                <input type="hidden" name="password" class="form-control" value="<?php echo $row['password']; ?>">
                                                <button type="submit" class="dropdown-item">Login as User</button>
                                            </form>


                    </div>
                </div>
            </div>
        </div>
        </td>


        </tr>
        </tbody>
<?php }
                            }
?>
</table>
    </div>
</div>
</div>
</div>
</div>

</div>
</div>

<?php include "includes/footer.php"; ?>
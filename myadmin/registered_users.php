<?php
include "includes/header.php";
include "php/db_config.php";
include "php/session.php";

?>



<div class="page-wrapper">
  <div class="row py-5">
    <i class="fas fa-angle-right p-1"></i>
    <h5>Registered Users</h5>
  </div>
  <?php
  echo SuccessMessage();
  echo ErrorMessage();
  ?>
  <div class="container">
    <div class="table-responsive">
      <table class="table user-table no-wrap">
        <thead>
          <tr>
            <th class="border-top-0">id</th>
            <th class="border-top-0">First Name</th>
            <th class="border-top-0">Last Name</th>
            <th class="border-top-0">Email</th>
            <th class="border-top-0">Gender</th>
            <th class="border-top-0">Country</th>
            <th class="border-top-0">Password</th>
            <th class="border-top-0">Package</th>
            <th class="border-top-0">Phone Number</th>
            <th class="border-top-0">Currency</th>
            <th class="border-top-0">Amount Available</th>
            <th class="border-top-0">Status</th>
            <th class="border-top-0">Profit</th>
            <th class="border-top-0">Top Up</th>
            <th class="border-top-0">Action</th>

          </tr>
        </thead>
        <?php
        $i = 0;
        $query = "SELECT * FROM users WHERE role = 'user'";
        $query_run = mysqli_query($con, $query);
        if (mysqli_num_rows($query_run) > 0) {
          while ($row = mysqli_fetch_assoc($query_run)) {
            $i++;
        ?>
            <tbody>
              <tr>
                <td><?php echo $i?></td>
                <td><?php echo $row['firstname'] ?></td>
                <td><?php echo $row['lastname'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['gender'] ?></td>
                <td><?php echo $row['country'] ?></td>
                <td><?php echo $row['password'] ?></td>
                <td><?php echo $row['package'] ?></td>
                <td><?php echo $row['phone_number'] ?></td>
                <td><?php echo $row['currency'] ?></td>
                <td><?php 
                 $email = $row['email'];
                $amountQuery = mysqli_query($con,"SELECT * FROM deposit WHERE useremail ='$email ' && status = 'confirmed' ");
                $currentAmount = 0;
                if (mysqli_num_rows($amountQuery) > 0) {
                  while ($amount = mysqli_fetch_assoc($amountQuery)) {
                    $currentAmount = $currentAmount + $amount['amount'];
                  }
                }
                    echo $currentAmount;
                 ?></td>
                <td><?php echo $row['status'] ?></td>
                <td><?php echo $row['profit'] ?></td>
                <td><a href="top_up.php?email=<?php echo $row['email'] ?>" class="btn btn-success">Top Up</a></td>
                <?php if($row['status']=='active') {
                  $email =  $row['email'];
                  ?>
                  <td>
                  <form action="php/block_user.php" method="POST">
                  <input type="hidden" name="email" value="<?php echo $email ?>"/>
                  <button type="submit" class="btn btn-danger" id="blockBtn">Block User</button>
                  </form>
                  </td>
                  <?php
                }
                else if($row['status']=='blocked') {
                    $email =  $row['email'];
                    ?>
                    <form action="php/unblock_user.php" method="POST">
                    <input type="hidden" name="email" value="<?php echo $email ?>"/>
                    <td><button type="submit" class="btn btn-primary">Unblock User</button></td>
                    </form>
                 <?php
                  }
                  ?>
              </tr>

            </tbody>
        <?php }
        }
        ?>
      </table>
    </div>

  </div>
</div>

<!-- trade view start  -->

<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/" rel="noopener" target="_blank"><span class="blue-text">Markets</span></a> by TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
    {
      "symbols": [{
          "proName": "FOREXCOM:SPXUSD",
          "title": "S&P 500"
        },
        {
          "proName": "FOREXCOM:NSXUSD",
          "title": "US 100"
        },
        {
          "proName": "FX_IDC:EURUSD",
          "title": "EUR/USD"
        },
        {
          "proName": "BITSTAMP:BTCUSD",
          "title": "Bitcoin"
        },
        {
          "proName": "BITSTAMP:ETHUSD",
          "title": "Ethereum"
        }
      ],
      "showSymbolLogo": true,
      "colorTheme": "light",
      "isTransparent": false,
      "displayMode": "adaptive",
      "locale": "en"
    }
  </script>
</div>
<!-- TradingView Widget END -->


<!-- trade view ends -->
<?php
include "includes/footer.php";

?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.4/dist/sweetalert2.all.js"></script>



<script>
  $(document).ready(function() {
    $('#blockUser').on('submit', function(e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        url: 'php/block_user.php',
        type: 'POST',
        contentType: false,
        cache: false,
        // processData: false,
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
              html: '<div class="">User Blocked</div>',
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
              confirmButtonText: 'ok'
            }).then((result) => {
              location.href = "registered_users.php";
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

      // unblock user
      $('#unBlockUser').on('submit', function(e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        url: 'php/unblock_user.php',
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
              html: '<div class="">User Blocked</div>',
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
              confirmButtonText: 'ok'
            }).then((result) => {
              location.href = "registered_users.php";
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
  })
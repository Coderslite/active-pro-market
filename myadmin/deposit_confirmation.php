<?php
include "includes/header.php";
include "php/db_config.php";

?>


<div class="page-wrapper">
  <div class="row py-5">
    <i class="fas fa-angle-right p-1"></i>
    <h5>Deposit Confirmation</h5>
  </div>
  <div class="container">
    <div class="table-responsive">
      <table class="table user-table no-wrap">
        <thead>
          <tr>
            <th class="border-top-0">id</th>
            <th class="border-top-0">Amount</th>
            <th class="border-top-0">Bonus</th>
            <th class="border-top-0">Gateway</th>
            <th class="border-top-0">Transaction Id</th>
            <th class="border-top-0">Date</th>
            <th class="border-top-0">View Proof</th>
            <th class="border-top-0">Action</th>
            <th class="border-top-0">Action</th>
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
                <td><?php echo $i ?></td>
                <td><?php echo $row['amount'] ?></td>
                <td><?php echo $row['bonus'] ?></td>
                <td><?php echo $row['method'] ?></td>
                <td><?php echo $row['transaction_id'] ?></td>
                <td><?php echo $row['date'] ?></td>
                <td><a href="../payment_images/<?php echo $row['image'] ?>" target="_blank">view image</a></td>
                <td>
                  <form id="confirmPayment">
                    <input type="hidden" name="transaction_id" id="" value="<?php echo $row['transaction_id'] ?>">
                    <input type="hidden" name="email" id="" value="<?php echo $row['useremail'] ?>">
                    <button type="submit" class="btn btn-success">Confirm</button>
                  </form>
                </td>
                <td>
                  <form id="rejectPayment">
                    <input type="hidden" name="transaction_id" id="" value="<?php echo $row['transaction_id'] ?>">
                    <input type="hidden" name="email" id="" value="<?php echo $row['useremail'] ?>">
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
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
    $('#confirmPayment').on('submit', function(e) {
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
              html: '<div class="">Payment Approved</div>',
              showConfirmButton: true,
              allowOutsideClick: false,
              confirmButtonText: 'Done'
            }).then((result) => {
              location.href = "deposit_confirmation.php";
            })
          } else if (data.trim() == 'failed') {

            Swal.fire({
              icon: 'error',
              html: '<div class="">Something went wrong</div>',
              showConfirmButton: true,
              allowOutsideClick: false,
              confirmButtonText: 'Proceed to payment'
            }).then((result) => {
              location.href = "index.php";
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

    // delete form action

    $('#rejectPayment').on('submit', function(e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        url: 'php/reject_payment.php',
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
              html: '<div class="">Payment Rejected</div>',
              showConfirmButton: true,
              allowOutsideClick: false,
              confirmButtonText: 'Done'
            }).then((result) => {
              location.href = "deposit_confirmation.php";
            })
          } else if (data.trim() == 'failed_mail') {

            Swal.fire({
              icon: 'error',
              html: '<div class="">Fail to send mail</div>',
              showConfirmButton: true,
              allowOutsideClick: false,
              confirmButtonText: 'OK'
            }).then((result) => {
              location.href = "deposit_confirmation.php";
            })
          } else if (data.trim() == 'failed') {

            Swal.fire({
              icon: 'error',
              html: '<div class="">Something went wrong</div>',
              showConfirmButton: true,
              allowOutsideClick: false,
              confirmButtonText: 'OK'
            }).then((result) => {
              location.href = "deposit_confirmation.php";
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
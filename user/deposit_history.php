<?php
include "includes/header.php";
include "php/db_config.php";
include "php/session.php";

?>


<div class="page-wrapper">
  <div class="row py-5">
    <i class="fas fa-angle-right p-1"></i>
    <h5>Deposit History</h5>
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
            <th class="border-top-0">Amount</th>
            <th class="border-top-0">Bonus</th>
            <th class="border-top-0">Gateway</th>
            <th class="border-top-0">Transaction Id</th>
            <th class="border-top-0">Date</th>
            <th class="border-top-0">Status</th>
            <th class="border-top-0">Action</th>
          </tr>
        </thead>
        <?php
        $i = 0;
        $email = $_SESSION['email'];
        $query = "SELECT * FROM deposit WHERE email = '$email'";
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
                <?php if ($row['status'] == 'confirm_payment') {
                  echo '<td><a href="confirm_payment.php" class="btn btn-primary">confirm payment</a></td>';
                } else if ($row['status'] == 'pending') {
                  echo '<td>pending</td>';
                } else if ($row['status'] == 'confirmed') {
                  echo '<td>confirmed</td>';
                }
                ?>
                <td>
                  <?php
                  if ($row['status'] == 'confirm_payment') {
                    $transaction_id = $row["transaction_id"];
                  ?>
                    <form action="php/deposit_delete.php" method="POST">
                      <input type="hidden" name="transaction_id" value="<?php echo $transaction_id ?>">
                      <button type="submit" class="btn btn-danger" id="deleteBtn">Delete</button>
                    </form>
                  <?php
                  } else if ($row['status'] == 'pending') {
                    echo '......';
                  } else if ($row['status'] == 'confirmed') {
                    echo '<i class="fas fa-check"></i>';
                  }
                  ?>
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

    $('#deleteBtn').click(function(e) {

      $('#deleteForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        // Swal.fire({
        //   icon: 'question',
        //   html: '<div class="">You are getting</div>' + bonus + '% bonus',
        //   showConfirmButton: true,
        //   allowOutsideClick: true,
        //   confirmButtonText: 'Proceed!!!',
        //   // confirmButtonAriaLabel: 'Procced!!!',
        // })
        $.ajax({
          url: 'php/deposit_delete.php',
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
                html: '<div class="">Deleted Successfully</div>',
                showConfirmButton: true,
                allowOutsideClick: false,
                confirmButtonText: 'Done'
              }).then((result) => {
                location.href = "deposit_history.php";
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
      // $('#depositForm').on('submit',function(e){
      //   e.preventDefault();
      //   Swal.fire({
      //     icon:'question',
      //     html:'<div>Payment in progress</div>',
      //     showConfirmationButton:true,
      //     allowOutsideClick:true,
      //     confirmButtonText:'Proceed to payment'
      //   }).then((result)=>{
      //     location.href="payment.php";
      //   })
      // })
    })
  })
</script>
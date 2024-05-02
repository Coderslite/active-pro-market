<?php
include "includes/header.php";
include "php/db_config.php";

?>


<div class="page-wrapper">
  <div class="row py-5">
    <i class="fas fa-angle-right p-1"></i>
    <h5>Crypto Withdrawal Request History</h5>
  </div>
  <div class="container">
    <div class="table-responsive">
      <table class="table user-table no-wrap">
        <thead>
          <tr>
            <th class="border-top-0">id</th>
            <th class="border-top-0">Amount</th>
            <th class="border-top-0">Gateway</th>
            <th class="border-top-0">Wallet Address</th>
            <th class="border-top-0">Email Address</th>
            <th class="border-top-0">Status</th>
            <th class="border-top-0">Date</th>
          </tr>
        </thead>
        <?php
        $i = 0;
        $query = "SELECT * FROM crypto_withdraw";
        $query_run = mysqli_query($con, $query);
        if (mysqli_num_rows($query_run) > 0) {
          while ($row = mysqli_fetch_assoc($query_run)) {
            $i++;
        ?>
            <tbody>
              <tr>
                <td><?php echo $i?></td>
                <td><?php echo $row['amount'];?></td>
                <td><?php echo $row['method'];?></td>
                <td><?php echo $row['wallet_address'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['status'];?></td>
                <td><?php echo $row['date'];?></td>
              </tr>

            </tbody>
        <?php
          }
        }
        ?>
      </table>
    </div>

  </div>

  <div class="row py-5">
    <i class="fas fa-angle-right p-1"></i>
    <h5>Bank Withdrawal Request History</h5>
  </div>
  <div class="container">
    <div class="table-responsive">
      <table class="table user-table no-wrap">
        <thead>
          <tr>
            <th class="border-top-0">id</th>
            <th class="border-top-0">Amount</th>
            <th class="border-top-0">Bank Name</th>
            <th class="border-top-0">Account Number</th>
            <th class="border-top-0">Account Name</th>
            <th class="border-top-0">Email</th>
            <th class="border-top-0">Sort Code</th>
            <th class="border-top-0">Status</th>
          </tr>
        </thead>
        <?php
        $i = 0;
        $query = "SELECT * FROM bank_withdraw";
        $query_run = mysqli_query($con, $query);
        if (mysqli_num_rows($query_run) > 0) {
          while ($row = mysqli_fetch_assoc($query_run)) {
            $i++;
        ?>
            <tbody>
              <tr>
                <td><?php echo $i?></td>
                <td><?php echo $row['amount'];?></td>
                <td><?php echo $row['bank_name'];?></td>
                <td><?php echo $row['account_number'];?></td>
                <td><?php echo $row['account_name'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['sort_code'];?></td>
                <td><?php echo $row['status'];?></td>
              </tr>

            </tbody>
        <?php
          }
        }
        ?>
      </table>
    </div>

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
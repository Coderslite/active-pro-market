<?php
include "includes/header.php";
include "php/db_config.php";

?>


<div class="page-wrapper">
  <div class="row py-5">
    <i class="fas fa-angle-right p-1"></i>
    <h5>Deposit History</h5>
  </div>
  <div class="container">
    <div class="table-responsive">
      <table class="table user-table no-wrap">
        <thead>
          <tr>
            <th class="border-top-0">id</th>
            <th class="border-top-0">Email</th>
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
        $query = "SELECT * FROM deposit WHERE status = 'confirmed'";
        $query_run = mysqli_query($con, $query);
        if (mysqli_num_rows($query_run) > 0) {
          while ($row = mysqli_fetch_assoc($query_run)) {
            $i++;
        ?>
            <tbody>
              <tr>
                <td><?php echo $i?></td>
                <td><?php echo $row['useremail'] ?></td>
                <td><?php echo $row['amount'] ?></td>
                <td><?php echo $row['bonus'] ?></td>
                <td><?php echo $row['method'] ?></td>
                <td><?php echo $row['transaction_id'] ?></td>
                <td><?php echo $row['date'] ?></td>
                <td>confirmed</td>
                <td><i class="fas fa-check text-success"></i></td>
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
<?php
include "includes/header.php";

?>


<div class="page-wrapper">
    <div class="row py-5">
        <i class="fas fa-angle-right p-1"></i>
        <h5>Withdrawal History</h5>
    </div>
    <div class="container">
    <div class="table-responsive">
                                    <table class="table user-table no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">id</th>
                                                <th class="border-top-0">Amount</th>
                                                <th class="border-top-0">Gateway</th>
                                                <th class="border-top-0">Status</th>
                                                <th class="border-top-0">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>$5000</td>
                                                <td>paystack</td>
                                                <td>paid</td>
                                                <td>today</td>
                                            </tr>
                                           
                                        </tbody>
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
  "symbols": [
    {
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
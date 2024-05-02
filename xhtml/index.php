<?php include "includes/header.php"; ?>


<?php
include "php/db_config.php";
$email = $_SESSION['email'];
$useremail = $email;
$investmentAmount = 0;
$bonusAmount = 0;
$profitAmount = 0;

$withdrawBonusAmount = 0;
$withdrawInvestedAmount = 0;
$withdrawProfitAmount = 0;

//investment query start
$fetchUser = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
if (mysqli_num_rows($fetchUser) > 0) {
    while ($userRow = mysqli_fetch_assoc($fetchUser)) {
        $fName =$userRow['fullName'];
    }
}

//investment query start
$fetchInvestmentDeposit = mysqli_query($con, "SELECT * FROM deposit WHERE email = '$email' && status = 'confirmed' && type ='investment' ");
if (mysqli_num_rows($fetchInvestmentDeposit) > 0) {
    while ($row = mysqli_fetch_assoc($fetchInvestmentDeposit)) {
        $investmentAmount = $investmentAmount + $row['amount'];
    }
}

// investment query ends

//bonus query start
$fetchBonusDeposit = mysqli_query($con, "SELECT * FROM deposit WHERE email = '$email' && status = 'confirmed' && type ='investment_bonus' ");
if (mysqli_num_rows($fetchBonusDeposit) > 0) {
    while ($row = mysqli_fetch_assoc($fetchBonusDeposit)) {
        $bonusAmount = $bonusAmount + $row['amount'];
    }
}
// bonus query ends

//profit query start
$fetchProfitDeposit = mysqli_query($con, "SELECT * FROM deposit WHERE email = '$email' && status = 'confirmed' && type ='profit' ");
if (mysqli_num_rows($fetchProfitDeposit) > 0) {
    while ($row = mysqli_fetch_assoc($fetchProfitDeposit)) {
        $profitAmount = $profitAmount + $row['amount'];
    }
}
// profit query ends



         // withdraw invested query start
    $fetchInvestedWithdraw = mysqli_query($con, "SELECT * FROM withdraw WHERE email = '$useremail' && status = 'confirmed' && debit_from ='invested' ");
    if (mysqli_num_rows($fetchInvestedWithdraw) > 0) {
        while ($withdrawinvestedrow = mysqli_fetch_assoc($fetchInvestedWithdraw)) {
            $withdrawInvestedAmount =  $withdrawInvestedAmount + $withdrawinvestedrow['amount'];
        }
    }
         // withdraw invested query ends

         // withdraw bonus query start
         $fetchBonusWithdraw = mysqli_query($con, "SELECT * FROM withdraw WHERE email = '$useremail' && status = 'confirmed' && debit_from ='bonus' ");
         if (mysqli_num_rows($fetchBonusWithdraw) > 0) {
             while ($withdrawbonusrow = mysqli_fetch_assoc($fetchBonusWithdraw)) {
                 $withdrawBonusAmount =  $withdrawBonusAmount + $withdrawbonusrow['amount'];
             }
         }
         // withdraw bonus query ends

         // withdraw profit query start
         $fetchProfitWithdraw = mysqli_query($con, "SELECT * FROM withdraw WHERE email = '$useremail' && status = 'confirmed' && debit_from ='profit' ");
         if (mysqli_num_rows($fetchProfitWithdraw) > 0) {
             while ($withdrawprofitrow = mysqli_fetch_assoc($fetchProfitWithdraw)) {
                 $withdrawProfitAmount =  $withdrawProfitAmount + $withdrawprofitrow['amount'];
             }
         }
         // withdraw profit query ends



?>
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <h2>Welcome, <?php echo $fName ?> !</h2>
        <marquee>Welcome to METAMINERFX investment Platform</marquee>
        <div class="row">
            <div class="col-xl-4 col-sm-6">
                <div class="card overflow-hidden">
                    <div class="card-header align-items-start border-0 pb-0">
                        <div class="me-auto">
                            <p class="mb-2 fs-13"><i class="fa fa-caret-up scale5 me-2 text-success" aria-hidden="true"></i>Invested</p>
                            <input type="hidden" id="amount" value="<?php echo $investmentAmount - $withdrawInvestedAmount ?>">
                            <h2 class="text-black mb-0 font-w600">$<span id="amount2"></span></h2>
                        </div>
                        <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M28.5 16.5002C28.4986 14.844 27.156 13.5018 25.5003 13.5H16.5002V19.4999H25.5003C27.156 19.4985 28.4986 18.1559 28.5 16.5002Z" fill="#FFAB2D" />
                            <path d="M16.5002 28.5H25.5003C27.1569 28.5 28.5 27.157 28.5 25.5003C28.5 23.8432 27.1569 22.5001 25.5003 22.5001H16.5002V28.5Z" fill="#FFAB2D" />
                            <path d="M21 0.00012207C9.4021 0.00012207 9.15527e-05 9.40213 9.15527e-05 21C9.15527e-05 32.5979 9.4021 41.9999 21 41.9999C32.5979 41.9999 41.9999 32.5979 41.9999 21C41.9866 9.40762 32.5924 0.0133972 21 0.00012207ZM31.5002 25.4998C31.4961 28.8122 28.8122 31.4961 25.5003 31.4998V32.9998C25.5003 33.8284 24.8283 34.4999 24.0002 34.4999C23.1716 34.4999 22.5001 33.8284 22.5001 32.9998V31.4998H19.5004V32.9998C19.5004 33.8284 18.8284 34.4999 18.0003 34.4999C17.1717 34.4999 16.5002 33.8284 16.5002 32.9998V31.4998H12.0004C11.1718 31.4998 10.5003 30.8282 10.5003 30.0001C10.5003 29.1716 11.1718 28.5 12.0004 28.5H13.5V13.5H12.0004C11.1718 13.5 10.5003 12.8285 10.5003 11.9999C10.5003 11.1714 11.1718 10.4998 12.0004 10.4998H16.5002V9.00021C16.5002 8.17166 17.1717 7.50012 18.0003 7.50012C18.8288 7.50012 19.5004 8.17166 19.5004 9.00021V10.4998H22.5001V9.00021C22.5001 8.17166 23.1716 7.50012 24.0002 7.50012C24.8287 7.50012 25.5003 8.17166 25.5003 9.00021V10.4998C28.7998 10.4861 31.486 13.1494 31.5002 16.4489C31.5075 18.1962 30.7499 19.8593 29.4265 21C30.7375 22.128 31.4942 23.77 31.5002 25.4998Z" fill="#FFAB2D" />
                        </svg>
                    </div>
                    <!-- <div class="card-body p-0">
								<canvas id="widgetChart" class="max-h80 mt-auto"></canvas>
							</div> -->
                </div>
            </div>

            <div class="col-xl-4 col-sm-6">
                <div class="card overflow-hidden">
                    <div class="card-header align-items-start border-0 pb-0">
                        <div class="me-auto">
                            <p class="mb-2 fs-13"><i class="fa fa-caret-down scale5 me-2 text-danger" aria-hidden="true"></i>profit</p>
                            <input type="hidden" value="<?php echo $profitAmount -$withdrawProfitAmount ?>" id="profit">
                            <h2 class="text-black mb-0 font-w600">$<span id="profit_amount"></span></h2>
                            
                        </div>
                        <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 0.00012207C9.4021 0.00012207 9.15527e-05 9.40213 9.15527e-05 21C9.15527e-05 32.5979 9.4021 41.9999 21 41.9999C32.5979 41.9999 41.9999 32.5979 41.9999 21C41.9871 9.40762 32.5924 0.0129395 21 0.00012207ZM12.3281 19.4999H18.328C19.1566 19.4999 19.8281 20.1715 19.8281 21C19.8281 21.8286 19.1566 22.5001 18.328 22.5001H12.3281C11.4996 22.5001 10.828 21.8286 10.828 21C10.828 20.1715 11.5 19.4999 12.3281 19.4999ZM31.0841 17.3658L29.28 26.392C28.8552 28.4872 27.0155 29.9951 24.8777 30.0001H12.3281C11.4996 30.0001 10.828 29.3286 10.828 28.5C10.828 27.6715 11.5 26.9999 12.3281 26.9999H24.8777C25.5868 26.9981 26.197 26.4982 26.338 25.8033L28.1425 16.7772C28.3027 15.9715 27.7799 15.1887 26.9747 15.0285C26.8791 15.0097 26.782 15.0001 26.685 15.0001H15.3283C14.4998 15.0001 13.8282 14.3286 13.8282 13.5C13.8282 12.6715 14.4998 11.9999 15.3283 11.9999H26.685C29.1633 12.0009 31.1715 14.01 31.1711 16.4883C31.1711 16.7827 31.1418 17.0765 31.0841 17.3658Z" fill="#3693FF" />
                        </svg>
                    </div>
                    <!-- <div class="card-body p-0">
								<canvas id="widgetChart2" class="max-h80 mt-auto"></canvas>
							</div> -->
                </div>

            </div>
            <div class="col-xl-4 col-sm-6">
                <div class="card overflow-hidden">
                    <div class="card-header align-items-start border-0 pb-0">
                        <div class="me-auto">
                            <p class="mb-2 fs-13"><i class="fa fa-caret-down scale5 me-2 text-danger" aria-hidden="true"></i>Balance</p>
                            <input type="hidden" value="<?php echo ($investmentAmount + $bonusAmount + $profitAmount -$withdrawProfitAmount -$withdrawInvestedAmount - $withdrawBonusAmount) ?>" id="total_balance">

                            <h2 class="text-black mb-0 font-w600">$<span id="total_amount"></span></h2>
                        </div>
                        <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 0.00012207C9.4021 0.00012207 9.15527e-05 9.40213 9.15527e-05 21C9.15527e-05 32.5979 9.4021 41.9999 21 41.9999C32.5979 41.9999 41.9999 32.5979 41.9999 21C41.9871 9.40762 32.5924 0.0129395 21 0.00012207ZM26.9999 30.0001H22.5001V34.4999C22.5001 35.3285 21.8286 36 21 36C20.1714 36 19.4999 35.3285 19.4999 34.4999V30.0001H15.0001C14.1715 30.0006 13.4995 29.3295 13.4991 28.5009C13.4991 28.1599 13.6149 27.8289 13.8282 27.5625L23.8784 15.0001H15.0001C14.1715 15.0001 13.5 14.3286 13.5 13.5C13.5 12.6715 14.1715 11.9999 15.0001 11.9999H19.4999V7.50012C19.4999 6.67157 20.1714 6.00003 21 6.00003C21.8286 6.00003 22.5001 6.67203 22.5001 7.50012V11.9999H26.9999C27.8294 12.0013 28.5005 12.6747 28.4995 13.5037C28.4991 13.8429 28.3833 14.1725 28.1718 14.4375L18.1216 26.9999H26.9999C27.8285 26.9999 28.5 27.6719 28.5 28.5C28.5 29.3286 27.8285 30.0001 26.9999 30.0001Z" fill="#5B5D81" />
                        </svg>
                    </div>
                    <!-- <div class="card-body p-0">
								<canvas id="widgetChart3" class="max-h80 mt-auto"></canvas>
							</div> -->
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card overflow-hidden">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/EURUSD/?exchange=FX" rel="noopener" target="_blank"><span class="blue-text">EURUSD Rates</span></a> by TradingView</div>
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                                    {
                                        "symbol": "FX:EURUSD",
                                        "width": "100%",
                                        "height": "100%",
                                        "locale": "en",
                                        "dateRange": "12M",
                                        "colorTheme": "dark",
                                        "trendLineColor": "rgba(41, 98, 255, 1)",
                                        "underLineColor": "rgba(41, 98, 255, 0.3)",
                                        "underLineBottomColor": "rgba(41, 98, 255, 0)",
                                        "isTransparent": true,
                                        "autosize": false,
                                        "largeChartUrl": ""
                                    }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card overflow-hidden">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/GBPUSD/?exchange=FX" rel="noopener" target="_blank"><span class="blue-text">GBPUSD Rates</span></a> by TradingView</div>
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                                    {
                                        "symbol": "FX:GBPUSD",
                                        "width": "100%",
                                        "height": "100%",
                                        "locale": "en",
                                        "dateRange": "12M",
                                        "colorTheme": "dark",
                                        "trendLineColor": "rgba(41, 98, 255, 1)",
                                        "underLineColor": "rgba(41, 98, 255, 0.3)",
                                        "underLineBottomColor": "rgba(41, 98, 255, 0)",
                                        "isTransparent": true,
                                        "autosize": false,
                                        "largeChartUrl": ""
                                    }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card overflow-hidden">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/USDCAD/?exchange=FX" rel="noopener" target="_blank"><span class="blue-text">USDCAD Rates</span></a> by TradingView</div>
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                                    {
                                        "symbol": "FX:USDCAD",
                                        "width": "100%",
                                        "height": "100%",
                                        "locale": "en",
                                        "dateRange": "12M",
                                        "colorTheme": "dark",
                                        "trendLineColor": "rgba(41, 98, 255, 1)",
                                        "underLineColor": "rgba(41, 98, 255, 0.3)",
                                        "underLineBottomColor": "rgba(41, 98, 255, 0)",
                                        "isTransparent": true,
                                        "autosize": false,
                                        "largeChartUrl": ""
                                    }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card overflow-hidden">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/BTCUSD/?exchange=BITSTAMP" rel="noopener" target="_blank"><span class="blue-text">BTCUSD Rates</span></a> by TradingView</div>
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                                    {
                                        "symbol": "BITSTAMP:BTCUSD",
                                        "width": "100%",
                                        "height": "100%",
                                        "locale": "en",
                                        "dateRange": "12M",
                                        "colorTheme": "dark",
                                        "trendLineColor": "rgba(41, 98, 255, 1)",
                                        "underLineColor": "rgba(41, 98, 255, 0.3)",
                                        "underLineBottomColor": "rgba(41, 98, 255, 0)",
                                        "isTransparent": true,
                                        "autosize": false,
                                        "largeChartUrl": ""
                                    }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card overflow-hidden">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/USDJPY/?exchange=FX" rel="noopener" target="_blank"><span class="blue-text">USDJPY Rates</span></a> by TradingView</div>
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                                    {
                                        "symbol": "FX:USDJPY",
                                        "width": "100%",
                                        "height": "100%",
                                        "locale": "en",
                                        "dateRange": "12M",
                                        "colorTheme": "dark",
                                        "trendLineColor": "rgba(41, 98, 255, 1)",
                                        "underLineColor": "rgba(41, 98, 255, 0.3)",
                                        "underLineBottomColor": "rgba(41, 98, 255, 0)",
                                        "isTransparent": true,
                                        "autosize": false,
                                        "largeChartUrl": ""
                                    }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card overflow-hidden">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/BTCUSDT/?exchange=BINANCE" rel="noopener" target="_blank"><span class="blue-text">BTCUSDT Rates</span></a> by TradingView</div>
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                                    {
                                        "symbol": "BINANCE:BTCUSDT",
                                        "width": "100%",
                                        "height": "100%",
                                        "locale": "en",
                                        "dateRange": "12M",
                                        "colorTheme": "dark",
                                        "trendLineColor": "rgba(41, 98, 255, 1)",
                                        "underLineColor": "rgba(41, 98, 255, 0.3)",
                                        "underLineBottomColor": "rgba(41, 98, 255, 0)",
                                        "isTransparent": true,
                                        "autosize": false,
                                        "largeChartUrl": ""
                                    }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div id="tradingview_05076"></div>
                    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text">AAPL Chart</span></a> by TradingView</div>
                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                    <script type="text/javascript">
                        new TradingView.widget({
                            "symbol": "NASDAQ:AAPL",
                            "interval": "D",
                            "timezone": "Etc/UTC",
                            "theme": "dark",
                            "style": "1",
                            "locale": "en",
                            "toolbar_bg": "#f1f3f6",
                            "enable_publishing": false,
                            "withdateranges": true,
                            "hide_side_toolbar": false,
                            "allow_symbol_change": true,
                            "details": true,
                            "calendar": true,
                            "show_popup_button": true,
                            "popup_width": "1000",
                            "popup_height": "650",
                            "container_id": "tradingview_05076"
                        });
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button class="btn btn-success" id="trade-btn">Trade</button>

        </div>
        <div class="col-lg-12 mt-5">

            <div class="card">
                <div class="card-header">
                    <h1>Deposit History</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table header-border table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Amount</th>
                                    <th>Deposit ID</th>
                                    <th>Gateway</th>
                                    <th>Credited TO</th>
                                    <th>Date</th>
                                    <th>Delete</th>
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

                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row['amount']; ?></td>
                                            <td><?php echo $row['transaction_id']; ?></td>
                                            <td><?php echo $row['method']; ?></td>
                                            <td><?php echo $row['type']; ?></td>
                                            <td><?php echo $row['date']; ?></td>
                                            <td>
                                                <form action="php/delete_deposit.php" method="POST">
                                                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                                                    <input type="hidden" name="transaction_id" value="<?php echo $row['transaction_id']; ?>">
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                            <?php }
                            } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--**********************************
            Content body end
        ***********************************-->

<?php include "includes/footer.php"; ?>


<script>
    $(document).ready(function() {
        $('#trade-btn').on('click', function() {
            alert("trading robot is currently activated on your account, please contact support for manual trade action.");
        })
        var num = $('#amount').val();
        // const a = (1234567.89).toLocaleString('en')  
        const a = parseFloat(num).toLocaleString('en')
        $('#amount2').html(a);

        var num2 = $('#invested_bonus').val();
        // const a = (1234567.89).toLocaleString('en')  
        const b = parseFloat(num2).toLocaleString('en')
        $('#invested_bonus2').html(b);

        var num3 = $('#profit').val();
        // const a = (1234567.89).toLocaleString('en')  
        const c = parseFloat(num3).toLocaleString('en')
        $('#profit_amount').html(c);

        var num4 = $('#total_balance').val();
        // const a = (1234567.89).toLocaleString('en')  
        const d = parseFloat(num4).toLocaleString('en')
        $('#total_amount').html(d);
    })
</script>
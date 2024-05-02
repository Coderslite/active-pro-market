<?php
require_once "includes/header.php";
?>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Dashboard</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- <div class="col-md-6 col-4 align-self-center">
                        <div class="text-right upgrade-btn">
                            <a href="https://wrappixel.com/templates/monsteradmin/"
                                class="btn btn-success d-none d-md-inline-block text-white" target="_blank">Upgrade to
                                Pro</a>
                        </div>
                    </div> -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <?php
    include "php/db_config.php";
    $email = $_SESSION['email'];
    $fetchRecord = mysqli_query($con, "SELECT * FROM deposit WHERE useremail = '$email' && status = 'confirmed' ");
    $amount = 0;
    $bonus = 0;
    if (mysqli_num_rows($fetchRecord) > 0) {
        while ($row = mysqli_fetch_assoc($fetchRecord)) {
            $amount = $amount + $row['amount'];
            $bonus = $bonus + $row['bonus'];
        }
    }
    ?>
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Balance</h4>
                        <div class="text-right">
                            <h2 class="font-light m-b-0">R<?php echo $amount ?></h2>
                        </div>
                        <a href="deposit.php" class="btn btn-success text-white">Deposit <i class="fas fa-arrow-down"></i></a href="deposit.php">

                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bonus Balance</h4>
                        <div class="text-right">
                            <h2 class="font-light m-b-0">R<?php echo $bonus ?></h2>
                        </div>
                        <a href="withdraw.php" class="btn btn-danger ">Withdraw <i class="fas fa-arrow-up"></i></a>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <?php
             $fetchProfit = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
             if (mysqli_num_rows($fetchProfit) > 0) {
                while ($row = mysqli_fetch_assoc($fetchProfit)) {
                    $profit = $row['profit'];
                }
            }
            ?>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Profit</h4>
                        <div class="text-right">
                            <h2 class="font-light m-b-0"><?php if(empty($profit)){
                                echo "no profit yet";
                            }
                            else{
                                echo "R".$profit;
                            } ?></h2>
                        </div>
                        <a href="deposit.php" class="btn btn-success text-white">Profit <i class="fas fa-arrow-down"></i></a href="deposit.php">

                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- ============================================================== -->
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
            <div id="tradingview_01e1d"></div>
            <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text">AAPL Chart</span></a> by TradingView</div>
            <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
            <script type="text/javascript">
                new TradingView.widget({
                    "width": 980,
                    "height": 610,
                    "symbol": "NASDAQ:AAPL",
                    "interval": "1",
                    "timezone": "Etc/UTC",
                    "theme": "light",
                    "style": "1",
                    "locale": "en",
                    "toolbar_bg": "#f1f3f6",
                    "enable_publishing": false,
                    "allow_symbol_change": true,
                    "calendar": true,
                    "container_id": "tradingview_01e1d"
                });
            </script>
        </div>
        <!-- TradingView Widget END -->
    </div>

</div>


    <?php include "includes/footer.php"; ?>
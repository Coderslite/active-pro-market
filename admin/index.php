<?php
require_once "includes/header.php"
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
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
         
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <?php 
                        include "php/db_config.php";
                        $query = mysqli_query($con, "SELECT * FROM users WHERE role = 'user'");
                        $RegisteredUsers = mysqli_num_rows($query);
                // if(mysqli_num_rows($query)>0){
                //     while(mysqli_num_rows($query)>0){
                //     }
                // }
                    ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Registered Users</h4>
                                <div class="text-right">
                                    <h2 class="font-light m-b-0"> <?php echo $RegisteredUsers ?></h2>
                                </div>
                                <a href="registered_users.php" class="btn btn-success text-white">View Registered User</a>
                         
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <?php 
                    include "php/db_config.php";
                    $query = mysqli_query($con, "SELECT * FROM deposit WHERE status = 'confirmed' && method !='bonus'");
                    $amount = 0;
                    $bonus = 0;
                    if (mysqli_num_rows($query) > 0) {
                      while ($row = mysqli_fetch_assoc($query)) {
                        $amount = $amount + $row['amount'];
                        $bonus = $bonus + $row['bonus'];
                      }
                    //   $totalAmount = $amount + $bonus;
                    }
                    ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Bonus Balance</h4>
                                <div class="text-right">
                                    <h2 class="font-light m-b-0">R<?php echo $amount ?></h2>
                                </div>
                                <span class="btn btn-danger ">Earned</span>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- ============================================================== -->
        </div>
                                              <!-- TradingView Widget BEGIN -->
                                              <div class="tradingview-widget-container">
  <div id="tradingview_01e1d"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text">AAPL Chart</span></a> by TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  <script type="text/javascript">
  new TradingView.widget(
  {
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
}
  );
  </script>
</div>
<!-- TradingView Widget END -->


          <?php include "includes/footer.php";?>
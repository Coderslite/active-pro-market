<?php
include "includes/header.php";

?>


<div class="page-wrapper">
  <div class="alert alert-warning" role="alert">Note: you get <b>10%</b> bonus on every deposit more than $500 and <b>$5</b> bonus on every deposit less than $499</div>
  <div class="header p-5">
    <!-- <div class="btn btn-success">Ossai Abraham</div> -->
    <div>
      <form method="post" id="depositForm">
        <div class="container">
          <h3 class="text-center">Deposit</h3>
          <div class="form-group mt-3">
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Amount">
          </div>
          <div class="form-group">
            <label for="method">Method</label>
            <select name="method" id="method" class="form-control" required>
              <option value="bitcoin">select method</option>
              <option value="bitcoin">Bitcoin</option>
              <option value="ethereum">Ethereum</option>
              <option value="bank">Bank</option>
              <option value="dogecoin">DogeCoin</option>
              <option value="bnb">Bnb</option>
            </select>
          </div>
          <div class="form-group mt-3">
            <label for="bonus">Bonus</label>
            <input type="text" id="bonus" class="form-control" disabled>
            <input type="hidden" name="bonus" id="bonus1" class="form-control">
          </div>
          <div class="form-group mt-3">
            <label for="email">Email</label>
            <!-- <input type="email" id="email" class="form-control" value="Abgreat@gmail.com" disabled> -->
            <input type="email" name="email" id="email" class="form-control">
          </div>
          <button type="submit" class="btn btn-success">Proceed</button>
          <h4 class="text-center">Funding Method</h4>
          <div class="row justify-content-center">
            <img src="assets/images/btc.png" alt="" width="150px">
            <img src="assets/images/litecoin.png" alt="" width="90px" height="30px" class="mt-4">
            <img src="assets/images/ripple.png" alt="" width="90px" height="30px" class="mt-4">
            <img src="assets/images/tether.png" alt="" width="90px" height="30px" class="mt-4">
          </div>
        </div>
    </div>
    </form>
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


<script>
  $(document).ready(function() {

    $('#amount').change(function(e) {
      var amount = document.getElementById('amount').value;
      if (amount >= 500) {
        var bonus = amount * 1 / 100;
        $('#bonus').val(bonus);
        $('#bonus1').val(bonus);
      }
      if (amount < 500) {
        var bonus = amount * 3 / 100;
        $('#bonus1').val(bonus);
        $('#bonus').val(bonus);
      }

      $('#depositForm').on('submit', function(e) {
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
          url: 'php/deposit.php',
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
                icon: 'warning',
                html: '<div class=""> Proceed to make payment</div>',
                showConfirmButton: true,
                allowOutsideClick: false,
                confirmButtonText:'Proceed to payment'
              }).then((result) => {
                location.href = "payment.php";
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
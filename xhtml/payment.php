<?php include "includes/header.php";?>

 <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">

            <h1>Make deposit to the wallet below</h1>
                <div class="alert bg-warning">
                    <h3 class="text-white">Your account will be credited immediately your payment is confirmed</h3>
                </div>
            <div class="row">
                <h3>BTC</h3>
                <img src="images/btc.jpeg" alt="" width="200vw" class="d-flex m-auto">    
                <span class="bg-white p-2 mt-2"><input class="form-control" id="qr_code" value="16FzucR6MUmBu1gX775uWHXk4zfh6KqTud" disabled><span><span class="btn btn-success mx-2" id="copy_btn"  onclick="Copy()">copy</span></span>
                    <!-- <span style="border-width: 10px; border-color:black;">bc1qp49gahey4gufmkc8etuzgl3zlp5c0h4k6ezrja<span class="btn btn-primary m-2">copy</span></span> -->
            </div>


            <div class="row">
                <h3>USDT</h3>
                <img src="images/usdt.jpeg" alt="" width="200vw" class="d-flex m-auto">    
                <span class="bg-white p-2 mt-2"><input class="form-control" id="qr_code2" value="TXWes3YhiuNzpWewV9uCvsXgw8VK2Gsesu" disabled><span><span class="btn btn-success mx-2" id="copy_btn"  onclick="Copy2()">copy</span></span>
                    <!-- <span style="border-width: 10px; border-color:black;">bc1qp49gahey4gufmkc8etuzgl3zlp5c0h4k6ezrja<span class="btn btn-primary m-2">copy</span></span> -->
            </div>


            </div>
        </div>

<?php include "includes/footer.php";?>


<script type="text/javascript">

function Copy(text){
  var copyText = document.body.appendChild(document.createElement("input"));
var walletAddress = document.getElementById('qr_code').value;
  copyText.value = walletAddress;
  copyText.select();
  document.execCommand("copy");
  copyText.parentNode.removeChild(copyText);
  alert ("wallet address copied");
}

function Copy2(text){
  var copyText = document.body.appendChild(document.createElement("input"));
var walletAddress = document.getElementById('qr_code2').value;
  copyText.value = walletAddress;
  copyText.select();
  document.execCommand("copy");
  copyText.parentNode.removeChild(copyText);
  alert ("wallet address copied");
}



</script>
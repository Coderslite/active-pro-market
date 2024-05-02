<?php include "includes/header.php"; ?>

<div class="content-body">
<div class="container-fluid">
    <h2>Personal Verification</h2>
    <h6>Your Personal info/ID for verification will be processed and verified</h6>
    <hr>
    <div class="row">
        <div class="col-md-6">
           <label for="">First Name on ID</label>
          <input type="text" placeholder="First Name" class="form-control">
        </div>
        <div class="col-md-6">
          <label for="">Last Name on ID</label>
          <input type="text" placeholder="Last Name" class="form-control">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
           <label for="">Address Line 1</label>
          <input type="text" placeholder="" class="form-control">
        </div>
        <div class="col-md-6">
          <label for="">Address Line 2</label>
          <input type="text" placeholder="" class="form-control">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
          <div class="row">
          <div class="col-md-6">
          <label for="">City</label>
            <input type="text" placeholder="phoenix" class="form-control">
          </div>
        <div class="col-md-6">
          <label for="">State/Province</label>
            <input type="text" placeholder="e.g (Arizona)" class="form-control">
          </div>
          </div>
        </div>
        <div class="col-md-6">
       <div class="row">
       <div class="col-md-6">
       <label for="">Country</label>
            <input type="text" placeholder="e.g (USA)" class="form-control">
          </div>
        <div class="col-md-6">
          <label for="">Zip Code</label>
            <input type="text" placeholder="323435" class="form-control">
          </div>
       </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
           <label for="">ID type</label>
          <input type="text" placeholder="e.g (National id, international passport, drivers license)" class="form-control">
        </div>
        <div class="col-md-6">
          <label for="">Verification ID</label>
          <input type="file" class="form-control">
        </div>
    </div>
    <br>
    <div class="d-flex justify-content-center">
<button class="btn btn-success" id="trade-btn">Trade</button>

</div>
</div>

</div>
<?php include "includes/footer.php"; ?>
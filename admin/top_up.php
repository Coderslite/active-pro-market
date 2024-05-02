<?php include "includes/header.php";

$email = $_GET['email'];


?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <form id="top_up">
            <div class="form-group">
                <label for="">Amount</label>
                <input type="number" class="form-control" id="myAmount" name="amount" required>
                <input type="hidden" name="email" value="<?php echo $email ?>">
            </div>
            <div class="form-group">
                <label for="">What to Top Up</label>
               <select name="top_up" id="" class="form-control" required>
                <option value=""></option>
                <option value="profit">Profit</option>
                <option value="invested">Invested</option>
                <!-- <option value="bonus">Bonus</option> -->
               </select>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Procced</button>
            </div>
        </form>
    </div>
</div>

<?php include "includes/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.4/dist/sweetalert2.all.js"></script>

<script>
$("#top_up").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);
    $.ajax({
        url: 'php/top_up.php',
               type: 'POST',
               data: formData,
               cache: false,
               contentType: false,
               processData: false,
        beforeSend:function(){
            Swal.fire({
            html:'<div style="font-size: 15px; width:4rem; height:4rem;" class="spinner-border"></div>',
            showConfirmButton:false
            });
        
        },
        success: function (data) {
            if(data.trim() == 'success'){
                
                Swal.fire({
                icon:'success',					
                html:'<div class=""> Top Up Succsessful</div>',
                showConfirmButton:true,
                allowOutsideClick:false
                }).then((result) => {
                    location.href="registered_users.php";	// location.href="";

                })
                }
                else if(data.trim() == 'failed'){
                Swal.fire({
                icon:'error',					
                html:'<div class="">Failed to top up</div>',
                showConfirmButton:true,
                allowOutsideClick:false
                })
                }
                else{
                    Swal.fire({
                    icon:'error',
                    // html:data,
                html:'<div class="">Failed</div>',
                    allowOutsideClick:false
                    });
                }		
        },
        error:function(){
            Swal.fire({
                    icon:'error',
                    html:'<div>something went wrong</div>',
                    allowOutsideClick:false
                    });
        },
    });
});

</script>
<?php include "includes/header.php"; 

$email = $_GET['email'];

?>



    <!--**********************************
    
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">

     <form id="message">

     <h1>Message Client</h1>
           <input type="text" placeholder="Subject" name="subject" class="form-control" required>
            <textarea name="message" placeholder="enter message" id="" cols="30" rows="10" class="form-control" required></textarea><br>
            <input type="hidden" value="<?php echo $email ;?>" name="email">
            <input type="file" id="file" class="form-control" name="file"><br>
            <button type="submit" class="btn btn-success">Send Message</button>

     </form>

</div>
</div>

<?php include "includes/footer.php"; ?>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.4/dist/sweetalert2.all.js"></script>


<script>
	$('document').ready(function(){

		$('#message').on('submit', function(e){
			e.preventDefault();    
           var formData = new FormData(this);
		   $.ajax({
          url: 'php/message.php',
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
		  success: function (data) {
                   if(data.trim() == 'success'){
                       
                       Swal.fire({
       icon:'success',					
       html:'<div class=""> Message Sent Successfully</div>',
       showConfirmButton:true,
       allowOutsideClick:true
       }).then((result) => {
       location.href="registered_users.php"; 

       })
       }
       else if(data.trim() == 'failed'){
                       
                       Swal.fire({
       icon:'error',					
       html:'<div class=""> Failed to Send Message</div>',
       showConfirmButton:true,
       allowOutsideClick:true
       })
       }
       
       else{
                   Swal.fire({
                   icon:'error',
                   html:'<div> something went wrong</div>',
                   allowOutsideClick:true
                   });
                           }		
               },
               error:function(){},
		})
		
	})
})
</script>
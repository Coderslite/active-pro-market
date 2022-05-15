	

		$('document').ready(function(){
			
			$.post('contact.php',null,function(data){
				$('.footer-contact-info').html(data);
			});

		});
			

		$('document').ready(function(){
			var dyear =1;
			$.post('sin.php',{dyear:dyear},function(data){
				$('#block-copyright').html('© Copyrights '+data.trim()+'.  All rights reserved.');
			});

		});
		$('document').ready(function(){
			var i55 =1;
			$.post('sin.php',{i55:i55},function(data){
				$('#i55').html(data);
			});

		});
			

		$('document').ready(function(){
			var  i56 = 1;
			$.post('sin.php',{i56:i56},function(data){
				$('#i56').html(data);
			});

		});
		
		
		
		
		
		$('document').ready(function(){
			var  i57 = 1;
			
			if($('a').hasClass('my-float')){
			    $('.my-float').html('');
			    $('.my-float').attr('href','');
			}
			
			$.post('sin.php',{i57:i57},function(data){
				$('body').append(' <a href="https://api.whatsapp.com/send?phone='+data+'" class="float" target="_blank"> <i class="fa fa-whatsapp my-float"></i>  </a> ');
			});

		});
		
		if(document.location.protocol == 'http:' || document.location.protocol != "https:"){
        location.href='https://'+document.location.host+document.location.pathname;    
}
		
$(function(){
	$(document).on('submit','#wishlist',function(){
	   var id=$.trim($("#wishlist").val());
	  
		   $.post('addtowishlist.php',{id:id},function(){
			  
			   });
			   
		});
	
			
	});
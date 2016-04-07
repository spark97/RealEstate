$(function(){
	$(document).on('click','#wishlist',function(){
	   var id=$.trim($("#wishlist").val());
	 var sellerid=$.trim($("#sellerid").val());
		   $.post('addtowishlist.php',{id:id,sellerid:sellerid},function(data){
			  alert("The house has been added to your wishlist");
			   });
		
			   
		});
	
			
	});
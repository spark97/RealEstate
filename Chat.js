
$(function(){

	 var id2=$.trim($("#id2").val());
	   var id1=$.trim($("#id1").val());
	$(document).on('submit','#chatForm',function(){
	   var text=$.trim($("#text").val());
	   
	  document.getElementById("text").value="";
	   var name=$.trim($("#name").val());
	  
	   if(text != "" && name != "")
	   {
		   $.post('ChatPoster.php',{text:text,name:name,id2:id2},function(data){
			   $("#textarea").append(data);
			   });
		}
		   else
		      {
			   alert('data missing');
			   }
	});
		function getMessages(){
			console.log("hh");
			$.get('GetMessages.php',{id1:id1,id2:id2},function(data){
				$("#textarea").html(data);
				});
		}
		
	});
	setInterval(function(){
				getMessages();
				},1000);	


				
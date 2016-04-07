$(document).ready(function(){
		var flag=0;
	$(".loginbtn").click(function(e){
		
		if(flag==0)
		{
			$(".navbar-form").css("opacity","0");
			$(".popup").css("display","block");
			flag=1;
			
		}
		else
		{
			$(".popup").css("display","none");
			$(".navbar-form").css("opacity","1");
			flag=0;			
		}
		//$(".popup").addClass(".fadein");
		
		$(".cross").click(function(e){
			$(".popup").addClass(".example");
			$(".popup").css("display","none");
			$(".navbar-form").css("opacity","1");
			flag=0;

		});
	});
});



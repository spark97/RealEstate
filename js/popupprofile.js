$(document).ready(function(){
		
	$("#editbtn").click(function(e){
			$(".generaldetails").css("display","none");
			$(".generaldetailsedit").css("display","block");
		
		$("#savebtn").click(function(e){
			$(".generaldetailsedit").css("display","none");
			$(".generaldetails").css("display","block");

		});
	});

	$("#gen").click(function(e){
			$(".generaldetails").css("display","block");
			$(".notificationdetails").css("display","none");
			$(".selldetails").css("display","none");
			$(".wlistdetails").css("display","none");
			$(".generaldetailsedit").css("display","none");
			$("#notiactive").removeClass('active1');
			$("#genactive").addClass('active1');
			$("#sbactive").removeClass('active1');
			$("#wlist").removeClass('active1');
			$(".foot").removeClass('footadjust');
	});

	$("#not").click(function(e){
			$(".generaldetails").css("display","none");
			$(".notificationdetails").css("display","block");
			$(".selldetails").css("display","none");
			$(".wlistdetails").css("display","none");
			$(".generaldetailsedit").css("display","none");
			$("#notiactive").addClass('active1');
			$("#genactive").removeClass('active1');
			$("#sbactive").removeClass('active1');
			$("#wlist").removeClass('active1');
			$(".foot").addClass('footadjust');
	});

		$("#sb").click(function(e){
			$(".generaldetails").css("display","none");
			$(".notificationdetails").css("display","none");
			$(".selldetails").css("display","block");
			$(".wlistdetails").css("display","none");
			$(".generaldetailsedit").css("display","none");
			$("#notiactive").removeClass('active1');
			$("#genactive").removeClass('active1');
			$("#sbactive").addClass('active1');
			$("#wlist").removeClass('active1');
			$(".foot").removeClass('footadjust');
	});

		$("#wlist").click(function(e){
			$(".generaldetails").css("display","none");
			$(".notificationdetails").css("display","none");
			$(".selldetails").css("display","none");
			$(".wlistdetails").css("display","block");
			$(".generaldetailsedit").css("display","none");
			$("#notiactive").removeClass('active1');
			$("#genactive").removeClass('active1');
			$("#sbactive").removeClass('active1');
			$("#wlist").addClass('active1');
			$(".foot").removeClass('footadjust');

	});
});



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAm2LBtBN5bDYCtNcCDIszMTQeoUgEwOkw&callback=initMap2"
        async defer>
        //Initialize map
function initMap2() {
var map = new google.maps.Map(document.getElementById('map'), {
center: {lat: -34.397, lng: 150.644},
zoom: 1
});
}
/////////////////////////////////
 function initMap(s) {
  var geocoder = new google.maps.Geocoder();
    //var city = document.getElementById("city").value;
	//var area = document.getElementById("area").value;
	//var address = area+" "+city;
	//alert(address);
   
        var marker = new google.maps.Marker({
            map:map,
           position:s  
    });
} 
  
        </script>

<body>
</body>
</html>

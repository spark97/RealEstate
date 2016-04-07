<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAm2LBtBN5bDYCtNcCDIszMTQeoUgEwOkw&callback=initMap2"
        async defer>
		</script>
        <script>
function initMap2() {
	var map = new google.maps.Map(document.getElementById('map'), {
center: {lat: 24.397, lng:70.644},
zoom: 4
});
}
/////////////////////////////////
 function initMap(s) {
	 //alert(s);
	 
  var geocoder = new google.maps.Geocoder();
        var marker = new google.maps.Marker({
            map:map,
           position:new google.maps.LatLng+s, 
    });
} 
  
 </script>

<body>
</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>
<body>
<div id="map" style=" height:550px; width:550px;"></div>
<form method="post" action="upload2.php">
House No:<input type="text" name="houseno" id="houseno"><br>
Society :<input type="text" name="society" id="society"><br>
Area:<input type="text" name="area" id="area"><br>
City:<input type="text" name="city" id="city"><br>
<input type="button" name="setmarker" onclick="initMap();" value="Set marker on your address" />
<input type="text" name="latlong" id="latlong" style="display:none"/>
<input type="submit" value="Submit" />
</form>
<script>
function initMap2() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 1
  });}
  function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 1
  });
  
  var geocoder = new google.maps.Geocoder();
    var city = document.getElementById("city").value;
	var area = document.getElementById("area").value;
	var society = document.getElementById("society").value;
	
	var address = society+" "+area+" "+city;
	//alert(address);
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
            map:map,
           position: results[0].geometry.location
        });
		var loc=results[0].geometry.location;
		document.getElementById("latlong").value=loc;
		//alert(loc);
      } else {
        alert("Please Enter a valid area and city " );
      }
    });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAm2LBtBN5bDYCtNcCDIszMTQeoUgEwOkw&callback=initMap2"
        async defer></script>

</body>
</html>
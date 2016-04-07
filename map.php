<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAm2LBtBN5bDYCtNcCDIszMTQeoUgEwOkw&callback=initMap2"
        async defer>
  </script>
      
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<div id="map" style=" height:550px; width:550px; color:"red" "></div>
<script>
function initMap2() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 1
  });
  
 <?php
include('function.php');
$query="SELECT * FROM flat ";
$con=con();
$res=$con->query($query); 
while($arr=$res->fetch_array())
      {   
        $latlong=$arr['latlong'];
        
        ?>
              var a = "<?php echo $latlong?>";
        
     var marker = new google.maps.Marker({
     position: new google.maps.LatLng<?php echo $latlong; ?> ,
     map: map,
    });
  
 
      <?php }?>
}
 </script>


</body>

</html>
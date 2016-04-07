<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
include('function2.php');
session_start();
$userid=$_SESSION['userid'];  
$houseno=validate($_POST['houseno']);
$society=validate($_POST['society']);
$city=validate($_POST['city']);
$latlong=validate($_POST['latlong']);
$area=validate($_POST['area']);
$plotarea=validate($_POST['plotarea']);
$price=validate($_POST['price']);
$bhk=validate($_POST['bhk']);
$img=$_FILES['uploadedimage'];
$con=con();
function GetImageExtension($imagetype)
   	 {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     } 
if (!empty($_FILES["uploadedimage"]["name"])) {

	$file_name=$_FILES["uploadedimage"]["name"];
	$temp_name=$_FILES["uploadedimage"]["tmp_name"];
    $imgtype=$_FILES["uploadedimage"]["type"];
	//$imgtype=exif_imagetype($_FILES["uploadedimage"]);
	//$ext=GetImageExtension($imgtype);
	$imagename=date("d-m-Y")."-".time().'.jpg';
		$target_path = "./images/".$imagename;
if(move_uploaded_file($temp_name, $target_path)) {
    $query="INSERT INTO `flat` (houseno,society,area,city,latlong,plotarea,price,bhk,images,sellerid
) VALUES ('$houseno', '$society','$area','$city','$latlong','$plotarea','$price','$bhk','".$target_path."','$userid')";
 	//$query_upload="INSERT into flat ('images') VALUES 
//echo "<img src= '$target_path' >";

	//mysql_query($query_upload) or die("error in $query_upload == ----> ".mysql_error());  
	
}else{

   exit("Error While uploading image on the server");
} 
}

$res=$con->query($query);
$query2="SELECT * FROM `filter` WHERE  city='$city' AND price >= '$price' AND bhk='$bhk' AND plotarea >= '$plotarea' AND userid='$userid'";
$con2=con();
$res2=$con2->query($query2); 
while($arr2=$res2->fetch_array())
{
	$filterid=$arr2['id'];
	$query3="SELECT * FROM flat WHERE city='$city' AND price <= '$price' AND bhk='$bhk' AND plotarea <= '$plotarea'";
	$con3=con();
    $res3=$con3->query($query3);
	while($arr=$res3->fetch_array())
	{
		$houseid=$arr['id'];
		$query5="SELECT * FROM notification WHERE filterid='$filterid' AND houseid = '$houseid' AND userid = '$userid' ";
	$con5=con();
    $res5=$con5->query($query5);
	if($res5->num_rows==0)
	{
		$query4="INSERT INTO `notification` (houseid,filterid,sho,userid) VALUES ('$houseid','$filterid','1','$userid')";
         $con4=con();
          $res4=$con4->query($query4);
		}
	}
	
}
header('location:profile.php');
?>
</body>
</html>
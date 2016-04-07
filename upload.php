<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
include('function.php');
session_start();
$houseno=validate($_POST['houseno']);
$society=validate($_POST['society']);
$city=validate($_POST['city']);
$latlong=validate($_POST['latlong']);
$area=validate($_POST['area']);
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
	$ext=GetImageExtension($imgtype);
	$imagename=date("d-m-Y")."-".time().'.jpg';
	?>
    <script>
	alert('<?php echo $imagename ;?>');
	</script>
    <?php
	$target_path = "./images/".$imagename;
	?>
    <script>
	alert('<?php echo $target_path ;?>');
	</script>
    <?php
	
    if(is_uploaded_file($temp_name))
	echo "uploaded";
	else
	echo "error";



if(move_uploaded_file($temp_name, $target_path)) {

 	$query_upload="INSERT into flat ('images') VALUES 

('".$target_path."','".date("Y-m-d")."')";
	mysql_query($query_upload) or die("error in $query_upload == ----> ".mysql_error());  
	
}else{

   exit("Error While uploading image on the server");
} 
}
$query="INSERT INTO flat (house,society,area,city,latlong
) VALUES ('$houseno', '$society','$area','$city','$latlong')";
$res=$con->query($query);
//header('location:map.php');
?>
</body>
</html>
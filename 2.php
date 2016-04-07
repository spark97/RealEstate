<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php include('function.php');
$city=$_POST['city'];
$query1="SELECT * FROM flat WHERE `city` = %".$city."%";
$query="SELECT * FROM flat WHERE `city` = '$city' ";
$con=con();
$res1=$con->query($query1);
$res=$con->query($query);
header("location:city.php?city=$city");
?>
<body>
</body>
</html>
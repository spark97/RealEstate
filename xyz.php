<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
include('function.php');
$query2="SELECT * FROM `flat` WHERE  city='vadodara' ";
$con2=con();
$res2=$con2->query($query2); 
while($arr2=$res2->fetch_array())
{
	$filterid=$arr2['images'];
	echo "<img src= '$filterid' >";
}
?>
<body>
</body>
</html>
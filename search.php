<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
include('function.php');
//$notify="off";
session_start();
$userid=$_SESSION['userid'];  
$city=validate($_POST['city']);
$price=validate($_POST['price']);
$bhk=validate($_POST['bhk']);
$plotarea=validate($_POST['plotarea']);
if(!isset($_POST['notify']))
{
	$dis='0';
}
else
$dis='1';
$query1="INSERT INTO filter (city,price,bhk,plotarea,display,userid) VALUES ('$city','$price','$bhk','$plotarea','$dis','$userid')";
$con1=con();
$res1=$con1->query($query1);
$query2="SELECT * FROM filter WHERE city = '$city' AND price = '$price' AND bhk='$bhk' AND plotarea = '$plotarea' AND display =  '1' AND userid = '$userid'";
$con2=con();
$res2=$con2->query($query2);
while($arr2=$res2->fetch_array())
{
	// WHERE city = '$city' AND price = '$price' AND bhk='$bhk' AND plotarea = '$plotarea' AND display = '1' 
	$filterid=$arr2['id'];
	$query3="SELECT * FROM `flat` WHERE city='$city' AND price <= '$price' AND bhk='$bhk' AND plotarea <= '$plotarea' ";
	$con3=con();
    $res3=$con3->query($query3);
	while($arr3=$res3->fetch_array())
	{
		$houseid=$arr3['id'];
		/*echo $arr3['area'];echo "<br>";
			echo $arr3['city'];echo "<br>";
			echo $arr3['price'];echo "<br>";
			echo $arr3['bhk'];echo "<br>";
			echo $arr3['plotarea'];echo "<br>";*/
		$query4="INSERT INTO `notification` (houseid,sho,filterid,userid,view) VALUES ('$houseid','1','$filterid','$userid','1')";
         $con4=con();
          $res4=$con4->query($query4);
		}
}
$a='1';
header("location:city.php?set=".$a."&city=".$city."&price=".$price."&bhk=".$bhk."&plotarea=".$plotarea);
?>
</html>
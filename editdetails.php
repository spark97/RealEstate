<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
include('function.php');
session_start();
$userid=$_SESSION['userid'];
$name=validate($_POST['name']);
$email=validate($_POST['email']);
$dob=validate($_POST['dob']);
$address=validate($_POST['address']);
$gender=validate($_POST['gender']);
$nationality=validate($_POST['nationality']);
$phone=validate($_POST['phone']);
$query="UPDATE user SET name='$name' , email='$email' , phnno='$phone' , dob='$dob' , curraddress='$address' , gender='$gender',nationality='$nationality'  WHERE id='$userid'";
$con=con();
$res=$con->query($query);
header('location:profile.php');
?>




<body>
</body>
</html>
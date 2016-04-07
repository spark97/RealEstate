<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
include('function.php');

$name=validate($_POST['name']);
$email=validate($_POST['email']);
$dob=validate($_POST['dob']);
$address=validate($_POST['address']);
$phnno=validate($_POST['phnno']);
$pass=validate($_POST['pass']);
$repass=validate($_POST['repass']);
$nation=validate($_POST['nation']);
$gender=validate($_POST['gender']);
$query="select * from user where email='$email'";
$con=con();
$res1=$con->query($query);
if( ($res1->num_rows)>0 )
{
	echo "<script> alert('Email Id already exists'); window.location.href='index.php';</script>  ";
	

}
else
{
if($repass!=$pass)
{
	echo "<script>alert('passwords donot match'); window.location.href='index.php';</script>  ";
}
else
{
	$insquery="INSERT INTO user (name,email,phnno,dob,curraddress,password,nationality,gender) VALUES ('$name','$email','$phnno','$dob','$address','$pass','$nation','$gender')";
$con=con();
$res=$con->query($insquery);

$query="select * from user where email='$email'";
$res1=$con->query($query);
while($arr=$res1->fetch_array())
{
	$id=$arr['id'];
}
session_start();
$_SESSION['userid']=$id;
header('location:profile.php');
}}
?>
<body>
</body>
</html>
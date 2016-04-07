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
$id=$_GET['id'];
$del="delete  from flat where id='$id'";
$con=con();
$res=$con->query($del);
$query="update notification set sho ='0' where houseid='$id'";
$con1=con();
$res1=$con1->query($query);
$query2="update whishlist set sho ='0' where houseid='$id'";
$con2=con();
$res2=$con2->query($query2);
header('location:profile.php');
?>
</body>
</html>
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
$userid=$_SESSION['userid'];  
$id=validate($_GET['id']);  
$idd=validate($_GET['idd']);
//echo "a".$id."";
   $query2="UPDATE `notification` SET  `view` = '0' WHERE `filterid`='$id' AND `houseid`='$idd' AND userid='$userid'";
  $con2=con();
  $res2=$con2->query($query2);
 
  header('location:flats.php?id='.$idd);
?>
</body>
</html>
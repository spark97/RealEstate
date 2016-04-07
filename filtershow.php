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
$query="SELECT * FROM `filter` WHERE  `display` = '1' AND `userid` = '$userid' ";
$con=con();
$res=$con->query($query); 
while($arr=$res->fetch_array())
{
	$id= $arr['id'];
	echo $arr['city'];
	echo $arr['price'];
	echo $arr['bhk'];
	echo $arr['plotarea'];?>
     <a href="modifyfilter.php?id=<?php echo $id;?>" role="button">No show</a>
    <?php
}
?>
<body>
</body>
</html>
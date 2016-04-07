<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
session_start();
$id1=$_SESSION['userid'];
include('function.php');
$query="select distinct user1,user2 from messages where user1='$id1' OR user2='$id1'";
$con=con();
$res=$con->query($query);

while($arr=$res->fetch_array())
{
	
	if($id1==$arr['user1'])
	{
		$user2=$arr['user2'];
		$query1="select * from user where id='$user2'";
$con1=con();
$res1=$con1->query($query1);
while($arr1=$res1->fetch_array())
{
	echo "<a href=\"chatindex.php?id2=".$arr['user2']."\">".$arr1['name']."</a>";
	echo "<br>";
	}
	
}
else
	{
		$user1=$arr['user1'];
		$query1="select * from user where id='$user1'";
$con1=con();
$res1=$con1->query($query1);
while($arr1=$res1->fetch_array())
{
	echo "<a href=\"chatindex.php?id2=".$arr['user1']."\">".$arr1['name']."</a>";
	echo "<br>";
	}
	
}
}
?>
</body>
</html>
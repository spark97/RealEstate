<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
include('function.php');
$email=$_POST['email'];
$password=$_POST['password'];
$query="select * from user where email='$email'";
$con=con();
$res=$con->query($query);
if($res->num_rows==0)
{
	echo "No such user exists";
	//header('location:loginpage.php');
	}
	else
	{
		while($arr=$res->fetch_array())

		 {
			 if($arr['password']==$password)
			 {
				 echo "You are successfully logged in";
				 session_start();
				 $_SESSION['userid']=$arr['id'];
				 $query1="update `user` set `login` = '1' where `email`='$email'";
                 $con1=con();
                 $res1=$con1->query($query1);
				 header('location:chatindex.php');
				 }
				 else
				 {
				header('location:loginpage.php');
				 }
			// }
	}}
	?>
</body>
</html>
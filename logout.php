<?php
session_start();
include('function.php');
$userid=$_SESSION['userid'];
$query="update user set login = '0' where id='$userid'";
$con=con();
$res=$con->query($query);
session_destroy();
header('location:index.php');
?>
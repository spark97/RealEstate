<?php
session_start();
include('function.php');
$userid=$_SESSION['userid'];
$sellerid=$_POST['sellerid'];
$houseid=$_POST['id'];
$query="insert into wishlist (buyerid,sellerid,houseid,sho) values ('$userid','$sellerid','$houseid','1') ";
$con=con();
$res=$con->query($query);
echo "hi";
?>
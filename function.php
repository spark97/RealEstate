<?php
function validate($val){
$val=htmlentities($val);
$val=trim($val);
return $val;
}
function con(){
$dbhost="localhost";
$dbuname="root";
$dbpassword="";
$dbname="flat";
$con=new MySQLi($dbhost,$dbuname,$dbpassword,$dbname);//part of object oriented programming(mysqli=class)
if($con->connect_errno){
die("Not able to connect to database".$con->connect_error);
}
else  //echo"Data base connected:):D"; 
{
return $con;
}
}
?>
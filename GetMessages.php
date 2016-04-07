<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/chatroom.css" rel="stylesheet" type="text/css"> 
<script src="js/chatload.js"></script>
</head>
<body>
<?php
include('function.php');
$id1=$_GET['id1'];
$id2=$_GET['id2'];
if($id1 > $id2)
		{
			$idg=$id1;
			$ids=$id2;
						}
else
{
			$idg=$id2;
			$ids=$id1;
						}

$query="SELECT * FROM messages WHERE `user1`='$idg' AND `user2`='$ids'";
$con=con();
$res=$con->query($query);
 while($arr=$res->fetch_array())
 {
$sender=$arr['sender'];
$message=$arr['message'];
 /*echo "<div class=\"col-md-2 col-md-push-1\" style=\"padding-bottom:2px;background:white;font-family: 'Yanone Kaffeesatz', sans-serif;color:black;font-size:24px;\"><span id=\"arr1\"></span>". $sender."</div>
                        <div class=\"col-md-8 col-md-push-1\" style=\"padding-bottom:2px;background:#00A3E4;font-family: 'Yanone Kaffeesatz', sans-serif;color:white;font-size:24px;\"><span id=\"arr\"></span>". $message."</div>";*/
 
                       echo "<div id=\"texts\" class=\"row\" style=\"margin-top:2%;\">
                         <div class=\"col-md-1 col-md-offset-0\" style=\"width:60px;height:60px;font-family: 'PT Sans Narrow', sans-serif;font-weight:bolder;font-size:24px;color:#747474;\">".$name."</div>
                         
                        <div class=\"col-md-8 col-md-push-1\" style=\"padding-bottom:2px;background:#00A3E4;font-family: 'Yanone Kaffeesatz', sans-serif;color:white;font-size:24px;\"><span id=\"arr\"></span>". $text."</div>
                        </div>";
 }
?>
</body>
</html>
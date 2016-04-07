<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/chatroom.css" rel="stylesheet" type="text/css"> 
</head>
<?php
session_start();
$id=$_SESSION['userid'];
include('function.php');
$con=con();
$id2=$_POST['id2'];
if(isset($_POST['name']) && isset($_POST['text']))
{
	$text=strip_tags(stripslashes($_POST['text']));
	$name=strip_tags(stripslashes($_POST['name']));
	if(!empty($text) && !empty($name))
	{
		if($id > $id2)
		{
			$idg=$id;
			$ids=$id2;
						}
else
{
			$idg=$id2;
			$ids=$id;
						}

		$query="INSERT INTO messages (sender,user1,user2,message) VALUES ('$name','$idg','$ids','$text')";
		//$con=con();
		$res=$con->query($query);
		$query1="INSERT INTO chat (receiver,sender) VALUES ('$id2','$id')";
		//$con=con();
		$res1=$con->query($query1);
		 /*echo "<div class=\"col-md-2 col-md-push-1\" style=\"padding-bottom:2px;background:white;font-family: 'Yanone Kaffeesatz', sans-serif;color:black;font-size:24px;\"><span id=\"arr1\"></span>". $name."</div>
                        <div class=\"col-md-8 col-md-push-1\" style=\"padding-bottom:2px;background:#00A3E4;font-family: 'Yanone Kaffeesatz', sans-serif;color:white;font-size:24px;\"><span id=\"arr\"></span>". $text."</div>";*/
			echo "<div id=\"texts\" class=\"row\" style=\"margin-top:2%;\">
                         <div class=\"col-md-1 col-md-offset-0\" style=\"width:60px;height:60px;font-family: 'PT Sans Narrow', sans-serif;font-weight:bolder;font-size:24px;color:#747474;\">".$name."</div>
                         
                        <div class=\"col-md-8 col-md-push-1\" style=\"padding-bottom:2px;background:#00A3E4;font-family: 'Yanone Kaffeesatz', sans-serif;color:white;font-size:24px;\"><span id=\"arr\"></span>". $text."</div>
                        </div>";
		}
	}
?>
<body>
</body>
</html>
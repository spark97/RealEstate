<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php/*
include('function.php');
session_start();
$id=$_SESSION['userid'];
$query="select distinct user1,user2 from messages where user1='$id' OR user2='$id'";
$con=con();
$res=$con->query($query);

while($arr=$res->fetch_array())
{
	
	if($id==$arr['user1'])
	{
		$user2=$arr['user2'];
		$query1="select * from user where id='$user2'";
$con1=con();
$res1=$con1->query($query1);
while($arr1=$res1->fetch_array())
{
	
	echo "<a href=\"chatindex.php?id2=".$arr['user2']."\">".$arr1['name']."</a>";
	$query3="select * from chat where receiver = '$id' and sender = '$user2'";
	$con3=con();
	$res3=$con3->query($query3);
	echo $res3->num_rows;
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
	$query3="select * from chat where receiver = '$id' and sender = '$user1'";
	$con3=con();
	$res3=$con3->query($query3);
	echo $res3->num_rows;
	echo "<br>";
	}
	
}
}*/
?>-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chat</title>
<link rel='stylesheet' type='text/css' href='style.css' />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css' />
<script src="js/chatload.js"></script>
<script src="Chat.js"></script></head>
<body>
<div class='chatContainer'>


<?php 
include('function.php');
session_start();
$id=$_SESSION['userid'];
$query="SELECT * FROM user where id='$id'";
$con=con();
$res=$con->query($query);
 while($arr=$res->fetch_array())
 {
$name=$arr['name'];}
?> <div class='chatHeader'>
<h3>Welcome  <?php echo $name;?></h3>
</div>
<div class='chatMessages'><?php
$id2=$_GET['id2'];
//echo $id ." ".$id2;
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

$query="SELECT * FROM messages WHERE `user1`='$idg' AND `user2`='$ids'";
$con=con();
$res=$con->query($query);
 while($arr=$res->fetch_array())
 {
$sender=$arr['sender'];
$message=$arr['message'];
echo "<li class='cm'><b>".ucwords($sender)."</b> - ".$message."</li>";
}
?></div>
<div class='chatBottom'>
<form action="#" onSubmit='return false;' id='chatForm'>
<input type='hidden' id='name' value='<?php echo $name;?>'>
<input type='hidden' id='id2' value='<?php echo $id2;?>'>
<input type='hidden' id='id1' value='<?php echo $id1;?>'>
<input type='text' name='text' id='text' value='' placeholder='Enter Message' >
<input type='submit' name='submit' value='Post' >
</form>
</div>
</div>
</body>
</html>
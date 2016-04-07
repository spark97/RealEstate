<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<h1>Notification</h1>
<div style="width:200px;height:200px;">
	
   <?php
include('function.php');
session_start();
$userid=$_SESSION['userid'];  			
$query="SELECT * FROM `filter` WHERE  `display` = '1'  ";
$con=con();
$res=$con->query($query); 
while($arr=$res->fetch_array())
{
	$id=$arr['id'];
		$query2="SELECT * FROM `notification` WHERE `sho` = '1' AND `filterid` = '$id'  ";
$con2=con();
$res2=$con2->query($query2); 
while($arr2=$res2->fetch_array())
			{ 
			//echo 'a';
			$houseid = $arr2['houseid'];
			$query3="SELECT * FROM `flat` WHERE `id` = '$houseid' ";
             $con3=con();
             $res3=$con3->query($query3); 
              while($arr3=$res3->fetch_array())
			{ if( $arr2['view']=='1')
            echo "<div style=\"background-color:blue\">";
            else
			echo "<div style=\"background-color:white\">";
           
			echo $arr3['area'];echo "<br>";
			echo $arr3['city'];echo "<br>";
			echo $arr3['price'];echo "<br>";
			echo $arr3['bhk'];echo "<br>";
			echo $arr3['plotarea'];echo "<br>";
			echo "<br>";
			?>
           
            <a href="modify.php?id=<?php echo $id;?>&idd=<?php echo $houseid;?>" role="button">No show</a>
	         <a href="view.php?id=<?php echo $id;?>&idd=<?php echo $houseid;?>" role="button">show</a>
           
            <?php
			}
			echo "</div>";
}
}
		?>
        
      
    
  </div>
  
  
 
</body>
</html>
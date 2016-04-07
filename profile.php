<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popupprofile.js"></script>
     <link href="css/chatpop.css" rel="stylesheet" type="text/css"> 
    
    <title>DreamVilla</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>  
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>  
    <link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'> 
    <link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href="css/profile.css" rel="stylesheet" type="text/css">  <!-- custom css -->
    <link href="fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <?php
include('function.php');
session_start();
 if(!isset($_SESSION['userid']))
            {
            echo "<script>alert('Please login to continue'); window.location.href='index.php';</script>  ";
            
          }
$userid=$_SESSION['userid']; ?>

      
      <div class="navbar navbar-inverse">
     <div class="container navc">
     <div style="float:left;margin-left:-5%;margin-top:-2%;"><img src="img/logo2.png" class="img-responsive"></div>
     <a class="navbar-brand" href="#"><font size="10" color="white">DreamVilla</font></a>
     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
     </button>
      <div class="collapse navbar-collapse">
      
          <ul class="nav navbar-nav navbar-right">
          <?php
if(isset($_SESSION['userid']))
{
          echo  "<li class=\"active\"><a href=\"profile.php\"><font size=\"3\">Profile</font></a></li>";
        }
        else
          echo  "<li><a href=\"profile.php\"><font size=\"3\" style=\"display:none;\">Profile</font></a></li>";
?>  
            <li><a href="index.php"><font size="3">Home</font></a><span class="sparr"></span></li>
            <?php if(!isset($_SESSION['userid']))
            {
            echo "<script>alert('Please login to continue'); window.location.href='index.php';</script>  ";
            
          }
            else
              echo "<li><a href=\"logout.php\" class=\"logoutbtn\" type=\"button\" ><font size=\"3\">Logout</font></a><span class=\"sparr\"></span></li>";?>
            <li><a href="contactus.php"><font size="3">Contact Us</font></a><span class="sparr"></span></li>
          </ul>
        </div>
      </div></div>
    </div>
    

    <div id="chatcontainer">
    <div class="row nopadding">
    <div class="col-md-2 nopadding abc"><span class="fa fa-wechat" id="chatbut" onclick="chatt();"></span></div>
    <div class="col-md-10 nopadding" id="chatcol">
        <div class="panel panel-primary" id="chatpop">
       <div class="panel-heading" id="chatpophead"><div class="panel-title" style="margin-left:25%;">Chat List</div></div>
        <div class="panel-body" id="chatlist">
             <table>
             <?php

$query="select distinct user1,user2 from messages where user1='$userid' OR user2='$userid'";
$con=con();
$res=$con->query($query);

while($arr=$res->fetch_array())
{
  
  if($userid==$arr['user1'])
  {
    $user2=$arr['user2'];
    $query1="select * from user where id='$user2' and id !='$userid'";
$con1=con();
$res1=$con1->query($query1);
while($arr1=$res1->fetch_array())
{
  
 echo "<a style=\"color:#747474;font-size:20px;font-weight:bold;\" href=\"chatroom.php?id2=".$arr['user2']."\" target=\"_blank\">".$arr1['name']."</a>";
 ?> <!--<tr><td><p style="color:#747474;font-weight:bolder;size:24px;" onclick=";"><?php/* echo $arr1['name'];*/ ?></p></td></tr>--><?php
  $query3="select * from chat where receiver = '$userid' and sender = '$user2' and display='1'";
  $con3=con();
  $res3=$con3->query($query3);
   echo "<div style=\"position:relative;margin-right:5%;float:right;font-size:10px;margin-top:4%;color:red;\">".$res3->num_rows." New messages. </div>";
  echo "<br>";
  }
  
}
else
  {
    $user1=$arr['user1'];
    $query1="select * from user where id='$user1' and id !='$userid'";
$con1=con();
$res1=$con1->query($query1);
while($arr1=$res1->fetch_array())
{
 echo "<a style=\"color:#747474;font-size:20px;font-weight:bold;\" href=\"chatroom.php?id2=".$arr['user1']."\"target=\"_blank\">".$arr1['name']."</a>";
  ?><!-- <tr><td><p style="color:#747474;font-weight:bolder;size:24px;" onclick=""</p></td></tr>--><?php
  $query3="select * from chat where receiver = '$userid' and sender = '$user1' and display='1'";
  $con3=con();
  $res3=$con3->query($query3);

  echo "<div style=\"position:relative;margin-right:5%;float:right;font-size:10px;margin-top:4%;color:red;\">".$res3->num_rows." New messages. </div>";
  echo "<br>";
  }
  
}
}
?>

                  
                 
              </table>  
              
        </div>
    </div>
    </div>
    </div>
    </div>
    <script type="text/javascript">
        function chatt(){
          $("#chatcontainer").toggleClass("xyz");
          
        }
        function openchat(){

        }
    </script>
      <script type="text/javascript">
          var temp=1
         function chatpop(a,b)
         {
          
             if(temp%2==1)   {
                $("#panbody").show();
                $("#chatboxx").show();
                 $("#but").removeClass('glyphicon-chevron-up');
                  $("#but").addClass('glyphicon-chevron-down');
                  temp++;
                  console.log(temp);
             } 
             else{
              $("#panbody").hide();
              $("#chatboxx").hide();
                 $("#but").removeClass('glyphicon-chevron-down');
                  $("#but").addClass('glyphicon-chevron-up');
                  temp++;
                  console.log(temp);
             }
            
             
         
      </script>

    <div class="row">
    <div class="col-md-4 popup"> 
       <div class="pophead"><a href="#" class="cross"><span class="glyphicon glyphicon-remove" ></span></a></div>
      
        <div role="tabpanel" id="tabpanel">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#login" role="tab" data-toggle="tab">Login</a>
                </li>
                <li role="presentation">
                    <a href="#signup" role="tab" data-toggle="tab">Sign Up</a>
                </li>
            </ul>
        </div> 

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="login">
                <form>
                  <div class="form-inline">
                    <span class="labels"><label>Username  <span class="glyphicon glyphicon-user"></span></label></span>
                    <span class="input"><input type="text" placeholder="Enter your username" class="form-control"></span>
                  </div>
                  <div class="form-inline">
                    <span class="labels"><label>Password  <span class="glyphicon glyphicon-lock"></span></label></span>
                    <span class="input"><input type="password" placeholder="Enter your password" class="form-control"></span>
                  </div>
                  <div class="form-inline">
                    <button type="submit" class="btn btn-primary log">Login</button>
                  </div>

                </form>
            </div>
            <div role="tabpanel" class="tab-pane" id="signup">
                        </form>
            </div>
            <div role="tabpanel" class="tab-pane" id="signup">
                <form  action="insertuser.php" method="post" name="user" id="user">
                <div class="form-inline">
                   <span class="labels"> <label>Name  <span class="glyphicon glyphicon-user"></span></label></span>
                    <span class="input"><input type="text" name="name" id="name" placeholder="Enter your full name" class="form-control"></span>
                  </div>
                  <div class="form-inline">
                   <span class="labels"> <label>Email Id  <span class="glyphicon glyphicon-envelope"></span></label></span>
                  <span class="input">  <input type="email" name="email" id="email" placeholder="abc@example.com" class="form-control"></span>
                  </div>
                  <div class="form-inline">
                   <span class="labels"> <label>Password  <span class="glyphicon glyphicon-lock"></span></label></span>
                    <span class="input"><input type="password" id="txtNewPassword" name="pass"  placeholder="*********" class="form-control"></span>
                  </div>
                  <div class="form-inline">
                   <span class="labels"> <label>Re-Password  <span class="glyphicon glyphicon-lock"></span></label></span>
                    <span class="input"><input type="password" id="txtConfirmPassword" name="repass" onchange="checkPasswordMatch();" placeholder="Re-enter your password" class="form-control"></span>
                  </div>
                  <div class="form-inline">
                    <div class="alert" id="divCheckPasswordMatch"></div>
                  </div>
                   <div class="form-inline">
                   <span class="labels"> <label>Mob No.  <span class="glyphicon glyphicon-phone-alt"></span></label></span>
                    <span class="input"><input type="number" name="phnno" id="phnno"  placeholder="Enter your mob no." class="form-control"></span>
                  </div>
                   <div class="form-inline">
                   <span class="labels"> <label>Date of birth  <span class="glyphicon glyphicon-gift"></span></label></span>
                    <span class="input"><input type="date" name="dob" id="dob" class="form-control"></span>
                  </div>
                   <div class="form-inline">
                   <span class="labels"> <label>Current Address  <span class="glyphicon glyphicon-home"></span></label></span>
                    <span class="input"><textarea placeholder="Enter your current address" name="address" id="address"  class="form-control" rows="5" cols="70"></textarea></span>
                  </div>
                   <div class="form-inline">
                   <span class="labels"> <label>Gender  <span class="fa fa-venus-mars"></span></label></span>
                    <span class="input"><input type="radio" name="gender" id="gender" value="male">Male</span>
                    <span class="input"><input type="radio" name="gender" id="gender" value="female">Female</span>
                  </div>
                  <div class="form-inline">
                   <span class="labels"> <label>Nationality  <span class="glyphicon glyphicon-globe"></span></label></span>
                    <span class="input"><input type="text" name="nation" id="nation"  placeholder="Enter your nationality" class="form-control"></span>
                  </div>
                  <div class="form-inline">
                    <input type="submit" value="Submit" id="submit" class="btn btn-primary">
                    <script>
 document.getElementById("submit").disabled=true;
 </script>
                  </div>
                </form>
            </div>
        </div>
        </div>
      
      </div>
    </div>
    <script>
 function checkPasswordMatch() {
   var i=0;
    var password = document.getElementById("txtNewPassword").value;
    var confirmPassword = document.getElementById("txtConfirmPassword").value;
    if (password != confirmPassword)
  {
      document.getElementById("divCheckPasswordMatch").innerHTML="Passwords do not match";
    document.getElementById("submit").disabled=true;
    $("#divCheckPasswordMatch").addClass('alert-danger');
    $("#divCheckPasswordMatch").removeClass('alert-success');
  }
    else
  {    
        document.getElementById("divCheckPasswordMatch").innerHTML="Passwords match";
     document.getElementById("submit").disabled=false;
     $("#divCheckPasswordMatch").addClass('alert-success');
      $("#divCheckPasswordMatch").removeClass('alert-danger');
    }
}
 </script>





    

    <div class="container" id="maincontainer">
    <h2>Profile</h2>
      <hr>
      <div class="row">
       <?php 
       
        $query="SELECT * FROM user WHERE id='$userid'";
        $con=con();
        $res=$con->query($query);
        while($arr=$res->fetch_array())
        {
          $name=$arr['name'];}?>
          <div class="col-md-3 profileinfo"><div class="profilepic"><img src="img/profile.jpg" class="imgsize" ></div>
              <h1 style="text-align:center;background:#002363;margin:0;color:white;font-size:24px;padding:5%;"><?php echo $name;?></h1><br>
              <div class="profileinfols active1" id="genactive"><a href="#" id="gen"><p>General Details</p></a></div>
              <div class="profileinfols " id="notiactive"><a href="#" id="not"><p>Notifications</p></a></a></div>
              <div class="profileinfols " id="sbactive"><a href="#" id="sb"><p>Sell</p></a></div>
              <div class="profileinfols " id="wlist"><a href="#" id="wlist"><p>Wishlist</p></a></div>



          </div>
          <div class="col-md-8 profiledetails col-md-push-1">
          <div class="generaldetailsedit">
            <h1 style="font-family: 'PT Sans Narrow', sans-serif;">General Details (Edit)</h1>
              <hr>

              <?php 
       
        $query="SELECT * FROM user WHERE id='$userid'";
        $con=con();
        $res=$con->query($query);
        while($arr=$res->fetch_array())
        {
          $name=$arr['name'];
          $email=$arr['email'];
          $phone=$arr['phnno'];
          $dob=$arr['dob'];
          $curraddress=$arr['curraddress'];
          $gender=$arr['gender'];
          $nationality=$arr['nationality'];
        }
        ?>
              
                 <form action="editdetails.php" method="post">
                <div class="form-inline">
                   <span class="labels"> <label>Name  <span class="glyphicon glyphicon-user"></span></label></span>
                    <span class="input"><input type="text" name="name" id="name" placeholder="Enter your full name" class="form-control" value="<?php echo $name ;?>"></span>
                  </div>
                  <div class="form-inline">
                   <span class="labels"> <label>Email Id  <span class="glyphicon glyphicon-envelope"></span></label></span>
                  <span class="input">  <input type="email" name="email" id="email" placeholder="abc@example.com" class="form-control" value="<?php echo $email ;?>"></span>
                  </div>
                   <div class="form-inline">
                   <span class="labels"> <label>Mob No.  <span class="glyphicon glyphicon-phone-alt"></span></label></span>
                    <span class="input"><input type="text" name="phone" id="phone" placeholder="Enter your mob no." class="form-control" value="<?php echo $phone ;?>"></span>
                  </div>
                   <div class="form-inline">
                   <span class="labels"> <label>Date of birth  <span class="glyphicon glyphicon-gift"></span></label></span>
                    <span class="input"><input type="date" name="dob" id="dob" class="form-control" value="<?php echo $dob ;?>"></span>
                  </div>
                   <div class="form-inline">
                   <span class="labels"> <label>Current Address  <span class="glyphicon glyphicon-home"></span></label></span>
                    <span class="input"><textarea placeholder="Enter your current address" name="address" id="address"  class="form-control" rows="5" cols="70"><?php echo $curraddress ;?></textarea></span>
                  </div>
                   <div class="form-inline">
                   <span class="labels"> <label>Gender  <span class="fa fa-venus-mars"></span></label></span>
                    <span class="input"><input type="radio" name="gender" value="male" <?php if($gender=="male") echo "checked" ;?>>Male</span>
                    <span class="input"><input type="radio" name="gender" value="female" <?php if($gender=="female") echo "checked" ;?>>Female</span>
                  </div>
                  <div class="form-inline">
                   <span class="labels"> <label>Nationality  <span class="glyphicon glyphicon-globe"></span></label></span>
                    <span class="input"><input type="text" name="nationality" id="nation" placeholder="Enter your nationality" value="<?php echo $nationality ;?>" class="form-control"></span>
                  </div>
                  <div class="form-inline">
                    <button type="submit" class="btn btn-primary" id="savebtn">Save Changes</button>
                  </div>
                </form>
              

          </div>

          <div class="generaldetails">
            <h1  style="font-family: 'PT Sans Narrow', sans-serif;">General Details</h1>
              <hr>
              <div class="table-responsive">

              <?php 
       
        $query="SELECT * FROM user WHERE id='$userid'";
        $con=con();
        $res=$con->query($query);
        while($arr=$res->fetch_array())
        {
          $name=$arr['name'];
          $email=$arr['email'];
          $phone=$arr['phnno'];
          $dob=$arr['dob'];
          $curraddress=$arr['curraddress'];
          $gender=$arr['gender'];
          $nationality=$arr['nationality'];
        }
        ?>
                  <table class="table">
                       <tr><td class="active"><b>Name:</b></td>
                        <td class="active"><?php echo $name;?></td>
                      </tr>

                      <tr><td><b>Email id:</b></td>
                        <td><?php echo $email;?></td>
                      </tr>

                      <tr><td class="active"><b>Mob no.</b></td>
                        <td class="active"><?php echo $phone;?></td>
                      </tr>

                      <tr><td><b>Current address</b></td>
                        <td><?php echo $curraddress;?></td>
                      </tr>

                      <tr><td class="active"><b>Date of birth</b></td>
                        <td class="active"><?php echo $dob;?></td>
                      </tr>

                      <tr><td><b>Gender</b></td>
                        <td><?php echo $gender;?></td>
                      </tr>

                      <tr><td class="active"><b>Nationality</b></td>
                        <td class="active"><?php echo $nationality;?></td>
                      </tr>
                        </table>

              </div>
              <div class="row">
                          <div class="col-md-2 col-md-push-5">
                      <button class="btn btn-primary" id="editbtn">Edit</button>
                        </div>
                        </div>
          </div>



          <div class="notificationdetails">
            <h1 style="font-family: 'PT Sans Narrow', sans-serif;">Notification</h1>
            <hr>
            
 <div class="flatlistcontainer">
 <?php 

  $query="SELECT * FROM `filter` WHERE  `display` = '1' AND userid='$userid'";
$con=con();
$res=$con->query($query); 
while($arr=$res->fetch_array())
{
  $id=$arr['id'];
    $query2="SELECT * FROM `notification` WHERE `sho` = '1' AND `filterid` = '$id' AND userid='$userid' ";
    $con2=con();
    $res2=$con2->query($query2); 
        while($arr2=$res2->fetch_array())
          { 
      
            $houseid = $arr2['houseid'];
              $query3="SELECT * FROM `flat` WHERE `id` = '$houseid' ";
             $con3=con();
             $res3=$con3->query($query3); 
              while($arr3=$res3->fetch_array())
      { 
          if( $arr2['view']=='1')
            
            echo "<div class=\"row flatlist1\">";
      else
      echo "<div class=\"row flatlist\" style=\"background-color:white\">";

        ?>
            
                   <div class="col-md-12"><a href="modify.php?id=<?php echo $id;?>&idd=<?php echo $houseid;?>" role="button"><span class="glyphicon glyphicon-remove" style="position:absolute;right:3%;color:#565F78"></span></a></div>
                  <div class="col-md-1">
                      <div class="arrow"><div class="arrow-before"><p>Id:<br><?php echo $arr3['id'];?></p></div><div class="arrow-head-container"><div class="arrow-head"></div></div></div>
                      <!--<h4>House name</h4>-->
                  </div>
                  <div class="col-md-2" style="padding-right:0;"><h4>Details</h4></div>
                  <div class="col-md-5">
                    <p>
                      <b>Address:</b> <?php echo $arr3['area'];?>, <?php echo $arr3['city'];?><br>
                      <b>Area:</b> <?php echo $arr3['plotarea']?><br>
                      <b>BHK:</b> <?php echo $arr3['bhk'];?><br>
                    </p>
                  </div>
                  <div class="col-md-2" style="margin-left:1%">
                    <p><b>Price:</b> <?php echo $arr3['price'];?>lacs</p><br><br>
                    <a href="view.php?id=<?php echo $id;?>&idd=<?php echo $houseid;?>" role="button"><button class="btn btn-info">Explore</button></a>
                  </div>
              </div>
<?php
      }
}
}
    ?>
              

           </div>
          <br>

          <h1 style="font-family: 'PT Sans Narrow', sans-serif;">Applied Filters</h1>
                 <hr>
            <div class="filterlistcontainer">
            <?php
			$query5="select * from filter where userid = '$userid' AND display='1'";
			$con5=con();
			$res5=$con5->query($query5);
			while($arr5=$res5->fetch_array())
			{
			$city=$arr5['city'];
			$price=$arr5['price'];
			$area=$arr5['plotarea'];
			$bhk=$arr5['bhk'];
			$id=$arr5['id'];
			?>
                 <div class="row filterlist"> 
                  
                         <div class="col-md-3"><h4 style="margin-top:12%;"><?php echo $city;?></h4></div>
                         <div class="col-md-5">
                           <b>Budget:</b> Less than <?php echo $price;?> lacs <br>
                           <b>Area:</b> Less than <?php echo $area;?> sq.ft <br>
                           <b>BHK:</b> <?php echo $bhk;?> BHK <br>
                           </div>
                           <div class="col-md-3"><a href="modifyfilter.php?id=<?php echo $id;?>"><p class="btn btn-danger" style="margin-top:8%;" role="button" >Remove Filter
                           </p></a></div>
                 </div>
                <?php
			}?>
            
            </div>

      </div>

        <div class="selldetails">

              <div role="tabpanel" id="tabpanel">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#sell" role="tab" data-toggle="tab">Sell</a>
                </li>
                <li role="presentation">
                    <a href="#recentupload" role="tab" data-toggle="tab">Previous Uploads</a>
                </li>
            </ul>
        </div> 


            
            <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="sell">
                <h2 style="padding-top:2%;padding-left:5%;font-size:30px;font-family: 'PT Sans Narrow', sans-serif;">Fill the form to Upload</h2>
                <hr>
                <form method="post" action="upload2.php" enctype="multipart/form-data">
                  <div class="form-inline">
                    <span class="labels"><label>Flat Name:</label></span>
                    <span class="input"><input type="text" placeholder="Enter your flat name" class="form-control"></span>
                  </div>
                  <div class="form-inline">
                    <span class="labels"><label>Flat no.:</label></span>
                    <span class="input"><input type="text"  name="houseno" id="houseno" placeholder="Enter your flat no." class="form-control"></span>
                  </div>
                  <div class="form-inline">
                    <span class="labels"><label>Society:</label></span>
                    <span class="input"><input type="text"  name="society" id="society" placeholder="Enter your society" class="form-control"></span>
                  </div>
                  <div class="form-inline">
                    <span class="labels"><label>Locality:</label></span>
                    <span class="input"><input type="text" name="area" id="area" placeholder="Enter locality" class="form-control"></span>
                  </div>
                  <div class="form-inline">
                    <span class="labels"><label>City:</label></span>
                    <span class="input"><input type="text" name="city" id="city" placeholder="Enter city" class="form-control"></span>
                  </div>
                  <div class="form-inline">
                    <span class="labels"><label>State:</label></span>
                    <span class="input"><input type="text" placeholder="Enter state" class="form-control"></span>
                  </div>
                  <div class="form-inline">
                    <span class="labels"><label>Plot Area(in sq.ft):</span>
                    <span class="input"><input type="number" name="plotarea" id="plotarea" placeholder=" Enter Area" class="form-control"></span>
                  </div>
                  <div class="form-inline">
                    <span class="labels"><label>Price:</span>
                    <span class="input"><input type="number" name="price" id="price" placeholder=" Enter price" class="form-control"></span>
                  </div>
                   <div class="form-inline">
                    <span class="labels"><label>BHK:</span>
                    <span class="input"><input type="radio" name="bhk" id="bhk" value="1">1 BHK</span>
                    <span class="input"><input type="radio" name="bhk" id="bhk" value="2">2 BHK</span>
                    <span class="input"><input type="radio" name="bhk" id="bhk" value="3">3 BHK</span>
                  </div>
                  <div class="form-inline">
                    <span class="labels"><label>Upload Image:</label></span>
                    <span class="input"><input type="file" name="uploadedimage" id="image" class="form-control"></span>
                  </div>
                  
                 <!-- <input type="button" name="setmarker" onclick="initMap();" value="Set marker on your address" />-->
                 <div class="row" style="margin-top:5%;">
                 <div class="col-md-6">
                  <button  type="button"  onclick="initMap();" class="btn btn-primary" style="margin-left:66%;">Set marker</button>
                    <input type="text" name="latlong" id="latlong" style="display:none"/></div>
                    <div class="col-md-6">
                    <button type="submit" id="upload"  class="btn btn-primary">Upload</button>
                  </div>
                  </div>

                </form>
                <div class="jumbotron" style="height:300px;margin-top:5%" id="map"></div>
              <script type="text/javascript">
      document.getElementById("dob").defaultValue = '<?php echo $dob?>';
function initMap2() {
  document.getElementById("upload").disabled = true;
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 1
  });}
  function initMap() {
    document.getElementById("upload").disabled = false;
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 1
  });
  
  var geocoder = new google.maps.Geocoder();
    var city = document.getElementById("city").value;
  var area = document.getElementById("area").value;
  var address = area+" "+city;
  //alert(address);
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
            map:map,
           position: results[0].geometry.location
        });
    var loc=results[0].geometry.location;
    document.getElementById("latlong").value=loc;
    //alert(loc);
      } else {
        alert("Please Enter a valid area and city " );
      }
    });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAm2LBtBN5bDYCtNcCDIszMTQeoUgEwOkw&callback=initMap2"
        async defer></script>

            
            </div>
            <div role="tabpanel" class="tab-pane" id="recentupload">
            <div class="uploadlistcontainer">
            <?php
            $query6="select * from flat where sellerid='$userid'";
            $con6=con();
            $res6=$con6->query($query6);
            while($arr=$res6->fetch_array())
            {
              $houseno=$arr['houseno'];
              $society=$arr['society'];
              $locality=$arr['area'];
              $city=$arr['city'];
              $bhk=$arr['bhk'];
              $area=$arr['plotarea'];
              $id=$arr['id'];
              $price=$arr['price'];

            ?>

                <div class="row uploadlist">
                  <div class="col-md-12"><a href="modifyupload.php?id=<?php echo $id;?>"><span class="glyphicon glyphicon-remove" style="position:absolute;right:3%;color:#565F78"></span></a></div>
                  <div class="col-md-1">
                      <div class="arrow"><div class="arrow-before"><p>ID:<?php echo $id;?></p></div><div class="arrow-head-container"><div class="arrow-head"></div></div></div>
                      <!--<h4>House name</h4>-->
                  </div>
                  <div class="col-md-2" style="padding-right:0;"><h4><?php echo $city;?></h4></div>
                  <div class="col-md-5">
                    <p>
                      <b>Address:</b> <?php echo $houseno.", ".$society.", ". $locality;?><br>
                      <b>Area:</b> <?php echo $area;?> sq.ft<br>
                      <b>BHK:</b> <?php echo $bhk;?> BHK<br>
                    </p> 
                  </div>
                  <div class="col-md-2" style="margin-left:1%">
                    <p><b>Price:</b> <?php echo $price;?> lacs</p>
                  </div>
              </div>
              <?php 
                }
              ?>
            
            </div>

            
            </div>
        </div>

        </div>

        <div class="wlistdetails">
           <h1 style="font-family: 'PT Sans Narrow', sans-serif;">Wishlist</h1>
            <hr>
            <div class="wlistcontainer">
                <?php
                $query7="select * from wishlist where buyerid='$userid' AND sho='1' ";
                $con7=con();
                $res7=$con7->query($query7);
                while($arr7=$res7->fetch_array())
                {
                  $sellerid=$arr7['sellerid'];
                  $houseid=$arr7['houseid'];
                  $wishid=$arr7['id'];
                  $query8="select * from user where id='$sellerid'";
                  $res8=$con->query($query8);
                  while($arr8=$res8->fetch_array())
                  {
                    $sellername=$arr8['name'];
                    $sellernum=$arr8['phnno'];
                  }
                  $query9="select * from flat where id='$houseid'";
                  $res9=$con->query($query9);
                  while($arr9=$res9->fetch_array())
                  {
                    $houseno=$arr9['houseno'];
                    $society=$arr9['society'];
                    $area=$arr9['area'];
                     $plotarea=$arr9['plotarea'];
                    $city=$arr9['city'];
                $price=$arr9['price'];
                $bhk=$arr9['bhk'];
                $img=$arr9['images'];
                  }

                ?>
                <div class="row wlistlist nopadding">
                <div class="col-md-12"><a href="modifywishlist.php?id=<?php echo $wishid ;?>"><span class="glyphicon glyphicon-remove" style="position:absolute;right:3%;color:#565F78"></span></a></div>
                  <div class="col-md-3 nopadding">
                    <img src="<?php echo $img ;?> " class="img-responsive">
                  </div>
                  <div class="col-md-2 nopadding">
                      <p style="font-size:18px;">Details</p>
                  </div>
                  <div class="col-md-4 nopadding">
                    <p>
                    <b>Address:</b> <?php echo $houseno.", ".$society.", ". $area;?><br>
                      <b>Area:</b> <?php echo $plotarea;?> sq.ft<br>
                      <b>BHK:</b> <?php echo $bhk;?> BHK<br>
                      <b>Seller:</b> <?php echo $sellername;?><br>
                      <b>Seller Contact:</b>  <?php echo $sellernum;?><br>
                    </p>
                  </div>
                  <div class="col-md-2 nopadding" style="margin-left:1%">
                    <p><b>Price:</b> <?php echo $price;?> lacs</p>
                  </div>
                </div>
<?php } ?>

            </div>
        </div>



    </div>
    </div>
    </div>

         




   
   <div class="fluid-container">
            <div class="foot" style="min-height:350px;background:#4D4C4C;margin-top:5%">
        <div class="row">
          <div class="col-md-6">
            <h1 style="color:White;font-size:35px;text-align:center;margint-top:5%;font-family: 'Lobster', cursive;">DreamVilla</h1>
            <p style="color:#CCC;font-size:20px;margin-left:5%;">DreamVilla is India's No 1 Property portal and has been Awarded as the most preferred property site in India, by independent surveys. 
            Our Webiste provides a platform for property buyers and sellers to locate properties of interest and helps the buyer and seller to communicate
            with each other and provide umambiguous services.</p>
          </div>
          <div class="col-md-6">
            <div class="row">
            <div class="col-md-5">
              <h2 style="color:white;font-size:25px;font-family: 'Yanone Kaffeesatz', sans-serif;">Find Real Estate in your City</h2>
              <ul>
                <li><a href="city.php?city=Delhi" style="text-decoration:none;color:#CCC">Delhi</a></li>
                <li><a href="city.php?city=Mumbai" style="text-decoration:none;color:#CCC">Mumbai</a></li>
                <li><a href="city.php?city=Ahmedabad" style="text-decoration:none;color:#CCC">Ahmedabad</a></li>
                <li><a href="city.php?city=Jaipur" style="text-decoration:none;color:#CCC">Jaipur</a></li>
                <li><a href="city.php?city=Bangalore" style="text-decoration:none;color:#CCC">Bangalore</a></li>
                <li><a href="city.php?city=Hyderabad" style="text-decoration:none;color:#CCC">Hyderabad</a></li>
                <li><a href="city.php?city=Chennai" style="text-decoration:none;color:#CCC">Chennai</a></li>
                <li><a href="city.php?city=Kolkaka" style="text-decoration:none;color:#CCC">Kolkata</a></li>
              </ul>
            </div>
              

              <div class="col-md-4"><h2 style="color:white;font-size:25px;font-family: 'Yanone Kaffeesatz', sans-serif;">Quick Links</h2><ul>
                <li><a href="index.php" style="text-decoration:none;color:#CCC">Home</li>
                <li><a href="contactus.php" style="text-decoration:none;color:#CCC">Contact Us</li>
                
              </ul>

              <h2 style="color:white;font-size:25px;font-family: 'Yanone Kaffeesatz', sans-serif;">Follow Us</h2>
              <ul style="list-style-type:none;">
                <li><span class="fa fa-facebook fa-2x" style="color:#CCC"></span><a href="https://www.fb.com" target="_blank" style="color:#CCC;text-decoration:none;margin-left:5%;">Facebook</a></li>
                <li><span class="fa fa-linkedin fa-2x" style="color:#CCC"></span><a href="https://www.linkedin.com" target="_blank"  style="color:#CCC;text-decoration:none;margin-left:5%;">LinkedIn</a></li>
                <li><span class="fa fa-google-plus fa-2x" style="color:#CCC"></span><a href="https://www.gmail.com" target="_blank"  style="color:#CCC;text-decoration:none;margin-left:5%;">Google+</a></li>
                <li><span class="fa fa-twitter fa-2x" style="color:#CCC"></span><a href="https://www.twitter.com.com" target="_blank"  style="color:#CCC;text-decoration:none;margin-left:5%;">Twitter</a></li>
              </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row" style="background:#2E2F31;max-width:1369px;">
          <div class="col-md-6 col-md-push-3">
            <p style="color:#CCC;text-align:center">&copy:2015 Web-Design and Developed by Cluesless Idiots.</p>
          </div>
        </div>
      </div>





    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popupprofile.js"></script>
  </body>
</html>

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
    <script src="js/popup.js"></script>

    <title>DreamVilla</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>  
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>  
    <link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'> 
    <link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href="css/citystyle.css" rel="stylesheet" type="text/css">  <!-- custom css -->

    <link href="css/chatpop.css" rel="stylesheet" type="text/css">  <!-- custom css -->
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
$id=$_SESSION['userid'];
$city=$_GET['city'];
    ?>
     
      
      <div class="navbar navbar-inverse">
     <div class="container navc">
          <div class="cityname"><p><?php echo $city;?><br></p></div>
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
          echo  "<li><a href=\"profile.php\"><font size=\"3\">Profile</font></a></li>";
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

   
   <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="myModalLabel">Login/Sign Up</h2>
      </div>
      <div class="modal-body">
               <!-- <div class="row"> 
    <div class="col-md-4 popup"> 
       <div class="pophead"><a href="#" class="cross"><span class="glyphicon glyphicon-remove" ></span></a></div>-->
      
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
                <form name="login" id="login" method="post" action="login.php">
                  <div class="form-inline">
                    <span class="labels"><label>Email Id <span class="glyphicon glyphicon-user"></span></label></span>
                    <span class="input"><input type="text" name="email" id="email" placeholder="abc@example.com" class="form-control" required ></span>
                  </div>
                  <div class="form-inline">
                    <span class="labels"><label>Password  <span class="glyphicon glyphicon-lock"></span></label></span>
                    <span class="input"><input type="password" name="password" id="password" placeholder="*********" class="form-control" required ></span>
                  </div>
                  <div class="form-inline">
                    <button type="submit" class="btn btn-primary log">Login</button>
                  </div>

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
 document.getElementById("submit").disabled=true;</script>
                  </div>
                </form>
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
            </div>
        </div>
        </div>
      
      <!-- end</div>
    </div> -->
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>-->
    </div>
  </div>
</div>




     <!--<div class="row" style="padding:0;margin:0;">
        <div class="col-md-3" id="chatboxx" style="position:fixed;right:20%;z-index:10000;bottom:0;padding:0;margin:0;display:none">
            <div class="panel panel-primary">
                <div class="panel-heading" onclick="chatpop();">
                    <div class="panel-title">Chat<button id="min"><span class="glyphicon glyphicon-chevron-up" id="but"></span></button></div>
                </div>
                <div class="panel-body" id="panbody" style="display:none">
                  <div id="textarea">
                  
                  <div id="texts" class="row">
                        <div class="col-md-2" style="height:20px;"><img src="img/profile.jpg" style="border-radius:17.5px;" width="35px" height="35px;"></div>
                        <div class="col-md-8 col-md-push-1" style="padding-bottom:2px;background:#00A3E4;font-family: 'Yanone Kaffeesatz', sans-serif;color:white;font-size:16px;"><span id="arr"></span>hi my name is urjit and i would to buy this house.</div>
                    </div>
                  </div>
                    <form>
                    <div class="form-inline" id="entertext"> 
                        <input type="text" placeholder="Enter your text" style="width:72%">
                        <button class="btn btn-primary" type="submit" style="margin-left:5%;" onclick="chatpop_();">Send</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
      </div>-->



    <div id="chatcontainer">
    <div class="row nopadding">
    <div class="col-md-2 nopadding abc"><span class="fa fa-wechat" id="chatbut" onclick="chatt();"></span></div>
    <div class="col-md-10 nopadding" id="chatcol">
        <div class="panel panel-primary" id="chatpop">
       <div class="panel-heading" id="chatpophead"><div class="panel-title" style="margin-left:25%;">Chat List</div></div>
        <div class="panel-body" id="chatlist">
             <table>
             <?php

$query="select distinct user1,user2 from messages where user1='$id' OR user2='$id'";
$con=con();
$res=$con->query($query);

while($arr=$res->fetch_array())
{
  
  if($id==$arr['user1'])
  {
    $user2=$arr['user2'];
    $query1="select * from user where id='$user2' and id !='$id'";
$con1=con();
$res1=$con1->query($query1);
while($arr1=$res1->fetch_array())
{
  
 echo "<a style=\"color:#747474;font-size:20px;font-weight:bold;\" href=\"chatroom.php?id2=".$arr['user2']."\" target=\"_blank\">".$arr1['name']."</a>";
 ?> <!--<tr><td><p style="color:#747474;font-weight:bolder;size:24px;" onclick=";"><?php/* echo $arr1['name'];*/ ?></p></td></tr>--><?php
  $query3="select * from chat where receiver = '$id' and sender = '$user2' and display='1'";
  $con3=con();
  $res3=$con3->query($query3);
   echo "<div style=\"position:relative;margin-right:5%;float:right;font-size:10px;margin-top:4%;color:red;\">".$res3->num_rows." New messages. </div>";
  echo "<br>";
  }
  
}
else
  {
    $user1=$arr['user1'];
    $query1="select * from user where id='$user1' and id !='$id'";
$con1=con();
$res1=$con1->query($query1);
while($arr1=$res1->fetch_array())
{
 echo "<a style=\"color:#747474;font-size:20px;font-weight:bold;\" href=\"chatroom.php?id2=".$arr['user1']."\"target=\"_blank\">".$arr1['name']."</a>";
  ?><!-- <tr><td><p style="color:#747474;font-weight:bolder;size:24px;" onclick=""</p></td></tr>--><?php
  $query3="select * from chat where receiver = '$id' and sender = '$user1' and display='1'";
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






    <div class="jumbotron bg1" style="background: url('img/abc.png');background-size: 1349px 490px;">
       
    </div>

    






    <div class="row">
      <div class="col-md-3 col-md-offset-0 filterbox">
          <div class="panel panel-primary" style="margin-left:7%;">
          <div class="panel-heading">
          <h3 class="panel-title" style="font-weight:bold;text-align:center;">Filter your search</h3></div> 
          <div class="panel-body" style="padding:10%;">
          <form name="search" id="search" action="search.php" method="post">
            <h4 style="margin-top:30px;">Select your Budget<span class="fa fa-inr" style="margin-left:15px;"></span></h4>
            <input type="hidden" name="city" value="<?php echo $city; ?>" >
            <div class="checkbox">
              <label><input type="radio" name ="price" value="30" required >Rs. Less than 30 lacs</label>
              <label><input type="radio" name ="price" value="40" required >Rs. Less than 40 lacs</label>
              <label><input type="radio" name ="price" value="50" required >Rs. Less than 50 lacs</label>
              <label><input type="radio" name ="price" value="90" required >Rs.Less than 90 lacs</label>
            </div>
          
          <hr>


          
            <h4 style="margin-top:30px;">Select BHK <span class="glyphicon glyphicon-th-list" style="margin-left:15px;"></span></h4>
            <div class="checkbox">
              <label><input type="radio" name ="bhk" value="1" required >1 BHK</label><br>
              <label><input type="radio" name ="bhk" value="2" required >2 BHK</label><br>
              <label><input type="radio" name ="bhk" value="3" required >3 BHK</label><br>
              <label><input type="radio" name ="bhk" value="4" required >4 BHK</label>
            </div>
          
            <hr>
          
            <h4 style="margin-top:30px;">Flat Area <span class="glyphicon glyphicon-th" style="margin-left:15px;"></span></h4>
            <div class="checkbox">
              <input type="range" name="plotarea" id="plotarea" min="1000" max="40000" step="1" value="1800"  required onmousemove="showValue(this.value);">
              <textarea id="result" style="height:20px " >
</textarea>
            </div>
            <script>

function showValue(num){
           var result = document.getElementById('result');     
           document.getElementById('result').value = num;
  }

</script>

            <hr> 

            <h4 style="margin-top:30px;margin-left:-5%;">Save Your filter? <span class="glyphicon glyphicon-save" style="margin-left:15px;"></span></h4>
            <div class="checkbox">
              <label><input type="checkbox" name="notify" id="notify" value="YES">Receive Notification regarding your saved filter.</label><br>
            </div>

            <button class="btn btn-primary" style="width:60%;margin-left:20%;">Apply Filter</button>

          </form>


      </div>
      </div>
    </div>
  </div>


    <div class="container">
    <h2 style="color:#8C6599;font-weight:bolder;font-family: 'Yanone Kaffeesatz', sans-serif;font-size:36px;">Available Flats</h2>
    <hr style="border-color: #8C6599">
    </div>
    <div class="container" style="margin-left:20%;width:78%;background:#F4F4F4;">
    <div class="row" style="height:920px;overflow-y:scroll" id="listcontainer">
       
        <?php 
        if(!isset($_GET['set']))
        {
        $query4="select * from flat where city='$city'";}
        else
        {
          unset($_GET['set']);
          $price=$_GET['price'];
          $bhk=$_GET['bhk'];
          $plotarea=$_GET['plotarea'];
        //  $city=$_GET['city'];
          $query4="SELECT * FROM `flat` WHERE city='$city' AND price <= '$price' AND bhk='$bhk' AND plotarea <= '$plotarea' and sellerid !='$id'";
        }
        $con4=con();
        $res4=$con4->query($query4);
        while($arr4=$res4->fetch_array())
        {
          $houseno=$arr4['houseno'];
          $society=$arr4['society'];
          $area=$arr4['area'];
          $city=$arr4['city'];
          $plotarea=$arr4['plotarea'];
          $bhk=$arr4['bhk'];
          $price=$arr4['price'];
          $houseid=$arr4['id'];
          $image=$arr4['images'];
         // $sellerid=$arr4['$sellerid'];
         ?> <div class="col-md-3">
            <div class="thumbnail flatlist">
              <img src="<?php echo $image;?>" style="width:242px;height:200px;">
                <div class="caption">
        
                  <div class="row"><div class="col-md-12" style="height:50px"><p>Address: <?php echo $houseno.", ".$society.", ". $area;?></p></div></div>
                  <div class="row"><div class="col-md-12" style="height:25px"><p>Area:<?php echo $plotarea;?> sq.ft</p></div></div>
                  <div class="row"><div class="col-md-12" style="height:25px"><p>Price: <?php echo $price;?> lacs</p></div></div>
                  <div class="row"><div class="col-md-4 col-md-push-3"><a href="flats.php?id=<?php echo $houseid;?>"><button class="btn btn-primary searchflat"  >Know More</button></a></div></div>
                </div>
              </div>
            </div>
        <?php } ?>
        </div>
    </div>
    


      <!-- Modal -->
<!--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
     
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <<h4 class="modal-title" id="myModalLabel">House Name</h4>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-md-6"><img src="img/mumbai.jpg" class="img-responsive" id="houseimg"></div>
              <div class="col-md-6"><div class="row" style="margin-top:5%;"><div class="col-md-6 col-md-push-3"><button class="btn btn-warning"><span class="fa fa-star" style="margin-right:2%;"></span>Add to Wishlist</button></div></div>
                                    <div class="row" style="margin-top:5%;"><div class="col-md-6 col-md-push-3"><button class="btn btn-info"><span class="fa fa-wechat" style="margin-right:2%;"></span>Chat with seller</button></div></div></div>
          </div>
          <br>
          <h3 style="font-family: 'PT Sans Narrow', sans-serif;margin-left:10%;">Details</h3>
          <div class="row" style="margin-top:5%;">
            <div class="col-md-10 col-md-push-1">
              
                <div class="table-responsive">
                  <table class="table">
                      <tr><td><b style="color:#747474">Address:</b></td>
                        <td style="color:#747474" id="address">4,Atmajyoti Nagar,Ellora park,vadodara,gujarat</td>
                      </tr>

                      <tr><td><b style="color:#747474">BHK:</b></td>
                        <td style="color:#747474" id="bhk">3 BHK</td>
                      </tr>

                      <tr><td><b style="color:#747474">Area:</b></td>
                        <td style="color:#747474" id="area">3250 sq.ft</td>
                      </tr>

                      <tr><td><b style="color:#747474">Seller's Name:</b></td>
                        <td style="color:#747474" id="sellername">Urjit Patel</td>
                      </tr>

                      <tr><td><b style="color:#747474">Seller's Mob no.:</b></td>
                        <td style="color:#747474" id="sellermob">9792690421</td>
                      </tr>

                      <tr><td><b style="color:#747474">Seller's Email id:</b></td>
                        <td style="color:#747474" id="sellermail">urjit1596@gmail.com</td>
                      </tr>

                      <tr><td><b style="color:#747474">Price:</b></td>
                        <td style="color:#747474" id="price">Rs. 55lacs</td>
                      </tr>


                  </table>
              </div>
              
            </div>
          </div>

      </div>

      <h2 style="font-family: 'PT Sans Narrow', sans-serif;margin-left:10%;">Location on Google Map</h2>
      <div class="jumbotron" style="min-height:300px;">
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

  <script type="text/javascript">
        $('#myModal').on('show.bs.modal',function(e){

            var $modal=$(this),
            houseid=e.relatedTarget.id;
            
            $modal.find('#address').html(houseid);
            $modal.find('#bhk').html(houseid);
            $modal.find('#area').html(houseid);
            $modal.find('#sellername').html(houseid);
            $modal.find('#sellermob').html(houseid);
            $modal.find('#sellermail').html(houseid);
            $modal.find('#price').html(houseid);
            
        })
   </script>
-->





      
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
    
  </body>
</html>

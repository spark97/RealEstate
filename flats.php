<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
    <script src="js/wishlist.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAm2LBtBN5bDYCtNcCDIszMTQeoUgEwOkw&callback=initMap2"
        async defer>
       
        </script>
  

    <title>DreamVilla</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>  
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>  
    <link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'> 
    <link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href="css/flatstyle.css" rel="stylesheet" type="text/css">  <!-- custom css -->
    <link href="fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/chatpop.css" rel="stylesheet" type="text/css"> 
    

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
          $houseid=$_GET['id'];
$userid=$_SESSION['userid'];
?>
       <?php 
        $query4="select * from flat where id='$houseid'";
        $con4=con();
        $res4=$con4->query($query4);
        while($arr4=$res4->fetch_array())
        {
          $houseno=$arr4['houseno'];
          $city=$arr4['city'];
          $society=$arr4['society'];
          $area=$arr4['area'];
          $city=$arr4['city'];
          $plotarea=$arr4['plotarea'];
          $bhk=$arr4['bhk'];
          $price=$arr4['price'];
          $houseid=$arr4['id'];
          $sellerid=$arr4['sellerid'];
          $latlong=$arr4['latlong'];
        $image=$arr4['images'];}
          $query5="select * from user where id='$sellerid'";
        $con5=con();
        $res5=$con5->query($query5);
        while($arr5=$res5->fetch_array())
        {
          $name=$arr5['name'];
          $phnno=$arr5['phnno'];
          $email=$arr5['email'];
          }?>
          

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
                <form>
                  <div class="form-inline">
                   <span class="labels"> <label>Username  <span class="glyphicon glyphicon-user"></span></label></span>
                  <span class="input">  <input type="text" placeholder="Choose your username" class="form-control"></span>
                  </div>
                  <div class="form-inline">
                   <span class="labels"> <label>Password  <span class="glyphicon glyphicon-lock"></span></label></span>
                    <span class="input"><input type="password" placeholder="Choose your password" class="form-control"></span>
                  </div>
                  <div class="form-inline">
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                  </div>
                </form>
            </div>
        </div>
        </div>
      
      </div>
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






    <div class="container" style="margin-top:5%;">
    
      <div class="row">
          <div class="col-md-3">
          <div class="panel panel-primary" style="height:400px;box-shadow: 6px 7px 5px 0px rgba(0,0,0,0.75);">
          <div class="panel-heading"><div class="panel-title" style="font-family: 'PT Sans Narrow', sans-serif;margin-left:37%;font-weight:bold;font-size:20px;">Details</div></div>
          <div class="panel-body">
          <div class="img"><img src="<?php echo $image;?>" class="img-responsive" ></div></div>
          <div class="row"><div class="col-md-6 col-md-push-3"><button id="wishlist" type="submit" value="<?php echo $houseid ;?>" class="btn btn-warning"><span class="fa fa-star"></span>Add to Wishlist</button></div></div>
          <input type="hidden" value=<?php echo $sellerid;?> id="sellerid">
          <div class="row"><div class="col-md-6 col-md-push-3" style="margin-top:5%;"><a href="chatroom.php?id2=<?php echo $sellerid;?>" target="_blank"><button class="btn btn-info"><span class="fa fa-wechat"></span>Chat with seller</button></a></div></div>
          </div>
          </div>


          <div class="col-md-7 col-md-push-1 flatdetails">
          <div class="caption">
              <div class="table-responsive">
                  <table class="table">
                      <tr><td style="color:#747474"><b>Address:</b></td>
                        <td style="color:#747474"><?php echo $houseno.", ".$society.", ". $area.", ".$city;?></td>
                      </tr>

                      <tr><td style="color:#747474"><b>BHK:</b></td>
                        <td style="color:#747474"><?php echo $bhk;?> BHK</td>
                      </tr>

                      <tr><td style="color:#747474"><b>Area:</b></td>
                        <td style="color:#747474"><?php echo $plotarea;?> sq.ft</td>
                      </tr>

                      <tr><td style="color:#747474"><b>Seller Name:</b></td>
                        <td style="color:#747474"><?php echo $name;?></td>
                      </tr>

                      <tr><td style="color:#747474"><b>Seller Mob no.:</b></td>
                        <td style="color:#747474"><?php echo $phnno;?></td>
                      </tr>

                      <tr><td style="color:#747474"><b>Seller Email id:</b></td>
                        <td style="color:#747474"><?php echo $email;?></td>
                      </tr>

                      <tr><td style="color:#747474"><b>Price:</b></td>
                        <td style="color:#747474"><?php echo $price;?> lacs</td>
                      </tr>


                  </table>
              </div>

          </div>
          </div>
         </div><!--container-->

          <!--<div class="col-md-3 chatbox">
            <div class="chathead"><h2>Chat with seller</h2></div>
            <div class="textarea"></div>
            <div class="textenter">
              <form>
              <div class="form-inline"> 
                <input type="text" placeholder="Enter your text" style="width:70%">
                <button class="btn btn-default" type="submit" style="margin-left:3%;">Send</button>
              </div>
              </form>
            </div>
          </div>
      </div>-->


     <!-- <div class="row" style="padding:0;margin:0;">
        <div class="col-md-3" id="chatboxx" style="position:fixed;right:0;z-index:10000;bottom:0;padding:0;margin:0;">
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



      <div class="container">
      <h1 style="font-family: 'Yanone Kaffeesatz', sans-serif;">Location on Map</h1>
      <hr>
    </div>

    <div class="jumbotron map" id="map">
    
    </div>

   
 
    
   
   </div>
      
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


      <script type="text/javascript">
       
        
function initMap2() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 28.6454567, lng: 77.21186069999},
    zoom: 6
  });
  
 <?php
$query="SELECT * FROM flat WHERE id='$houseid' ";
$con=con();
$res=$con->query($query); 
while($arr=$res->fetch_array())
      {   
        $latlong=$arr['latlong'];
        
        ?>
              var a = "<?php echo $latlong?>";
        //alert(a);
     var marker = new google.maps.Marker({
     position: new google.maps.LatLng<?php echo $latlong; ?> ,
     map: map,
    });
  
 
      <?php }?>
}
 
          var temp=1
         function chatpop()
         {
             if(temp%2==1)   {
                $("#panbody").show();
                 $("#but").removeClass('glyphicon-chevron-up');
                  $("#but").addClass('glyphicon-chevron-down');
                  temp++;
                  console.log(temp);
             } 
             else{
              $("#panbody").hide();
                 $("#but").removeClass('glyphicon-chevron-down');
                  $("#but").addClass('glyphicon-chevron-up');
                  temp++;
                  console.log(temp);
             }
             
         };
         function chatpop_(){
            $("#panbody").show();
                 $("#but").removeClass('glyphicon-chevron-up');
                  $("#but").addClass('glyphicon-chevron-down');
         };
      </script>




</body>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
</html>

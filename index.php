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
    <script src="js/jquery.hoverfold.js"></script>
    <script src="js/modernizr.custom.69142.js"></script>

    <title>DreamVilla</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>  
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>  
    <link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'> 
    <link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
    <link href="css/indexstyle.css" rel="stylesheet" type="text/css">  <!-- custom css -->
    <link href="css/style_common.css" rel="stylesheet" type="text/css"> 
    <link href="css/fallback.css" rel="stylesheet" type="text/css"> 
    <link href="css/style1.css" rel="stylesheet" type="text/css"> 
    <!-- Custom styles for this template -->
    <link href="css/normalize.css" rel="stylesheet" type="text/css">
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
session_start();
?>

   
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
          echo  "<li><a href=\"profile.php\"><font size=\"3\">Profile</font></a></li>";
        }
        else
          echo  "<li><a href=\"profile.php\"><font size=\"3\" style=\"display:none;\">Profile</font></a></li>";
?>            <li class="active"><a href="#"><font size="3">Home</font></a></li><?php
            if(!isset($_SESSION['userid']))
            echo "<li><a href=\"#\" class=\"loginbtn\" type=\"button\" data-toggle=\"modal\" data-target=\"#mymodal\"><font size=\"3\">Login/Register</font></a><span class=\"sparr\"></span></li>";
            else
              echo "<li><a href=\"logout.php\" class=\"logoutbtn\" type=\"button\" ><font size=\"3\">Logout</font></a><span class=\"sparr\"></span></li>";?>
            <li><a href="contactus.php"><font size="3">Contact Us</font></a><span class="sparr"></span></li>
          </ul>
        </div>
      </div>
    </div>

    <!--<div class="row">
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
    </div>-->
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
                    <span class="input"><input type="text" name="name" id="name" placeholder="Enter your full name" class="form-control"  required ></span>
                  </div>
                  <div class="form-inline">
                   <span class="labels"> <label>Email Id  <span class="glyphicon glyphicon-envelope"></span></label></span>
                  <span class="input">  <input type="email" name="email" id="email" placeholder="abc@example.com" class="form-control"  required ></span>
                  </div>
                  <div class="form-inline">
                   <span class="labels"> <label>Password  <span class="glyphicon glyphicon-lock"></span></label></span>
                    <span class="input"><input type="password" id="txtNewPassword" name="pass"  placeholder="*********" class="form-control" required ></span>
                  </div>
                  <div class="form-inline">
                   <span class="labels"> <label>Re-Password  <span class="glyphicon glyphicon-lock"></span></label></span>
                    <span class="input"><input type="password"  required id="txtConfirmPassword" name="repass" onchange="checkPasswordMatch();" placeholder="Re-enter your password" class="form-control"></span>
                  </div>
                  <div class="form-inline">
                  	<div class="alert" id="divCheckPasswordMatch"></div>
                  </div>
                   <div class="form-inline">
                   <span class="labels"> <label>Mob No.  <span class="glyphicon glyphicon-phone-alt"></span></label></span>
                    <span class="input"><input type="number" name="phnno" id="phnno"  required  placeholder="Enter your mob no." class="form-control"></span>
                  </div>
                   <div class="form-inline">
                   <span class="labels"> <label>Date of birth  <span class="glyphicon glyphicon-gift"></span></label></span>
                    <span class="input"><input type="date" name="dob" id="dob"  required class="form-control"></span>
                  </div>
                   <div class="form-inline">
                   <span class="labels"> <label>Current Address  <span class="glyphicon glyphicon-home"></span></label></span>
                    <span class="input"><textarea placeholder="Enter your current address" name="address" id="address"  class="form-control" required  rows="5" cols="70"></textarea></span>
                  </div>
                   <div class="form-inline">
                   <span class="labels"> <label>Gender  <span class="fa fa-venus-mars"></span></label></span>
                    <span class="input"><input type="radio" name="gender" id="gender" value="male" required >Male</span>
                    <span class="input"><input type="radio" name="gender" id="gender" value="female" required >Female</span>
                  </div>
                  <div class="form-inline">
                   <span class="labels"> <label>Nationality  <span class="glyphicon glyphicon-globe"></span></label></span>
                    <span class="input"><input type="text" name="nation" id="nation"  placeholder="Enter your nationality"  required class="form-control"></span>
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

    

  




    <div class="jumbotron bg">
    <div class="row">
    <div class="col-md-6 col-md-offset-1">
      <form class="navbar-form" role="search" method="post" action="2.php">
          <div class="form-group searchbar">

           <input type="text" name ="city" class="form-control" placeholder="Search your city">
           </div>
            <button type="submit" class="btn btn-default submit"><!--<font color="black"><b>Submit</b></font>--><span class="glyphicon glyphicon-search"></span></button>
      </form>
      </div>
      </div>
      <div class="carousel slide" id="mycarousel">
     <ol class="carousel-indicators">
     <li data-target="#mycarousel" data-slide-to="0"></li>
     <li data-target="#mycarousel" data-slide-to="1"></li>
     <li data-target="#mycarousel" data-slide-to="2"></li>
     
     </ol>
      <div class="carousel-inner">
        <div class="item active container">
            <h2>About Us</h2>
            <p>DreamVilla is India's No 1 Property portal and has been Awarded as the most preferred property site in India, by independent surveys.</p>
        </div>

        <div class="item container">
            <h2>Trustworthy</h2>
            <p>Our Webiste provides a platform for property buyers and sellers to locate properties of interest and helps the buyer and seller to communicate with each other and provide umambiguous services.</p>
        </div>

        <div class="item container">
            <h2>Why Us?</h2>
            <p>We keep it simple.Our delivery and client engangement process.</p>
        </div>
        
      </div>
      <a class="left carousel-control" data-slide="prev" href="#mycarousel">
      <span class="icon-prev"></span></a>
      <a class="right carousel-control" data-slide="next" href="#mycarousel">
      <span class="icon-next"></span></a>
     </div>

    </div>

      <div class="container">
          <h2 class="h2" style="color:#8C6599;">What We Do</h2>
          <hr>
          <p style="font-family:"PT Sans Narrow",sans-serif;"><font size="5px" color="#555">At DreamVilla, we aim to give home-seekers variety of properties to search from.  To make your house search easy, we have created a simple yet innovative interface. You can explore flats in your neighbourhood and take a virtual tour of every property. With 100% verified listings and genuine pictures of properties, getting your new place is just a few clicks away!</font></p>
      </div>


    <div class="container" style="margin-top:10%;">
      <div class="row row-no-padding">
        <div class="col-md-3 cl1 row-no-padding infobox"><h2 style="color:white;text-align:center;font-family: 'Yanone Kaffeesatz', sans-serif;font-size:40px;"><b>Why Us ?</b></h1><p style="color:white;text-align:center;font-size:20px;">DreamVilla is India's No 1 Property portal and has been Awarded as the most preferred property site in India, by independent surveys. Our Webiste provides a platform for property buyers and sellers to locate properties of interest and helps the buyer and seller to communicate with each other and provide umambiguous services.</p></div>
        <div class="col-md-3 cl1 row-no-padding"><div class="row row-no-padding"><div class="col-md-12 climg row-no-padding"><img  src="img/homep.jpg" width="285" height="300"></div></div><div class="row row-no-padding"><div class="col-md-12 cltext infobox row-no-padding"><h2>Buy.Sell.Rent</h2><p>Our website provides variety of options for the user to search and choose property according to his/hers need. User can either buy or sell the property and get in contact with each other through our chat feature.</p></div></div></div>
         <div class="col-md-3 cl1 row-no-padding"><div class="row row-no-padding"><div class="col-md-12 cltext infobox row-no-padding"> <h2 style="color:#8C6599;">Chat Feature</h2><p>Introducing the new feature of DreamVilla , the buyer can directly chat with seller securely and privately and receive notifications according to it.</p></div></div><div class="row row-no-padding"><div class="col-md-12 climg row-no-padding"><img src="img/chat.jpg" width="285" height="300"></div></div></div>
          <div class="col-md-3 cl1 row-no-padding"><div class="row row-no-padding"><div class="col-md-12 climg row-no-padding"><img src="img/map.jpg" width="285" height="300"></div></div><div class="row row-no-padding"><div class="col-md-12 cltext infobox row-no-padding"><h2>Locate on Google Map</h2><p>The user can check out the location of the property using Google Maps , one can find all the ameneties nearby the property and check out the location while relaxing at your home.</p></div></div></div>
        
      </div> 
    </div>


    <div class="container">
    <h2 style="color:#8C6599;font-size:40px;font-family: 'Yanone Kaffeesatz', sans-serif;margin-bottom:10px;">Top Cities</h2>
    <hr class="hr">
        <div class="row">
            <div class="col-md-10 col-md-push-1">
            <div class="row">
                <a href="city.php?city=Delhi"><div class="imgcol tint"><img src="img/delhi.jpg" class="img-responsive"><span class="cityname">Delhi</span></div></a>
                <a href="city.php?city=Mumbai"><div class="imgcol tint"><img src="img/mumbai.jpg" class="img-responsive"><span class="cityname">Mumbai</span></div></a>
                <a href="city.php?city=Ahmedabad"><div class="imgcol tint"><img src="img/ahemdabad.jpg" class="img-responsive"><span class="cityname">Ahemdabad</span></div></a>
                <a href="city.php?city=Jaipur"><div class="imgcol tint"><img src="img/jaipur.jpg" class="img-responsive"><span class="cityname">Jaipur</span></div></a>
            </div>
            <div class="row">
                <a href="city.php?city=Chennai"><div class="imgcol tint"><img src="img/chennai.jpg" class="img-responsive"><span class="cityname">Chennai</span></div></a>
                <a href="city.php?city=Koltaka"><div class="imgcol tint"><img src="img/kolkata.jpg" class="img-responsive"><span class="cityname">Kolkata</span></div></a>
                <a href="city.php?city=Bangalore"><div class="imgcol tint"><img src="img/banglore.jpg" class="img-responsive"><span class="cityname">Bangalore</span></div></a>
               <a href="city.php?city=Hyderabad"> <div class="imgcol tint"><img src="img/hyderabad.jpg" class="img-responsive"><span class="cityname">Hyderabad</span></div></a>
            </div>
            </div>
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
        <div class="row" style="background:#2E2F31;">
          <div class="col-md-6 col-md-push-3">
            <p style="color:#CCC;text-align:center">&copy:2015 Web-Design and Developed by Cluesless Idiots.</p>
          </div>
        </div>
      </div>




    






    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <!--<script src="js/popup.js"></script>-->
  </body>
</html>

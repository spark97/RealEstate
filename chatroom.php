<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
    <script src="js/chatload.js"></script>
<script src="Chat.js"></script>
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
    <link href="css/chatroom.css" rel="stylesheet" type="text/css">  <!-- custom css -->
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
$id2=$_GET['id2'];
            $query="update chat set display = '0' where receiver='$id' and sender='$id2'";
            $con=con();
            $res=$con->query($query);
?>
      <div class="navbar navbar-inverse">
     <div class="container navc">
          <div class="cityname"><p>Chatroom<br></p></div>
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
    </div><?php
$query1="SELECT * FROM user where id='$id'";
$con1=con();
$res1=$con1->query($query1);
 while($arr1=$res1->fetch_array())
 {
$name=$arr1['name'];}

?>


     <div class="row" style="padding:0;margin:0;">
        <div class="col-md-3 col-md-push-4" id="chatboxx">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">Chat</div>
                </div>
                <div class="panel-body" id="panbody">
                  <div id="textarea">
                  
                  <?php 
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
                        echo "<div id=\"texts\" class=\"row\" style=\"margin-top:2%;\">";
                        echo "<div class=\"col-md-1 col-md-offset-0\" style=\"width:60px;height:60px;font-family: 'PT Sans Narrow', sans-serif;font-weight:bolder;font-size:20px;color:#747474;\">".$sender."</div>";
                         /*echo "<div class=\"col-md-2 col-md-push-1\" style=\"padding-bottom:2px;background:white;font-family: 'Yanone Kaffeesatz', sans-serif;color:black;font-size:24px;\"><span id=\"arr1\"></span></div>*/
                        echo "<div class=\"col-md-8 col-md-push-1\" style=\"padding-bottom:2px;background:#00A3E4;font-family: 'Yanone Kaffeesatz', sans-serif;color:white;font-size:24px;\"><span id=\"arr\"></span>". $message."</div>"; 
                        echo "</div>";}
?>               
                    
                  </div>
   <!---->
                   <div class="form-inline" id="entertext">
<form action="#" onSubmit='return false;' id='chatForm'>
<input type='hidden' id="name" value='<?php echo $name;?>'>
<input type='hidden' id="id2" value='<?php echo $id2;?>'>
<input type='hidden' id="id1" value='<?php echo $id1;?>'>                    
                        <input type="text" name='text' id="text" value='' placeholder="Enter your text" style="width:72%">
                        <button class="btn btn-primary" type="submit" name='submit' value='Post' style="margin-left:5%;">Send</button>
                    </div>
                  </form>
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

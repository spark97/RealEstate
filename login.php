<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<!--<script src='https://www.google.com/recaptcha/api.js'></script>-->
</head>

<body>
<?php
include('function.php');
/*require_once('recaptchalib.php');
  $privatekey = "6LcIug0TAAAAAISWrTPClCiN_oj9IfXHYho1AaZL";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");
  } 
  else
  {*/
$email=$_POST['email'];
$password=$_POST['password'];
$query="select * from user where email='$email'";
$con=con();
$res=$con->query($query);
if($res->num_rows==0)
{
	echo "<script>alert('No such user exists'); window.location.href='index.php';</script>  ";
	

	}
	else
	{
		while($arr=$res->fetch_array())

		 {
			 if($arr['password']==$password)
			 {
				 echo "You are successfully logged in";
				 session_start();
				 $_SESSION['userid']=$arr['id'];
				 $id=$arr['id'];
				 $query1="update user set login = '1' where id='$id'";
$con1=con();
$res1=$con1->query($query1);
				 header('location:profile.php');

				 }
				 else
				 {
				 	echo "<script>alert('Wrong password'); window.location.href='index.php';</script>  ";
	

				
				 }
			// }
	}}
?>
</body>
</html>
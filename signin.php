<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 
include('function.php');
?>

<form action="insertuser.php" method="post" name="user" id="user">
Full Name<input type="text" name="name" id="name" />
E-mail<input type="email" name="email" id="email" />
Date of Birth<input type="date" name="dob" id="dob" />
Current Address<input type="text" name="address" id="address" />
Phn no.<input type="number" name="phnno" id="phnno" />
<div class="td">
    Password<input type="password" id="txtNewPassword" name="pass" />
</div>
<div class="td">
    Repassword<input type="password" id="txtConfirmPassword" name="repass" onchange="checkPasswordMatch();" />
</div>
    <div class="registrationFormAlert" id="divCheckPasswordMatch">
    </div>
    <br>
    <br>
Nationality<input type="text" name="nation" id="nation" />
Gender:
Male<input type="radio" name="gender" id="gender" value="male"/>
Female<input type="radio" name="gender" id="gender" value="female"/>
<input type="submit" value="Submit" id="submit"/>
<script>
 document.getElementById("submit").disabled=true;</script>

 </form>
 <script>
 function checkPasswordMatch() {
	 var i=0;
    var password = document.getElementById("txtNewPassword").value;
    var confirmPassword = document.getElementById("txtConfirmPassword").value;
    if (password != confirmPassword)
	{
      document.getElementById("divCheckPasswordMatch").innerHTML="passwords do not match";
	  document.getElementById("submit").disabled=true;
	}
    else
	{    
        document.getElementById("divCheckPasswordMatch").innerHTML="passwords match";
		 document.getElementById("submit").disabled=false;
		}
}
 </script></body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<!--<script src='https://www.google.com/recaptcha/api.js'></script>-->
</head>
<body>
<form name="login" id="login" method="post" action="login.php">
Email-Id<input type="email" name="email" id="email" />
<br>
Password-<input type="password" name="password" id="password" />
<br>
<!--<div class="g-recaptcha" data-sitekey="6LcIug0TAAAAABkzuESEB_fLeUFb86SaMTdczCnY"></div>
<?php/*

          require_once('recaptchalib.php');
          $publickey = "6LcIug0TAAAAABkzuESEB_fLeUFb86SaMTdczCnY"; // you got this from the signup page
          echo recaptcha_get_html($publickey);
        */?>
        <br>-->
<input type="submit" name="submit" id="submit" value="login" />
</form>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
$to = '98anshul00@gmail.com';
 
    $subject = 'trial';
 
    $message = 'hey'; 
 
    $from = 'hsallbd@gmail.com';
 
     
 
    // Sending email
 
    if(mail($to, $subject, $message)){
 
        echo 'Your mail has been sent successfully.';
 
    } else{
 
        echo 'Unable to send email. Please try again.';
 
    }
 
    ?>

</body>
</html>
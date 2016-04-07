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
<form name="search" id="search" action="search.php" method="post">
City:<input type="text" name="city" id="city"><br>
Price:<input type="number" name="price" id="price"><br>
1BHK:<input type="radio" name="bhk" id="bhk" value="1"><br>
2BHK:<input type="radio" name="bhk" id="bhk" value="2"><br>
3BHK:<input type="radio" name="bhk" id="bhk" value="3"><br>
Plot Area:<input type="range" name="plotarea" id="plotarea" min="1000" max="40000" step="1" value="1800" onmousemove="showValue(this.value);">
<input type="checkbox" name="notify" id="notify" value="YES"/>Notify me
<textarea id="result">
</textarea>
<script>
function func()
{
document.getElementById("notify").value="off";
console.log(document.getElementById("notify").value);
}
function func2()
{
document.getElementById("notify").value="on";
console.log(document.getElementById("notify").value);
}
function showValue(num){
           var result = document.getElementById('result');     
           document.getElementById('result').value = num;
  }

</script>
<input type="submit" value="Filter" name="submit" />
</form>
</body>
</html>
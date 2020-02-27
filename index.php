<?php
require "dbconfig/config.php";
$wrongpass = '';
$wronginfo = '<div class="alert alert-danger" role="alert">  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Wrong login detail</div>';
include "csrf.php";
?>
<?php  header('X-Frame-Options: DENY'); ?>
<!DOCTYPE html>
<html>
<head>
<title>Login page</title>
</head>
<link rel="stylesheet" href="css/style.css">

<body style="background-color:#6ab04c">

<div id="main-wrapper">
<center>
<h2>Login Form</h2>
<img src="img/login.png" class="login">
</center>



<form class="loginform" action="index.php" method="post"  onsubmit="return checkform(this);" onsubmit="return validate();">
<label><b>Username</label><br>
<input name="name" id="uname" type="text" class="inputvalues" autocomplete="off" placeholder="Type your username"/><br>
<label><b>Password</label><br>
<input name="pass" id="upass" type="password" class="inputvalues" autocomplete="off"  placeholder="Type your password"/><br>

<!-- START CAPTCHA -->
<br>
<div class="capbox">

<div id="CaptchaDiv"></div>

<div class="capbox-inner">
Type the above number:<br>

<input type="hidden" id="txtCaptcha">
<input type="text" name="CaptchaInput" autocomplete="off" id="CaptchaInput" size="15"><br>

</div>
</div>
<br><br>
<!-- END CAPTCHA -->
<input type="hidden" name="_token" class="form-control" value="<?php echo $_session['_token'];?>"/>
<input name="login" type="submit" id="login_btn" value="Login" onsubmit="return validate();"/><br>

<input type="hidden" name="_token" class="form-control" value="<?php echo $_session['_token'];?>"/>
<input name="admin" type="submit" id="admin_access" value="Login as Admin" onsubmit="return validate();"/><br>

<a href="register.php"><input type="button" id="register_btn" value="Register"/><br>
<!--<a href="admin.php">-->

</form>
<script type="text/javascript">

// Captcha Script

function checkform(theform){
var why = "";

if(theform.CaptchaInput.value == ""){
why += "- Please Enter CAPTCHA Code.\n";
}
if(theform.CaptchaInput.value != ""){
if(ValidCaptcha(theform.CaptchaInput.value) == false){
why += "- The CAPTCHA Code Does Not Match.\n";
}
}
if(why != ""){
alert(why);
return false;
}
}

var a = Math.ceil(Math.random() * 9)+ '';
var b = Math.ceil(Math.random() * 9)+ '';
var c = Math.ceil(Math.random() * 9)+ '';
var d = Math.ceil(Math.random() * 9)+ '';
var e = Math.ceil(Math.random() * 9)+ '';

var code = a + b + c + d + e;
document.getElementById("txtCaptcha").value = code;
document.getElementById("CaptchaDiv").innerHTML = code;

// Validate input against the generated number
function ValidCaptcha(){
var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
var str2 = removeSpaces(document.getElementById('CaptchaInput').value);
if (str1 == str2){
return true;
}else{
return false;
}
}

// Remove the spaces from the entered and generated code
function removeSpaces(string){
return string.split(' ').join('');
}
</script>

		
	
<?php 
//session_start();

if(isset($_POST['login']))
{//
$pass= mysqli_real_escape_string($con, $_POST['pass']);
$pass=strip_tags($pass);
$name= mysqli_real_escape_string($con, $_POST['name']);
$name=strip_tags($name);
 $_SESSION['uname']=$name;
if(isset($_POST['name']) && ($_POST['pass']))
{
	
$query1=$con->prepare("SELECT * from user where uname=(?)");
$query1->bind_param("s",$name);
$query1->execute();
$query1->store_result();
//$result = $con->query($query);
//var_dump($query1);


if ($query1->num_rows == 1) 
{
$query1->bind_result($uid,$ufname,$uname,$upass,$uemail,$imglink,$type);
$query1->fetch();
//echo "$uemail";
 
$_SESSION['uemail']=$uemail;
//$email=$row['uemail'];
  if(crypt($pass,$uemail)==$upass)
  {
	  
	 
    $_SESSION['logged_in']=TRUE;
    $_SESSION['id']=$uid;
    $_SESSION['uname']=$uname;
	//$query2="select imglink from user where uname='$name'";
	$result=$con->query($query2);
	//$row=mysqli_fetch_assoc($result);
	
	$_SESSION['imglink']=$imglink;
	$_SESSION['type']=$type;

    
    header("Location: homepage.php");
  }
   else
	  {//invalid
    print_r("Invalid User Credentials");
    }
  }
  else{ print_r("user doesn't exist");}
}
}

else if (isset($_POST['admin'])) 
	{

	if(isset($_POST['name']) && ($_POST['pass']))
{$pass=$_POST['pass'];
$query="SELECT * from admin where uname='chaitanya'";
$result = $con->query($query);
$row = $result->fetch_assoc();
	$_SESSION['uname']=$row['uname'];
	//$uname=$_SESSEION['uname'];
	$_SESSION['upass']=$row['upass'];
	//$upass=$_SESSEION['upass'];
	
	 
		if ($_SESSION['uname']=="chaitanya" && $_SESSION['upass']==crypt($pass,$_SESSION['uname'])) 
		{$_SESSION['admin']=$pass;
		header("Location:admin.php");
	}
	else{ echo "Invalid Admin Credentials";
}
}
	}

else{
}
?>
<script type="text/javascript">
	//input validation
	function validate(){

      
      
      var uname = document.getElementById('uname').value;
      var upass = document.getElementById('upass').value;
      
     
	 
		 if(username_validation(uname))
		 {
			 if(userpassword_validation(upass))
			 {
				 }
			 }
		 
	 return false;
	}
	
	function username_validation(uname)
      {
        var letters = /^[0-9A-Za-z]+$/;
       	if(uname.value.match(letters))
       	{
       		return true;
       	}
		else
       	{
       		alert('userName must have numbers and alphabet only');
       		ufname.focus();
       		return false;
       	}
      }
	  function userpassword_validation(upass)
      {
        var letters = /^[0-9A-Za-z@!$&*_]+$/;
       	if(upass.value.match(letters))
       	{
       		return true;
       	}
		else
       	{
       		alert('paswword must have numbers,alphabet,@*_&!');
       		upass.focus();
       		return false;
       	}
      }
	  </script>
</div>
</body>
</html>
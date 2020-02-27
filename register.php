<?php
require 'dbconfig/config.php';
$wrongpass = '';
$wronginfo = '<div class="alert alert-danger" role="alert">  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Wrong login detail</div>';
//include "csrf.php";
?>
<?php  header('X-Frame-Options: DENY'); ?>

<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>
<link rel="stylesheet" href="css/style.css">
<!--<link rel="stylesheet1" href="css/style1.css">-->

<script type="text/javascript">

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("imglink").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

</script>
</head>
<body style="background-color:#bdc3c7">
	
	<form class="myform" action="register.php" method="post" enctype="multipart/form-data"  onsubmit="return checkform(this);" onsubmit="return validate();">
		<div id="main-wrapper">
		<center>
			<h2>Registration Form</h2>
			<img id="uploadPreview" src="img/login.png" class="login"/><br>
			
			<input type="file" id="imglink" name="imglink" accept=".jpg,.jpeg,.png" onchange="PreviewImage();"/>
			<p>only JPEG,JPG,PNG</p>
		</center>
	
		<center>
			<label><b>Full Name:</b></label><br>
			<input name="fname" id="ufname" type="text" class="inputvalues" autocomplete="off" placeholder="Type your Full Name" pattern="[a-zA-Z]{6,20}" required/><br>
			<span id="fullname" </span>
			<p>can accept only aphabets min:6characters max:20characters</p>
			<label><b>Email:</b></label><br>
			<input name="email" id="uemail" type="email" class="inputvalues" autocomplete="off" placeholder="Your Email" pattern="[a-zA-Z0-9_.]+@[a-zA-Z0-9.-]+\.[a-z]{2,3}$" required/><br>
			<span id="useremail" </span>
			<p>can accept alphhabets,numbers,_,.,@</p>
			
			<label><b>Username:</b></label><br>
			<input name="name" id="uname" type="text" class="inputvalues" autocomplete="off" placeholder="Type your username" pattern="[a-zA-Z0-9@!]{6,20}" required/><br>
			<span id="username" </span>
			<p>can accept alphhabets,numbers,!,@ min:6characters max:20characters </p>
			<label><b>Password:</b></label><br>
			<input name="pass" id="upass" type="password" class="inputvalues" autocomplete="off" placeholder="Your password" pattern="[a-zA-Z0-9@!]{6,20}" onkeyup="checkPassword(this.value)" required/><br>
			<p>can accept alphhabets,numbers,!,@ min:6characters max:20characters </p>
			<progress value="0" max="100" id="strength" style="width: 230px"></progress>
			<span id="userpassword" </span>
			<label><b>Confirm Password:</b></label><br>
			<input name="cpass" id="ucpass" type="password" class="inputvalues" autocomplete="off" placeholder="Confirm password" pattern="[a-zA-Z0-9@!]{6,20}" required/><br>
			<span id="confimpassword" </span>
			
			
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

			<!--<input type="hidden" name="_token" class="form-control" value="<?php echo $_session['_token'];?>"/>-->
			<input name="submit_btn" type="submit" id="signup_btn" value="Sign Up" onsubmit="return validate()"/><br>
			<a href="index.php"><input type="button" id="back_btn" value="Back"/></a>
		</form></div>
		
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

		
	<script type="text/javascript">
	//input validation
	function validate(){

      var ufname = document.getElementById('ufname').value;
      var uemail = document.getElementById('uemail').value;
      var uname = document.getElementById('uname').value;
      var upass = document.getElementById('upass').value;
      var ucpass = document.getElementById('ucpass').value;
     
	 
	 if(fullname_validation(ufname))
	 {
		 if(username_validation(uname))
		 {
			 if(userpassword_validation(upass))
			 {
				 if(confirmpassword_validation(ucpass))
				 {
					 if(useremail_validation(uemail))
					 {
					 }
				 }
			 }
		 }
	 }
	 return false;
	}
	function fullname_validation(ufname)
      {
        var letters = /^[A-Za-z]+$/;
       	if(ufname.value.match(letters))
       	{
       		return true;
       	}
		else
       	{
       		alert('Name must have alphabet only');
       		ufname.focus();
       		return false;
       	}
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
	  
	  function confirmpassword_validation(ucpass)
      {
        var letters = /^[0-9A-Za-z@!$&*_]+$/;
       	if(ucpass.value.match(letters))
       	{
       		return true;
       	}
		else
       	{
       		alert('paswword must have numbers,alphabet,@*_&!');
       		cpass.focus();
       		return false;
       	}
      }
	
	  function useremail_validation(uemail)
      {
      	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
       	if(uemail.value.match(mailformat))
       	{
       		return true;
       	}
       	else
       	{
       		alert("you have entered an invalid email address!");
       	    uemail.focus();
       	    return false;
       }
       	}
	  
      





    
	
	
</script>
		
		<?php
    if(isset($_POST['name']) && trim($_POST['pass']) != "")
	{
		$name= mysqli_real_escape_string($con, $_POST['name']);
		//$name=strip_tags($name);
		// prepare and bind
//$stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
		$query="SELECT * from user where uname='$name'";
		$result = $con->query($query);
		//$result=strip_tags($result);
		//var_dump(($result->num_rows));
			if($result->num_rows > 0)
					{
						// there is already a user with the same username
						echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
					}
			if ($result->num_rows < 1)
			{
				$ufname=mysqli_real_escape_string($con, $_POST['fname']);
				$ufname=strip_tags($ufname);
				$uname = mysqli_real_escape_string($con, $_POST['name']);
				$uname = strip_tags($uname);
				$uemail = mysqli_real_escape_string($con, $_POST['email']);
				$uemail = strip_tags($uemail);
				$upass = mysqli_real_escape_string($con, $_POST['pass']);
				$upass = strip_tags($upass);
				$cpass = mysqli_real_escape_string($con, $_POST['cpass']);
				$cpass = strip_tags($cpass);
				$img_name = $_FILES['imglink']['name'];
				$img_size =$_FILES['imglink']['size'];
			    $img_tmp =$_FILES['imglink']['tmp_name'];
				
				$directory = 'uploads/';
				$target_file = $directory.$img_name;
				
				if($upass==$cpass)
				{
					$upass = crypt($upass,$uemail);
					
					$uname = strip_tags($uname);
					$uemail = strip_tags($uemail);
					$target_file = strip_tags($directory.$img_name);
					$upass = strip_tags($upass);

						
					$sql = $con->prepare("INSERT INTO user (ufname,uname,upass,uemail,imglink)
					VALUES (?,?,?,?,?)");
					$sql->bind_param("sssss",$ufname,$uname,$upass,$uemail,$target_file);
					
					
					
					$check = $sql->execute();
					
					
					if ($check === TRUE) 
					{
						$sqlinc=$con->prepare("INSERT INTO income (uname) VALUES(?)");
						$sqlinc->bind_param("s",$uname);
						$sqlinc->execute();
						$sqlinc->close();
						
					echo '<div class="alert alert-success" role="alert">
					<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Your account has been created successfully!
					</div>';
					}	
					else 
					{
					echo "Error: " . $check . "<br>" . $con->error;
					}
				}
				else
				{
					echo '<script type="text/javascript"> alert("Password and confirm password does not match!")</script>';	
				}
			
					
					
			
				
				$sql->close();	
					
	}	}
?>
</body>
</html>
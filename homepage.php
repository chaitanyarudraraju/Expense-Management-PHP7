<?php
require "dbconfig/config.php";
//require 'index.php';
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
<h2>Home Page</h2>
<h3>Welcome <?php echo $_SESSION['uname'] ?></h3>
<?php echo '<img class="login" src="'.$_SESSION['imglink'].'">'?><br>
</center>




	<form class="tincome" enctype="multipart/form-data" action="homepage.php" method="post">
	<div>
			<label><b>ADD TODAY'S INCOME:</b></label><br>
			<input name="tincome" type="number"  class="inputvalues" placeholder="Enter Your Today's Income"><br>
			<input name="isubmit" type="submit" id="iesubmit_btn" value="ADD INCOME"/><br>
			
			<label><b>ADD TODAY'S EXPENSE</b></label><br>
			<input name="texpense" type="number" type="submit" value="submit" class="inputvalues" placeholder="Enter your Today's expense"><br>
			<input name="esubmit" type="submit" id="iesubmit_btn" value="ADD EXPENSE"/><br>
			
			<div><label><b>Enter Today's Date</b></label><br>
			<input name="date" type="date" type="submit" class="inputvalues" placeholder="Enter Today's Date" required><br>
			</div>
			
			
			
			
			<centre><input name="iesubmit" type="submit" id="iesubmit_btn" value="Submit"/><br></centre>
			<input type="button" id="back_btn" value="Back"/></a>
			
			
			<centre><label><b><label><b>click view data to view your EXPENSE and income of all the date's you entered</b></label><br>
			<a href="view1.php"><input name="view" type="button" id="view_btn" value="view data"/></a></centre>
			

</div>
</form>
<form action="logout.php" method="post">
<input name="logout" type="submit" id="logout_btn" value="Log Out"/><br></a>
</form>
<?php
 //$_SESSION['uname']=$name;
if(isset($_POST['isubmit']))
{	
	$uname=$_SESSION['uname'];
	$date=$_POST['date'];
	$income=$_POST['tincome'];
	$total=$income;
$sql = $con->prepare("insert into income (uname,income,date,balance) values (?,?,?,?)");	
$sql->bind_param("sdsd",$uname,$income,$date,$total);
$sql->execute();
}
else if(isset($_POST['esubmit']))
{
	$uname=$_SESSION['uname'];
	$date=$_POST['date'];
	$expense=$_POST['texpense'];
	$total=-$expense;
$sql = $con->prepare("insert into income (uname,expense,date,balance) values (?,?,?,?)");	
$sql->bind_param("sdsd",$uname,$expense,$date,$total);
$sql->execute();
}
else if(isset($_POST['iesubmit']))
{
	$uname=$_SESSION['uname'];
	//print_r($uname);
	$date=$_POST['date'];
	$income=$_POST['tincome'];
	$expense=$_POST['texpense'];
	$total=$income-$expense;
$sql = $con->prepare("insert into income (uname,income,expense,date,balance) values (?,?,?,?,?)");	
$sql->bind_param("sddsd",$uname,$income,$expense,$date,$total);
$sql->execute();
}
else{
	echo "you are welcome to add your expenses and incomes";
}
?>
			
</div>
</body>
</html>
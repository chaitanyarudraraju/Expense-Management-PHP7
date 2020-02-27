<html>

<center>
<input type="hidden" name="_token" class="form-control" value="<?php echo $_session['_token'];?>"/>
<a href="index.php"><input type="button" id="back_btn" value="Back"/></a>
<table class="table table-hover table-striped table-bordered ">
   <caption><h4><span class="glyphicon glyphicon-leaf" ></span> list of users</h4></caption>
<tr class="info"><th>uid</th> <th> Fullname  </th><th> username </th><th> user email </th></tr>

<h1>Admin</h1>
<p>Admin Page</p>
<?php
header('X-Frame-Options: DENY');
require "dbconfig/config.php";
$query="SELECT * from user";
$result = $con->query($query);
//$uid=$row['uid'];
	


 while($row = $result->fetch_assoc()) 
    
    {
        //$exdate = $row["date"];
       // $exdate = date('y-m-d', $exdate);
        
       echo "<tr>
	   <td> " . $row["uid"]. "</td> <td> "
	   . $row["ufname"]. " </td><td> " 
	   . $row["uname"]. "</td> <td>"
		.$row["uemail"]."
	   <span class='glyphicon glyphicon-remove white' aria-hidden='true'></span>
	   </td></tr>";
        //$inctotal+=$row["balance"];
  }

?>
<form action="logoutadmin.php" method="post">
<input name="logouta" type="submit" id="logout_btna" value="Log Out"/><br></a>
</form>
</center>

</html>
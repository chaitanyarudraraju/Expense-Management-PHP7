<center>
<input type="hidden" name="_token" class="form-control" value="<?php echo $_session['_token'];?>"/>
<a href="homepage.php"><input type="button" id="back_btn" value="Back"/></a>
<table class="table table-hover table-striped table-bordered ">
   <caption><h4><span class="glyphicon glyphicon-leaf" ></span> Daily Income and expense report</h4></caption>
<tr class="info"><th>Date</th> <th> Income  </th><th> Expense </th><th> Balance </th></tr>

<?php 
include_once("dbconfig/config.php");
//require "homepage.php";
include "csrf.php";
//session_start();
 

$uname=$_SESSION['uname'];
//var_dump($uname);
$query="SELECT * from income where uname='$uname'";
$result = $con->query($query);
$inctotal=0;
if ($result->num_rows >0)
{//var_dump($result);	


 while($row = $result->fetch_assoc()) 
    //while($row = mysqli_fetch_assoc($resulti))
    {
        $exdate = $row["date"];
       // $exdate = date('y-m-d', $exdate);
        
       echo "<tr>
	   <td> " . $exdate. "</td> <td> "
	   . $row["income"]. " </td><td> " 
	   . $row["expense"]. "</td> <td>"
		.$row["balance"]."
	   <span class='glyphicon glyphicon-remove white' aria-hidden='true'></span>
	   </td></tr>";
        $inctotal+=$row["balance"];
  }
}


?>
</table></center>
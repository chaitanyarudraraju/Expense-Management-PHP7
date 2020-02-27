<?php
if(isset($_POST['email']) && ($_POST['pass']))
{

$pass= mysqli_real_escape_string($conn, $_POST['pass']);
$email= mysqli_real_escape_string($conn, $_POST['email']);
$query="SELECT * from users where uemail='$email'";
$result = $conn->query($query);

if ($result->num_rows < 1) 
  {
      $wrongpass = $wronginfo;
  }

 while($row = $result->fetch_assoc()) 
    {
  if(md5($pass)==$row['upass'])
  {
    $_SESSION['logged_in']=TRUE;
    $_SESSION['id']=$row['uid'];
    $_SESSION['unaam']=$row['uname'];
    session_start();
    header("location:home.php");
  }
  else
   {
    $wrongpass = $wronginfo;
   }
    }
  }
?>
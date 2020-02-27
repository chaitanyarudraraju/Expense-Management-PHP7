<?php header('X-Frame-Options: DENY'); ?>
<?php
include "dbconfig/config.php";
if(isset($_POST['logout']))
{
session_start()	;

session_unset($_SESSION['uname']);
session_destroy();
header('location:index.php');


}
?>


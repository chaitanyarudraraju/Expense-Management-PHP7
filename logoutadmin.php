<?php header('X-Frame-Options: DENY'); ?>

<?php 
include "dbconfig/config.php";

if(isset($_POST['logouta']))
{
	session_start()	;
session_unset($_SESSION['admin']);

session_destroy();
header('location:index.php');

}
?>
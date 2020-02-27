<?php
require 'dbconfig/config.php';

function admin_protect()
{
	
	if($_SESSION['type']==0)
	{
		header('Location: index.php');
		exit();
	}


}
?>
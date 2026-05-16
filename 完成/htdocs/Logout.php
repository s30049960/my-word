<?php
	session_start();
	unset($_SESSION["sessionusername"]);
	
	header("Location:index.php");
?>
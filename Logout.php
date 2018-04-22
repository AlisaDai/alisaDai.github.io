<?php
	session_start();
	$_SESSION = array();
	
	session_destroy();
	echo '<a href="PersonalApp.php">Go Back!</a>';
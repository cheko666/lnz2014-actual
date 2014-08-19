<?php
	session_start();
	session_destroy();
	$_SESSION['MM_Logeado'] = 0;
	header('Location: login_admin.php');
	exit(0);
?>
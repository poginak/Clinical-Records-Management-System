<?php
	include('config.php');
	
	session_start();

	$username = $_SESSION['uname'];

	$sql_check = mysqli_query($conn, "SELECT * FROM accounts WHERE UserName = '$username'");
	$row_check = mysqli_fetch_array($sql_check);
	$login_profile = $row_check['Image'];
	$login_email = $row_check['EmailAd'];

	$acctname = $row_check["AcctName"];

	if(!isset($username)){
		header("Location: login.php");
	}
?>
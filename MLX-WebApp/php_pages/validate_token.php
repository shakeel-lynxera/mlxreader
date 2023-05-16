<?php

	require 'connection.php';
	$token = $_GET['token'];
	if($token == ""){
		header("location:login.php");
	}
	$myQuery = "SELECT * from users where token = '$token'";
	$exe = mysqli_query($connect, $myQuery);
	$row = mysqli_num_rows($exe);
	if($row<1){
		header("location:login.php");
	}

?>
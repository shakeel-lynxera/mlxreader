<?php

session_start();
 if($_SESSION){
    header('location:list.php');
 }
require 'connection.php';
if(isset($_POST['loginSubmit'])){
	$email = $_POST['inputEmail'];
	$password = $_POST['inputPassword'];
	$password = md5($password);


	$query = "select * from users where email = '$email' and password = '$password'";
	$exeQuery = mysqli_query($connect, $query);
	$countRow = mysqli_num_rows($exeQuery);
	if($countRow>0){
		$row = mysqli_fetch_assoc($exeQuery);
		$_SESSION['userId'] = $row['id'];
		$_SESSION['userName'] = $row['name'];
		header('location:list.php');
	}
	else{
		echo "<script>alert('Invalid Credentials')</script>";
	}
}

?>
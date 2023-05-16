<?php

require 'connection.php';
if(isset($_POST['sendLink'])){
	$email = $_POST['inputEmail'];

	$query = "select * from users where email = '$email'";
	$exeQuery = mysqli_query($connect, $query);
	$countRow = mysqli_num_rows($exeQuery);
	if($countRow>0){
		$row = mysqli_fetch_assoc($exeQuery);
		$token = $row['token'];
		$subject = "Password Reset";
		$body = "Hi there". $row['name']."Click on link to reset your password http://localhost/epub/reset_password.php?token=$token";
		$sender_email = "From: itxme4all@gmail.com";
		if(mail($email, $subject, $body, $sender_email)){
			header("location:login.php");
		}
		else{
			echo "error email sending";
		}
	}

	else{
		echo "<script>alert('Invalid Mail')</script>";
	}
}

?>
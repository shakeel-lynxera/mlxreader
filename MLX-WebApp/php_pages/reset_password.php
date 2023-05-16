<?php

if(isset($_POST['resetSubmit'])){
	$newPassword = $_POST['inputPassword'];
	$newPassword = md5($newPassword);

	$myQuery = "UPDATE users SET password='$newPassword' WHERE token='$token'";
	$exe = mysqli_query($connect, $myQuery);
	if($exe){
		header("location:login.php");
	}

}

?>
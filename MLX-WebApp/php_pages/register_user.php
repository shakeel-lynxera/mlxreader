<?php

require 'connection.php';
if(isset($_POST['registerSubmit'])){
  $username = $_POST['inputName'];;
  $email = $_POST['inputEmail'];
  $phone = $_POST['inputNumber'];
  $password = $_POST['inputPassword'];

  $myQuery = "select * from users where email = '$email'";
  $runQuery = mysqli_query($connect, $myQuery);
  $row = mysqli_num_rows($runQuery);
  if($row > 0){
  	echo "<script> alert('Email already exits') </script>";
  	return;
  }
  else{
  	$username = trim($username);
	$username = stripslashes($username);
	$username = htmlspecialchars($username);

	$email = $_POST["inputEmail"];
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  $emailErr = "Invalid email format";
	  echo "<script>alert($emailErr)</script>";
	}

	$password = md5($password);

	$inEpub = "insert into users (name, email, phone, password) values ('$username', '$email','$phone', '$password')";
	if(mysqli_query($connect, $inEpub)){
	  header('location:login.php');
	}
	else{
	   //echo "data not sent";
	}
  }
}

?>
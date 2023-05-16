<?php

require 'connection.php';

if($_GET['del_name'] != ""){
	$del_name = $_GET['del_name']; 
	$query = "SELECT * FROM epub_table WHERE name = '".$del_name."'";
	if($query){
		$exe = mysqli_query($connect, $query);
		$row = mysqli_fetch_assoc($exe);
		$bookName = $row['name'];
		$imgName = $row['cover_image'];

		mysqli_query($connect,"DELETE FROM epub_table WHERE name='".$del_name."'");
		unlink("../assets/epub/".$bookName);
		unlink("../assets/cover_images/".$imgName);
		header('location:../list.php');
	}
	else{
		header('location:../list.php');	
	}
	
}
else{
	header('location:../list.php');
}

?>
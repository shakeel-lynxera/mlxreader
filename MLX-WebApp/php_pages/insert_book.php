<?php



	require 'connection.php';
  if(isset($_POST['submit']))
  {
  	  $title = $_POST['title'];
      $userId = $_POST['user_id'];
	    $target_dic="assets/epub/";
      $fileName = $_FILES['file']['name'];
      $fileTmp = $_FILES['file']['tmp_name'];
      $fileError = $_FILES['file']['error'];
      $fileSize = $_FILES['file']['size'];
      $fileExtention = explode(".", $fileName);
      $fileOrignalExtention = strtolower(end($fileExtention));
      $allowExtention = array('epub');
      if(in_array($fileOrignalExtention, $allowExtention))
      {
        if($fileSize < 100000000)
        {
          if($fileError === 0)
          {
            $fileNewName = uniqid(" ", true).".".$fileOrignalExtention;  
          }
          else
          {
            echo "<script> alert('Error while uploading book'); </script>";
            return;
            
          }
        }
        else
        {
          echo "<script> alert('Book is to long in size'); </script>";
          return;
        }
      }
      else
      {
        echo "<script> alert('Book extention does not match'); </script>";
        return;
      }
        move_uploaded_file($fileTmp, $target_dic.$fileNewName);


      //Cover Picture Upload
      $target_dic="assets/cover_images/";
      $fileName = $_FILES['cover']['name'];
      $fileTmp = $_FILES['cover']['tmp_name'];
      $fileError = $_FILES['cover']['error'];
      $fileSize = $_FILES['cover']['size'];
      $fileExtention = explode(".", $fileName);
      $fileOrignalExtention = strtolower(end($fileExtention));
      $allowExtention = array('jpg', 'png', 'jpeg');;
      if(in_array($fileOrignalExtention, $allowExtention))
      {
        if($fileSize < 100000000)
        {
          if($fileError === 0)
          {
            $fileNewName2 = uniqid(" ", true).".".$fileOrignalExtention;  
          }
          else
          {
           echo "<script> alert('Error while uploading Cover Image'); </script>";
            return; 
          }
        }
        else
        {
          echo "<script> alert('Cover Image is to long in size'); </script>";
          return;
        }
      }
      else
      {
        echo "<script> alert('Image extention does not match'); </script>";
        return;
      }


      move_uploaded_file($fileTmp, $target_dic.$fileNewName2);




    	$inEpub = "insert into epub_table (name, user_id ,cover_image, title) values ('$fileNewName', '$userId','$fileNewName2','$title')";
    	if(mysqli_query($connect, $inEpub)){
    	   //echo "data sent";
    	}
    	else{
    	   //echo "data not sent";
      }

    }

?>
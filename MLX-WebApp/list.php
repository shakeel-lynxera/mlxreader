<?php

 session_start();
 if(!$_SESSION['userId']){
    header('location:login.php');
 }
$i=0;

 include "php_pages/insert_book.php";
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>List of Books</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Barlow Semi Condensed' rel='stylesheet'>


<script>

var elem = document.documentElement;

$(document).ready(function(){

    $("#grid-view").show();
    $("#list-view").hide();
    $("#grid-btn").hide();
    $(".book_titles").hide();
//Delete
    $(".delete_buttons").hide();    

    $("#compress-icon").hide();
//Search Input
    $("#span_search").hide();


    $("#filter_icon").click(function(){

          $("#span_search").show();
          $("#filter_icon").hide();

    });

      $("#grid-btn").click(function(){
        $("#grid-view").show();
        $("#list-view").hide();
        $("#grid-btn").hide();
        $("#list-btn").show();
    });

        $("#delete_books").click(function(){
        $(".delete_buttons").toggle();
    });


    $("#list-btn").click(function(){
        $("#list-view").show();
        $("#grid-view").hide();
        $("#list-btn").hide();
        $("#grid-btn").show();

    });

      $("#expand-icon").click(function(){
        $("#compress-icon").show();
        $("#nav-bar").hide();
        if (elem.requestFullscreen) {
              elem.requestFullscreen();
            } else if (elem.webkitRequestFullscreen) { /* Safari */
              elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) { /* IE11 */
              elem.msRequestFullscreen();
          }
    });

    $("#compress-icon").click(function(){
        $("#compress-icon").hide();
        $("#nav-bar").show();
         if (document.exitFullscreen) {
              document.exitFullscreen();
            } else if (document.webkitExitFullscreen) { /* Safari */
              document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) { /* IE11 */
              document.msExitFullscreen();
          }
    });

//Filter Table
$(document).ready(function(){
  $("#input_search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#gridTable tr td").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});



});




</script>


<style>
  
  .cad-horizontal {
    display: flex;
    flex: 1 1 auto;
}

body {
    font-family: 'Barlow Semi Condensed';font-size: 18px;
}




</style>

</head>
<body style="background: #a3a3c2;">

<span id="compress-icon" style="padding: 10px; margin-right: 10px; position: fixed; top: 0; right: 0;">
    <svg xmlns="http://www.w3.org/2000/svg" style="color:white; height: 35px; width: 35px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize-2">
      <polyline points="4 14 10 14 10 20"></polyline>
      <polyline points="20 10 14 10 14 4"></polyline>
      <line x1="14" y1="10" x2="21" y2="3"></line>
      <line x1="3" y1="21" x2="10" y2="14"></line>
    </svg>
</span>


<!-- Book insert Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
          Book Title: <input type="text" name='title' /><br><br>
          Select Book: <input type="file" name='file' /><br><br>
          Select Cover Image: <input type="file" name='cover' /><br><br>
      </div>
          <input hidden value="<?php echo $_SESSION['userId']; ?>" type="text" name='user_id' /><br><br>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn" style="background: #4E6586; color: white;" type="submit" name="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>




<nav id="nav-bar" class="navbar navbar-expand-lg navbar-light bg-white">
  <a class="navbar-brand" href="#"><img src="assets/images/mlx-logo-blue.png"/ height="50px" width="100px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
          <span id="grid-btn" aria-hidden="true" style="padding:10px;">
            <svg xmlns="http://www.w3.org/2000/svg" style="color:#4E6586; height: 35px; width: 35px;" viewBox="0 0 24 24" fill="none" stroke="currentColor"   stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
              <rect x="3" y="3" width="7" height="7"></rect>
              <rect x="14" y="3" width="7" height="7"></rect>
              <rect x="14" y="14" width="7" height="7"></rect>
              <rect x="3" y="14" width="7" height="7"></rect>
            </svg>
          </span>
          <span id="list-btn" style="padding: 10px;">
            <svg xmlns="http://www.w3.org/2000/svg" style="color:#4E6586; height: 35px; width: 35px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify">
              <line x1="21" y1="10" x2="3" y2="10"></line>
              <line x1="21" y1="6" x2="3" y2="6"></line>
              <line x1="21" y1="14" x2="3" y2="14"></line>
              <line x1="21" y1="18" x2="3" y2="18"></line>
            </svg>
          </span>
          <span data-toggle="modal" data-target="#exampleModalLong" style="padding: 10px;">
              <svg xmlns="http://www.w3.org/2000/svg" style="color:#4E6586; height: 35px; width: 35px;"  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                <polyline points="14 2 14 8 20 8"></polyline>
                <line x1="12" y1="18" x2="12" y2="12"></line>
                <line x1="9" y1="15" x2="15" y2="15"></line>
              </svg>
          </span>
          <span id="delete_books" style="padding: 10px;">
            <svg xmlns="http://www.w3.org/2000/svg" style="color:#4E6586; height: 35px; width: 35px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
              <polyline points="3 6 5 6 21 6"></polyline>
              <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
              <line x1="10" y1="11" x2="10" y2="17"></line>
              <line x1="14" y1="11" x2="14" y2="17"></line>
            </svg>
          </span>
      </li>
      <li class="nav-item active">
        
      </li>
    </ul>
    <div>
          <input type="text" class="form-control" name="input_search" id="input_search">
    </div>
    <span id="" style="font-size: 30px; padding: 10px; color:#4E6586;">
          <a href="php_pages/logout.php" >
              <i style="color: #4E6586;" class="fa fa-sign-out" aria-hidden="true"></i>
          </a>
    </span>
    <span id="expand-icon" style="padding: 10px;">
        <svg xmlns="http://www.w3.org/2000/svg" style="color:#4E6586; height: 35px; width: 35px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize-2">
            <polyline points="15 3 21 3 21 9"></polyline>
            <polyline points="9 21 3 21 3 15"></polyline>
            <line x1="21" y1="3" x2="14" y2="10"></line>
            <line x1="3" y1="21" x2="10" y2="14"></line>
        </svg>
    </span>
  </div>
</nav>




<!-- Grid View -->
<div id="grid-view" class="container text-center">                                                                                
  <div class="table-responsive">     
  <table class="table " id="gridTable">
    <tbody>
      <tr>
        <?php 
              $getData = "select * from epub_table where user_id = '$_SESSION[userId]'";
              $exeData = mysqli_query($connect, $getData);
              while($row = mysqli_fetch_assoc($exeData)){
                $i++;
            ?>
            <td>
                <div>
                <a href="index.php?id=<?php echo $row['name']; ?>">
                  <img class="img-responsive" src="assets/cover_images/<?php echo $row['cover_image']; ?>" style="max-width:100%;height:350px;" />
                </a>
                  <p class="book_titles"><?php echo $row['title']; ?></p>
                <div class="delete_buttons">
                  <a href="php_pages/delete_books.php?del_name=<?php echo $row['name']; ?>">
                    <span align="center">
                      <button style="width: 100%;" type="submit" class="btn btn-danger">DELETE</button>
                    </span>
                  </a>
                </div>
              </div>
            </td>
              <?php 

              if($i==4){
                echo "</tr><tr>";
                $i=0;
              }

                  }
              
              ?>
      </tr>
            <tr>

        <?php 
              $i=0;
              $getAdminBooks = "SELECT * FROM domin_epub_files";
              $exeAdminBooks = mysqli_query($connect, $getAdminBooks);
              while($row = mysqli_fetch_assoc($exeAdminBooks)){
                $i++;
            ?>
            <td>
              <div class="">
                <div class="">
                <a href="index.php?id=<?php echo $row['file_name']; ?>">
                  <img class="img-responsive" src="assets/cover_images/<?php echo $row['cover_image']; ?>" style="max-width:250px;height:350px;" />
                  </a>
                </div>
              </div>
            </td>
              <?php 

              if($i==4){
                echo "</tr><tr>";
                $i=0;
              }

                  }
              
              ?>
      </tr>
    </tbody>
  </table>

  </div>
  </div>




<!-- List View  -->
<div id="list-view" class="container">                                                                            
  <div class="row">          
    <ul class="list-group">
      <?php 
            $exeData = mysqli_query($connect, $getData);
            while($row = mysqli_fetch_assoc($exeData)){
            ?>
      <li class="list-group-item"  style="width: 1100px;">

        <div class="container-fluid">
          <div class="row">
              <div class="col-12 mt-3">
                  <div class="card">
                      <div class="card-horizontal">
                          <div class="img-square-wrapper">
                            <a href="index.php?id=<?php echo 'assets/epub_books/'.$row['name']; ?>">
                              <img style="max-width:250px;height:350px;" src="assets/cover_images/<?php echo $row['cover_image']; ?>" alt="<?php echo $row['title'];?>">
                            </a>
                            <div class="delete_buttons">
                              <a href="php_pages/delete_books.php?del_name=<?php echo $row['name']; ?>">
                                <span align="center">
                                  <button style="width: 24.5%;" type="submit" class="btn btn-danger">DELETE</button>
                                </span>
                              </a>
                            </div>

                          </div>
                          <div class="card-body" style="margin-left: 10px;">
                              <h4 class="card-title"><?php echo $row['title'];?></h4>
                          </div>
                          
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </li>
    <?php } ?>

        <ul class="list-group">
      <?php 
            $exeAdminBooks = mysqli_query($connect, $getAdminBooks);
            while($row = mysqli_fetch_assoc($exeAdminBooks)){
            ?>
      <li class="list-group-item"  style="width: 1100px;">

        <div class="container-fluid">
          <div class="row">
              <div class="col-12 mt-3">
                  <div class="card">
                      <div class="card-horizontal">
                          <div class="img-square-wrapper">
                            <a href="index.php?id=<?php echo $row['file_name']; ?>">
                              <img style="max-width:250px;height:350px;" src="assets//cover_images/<?php echo $row['cover_image']; ?>" alt="<?php echo $row['title'];?>">
                            </a>
                          </div>
                          <div class="card-body" style="margin-left: 10px;">
                              <h4 class="card-title"><?php echo $row['title'];?></h4>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </li>
    <?php } ?>
    </ul>


    </ul>
  </div>
</div>







</body>
</html>
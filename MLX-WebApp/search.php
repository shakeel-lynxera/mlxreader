<?php

 session_start();
 if(!$_SESSION['userId']){
    header('location:login.php');
 }
$i=0;

 include "php_pages/connection.php";
 $searchData = $_POST['input_search'];
 $query = "SELECT * FROM epub_table WHERE title LIKE '$searchData%'";
 $exe = mysqli_query($connect, $query);

  $query2 = "SELECT * FROM domin_epub_files WHERE title LIKE '$searchData%'";
 $exe2 = mysqli_query($connect, $query2);

$row1 =  mysqli_num_rows($exe);
$row2 = mysqli_num_rows($exe2);

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


<script>

$(document).ready(function(){

    $("#grid-view").show();
    $("#list-view").hide();
//Grid
    $(".checkButtons").hide();
    $("#deleteButton").hide();    
//List
    $(".listCheckButtons").hide();
    $("#listDeleteButton").hide();
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
});

    $("#delete_books").click(function(){
    $(".checkButtons").toggle();
    $("#deleteButton").toggle();
    $(".listCheckButtons").toggle();
    $("#listDeleteButton").toggle();
});


$("#list-btn").click(function(){
    $("#list-view").show();
    $("#grid-view").hide();

});

  $("#expand-icon").click(function(){
    $("#compress-icon").show();
    $("#nav-bar").hide();
});

$("#compress-icon").click(function(){
    $("#compress-icon").hide();
    $("#nav-bar").show();
});

});

$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});


</script>


<style>
  
  .cad-horizontal {
    display: flex;
    flex: 1 1 auto;
}




</style>

</head>
<body style="background: #a3a3c2;">


<?php

  if($row1<1 && $row2<1){
    echo "<h1>No results found</h1>";
  }

?>


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
          <input value="<?php echo $_SESSION['userId']; ?>" type="text" name='user_id' /><br><br>
          Book Title: <input type="text" name='title' /><br><br>
          Select Book: <input type="file" name='file' /><br><br>
          Select Cover Image: <input type="file" name='cover' /><br><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="submit" name="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- navigation -->



<!-- Grid View -->
<div id="grid-view" class="container text-center">                                                                                
  <div class="table-responsive">   
  <table class="table " id="gridTable">
    <tbody>
      <tr>
        <?php 
              while($row = mysqli_fetch_assoc($exe)){
                $i++;
            ?>
            <td>
              <div class="">
                <div class="">
                <a href="index.php?id=<?php echo $row['name']; ?>">
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
          <?php 
              while($row = mysqli_fetch_assoc($exe2)){
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
                            <a href="index.php?id=<?php echo $row['name']; ?>">
                              <img style="max-width:250px;height:350px;" src="assets/cover_images/<?php echo $row['cover_image']; ?>" alt="<?php echo $row['title'];?>">
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

      <ul class="list-group">
      <?php 
            while($row = mysqli_fetch_assoc($exe2)){
            ?>
      <li class="list-group-item"  style="width: 1100px;">

        <div class="container-fluid">
          <div class="row">
              <div class="col-12 mt-3">
                  <div class="card">
                      <div class="card-horizontal">
                          <div class="img-square-wrapper">
                            <a href="index.php?id=<?php echo $row['name']; ?>">
                              <img style="max-width:250px;height:350px;" src="assets/cover_images/<?php echo $row['cover_image']; ?>" alt="<?php echo $row['title'];?>">
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
  </div>
</div>
</body>
</html>
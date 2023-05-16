<?php

require 'php_pages/register_user.php';
 session_start();
 if($_SESSION){
    header('location:list.php');
 }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Registeration</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link href='https://fonts.googleapis.com/css?family=Barlow Semi Condensed' rel='stylesheet'>

        <style>
          body {
                  font-family: 'Barlow Semi Condensed';font-size: 18px;
              }
        </style>

        <script>
          function validateUsername(){
                var TCode = document.getElementById('username').value;

                if( /[^a-zA-Z0-9\-\/]/.test( TCode ) ) {
                    alert('Input is not alphanumeric');
                    document.getElementById('username').value = "";
                    return false;
                }

                return true;     
            }
        </script>


    </head>
    <body>
        
        <div class="container">
            <div class="row">
              <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                  <div class="card-body">
                    <h5 class="card-title text-center">Register yourself</h5>
                    <form class="form-signin" action="" method="post">
                      
                      <div class="form-label-group">
                        <input type="text" name="inputName" class="form-control" onkeyup="validateUsername()" id="username" placeholder="Full name" required autofocus>
                        <label for="inputName">Full Name</label>
                      </div>
                      <br>

                      <div class="form-label-group">
                        <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                        <label for="inputEmail">Email address</label>
                      </div>
                      <br>

                      <div class="form-label-group">
                        <input type="number" name="inputNumber" class="form-control" placeholder="Phone Number" required autofocus>
                        <label for="inputNumber">Phone Number</label>
                      </div>
                      <br>

                      <div class="form-label-group">
                        <input type="text" name="inputPassword" class="form-control" placeholder="Password" required>
                        <label for="inputPassword">Password</label>
                      </div>
                      <br>

                      <button style="background: #4E6586; color: white;" class="btn btn-block text-uppercase" name="registerSubmit" type="submit">Register</button>
                      <a href="login.php">Already have an account? Login here</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>

    </body>
</html>
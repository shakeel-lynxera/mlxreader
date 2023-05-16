<?php
 include 'php_pages/check_login.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sample Reader</title>
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
          function validateAddress(){
                var TCode = document.getElementById('email').value;

                if( /[^a-zA-Z0-9\-\/]/.test( TCode ) ) {
                    alert('Input is not alphanumeric');
                    document.getElementById('email').value = "";
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
                    <h5 class="card-title text-center">Sign In</h5>
                    <form class="form-signin" action="" method="post">
                      <div class="form-label-group">
                        <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                        <label for="inputEmail">Email address</label>
                      </div>
                      <br>

                      <div class="form-label-group">
                        <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
                        <label for="inputPassword">Password</label>
                      </div>
                      <br>
                      <button style="background: #4E6586; color: white;" class="btn btn-block text-uppercase" name="loginSubmit" type="submit">Sign in</button>
                      <a href="forgot_password.php">Forgot Password!</a><br>
                      <a href="register.php">Don't have account? Register here</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>

    </body>
</html>
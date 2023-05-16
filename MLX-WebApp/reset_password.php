<?php

	require 'php_pages/validate_token.php';
	require 'php_pages/reset_password.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Reset Password</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link href='https://fonts.googleapis.com/css?family=Barlow Semi Condensed' rel='stylesheet'>

        <style>
          body {
                  font-family: 'Barlow Semi Condensed';font-size: 18px;
              }
        </style>
    </head>
    <body>
        
        <div class="container">
            <div class="row">
              <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                  <div class="card-body">
                    <h5 class="card-title text-center">New Password</h5>
                    <form class="form-signin" action="" method="post">

                      <div class="form-label-group">
                        <input type="text" name="inputPassword" class="form-control" placeholder="New Password" required>
                        <label for="inputPassword">Password</label>
                      </div>
                      <br>

                      <button class="btn btn-primary btn-block text-uppercase" name="resetSubmit" type="submit">Reset Password</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>

    </body>
</html>
<?php
 include 'php_pages/send_link_to_email.php';

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

    </head>
    <body>
        
        <div class="container">
            <div class="row">
              <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                  <div class="card-body">
                    <h5 class="card-title text-center">Forgot Password</h5>
                    <form class="form-signin" action="" method="post">
                      <div class="form-label-group">
                        <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                      </div><br>
                      <button style="background: #4E6586; color: white;" class="btn btn-block text-uppercase" name="sendLink" type="submit">Send Link</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>

    </body>
</html>
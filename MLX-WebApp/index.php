<?php

session_start();
 if(!$_SESSION){
    header('location:login.php');
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sample Reader</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/TreineticEpubReader.css"/>
    <script type="text/javascript" src="js/TreineticEpubReader.js"></script>
    <link rel="stylesheet" href="css/style.css"/>
    <script type="text/javascript" src="js/mainJS.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

       <script>

        var elem = document.documentElement;

        
       function myFtn(){
        var epubName = document.getElementById('epubName').value;
        //alert(epubName);
        letNameToFtn(epubName);
        var myScreenHeight = screen.height;
        if(myScreenHeight>700 && myScreenHeight<800){
            myScreenHeight = 550;
        }
        document.getElementById("app-container").style.height = (myScreenHeight)+"px";
        // alert(myScreenHeight);
       } 

       $(document).ready(function(){

            $("#compress-icon").hide();

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
                 // $("#app-container").css("min-height:800px;");
                 var myScreenHeight = screen.height;
                 // if(myScreenHeight>1000){
                 //    myScreenHeight = 1100;
                 // }
                 // alert(myScreenHeight);
                document.getElementById("app-container").style.height = myScreenHeight+"px";
                // alert(screen.height);
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
                  var myScreenHeight = screen.height;
                  if(myScreenHeight>700 && myScreenHeight<800){
                        myScreenHeight = 550;
                    }
                  if(myScreenHeight > 1000){
                    myScreenHeight = 1000;
                  }
                    // alert(myScreenHeight);
                document.getElementById("app-container").style.height = (myScreenHeight)+"px";
            });
        });

    </script>
    <style>
        #app-container{
            min-height: 550px !important;
        }
    </style>
</head>
<body>
<input type="text" id="epubName" hidden="" value="<?php echo $_GET['id']; ?>">

<div class="container-fluid" style="overflow: hidden;">
    <div class="row justify-content-center">
        <div class="col-md-12 reader-section">
            <div class="row">
                <div class="col-12">
                    <nav id="nav-bar" class="navbar" style="background: white; text-color: white;">

                        <div class="container-fluid">
                            <div class="navbar-header">
                              <a class="navbar-brand" href="list.php">
                                  <span>
                                    <i class="" style="margin-top:8px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" style="color:#4E6586; height: 35px; width: 35px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                                    </i>
                                  </span>
                              </a>
                                <span class="drawer-box">
                                    <i>
                                        <svg xmlns="http://www.w3.org/2000/svg" style="color:#4E6586; height: 35px; width: 35px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
                                            <line x1="8" y1="6" x2="21" y2="6"></line>
                                            <line x1="8" y1="12" x2="21" y2="12"></line>
                                            <line x1="8" y1="18" x2="21" y2="18"></line>
                                            <line x1="3" y1="6" x2="3" y2="6"></line>
                                            <line x1="3" y1="12" x2="3" y2="12"></line>
                                            <line x1="3" y1="18" x2="3" y2="18"></line>
                                        </svg>
                                    </i>
                                </span>
                            <!-- <div class="buttonwrap theme-buttons-section">

                            </div> -->
                            </div>
                              <span>
                                <span style="margin-left: -60px;" id="list-btn">
                                    <img src="assets/images/mlx-logo-blue.png"/ height="50px" width="100px;">
                                </span>
                              </span>
                            <span id="expand-icon" style="font-size: 30px; color:#4E6586;">
                                <i>
                                    <svg xmlns="http://www.w3.org/2000/svg" style="color:#4E6586; height: 35px; width: 35px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize-2">
                                    <polyline points="15 3 21 3 21 9"></polyline>
                                    <polyline points="9 21 3 21 3 15"></polyline>
                                    <line x1="21" y1="3" x2="14" y2="10"></line>
                                    <line x1="3" y1="21" x2="10" y2="14"></line>
                                </svg>
                                </i>
                            </span>
                        </div>

                    </nav>
                </div>
                <div class="col-12">

            <div class="drawer-backdrop">
                        <div class="drawer-section"></div>
                    </div>
                    <div id="app-container">
                        <div id="reading-area" role="main">
                            <div id="epub-reader-container">
                                <div id="epub-reader-frame">
                                    <span id="compress-icon" style="margin-right: 50px;">
                                        <i class="pull-right">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="color:#4E6586; height: 35px; width: 35px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize-2">
                                              <polyline points="4 14 10 14 10 20"></polyline>
                                              <polyline points="20 10 14 10 14 4"></polyline>
                                              <line x1="14" y1="10" x2="21" y2="3"></line>
                                              <line x1="3" y1="21" x2="10" y2="14"></line>
                                            </svg>
                                        </i>
                                    </span>


                                </div>
                            </div>
                        </div>

                        <div class="col-12 page-controls" style="position: fixed; bottom: 0; height: 45px;">
                            <div class="page-c-wrapper text-center pre-next-wrapper" style="margin-top: 10px;">
                                <div class="prev-button material-icons">navigate_before</div>
                                <span style="padding-left: 20px; padding-right: 20px;"></span>
                                <div class="next-button material-icons">navigate_next</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        
        myFtn();

    </script>
</body>
</html>

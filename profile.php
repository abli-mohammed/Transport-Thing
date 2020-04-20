<?php
session_start();
$con=mysqli_connect("localhost","root","","transport_thing");
$session_id=$_SESSION['id_user'];
$query=mysqli_query($con,"SELECT * FROM `user` WHERE id_user='".$session_id."'");
$ligne = mysqli_fetch_array($query);
?>
<html>

<head>
    <title>
        Profile
    </title>
    <link rel="shortcut icon" href="images/logo2f_icon.ico" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/styles.css">
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <script>
        function add_request() {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.open("GET", "Add request.php", true);
            xhttp.send();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("pp").innerHTML = xhttp.responseText;
                }
            };
        }

        function info_user() {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.open("GET", "info_users.php", true);
            xhttp.send();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("pp").innerHTML = xhttp.responseText;
                }
            };
        }
    </script>
</head>

<body onload="add_request()">
    <script>
        function showpass() {
            var pass = document.getElementById("password");
            var eye = document.getElementById("eye");
            if (pass.type === "password") {
                pass.type = "text";
                eye.classList.remove("glyphicon-eye-open");
                eye.classList.add("glyphicon-eye-close");
            } else {
                pass.type = "password";
                eye.classList.add("glyphicon-eye-open");
                eye.classList.remove("glyphicon-eye-close");
            }
        }
    </script>
    <nav class="navbar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img class="img_logo" src="images/logo2.png" width="160px" height="50px"></a>
            </div>
            <div class="collapse navbar-collapse color_black" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="color_black"> My profile</span></a></li>
                    <li><a href="#"><span class="color_black"> Homepage</span></a></li>
                    <li><a href="login.html"><span class="color_black"> Logout</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container emp-profile">
        <div class="row">
            <div class="col-lg-4 col-md-12 nav_rigth">
                <div><img class="img_user" src="images/user.png"></div>
                <ul class="nav nav-pills nav-stacked" style="margin-top:10px;">
                    <li class="active"><a class="btn_right_1"><span class="glyphicon glyphicon-menu-hamburger">
                    </span> Main</a></li>
                    <li><a class="btn_right" href="#" onclick="add_request()"><span class="glyphicon glyphicon-plus"></span> Add request</a></li>
                    <li><a class="btn_right" href="#"><span class="glyphicon glyphicon-list"></span> Show request</a></li>
                    <li><a class="btn_right" href="#"><span class="glyphicon glyphicon-search"></span> Search request</a></li>
                </ul>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a class="btn_right_1" href="#"><span class="glyphicon glyphicon-cog"></span> Sittings</a></li>
                    <li><a class="btn_right" href="#" onclick="info_user()"><span class="glyphicon glyphicon-user"></span> Personal information</a></li>
                    <li><a class="btn_right" href="#"><span class="glyphicon glyphicon-map-marker"></span> Change region </a></li>
                    <li><a class="btn_right" href="#"><span class="glyphicon glyphicon-globe"></span> language</a></li>
                </ul>
                <!--<div class="nav_profile_right">
                       <span class="glyphicon glyphicon-envelope">
                       <button class="btn_right_profile">Add request</button>
                       <button class="btn_right_profile">Show request</button>
                       <button class="btn_right_profile">show demand</button>
                       <button class="btn_right_profile">Search request</button>
                   </div>-->
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <h1 class="username_profil"><?php echo $ligne['firstname']; echo" "; echo $ligne['lastname'];?></h1>
                            <div><span class="glyphicon glyphicon-envelope"> <span class="glyp_profile"><?php echo $ligne['email'];?></span>
                            </span>
                            </div>
                            <div><span class="glyphicon glyphicon-earphone"> <span class="glyp_profile">+213 <?php echo $ligne['phone'];?></span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 2px solid #2980B9;">
                <div class="row">
                    <div class="col-lg-12">
                        <p id="pp"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
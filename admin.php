<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "transport_thing");
$session_id = $_SESSION['id_user'];
if ($session_id == null) {
    header("LOCATION:login.html");
} else {
    $query = mysqli_query($con, "SELECT * FROM `user` WHERE id_user='" . $session_id . "'");
    $ligne = mysqli_fetch_array($query);
?>
    <html>

    <head>
        <title>
            <?php echo $ligne['username']; ?>
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
            function info_user() {
                var xhttp;
                xhttp = new XMLHttpRequest();
                xhttp.open("GET", "info_users.php", true);
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        document.getElementById("pp").innerHTML = xhttp.responseText;
                        document.getElementById("pp").style.overflow = "hidden";
                        document.getElementById("pp").style.height = "auto";
                    }
                };
            }

            function testCode() {
                var pass = document.getElementById("password").value;
                var phone = document.getElementById("phone").value;
                var address = document.getElementById("address").value;
                var date = document.getElementById("date").value;
                if (pass.length > 7 && phone.length == 10 && address.length > 2 && date != "") {
                    document.getElementById("add").disabled = false;
                } else {
                    document.getElementById("add").disabled = true;
                }
            }
        </script>
    </head>

    <body>
        <script>
            function show_password() {
                var pass = document.getElementById("pass");
                if (pass.type === "password") {
                    pass.type = "text";
                } else
                    pass.type = "password";
            }
        </script>
        <!-------------------------------------Block_account--------------------------------------------------------->
        <div id="Block_account" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <img class="img_logo" src="images/logo2.png" width="160px" height="50px">
                        <button type="button" class="close" data-dismiss="modal" style="margin-top: 10px;font-size:28px">&times;</button>
                    </div>
                    <form action="compte.php?block" method="POST">
                        <div class="modal-body">
                            <p style="font-size: 15px;">To complete this process, please enter the password</p>
                            <div class="input-group">
                                <span title="Show password" class="input-group-addon"><svg onclick="show_password()" style="cursor: pointer" class="bi bi-eye-slash-fill" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.5 8a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                                        <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 100-7 3.5 3.5 0 000 7z" clip-rule="evenodd" />
                                    </svg></span>
                                <input type="password" class="form-control" name="pass" id="pass" placeholder="Enter your password">
                            </div>
                        </div>
                        <div class="modal-footer" style="border-top:none">
                            <input type="submit" class="btn bt" value="Continue">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------------------------->
        <nav class="navbar">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">
                        <img class="img_logo" src="images/logo2.png" width="160px" height="50px"></a>
                </div>
                <div class="collapse navbar-collapse color_black" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="color_black"> My profile</span></a></li>
                        <li><a href="homepage.php"><span class="color_black"> Homepage</span></a></li>
                        <li><a href="compte.php?logout"><span class="color_black"> Logout</span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container emp-profile">
            <nav class="nav_profile">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav_profile" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <svg style="color: #007bff;" class="bi bi-list" width="1.9em" height="1.9em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 013 11h10a.5.5 0 010 1H3a.5.5 0 01-.5-.5zm0-4A.5.5 0 013 7h10a.5.5 0 010 1H3a.5.5 0 01-.5-.5zm0-4A.5.5 0 013 3h10a.5.5 0 010 1H3a.5.5 0 01-.5-.5z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </nav>
            <div class="row">
                <div class="col-lg-4 col-md-3 col-sm-4 nav_rigth" id="nav_profile">
                    <div align="center"><img class="img_user" src="images/user.png"></div>
                    <ul class="nav nav-pills nav-stacked nav_main">
                        <li class="active"><a class="btn_right_1">
                                <svg class="glyp_profile_right bi bi-grid-fill" width="1.3em" height="1.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M1 2.5A1.5 1.5 0 012.5 1h3A1.5 1.5 0 017 2.5v3A1.5 1.5 0 015.5 7h-3A1.5 1.5 0 011 5.5v-3zm8 0A1.5 1.5 0 0110.5 1h3A1.5 1.5 0 0115 2.5v3A1.5 1.5 0 0113.5 7h-3A1.5 1.5 0 019 5.5v-3zm-8 8A1.5 1.5 0 012.5 9h3A1.5 1.5 0 017 10.5v3A1.5 1.5 0 015.5 15h-3A1.5 1.5 0 011 13.5v-3zm8 0A1.5 1.5 0 0110.5 9h3a1.5 1.5 0 011.5 1.5v3a1.5 1.5 0 01-1.5 1.5h-3A1.5 1.5 0 019 13.5v-3z" clip-rule="evenodd" />
                                </svg>
                                <span> Main</span>
                            </a></li>
                        <li><a class="btn_right" href="#home" onclick="add_request()">
                                <svg class="glyp_profile_right bi bi-file-earmark-plus" width="1.9em" height="1.9em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 1H4a2 2 0 00-2 2v10a2 2 0 002 2h5v-1H4a1 1 0 01-1-1V3a1 1 0 011-1h5v2.5A1.5 1.5 0 0010.5 6H13v2h1V6L9 1z" />
                                    <path fill-rule="evenodd" d="M13.5 10a.5.5 0 01.5.5v2a.5.5 0 01-.5.5h-2a.5.5 0 010-1H13v-1.5a.5.5 0 01.5-.5z" clip-rule="evenodd" />
                                    <path fill-rule="evenodd" d="M13 12.5a.5.5 0 01.5-.5h2a.5.5 0 010 1H14v1.5a.5.5 0 01-1 0v-2z" clip-rule="evenodd" />
                                </svg>
                                <span>Add request</span></a></li>
                        <li><a class="btn_right" href="#home" onclick="show_request()">
                                <svg class="glyp_profile_right bi bi-file-earmark-check" width="1.9em" height="1.9em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 1H4a2 2 0 00-2 2v10a2 2 0 002 2h5v-1H4a1 1 0 01-1-1V3a1 1 0 011-1h5v2.5A1.5 1.5 0 0010.5 6H13v2h1V6L9 1z" />
                                    <path fill-rule="evenodd" d="M15.854 10.146a.5.5 0 010 .708l-3 3a.5.5 0 01-.708 0l-1.5-1.5a.5.5 0 01.708-.708l1.146 1.147 2.646-2.647a.5.5 0 01.708 0z" clip-rule="evenodd" />
                                </svg>
                                <span>Show request</span> </a></li>
                        <li><a class="btn_right" href="#home" onclick="My_delivery()">
                                <svg class="glyp_profile_right bi bi-file-earmark-diff" width="1.9em" height="1.9em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 1h5v1H4a1 1 0 00-1 1v10a1 1 0 001 1h8a1 1 0 001-1V6h1v7a2 2 0 01-2 2H4a2 2 0 01-2-2V3a2 2 0 012-2z" />
                                    <path d="M9 4.5V1l5 5h-3.5A1.5 1.5 0 019 4.5z" />
                                    <path fill-rule="evenodd" d="M5.5 11.5A.5.5 0 016 11h4a.5.5 0 010 1H6a.5.5 0 01-.5-.5zM8 5a.5.5 0 01.5.5v4a.5.5 0 01-1 0v-4A.5.5 0 018 5z" clip-rule="evenodd" />
                                    <path fill-rule="evenodd" d="M5.5 7.5A.5.5 0 016 7h4a.5.5 0 010 1H6a.5.5 0 01-.5-.5z" clip-rule="evenodd" />
                                </svg>
                                <span>My delivery </span>
                            </a></li>
                    </ul>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a class="btn_right_1" href="#">
                                <svg class="glyp_profile_right bi bi-gear-fill" width="1.3em" height="1.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 01-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 01.872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 012.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 012.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 01.872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 01-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 01-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 100-5.86 2.929 2.929 0 000 5.858z" clip-rule="evenodd" />
                                </svg>
                                <span>Sittings</span></a></li>
                        <li><a class="btn_right" href="#home" onclick="info_user()">
                                <svg class="glyp_profile_right bi bi-person" width="1.9em" height="1.9em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 00.014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 00.022.004zm9.974.056v-.002.002zM8 7a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                                <span>Personal information</span>
                            </a></li>
                        <li><a class="btn_right" href="#home">
                                <svg class="glyp_profile_right bi bi-type" width="1.9em" height="1.9em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.244 13.081l.943-2.803H6.66l.944 2.803H8.86L5.54 3.75H4.322L1 13.081h1.244zm2.7-7.923L6.34 9.314H3.51l1.4-4.156h.034zm9.146 7.027h.035v.896h1.128V8.125c0-1.51-1.114-2.345-2.646-2.345-1.736 0-2.59.916-2.666 2.174h1.108c.068-.718.595-1.19 1.517-1.19.971 0 1.518.52 1.518 1.464v.731H12.19c-1.647.007-2.522.8-2.522 2.058 0 1.319.957 2.18 2.345 2.18 1.06 0 1.716-.43 2.078-1.011zm-1.763.035c-.752 0-1.456-.397-1.456-1.244 0-.65.424-1.115 1.408-1.115h1.805v.834c0 .896-.752 1.525-1.757 1.525z" />
                                </svg>
                                <span>language</span>
                            </a></li>
                    </ul>
                </div>
                <div class="col-lg-8 col-md-9 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-10 col-sm-12">
                            <div>
                                <h1 class="username_profil"><?php echo $ligne['firstname'];
                                                            echo " ";
                                                            echo $ligne['lastname']; ?>
                                                            <span style="font-size: 30px" class="glyphicon glyphicon-star"></span></h1>
                                <div><svg class="glyp_profile bi bi-envelope-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
                                        <path d="M.05 3.555L8 8.414l7.95-4.859A2 2 0 0014 2H2A2 2 0 00.05 3.555zM16 4.697l-5.875 3.59L16 11.743V4.697zm-.168 8.108L9.157 8.879 8 9.586l-1.157-.707-6.675 3.926A2 2 0 002 14h12a2 2 0 001.832-1.195zM0 11.743l5.875-3.456L0 4.697v7.046z" />
                                    </svg> <span>
                                        <?php echo $ligne['email']; ?></span>
                                </div>
                                <div><span class="glyphicon glyphicon-earphone"></span><span class="glyp_profile"> +213
                                        <?php echo $ligne['phone']; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 2px solid #2980B9;">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div id="pp"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p id="home"></p>
    </body>

    </html>
<?php } ?>
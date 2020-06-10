<html>

<head>
    <title>Sing Up</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/logo2f_icon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="bootstrap/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/util.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/main.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/styles.css">
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <script>
        function chechPass() {
            var pass = document.getElementById("password").value;
            if (pass.length < 6) {
                document.getElementById("pass").innerHTML = "Password low";
                document.getElementById("pass").style.color = "#EA3737";
            }
            if (pass.length >= 6) {
                document.getElementById("pass").innerHTML = "Password Medium";
                document.getElementById("pass").style.color = "#FFC300";
            }
            if (pass.length >= 8) {
                document.getElementById("pass").innerHTML = "Password High";
                document.getElementById("pass").style.color = "#2ECC71";
            }
            if (pass.length <= 0) {
                document.getElementById("pass").innerHTML = "The minimum of password is 6";
                document.getElementById("pass").style.color = "#ABB2B9";
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <nav class="navbar">
            <div class="container-brand">
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
                        <li><a href="index.html"><span class="color_black"> Home</span></a></li>
                        <li><a href="login.php"><span class="color_black"> Login</span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="row bck" style="background-image:url('images/login.png');">
            <div class="col-lg-6">
            </div>
            <div class="col-lg-6" style="background-color:none;">
                <div class="limiter">
                    <div class="container-login100">
                        <div class="wrap-login100" style="margin-bottom: 70px;">
                            <form class="login100-form validate-form" method="POST" action="compte.php?singup">
                                <span class="login100-form-title p-b-34 p-t-27">
                                    Sing Up
                                </span>
                                <?php
                                if (isset($_GET['e']))
                                    echo '<div class="alert alert-danger" style="padding: 10px;font-size:12px;" role="alert">
                                          Sorry ,Please change your username or password</div><style>.p-b-34{padding:20px;}</style>';
                                ?>
                                <div class="wrap-input100 validate-input" data-validate="Enter Username">
                                    <input class="input100" type="text" name="username" placeholder="Username">
                                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                                </div>
                                <div class="wrap-input100 validate-input" data-validate="Enter E-mail">
                                    <input class="input100" type="text" name="email" placeholder="Email">
                                    <span class="focus-input100" data-placeholder="&#xf200;"></span>
                                </div>
                                <div class="wrap-input100 validate-input" data-validate="Enter password">
                                    <span id="eye" class="focus-input100 glyphicon glyphicon-eye-open showpass" onclick="showpass()"></span>
                                    <input class="input100" type="password" id="password" onkeyup="chechPass()" name="password" placeholder="Password">
                                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                                </div>
                                <p id="pass" style="font-size: 10px;margin-top:-25px;color:#888;margin-bottom:25px;">The minimum of password is 6</p>
                                <div class="container-login100-form-btn">
                                    <button class="login100-form-btn">
                                        Sing Up
                                    </button>
                                </div>

                                <div class="text-center p-t-20">
                                    <a class="txt2" href="login.php">
                                        Already have an account?
                                    </a>
                                </div>
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

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section_2" align="center">
        <p>
            © Copyright 2020 AML – Abli-Brahimi
        </p>
    </div>
    <script src="bootstrap/js/main.js"></script>
</body>

</html>
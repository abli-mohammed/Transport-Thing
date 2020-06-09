<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "transport_thing");
if (isset($_POST['change'])) {
   $pass_1=$_POST['password'];
   $email=$_SESSION['email'];
   $pass = mysqli_real_escape_string($con, $pass_1);
   mysqli_query($con,"UPDATE `user` SET `password`='$pass' WHERE email='$email'"); 
   $query=mysqli_query($con,"SELECT `id_user` FROM `user` WHERE email='$email'");
   $row=mysqli_fetch_array($query); 
   $_SESSION['id_user'] = $row['id_user'];
   header("LOCATION:profile.php");
}
if (empty($_SESSION['email']) || $_SESSION['code']!=$_SESSION['value'])
    header("LOCATION:login.php");
else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Change Password</title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="images/logo2f_icon.ico" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="bootstrap/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/fonts/iconic/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/util.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link href="styles/layout.css" rel="stylesheet" type="text/css" media="all">
        <link rel="stylesheet" href="styles/styles.css">
        <script src="bootstrap/js/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
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

            function showbtn() {
                var pass = document.getElementById("password").value;
                if (pass.length > 5) 
                 document.getElementById("btn").disabled=false;
                 else 
                 document.getElementById("btn").disabled=true;
                
            }

            function chechPass() {
                var pass = document.getElementById("password").value;
                if (pass.length < 6) {
                    document.getElementById("pass").innerHTML = "Password low";
                    document.getElementById("pass").style.color = "red";
                }
                if (pass.length >= 6) {
                    document.getElementById("pass").innerHTML = "Password Medium";
                    document.getElementById("pass").style.color = "#ffb100";
                }
                if (pass.length >= 8) {
                    document.getElementById("pass").innerHTML = "Password High";
                    document.getElementById("pass").style.color = "green";
                }
                if (pass.length <= 0) {
                    document.getElementById("pass").innerHTML = "The minimum of password is 6";
                    document.getElementById("pass").style.color = "#888";
                }
            }
        </script>
    </head>

    <body>
        <div class="container">
            <nav class="navbar">
                <div class="container-brand">
                    <div class="navbar-header">
                        <a class="navbar-brand">
                            <img class="img_logo" src="images/logo2.png" width="160px" height="50px"></a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="container emp-profile m-t-40">
            <div class="col-lg-6">
                <h2>Change your Password</h2>
                <p style="font-size: 12px;"> Please Enter a strong password between 6 and 10 characters or more.</p>
                <form action="" method="POST">
                    <div class="input-group">
                        <span style="cursor:pointer;" onclick="showpass()" class="input-group-addon"><span id="eye" class="glyphicon glyphicon-eye-open"></span></span>
                        <input type="password" class="form-control" onkeyup="chechPass(),showbtn()" id="password" name="password" placeholder="New Password">
                    </div>
                    <p id="pass" style="font-size: 10px;color:#888;margin-left:40px;">The minimum of password is 6</p>
                    <input class="btn bt m-t-10" id="btn" type="submit" name="change" disabled value="Continue">
                </form>
            </div>
            <div class="col-lg-6" align="center"><img class="img_logo" src="images/changepass1.png" width="70%" height="15%"></div>
        </div>
        <script src="bootstrap/js/main.js"></script>
    </body>

    </html>
<?php } ?>
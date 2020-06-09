<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "transport_thing");
if (isset($_POST['check'])) {
    $value = $_POST['resetpass'];
    $query = mysqli_query($con, "SELECT * FROM `user` WHERE status ='1' AND email='" . $value . "' OR username='" . $value . "'");
    $row = mysqli_fetch_array($query);
    if (mysqli_num_rows($query) > 0) {
        $email = $row['email'];
        $username = $row['username'];
        $to = $email;
        $sup = "Reset Password";
        $txt = rand(10000, 99999);
        $_SESSION['code'] = $txt;
        $message = "
            <html>
            <head>
            <title>Reset Password</title>
            </head>
            <body>
            <h1>Hi $username</h1>
            <p style='font-size:18px;'><b>Your code is $txt</b></p>
            </body>
            </html>
            ";
        $head = "CC: $email \r\n";
        $head .= "MIME-Version: 1.0\r\n";
        $head .= "Content-type: text/html\r\n";
        mail($to, $sup, $message, $head);
        $_SESSION['email'] = $email;
        header("LOCATION:newpass.php");
    } else
        header("LOCATION:resetpass.php?e");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reset Password</title>
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
            <h2>Reset your Password</h2>
            <?php
            if (isset($_GET['e']))
                echo '<div class="alert alert-danger" style="padding: 10px;font-size:12px;" role="alert">
                                    Sorry ,This account does not exist ,Please try again with other information.</div><style>.p-b-34{padding:20px;}</style>';
            ?>
            <p style="font-size:15px"> Please enter your email or username to search for your account.</p>
            <form action="" method="POST">
                <div class="input-group">
                    <span class="input-group-addon">@</span>
                    <input type="text" class="form-control" name="resetpass" placeholder="email or username">
                </div>
                <input class="btn bt m-t-10" type="submit" name="check" value="Search ">
            </form>
            <div align="right"><a href="login.php" class="fs-14">Back</a></div>
        </div>
        <div class="col-lg-6" align="center" style="margin-top: -20px;"><img class="img_logo" src="images/resetpass.png" width="70%" height="15%"></div>
    </div>
    <script src="bootstrap/js/main.js"></script>
</body>

</html>
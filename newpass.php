<?php
session_start();
if (isset($_POST['check'])) {
    $value = $_POST['code'];
    $txt = $_SESSION['code'];
    $_SESSION['value']=$value;
    if ($value == $txt)
        header("LOCATION:changepass.php");
    else
        header("LOCATION:newpass.php?e");
}
if (empty($_SESSION['email']))
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
            cont = 59;

            function tryAg() {
                intr = setInterval(cho, 1000);
                document.getElementById("tryAgain").href = "#";
                document.getElementById("tryAgain").style = "color: #555;cursor: progress";
            }

            function cho() {
                document.getElementById("tryAgain").innerHTML = "Try again in " + cont--;
                if (cont < 0) {
                    clearInterval(intr);
                }
                if (cont == -1) {
                    document.getElementById("tryAgain").innerHTML = "Send Code Again";
                    document.getElementById("tryAgain").href = "mail.php?newpass";
                    document.getElementById("tryAgain").style = "color: #337ab7;cursor: pointer";
                }
            }
        </script>
    </head>
    <?php
    if (isset($_GET['c']))
        echo "<body onload='tryAg()'>";
    else {
        echo "<body>";
    }
    ?>
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
            <h2>Change Your Password</h2>
            <?php
            if (isset($_GET['e']))
                echo '<div class="alert alert-danger" style="padding: 10px;font-size:12px;" role="alert">
                                    Sorry ,The number you entered doesn’t match your code. Please try again.</div><style>.p-b-34{padding:20px;}</style>';
            ?>
            <p style="font-size: 12px;"> Please check your email for a message with your code. Your code is 5 numbers.
                <br>Your email is <b> ' <?php echo $_SESSION['email']; ?> '</b></p>
            <form action="" method="POST">
                <div class="input-group">
                    <span class="input-group-addon"><a id="tryAgain" href="mail.php?newpass"> Send Code Again </a></span>
                    <input type="text" class="form-control" name="code" placeholder="XXXXX">
                </div>
                <input class="btn bt m-t-10" type="submit" name="check" value="Continue">
            </form>
            <div align="right">
            <?php if(empty($_SESSION['id_user']))    
            echo'<a href="compte.php?logout" class="fs-14">Back</a>';
            else
            echo'<a href="profile.php" class="fs-14">Back</a>';
            ?>
            </div>
        </div>
        <div class="col-lg-6 m-t-100" align="center"><img class="img_logo" src="images/logo2.png" width="70%" height="15%"></div>
    </div>
    <script src="bootstrap/js/main.js"></script>
    </body>

    </html>
<?php } ?>
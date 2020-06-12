<?php
session_start();
//////////////////////////////////////////////////////////LOG IN///////////////////////////////////////////////////////////////////////
$con = mysqli_connect("localhost", "root", "", "transport_thing");
if (isset($_GET['login'])) {
    $username_1 = $_POST['username'];
    $pass_1 = $_POST['password'];
    $username = mysqli_real_escape_string($con, $username_1);
    $pass = mysqli_real_escape_string($con, $pass_1);
    $query = mysqli_query($con, "SELECT * FROM `user` WHERE password='" . $pass . "' AND username='" . $username . "' OR email='" . $username . "' AND 	status='1'");
    if (mysqli_num_rows($query) > 0) {
        $ligne = mysqli_fetch_array($query);
        $_SESSION['id_user'] = $ligne['id_user'];
        $session_id = $_SESSION['id_user'];
        if (!empty($_POST['remember_me'])) {
            setcookie("username", $_POST['username'], time() + (10 * 365 * 60 * 60));
            setcookie("password", $_POST['password'], time() + (10 * 365 * 60 * 60));
        } else {
            if (isset($_COOKIE["username"])) setcookie("username", "");
            if (isset($_COOKIE["password"])) setcookie("password", "");
        }
        header("LOCATION:homePage.php");
    } else
        header("LOCATION:login.php?e");
}
/////////////////////////////////////////////////////////SING UP/////////////////////////////////////////////////////////////////////////
if (isset($_GET['singup'])) {
    $username_1 = $_POST['username'];
    $email_1 = $_POST['email'];
    $pass_1 = $_POST['password'];
    $email = mysqli_real_escape_string($con, $email_1);
    $username = mysqli_real_escape_string($con, $username_1);
    $pass = mysqli_real_escape_string($con, $pass_1);
    $query = mysqli_query($con, "SELECT * FROM `user` WHERE email='" . $email . "' OR username='" . $username . "'");
    if (mysqli_num_rows($query) > 0 || strlen($pass) < 6) {
        header("LOCATION:SingUp.php?e");
        break;
    }
    $to = $email;
    $sup = "Confirm Account";
    $txt = rand(10000, 99999);
    $_SESSION['code'] = $txt;
    $_SESSION['email'] = $email;
    $message = "
<html>
<head>
<title>Confirm Account</title>
</head>
<body>
<h1>Hi</h1>
<p style='font-size:18px;'><b>Your code is $txt</b></p>
<a href='http://localhost/Transport Thing/ConfirmAccount.php' style='color:blue;font-size:18px;'>Click here to complete the registration</a>
</body>
</html>
";
    $head = "CC: $email \r\n";
    $head .= "MIME-Version: 1.0\r\n";
    $head .= "Content-type: text/html\r\n";
    if (mail($to, $sup, $message, $head)) {
        mysqli_query($con, "INSERT INTO `user`(`password`, `status`,`email`, `type`, `username`) VALUES ('$pass', '2', '$email', '2', '$username')");
        $_SESSION['id_user'] = mysqli_insert_id($con);
        $session_id = $_SESSION['id_user'];
        header("LOCATION:CreateAccount.php");
    } else
        header("LOCATION:SingUp.php");
}
if (isset($_GET['CreateAccount'])) {
    $session_id = $_SESSION['id_user'];
    $code = $_POST['code'];
    $firstN = $_POST['firstN'];
    $lastN = $_POST['lastN'];
    $dateB = $_POST['dateB'];
    $phone = $_POST['phone'];
    $adrass = $_POST['adrass'];
    mysqli_query($con, "UPDATE `user` SET `firstname`='$firstN',`lastname`='$lastN',`birthdate`='$dateB',`adress`='$adrass',`phone`='$phone' WHERE id_user='$session_id'");
    $txt = $_SESSION['code'];
    if ($code == $txt) {
        mysqli_query($con, "UPDATE `user` SET `status`='1' WHERE id_user='$session_id'");
        header("LOCATION:profile.php");
    } else {
        header("LOCATION:ConfirmAccount.php?wrongCode");
    }
}
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("LOCATION:login.php");
}
if (isset($_GET['block'])) {
    $pass = $_POST['pass'];
    $session_id = $_SESSION['id_user'];
    $query = mysqli_query($con, "SELECT `password` FROM `user` WHERE id_user='" . $session_id . "'");
    $ligne = mysqli_fetch_array($query);
    $password = $ligne['password'];
    if ($pass == $password) {
        mysqli_query($con, "DELETE FROM `user` WHERE id_user='" . $session_id . "'");
        mysqli_query($con, "DELETE FROM `request` WHERE id_user='" . $session_id . "'");
        mysqli_query($con, "DELETE FROM `proposition_users` WHERE id_user='" . $session_id . "'");
        session_unset();
        session_destroy();
        header("LOCATION:login.php");
    } else {
        echo $password;
    }
}
if (isset($_GET['changepass'])) {
    $session_id = $_SESSION['id_user'];
    $query = mysqli_query($con, "SELECT `username`,`email` FROM `user` WHERE id_user='" . $session_id . "'");
    $row = mysqli_fetch_array($query);
    $email = $row['email'];
    $username = $row['username'];
    $to = $email;
    $sup = "Change Password";
    $txt = rand(10000, 99999);
    $_SESSION['code'] = $txt;
    $message = "
        <html>
        <head>
        <title>Change Password</title>
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
}
if (isset($_GET['admin_block'])) {
    $id = $_GET['admin_block'];
    mysqli_query($con, "UPDATE `user` SET `status`='2' WHERE id_user='" . $id . "'");
    mysqli_query($con, "UPDATE `request` SET `status`='1' WHERE id_user='" . $id . "'");
    mysqli_query($con, "DELETE FROM `proposition_users` WHERE id_user='" . $id . "'");
}
if (isset($_GET['deblocking'])) {
    $id = $_GET['deblocking'];
    mysqli_query($con, "UPDATE `user` SET `status`='1' WHERE id_user='" . $id . "'");
    mysqli_query($con, "UPDATE `request` SET `status`='0' WHERE id_user='" . $id . "'");
}
if (isset($_GET['add_photo'])) {
    $session_id = $_SESSION['id_user'];
    $image = $_FILES["image"]["tmp_name"];
    $tmp = addslashes(file_get_contents($image[0]));
    mysqli_query($con, "UPDATE `user` SET `photo`='$tmp' WHERE id_user='" . $session_id . "'");
    header("LOCATION:profile.php");
}

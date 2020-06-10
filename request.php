<?php
session_start();
$con=mysqli_connect("localhost","root","","transport_thing");
if(isset($_GET['id_request']))
{
$id=$_GET['id_request'];
$_SESSION['id_request']=$id;
}
if(isset($_GET['confirm_delivery']))
{
$amount=$_GET['confirm_delivery'];
$id_request=$_SESSION['id_request'];
$session_id=$_SESSION['id_user'];
$result = mysqli_query($con, "SELECT * FROM `user` WHERE id_user='" . $session_id . "'");
$ligne = mysqli_fetch_array($result);
mysqli_query($con,"INSERT INTO `proposition_users` (`id_request`, `id_user`, `is_free`) 
VALUES ('$id_request', '$session_id', '$amount')");
$username=$ligne['username'];
$email=$ligne['email'];
$to=$email;
$sup="New delivery";
$message = "
<html>
<head>
<title>New delivery</title>
</head>
<body>
<h1>Hi $username</h1>
<p style='font-size:18px;'><b>You have new delivery please check your account</b></p>
<a href='http://localhost/Transport Thing/login.php' style='color:blue;font-size:18px;'>Click here</a>
</body>
</html>
";
$head="CC: $email \r\n";
$head .= "MIME-Version: 1.0\r\n";
$head .= "Content-type: text/html\r\n";
mail($to,$sup,$message,$head);
header("LOCATION:homepage.php");
}
if(isset($_GET['delet_propos']))
{
$id_request=$_GET['delet_propos'];
mysqli_query($con,"DELETE FROM `proposition_users` WHERE id_request=$id_request");
header("LOCATION:profile.php?my_delivery");
}

if(isset($_GET['delet_propos_h']))
{
$id_request=$_GET['delet_propos_h'];
mysqli_query($con,"DELETE FROM `proposition_users` WHERE id_request=$id_request");
header("LOCATION:homePage.php");
}
if(isset($_GET['delete_request']))
{
$id_request=$_GET['delete_request'];
mysqli_query($con,"DELETE FROM `request` WHERE id_request=$id_request");
mysqli_query($con,"DELETE FROM `proposition_users` WHERE id_request=$id_request");
}
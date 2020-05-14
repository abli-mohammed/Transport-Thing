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
mysqli_query($con,"INSERT INTO `proposition_users` (`id_request`, `id_user`, `is_free`) 
VALUES ('$id_request', '$session_id', '$amount')");
header("LOCATION:homepage.php");
}
if(isset($_GET['delet_propos']))
{
$id_request=$_GET['delet_propos'];
mysqli_query($con,"DELETE FROM `proposition_users` WHERE id_request=$id_request");
header("LOCATION:profile.php?my_delivery");
}
if(isset($_GET['delet_request']))
{
$id_request=$_GET['delet_request'];
mysqli_query($con,"DELETE FROM `request` WHERE id_request=$id_request");
header("LOCATION:profile.php");
}
?>
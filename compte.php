<?php
session_start();
$con=mysqli_connect("localhost","root","","transport_thing");
if(isset($_GET['login'])){
    $username_1=$_POST['username'];
    $pass_1=$_POST['password'];
    $username=mysqli_real_escape_string($con,$username_1);
    $pass=mysqli_real_escape_string($con,$pass_1);
    $query=mysqli_query($con,"SELECT * FROM `user` WHERE username='".$username."' AND password='".$pass."'");
    if(mysqli_num_rows($query) > 0)
    {
        header("LOCATION:profile.html");
    }
    else
    header("LOCATION:login.html");
}
if(isset($_GET['singup'])){
    $email=$_POST['email'];
    $pass=$_POST['password'];
    mysqli_query($con,"INSERT INTO `user`(`password`, `status`, `email`, `type`) VALUES ('$pass', '2', '$email', '2')");

}
?>
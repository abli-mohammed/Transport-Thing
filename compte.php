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
        $ligne = mysqli_fetch_array($query);
        $_SESSION['id_user']=$ligne['id_user'];
        $session_id=$_SESSION['id_user'];
        header("LOCATION:profile.php");
    }
    else
    header("LOCATION:login.html");
}
if(isset($_GET['singup'])){
    $email=$_POST['email'];
    $pass=$_POST['password'];
    mysqli_query($con,"INSERT INTO `user`(`password`, `status`, `email`, `type`) VALUES ('$pass', '2', '$email', '2')");
    header("LOCATION:CreateAccount.php");

}
if(isset($_GET['CreateAccount'])){
    $email=$_POST['email'];
    $pass=$_POST['password'];
    mysqli_query($con,"INSERT INTO `user`(`password`, `status`, `email`, `type`) VALUES ('$pass', '2', '$email', '2')");
    header("LOCATION:profile.php");

}
?>
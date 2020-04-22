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
    $email_1=$_POST['email'];
    $pass_1=$_POST['password'];
    $email=mysqli_real_escape_string($con,$email_1);
    $pass=mysqli_real_escape_string($con,$pass_1);
    mysqli_query($con,"INSERT INTO `user`(`password`, `status`,`email`, `type`) VALUES ('$pass', '2','$email', '2')");
    $query=mysqli_query($con,"SELECT `id_user` FROM `user` WHERE email='".$email."'");
    $ligne = mysqli_fetch_array($query);
        $_SESSION['id_user']=$ligne['id_user'];
        $session_id=$_SESSION['id_user'];
    header("LOCATION:CreateAccount.php");

}
if(isset($_GET['CreateAccount'])){
    $session_id=$_SESSION['id_user'];
    $code=$_POST['code'];
    $firstN=$_POST['firstN'];
    $lastN=$_POST['lastN'];
    $username=$_POST['username'];
    $dateB=$_POST['dateB'];
    $phone=$_POST['phone'];
    $adrass=$_POST['adrass'];
    mysqli_query($con,"UPDATE `user` SET `username`='$username',`firstname`='$firstN',`lastname`='$lastN',`birthdate`='$dateB',`adress`='$adrass',`phone`='$phone' WHERE id_user='$session_id'");
    if($code==55555)
    {
    header("LOCATION:profile.php");
    }
    else
    {
    header("LOCATION:ConfirmAccount.php");
    }

}
?>
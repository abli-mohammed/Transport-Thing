<?php
session_start();
$con=mysqli_connect("localhost","root","","transport_thing");
if(isset($_GET['login'])){
    $username_1=$_POST['username'];
    $pass_1=$_POST['password'];
    $username=mysqli_real_escape_string($con,$username_1);
    $pass=mysqli_real_escape_string($con,$pass_1);
    $query=mysqli_query($con,"SELECT * FROM `user` WHERE username='".$username."' AND password='".$pass."' AND 	status='1'");
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
    $username_1=$_POST['username'];
    $email_1=$_POST['email'];
    $pass_1=$_POST['password'];
    $username=mysqli_real_escape_string($con,$username_1);
    $email=mysqli_real_escape_string($con,$email_1);
    $pass=mysqli_real_escape_string($con,$pass_1);
    $query=mysqli_query($con,"SELECT * FROM `user` WHERE email='".$email."'");
    if(mysqli_num_rows($query) > 0)
    {
        header("LOCATION:SingUp.html");  
    }
    $to=$email;
    $sup="Confirm Account";
    $txt=rand(10000,99999);
    $_SESSION['code']=$txt;
    $_SESSION['email']=$email;
    $message="Your code is"+$txt;
    $head="CC: $email";
    if(mail($to,$sup,$message,$head))
    {
        mysqli_query($con,"INSERT INTO `user`(`username`, `password`, `status`,`email`, `type`) VALUES ('$username', '$pass', '2','$email', '2')");
        $_SESSION['id_user']=mysqli_insert_id($con);
        $session_id=$_SESSION['id_user'];
        header("LOCATION:CreateAccount.php");
    }
    else
       header("LOCATION:SingUp.html");  
}
if(isset($_GET['CreateAccount'])){
    $session_id=$_SESSION['id_user'];
    $code=$_POST['code'];
    $firstN=$_POST['firstN'];
    $lastN=$_POST['lastN'];
    $dateB=$_POST['dateB'];
    $phone=$_POST['phone'];
    $adrass=$_POST['adrass'];
    mysqli_query($con,"UPDATE `user` SET `firstname`='$firstN',`lastname`='$lastN',`birthdate`='$dateB',`adress`='$adrass',`phone`='$phone' WHERE id_user='$session_id'");
    $txt=$_SESSION['code'];
    if($code==$txt)
    {
    mysqli_query($con,"UPDATE `user` SET `status`='1' WHERE id_user='$session_id'");
    header("LOCATION:profile.php");
    }
    else
    {
    header("LOCATION:ConfirmAccount.php?wrongCode");
    }

}
if(isset($_GET['logout'])){
	session_unset();
    session_destroy();
    header("LOCATION:login.html");
 }
?>
<?php 
session_start();
$con=mysqli_connect("localhost","root","","transport_thing");
if(isset($_POST['update']))
{
$session_id=$_SESSION['id_user'];
$email=$_POST['email'];
$sup="Confirm Account";
    $txt=rand(10000,99999);
    $_SESSION['code']=$txt;
    $_SESSION['email']=$email;
    $to=$email;
    $message="Your code is $txt";
    $head="CC: $email";
    if(mail($to,$sup,$message,$head))
    {
        mysqli_query($con,"UPDATE `user` SET `email`='$email' WHERE id_user='$session_id'");
        header("LOCATION:ConfirmAccount.php");
    }
    else
        header("LOCATION:ConfirmAccount.php?wrongEmail");
}
?>
<form action="change_mail.php" method="POST">
              <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
              <input  type="email" class="form-control" name="email" placeholder="Enter new email">
              </div>
              <input class="btn bt m-t-10" type="submit" name="update" value="Update">
    </form>
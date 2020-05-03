<?php
    session_start();
    $email=$_SESSION['email'];
    $to=$email;
    $sup="Confirm Account";
    $txt=rand(10000,99999);
    $_SESSION['code']=$txt;
    $message="Your code is $txt";
    $head="CC: $email";
    if(mail($to,$sup,$message,$head))
    {
        header("LOCATION:ConfirmAccount.php?c");
    }
    else
        header("LOCATION:ConfirmAccount.php?wrongEmail");

?>

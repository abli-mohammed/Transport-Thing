<?php
    session_start();
    $email=$_SESSION['email'];
    $to=$email;
    $sup="Confirm Account";
    $txt=rand(10000,99999);
    $_SESSION['code']=$txt;
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
    if(mail($to,$sup,$message,$head))
    {
        header("LOCATION:ConfirmAccount.php?c");
    }
    else
        header("LOCATION:ConfirmAccount.php?wrongEmail");

?>

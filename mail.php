<?php
    session_start();
    if(isset($_GET['confirm']))
    {
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
}
if(isset($_GET['newpass']))
    {
    $email=$_SESSION['email'];
    $to=$email;
    $sup = "Reset Password";
    $txt = rand(10000, 99999);
    $_SESSION['code'] = $txt;
    $message = "
        <html>
        <head>
        <title>Reset Password</title>
        </head>
        <body>
        <h1>Hi</h1>
        <p style='font-size:18px;'><b>Your code is $txt</b></p>
        </body>
        </html>
    ";
        $head = "CC: $email \r\n";
        $head .= "MIME-Version: 1.0\r\n";
        $head .= "Content-type: text/html\r\n";
    if(mail($to,$sup,$message,$head))
    {
        header("LOCATION:newpass.php?c");
    }
}
?>
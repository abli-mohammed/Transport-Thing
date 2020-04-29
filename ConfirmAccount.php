<?php
session_start();
$email=$_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create Account</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/logo2f_icon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="bootstrap/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/util.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="styles/styles.css">
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <script>
        function change_email() {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.open("GET", "change_mail.php", true);
            xhttp.send();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("new_email").innerHTML = xhttp.responseText;
            };             
                }
        }
        function mt()
        {
            var bt=document.getElementById("bt");
            bt.classList.remove("section_2 m-t-149");
            bt.classList.add("section_2 m-t-71");  
        }
</script>
</head>

<body>
    <div class="container">
        <nav class="navbar">
            <div class="container-brand">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <img class="img_logo" src="images/logo2.png" width="160px" height="50px"></a>
                </div>
            </div>
        </nav>
    </div>
    
    <div class="container emp-profile m-t-40">
    <div class="col-lg-6">
        <h1>Transport Thing</h1>
    <p> Enter the code from the email <b> ' <?php echo $email;?> '</b></p>
    <form action="" method="POST">
              <div class="input-group">
              <span class="input-group-addon"><a href="mail.php"> Send Code Again </a></span>
              <input  type="text" class="form-control" name="code" placeholder="XXXXX">
              </div>
              <input class="btn bt m-t-10" type="submit" name="add" value="Confirm account">
    </form>
        <p class="m-t-15" style="font-size:14px">If the email is rong <a href="#" onclick="change_email(),mt()">Change email</a></p>
        <div id="new_email"></div>
              
   </div> 
    <div class="col-lg-6"></div></div>
    <div id="bt" class="section_2 m-t-149" align="center">
        <p>
            © Copyright 2020 AML – Abli-Brahimi
        </p>
    </div>
    <script src="bootstrap/js/main.js"></script>
</body>

</html>
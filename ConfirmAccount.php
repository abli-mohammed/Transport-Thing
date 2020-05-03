<?php
session_start();
$con=mysqli_connect("localhost","root","","transport_thing");
@$session_id=$_SESSION['id_user'];

$query=mysqli_query($con,"SELECT `status` FROM `user` WHERE id_user='".$session_id."'");
$ligne = mysqli_fetch_array($query);
    if($ligne['status']=='1')
    {
        header("LOCATION:profile.php");  
    }
    else
    {
   $email=$_SESSION['email'];
   if(isset($_POST['add']))
   {
    $code=$_POST['code'];
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
            cont=59;
           function tryAg(){
          intr = setInterval(cho,1000);
          document.getElementById("tryAgain").href="#";
          document.getElementById("tryAgain").style="color: #555;cursor: progress";
                          }
           function cho()
            {
               document.getElementById("tryAgain").innerHTML="Try again in " + cont--;
               if(cont<0)
               {
               clearInterval(intr);
               }
               if(cont==-1)
               {
               document.getElementById("tryAgain").innerHTML="Send Code Again";
               document.getElementById("tryAgain").href="mail.php";
               document.getElementById("tryAgain").style="color: #337ab7;cursor: pointer";    
               }
}
</script>
</head>
<?php
 if(isset($_GET['c'])) 
   echo"<body onload='tryAg()'>";
 else {echo"<body>";}
  ?>
    <div class="container">
        <nav class="navbar">
            <div class="container-brand">
                <div class="navbar-header">
                    <a class="navbar-brand" >
                        <img class="img_logo" src="images/logo2.png" width="160px" height="50px"></a>
                </div>
            </div>
        </nav>
    </div>
    
    <div class="container emp-profile m-t-40">
    <?php
    if(isset($_GET['wrongCode']))
    echo"<div class='alert alert-danger' role='alert'>The number you entered is wrong. Please check your email and try again</div>";
    if(isset($_GET['wrongEmail']))
    echo"<div class='alert alert-danger' role='alert'>The email you entered is wrong. Please check the email and try again</div>";
    ?>
    <div class="col-lg-6">
        <h1>Transport Thing</h1>
    <?php
    if(!isset($_GET['wrongEmail']))
    {
    ?>
    <p> Enter the code from the email <b> ' <?php echo $email;?> '</b></p>
    <form action="" method="POST">
              <div class="input-group">
              <span class="input-group-addon"><a id="tryAgain" href="mail.php"> Send Code Again </a></span>
              <input  type="text" class="form-control" name="code" placeholder="XXXXX">
              </div>
              <input class="btn bt m-t-10" type="submit" name="add" value="Confirm account">
    </form>
    <?php } ?>
        <p class="m-t-15" style="font-size:14px">If the email is wrong click here <a href="#" onclick="change_email()">Change email</a></p>
        <div id="new_email"></div>
        <div align="right"><a href="compte.php?logout" class="fs-14">Logout</a></div>     
   </div> 
    <div class="col-lg-6 m-t-100" align="center"><img class="img_logo" src="images/logo2.png" width="70%" height="15%"></div></div>
    <script src="bootstrap/js/main.js"></script>
</body>

</html>
    <?php } ?>
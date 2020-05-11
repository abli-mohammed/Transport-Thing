<?php
session_start();
$con=mysqli_connect("localhost","root","","transport_thing");
$session_id=$_SESSION['id_user'];
if($session_id==null)
{
    header("LOCATION:login.html");
}
else{
$query=mysqli_query($con,"SELECT * FROM `user` WHERE id_user='".$session_id."'");
$query_r=mysqli_query($con,"SELECT * FROM `request` INNER JOIN `type_thing` ON request.id_type=type_thing.id_type 
AND id_user!='".$session_id."' ORDER BY id_request DESC LIMIT 8");
$ligne = mysqli_fetch_array($query);
?>
<html>

<head>
    <title>
     <?php echo $ligne['username']; ?>
    </title>
    <link rel="shortcut icon" href="images/logo2f_icon.ico" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/styles.css">
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <script>
        function id_request(value) {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.open("GET", "request.php?id_request="+value, true);
            xhttp.send();
        }
        
        function confirm_delivery(value) {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.open("GET", "request.php?confirm_delivery="+value, true);
            xhttp.send();
            location.reload();
        }
        </script>
        
</head>

<body>
    <!-------------------------------------Confirm_delivery--------------------------------------------------------->
<div id="Confirm_delivery" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <img class="img_logo" src="images/logo2.png" width="160px" height="50px">
                <button type="button" class="close" data-dismiss="modal" style="margin-top: 10px;font-size:28px">&times;</button>
            </div>
            <div class="modal-body">
                <p>If you want to add the delivery value</p>
                <div class="input-group">
                    <span class="input-group-addon"><a>The amount in DA</a></span>
                    <input type="text" class="form-control" id="amount" placeholder="">
                </div>
            </div>
            <div class="modal-footer" style="border-top:none">
                <input class="btn bt" data-dismiss="modal" onclick="confirm_delivery(document.getElementById('amount').value)" type="submit" name="add" value="Confirm delivery">
                <input class="btn bt" data-dismiss="modal" onclick="confirm_delivery('0')" type="submit" value="for free">
            </div>
        </div>
    </div>
</div>
<!------------------------------------------------------------------------------------------------------------->
<nav class="navbar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">
                    <img class="img_logo" src="images/logo2.png" width="160px" height="50px"></a>
            </div>
            <div class="collapse navbar-collapse color_black" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="profile.php"><span class="color_black"> My profile</span></a></li>
                    <li><a href="#"><span class="color_black"> Homepage</span></a></li>
                    <li><a href="compte.php?logout"><span class="color_black"> Logout</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container emp-profile">
    <!--<h1 class="username_profil"> <?php echo $ligne['firstname']; echo" "; echo $ligne['lastname'];?></h1>-->
        <div class="row">
           <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
           <?php    
             while($ligne = mysqli_fetch_array($query_r))
              {
                $id_request=$ligne['id_request'];
                echo
                "<div class='col-lg-3 col-md-2 col-sm-1 col-xs-1 card'><h2>
                <img src='images/",$ligne['type_thing'],".png' width='80px' height='80px'>
                <span>", $ligne['type_thing'], "</span></h2>
                  <p>Destination ", $ligne['destination'], "</p>
                     <p>Arrival ", $ligne['arrival'], "</p>";
                    if($ligne['is_free']==1)
                    echo"<span>Is free</span>";
                    else echo"<span>For a fee</span>";
                    if($ligne['is_emergency']==1)
                     echo"<span> and is emergency</span>";
                    $query_p=mysqli_query($con,"SELECT * FROM `proposition_users` WHERE id_user_demander='".$session_id."' AND id_request='".$id_request."'");
                    if(mysqli_num_rows($query_p) > 0)
                     {
                        echo'<br><br><div align="right">
                        <button disabled class="btn" style="position: relative;z-index: 1;background-color: #2980b9;color: #fff;">
                        Delivery request</button>
                        </div></div>';
                     }
                     else
                     {
                        echo'<br><br><div align="right">
                       <a  class="btn" onclick="id_request('.$id_request.')" data-toggle="modal" data-target="#Confirm_delivery" style="position: relative;z-index: 1;background-color: #2980b9;color: #fff;">
                       Delivery request</a>
                       </div></div>';
                     }
              }
    ?>
           </div>
        </div>
    </div>
    <a  onclick="id_request('222222')">htfyjgf</a>
</body>

</html>
    <?php } ?>
<?php
session_start();
$con=mysqli_connect("localhost","root","","transport_thing");
$session_id=$_SESSION['id_user'];
if($session_id==NULL)
{
  header("LOCATION:login.html");
}
$query=mysqli_query($con,"SELECT `status` FROM `user` WHERE id_user='".$session_id."'");
$ligne = mysqli_fetch_array($query);
    if($ligne['status']=='1')
    {
      header("LOCATION:profile.php");
    }
else{
  
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
</head>

<body>
    <div class="container">
        <nav class="navbar">
            <div class="container-brand">
                <div class="navbar-header">
                    <a class="navbar-brand">
                        <img class="img_logo" src="images/logo2.png" width="160px" height="50px"></a>
                </div>
            </div>
        </nav>
    </div>

    <div class="container emp-profile">
      <div class="raw">
        <div class="col-lg-6">
        <h2>Create a New Account</h2>       
                            <div class="wrapper row3">
  <main class="hoc container1 clear" style="margin-left: 0px;padding-top:10px;"><form action="compte.php?CreateAccount" method="post">
   <div class="log1">
     Your name
      <div class="form-group has-feedback">		
                <input  type="text" id="fn" onkeyup="testCode()" title="First name" name="firstN" placeholder="First name" style="width:43%">
                <input  type="text" id="ln" onkeyup="testCode()" title="Last name" name="lastN" placeholder="Last name" style="width:55%">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
			
      </div>
     Mobile number
     <div class="form-group has-feedback">
			<span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                <input  type="text" id="phone" onkeyup="testCode()" name="phone" title="Mobile number" placeholder="Mobile number">
			</div>
      <span>Birthday</span>
      <div class="form-group has-feedback">
			<span class="glyphicon glyphicon-calendar form-control-feedback"></span>
              <input  type="date" id="date" onkeyup="testCode()" name="dateB" title="Date of birthday">
			</div>
      <span>Adress</span>
      <div class="form-group has-feedback">
			<span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                <input  type="text" id="address" name="adrass" title="Address" onkeyup="testCode()" placeholder="Adress">
			</div>
      </div>
      <div id="Confirm_mail" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header"> 
           <img class="img_logo" src="images/logo2.png" width="160px" height="50px">
            <button type="button" class="close" data-dismiss="modal" style="margin-top: 10px;font-size:28px">&times;</button>
            </div>
            <div class="modal-body">
              <p> Enter the code from the email</p>
              <div class="input-group">
              <span class="input-group-addon"><a href="mail.php"> Send Code Again </a></span>
              <input  type="text" id="code" onkeyup="test()" class="form-control" name="code" placeholder="XXXXX">
              </div>
            </div>
            <div class="modal-footer" style="border-top:none">
            <script>
            function test() {
                var code = document.getElementById("code").value;
                if (code.length == 5) {
                    document.getElementById("add").disabled = false;
                } else {
                    document.getElementById("add").disabled = true;
                }
            }
            function testCode(){
	    	var fn=document.getElementById("fn").value;
	    	var ln=document.getElementById("ln").value;
	    	var phone=document.getElementById("phone").value;
	    	var address=document.getElementById("address").value;
        var date=document.getElementById("date").value;
		    if(fn.length > 3 && ln.length > 3 && phone.length > 9 && address !="" && date !="")
		    {	
		    	document.getElementById("next").disabled =false;
	    	}
	    	else
	    	{
		    	document.getElementById("next").disabled =true;
	    	}
	}
        </script>
              <input disabled class="btn bt" id="add" type="submit" name="add" value="Confirm account">
			     </div>
        </div>
    </div>
</div>
    </form>
    <input disabled class="bt btn" id="next" data-toggle="modal" data-target="#Confirm_mail" style="width:100px" value="Next">  
  </main></div>
      </div>
      <div align="center" class="col-lg-6"><img class="img_logo" src="images/logo2.png" width="160px" height="50px"></div>
    </div>
</div>
    <div class="section_2" align="center">
        <p>
            © Copyright 2020 AML – Abli-Brahimi
        </p>
    </div>
    <script src="bootstrap/js/main.js"></script>
</body>

</html>
<?php } ?>
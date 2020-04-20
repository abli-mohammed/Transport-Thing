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
                    <a class="navbar-brand" href="index.html">
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
                <input  type="text" title="First name" name="firstN" placeholder="First name" style="width:43%">
                <input  type="text" title="Last name" name="lastN" placeholder="Last name" style="width:55%">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
			
      </div>
      E-mail
     <div class="form-group has-feedback">
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <input  type="text" name="email" title="E-mail" placeholder="E-mail">
			</div>
     Mobile number
     <div class="form-group has-feedback">
			<span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                <input  type="text" name="phone" title="Mobile number" placeholder="Mobile number">
			</div>
      <span>Birthday</span>
      <div class="form-group has-feedback">
			<span class="glyphicon glyphicon-calendar form-control-feedback"></span>
              <input  type="date" name="dateB" title="Date of birthday">
			</div>
      <span>Adress</span>
      <div class="form-group has-feedback">
			<span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                <input  type="text" name="adrass" placeholder="Adress">
			</div>
      </div>
      <div><input class="btn" type="submit" name="add" value="Create account" ></div>
    </form></main></div>
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
<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "transport_thing");
$session_id = $_SESSION['id_user'];
if ($session_id == null) {
    header("LOCATION:login.php");
} else {
    $query = mysqli_query($con, "SELECT * FROM `user` WHERE id_user='" . $session_id . "'");
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
            function add_request() {
                var xhttp;
                xhttp = new XMLHttpRequest();
                xhttp.open("GET", "Add request.php", true);
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        document.getElementById("pp").innerHTML = xhttp.responseText;
                        document.getElementById("btn_add_request").style.display = "none";
                    }
                };
            }

            function edit(value) {
                var xhttp;
                xhttp = new XMLHttpRequest();
                xhttp.open("GET", "Add request.php?id=" + value, true);
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        document.getElementById("pp").innerHTML = xhttp.responseText;
                        document.getElementById("btn_add_request").style.display = "block";
                    }
                };
            }

            function info_user() {
                var xhttp;
                xhttp = new XMLHttpRequest();
                xhttp.open("GET", "info_users.php", true);
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        document.getElementById("pp").innerHTML = xhttp.responseText;
                        document.getElementById("pp").style.overflow = "hidden";
                        document.getElementById("pp").style.height = "auto";
                        document.getElementById("btn_add_request").style.display = "block";
                    }
                };
            }

            function user_delivery(value) {
                var xhttp;
                xhttp = new XMLHttpRequest();
                xhttp.open("GET", "user_delivery.php?id_request=" + value, true);
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        document.getElementById("pp").innerHTML = xhttp.responseText;
                        document.getElementById("btn_add_request").style.display = "block";
                    }
                };
            }

            function delivery_request() {
                var xhttp;
                xhttp = new XMLHttpRequest();
                xhttp.open("GET", "delivery_requests.php", true);
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        document.getElementById("pp").innerHTML = xhttp.responseText;
                        document.getElementById("btn_add_request").style.display = "block";
                    }
                };
            }

            function show_request() {
                var xhttp;
                xhttp = new XMLHttpRequest();
                xhttp.open("GET", "show_request.php", true);
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        document.getElementById("pp").innerHTML = xhttp.responseText;
                        document.getElementById("btn_add_request").style.display = "block";
                    }
                };
            }

            function My_delivery() {
                var xhttp;
                xhttp = new XMLHttpRequest();
                xhttp.open("GET", "My_delivery.php", true);
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        document.getElementById("pp").innerHTML = xhttp.responseText;
                        document.getElementById("btn_add_request").style.display = "block";
                    }
                };
            }

            function testAdd() {
                var de = document.getElementById("dest").value;
                var arr = document.getElementById("arrival").value;
                document.getElementById("done").disabled = false;
                if (de.length > 3 && arr.length > 3) {
                    document.getElementById("done").disabled = false;
                } else {
                    document.getElementById("done").disabled = true;
                }
            }

            function testCode() {
                var pass = document.getElementById("password").value;
                var phone = document.getElementById("phone").value;
                var address = document.getElementById("address").value;
                var date = document.getElementById("date").value;
                if (pass.length > 7 && phone.length == 10 && address.length > 2 && date != "") {
                    document.getElementById("add").disabled = false;
                } else {
                    document.getElementById("add").disabled = true;
                }
            }
        </script>
    </head>
    <?php if (isset($_GET['my_delivery']))
        echo "<body onload='My_delivery()'>";
    else echo "<body onload='show_request()'>";
    ?>
    <script>
        function showpass() {
            var pass = document.getElementById("password");
            var eye = document.getElementById("eye");
            if (pass.type === "password") {
                pass.type = "text";
                eye.classList.remove("glyphicon-eye-open");
                eye.classList.add("glyphicon-eye-close");
            } else {
                pass.type = "password";
                eye.classList.add("glyphicon-eye-open");
                eye.classList.remove("glyphicon-eye-close");
            }
        }

        function show_password() {
            var pass = document.getElementById("pass");
            if (pass.type === "password") {
                pass.type = "text";
            } else
                pass.type = "password";
        }
    </script>
    <!-------------------------------------Block_account--------------------------------------------------------->
    <div id="Block_account" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <img class="img_logo" src="images/logo2.png" width="160px" height="50px">
                    <button type="button" class="close" data-dismiss="modal" style="margin-top: 10px;font-size:28px">&times;</button>
                </div>
                <form action="compte.php?block" method="POST">
                    <div class="modal-body">
                        <p style="font-size: 15px;">To complete this process, please enter the password</p>
                        <div class="input-group">
                            <span title="Show password" class="input-group-addon"><svg onclick="show_password()" style="cursor: pointer" class="bi bi-eye-slash-fill" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.5 8a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                                    <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 100-7 3.5 3.5 0 000 7z" clip-rule="evenodd" />
                                </svg></span>
                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Enter your password">
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top:none">
                        <input type="submit" class="btn bt" value="Continue">
                    </div>
                </form>
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
                    <li><a href="#"><span class="color_black"> My profile</span></a></li>
                    <li><a href="management.php"><span class="color_black"> Management</span></a></li>
                    <li><a href="homepage.php"><span class="color_black"> Homepage</span></a></li>
                    <li><a href="compte.php?logout"><span class="color_black"> Logout</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container emp-profile">
        <nav class="nav_profile">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav_profile" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <svg style="color: #007bff;" class="bi bi-list" width="1.9em" height="1.9em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 013 11h10a.5.5 0 010 1H3a.5.5 0 01-.5-.5zm0-4A.5.5 0 013 7h10a.5.5 0 010 1H3a.5.5 0 01-.5-.5zm0-4A.5.5 0 013 3h10a.5.5 0 010 1H3a.5.5 0 01-.5-.5z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </nav>
        <div class="row">
            <div class="col-lg-4 col-md-3 col-sm-4 nav_rigth" id="nav_profile">
                <div align="center"><img class="img_user" src="images/user.png"></div>
                <ul class="nav nav-pills nav-stacked nav_main">
                    <li class="active"><a class="btn_right_1">
                            <svg class="glyp_profile_right bi bi-grid-fill" width="1.3em" height="1.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M1 2.5A1.5 1.5 0 012.5 1h3A1.5 1.5 0 017 2.5v3A1.5 1.5 0 015.5 7h-3A1.5 1.5 0 011 5.5v-3zm8 0A1.5 1.5 0 0110.5 1h3A1.5 1.5 0 0115 2.5v3A1.5 1.5 0 0113.5 7h-3A1.5 1.5 0 019 5.5v-3zm-8 8A1.5 1.5 0 012.5 9h3A1.5 1.5 0 017 10.5v3A1.5 1.5 0 015.5 15h-3A1.5 1.5 0 011 13.5v-3zm8 0A1.5 1.5 0 0110.5 9h3a1.5 1.5 0 011.5 1.5v3a1.5 1.5 0 01-1.5 1.5h-3A1.5 1.5 0 019 13.5v-3z" clip-rule="evenodd" />
                            </svg>
                            <span> Main</span>
                        </a></li>
                    <li><a class="btn_right" href="#home" onclick="add_request()">
                            <svg class="glyp_profile_right bi bi-file-earmark-plus" width="1.9em" height="1.9em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 1H4a2 2 0 00-2 2v10a2 2 0 002 2h5v-1H4a1 1 0 01-1-1V3a1 1 0 011-1h5v2.5A1.5 1.5 0 0010.5 6H13v2h1V6L9 1z" />
                                <path fill-rule="evenodd" d="M13.5 10a.5.5 0 01.5.5v2a.5.5 0 01-.5.5h-2a.5.5 0 010-1H13v-1.5a.5.5 0 01.5-.5z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M13 12.5a.5.5 0 01.5-.5h2a.5.5 0 010 1H14v1.5a.5.5 0 01-1 0v-2z" clip-rule="evenodd" />
                            </svg>
                            <span>Add request</span></a></li>
                    <li><a class="btn_right" href="#home" onclick="show_request()">
                            <svg class="glyp_profile_right bi bi-file-earmark-plus" width="1.9em" height="1.9em" x="0px" y="0px" viewBox="0 0 204.095 204.095" style="enable-background:new 0 0 204.095 204.095;" xml:space="preserve">
                                <path style="fill:#010002;" d="M204.095,74.995l-25.811-34.246l0.075-0.064h-0.132l-0.115-0.154l-0.197,0.154h-35.864
			l4.806-13.385l-43.83-9.505L97.953,2.215L37.349,19.286l8.453,31.999L9.967,79.765v1.535L0,111.7l9.967-7.269v97.449h122.114
			v-0.293l46.185-41.082v-59.459L204.095,74.995z M198.025,74.58l-40.896,41.253l-24.401-33.348l42.152-38.612L198.025,74.58z
			 M166.538,45.276l-37.65,34.489h-0.898l12.404-34.489C140.395,45.276,166.538,45.276,166.538,45.276z M123.109,79.765H62.913
			l22.014-61.195l55.837,12.114L123.109,79.765z M94.95,7.838l2.877,8.825L81.959,13.22l-23.9,66.445L42.953,22.486L94.95,7.838z
			 M47.284,56.875l6.045,22.89H18.757L47.284,56.875z M127.479,197.284H14.559V84.361h112.92V197.284z M173.674,158.446
			l-41.593,36.987V89.378l24.515,33.512l17.078-17.211C173.674,105.68,173.674,158.446,173.674,158.446z" />
                            </svg>
                            <span>Show request</span> </a></li>
                    <li><a class="btn_right" href="#home" onclick="My_delivery()">
                            <svg class="glyp_profile_right bi bi-person" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="1.9em" height="1.9em" viewBox="0 0 53.846 53.846" style="enable-background:new 0 0 53.846 53.846;" xml:space="preserve">
                                <path d="M22.667,43.26c-2.481,0-4.5,2.02-4.5,4.5c0,2.481,2.019,4.5,4.5,4.5s4.5-2.019,4.5-4.5
			C27.167,45.279,25.148,43.26,22.667,43.26z M22.667,50.26c-1.378,0-2.5-1.121-2.5-2.5c0-1.378,1.122-2.5,2.5-2.5
			c1.378,0,2.5,1.122,2.5,2.5C25.167,49.139,24.045,50.26,22.667,50.26z" />
                                <path d="M42.768,43.26c-2.48,0-4.5,2.02-4.5,4.5c0,2.481,2.02,4.5,4.5,4.5c2.481,0,4.5-2.019,4.5-4.5
			C47.268,45.279,45.249,43.26,42.768,43.26z M42.768,50.26c-1.377,0-2.5-1.121-2.5-2.5c0-1.378,1.123-2.5,2.5-2.5
			c1.379,0,2.5,1.122,2.5,2.5C45.268,49.139,44.146,50.26,42.768,50.26z" />
                                <path d="M48.471,15.172l-0.099-0.02l-5.464,0.032c-0.425-0.041-0.947-0.034-1.195,0l-8.078,0.04l-7.991-0.034
			c-0.437-0.045-0.974-0.041-1.197-0.011l-5.561-0.027l-0.099,0.02c-2.046,0.405-3.688,1.714-4.595,3.428L10.307,2.114
			c-0.105-0.453-0.508-0.528-0.974-0.528H1c-0.552,0-1,0.448-1,1c0,0.553,0.448,1,1,1h7.539L15.751,34.4
			c0.001,0.006,0.004-0.113,0.006-0.108c0.551,2.687,2.646,4.671,5.344,5.158c0.12,0.032,0.24,0.034,0.363,0.058l0.1,0.005
			l0.637-0.011l-0.005-1.004l0.133,0.999l11.297-0.058l11.308,0.057l0.004-1.001l0.123,1l0.638,0.004l0.101-0.021
			c0.123-0.024,0.242-0.058,0.351-0.09c2.725-0.488,4.831-2.556,5.368-5.266l2.201-11.111
			C54.432,19.404,52.078,15.887,48.471,15.172z M51.756,22.623l-2.203,11.111c-0.375,1.896-1.851,3.344-3.758,3.686l-0.158,0.038
			c-0.047,0.013-0.097,0.026-0.146,0.038l-11.867-0.059l-11.857,0.059c-0.049-0.012-0.097-0.025-0.146-0.038l-0.157-0.038
			c-1.908-0.342-3.383-1.788-3.759-3.686l-2.202-11.111c-0.494-2.494,1.107-4.927,3.58-5.469l5.451,0.021
			c0.296-0.026,0.506-0.032,1.001,0.01l8.1,0.04l8.188-0.045c0.305-0.031,0.502-0.036,1,0l5.354-0.026
            C50.648,17.696,52.249,20.128,51.756,22.623z" /></svg>
                            <span>My delivery </span>
                        </a></li>
                    <li><a class="btn_right" href="#home" onclick="delivery_request()">
                            <svg class="glyp_profile_right bi bi-file-earmark-plus" width="1.9em" height="1.9em" version="1.1" x="0px" y="0px" viewBox="0 0 319.86 319.86" xml:space="preserve">
                                <g>
                                    <g>
                                        <path style="fill:#010002;" d="M283.587,73.922h-16.301V57.393c0-20.005-16.274-36.273-36.273-36.273H36.273
			C16.268,21.12,0,37.388,0,57.393v114.193c0,20.005,16.274,36.273,36.273,36.273h16.306v16.529
			c0,20.005,16.274,36.279,36.273,36.279h146.991l30.589,36.148c1.05,1.246,2.584,1.925,4.15,1.925c0.625,0,1.256-0.114,1.871-0.337
			c2.143-0.789,3.568-2.828,3.568-5.102v-32.634h7.566c20.005,0,36.273-16.274,36.273-36.279V110.201
			C319.866,90.196,303.592,73.922,283.587,73.922z M36.273,196.981c-14.006,0-25.395-11.389-25.395-25.395V57.393
			c0-14,11.395-25.395,25.395-25.395h194.735c14.006,0,25.395,11.395,25.395,25.395v16.529H88.853
			c-20.005,0-36.273,16.274-36.273,36.279v86.78H36.273z M308.988,224.389c0,14-11.395,25.4-25.395,25.4h-13.005
			c-3.002,0-5.439,2.431-5.439,5.439v23.225l-22.626-26.738c-1.033-1.224-2.551-1.925-4.15-1.925H88.853
			c-14.006,0-25.395-11.4-25.395-25.4v-16.529v-10.878v-86.78c0-14.006,11.395-25.4,25.395-25.4h167.556h10.878h16.306
			c14.006,0,25.395,11.395,25.395,25.4V224.389z" />
                            </svg>
                            <span>Delivery request</span></a></li>
                </ul>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a class="btn_right_1" href="#">
                            <svg class="glyp_profile_right bi bi-gear-fill" width="1.3em" height="1.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 01-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 01.872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 012.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 012.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 01.872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 01-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 01-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 100-5.86 2.929 2.929 0 000 5.858z" clip-rule="evenodd" />
                            </svg>
                            <span>Sittings</span></a></li>
                    <li><a class="btn_right" href="#home" onclick="info_user()">
                            <svg class="glyp_profile_right bi bi-person" width="1.9em" height="1.9em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 00.014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 00.022.004zm9.974.056v-.002.002zM8 7a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                            <span>Personal information</span>
                        </a></li>
                    <li><a class="btn_right" href="#home">

                            <svg class="glyp_profile_right bi bi-type" width="1.7em" height="1.7em" viewBox="0 0 205.229 205.229" xml:space="preserve">
                                <path style="fill:#010002;" d="M102.618,205.229c-56.585,0-102.616-46.031-102.616-102.616C0.002,46.031,46.033,0,102.618,0
					C159.2,0,205.227,46.031,205.227,102.613C205.227,159.198,159.2,205.229,102.618,205.229z M102.618,8.618
					c-51.829,0-94.002,42.166-94.002,93.995s42.17,93.995,94.002,93.995c51.825,0,93.988-42.162,93.988-93.995
					C196.606,50.784,154.444,8.618,102.618,8.618z" />
                                <path style="fill:#010002;" d="M104.941,62.111c-48.644,0-84.94-10.704-87.199-11.388l2.494-8.253
					c0.816,0.247,82.657,24.336,164.38-0.004l2.452,8.26C158.405,59.266,130.021,62.111,104.941,62.111z" />
                                <path style="fill:#010002;" d="M20.416,160.572l-2.459-8.26c84.271-25.081,165.898-1.027,169.333,0l-2.494,8.256
					C183.976,160.318,102.142,136.24,20.416,160.572z" />
                                <path style="fill:#010002;" d="M69.399,196.168C26.933,96.747,63.584,8.604,63.959,7.727l7.927,3.378
					c-0.365,0.845-35.534,85.756,5.44,181.677L69.399,196.168z" />
                                <path style="fill:#010002;" d="M135.168,196.168l-7.927-3.382c40.971-95.92,5.801-180.832,5.436-181.677l7.927-3.378
					C140.973,8.604,177.627,96.747,135.168,196.168z" />
                            </svg>
                            <span>language</span>
                        </a></li>
                </ul>
            </div>
            <div class="col-lg-8 col-md-9 col-sm-8 col-xs-12">
                <div class="row">
                    <div class="col-lg-12 col-md-10 col-sm-12">
                        <div>
                            <h1 class="username_profil"><?php echo $ligne['firstname'];
                                                        echo " ";
                                                        echo $ligne['lastname']; ?>
                                <span style="font-size: 30px" class="glyphicon glyphicon-star"></span></h1>
                            <div><svg class="glyp_profile bi bi-envelope-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
                                    <path d="M.05 3.555L8 8.414l7.95-4.859A2 2 0 0014 2H2A2 2 0 00.05 3.555zM16 4.697l-5.875 3.59L16 11.743V4.697zm-.168 8.108L9.157 8.879 8 9.586l-1.157-.707-6.675 3.926A2 2 0 002 14h12a2 2 0 001.832-1.195zM0 11.743l5.875-3.456L0 4.697v7.046z" />
                                </svg> <span>
                                    <?php echo $ligne['email']; ?></span>
                            </div>
                            <div><span class="glyphicon glyphicon-earphone"></span><span class="glyp_profile"> +213
                                    <?php echo $ligne['phone']; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 2px solid #2980B9;">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div id="pp"></div>
                        <div class="btn_add_request" id="btn_add_request" title="Add Request" onclick="add_request()">
                            <svg style="margin: 5px" class="bi bi-file-earmark-plus" width="1.9em" height="1.9em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 1H4a2 2 0 00-2 2v10a2 2 0 002 2h5v-1H4a1 1 0 01-1-1V3a1 1 0 011-1h5v2.5A1.5 1.5 0 0010.5 6H13v2h1V6L9 1z" />
                                <path fill-rule="evenodd" d="M13.5 10a.5.5 0 01.5.5v2a.5.5 0 01-.5.5h-2a.5.5 0 010-1H13v-1.5a.5.5 0 01.5-.5z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M13 12.5a.5.5 0 01.5-.5h2a.5.5 0 010 1H14v1.5a.5.5 0 01-1 0v-2z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p id="home"></p>
    </body>

    </html>
<?php } ?>
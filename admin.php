<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "transport_thing");
$session_id = $_SESSION['id_user'];
if ($session_id == null) {
    header("LOCATION:login.html");
} else {
    $query = mysqli_query($con, "SELECT * FROM `user` WHERE id_user='" . $session_id . "'");
    $ligne = mysqli_fetch_array($query);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>
            <?php echo $ligne['username']; ?>
        </title>
        <link rel="shortcut icon" href="images/logo2f_icon.ico" />
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="styles/bootstrap-2.min.css" rel="stylesheet">
        <link href="styles/css.css" rel="stylesheet">
        <link href="styles/layout.css" rel="stylesheet" type="text/css" media="all">
        <script>
            function id_request(value) {
                var xhttp;
                xhttp = new XMLHttpRequest();
                xhttp.open("GET", "request.php?id_request=" + value, true);
                xhttp.send();
            }

            function confirm_delivery(value) {
                var xhttp;
                xhttp = new XMLHttpRequest();
                xhttp.open("GET", "request.php?confirm_delivery=" + value, true);
                xhttp.send();
                location.reload();
            }

            function search(a, b, c) {
                var xhttp;
                xhttp = new XMLHttpRequest();
                xhttp.open("GET", "search.php?type=" + a + "&dest=" + b + "&is_free=" + c, true);
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        document.getElementById("ss").innerHTML = xhttp.responseText;
                    }
                };
            }

            function testsearch() {
                var de = document.getElementById("dest").value;
                if (de.length > 0) {
                    document.getElementById("done_search").disabled = false;
                } else {
                    document.getElementById("done_search").disabled = true;
                }
            }

            function testAmount() {
                var amount = document.getElementById('amount').value;
                if (amount != "")
                    document.getElementById('confirm_a').disabled = false;
                else
                    document.getElementById('confirm_a').disabled = true;
            }

            function add_request() {
                var xhttp;
                xhttp = new XMLHttpRequest();
                xhttp.open("GET", "Add request_a.php", true);
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

            function stistics() {
                var xhttp;
                xhttp = new XMLHttpRequest();
                xhttp.open("GET", "stistics.php", true);
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        document.getElementById("pp").innerHTML = xhttp.responseText;
                        document.getElementById("btn_add_request").style.display = "block";
                    }
                };
            }

            function homepage() {
                var xhttp;
                xhttp = new XMLHttpRequest();
                xhttp.open("GET", "admin_homepage.php", true);
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        document.getElementById("pp").innerHTML = xhttp.responseText;
                        document.getElementById("btn_add_request").style.display = "none";
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

    <body onload="stistics()">
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
                            <input type="text" class="form-control" onkeyup="testAmount()" id="amount" placeholder="">
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top:none">
                        <input disabled id="confirm_a" class="btn bt" data-dismiss="modal" onclick="confirm_delivery(document.getElementById('amount').value)" type="submit" name="add" value="Confirm delivery">
                        <input class="btn bt" data-dismiss="modal" onclick="confirm_delivery('0')" type="submit" value="For free">
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------------------------->

        <div id="wrapper">
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-icon">
                        <img src="images/t_r.png" width="50px" height="45px" />
                    </div>
                    <div class="sidebar-brand-text" style="margin-left: 5px;"><img src="images/t_r2.png" width="90px" height="45px" /></div>
                </a>
                <hr class="sidebar-divider my-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#" onclick="homepage()">
                        <svg class="icon_svg bi bi-house-door-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.5 10.995V14.5a.5.5 0 01-.5.5H2a.5.5 0 01-.5-.5v-7a.5.5 0 01.146-.354l6-6a.5.5 0 01.708 0l6 6a.5.5 0 01.146.354v7a.5.5 0 01-.5.5h-4a.5.5 0 01-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z" />
                            <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd" />
                        </svg>
                        <span>Home Page</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Profile Menu
                </div>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" onclick="add_request()">
                        <svg class="icon_svg bi bi-file-earmark-plus" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 1H4a2 2 0 00-2 2v10a2 2 0 002 2h5v-1H4a1 1 0 01-1-1V3a1 1 0 011-1h5v2.5A1.5 1.5 0 0010.5 6H13v2h1V6L9 1z" />
                            <path fill-rule="evenodd" d="M13.5 10a.5.5 0 01.5.5v2a.5.5 0 01-.5.5h-2a.5.5 0 010-1H13v-1.5a.5.5 0 01.5-.5z" clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M13 12.5a.5.5 0 01.5-.5h2a.5.5 0 010 1H14v1.5a.5.5 0 01-1 0v-2z" clip-rule="evenodd" />
                        </svg>
                        <span>Add Request</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" onclick="show_request()">
                        <svg class="icon_svg bi bi-file-earmark-text" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 1h5v1H4a1 1 0 00-1 1v10a1 1 0 001 1h8a1 1 0 001-1V6h1v7a2 2 0 01-2 2H4a2 2 0 01-2-2V3a2 2 0 012-2z" />
                            <path d="M9 4.5V1l5 5h-3.5A1.5 1.5 0 019 4.5z" />
                            <path fill-rule="evenodd" d="M5 11.5a.5.5 0 01.5-.5h2a.5.5 0 010 1h-2a.5.5 0 01-.5-.5zm0-2a.5.5 0 01.5-.5h5a.5.5 0 010 1h-5a.5.5 0 01-.5-.5zm0-2a.5.5 0 01.5-.5h5a.5.5 0 010 1h-5a.5.5 0 01-.5-.5z" clip-rule="evenodd" />
                        </svg>
                        <span>Show Request</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" onclick="My_delivery()">
                        <svg class="icon_svg bi bi-inboxes" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M.125 11.17A.5.5 0 01.5 11H6a.5.5 0 01.5.5 1.5 1.5 0 003 0 .5.5 0 01.5-.5h5.5a.5.5 0 01.496.562l-.39 3.124A1.5 1.5 0 0114.117 16H1.883a1.5 1.5 0 01-1.489-1.314l-.39-3.124a.5.5 0 01.121-.393zm.941.83l.32 2.562a.5.5 0 00.497.438h12.234a.5.5 0 00.496-.438l.32-2.562H10.45a2.5 2.5 0 01-4.9 0H1.066zM3.81.563A1.5 1.5 0 014.98 0h6.04a1.5 1.5 0 011.17.563l3.7 4.625a.5.5 0 01-.78.624l-3.7-4.624A.5.5 0 0011.02 1H4.98a.5.5 0 00-.39.188L.89 5.812a.5.5 0 11-.78-.624L3.81.563z" clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M.125 5.17A.5.5 0 01.5 5H6a.5.5 0 01.5.5 1.5 1.5 0 003 0A.5.5 0 0110 5h5.5a.5.5 0 01.496.562l-.39 3.124A1.5 1.5 0 0114.117 10H1.883A1.5 1.5 0 01.394 8.686l-.39-3.124a.5.5 0 01.121-.393zm.941.83l.32 2.562A.5.5 0 001.884 9h12.234a.5.5 0 00.496-.438L14.933 6H10.45a2.5 2.5 0 01-4.9 0H1.066z" clip-rule="evenodd" />
                        </svg>
                        <span>My Delivery</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" onclick="delivery_request()">
                        <svg class="icon_svg bi bi-chat-square-quote" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14 1H2a1 1 0 00-1 1v8a1 1 0 001 1h2.5a2 2 0 011.6.8L8 14.333 9.9 11.8a2 2 0 011.6-.8H14a1 1 0 001-1V2a1 1 0 00-1-1zM2 0a2 2 0 00-2 2v8a2 2 0 002 2h2.5a1 1 0 01.8.4l1.9 2.533a1 1 0 001.6 0l1.9-2.533a1 1 0 01.8-.4H14a2 2 0 002-2V2a2 2 0 00-2-2H2z" clip-rule="evenodd" />
                            <path d="M7.468 5.667c0 .92-.776 1.666-1.734 1.666S4 6.587 4 5.667C4 4.747 4.776 4 5.734 4s1.734.746 1.734 1.667z" />
                            <path fill-rule="evenodd" d="M6.157 4.936a.438.438 0 01-.56.293.413.413 0 01-.274-.527c.08-.23.23-.44.477-.546a.891.891 0 01.698.014c.387.16.72.545.923.997.428.948.393 2.377-.942 3.706a.446.446 0 01-.612.01.405.405 0 01-.011-.59c1.093-1.087 1.058-2.158.77-2.794-.152-.336-.354-.514-.47-.563z" clip-rule="evenodd" />
                            <path d="M11.803 5.667c0 .92-.776 1.666-1.734 1.666-.957 0-1.734-.746-1.734-1.666 0-.92.777-1.667 1.734-1.667.958 0 1.734.746 1.734 1.667z" />
                            <path fill-rule="evenodd" d="M10.492 4.936a.438.438 0 01-.56.293.413.413 0 01-.274-.527c.08-.23.23-.44.477-.546a.891.891 0 01.698.014c.387.16.72.545.924.997.428.948.392 2.377-.942 3.706a.446.446 0 01-.613.01.405.405 0 01-.011-.59c1.093-1.087 1.058-2.158.77-2.794-.152-.336-.354-.514-.469-.563z" clip-rule="evenodd" />
                        </svg>
                        <span>Delivery Request</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Sittings
                </div>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" onclick="info_user()">
                        <svg class="icon_svg bi bi-person" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 00.014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 00.022.004zm9.974.056v-.002.002zM8 7a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                        <span>Personal information</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" onclick="stistics()">
                        <svg class="icon_svg bi bi-graph-up" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h1v16H0V0zm1 15h15v1H1v-1z" />
                            <path fill-rule="evenodd" d="M14.39 4.312L10.041 9.75 7 6.707l-3.646 3.647-.708-.708L7 5.293 9.959 8.25l3.65-4.563.781.624z" clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M10 3.5a.5.5 0 01.5-.5h4a.5.5 0 01.5.5v4a.5.5 0 01-1 0V4h-3.5a.5.5 0 01-.5-.5z" clip-rule="evenodd" />
                        </svg>
                        <span>Statistics</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                        <span>Language</span></a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="login.html">English</a>
                            <a class="collapse-item" href="register.html">العربية</a>
                        </div>
                    </div>
                </li>

                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle" onclick="hide()">
                        <svg id="hide1" style="display:block;margin:5px;margin-left: 1px;color:#fff" class="bi bi-caret-left-fill" width="1.7em" height="1.7em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.86 8.753l5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 00-1.659-.753l-5.48 4.796a1 1 0 000 1.506z" />
                        </svg>
                        <svg id="hide2" style="display:none;margin:5px;margin-left: 1px;color:#fff" class="bi bi-caret-right-fill" width="1.7em" height="1.7em" viewBox="0 0 16 16" fill="currentColor">
                            <path d="M12.14 8.753l-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 011.659-.753l5.48 4.796a1 1 0 010 1.506z" />
                        </svg>
                    </button>
                    <script>
                        function hide() {
                            var h1 = document.getElementById("hide1").style;
                            var h2 = document.getElementById("hide2").style;
                            if (h1.display == "block") {
                                h1.display = "none"
                                h2.display = "block"
                            } else {
                                h1.display = "block"
                                h2.display = "none"
                            }

                        }
                    </script>
                </div>

            </ul>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <svg style="margin-left: -5px;" class="bi bi-list" width="1.6em" height="1.6em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 013 11h10a.5.5 0 010 1H3a.5.5 0 01-.5-.5zm0-4A.5.5 0 013 7h10a.5.5 0 010 1H3a.5.5 0 01-.5-.5zm0-4A.5.5 0 013 3h10a.5.5 0 010 1H3a.5.5 0 01-.5-.5z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg class="bi bi-bell-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 16a2 2 0 002-2H6a2 2 0 002 2zm.995-14.901a1 1 0 10-1.99 0A5.002 5.002 0 003 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                                    </svg>
                                    <span class="badge badge-danger badge-counter">3+</span>
                                </a>
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Delivery Requests
                                    </h6>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary">
                                                <i class="fas fa-file-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 12, 2019</div>
                                            <span class="font-weight-bold">Abli mohammed</span>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-success">
                                                <i class="fas fa-donate text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 7, 2019</div>
                                            $290.29 has been deposited into your account!
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-warning">
                                                <i class="fas fa-exclamation-triangle text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 2, 2019</div>
                                            Spending Alert: We've noticed unusually high spending for your account.
                                        </div>
                                    </a>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                </div>
                            </li>
                            <div class="topbar-divider d-none d-sm-block"></div>
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span style="text-transform: capitalize" class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $ligne['firstname'];
                                                                                                                                    echo " ";
                                                                                                                                    echo $ligne['lastname']; ?></span>
                                    <img class="img-profile rounded-circle" src="images/user_home.png">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <svg class="bi bi-power" width="1.2em" height="1.2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M5.578 4.437a5 5 0 104.922.044l.5-.866a6 6 0 11-5.908-.053l.486.875z" clip-rule="evenodd" />
                                            <path fill-rule="evenodd" d="M7.5 8V1h1v7h-1z" clip-rule="evenodd" />
                                        </svg> Logout
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <div class="container-fluid">
                        <div class="row" id="pp">
                        </div>
                        <div class="btn_add_request" id="btn_add_request" title="Add Request" onclick="add_request()">
                            <svg style="margin: 7px" class="bi bi-file-earmark-plus" width="1.9em" height="1.9em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 1H4a2 2 0 00-2 2v10a2 2 0 002 2h5v-1H4a1 1 0 01-1-1V3a1 1 0 011-1h5v2.5A1.5 1.5 0 0010.5 6H13v2h1V6L9 1z" />
                                <path fill-rule="evenodd" d="M13.5 10a.5.5 0 01.5.5v2a.5.5 0 01-.5.5h-2a.5.5 0 010-1H13v-1.5a.5.5 0 01.5-.5z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M13 12.5a.5.5 0 01.5-.5h2a.5.5 0 010 1H14v1.5a.5.5 0 01-1 0v-2z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-primary" href="login.html">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="bootstrap/jquery/jquery.min.js"></script>
                    <script src="bootstrap/jss/bootstrap.bundle.min.js"></script>
                    <script src="bootstrap/jss/bootstrap-2.min.js"></script>
    </body>

    </html>
<?php } ?>
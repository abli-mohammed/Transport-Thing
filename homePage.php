<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "transport_thing");
$session_id = $_SESSION['id_user'];
$resulte = mysqli_query($con, "SELECT * FROM `type_thing`");
if ($session_id == null) {
    header("LOCATION:login.html");
} else {
    $query = mysqli_query($con, "SELECT * FROM `user` WHERE id_user='" . $session_id . "'");
    $query_r = mysqli_query($con, "SELECT * FROM `request` INNER JOIN `type_thing` ON request.id_type=type_thing.id_type 
AND id_user!='" . $session_id . "' ORDER BY date DESC LIMIT 12");
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

            <!-------------------------------------------------Search------------------------------------------------------------>
            <div class="col-lg-4"></div>
            <div class="col-lg-8">
                <div class="form-group has-feedback has-primary">
                    <label>Enter the destination</label>
                    <div>
                        <div class="form-group has-primary has-feedback">
                            <input id="dest" onkeyup="testsearch()" class="sujet1 form-control" type="text" placeholder="Destination">
                            <span class="form-control-feedback">
                                <svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd" />
                                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="input-dom">
                    <div class="form-group has-feedback has-primary">
                        <label>Filter your search</label>
                        <div>
                            <div class="sujet1 input-group">
                                <select id="is_free" class="sujet1 form-control">
                                    <option value="1">Is free</option>
                                    <option value="0">For a fee</option>
                                </select>
                                <span class="span_dom input-group-addon"></span>
                                <select id="type" class="sujet1 form-control">
                                    <?php
                                    while ($ligne = @mysqli_fetch_array($resulte)) {
                                        $id_type = $ligne['id_type'];
                                        $type = $ligne['type_thing'];
                                        echo '<option value=' . $id_type . '>' . $type . '</option>';
                                    }
                                    ?>
                                    <option>All types</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div align="right"><input class="btn bt" disabled onclick="search(document.getElementById('type').value,document.getElementById('dest').value,document.getElementById('is_free').value)" type="submit" id="done_search" value="Search requests">
                    </div>
                </div>
                <br>
            </div>

            <!------------------------------------------------------------------------------------------------------------->
            <div class="row" id="ss">
                <div class="z col-lg-12">
                    <?php
                    while ($ligne = mysqli_fetch_array($query_r)) {
                        $id_request = $ligne['id_request'];
                        echo
                            "<div class='col-lg-4 col-md-4 col-sm-5  card'>
                            <span style='color: #fff;' class='label label-default'>",$ligne['date'],"</span>
                            <h2>
                <img src='images/",
                            $ligne['type_thing'],
                            ".png' width='80px' height='80px'>
                <span>",
                            $ligne['type_thing'],
                            "</span></h2>
                  <p>Destination ",
                            $ligne['destination'],
                            "</p>
                     <p>Arrival ",
                            $ligne['arrival'],
                            "</p>";
                        if ($ligne['is_free'] == 1)
                            echo "<span>Is free</span>";
                        else echo "<span>For a fee</span>";
                        if ($ligne['is_emergency'] == 1)
                            echo "<span> and is emergency</span>";
                        $query_p = mysqli_query($con, "SELECT * FROM `proposition_users` WHERE id_user='" . $session_id . "' AND id_request='" . $id_request . "'");
                        if (mysqli_num_rows($query_p) > 0) {
                            echo '<br><div align="right">
                        <button disabled class="btn" style="position: relative;z-index: 1;background-color: #007bff;color: #fff;margin-top: 15px;">
                        Delivery request</button>
                        </div></div>';
                        } else {
                            echo '<br><div align="right">
                       <a  class="btn" onclick="id_request(' . $id_request . ')" data-toggle="modal" data-target="#Confirm_delivery" style="position: relative;z-index: 1;background-color: #007bff;color: #fff;margin-top: 15px;">
                       Delivery request</a>
                       </div></div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php } ?>
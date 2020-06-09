<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "transport_thing");
$session_id = $_SESSION['id_user'];
if (empty($session_id)) {
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
        <script src="styles/transport_thing.js"></script>
    </head>
    <?php if (isset($_GET['my_delivery']))
        echo "<body onload='My_delivery()'>";
    else echo "<body onload='show_request()'>";
    ?>
    <!-------------------------------------Block_account--------------------------------------------------------->
    <div id="Block_account" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <img class="img_logo" src="images/Logo2f.png" width="160px" height="50px">
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
                    <li><a href="#"><span class="color_black" style="text-transform: capitalize;"> <?php echo $ligne['firstname'];echo " ";echo $ligne['lastname'];?></span></a></li>
                    <li><a href="homepage.php"><span class="color_black"> Requests</span></a></li>
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
                            <svg  style="margin-bottom: -5px;" class="glyp_profile_right bi bi-grid-fill" width="1.3em" height="1.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M1 2.5A1.5 1.5 0 012.5 1h3A1.5 1.5 0 017 2.5v3A1.5 1.5 0 015.5 7h-3A1.5 1.5 0 011 5.5v-3zm8 0A1.5 1.5 0 0110.5 1h3A1.5 1.5 0 0115 2.5v3A1.5 1.5 0 0113.5 7h-3A1.5 1.5 0 019 5.5v-3zm-8 8A1.5 1.5 0 012.5 9h3A1.5 1.5 0 017 10.5v3A1.5 1.5 0 015.5 15h-3A1.5 1.5 0 011 13.5v-3zm8 0A1.5 1.5 0 0110.5 9h3a1.5 1.5 0 011.5 1.5v3a1.5 1.5 0 01-1.5 1.5h-3A1.5 1.5 0 019 13.5v-3z" clip-rule="evenodd" />
                            </svg>
                            <span > Main</span>
                        </a></li>
                    <li><a class="btn_right" href="#" onclick="add_request()">
                            <svg class="glyp_profile_right bi bi-file-earmark-plus" width="1.9em" height="1.9em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 1H4a2 2 0 00-2 2v10a2 2 0 002 2h5v-1H4a1 1 0 01-1-1V3a1 1 0 011-1h5v2.5A1.5 1.5 0 0010.5 6H13v2h1V6L9 1z" />
                                <path fill-rule="evenodd" d="M13.5 10a.5.5 0 01.5.5v2a.5.5 0 01-.5.5h-2a.5.5 0 010-1H13v-1.5a.5.5 0 01.5-.5z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M13 12.5a.5.5 0 01.5-.5h2a.5.5 0 010 1H14v1.5a.5.5 0 01-1 0v-2z" clip-rule="evenodd" />
                            </svg>
                            <span>Add request</span></a></li>
                    <li><a class="btn_right" href="#" onclick="show_request()">
                            <svg class="glyp_profile_right bi bi-cart4" width="1.9em" height="1.9em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                            </svg>
                            <span>requests</span> </a></li>
                    <li><a class="btn_right" href="#" onclick="My_delivery()">
                            <svg class="glyp_profile_right bi bi-archive" width="1.9em" height="1.9em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2 5v7.5c0 .864.642 1.5 1.357 1.5h9.286c.715 0 1.357-.636 1.357-1.5V5h1v7.5c0 1.345-1.021 2.5-2.357 2.5H3.357C2.021 15 1 13.845 1 12.5V5h1z" />
                                <path fill-rule="evenodd" d="M5.5 7.5A.5.5 0 0 1 6 7h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5zM15 2H1v2h14V2zM1 1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H1z" />
                            </svg>
                            <span>deliveries </span>
                        </a></li>
                    <li><a class="btn_right" href="#" onclick="delivery_request()">
                            <svg class="glyp_profile_right bi bi-basket" width="1.9em" height="1.9em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.243 1.071a.5.5 0 0 1 .686.172l3 5a.5.5 0 1 1-.858.514l-3-5a.5.5 0 0 1 .172-.686zm-4.486 0a.5.5 0 0 0-.686.172l-3 5a.5.5 0 1 0 .858.514l3-5a.5.5 0 0 0-.172-.686z" />
                                <path fill-rule="evenodd" d="M1 7v1h14V7H1zM.5 6a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h15a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5H.5z" />
                                <path fill-rule="evenodd" d="M14 9H2v5a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V9zM2 8a1 1 0 0 0-1 1v5a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V9a1 1 0 0 0-1-1H2z" />
                                <path fill-rule="evenodd" d="M4 10a.5.5 0 0 1 .5.5v3a.5.5 0 1 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 1 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 1 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 1 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 1 1-1 0v-3a.5.5 0 0 1 .5-.5z" />
                            </svg>
                            <span>Delivery request</span></a></li>
                </ul>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a class="btn_right_1" href="#">
                            <svg  style="margin-bottom: -5px;" class="glyp_profile_right bi bi-gear-fill" width="1.3em" height="1.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 01-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 01.872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 012.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 012.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 01.872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 01-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 01-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 100-5.86 2.929 2.929 0 000 5.858z" clip-rule="evenodd" />
                            </svg>
                            <span>Sittings</span></a></li>
                    <li><a class="btn_right" href="#home" onclick="info_user()">
                            <svg class="glyp_profile_right bi bi-person" width="1.9em" height="1.9em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 00.014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 00.022.004zm9.974.056v-.002.002zM8 7a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                            <span>Personal information</span>
                        </a></li>
                    <?php
                    if ($ligne['type'] == '1') {
                    ?>
                        </li>
                        <li><a class="btn_right" href="#home" onclick="statistics()">
                                <svg class="glyp_profile_right bi bi-graph-up" width="1.9em" height="1.9em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h1v16H0V0zm1 15h15v1H1v-1z" />
                                    <path fill-rule="evenodd" d="M14.39 4.312L10.041 9.75 7 6.707l-3.646 3.647-.708-.708L7 5.293 9.959 8.25l3.65-4.563.781.624z" />
                                    <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4h-3.5a.5.5 0 0 1-.5-.5z" />
                                </svg>
                                <span>Statistics</span></a></li>
                    <?php
                    }
                    ?>
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
                                                        echo $ligne['lastname'];
                                                        if ($ligne['type'] == '1') echo ' <svg class="bi bi-star-fill" width="0.8em" height="0.8em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                          </svg>'; ?> </h1>
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
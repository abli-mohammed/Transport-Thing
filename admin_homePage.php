<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "transport_thing");
$session_id = $_SESSION['id_user'];
$resulte = mysqli_query($con, "SELECT * FROM `type_thing`");
    $query = mysqli_query($con, "SELECT * FROM `user` WHERE id_user='" . $session_id . "'");
    $query_r = mysqli_query($con, "SELECT * FROM `request` INNER JOIN `type_thing` ON request.id_type=type_thing.id_type 
AND id_user!='" . $session_id . "' ORDER BY date DESC LIMIT 12");
    $ligne = mysqli_fetch_array($query);
?>
            <!-------------------------------------------------Search------------------------------------------------------------>
            <div class="col-lg-4"></div>
            <div class="col-lg-8">
                <div class="form-group has-feedback has-primary">
                    <label>Enter the destination</label>
                    <div>
                        <div class="form-group has-primary has-feedback">
                            <input id="dest" onkeyup="testsearch()" class="sujet1 form-control" type="text" placeholder="Destination">
                            <span class="form-control-feedback"></span>
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
            </div></div>

            <!------------------------------------------------------------------------------------------------------------->
                <div class="row" id="ss">
                <?php
                    while ($ligne = mysqli_fetch_array($query_r)) {
                        $id_request = $ligne['id_request'];
                        echo
                            "<div class='col-lg-4 col-md-5 col-sm-12  card1'>
                            <span style='color: #333;' class='label label-default'>",$ligne['date'],"</span>
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

    
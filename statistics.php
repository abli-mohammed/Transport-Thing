<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "transport_thing");
$query1 = mysqli_query($con, "SELECT * FROM `user`");
$query2 = mysqli_query($con, "SELECT * FROM `request`");
$query3 = mysqli_query($con, "SELECT * FROM `proposition_users`");
$query4 = mysqli_query($con, "SELECT * FROM `user` WHERE status='2'");
?>
<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 cardS" id="users" onclick="show_users()">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="width:60%">
        <div>USERS</div>
        <p><?php echo mysqli_num_rows($query1); ?></p>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="width:40%">
        <svg class="bi bi-people-fill" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 100-6 3 3 0 000 6zm-5.784 6A2.238 2.238 0 015 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 005 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" clip-rule="evenodd" />
        </svg>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 cardS">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="width:60%">
        <div>REQUESTS</div>
        <p><?php echo mysqli_num_rows($query2); ?></p>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="width:40%">
        <svg class="bi bi-chat-square-quote-fill" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M0 2a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2h-2.5a1 1 0 00-.8.4l-1.9 2.533a1 1 0 01-1.6 0L5.3 12.4a1 1 0 00-.8-.4H2a2 2 0 01-2-2V2zm7.194 2.766c.087.124.163.26.227.401.428.948.393 2.377-.942 3.706a.446.446 0 01-.612.01.405.405 0 01-.011-.59c.419-.416.672-.831.809-1.22-.269.165-.588.26-.93.26C4.775 7.333 4 6.587 4 5.667 4 4.747 4.776 4 5.734 4c.271 0 .528.06.756.166l.008.004c.169.07.327.182.469.324.085.083.161.174.227.272zM11 7.073c-.269.165-.588.26-.93.26-.958 0-1.735-.746-1.735-1.666 0-.92.777-1.667 1.734-1.667.271 0 .528.06.756.166l.008.004c.17.07.327.182.469.324.085.083.161.174.227.272.087.124.164.26.228.401.428.948.392 2.377-.942 3.706a.446.446 0 01-.613.01.405.405 0 01-.011-.59c.42-.416.672-.831.81-1.22z" clip-rule="evenodd" />
        </svg>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 cardS">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="width:60%">
        <div>DELIVERY REQUESTS</div>
        <p><?php echo mysqli_num_rows($query3); ?></p>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="width:40%">
        <svg class="bi bi-inboxes-fill" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M.125 11.17A.5.5 0 01.5 11H6a.5.5 0 01.5.5 1.5 1.5 0 003 0 .5.5 0 01.5-.5h5.5a.5.5 0 01.496.562l-.39 3.124A1.5 1.5 0 0114.117 16H1.883a1.5 1.5 0 01-1.489-1.314l-.39-3.124a.5.5 0 01.121-.393zM3.81.563A1.5 1.5 0 014.98 0h6.04a1.5 1.5 0 011.17.563l3.7 4.625a.5.5 0 01-.78.624l-3.7-4.624A.5.5 0 0011.02 1H4.98a.5.5 0 00-.39.188L.89 5.812a.5.5 0 11-.78-.624L3.81.563z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M.125 5.17A.5.5 0 01.5 5H6a.5.5 0 01.5.5 1.5 1.5 0 003 0A.5.5 0 0110 5h5.5a.5.5 0 01.496.562l-.39 3.124A1.5 1.5 0 0114.117 10H1.883A1.5 1.5 0 01.394 8.686l-.39-3.124a.5.5 0 01.121-.393z" clip-rule="evenodd" />
        </svg>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 cardS">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="width:60%">
        <div>BLOCKED USERS</div>
        <div><?php echo mysqli_num_rows($query4); ?></div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="width:40%">
        <svg class="bi bi-person-dash-fill" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 100-6 3 3 0 000 6zm5-.5a.5.5 0 01.5-.5h4a.5.5 0 010 1h-4a.5.5 0 01-.5-.5z" clip-rule="evenodd" />
        </svg>
    </div>
</div>
<div class="col-lg-12" id="show_users"></div>
<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "transport_thing");
if(isset($_GET['show_users']))
{
    $query=mysqli_query($con,"SELECT * FROM `user` WHERE status='1'");
    while($row=mysqli_fetch_array($query))
    {
    echo'<span>',$row['username'],'</span> - <span>',$row['email'],'</span> - <span>',$row['adress'],'</span> <br>';
    }
}
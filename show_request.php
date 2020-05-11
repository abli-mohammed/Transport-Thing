<?php
session_start();
$con=mysqli_connect("localhost","root","","transport_thing");
$session_id=$_SESSION['id_user'];
$query=mysqli_query($con,"SELECT * FROM `request` INNER JOIN `type_thing` ON request.id_type=type_thing.id_type AND id_user=$session_id");
?>
<div class="container" style="width: 100%;">
    <?php 
    if(mysqli_num_rows($query)<1)
    {
        echo "<div align='center' style='margin-top:100px'><h4>There is no order, please add an order. 
        <a href='#/Add request' onclick='add_request()'>Add an order</a></h4></div>";
    }
    else
    while($ligne = mysqli_fetch_array($query))
    {
    echo
    "<div class='col-lg-4 request' style='width: 31%'><h4 class='h4_request'><img src='images/",$ligne['type_thing'],".png' class='img_request'>
    <span>", $ligne['type_thing'], "</span></h4>
    <p><b>Destination </b>", $ligne['destination'], "</p>
    <p><b>Arrival </b>", $ligne['arrival'], "</p>";
    if($ligne['is_free']==1)
    echo"<span>Is free</span>";
    else echo"<span>For a fee</span>";
    if($ligne['is_emergency']==1)
    echo"<span> and is emergency</span>";
    echo"<br><a href='#'>Edit </a> <a href='#'>  Delete</a></div>";
    }
    ?>
</div>

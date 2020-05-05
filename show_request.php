<?php
session_start();
$con=mysqli_connect("localhost","root","","transport_thing");
$session_id=$_SESSION['id_user'];
$query=mysqli_query($con,"SELECT * FROM `request` INNER JOIN `type_thing` ON request.id_type=type_thing.id_type AND id_user=$session_id");
?>
<div class="container" style="width: 100%;">
    <?php 
    while($ligne = mysqli_fetch_array($query))
    {
    echo
    "<div class='col-lg-4 request'><h4 class='h4_request'><img src='images/",$ligne['type_thing'],".png' class='img_request'>
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
<script>
</script>
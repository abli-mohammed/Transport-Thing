<?php
session_start();
$con=mysqli_connect("localhost","root","","transport_thing");
$session_id=$_SESSION['id_user'];
$query=mysqli_query($con,"SELECT * FROM `request` INNER JOIN `type_thing` 
                                                  ON request.id_type=type_thing.id_type
                                                  INNER JOIN `proposition_users`
                                                  ON request.id_request=proposition_users.id_request
                                                  AND proposition_users.id_user='".$session_id."'");
?>
<div class="container" style="width: 100%;">
    <?php 
    if(mysqli_num_rows($query)<1)
    {
        echo "<div align='center' style='margin-top:100px'><h4 class='txt1'>There is no thing, please add an delivery. 
        <a href='homepage.php'>Add an delivery</a></h4></div>";
    }
    else
    while($ligne = mysqli_fetch_array($query))
    {
    echo
    "<div class='col-lg-4 col-md-4 request'>
    <h4 class='h4_request'><img src='images/",$ligne['type_thing'],".png' class='img_request'>
    <span>", $ligne['type_thing'], "</span></h4>
    <p><b>Destination </b>", $ligne['destination'], "</p>
    <p><b>Arrival </b>", $ligne['arrival'], "</p>";
    if($ligne['is_free']==1)
    echo"<span>Is free</span>";
    else echo"<span>For a fee</span>";
    if($ligne['is_emergency']==1)
    echo"<span> and is emergency</span>";
    echo'<br><a class="btn" href="request.php?delet_propos='.$ligne['id_request'].'" style="padding:0px">
    <svg style="margin-bottom: -1px;margin-right: -1px;" class="glyp_profile bi bi-x-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"/>
</svg>
    Cancel this delivery</a></div>';
    }
    ?>
</div>
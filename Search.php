<?php
session_start();
$con=mysqli_connect("localhost","root","","transport_thing");
$session_id=$_SESSION['id_user'];
$dest=$_GET['dest'];
$type=$_GET['type'];
$is_free=$_GET['is_free'];
if($type=='All types')
{
$query=mysqli_query($con,"SELECT * FROM `request` WHERE destination LIKE '%" . $dest . "%' 
AND is_free LIKE '%" . $is_free . "%' AND id_user!='".$session_id."' ORDER BY is_emergency DESC");
}
else
{
$query=mysqli_query($con,"SELECT * FROM `request` WHERE destination LIKE '%" . $dest . "%' 
AND id_type LIKE '%" . $type . "%'
AND is_free LIKE '%" . $is_free . "%'  
AND id_user!='".$session_id."' ORDER BY is_emergency DESC");
}

if(mysqli_num_rows($query) >=1)
{
    echo'<div class="z col-lg-12">'; 
             while($ligne = mysqli_fetch_array($query))
              {
                $query_t=mysqli_query($con,"SELECT * FROM `type_thing` WHERE id_type='".$ligne['id_type']."'");
                $row = mysqli_fetch_array($query_t);
                $id_request=$ligne['id_request'];
                echo
                "<div class='col-lg-4 col-md-4 col-sm-5  card'>
                <span style='color: #fff;' class='label label-default'>",$ligne['date'],"</span>
                <h2>
                <img src='images/",$row['type_thing'],".png' width='80px' height='80px'>
                <span>", $row['type_thing'], "</span></h2>
                  <p>Destination ", $ligne['destination'], "</p>
                     <p>Arrival ", $ligne['arrival'], "</p>";
                    if($ligne['is_free']==1)
                    echo"<span>Is free</span>";
                    else echo"<span>For a fee</span>";
                    if($ligne['is_emergency']==1)
                     echo"<span> and is emergency</span>";
                    $query_p=mysqli_query($con,"SELECT * FROM `proposition_users` WHERE id_user='".$session_id."' AND id_request='".$id_request."'");
                    if(mysqli_num_rows($query_p) > 0)
                     {
                        echo'<br><br><div align="right">
                        <button disabled class="btn" style="position: relative;z-index: 1;background-color: #2980b9;color: #fff;">
                        Delivery request</button>
                        </div></div>';
                     }
                     else
                     {
                        echo'<br><br><div align="right">
                       <a  class="btn" onclick="id_request('.$id_request.')" data-toggle="modal" data-target="#Confirm_delivery" style="position: relative;z-index: 1;background-color: #2980b9;color: #fff;">
                       Delivery request</a>
                       </div></div>';
                     }
              }
   
          echo'</div>';
}
else
echo"<div style='color:red'>Sorry, This delivery don't exist</div>";
?>
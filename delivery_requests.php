<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "transport_thing");
$session_id = $_SESSION['id_user'];
$query = mysqli_query($con, "SELECT * FROM `request` INNER JOIN `type_thing` 
                                                     ON request.id_type=type_thing.id_type
                                                     WHERE request.id_user=$session_id ORDER BY date DESC");                                                   
?>
<div class="container" style="width: 100%;">
    <?php
    $i=0;
        while ($ligne = mysqli_fetch_array($query)) {
            $id_request=$ligne['id_request'];
            $query_p = mysqli_query($con, "SELECT * FROM `proposition_users` WHERE id_request=$id_request");
            if (mysqli_num_rows($query_p) > 0)
            {
            echo
                "<a style='color:#444;cursor:pointer' onclick='user_delivery($id_request)'><div class='request col-lg-4 col-md-4'>
                <span class='badge'>";echo mysqli_num_rows($query_p)," Delivery";
               echo"</span><h4 class='h4_request'>",
                $ligne['type_thing'],
                "</span></h4><p><b>Destination </b>",
                $ligne['destination'],
                "</p><p><b>Arrival </b>",
                $ligne['arrival'],
                "</p><p><b>Date </b>",
                $ligne['date'],
                "</p>";
                echo"</div></a>";
                $i++;
            }
   }
   if ($i=='0') {
    echo "<div align='center' style='margin-top:100px'><h4 class='txt1'>There is no order, please add an order. 
    <a href='#/Add request' onclick='add_request()'>Add an order</a></h4></div>";
}
    ?>
</div>
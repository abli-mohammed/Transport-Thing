<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "transport_thing");
$session_id = $_SESSION['id_user'];
$query = mysqli_query($con, "SELECT * FROM `request` INNER JOIN `type_thing` ON request.id_type=type_thing.id_type AND id_user=$session_id ORDER BY date DESC");
?>
    <?php
    if (mysqli_num_rows($query) < 1) {
        echo "<div align='center' style='margin-top:100px'><h4 class='txt1'>There is no order, please add an order. 
        <a href='#/Add request' onclick='add_request()'>Add an order</a></h4></div>";
    } else
        while ($ligne = mysqli_fetch_array($query)) {
            echo
                "<div class='request col-lg-4 col-md-4'>
                <span style='color: #fff;float:right' class='label label-default'>", $ligne['date'],"</span>
                <h4 class='h4_request'><img src='images/",
                $ligne['type_thing'],
                ".png' class='img_request'>
    <span>",
                $ligne['type_thing'],
                "</span></h4>
    <p><b>Destination </b>",
                $ligne['destination'],
                "</p>
    <p><b>Arrival </b>",
                $ligne['arrival'],
                "</p>";
            if ($ligne['is_free'] == 1)
                echo "<span>Is free</span>";
            else echo "<span>For a fee</span>";
            if ($ligne['is_emergency'] == 1)
                echo "<span> and is emergency</span>";
            echo '<br><span><a href="#" class="edit" onclick="edit(' . $ligne['id_request'] . ')">
    <svg class="bi bi-pencil-square" width="0.9em" height="0.9em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
     <path d="M15.502 1.94a.5.5 0 010 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 01.707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 00-.121.196l-.805 2.414a.25.25 0 00.316.316l2.414-.805a.5.5 0 00.196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 002.5 15h11a1.5 1.5 0 001.5-1.5v-6a.5.5 0 00-1 0v6a.5.5 0 01-.5.5h-11a.5.5 0 01-.5-.5v-11a.5.5 0 01.5-.5H9a.5.5 0 000-1H2.5A1.5 1.5 0 001 2.5v11z" clip-rule="evenodd"/>
</svg>
    Edit </a></span><span> <a class="delete" href="request.php?delete_request_u=' . $ligne['id_request'] . '">
    <svg class="bi bi-trash" width="0.9em" height="0.9em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
   <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/>
   <path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd"/>
   </svg>
    Delete</a></span></div>';
        }
    ?>
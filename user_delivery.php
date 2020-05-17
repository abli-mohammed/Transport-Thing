<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "transport_thing");
$id_request = $_GET['id_request'];
$query = mysqli_query($con, "SELECT * FROM `proposition_users` INNER JOIN `user` 
                                                     ON proposition_users.id_user=user.id_user
                                                     WHERE proposition_users.id_request=$id_request ORDER BY is_free DESC");                                                   
?>
<div class="container" style="width: 100%;">
    <?php
        while ($ligne = mysqli_fetch_array($query)) {
            echo
                "<div class='request' style='padding:15px'>
                <h4 class='h4_request' style='text-transform: capitalize;'>",$ligne['firstname']," ", $ligne['lastname'],"</h4>
                <p><b>E-mail </b>",
                $ligne['email'],
                "</p><p><b>Phone </b>",
                $ligne['phone'],
                "</p><p><b>Amount </b>",
                $ligne['is_free'],
                "</p>";
                echo"</div>";
            }
    ?>
</div>
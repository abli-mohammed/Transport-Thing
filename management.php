<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "transport_thing");
if(isset($_GET['show_users']))
{
    $query=mysqli_query($con,"SELECT * FROM `user` WHERE status='1' AND type='2' ORDER BY id_user DESC");
    echo'<table id="customers" style="width:99%;">
         <tr><th><b>Usermane</th><th><b>Email</th>
         <th><b>Address</th><th><b>Block Users</th></tr>';
             while($ligne = mysqli_fetch_array($query))
{
$id_user = $ligne['id_user'];
$user = $ligne['username'];
$email = $ligne['email'];
$adress = $ligne['adress'];
$id=$ligne['id_user'];
echo'<tr >
            <td width="30%" >'.$user.'</td>
			<td width="40%" >'.$email.'</td>
            <td width="20%" >'.$adress.'</td>
            <td width="10%" ><button class="btn btn_block" onclick="block('.$id_user.')" style="bacground-color:#fff">Block</button></td></tr>';
}
echo'</table>';
}
////////////////////////////////////////////////////////////blocking user//////////////////////////////////////////////////////////////
if(isset($_GET['blocked_users']))
{
    $query=mysqli_query($con,"SELECT * FROM `user` WHERE status='2' ORDER BY id_user DESC");
    echo'<table id="customers" style="width:97%;">
         <tr><th><b>Usermane</th><th><b>Email</th>
         <th><b>Address</th><th><b>Deblocking</th></tr>';
             while($ligne = mysqli_fetch_array($query))
{
$id_user = $ligne['id_user'];
$user = $ligne['username'];
$email = $ligne['email'];
$adress = $ligne['adress'];
$id=$ligne['id_user'];
echo'<tr >
            <td width="30%" >'.$user.'</td>
			<td width="40%" >'.$email.'</td>
            <td width="20%" >'.$adress.'</td>
            <td width="10%" >
            <button class="btn btn_block" onclick="deblocking('.$id_user.')" style="bacground-color:#fff">Deblocking</button></td></tr>';
}
echo'</table>';
}
//////////////////////////////////////////////////////////show request//////////////////////////////////////////////////////////////////
if(isset($_GET['show_requests']))
{
    $query=mysqli_query($con,"SELECT * FROM `request` INNER JOIN `type_thing` ON
                                                      request.id_type=type_thing.id_type
                                                      AND request.status='0' ORDER BY request.date DESC");
    echo'<table id="customers" style="width:99%;">
         <tr><th><b>Destination</th><th><b>Arrival</th>
         <th><b>Type</th><th><b>date</th><th><b>Delete Requests</th></tr>';
             while($ligne = mysqli_fetch_array($query))
{
$id_request = $ligne['id_request'];
$destination = $ligne['destination'];
$arrival = $ligne['arrival'];
$type = $ligne['type_thing'];
$date=$ligne['date'];
echo'<tr >
            <td width="30%" >'.$destination.'</td>
			<td width="20%" >'.$arrival.'</td>
            <td width="20%" >'.$type.'</td>
            <td width="20%" >'.$date.'</td>
            <td width="10%" ><button class="btn btn_block" onclick="delete_request('.$id_request.')" style="bacground-color:#fff">Delete</button></td></tr>';
}
echo'</table>';
}
/////////////////////////////////////////////////////////////delivery request////////////////////////////////////////////////////////////
if(isset($_GET['delivery']))
{
    $query=mysqli_query($con,"SELECT * FROM `request` INNER JOIN `type_thing` ON
                                                      request.id_type=type_thing.id_type
                                                      INNER JOIN `proposition_users` ON
                                                      request.id_request=proposition_users.id_request
                                                      AND request.status='0' ORDER BY request.date DESC");
    echo'<table id="customers" style="width:97%;">
         <tr><th><b>Destination</th><th><b>Arrival</th>
         <th><b>Type</th><th><b>date</th><th><b>The Amount</th></tr>';
             while($ligne = mysqli_fetch_array($query))
{
$amount = $ligne['is_free'];
$destination = $ligne['destination'];
$arrival = $ligne['arrival'];
$type = $ligne['type_thing'];
$date=$ligne['date'];
echo'<tr >
            <td width="30%" >'.$destination.'</td>
			<td width="20%" >'.$arrival.'</td>
            <td width="20%" >'.$type.'</td>
            <td width="20%" >'.$date.'</td>
            <td width="10%" >'.$amount.'</td></tr>';
}
echo'</table>';
}
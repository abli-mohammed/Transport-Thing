<!--<form method="POST" action="compte/?login">
    <div>
        <h2>Add Thing</h2>
        <p>Destination</p>
        <input type="text" name="destination">
        <p>arrival</p>
        <input type="text" name="arrival">
        <p>Type of thing</p>
        <select>
            <option></option>
        </select>
        <p>Is emergency</p>
        <input type="radio" name="is_eme">
        <input type="radio" name="is_eme">
        <p>Is free</p>
        <input type="radio" name="is_free">
        <input type="radio" name="is_free">
    </div>
</form>-->
<?php
$con=mysqli_connect("localhost","root","","transport_thing");
$resulte=mysqli_query($con,"SELECT * FROM `type_thing`");
if(isset($_POST['add']))
{
@$Dest=$_POST['Dest'];
@$arrival=$_POST['arrival'];
@$type=$_POST['type'];
@$is_free=$_POST['is_free'];
@$is_eme=$_POST['is_eme'];
$date=date("Y/m/d");
mysqli_query($con,"INSERT INTO `request`(`destination`, `arrival`, `id_type`, `date`, `status`, `is_emergency`, `is_free`) 
VALUES ('$Dest', '$arrival', '$type', '$date', '0', '$is_eme', '$is_free')");
header("LOCATION:profile.html");
}
?>
<div class="container" style="width: 100%;">
        <div class="panel panel">
        <div class="panel-heading">
			<h1>Add Thing</h1>
        </div>
 <form action="Add request.php" method="post">
  <div class="input-group">
    <span class="input-group-addon"><span class="glyphicon glyphicon-export"></span></span>
    <input type="text" class="form-control" name="Dest" placeholder="Destination">
  </div><br>
  <div class="input-group">
    <span class="input-group-addon"><span class="glyphicon glyphicon-import"></span></span>
    <input  type="text" class="form-control" name="arrival" placeholder="arrival">
  </div><br>
  <div class="input-group">
    <span class="input-group-addon"><span class="glyphicon glyphicon-th-list"></span></span>
    <select  class="form-control" name="type">
    <?php
    while($ligne = @mysqli_fetch_array($resulte))
	{
    $id_type = $ligne['id_type'];
    $type = $ligne['type_thing'];
		echo'<option value='.$id_type.'>'.$type.'</option>';	
	}
 ?>
    </select>
  </div><br>
  <span><input type="checkbox" name="is_free" value="1"> Is free</span>
  <span><input type="checkbox" name="is_eme" value="1"> Is emergency</span>
<br>
 <div align="right">
 <input class="button_choix btn" style="width: 100px;margin: 10px" type="submit" id="add" name="add" value="Add" >
</div></form>
  </div>
 </div>
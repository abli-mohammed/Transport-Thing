<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "transport_thing");
$resulte = mysqli_query($con, "SELECT * FROM `type_thing`");
$session_id = $_SESSION['id_user'];
if (isset($_POST['add'])) {
  @$Dest = $_POST['Dest'];
  @$arrival = $_POST['arrival'];
  @$type = $_POST['type'];
  @$is_free = $_POST['is_free'];
  @$is_eme = $_POST['is_eme'];
  $date = $_POST['date'];
  mysqli_query($con, "INSERT INTO `request`(`destination`, `arrival`, `id_type`, `date`, `status`, `is_emergency`, `is_free`, `id_user`) 
VALUES ('$Dest', '$arrival', '$type', '$date', '0', '$is_eme', '$is_free', '$session_id')");
  header("LOCATION:admin.php");
}
if (isset($_POST['edit'])) {
  @$Dest = $_POST['Dest'];
  @$arrival = $_POST['arrival'];
  @$type = $_POST['type'];
  @$is_free = $_POST['is_free'];
  @$is_eme = $_POST['is_eme'];
  $date = $_POST['date'];
  $id_request=$_SESSION['id'];
  mysqli_query($con, "UPDATE `request` SET `destination`='$Dest',`arrival`='$arrival',`id_type`='$type',
  `date`='$date',`is_emergency`='$is_eme',`is_free`='$is_free',`status`='0' WHERE id_request=$id_request");
  header("LOCATION:admin.php");
}
if(isset($_GET['id']))
{
  $id_request=$_GET['id'];
  $_SESSION['id']=$id_request;
  $query=mysqli_query($con,"SELECT * FROM `request` WHERE id_request='".$id_request."'");
  $row=mysqli_fetch_array($query);
}
?>
<div class="container" style="width: 100%;">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Add Request</h1>
                        </div>
  <form action="Add request_a.php" method="post">
  <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><svg class="bi bi-geo-alt" width="1.1em" height="1.1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 002 6c0 4.314 6 10 6 10zm0-7a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
        </svg></span></div>
      <input type="text" class="form-control" id="dest" name="Dest" <?php echo"value='".@$row['destination']."'";?> onkeyup="testAdd()" placeholder="Destination">
    </div><br>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">
        <svg class="bi bi-geo" width="1.1em" height="1.1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path d="M11 4a3 3 0 11-6 0 3 3 0 016 0z" />
          <path d="M7.5 4h1v9a.5.5 0 01-1 0V4z" />
          <path fill-rule="evenodd" d="M6.489 12.095a.5.5 0 01-.383.594c-.565.123-1.003.292-1.286.472-.302.192-.32.321-.32.339 0 .013.005.085.146.21.14.124.372.26.701.382.655.246 1.593.408 2.653.408s1.998-.162 2.653-.408c.329-.123.56-.258.701-.382.14-.125.146-.197.146-.21 0-.018-.018-.147-.32-.339-.283-.18-.721-.35-1.286-.472a.5.5 0 11.212-.977c.63.137 1.193.34 1.61.606.4.253.784.645.784 1.182 0 .402-.219.724-.483.958-.264.235-.618.423-1.013.57-.793.298-1.855.472-3.004.472s-2.21-.174-3.004-.471c-.395-.148-.749-.336-1.013-.571-.264-.234-.483-.556-.483-.958 0-.537.384-.929.783-1.182.418-.266.98-.47 1.611-.606a.5.5 0 01.595.383z" clip-rule="evenodd" />
        </svg></span></div>
      <input type="text" class="form-control" id="arrival" <?php echo"value='".@$row['arrival']."'";?> onkeyup="testAdd()" name="arrival" placeholder="arrival">
    </div><br>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><svg class="bi bi-list-ul" width="1.2em" height="1.2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M5 11.5a.5.5 0 01.5-.5h9a.5.5 0 010 1h-9a.5.5 0 01-.5-.5zm0-4a.5.5 0 01.5-.5h9a.5.5 0 010 1h-9a.5.5 0 01-.5-.5zm0-4a.5.5 0 01.5-.5h9a.5.5 0 010 1h-9a.5.5 0 01-.5-.5zm-3 1a1 1 0 100-2 1 1 0 000 2zm0 4a1 1 0 100-2 1 1 0 000 2zm0 4a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
        </svg></span></div>
      <select class="form-control" name="type" onclick="testAdd()">
        <?php
        while ($ligne = @mysqli_fetch_array($resulte)) {
          $id_type = $ligne['id_type'];
          $type = $ligne['type_thing'];
          if(@$row['id_type']==$id_type)
          echo '<option value=' . $id_type . ' selected>' . $type . '</option>';
          else
          echo '<option value=' . $id_type . '>' . $type . '</option>';
        }
        ?>
      </select>
    </div><br>
    <span><input type="checkbox" onclick="testAdd()" <?php if(@$row['is_free']=='1') echo"checked";?> name="is_free" value="1"> Is free</span>
    <span><input type="checkbox" onclick="testAdd()" <?php if(@$row['is_emergency']=='1') echo"checked";?> name="is_eme" value="1"> Is emergency</span>
    <br>
    <div align="right">
      <?php 
      if(isset($_GET['id']))
      echo'<input class="button_choix btn" disabled style="margin-top: 10px;background-color: #2980b9;color: #fff;" type="submit" id="done" name="edit" value="Edit request">';
      else 
      echo'<input class="button_choix btn" disabled style="margin-top: 10px;background-color: #2980b9;color: #fff;" type="submit" id="done" name="add" value="Add request">';?>
    </div>
  </form>
</div>
<?php
$con = mysqli_connect("localhost", "root", "", "transport_thing");
session_start();
$session_id = $_SESSION['id_user'];
$result = mysqli_query($con, "SELECT * FROM `user` WHERE id_user='" . $session_id . "'");
$ligne = @mysqli_fetch_array($result);
@$firstname = $ligne['firstname'];
@$lastname = $ligne['lastname'];
@$birthdate = $ligne['birthdate'];
@$phone = $ligne['phone'];
@$adress = $ligne['adress'];
echo '<div class="wrapper row3" style="width:90%">
  <main class="hoc container1 clear"><form action="info_users.php" method="post">
   <div class="log1">
   Your Name
      <div class="form-group has-feedback">		
                <input  type="text" id="fn" value="' . $firstname . '" onkeyup="testCode()" title="First name" name="fn" placeholder="First name" style="width:43%">
                <input  type="text" id="ln" value="' . $lastname . '" onkeyup="testCode()" title="Last name" name="ln" placeholder="Last name" style="width:55%">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
			
      </div>
    Phone
     <div class="form-group has-feedback">
			<span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                <input  type="text" name="phone" id="phone" value="' . $phone . '" onkeyup="testCode()" placeholder="phone">
			</div>
      <span>Date Of Birthdate</span>
      <div class="form-group has-feedback">
			<span class="glyphicon glyphicon-calendar form-control-feedback"></span>
              <input  type="date" name="birthdate" id="date" value="' . $birthdate . '" onkeyup="testCode()" placeholder="Date de naissance">
			</div>
      <span>Adress</span>
      <div class="form-group has-feedback">
			<span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                <input  type="text" name="adress" id="address" value="' . $adress . '" onkeyup="testCode()" placeholder="Adresse">
      </div>
      </div><div><span><input class="btn" id="add" disabled style="background-color: #2980b9;color: #fff;" type="submit" name="add" value="Update" ></span>
      <span><a class="btn" data-toggle="modal" data-target="#Block_account" style="background-color: #FF333F;color: #fff;">Block Account</a></span>
      <span align="right" class="txt1"><a href="compte.php?changepass" style="margin-top:8px;float: right;">Change Password</a></span>
      </div></form>
      </main></div>';
if (isset($_POST['add'])) {
  $fn = $_POST['fn'];
  $ln = $_POST['ln'];
  $phone = $_POST['phone'];
  $adress = $_POST['adress'];
  $birthdate = $_POST['birthdate'];
  mysqli_query($con, "UPDATE `user` SET `firstname`='$fn',`lastname`='$ln',`birthdate`='$birthdate',`adress`='$adress',`phone`='$phone' WHERE id_user='" . $session_id . "'");
  header("LOCATION:profile.php");
}

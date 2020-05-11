<?php
$con=mysqli_connect("localhost","root","","transport_thing");
session_start();
$session_id=$_SESSION['id_user'];
$result = mysqli_query($con,"SELECT * FROM `user` WHERE id_user='".$session_id."'");
$ligne = @mysqli_fetch_array($result);
$birthdate = $ligne['birthdate'];
@$phone = $ligne['phone'];
@$adress = $ligne['adress'];
@$password = $ligne['password'];
  echo'<div class="wrapper row3">
  <main class="hoc container1 clear"><form action="info_users.php" method="post">
   <div class="log1">
    Phone
     <div class="form-group has-feedback">
			<span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                <input  type="text" name="phone" id="phone" value="'.$phone.'" onkeyup="testCode()" placeholder="phone">
			</div>
      <span>Date de naissance</span>
      <div class="form-group has-feedback">
			<span class="glyphicon glyphicon-calendar form-control-feedback"></span>
              <input  type="date" name="birthdate" id="date" value="'.$birthdate.'" onkeyup="testCode()" placeholder="Date de naissance">
			</div>
      <span>Adresse de la résidence</span>
      <div class="form-group has-feedback">
			<span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                <input  type="text" name="adress" id="address" value="'.$adress.'" onkeyup="testCode()" placeholder="Adresse">
			</div>
			<span>Mot de passe</span>
      <div class="form-group has-feedback">
			<span id="eye" class="form-control-feedback show-pass-btn glyphicon glyphicon-eye-open" onclick="showpass()"></span>
                <input  type="password" id="password" name="password" value="'.$password.'" onkeyup="testCode()" placeholder="Mot de passe">
            </div>
      </div><div><input class="btn" id="add" disabled style="background-color: #2980b9;color: #fff;width: 120px;" type="submit" name="add" value="Add" ></div></form></main></div>';
       if(isset($_POST['add']))
       {
         $phone=$_POST['phone'];
         $adress=$_POST['adress'];
         $birthdate=$_POST['birthdate'];
		     $password = $_POST['password'];
         mysqli_query($con,"UPDATE `user` SET `password`='$password',`birthdate`='$birthdate',`adress`='$adress',`phone`='$phone' WHERE id_user='".$session_id."'");
         header("LOCATION:profile.php");
	  	}
 ?>
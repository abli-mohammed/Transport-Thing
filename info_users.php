<?php
$con=mysqli_connect("localhost","root","","transport_thing");
session_start();
$session_id=$_SESSION['id_user'];
$result = mysqli_query($con,"SELECT * FROM `user` WHERE id_user='".$session_id."'");
$ligne = @mysqli_fetch_array($result);
$firstname = $ligne['firstname'];
$lastname = $ligne['lastname'];
$birthdate = $ligne['birthdate'];
@$phone = $ligne['phone'];
@$email = $ligne['email'];
@$adress = $ligne['adress'];
@$password = $ligne['password'];
  echo'<div class="wrapper row3">
  <main class="hoc container1 clear"><form action="info_users.php" method="post">
   <div class="log1">
 E-mail
 <div class="form-group has-feedback">
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <input  type="text" name="email" value="'.$email.'" placeholder="E-mail">
			</div>
    Téléphon
     <div class="form-group has-feedback">
			<span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                <input  type="text" name="telephon" value="'.$phone.'" placeholder="Téléphon">
			</div>
      <span>Date de naissance</span>
      <div class="form-group has-feedback">
			<span class="glyphicon glyphicon-calendar form-control-feedback"></span>
              <input  type="date" name="date" value="'.$birthdate.'" placeholder="Date de naissance">
			</div>
      <span>Adresse de la résidence</span>
      <div class="form-group has-feedback">
			<span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                <input  type="text" name="adrass" value="'.$adress.'" placeholder="Adresse">
			</div>
			<span>Mot de passe</span>
      <div class="form-group has-feedback">
			<span id="eye" class="form-control-feedback show-pass-btn glyphicon glyphicon-eye-open" onclick="showpass()"></span>
                <input  type="password" id="password" name="password" value="'.$password.'" placeholder="Mot de passe">
            </div>
      </div><div style="width: 120px;"><input class="btn" type="submit" name="add" value="Add" ></div></form></main></div>';
       if(isset($_POST['add']))
       {
         $email=$_POST['email'];
         $telephon=$_POST['telephon'];
         $adrass=$_POST['adrass'];
         $birthdate=$_POST['birthdate'];
		 $password = $_POST['password'];
        mysqli_query($con,"UPDATE `user` SET `email`='$email',`phone`='$phone',`birthdate`='$birthdate',`addras`='$adrass' WHERE id_user='".$session_id."'");
		}
 ?>
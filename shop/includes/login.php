<?php
session_start();
require("../config/config.php"); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Войти</title>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body id="login">  <!-- or <body bgcolor="#3498db"> -->

	<h3 style="text-align: right; margin-right: 20px;"><a href="../index.php">На главную</a></h3>

	<h2 align="center">Войти</h2><br>


	<form action="" method="POST" style="width:30%; margin:auto;">
  <div class="form-group">
    <label for="email">Введите адрес электронной почты:</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  <div class="form-group">
    <label for="pwd">Введите пароль::</label>
    <input type="password" class="form-control" id="pwd" name="password" required>
  </div>
  <div class="checkbox">
    <label><input type="checkbox">Запомнить меня</label>
  </div>
  <button type="submit" class="btn btn-default" name="login">Войти</button>
</form>


</body>
</html>

<?php 

$email = "";

$password = "";

if(isset($_POST['login'])) {

	$email = $_POST['email'];

	$password = $_POST['password'];

}

$query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'");

if(isset($_POST['login']) && mysqli_num_rows($query) > 0) {

while($row = mysqli_fetch_array($query)) {

	$username = $row['username'];
	$admin = $row['admin'];

}

$_SESSION['username'] = $username;

if($admin) {

header('Location: ../admin_area/index.php');

} else {

header('Location: ../index.php');

}

} else {

		if(!empty(trim($email)) && !empty(trim($password))){
	?>

	<script>alert('Пользователь с указанными паролем и почтой не найдены')</script>

	<?php

}

}

 ?>
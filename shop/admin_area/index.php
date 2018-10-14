<?php 
session_start();
include("../config/config.php");

if(!isset($_SESSION['username'])) {

	header('Location: ../includes/login.php');

}

 ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Админ</title>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <link rel="stylesheet" href="../assets/css/styles.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 


</head>
<body style="background-color:#3498db;">

	<style>
		
		.col-sm-9{
 		 padding-right: 0px;
  		 padding-left: 0px;
		}

	</style>

	<div class="container">

	<div class="row" style="background-color: pink;">
	<h1 align="center" id="admin_header">Управление контентом сайта</h1>
	</div>

	<div class="row">

	<div class="col-sm-9">

		 <img class="img-responsive" id="image" src="../assets/images/admin.jpg" alt="Admin"> 

		<script> var x = document.getElementById("admin_header"); </script>
	
	<?php
		if(isset($_GET['insert_product'])){
			?>
			<script> x.innerHTML = 'Добавление нового товара'; 
				$("#image").remove();
			</script>
			<?php
		include("insert_product.php");
	} 
	if(isset($_GET['all_goods'])){
		?>
		<script> $("#admin_header").html('Все товары'); 
					$("#image").remove();
		</script>
		<?php
		include("all_goods.php");
	} 
	if(isset($_GET['edit_product'])){
		?>
		<script> $("#admin_header").html('Редактирование товарной позиции'); 
					$("#image").remove();
		</script>
		<?php
		include("edit_product.php");
	} 
		?>
		
	</div>

	<div class="col-sm-3" id="admin_right">

	<p align="center"><a href="index.php">Главная</a></p>

	<p align="center"><a href="index.php?insert_product">Добавить новый товар</a></p>

	<p align="center"><a href="index.php?all_goods">Все товары</a></p>

	<p align="center"><a href="logout.php">Выйти</a></p>

	</div>

	</div>

	</div>
	
</body>
</html>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ru">
<head>
<title>Магазин электроники</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  <script src="assets/js/shop.js"></script>

    <link href="assets/lightbox2-master/dist/css/lightbox.css" rel="stylesheet">



  <?php 
    $id = "";
    if(isset($_GET['category'])) {
  $id = $_GET['category'];

  ?>

  <script>
$(document).ready(function(){
    var id = <?php echo $id; ?>;
        $.ajax({
          method: "POST",
          url: "includes/handlers/ajax_search_cat.php",
          data: { category: id },
          success: function(result){
            $("#main_content").empty();
            $("#main_content").html(result);
        }});
    });
  </script>

  <?php

}

    $brand = "";
    if(isset($_GET['brand'])) {
  $brand = $_GET['brand'];

  ?>

  <script>
$(document).ready(function(){
    var brand = <?php echo $brand; ?>;
        $.ajax({
          method: "POST",
          url: "includes/handlers/ajax_search_brand.php",
          data: { brand: brand },
          success: function(result){
            $("#main_content").empty();
            $("#main_content").html(result);
        }});
    });

</script>


  <?php

}

   ?>


</head>
<body id="body">

<div class="jumbotron" id="jumbotron">
  <div class="container text-center">
    <h1>Магазин электроники</h1>      
    <p>Мы работаем для Вашего удобства<?php if(isset($_SESSION['username'])){ echo ", " . $_SESSION['username']; } ?></p>
  </div>
</div>

<nav class="navbar navbar-inverse" id="myHeader" style="z-index: 10;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php" title="На главную страницу"><i class="fab fa-laravel"></i></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <div class="dropdown" style="display:inline-block;">
  <button type="button" class="btn btn-default navbar-inverse dropdown-toggle" style="color:white; margin: 8px;" id="menu1" data-toggle="dropdown">Бренды
  <span class="caret"></span></button>
  <ul class="dropdown-menu navbar-inverse" role="menu" aria-labelledby="menu1">

    <?php 

          $brand_query = mysqli_query($con, "SELECT * FROM brands");
          while($row=mysqli_fetch_array($brand_query)){
            $brand_id = $row['id'];
            $brand_title = $row['brand_title'];
            echo "<li role='presentation'><a role='menuitem' style='color:white;' href='index.php?brand=$brand_id'>$brand_title</a></li>";
          }


     ?>

  </ul>
  </div>
   <div class="dropdown" style="display:inline-block;">
  <button class="btn btn-default navbar-inverse dropdown-toggle" type="button" style="color:white; margin: 8px;" id="menu1" data-toggle="dropdown">Каталог
  <span class="caret"></span></button>
  <ul class="dropdown-menu navbar-inverse" role="menu" aria-labelledby="menu1">

    <?php 

          $cat_query = mysqli_query($con, "SELECT * FROM categories");
          while($row=mysqli_fetch_array($cat_query)){
            $cat_id = $row['id'];
            $cat_title = $row['cat_title'];
            echo "<li role='presentation'><a role='menuitem' style='color:white;' href='index.php?category=$cat_id'>$cat_title</a></li>";
          }


     ?>

  </ul>
</div> 
      <ul class="nav navbar-nav navbar-right">
        <li><a href="includes/message.php"><span class="glyphicon glyphicon-envelope"></span> Напишите нам</a></li>
        <li><a href="includes/login.php"><span class="glyphicon glyphicon-user"></span> Ваш Аккаунт</a></li>
        <li><a href="cart.php"><span class="glyphicon glyphicon-log-in"></span> Корзина</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- <nav class="navbar navbar-default" id="myHeader" style="z-index: 10;" >
 -->
<!-- Add a shopping cart as a right sidebar of class well, like in Edwin's blog -->

 <!--  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><i class="fab fa-laravel"></i></a>
    </div>
   <div class="collapse navbar-collapse" id="myNavbar"> -->
       <!-- <div class="dropdown" style="display:inline-block;">
  <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Бренды
  <span class="caret"></span></button>
  <ul class="dropdown-menu" role="menu" aria-labelledby="menu1"> -->

    
  <!--     <ul class="nav navbar-nav">
        <li><a href="#">Контакты</a></li>
      </ul> -->
 





<?php 
require("config/config.php"); 
require("includes/header.php");
require("includes/functions.php");
?>

<div class="container"> 
<div class="row">

  <div class="search">

<form action="search.php" method="GET" name="search_form">

<div class="button_holder" style="background-color: white;">
  
  <img src="assets/images/magnifying_glass.png">

</div>   
 <input type="text" onkeyup="getLiveSearchProducts(this.value)" id="search_text_input" name="q" placeholder="Найти товар:">

</form>
<br>

<div class="search_results">

</div>

<div class="search_results_footer_empty">
  
</div> 

<br>


</div>

</div>

<script>
$(document).ready(function(){
  $("#well").click(function(){
    $("#body").css("background-image", "none");
  });
});
</script>


<br><br>
  <div class="row" id="main_content">
     <div class='col-sm-3'>
    <div class="well" id="well">

     Нажмите, если желаете сменить тему сайта  

    </div>
    </div>

    <style>

      .well{
        margin-left: -50px;
      }

    </style>


<?php 
if(!isset($_GET['category'])) {
  if(!isset($_GET['brand'])) {
$i=0;
$products_query = mysqli_query($con, "SELECT * FROM products");
while($row = mysqli_fetch_array($products_query)){
  $product_id = $row['id'];
  $product_name = $row['name'];
  $product_price = $row['price'];
  $product_image = $row['image'];

  echo "<div class='col-sm-3'>
      <div class='panel panel-primary'>
        <div class='panel-heading' align='center'><a href='details.php?p_id=$product_id'><b style='color:white; text-decoration: none;'>" . $product_name . "</b></div>
        <div class='panel-body' align='center'><img src='assets/images/$product_image' class='img-responsive' style='height:200px;' alt='Image'></a></div>
        <div class='panel-footer' align='center' id=id" . $product_id .">$" . $product_price . "<a href='cart.php?p_id=$product_id'> <span class='glyphicon glyphicon-shopping-cart' title='Добавить в корзину'></span></a></div>
      </div>
    </div>";
    $i++;
    if($i%3 == 0) {
      echo "</div>
        </div><br>
        <div class='container'>    
        <div class='row'>
         <div class='col-sm-3'>
    </div>";
    }
    }
}
}
 ?>

  </div>



</div><br>

<br><br>
 
<footer class="container-fluid text-center">
  <p><a href="#jumbotron" title="В начало страницы">В начало страницы</a></p>  
  <form class="form-inline">Получать выгодные предложения:
    <input type="email" class="form-control" size="50" placeholder="Email">
    <button type="button" class="btn btn-danger">Подписаться</button>
  </form>
</footer>
  <script src="assets/js/javascript.js"></script>
</body>
</html>
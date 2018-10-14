<?php 
include("../../config/config.php");
include("../classes/Product.php");

$query = $_POST['brand'];
$i=0;

$productsReturnedQuery = mysqli_query($con, "SELECT * FROM products WHERE brand='$query'");

if(mysqli_num_rows($productsReturnedQuery) == 0) {
	echo "<div class='row' id='main_content' align='center'>Товары по указанным Вами критериям поиска не найдены<div>";
}

if($query !="") {



	while($row = mysqli_fetch_array($productsReturnedQuery)) {

	$product_id = $row['id'];
    $product_name = $row['name'];
    $product_price = $row['price'];
    $product_image = $row['image'];

  echo "<div class='col-sm-3'>
      <div class='panel panel-primary'>
        <div class='panel-heading' align='center'><a href='details.php?p_id=$product_id'><b style='color:white; text-decoration: none;'>" . $product_name . "</b></div>
        <div class='panel-body' align='center'><img src='assets/images/$product_image' class='img-responsive' style='height:200px;' alt='Image'></div>
        <div class='panel-footer' align='center'>$" . $product_price . "</div>
      </div>
    </div>";
    $i++;
    if($i%4 == 0) {
      echo "</div>
        </div><br>
        <div class='container'>    
        <div class='row'>";
    }

		
	}
		
	} 
		

 ?>
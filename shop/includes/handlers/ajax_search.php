<?php 
include("../../config/config.php");
include("../classes/Product.php");

$query = $_POST['query'];

$productsReturnedQuery = mysqli_query($con, "SELECT * FROM products WHERE name LIKE '%$query%' LIMIT 8");

if($query !="") {

	// if(mysqli_fetch_array($productsReturnedQuery) == 0) {
		
	// 	echo "<p><br><br>Ничего не найдено</p>";
	// }
	// else {

	while($row = mysqli_fetch_array($productsReturnedQuery)) {

		echo "<div class='resultDisplay'>
		<a href='details.php?p_id=" . $row['id'] . "' style='color: #14858D'>
		
		<div class='liveSearchProductPic'>
		<img src='assets/images/" . $row['image'] ."'>
		</div>
		
		<div class='liveSearchText'>
			" . $row['name'] . " $" . $row['price'] . "
		</div>

		</a>
		</div>";
	}
		
	} 

// } 	
	



 ?>
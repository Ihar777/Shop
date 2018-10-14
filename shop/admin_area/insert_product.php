
<?php 
// session_start();
// include("../config/config.php");

// if(!isset($_SESSION['username'])) {

// 	header('Location: ../includes/login.php');

// }

 ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Сохранить товар</title>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="//cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
</head>
<body bgcolor="#0984e3">

<!-- 	<h2 align="center">Добавить новый товар</h2> -->
	
<form action="" method="POST" enctype="multipart/form-data">
	
	<table align="center" class="col-sm-12" id="ins_table" border="2" bgcolor="#fdcb6e">

		<tr>
			<td style="text-align:right;"><b>Наименование товара</b></td>
			<td><input type="text" name="product_name" size="50" required></td>
		</tr>
		
		<tr>
			<td style="text-align:right;"><b>Категория товара</b></td>
			<td>
			<select name="product_cat">
				<option>Выберите категорию</option>

				<?php

					$cat_select = mysqli_query($con, "SELECT * FROM categories");

					while($category_name = mysqli_fetch_array($cat_select)){
						$category_id = $category_name['id'];
						$category_title = $category_name['cat_title'];
						echo "<option value='$category_id'>$category_title</option>";
					}

				?>

			</select>
			</td>

		</tr>

		<tr>
			<td style="text-align:right;"><b>Стоимость товара</b></td>
			<td><input type="text" name="product_price" size="50" required></td>
		</tr>

		<tr>
			<td align="right"><b>Фото товара</b></td>
			<td><input type="file" name="product_image" required></td>
		</tr>

		<tr>
			<td align="right"><b>Описание товара</b></td>
			<td><textarea cols="30" rows="20" name="product_description" required></textarea></td>
		</tr>

		<tr>
			<td align="right"><b>Ключевые слова</b></td>
			<td><input type="text" name="product_keywords" size="50" required></td>
		</tr>

		<tr>
			<td colspan="8" style="text-align:center;"><input type="submit" class="btn btn-primary btn-xs" name="insert_product" value="Сохранить товар"></td>
		</tr>
		
	</table>

</form>

		<script>
			CKEDITOR.replace( 'product_description' );
		</script>


</body>
</html>

<?php
if(isset($_POST['insert_product'])){

	$product_name = $_POST['product_name'];
	$product_cat = $_POST['product_cat'];
	$product_price = $_POST['product_price'];
	$product_description = $_POST['product_description'];
	$product_keywords = $_POST['product_keywords'];

	$product_image = $_FILES['product_image']['name'];
	$product_image_tmp = $_FILES['product_image']['tmp_name'];

	move_uploaded_file($product_image_tmp, "../assets/images/$product_image");

	$insert_product_query = mysqli_query($con, "INSERT INTO products (name, category, price, description, image, keywords) 
	VALUES('$product_name', '$product_cat', '$product_price', '$product_description', '$product_image', '$product_keywords')");

	if($insert_product_query) {
		echo "<div class='alert alert-success alert-dismissible fade in'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Товар сохранен!</strong> 
  	</div>";
		echo "<script>window.open('', '_self')</script>";
	}

}

?>



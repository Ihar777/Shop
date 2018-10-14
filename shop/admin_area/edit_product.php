<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Редактировать товарную позицию</title>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="//cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
</head>
<body bgcolor="#0984e3">

<?php

	$product_id = $_GET['id'];

	$query = mysqli_query($con, "SELECT * FROM products WHERE id = '$product_id'");

	while($row = mysqli_fetch_array($query)) {
		 		$id = $row['id'];
                $name = $row['name'];
                $category_id = $row['category'];
                $category_query = mysqli_query($con, "SELECT cat_title FROM categories WHERE id = '$category_id'");
                $cat_row = mysqli_fetch_array($category_query);
                $category = $cat_row['cat_title'];
                $price = $row['price'];
                $desc = $row['description'];
                $keywords = $row['keywords'];
	}


?>
	
<form action="" method="POST" enctype="multipart/form-data">
	
	<table align="center" class="col-sm-12" id="ins_table" border="2" bgcolor="#fdcb6e">
 
		<tr>
			<td style="text-align:right;"><b>Выберите товар для редактирования</b></td>
			<td><input type="text" name="product_name" size="50" value="<?php echo $name; ?>" required></td>
		</tr>
		
		<tr>
			<td style="text-align:right;"><b>Категория товара</b></td>
			<td>
			<select name="product_cat">
				<option>Выберите категорию</option>

				<?php

					$cat_select = mysqli_query($con, "SELECT * FROM categories");

					while($category_name = mysqli_fetch_array($cat_select)){
						$cat_id = $category_name['id'];
						$category_title = $category_name['cat_title'];
						if($category_id == $cat_id) 
						echo "<option value='$cat_id' selected>$category_title</option>";
						else
						echo "<option value='$cat_id'>$category_title</option>";
					}

				?>

			</select>
			</td>

		</tr>

		<tr>
			<td style="text-align:right;"><b>Стоимость товара</b></td>
			<td><input type="text" name="product_price" size="50" value="<?php echo $price; ?>"></td>
		</tr>

		<tr>
			<td align="right"><b>Фото товара</b></td>
			<td><input type="file" name="product_image" required></td>
		</tr>

		<tr>
			<td align="right"><b>Описание товара</b></td>
			<td><textarea cols="30" rows="20" name="product_description"><?php echo $desc; ?></textarea></td>
		</tr>

		<tr>
			<td align="right"><b>Ключевые слова</b></td>
			<td><input type="text" name="product_keywords" size="50" value="<?php echo $keywords; ?>"></td>
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

	$insert_product_query = mysqli_query($con, "UPDATE products SET name = '$product_name', category = '$product_cat', price = '$product_price',
	description = '$product_description', image = '$product_image', keywords = '$product_keywords' WHERE id = '$id'");

	if($insert_product_query) {
		echo "<script>alert('Товар обновлен')</script>";
		echo "<script>window.open('index.php?all_goods', '_self')</script>";
	}

}

?>




<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Все товары</title>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body bgcolor="#0984e3">

	<div class="table-responsive">          
  <table align="center" class="table table-hover col-sm-12" id="ins_table" border="2" bgcolor="#fdcb6e">
    <thead>
      <tr>
        <th>С.Н.</th>
        <th>Наименование товара</th>
        <th>Категория</th>
        <th>Фото</th>
        <th>Цена</th>
        <th>Редактировать</th>
        <th>Удалить</th>
      </tr>
    </thead>
    <tbody>
	
	<?php 

		$sn = 0;

		$query = mysqli_query($con, "SELECT * FROM products");

		while($row = mysqli_fetch_array($query)){

				$sn++;
                $id = $row['id'];
                $name = $row['name'];
                $category_id = $row['category'];
                $category_query = mysqli_query($con, "SELECT cat_title FROM categories WHERE id = '$category_id'");
                $cat_row = mysqli_fetch_array($category_query);
                $category = $cat_row['cat_title'];
                $image = $row['image'];
                $price = $row['price'];


				echo    "<tr>
                            <td>$sn</td>
                            <td>$name</td>
                            <td>$category</td>
                            <td><img src='../assets/images/$image' style='height:50px;' alt='Image'></td>
                            <td>$price</td>
                            <td><a href='index.php?edit_product&id=$id'>Редактировать</a></td>
                            <td><a href='delete_product.php?id=$id'>Удалить</a></td>
                          </tr>";

		}

	?>

  </tbody>
  </table>
  </div>



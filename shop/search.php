<?php 
require("config/config.php"); 
require("includes/header.php");
?>

<div class="container"> 
<div class="row">

  <div class="search">

<form action="search.php" method="GET" name="search_form">

<div class="button_holder">
  
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
<br><br>
  <div class="row">

<?php 

$query = "";

if(isset($_GET['q'])){

  $query = $_GET['q'];

}



  $i=0;
$products_query = mysqli_query($con, "SELECT * FROM products WHERE name LIKE '%$query%'");
while($row = mysqli_fetch_array($products_query)){
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

 ?>

  </div>
</div><br>

<br><br>

<footer class="container-fluid text-center">
  <p>Online Store Copyright</p>  
  <form class="form-inline">Get deals:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Sign Up</button>
  </form>
</footer>
  <script src="assets/js/javascript.js"></script>
</body>
</html>
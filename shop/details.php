<?php 
require("config/config.php"); 
require("includes/header.php");

if(isset($_GET['p_id'])){

  $product_id = $_GET['p_id'];
  $details_query = mysqli_query($con, "SELECT * FROM products WHERE id='$product_id'");
while($row = mysqli_fetch_array($details_query)){
 
  $product_name = $row['name'];
  $product_price = $row['price'];
  $product_image = $row['image'];
  $product_description = $row['description'];

}
}

?>

<div class="container">

<?php

 echo "<div class='product'>
        <h2>$product_name</h2>
        <img src='assets/images/$product_image' class='img-responsive' style='height:100%; display: inline-block; float:left;' alt='Image'><br>
       <span style='float:left; display:block;'>$product_description</span><br>
       <span style='float:left;'>$" . $product_price . "</span>      
    </div><br>";
/* MOC 
<a href="assets/images/image1.jpg" data-lightbox="roadtrip" data-title="Surfing">
                <img src="assets/thumbnails/thumb1.jpg" alt="Surfing"/>
            </a>
            <a href="assets/images/image2.jpg" data-lightbox="roadtrip" data-title="Lifeguard Stand">
                <img src="assets/thumbnails/thumb2.jpg" alt="Lifeguard Stand"/>
            </a>
            <a href="assets/images/image3.jpg" data-lightbox="roadtrip" data-title="Hot Air Balloon">
                <img src="assets/thumbnails/thumb3.jpg" alt="Hot Air Balloon"/>
            </a>
            <a href="assets/images/image4.jpg" data-lightbox="roadtrip" data-title="Field Freedom">
                <img src="assets/thumbnails/thumb4.jpg" alt="Field Freedom"/>
            </a>
            <a href="assets/images/image5.jpg" data-lightbox="roadtrip" data-title="Golden Gate Bridge">
                <img src="assets/thumbnails/thumb5.jpg" alt="Golden Gate Bridge"/>
            </a>
            <a href="assets/images/image6.jpg" data-lightbox="roadtrip" data-title="Pacific Ocean Sunset">
                <img src="assets/thumbnails/thumb6.jpg" alt="Pacific Ocean Sunset"/>
            </a>

 MOC */
?>
</div>
<br>

<footer class="container-fluid text-center">
  <p><a href="#jumbotron" title="В начало страницы">В начало страницы</a></p>  
  <form class="form-inline">Get deals:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Sign Up</button>
  </form>
</footer>
  <script src="assets/js/javascript.js"></script>
  <script src="assets/lightbox2-master/dist/js/lightbox.js"></script>
   <script>
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true,
      'positionFromTop': 200
    })
</script>
</body>
</html>
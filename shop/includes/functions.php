<?php 

$con = mysqli_connect("localhost", "root", "2706", "shop");

function get_brands(){

   global $con;
   $i=0;
  $query_cat = mysqli_query($con, "SELECT * FROM products WHERE brand='$id'");

  if(mysqli_num_rows($query_cat)<1){

    echo "<h2 align='center'>No products of this brand.</h2>";
    exit();
  } else {

  while($row=mysqli_fetch_array($query_cat)){
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

}


function get_cat($id){

	 global $con;
	 $i=0;
	$query_cat = mysqli_query($con, "SELECT * FROM products WHERE category='$id'");

	if(mysqli_num_rows($query_cat)<1){

    echo "<h2 align='center'>No products in this category.</h2>";
    exit();
  } else {

	while($row=mysqli_fetch_array($query_cat)){
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

}

// function found in internet, which is used to get client's ip address 

function getIp() {

    $ip = $_SERVER['REMOTE_ADDR'];

 

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

        $ip = $_SERVER['HTTP_CLIENT_IP'];

    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

    }

 

    return $ip;

}

function updatecart(){
    
    global $con; 
    
    $ip = getIp();
    
    if(isset($_POST['update_cart']) && isset($_POST['remove'])){
    
      foreach($_POST['remove'] as $remove_id){
      
      $delete_product = "delete from cart where p_id='$remove_id' AND ip_address='$ip'";
      
      $run_delete = mysqli_query($con, $delete_product); 

      session_unset();
      
      if($run_delete){
      
      echo "<script>window.open('cart.php','_self')</script>";
      
      }
      
      }
    
    }

    echo @$up_cart = updatecart();
  
  }

 ?>
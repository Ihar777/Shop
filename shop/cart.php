<?php 
require("config/config.php"); 
require("includes/header.php");
require("includes/functions.php");
?>

<div class="container"> 

<script>
$(document).ready(function(){
  $("#well").click(function(){
    $("#body").css("background-image", "none");
  });
});
</script>

  <div class="row" id="main_content">
     <div class='col-sm-3'>
        <div class="well" id="well">

     Нажмите, если желаете сменить тему сайта
    </div>
  </div>
<style>
 table {
    table-layout: fixed;
    word-wrap: break-word;
}

table, th, tr, td {
    background-color: #fff;
    border-style: initial;
    }

</style>
     <div class='col-sm-9'>

          <form action="" method="POST" enctype="multipart/form-data">
        <div class="table-responsive">
      <table class="table">
        
        <thead>
          <tr align="center">
          <th style="width:22%;">Наименование</th>
          <th style="width:14%;">Изображение</th>
          <th style="width:12%;">Количество</th>
          <th style="width:20%;">Цена за единицу</th>
          <th style="width:20%;">Итоговая цена</th>
          <th style="width:12%;">Убрать из корзины</th>
          </tr>
        </thead>
        <tbody>
         <?php 

         global $con;

           if(isset($_POST['continue'])){
    
          echo "<script>window.open('index.php','_self')</script>";
    
          }

         $product_price = "";

         $product_name = "";

         $product_image = "";

         $product_id = "";

         $total_price = 0;

          $ip = getIp();

          if(isset($_GET['p_id']) && !isset($_POST['continue'])){
          $product_id = $_GET['p_id'];

          $check_cart = mysqli_query($con, "SELECT p_id FROM cart WHERE ip_address='$ip' AND p_id='$product_id'");

          if(mysqli_num_rows($check_cart) > 0)
          {
            $increment_cart = mysqli_query($con, "UPDATE cart SET qty=qty+1 WHERE ip_address='$ip' AND p_id='$product_id'");
          } else {

          $insert_query = mysqli_query($con, "INSERT INTO cart (ip_address, p_id) VALUES('$ip', '$product_id')");
          }
          }

              //  if(isset($_POST['update_cart'])){
              // $up_cart_query = mysqli_query($con, "SELECT * FROM cart WHERE ip_address='$ip'");
              // while ($update_row = mysqli_fetch_array($up_cart_query)) {
              //   $pr_id = $update_row['p_id'];
              //   $update_qty = $_POST['qty'];
              //   $update_query = mysqli_query($con, "UPDATE cart SET qty='$update_qty' WHERE ip_address='$ip' AND p_id='$pr_id'");
              // }

            // $update_qty = $_POST['qty'];
            // $update_query = mysqli_query($con, "UPDATE cart SET qty='$update_qty' WHERE ip_address='$ip' AND p_id='$p_id'");
          //   echo "<script>window.open('cart.php','_self')</script>";
          // }



          $get_cart = mysqli_query($con, "SELECT * FROM cart WHERE ip_address='$ip'");

          while($row = mysqli_fetch_array($get_cart)){
            session_unset();
          $id = $row['id'];
          $p_id = $row['p_id'];
          $qty = $row['qty'];

        //                if(isset($_SESSION['qty'])){
        //                  $_SESSION['qty']= 1;
        //   session_destroy(); 
        // }


          $product_charact = mysqli_query($con, "SELECT * FROM products WHERE id='$p_id'");

   

          while($resultrow = mysqli_fetch_array($product_charact)){

          $product_id = $resultrow['id'];
          $product_image = $resultrow['image'];
          $product_name = $resultrow['name'];
          $product_price = $resultrow['price'];
        
        $subtotal_price = $qty * $product_price;

          ?>

          <tr align="center">
          <td style="width:22%;"><?php echo $product_name; ?></td>
          <td style="width:14%;"><img src="assets/images/<?php echo $product_image; ?>" width="70"></td>

           <?php
            if(isset($_POST['update_cart'])){

              // $_SESSION['qty']= 1;
               
              $qty = $_POST['qty'];

               $subtotal_price = $qty * $product_price;

              // if($qty!=1) {
              
              $update_qty = 'update cart set qty="$qty" where p_id="$p_id" limit 1';  
              
             
             $_SESSION['qty']=$qty;

            // }


                  //echo '<script>window.open("cart.php","_self")</script>';

            }

            ?>
         
          <td style="width:15%;"><input type="number" name="qty" size="4" min="1" max="100" value="<?php if(isset($_SESSION['qty'])) { echo $_SESSION['qty']; } else { echo '1'; } ?>" style="width:80px;"></td>
         
          
          <td style="width:17%;"><input type="text" size="6" name="price" value="<?php echo $product_price; ?>"></td>
          <td style="width:20%;"><input type="text" size="6" name="total_price" value="<?php echo $subtotal_price; ?>"></td>
         <td style="width:12%;"><input type="checkbox" name="remove[]" value="<?php echo $p_id; ?>"></td>
        </tr>

        <?php


          }

          $total_price += $subtotal_price;

          
        }

        ?>

        <tr>
          <td align="left">Итого:</td>
          <td colspan="8" align="right">$<?php echo $total_price; ?></td>
        </tr>
        
        <tr>
          <td align="left"><button type="submit" name="update_cart" class="btn btn-xs btn-primary">Обновить корзину</button></td>
          <td align="center" colspan="3"><button type="submit" name="continue" class="btn btn-xs btn-primary">Продолжить покупки</button></td>
          <td align="right" colspan="3"><button class="btn btn-xs btn-primary"><a href="checkout.php" style="color:white;">Оформить заказ</a></button></td>
        </tr>
        
      </tbody>

      </table>
</div>

    </form>

    <?php updatecart(); ?>

    </div>

    <style>

      .well{
        margin-left: -50px;
      }

    </style>

  </div>

</div><br>

<br><br>
 
<footer class="container-fluid text-center">
  <p><a href="#jumbotron" title="В начало страницы">В начало страницы</a></p>  
  <form class="form-inline">Get deals:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Sign Up</button>
  </form>
</footer>
  <script src="assets/js/javascript.js"></script>

</body>
</html>
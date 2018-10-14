<?php 
require("../config/config.php"); 
require("header.php");
?>

<style>
	
	nav{
		display: none;
	}

</style>
 
<?php

if(isset($_POST['submit'])) {
    
$to = "petrushen@yahoo.com";
$subject = "Письмо от посетителя сайта магазина";
$body = $_POST['body'];
$header = 'From: ' . $_POST['email'] . "\r\n" .
    'Reply-To: ' . $_POST['email'] . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
mail($to, $subject, $body, $header);

}

?>
    <a href="../index.php"><h2 style="float: right; margin-right: 20px; margin-top: 0px;">Вернуться на главную</h2></a>
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
               
                <h1 style="text-align:center;">Написать сообщение</h1>
                <form role="form" action="" method="post" id="login-form" autocomplete="off">

                     <div class="input-group">
                        <label for="email" class="sr-only">Ваш email</label>
                        <span class="input-group-addon" ><i class="glyphicon glyphicon-user" style="width: 36.8833px;"></i></span>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Ваш email">
                    </div>

                     <div class="input-group">
                        <label for="body" class="sr-only">Ваше сообщение</label>
                        <span class="input-group-addon" ><i class="glyphicon glyphicon-pencil" style="width: 36.8833px;"></i></span>
                        <textarea class="form-control" name="body" id="body" cols="50" rows="10" placeholder="Ваше сообщение"></textarea>
                        
                    </div>

                    <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Отправить сообщение">
                </form>
                 
              
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

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

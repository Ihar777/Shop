<?php 
session_start();
include("../config/config.php");

if(!isset($_SESSION['username'])) {

	header('Location: ../includes/login.php');

}

$product_id = $_GET['id'];

$delete_query = mysqli_query($con, "DELETE FROM products WHERE id = '$product_id'");

header("Location: index.php?all_goods");

 ?>
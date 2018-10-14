<?php
class Product {
	private $product;
	private $con;

	public function __construct($con, $product){
		$this->con = $con;
		$product_details_query = mysqli_query($con, "SELECT * FROM products WHERE name='$product'");
		$this->product = mysqli_fetch_array($product_details_query);
	}

	public function getProductname() {
		return $this->product['name'];
	}

		public function getProductprice() {
		return $this->product['price'];
	}

		public function getProductimage() {
		return $this->product['image'];
	}
	
}

?>
<?php
	
	$id = $_POST["x"];
	
	require_once("connection.php");
	
	$product = mysqli_query($az_con, "SELECT unitprice FROM product WHERE product_id=$id");
	
	$row_product = mysqli_fetch_assoc($product);

	echo $row_product["unitprice"];

?>
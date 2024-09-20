<?php require_once("connection.php"); ?>
<?php

	if(isset($_GET["product_id"])) {
		
		mysqli_query($az_con, "DELETE FROM product WHERE 
		product_id=" . $_GET["product_id"]);
		
		header("location:product_list.php?delete=done");
		
	}
	else {
		header("location:product_list.php");
	}

?>
<?php require_once("connection.php"); ?>
<?php
	if(isset($_GET["company_order_id"])) {
		
		mysqli_query($az_con, "DELETE FROM company_order WHERE 
		company_order_id=" . $_GET["company_order_id"]);
		
		header("location:company_orders_list.php?delete=done");
		
	}
	else {
		header("location:company_orders_list.php");
	}
?>
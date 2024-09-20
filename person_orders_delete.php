<?php require_once("connection.php"); ?>
<?php
	if(isset($_GET["person_order_id"])) {
		
		mysqli_query($az_con, "DELETE FROM person_order WHERE 
		person_order_id=" . $_GET["person_order_id"]);
		
		header("location:person_orders_list.php?delete=done");
		
	}
	else {
		header("location:person_orders_list.php");
	}
?>
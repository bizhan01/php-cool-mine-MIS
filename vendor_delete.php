<?php require_once("connection.php") ?>


<?php

	if(isset($_GET["supplier_id"])){
		mysqli_query($az_con, "DELETE FROM supplier WHERE supplier_id
		=" . $_GET["supplier_id"]);
		
		header("location:vendor_list.php?delete=done");
	
	}
	else{
		header("location:vendor_list.php");
	
	}
?>
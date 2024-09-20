<?php require_once("connection.php"); ?>
<?php

	if(isset($_GET["category_id"])){
		
		mysqli_query($az_con, "DELETE FROM category WHERE category_id="
		. $_GET["category_id"]);
		header("location:category_list.php?delete=done");
	}
	else{
		header("location:category_list.php");
	}


?>
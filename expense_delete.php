<?php require_once("connection.php"); ?>
<?php

	if(isset($_GET["expense_id"])) {
		
		mysqli_query($az_con, "DELETE FROM expense WHERE 
		expense_id=" . $_GET["expense_id"]);
		
		header("location:expense_list.php?delete=done");
		
	}
	else {
		header("location:expense_list.php");
	}

?>
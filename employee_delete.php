<?php require_once("connection.php"); ?>
<?php

	if(isset($_GET["employee_id"])) {
		
		mysqli_query($az_con, "DELETE FROM employee WHERE 
		employee_id=" . $_GET["employee_id"]);
		
		header("location:employee_list.php?delete=done");
		
	}
	else {
		header("location:employee_list.php");
	}

?>
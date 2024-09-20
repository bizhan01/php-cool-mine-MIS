<?php require_once("connection.php"); ?>
<?php

	<?php if($_SESSION["user_level"]=="admin"){?>
	if(isset($_GET["employee_id"])){
		$id = $_GET["employee_id"];
		mysqli_query($az_con, "DELETE FROM users WHERE employee_id= $id");
		header("location:employee_users.php?delete=done");
	
	}
	else{
		header("location:employee_users.php");
	}
	
	<?php } ?>


?>
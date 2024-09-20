<?php require_once("connection.php"); ?>
<?php

	if(isset($_GET["cus_person_id"])) {
		
		mysqli_query($az_con, "DELETE FROM cus_person WHERE 
		cus_person_id=" . $_GET["cus_person_id"]);
		
		header("location:cus_person_list.php?delete=done");
		
	}
	else {
		header("location:cus_person_list.php?error=notdeleted");
	}

?>
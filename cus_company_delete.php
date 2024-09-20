<?php require_once("connection.php"); ?>
<?php

if(isset($_GET["cus_company_id"])){
		$cus_company_id = $_GET["cus_company_id"];
		mysqli_query($az_con, "DELETE FROM cus_company 
		WHERE cus_company_id=" . $_GET["cus_company_id"]);
		header("location:cus_company_list.php?delete=done");
	
	}
	else{
		header("location:cus_company_list.php?delete=notdone");
	}

?>
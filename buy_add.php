<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>

<?php

	if(isset($_POST["buy_date"])){
		$supplier_id = $_POST["supplier_id"];
		$employee_id = $_POST["employee_id"];
		$buy_date = $_POST["buy_date"];

		$result = mysqli_query($az_con, "INSERT INTO buy VALUES(NULL, $supplier_id,
		$employee_id, '$buy_date')");

		if($result){
			$last_id = mysqli_insert_id($az_con);
			header("location:buy_detail_add.php?buy_id=$last_id");

		}

	}


	$employee = mysqli_query($az_con, "SELECT * FROM employee
	ORDER BY employee_id ASC");
	$row_employee = mysqli_fetch_assoc($employee);

	$supplier = mysqli_query($az_con, "SELECT * FROM supplier
	ORDER BY supplier_id ASC");
	$row_supplier = mysqli_fetch_assoc($supplier);

?>

<?php require_once("top.php"); ?>
<div class="col-lg-9">
	<h3>ثبت خریداری جدید</h3>


</div>
<?php require_once("footer.php"); ?>

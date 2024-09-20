<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>
<?php

	if(isset($_GET["reference_id"])) {
		$employee_reference = mysqli_query($az_con, "SELECT * FROM employee_reference 
		WHERE reference_id=" . $_GET["reference_id"]);
		
		$row_employee_reference = mysqli_fetch_assoc($employee_reference);
	}
	else {
		header("location:employee_list.php");
	}
	
	$employee = mysqli_query($az_con, "SELECT * FROM  employee
	ORDER BY employee_id ASC");
	$row_employee = mysqli_fetch_assoc($employee);
?>
<?php require_once("top.php"); ?>

<h3>مشخصات ضمانت کنندگان</h3>

<table class="table table-striped">
	
	<tr>
		<td><label>آی دی:</label></td>
		<td><?php echo $row_employee_reference["reference_id"]; ?></td>
	</tr>
	
	<tr>
		<td><label>کارمند:</label></td>
		<td><?php echo  $row_employee["firstname"] ." ".  $row_employee["lastname"] ; ?></td>
	</tr>
	
	<tr>
		<td><label>نام ضمانت کننده:</label></td>
		<td><?php echo $row_employee_reference["reference_name"]; ?></td>
	</tr>
	
	<tr>
		<td><label>نمبر تذکره ضمانت کننده:</label></td>
		<td><?php echo $row_employee_reference["identity_no"]; ?></td>
	</tr>
	
	<tr>
		<td><label>وظیفه:</label></td>
		<td><?php echo $row_employee_reference["position"]; ?></td>
	</tr>
	
	<tr>
		<td><label>ارگان/ محل وظیفه:</label></td>
		<td><?php echo $row_employee_reference["organization"]; ?></td>
	</tr>
	<tr>
		<td><label>تلیفون:</label></td>
		<td><?php echo $row_employee_reference["phone"]; ?></td>
	</tr>
	
	<tr>
		<td><label>ایمیل:</label></td>
		<td><?php echo $row_employee_reference["email"]; ?></td>
	</tr>
	
	<tr>
		<td><label>آدرس:</label></td>
		<td><?php echo $row_employee_reference["address"]; ?></td>
	</tr>
	
	
	
	
</table>



<?php require_once("footer.php"); ?>
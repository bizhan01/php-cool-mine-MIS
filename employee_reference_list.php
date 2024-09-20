<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>
<?php

	$reference = mysqli_query($az_con, "SELECT * FROM employee_reference
	INNER JOIN employee ON
	employee.employee_id = employee_reference.employee_id 
	ORDER BY employee.employee_id DESC
	");
	
	
	
	//$row_reference = mysql_fetch_assoc($reference);
	
	
	//$employee = mysql_query("SELECT * FROM  employee
	//ORDER BY employee_id ASC", $con);
	//$row_employee = mysql_fetch_assoc($employee);
	
?>
<?php require_once("top.php"); ?>



<h3>لیست  ضمانت کنندگان</h3>

<table class="table table-striped">
	<tr>
		<th>آی دی</th>
		<th>کارمند</th>
		<th>شخص ضمانت کننده</th>
		<th>وظیفه</th>
		<th>تلیفون</th>
		<th>جزئیات</th>
	</tr>
	
	<?php while($row_reference = mysqli_fetch_assoc($reference)): ?>
		<tr>
			<td><?php echo $row_reference["reference_id"]; ?></td>
			
			<td>
			<?php echo $row_reference["firstname"]
			.' '. $row_reference["lastname"] ; ?>
			</td>
			<td><?php echo $row_reference["reference_name"]; ?></td>
			<td><?php echo $row_reference["position"]; ?></td>
			<td><?php echo $row_reference["phone"]; ?></td>
			<td>
				<a href="employee_reference_detail.php?reference_id=<?php echo $row_reference["reference_id"]; ?>">
					<span class="glyphicon glyphicon-search"></span>
				</a>
			</td>
		</tr>
	<?php endwhile; ?>
	
</table>

<?php require_once("footer.php"); ?>
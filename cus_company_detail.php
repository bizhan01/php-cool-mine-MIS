<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>
<?php

	if(isset($_GET["cus_company_id"])) {
		$cus_company = mysqli_query($az_con, "SELECT * FROM cus_company 
		WHERE cus_company_id=" . $_GET["cus_company_id"]);
		$row_cus_company = mysqli_fetch_assoc($cus_company);
	}
	else {
		header("location:cus_company_list.php");
	}
?>
<?php require_once("top.php"); ?>

<div class="pull-left">
	<a class="btn btn-primary" href="cus_company_edit.php?cus_company_id=
	<?php echo $_GET["cus_company_id"]; ?>">
		<span class="glyphicon glyphicon-edit"></span> 
		تصحیح
	</a>
	
	<a class="delete btn btn-danger" 
	href="cus_company_delete.php?cus_company_id=<?php 
	echo $_GET["cus_company_id"]; ?>">
		<span class="glyphicon glyphicon-trash"></span> 
		حذف
	</a>
</div>

<h3>معلومات شرکت ها</h3>




<table class="table table-striped">
	
	<tr>
		<td><label>آی دی:</label></td>
		<td><?php echo $row_cus_company["cus_company_id"]; ?></td>
	</tr>
	
	<tr>
		<td><label>نام:</label></td>
		<td><?php echo $row_cus_company["name"]; ?></td>
	</tr>
	
	
	
	
	<tr>
		<td><label>جواز نمبر:</label></td>
		<td><?php echo $row_cus_company["certify_no"]; ?></td>
	</tr>
	
	<tr>
		<td><label>تلیفون:</label></td>
		<td><?php echo $row_cus_company["phone"]; ?></td>
	</tr>
	
	<tr>
		<td><label>ایمیل:</label></td>
		<td><?php echo $row_cus_company["email"]; ?></td>
	</tr>
	
	<tr>
		<td><label>آدرس:</label></td>
		<td><?php echo $row_cus_company["address"]; ?></td>
	</tr>
	
	<tr>
		<td><label>تاریخ ثبت:</label></td>
		<td><?php echo $row_cus_company["reg_date"]; ?></td>
	</tr>
	
	
</table>
<?php require_once("footer.php"); ?>
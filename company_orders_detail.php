<?php require_once("connection.php"); ?>
<?php
	
	if(isset($_GET["company_order_id"])){
		
		$company_order = mysqil_query($az_con, "SELECT * FROM company_order 
		WHERE company_order_id=" 
		.$_GET["company_order_id"]);
		
		
		$row_company_order = mysqli_fetch_assoc($company_order);
	}
	
	else{
		header("location:company_orders_list.php");
	}



?>

<?php require_once("top.php"); ?>

<div class="pull-left">
	<a class="btn btn-primary" href="company_order_edit.php?company_order_id=
	<?php echo $_GET["company_order_id"]; ?>">
		<span class="glyphicon glyphicon-edit"></span> 
		تصحیح
	</a>
	
	<a class="delete btn btn-danger" 
	href="company_orders_delete.php?company_order_id=<?php 
	echo $_GET["company_order_id"]; ?>">
		<span class="glyphicon glyphicon-trash"></span> 
		حذف
	</a>
</div>

<h3>جزئیات فرمایشات شرکت ها</h3>

<table class="table table-striped">
	<tr>
		<td><label>آی دی:</label></td>
		<td> <?php echo $row_company_order["company_order_id"]; ?> </td>
	</tr>
	
	<tr>
		<td><label>نام:</label></td>
		<td><?php echo $row_company_order["name"]; ?> </td>
	</tr>
	
	<tr>
		<td><label>جواز نمبر:</label></td>
		<td><?php echo $row_company_order["certify_no"]; ?></td>
	</tr>
	
	<tr>
		<td><label>شخص ارتباطی:</label></td>
		<td><?php echo $row_company_order["con_person"]; ?></td>
	</tr>
	
	<tr>
		<td><label>تلیفون:</label></td>
		<td><?php echo $row_company_order["phone"]; ?></td>
	</tr>
	
	<tr>
		<td><label>ایمیل:</label></td>
		<td><?php echo $row_company_order["email"]; ?></td>
	</tr>
	
	<tr>
		<td><label>سفارش:</label></td>
		<td><?php echo $row_company_order["orders"]; ?></td>
	</tr>
	
	<tr>
		<td><label>آدرس:</label></td>
		<td><?php echo $row_company_order["address"]; ?></td>
	</tr>
	
	<tr>
		<td><label>تاریخ ثبت:</label></td>
		<td><?php echo $row_company_order["reg_date"]; ?></td>
	</tr>
</table>
<?php require_once("footer.php"); ?>
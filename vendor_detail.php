<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>

<?php
	if(isset($_GET["supplier_id"])){
		$supplier = mysqli_query($az_con, "SELECT * FROM supplier WHERE supplier_id="
		. $_GET["supplier_id"]);
		
		$row_supplier = mysqli_fetch_assoc($supplier);
		
	}
	else{
		header("location:vendor_list.php");
	}



?>

<?php require_once("top.php"); ?>

<h3>جزئیات فروشندگان</h3>


<table class="table table-striped">
	
	<tr>
		<td>آی دی:</td>
		<td><?php echo $row_supplier["supplier_id"]; ?></td>
	</tr>
		
	<tr>
		<td>نام فروشنده:</td>
		<td><?php echo $row_supplier["name"]; ?></td>
	</tr>

	<tr>
		<td>تلیفون:</td>
		<td><?php echo $row_supplier["phone"]; ?></td>
	</tr>
	<tr>
		<td>ایمیل:</td>
		<td><?php echo $row_supplier["email"]; ?></td>
	</tr>

	<tr>
		<td>نوعیت:</td>
		<td><?php echo $row_supplier["supplier_type"]==0 ? "داخلی" : "خارجی"; ?></td>
	</tr>
	<tr>
		<td>آدرس:</td>
		<td><?php echo $row_supplier["location"]; ?></td>
	</tr>
</table>


<?php require_once("footer.php"); ?>
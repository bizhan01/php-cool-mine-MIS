<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>
<?php require_once("top.php"); ?>



<?php
	$supplier = mysqli_query($az_con, "SELECT * FROM supplier ORDER BY supplier_id DESC");
	$row_supplier = mysqli_fetch_assoc($supplier);
?>

<div class="col-lg-9">

	<div class="pull-left">
		<a href="vendor_add.php" class="btn btn-primary">
			<span class="glyphicon glyphicon-plus"></span>
			ثبت فروشنده جدید
		</a>

	</div>

	<h3>لیست فروشندگان</h3>

	<?php if(isset($_GET["delete"])) { ?>
		<div class="alert alert-success alert-dismissable">
		<button class="close" area-hidden="true" data-dismiss="alert">
		</button>
		عملیه خذف انجام شد
		</div>

	<?php } ?>


	<table class="table table-striped">
		<tr>
			<th>شماره</th>
			<th>نام</th>
			<th>تلیفون</th>
			<th>نوععیت</th>
			<th>حذف</th>
			<th>تصحیح</th>
		</tr>

		<?php do { ?>
		<tr>
			<td><?php echo $row_supplier["supplier_id"]; ?></td>
			<td>
				<a href="vendor_detail.php?supplier_id=<?php echo $row_supplier["supplier_id"]; ?>">
			<?php echo $row_supplier["name"]; ?>
				</a>
			</td>
			<td><?php echo $row_supplier["phone"]; ?></td>
			<td><?php echo $row_supplier["supplier_type"]==0 ? "داخلی" : "خارجی"; ?></td>
			<td>
				<a class="delete" href="vendor_delete.php?supplier_id=<?php echo $row_supplier["supplier_id"]; ?>">
				<span class="glyphicon glyphicon-trash"></span>
				</a>
			</td>
			<td>
				<a href="vendor_edit.php?supplier_id=<?php echo $row_supplier["supplier_id"]; ?>">
				<span class="glyphicon glyphicon-edit"></span>
				</a>
			</td>
		</tr>
		<?php } while($row_supplier = mysqli_fetch_assoc($supplier)); ?>

	</table>
</div>



<?php require_once("footer.php"); ?>

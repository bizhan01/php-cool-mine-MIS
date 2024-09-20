<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>
<?php
	$sales = mysqli_query($az_con, "SELECT * from sales_report");

	$row_sales = mysqli_fetch_assoc($sales);

?>
<?php require_once("top.php"); ?>

<div class="col-lg-9">
	<h3>لیست فروشات</h3>

	<div class="table-responsive">

	<table class="table table-striped">
		<tr>
			<th>آی دی بل</th>
			<th>فروشنده</th>
			<th>مشتری فردی </th>
			<th>مشتری غیر فردی </th>
			<th>تاریخ فروش</th>
			<th>جزییات</th>
		</tr>


		<?php do { ?>
			<tr>
				<td><?php echo $row_sales["sales_id"]; ?></td>
				<td><?php echo $row_sales["employee_name"]; ?> </td>

				<td><?php echo $row_sales["customer_name"];?> </td>

				<td><?php echo $row_sales["company_name"]; ?> </td>
				<td><?php echo $row_sales["sale_date"]; ?> </td>
				<td>
					<a href="sales_detail.php?sales_id=<?php echo $row_sales["sales_id"]; ?>">
						<span class="glyphicon glyphicon-search"></span>
					</a>
				</td>
			</tr>
		<?php } while($row_sales = mysqli_fetch_assoc($sales)); ?>

	</table>

	</div>

</div>



<?php require_once("footer.php"); ?>

<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>
<?php

	$buy = mysqli_query($az_con, "SELECT buy_id, name,
	CONCAT(firstname, ' ', lastname) AS emp_name, buy_date FROM buy INNER JOIN
	supplier ON supplier.supplier_id = buy.supplier_id
	INNER JOIN employee ON employee.employee_id=
	buy.employee_id ORDER BY buy_id DESC");

	$row_buy = mysqli_fetch_assoc($buy);

?>

<?php require_once("top.php"); ?>

<div class="col-lg-9">
	<h3>لیست خریداری ها</h3>

		<table class="table table-striped">
			<tr>
				<th>آی دی خریداری</th>
				<th>فروشنده</th>
				<th>خریداری</th>
				<th>تاریخ خریداری</th>
				<th>جزییات</th>
			</tr>

			<?php do{ ?>
			<tr>
				<td> <?php echo $row_buy["buy_id"]; ?> </td>
				<td> <?php echo $row_buy["name"];?> </td>
				<td> <?php echo $row_buy["emp_name"]; ?> </td>
				<td> <?php echo $row_buy["buy_date"]; ?> </td>
				<td>
					<a href="buy_detail.php?buy_id=<?php echo $row_buy["buy_id"]; ?>">
						<span class="glyphicon glyphicon-search">
						</span>
					</a>
				</td>
			</tr>
			<?php }while($row_buy = mysqli_fetch_assoc($buy)); ?>

		</table>

</div>


<?php require_once("footer.php"); ?>

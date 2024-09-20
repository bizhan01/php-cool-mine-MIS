<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>
<?php require_once("top.php"); ?>

<?php
	$buy_detail = mysqli_query($az_con, "SELECT * FROM buy_detail
	INNER JOIN category ON category.category_id = buy_detail.category_id
	WHERE buy_id = " .$_GET["buy_id"]);

	$row_buy_detail = mysqli_fetch_assoc($buy_detail);
?>



<div class="col-lg-9">
	<?php require_once("print.php"); ?>
	<div id="printArea">
	<h3>جزییات خریداری</h3>

	<table class="table table-condensed">
		<tr>
			<th>نام جنس</th>
			<th>نوعیت</th>
			<th>جزییات</th>
			<th>تعداد</th>
			<th>قیمت</th>
			<th>مجموع</th>
			<th>تاریخ تولید </th>
			<th>تاریخ انقضا</th>
		</tr>
		<?php $total=0; ?>
		<tr>
			<td> <?php echo $row_buy_detail["product_name"]; ?> </td>
			<td> <?php echo $row_buy_detail["category_name"]; ?> </td>
			<td> <?php echo $row_buy_detail["description"]; ?> </td>
			<td> <?php echo $row_buy_detail["quantity"]; ?> </td>
			<td> <?php echo $row_buy_detail["unitprice"]; ?> </td>
			<td> <?php echo $row_buy_detail["totalprice"];
				$total += $row_buy_detail["totalprice"];
			?> </td>
			<td> <?php echo $row_buy_detail["manufacture_date"]; ?> </td>
			<td> <?php echo $row_buy_detail["expire_date"]; ?> </td>
		</tr>

		<tr>
			<td align="left" colspan="8">
			مجموع خریداری: <?php echo $total;?>
			</td>
		</tr>
	</table>
	</div>

</div>


<?php require_once("footer.php"); ?>

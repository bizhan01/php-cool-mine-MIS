<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>
<?php require_once("top.php"); ?>
<?php

	$sales_detail = mysqli_query($az_con, "SELECT *, sales_detail.quantity AS sold_quantity
	FROM sales_detail INNER JOIN product ON product.product_id = sales_detail.product_id
	WHERE sales_id = " .$_GET["sales_id"]);

	$row_sales_detail = mysqli_fetch_assoc($sales_detail);

?>

<div class="col-lg-9">
	<?php require_once("print.php"); ?>


	<div id="printArea">
	<h3>جزییات بل آی دی</h3>

	<table class="table table-hover">
		<tr>
			<th>نام جنس</th>
			<th>تعداد</th>
			<th>قیمت</th>
			<th>مجموع</th>
			<th>تخفیف</th>
			<th>قیمت نهایی </th>

		</tr>
		<?php $total=0; do { ?>
		<tr>
			<td> <?php echo $row_sales_detail["product_name"]; ?> </td>
			<td> <?php echo $row_sales_detail["sold_quantity"]; ?> </td>
			<td> <?php echo $row_sales_detail["unitprice"]; ?> </td>
			<td> <?php echo $row_sales_detail["totalprice"]; ?> </td>
			<td> <?php echo $row_sales_detail["discount"]; ?> </td>
			<td> <?php echo $row_sales_detail["totalamount"];
				$total += $row_sales_detail["totalamount"]; ?> </td>
		</tr>
		<?php } while($row_sales_detail = mysqli_fetch_assoc($sales_detail)); ?>
		<tr>
			<td colspan="6" align="left">
				مجموع بل: <?php echo $total; ?>
			</td>
		</tr>
	</table>
	</div>

</div>



<?php require_once("footer.php"); ?>

<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>
<?php
	$q = "";
	$column = "";
	$condition = "";
	if(isset($_GET["q"])){
		$column = $_GET["searchby"];

		$q = $_GET["q"];

	$condition = " WHERE $column LIKE '%$q%' ";
	}

	$company_order = mysqli_query($az_con, "SELECT company_order_id, name,
	certify_no, con_person, phone
	FROM company_order
	$condition
	ORDER BY company_order_id DESC");

	$row_company_order = mysqli_fetch_assoc($company_order);



?>

<?php require_once("top.php"); ?>

<div class="col-lg-9">
	<div class="search">

		<form>
			<input type="text" name="q"/>
			<select name="searchby">
				<option value="company_order_id">شماره</option>
				<option value="name">نام</option>
				<option value="certify_no">جواز نمبر</option>
			</select>
			<input type="submit" value="جستجو"/>
		</form>

	</div>
	<h3>لیست فرمایشات شرکت ها</h3>
	<?php if(mysqli_num_rows($company_order) > 0) { ?>

		<?php if(isset($_GET["q"])) { ?>
		<div>
		<strong>تعداد نتائج بدست آمده: &nbsp;</strong><?php echo mysqli_num_rows($company_order); ?>
		</div>
	<?php } ?>


	<div class="table table-responsive">
		<table class="table table-condensed">
			<tr>
				<th>آی دی</th>
				<th>نام</th>
				<th>جواز نمبر</th>
				<th>شخص ارتباطی</th>
				<th>تلیفون</th>
				<th>جزئیات</th>
			</tr>

			<?php do{ ?>
			<tr>
				<td><?php echo $row_company_order["company_order_id"]; ?></td>
				<td><?php echo $row_company_order["name"]; ?></td>
				<td><?php echo $row_company_order["certify_no"]; ?></td>
				<td><?php echo $row_company_order["con_person"]; ?></td>
				<td><?php echo $row_company_order["phone"]; ?></td>
				<td>
					<a href="company_orders_detail.php?company_order_id=
					<?php echo $row_company_order["company_order_id"]; ?>" class="glyphicon glyphicon-search">
					</a>
				</td>
			</tr>
			<?php } while($row_company_order = mysqli_fetch_assoc($company_order)) ?>

		</table>

	</div>
	<?php } else { ?>
			<h3 style="color:orange" align="center">
			هیچ نتیجه دریافت نشد!
			</h3>
	<?php } ?>
</div>


<?php require_once("footer.php"); ?>

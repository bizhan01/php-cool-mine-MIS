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
	$person_order = mysqli_query($az_con, "SELECT person_order_id, firstname, lastname,
	phone, orders FROM person_order
	$condition
	ORDER BY person_order_id DESC");

	$row_person_order = mysqli_fetch_assoc($person_order);

?>



<?php require_once("top.php"); ?>

<div class="col-lg-9">
	<div class="search">

		<form>
			<input type="text" name="q"/>
			<select name="searchby">
				<option value="person_order_id">شماره</option>
				<option value="firstname">نام</option>
				<option value="lastname">تخلص</option>



			</select>
			<input type="submit" value="جستجو"/>
		</form>

	</div>
	<h3>لیست فرمایشات فردی</h3>
	<?php if(mysqli_num_rows($person_order) > 0) { ?>

		<?php if(isset($_GET["q"])) { ?>
		<div>
		<strong>تعداد نتائج بدست آمده: &nbsp;</strong><?php echo mysqli_num_rows($person_order); ?>
		</div>
	<?php } ?>
	<div class="table table-responsive">
		<table class="table table-striped">
			<tr>
				<th>آی دی</th>
				<th>نام</th>
				<th>تخلص</th>
				<th>تلیفون</th>
				<th>سفارش</th>
				<th>جزئیات</th>
			</tr>

			<?php do { ?>
			<tr>
				<td> <?php echo $row_person_order["person_order_id"]; ?> </td>
				<td> <?php echo $row_person_order["firstname"]; ?>  </td>
				<td> <?php echo $row_person_order["lastname"]; ?>  </td>
				<td> <?php echo $row_person_order["phone"]; ?>  </td>
				<td> <?php echo $row_person_order["orders"]; ?>  </td>

				<td>
					<a href="person_orders_detail.php?person_order_id=
					<?php echo $row_person_order["person_order_id"]; ?>  ">
						<span class="glyphicon glyphicon-search"></span>
					</a>
				</td>
			</tr>
			<?php } while($row_person_order = mysqli_fetch_assoc($person_order)); ?>

		</table>

	</div>
	<?php } else { ?>
			<h3 style="color:orange" align="center">
			هیچ نتیجه دریافت نشد!
			</h3>
	<?php } ?>
</div>

<?php require_once("footer.php"); ?>

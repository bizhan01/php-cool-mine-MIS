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
	$product = mysqli_query($az_con, "SELECT * FROM product
	$condition
	ORDER BY product_name ASC");

	$row_product = mysqli_fetch_assoc($product);

?>
<?php require_once("top.php"); ?>

<?php if(isset($_GET["add"])) { ?>
	<div class="alert alert-success alert-dismissable">
		<button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
		جنس جدید با موفقیت ثبت گردید!
	</div>
<?php } ?>

<?php if(isset($_GET["delete"])) { ?>
	<div class="alert alert-success alert-dismissable">
		<button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
		جنس مورد نظر حذف شد!
	</div>
<?php } ?>

<div class="col-lg-9">
	<div class="search">

		<form>
			<input type="text" name="q"/>
			<select name="searchby">
				<option value="product_id">شماره</option>
				<option value="product_name">نام</option>
				<option value="category_name">کتگوری</option>
			</select>
			<input type="submit" value="جستجو"/>
		</form>

	</div>
	<h3>لیست همه اجناس</h3>
	<?php if(mysqli_num_rows($product) > 0) { ?>

		<?php if(isset($_GET["q"])) { ?>
		<div>
		<strong>تعداد نتائج بدست آمده: &nbsp;</strong><?php echo mysqli_num_rows($product); ?>
		</div>
	<?php } ?>
	<div class="table-responsive">

	<table class="table table-hover table-striped table-bordered">
		<tr>
			<th>آی دی</th>
			<th>تصویر</th>
			<th>نام جنس</th>
			<th>قیمت</th>
			<th>تعداد</th>
			<?php if($_SESSION["user_level"]=="admin"){ ?>
			<th>حذف</th>
			<?php } ?>
			<th>تصحیح</th>
		</tr>


		<?php do { ?>
			<tr>
				<td><?php echo $row_product["product_id"]; ?></td>
				<td><img src="<?php echo $row_product["image"]; ?>" height="50" width="50"></td>
				<td><?php echo $row_product["product_name"]; ?></td>
				<td><?php echo $row_product["unitprice"]; ?></td>
				<td><?php echo $row_product["quantity"]; ?></td>
				<?php if($_SESSION["user_level"]=="admin"){ ?>
				<td>
					<a class="delete" href="product_delete.php?product_id=<?php echo $row_product["product_id"]; ?>">
						<span class="glyphicon glyphicon-trash" style="color: red"></span>
					</a>
				</td>
				<?php } ?>

				<td>
					<a href="product_edit.php?product_id=<?php echo $row_product["product_id"]; ?>">
						<span class="glyphicon glyphicon-edit"></span>
					</a>
				</td>

			</tr>
		<?php } while($row_product = mysqli_fetch_assoc($product)); ?>

	</table>

	</div>

	<?php } else { ?>
			<h3 style="color:orange" align="center">
			هیچ نتیجه دریافت نشد!
			</h3>
	<?php } ?>
</div>


<?php require_once("footer.php"); ?>

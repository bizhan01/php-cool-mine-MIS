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
	$employee = mysqli_query($az_con, "SELECT employee_id, firstname,
	lastname, position, phone, image, shift FROM employee
	$condition
	ORDER BY employee_id DESC");

	$row_employee = mysqli_fetch_array($employee);

?>
<?php require_once("top.php"); ?>




<?php if(isset($_GET["add"])) { ?>
	<div class="alert alert-success alert-dismissable">
		<button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
		کارمند جدید با موفقیت ثبت گردید!
	</div>
<?php } ?>

<?php if(isset($_GET["delete"])) { ?>
	<div class="alert alert-success alert-dismissable">
		<button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
		کارمند مورد نظر با موفقیت حذف گردید
	</div>
<?php } ?>


<div class="col-lg-9">
	<div class="search">

		<form>
			<input type="text" name="q"/>
			<select name="searchby">
				<option value="employee_id">شماره</option>
				<option value="firstname">نام</option>
				<option value="lastname">فامیلی</option>
				<option value="position">وظیفه</option>

			</select>
			<input type="submit" value="جستجو"/>
		</form>

	</div>
	<h3>لیست همه کارمندان</h3>
	<?php if(mysqli_num_rows($employee) > 0) { ?>

		<?php if(isset($_GET["q"])) { ?>
		<div>
		<strong>تعداد نتائج بدست آمده: &nbsp;</strong><?php echo mysqli_num_rows($employee); ?>
		</div>
	<?php } ?>

	<div class="table-responsive" class="insert">

	<table class="table table-hover">
		<tr>
			<th>آی دی</th>
			<th>نام</th>
			<th>تخلص</th>
			<th>وظیفه</th>
			<th>تلیفون</th>
			<th>عکس</th>
			<th>جزییات</th>
		</tr>


		<?php do { ?>
			<tr>
				<td><?php echo $row_employee["employee_id"]; ?></td>
				<td><?php echo $row_employee["firstname"]; ?></td>
				<td><?php echo $row_employee["lastname"]; ?></td>
				<td><?php echo $row_employee["position"]; ?></td>
				<td><?php echo $row_employee["phone"]; ?></td>
				<td><img src="<?php echo $row_employee["image"]; ?>" width="60"></td>
				<td>
					<a href="employee_detail.php?employee_id=<?php echo $row_employee["employee_id"]; ?>">
						<span class="glyphicon glyphicon-search"></span>
					</a>
				</td>
			</tr>
		<?php }while($row_employee = mysqli_fetch_assoc($employee)); ?>

	</table>

	</div>
	<?php } else { ?>
			<h3 style="color:orange" align="center">
			هیچ نتیجه دریافت نشد!
			</h3>
	<?php } ?>

</div>


<?php require_once("footer.php"); ?>

<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>

<?php

	$users = mysqli_query($az_con,"SELECT * FROM users INNER JOIN employee ON
	employee.employee_id = users.employee_id ORDER BY employee.employee_id DESC");

	$row_users = mysqli_fetch_assoc($users);
?>

<?php require_once("top.php"); ?>

<div class="col-lg-9">
	<div class="pull-left">
		<a href="employee_user_add.php" class="btn btn-primary">
		<span class="glyphicon glyphicon-plus"></span>
		ساختن حساب جدید
		</a>

	</div>

	<h3>حساب کار مندان</h3>
		<table class="table table-striped">
			<tr>
				<th>آی دی</th>
				<th>نام کارمند</th>
				<th>level</th>
				<th>حساب </th>
				<th>تصویر</th>

			<?php if($_SESSION["user_level"]=="admin"
					|| $_SESSION["user_level"]=="HR") { ?>
				<th>حذف</th>
			<?php } ?>
				<?php if($_SESSION["user_level"]=="admin"
					|| $_SESSION["user_level"]=="HR") { ?>
				<th>تغیر رمز</th>
			<?php } ?>

			</tr>
			<?php do { ?>
			<tr>
				<td> <?php echo $row_users["employee_id"]; ?> </td>
				<td> <?php echo $row_users["firstname"] . "" .
				$row_users["lastname"]; ?> </td>
				<td> <?php echo $row_users["level"]; ?> </td>
				<td> <?php echo $row_users["username"]; ?> </td>

				<td> <img src="<?php echo $row_users["image"]; ?>" width="50"> </td>

				<?php if($_SESSION["user_level"]=="admin"
				|| $_SESSION["user_level"]=="HR") { ?>
				<td>
					<a class = "delete" href="employee_user_delete.php?employee_id=
					<?php echo $row_users["employee_id"]; ?>">
					<span class="glyphicon glyphicon-trash"></span>
					</a>
				</td>
				<?php } ?>
				<?php if($_SESSION["user_level"]=="admin"
				|| $_SESSION["user_level"]=="HR") { ?>
				<td>
					<a href="employee_user_reset.php?employee_id=
					<?php echo $row_users["employee_id"]; ?>">
					<span class="glyphicon glyphicon-lock"></span>
					</a>
				</td>
				<?php } ?>
			</tr>
			<?php } while($row_users=mysqli_fetch_assoc($users)); ?>

		</table>
</div>
<?php require_once("footer.php"); ?>

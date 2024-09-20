<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>

<?php

	$category = mysqli_query($az_con, "SELECT * FROM category ORDER BY
	category_name ASC");

	$row_category = mysqli_fetch_assoc($category);

?>

<?php require_once("top.php"); ?>

<div class="col-lg-9">
	<div class="pull-left">
		<a href="category_add.php" class="btn btn-primary">
		<span class="glyphicon glyphicon-plus"></span>
		ثبت نوعیت جدید
		</a>

	</div>


	<h3>انواع اجناس</h3>
	<table class="table table-striped">
		<tr>
			<th>آی دی</th>
			<th>نوعیت</th>
			<?php if($_SESSION["user_level"]=="admin"){ ?>
			<th>حذف</th>
			<?php } ?>
			<th>تصحیح</th>
		</tr>

		<?php do { ?>
		<tr>
			<td> <?php echo $row_category["category_id"]; ?> </td>
			<td> <?php echo $row_category["category_name"]; ?> </td>

			<?php if($_SESSION["user_level"]=="admin"){ ?>
			<td>
			<a class="delete" href="category_delete.php?category_id=
			<?php echo $row_category["category_id"]; ?>">
			<span class="glyphicon glyphicon-trash"></span>
			</a>
			</td>
			<?php } ?>
			<td>
			<a href="category_edit.php?category_id=
			<?php echo $row_category["category_id"]; ?>">
			<span class="glyphicon glyphicon-edit"></span>
			</a>
			</td>


		</tr>
		<?php } while(
		$row_category = mysqli_fetch_assoc($category)); ?>

	</table>
</div>



<?php require_once("footer.php"); ?>

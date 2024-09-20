<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>
<?php

	if(isset($_GET["cus_person_id"])) {
		$cus_person = mysqli_query($az_con, "SELECT * FROM cus_person
		WHERE cus_person_id=" . $_GET["cus_person_id"]);
		$row_cus_person = mysqli_fetch_assoc($cus_person);
	}
	else {
		header("location:cus_person_list.php");
	}
?>
<?php require_once("top.php"); ?>

<div class="col-lg-9">
	<div class="pull-left">
		<a class="btn btn-primary" href="cus_person_edit.php?cus_person_id=
		<?php echo $_GET["cus_person_id"]; ?>">
			<span class="glyphicon glyphicon-edit"></span>
			تصحیح
		</a>

		<a class="delete btn btn-danger"
		href="cus_person_delete.php?cus_person_id=<?php
		echo $_GET["cus_person_id"]; ?>">
			<span class="glyphicon glyphicon-trash"></span>
			حذف
		</a>
	</div>

	<h3>معلومات مشتریان فردی</h3>




	<table class="table table-striped">

		<tr>
			<td><label>آی دی:</label></td>
			<td><?php echo $row_cus_person["cus_person_id"]; ?></td>
		</tr>

		<tr>
			<td><label>نام:</label></td>
			<td><?php echo $row_cus_person["cus_firstname"]
			. " " . $row_cus_person["cus_lastname"]; ?></td>
		</tr>

		<tr>
			<td><label>تلیفون:</label></td>
			<td><?php echo $row_cus_person["phone"]; ?></td>
		</tr>

		<tr>
			<td><label>ایمیل:</label></td>
			<td><?php echo $row_cus_person["email"]; ?></td>
		</tr>

		<tr>
			<td><label>آدرس:</label></td>
			<td><?php echo $row_cus_person["address"]; ?></td>
		</tr>

		<tr>
			<td><label>تاریخ ثبت:</label></td>
			<td><?php echo $row_cus_person["reg_date"]; ?></td>
		</tr>


	</table>
</div>
<?php require_once("footer.php"); ?>

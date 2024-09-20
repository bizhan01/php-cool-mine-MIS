
<?php require_once("connection.php"); ?>
<?php

	if(isset($_GET["employee_id"])) {
		$employee = mysqli_query($az_con, "SELECT * FROM employee
		WHERE employee_id=" . $_GET["employee_id"]);
		$row_employee = mysqli_fetch_assoc($employee);
	}
	else {
		header("location:employee_list.php");
	}
?>
<?php require_once("top.php"); ?>

<div class="col-lg-9">
	<div class="pull-left">
		<a class="btn btn-primary" href="employee_edit.php?employee_id=<?php echo $_GET["employee_id"]; ?>">
			<span class="glyphicon glyphicon-edit"></span>
			تصحیح
		</a>

		<a class="delete btn btn-danger" href="employee_delete.php?employee_id=<?php echo $_GET["employee_id"]; ?>">
			<span class="glyphicon glyphicon-trash"></span>
			حذف
		</a>
	</div>

	<h3>معلومات کارمند</h3>

	<table style="width:60%;" class="table table-striped pull-right">
		<tr>
			<td><label>شماره:</label></td>
			<td><?php echo $row_employee["employee_id"]; ?></td>
		</tr>

		<tr>
			<td><label>نام:</label></td>
			<td><?php echo $row_employee["firstname"] . " " . $row_employee["lastname"]; ?></td>
		</tr>

		<tr>
			<td><label>وظیفه:</label></td>
			<td><?php echo $row_employee["position"]; ?></td>
		</tr>

	</table>

	<img class="pull-left" src="<?php echo $row_employee["image"]; ?>" width="140">


	<table class="table table-striped">

		<tr>
			<td><label>نمبر تذکره:</label></td>
			<td><?php echo $row_employee["identity_no"]; ?></td>
		</tr>

		<tr>
			<td><label>جنسیت:</label></td>
			<td><?php echo $row_employee["gender"]==0 ? "مذکر" :"مونث"; ?></td>
		</tr>

		<tr>
			<td><label>حالت مدنی:</label></td>
			<td><?php echo $row_employee["marital_status"]==0 ? "مجرد" : "متاهل"; ?></td>
		</tr>

		<tr>
			<td><label>سال تولد:</label></td>
			<td><?php echo $row_employee["dob"]; ?>
			(<?php echo date("Y") - $row_employee["dob"] ?> ساله)
			</td>
		</tr>

		<tr>
			<td><label>تحصیلات:</label></td>
			<td><?php echo $row_employee["education"]; ?></td>
		</tr>

		<tr>
			<td><label>تلیفون:</label></td>
			<td><?php echo $row_employee["phone"]; ?></td>
		</tr>

		<tr>
			<td><label>ایمیل:</label></td>
			<td><?php echo $row_employee["email"]; ?></td>
		</tr>

		<tr>
			<td><label>آدرس:</label></td>
			<td><?php echo $row_employee["address"]; ?></td>
		</tr>



		<tr>
			<td><label>معاش:</label></td>
			<td><?php echo $row_employee["salary"]; ?>
				 <small>افغانی</small>
			</td>
		</tr>

		<tr>
			<td><label>اوقات کاری:</label></td>
			<td><?php echo $row_employee["shift"]; ?></td>
		</tr>

		<tr>
			<td><label>تاریخ استخدام:</label></td>
			<td><?php echo $row_employee["hire_date"]; ?></td>
		</tr>

		<tr>
			<td><label>قرار داد:</label></td>
			<td><?php echo $row_employee["contract"]; ?></td>
		</tr>


	</table>
</div>
<?php require_once("footer.php"); ?>

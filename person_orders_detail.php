<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>

<?php

	if(isset($_GET["person_order_id"])){

		$person_order = mysqli_query($az_con, "SELECT * FROM person_order
		WHERE person_order_id=" . $_GET["person_order_id"]);

		$row_person_order = mysqli_fetch_assoc($person_order);

	}
	else{
		header("location:person_orders_list.php");
	}


?>


<?php require_once("top.php"); ?>

<div class="col-lg-9">
	<div class="pull-left">
		<a class="btn btn-primary" href="person_orders_edit.php?person_order_id=
		<?php echo $_GET["person_order_id"]; ?>">
			<span class="glyphicon glyphicon-edit"></span>
			تصحیح
		</a>

		<a class="delete btn btn-danger"
		href="person_orders_delete.php?person_order_id=<?php
		echo $_GET["person_order_id"]; ?>">
			<span class="glyphicon glyphicon-trash"></span>
			حذف
		</a>
	</div>

	<h3>جزئیات  سفارشات فردی</h3>

	<table class="table table-striped">
		<tr>
			<td><label>آی دی:</label></td>
			<td> <?php echo $row_person_order["person_order_id"]; ?> </td>
		</tr>

		<tr>
			<td><label>نام:</label></td>
			<td> <?php echo $row_person_order["firstname"]; ?>  </td>
		</tr>

		<tr>
			<td><label>تخلص:</label></td>
			<td> <?php echo $row_person_order["lastname"]; ?>  </td>
		</tr>

		<tr>
			<td><label>تلیفون:</label></td>
			<td> <?php echo $row_person_order["phone"]; ?>  </td>
		</tr>

		<tr>
			<td><label>ایمیل:</label></td>
			<td><?php echo $row_person_order["email"]; ?> </td>
		</tr>

		<tr>
			<td><label>سفارش:</label></td>
			<td><?php echo $row_person_order["orders"]; ?> </td>
		</tr>

		<tr>
			<td><label>آدرس:</label></td>
			<td><?php echo $row_person_order["address"]; ?> </td>
		</tr>

		<tr>
			<td><label>تاریخ ثبت:</label></td>
			<td><?php echo $row_person_order["reg_date"]; ?> </td>
		</tr>

	</table>

</div>


<?php require_once("footer.php"); ?>

<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>

<?php



	$employee = mysqli_query($az_con, "SELECT * FROM  employee
	ORDER BY employee_id ASC");
	$row_employee = mysqli_fetch_assoc($employee);

	if(isset($_POST["reference"])){
		$reference = $_POST["reference"];
		$employee_id = $_POST["employee_id"];
		$identity_no = $_POST["identity_no"];
		$organization = $_POST["organization"];
		$position = $_POST["position"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		$address = $_POST["address"];




		if(mysqli_query($az_con, "INSERT INTO employee_reference VALUES (NULL,
		$employee_id, $identity_no, '$reference', '$organization',
		'$position', '$phone', '$email', '$address')")){

			header("location:employee_reference_list.php?add=done");

		}
		else{

			header("location:employee_reference_add.php?add=nodone");

		}

	}

?>


<?php require_once("top.php"); ?>

<div class="col-lg-9">
	<h3>ثبت شخص ضمانت کننده</h3>

	<form method="post">

	<div class="input-group">
		<span class="input-group-addon">
		نام کار مند:
		</span>
			<select name="employee_id" class="form-control">
			<option value="NULL">کارمند مورد نظر را انتخاب کنید</option>
			<?php do{ ?>
			<option value="<?php echo $row_employee["employee_id"]; ?>">
			<?php echo $row_employee["firstname"] ." ". $row_employee["lastname"]; ?>
			</option>
			<?php } while($row_employee = mysqli_fetch_assoc($employee)); ?>
			</select>
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			شخص ضمانت کننده:</span>
			<input required placeholder="شخص ضمانت کننده"  type="text"  class="form-control" name="reference">

		</div>

		<div class="input-group">
			<span class="input-group-addon">
			نمبر تذکره ضمانت کننده:</span>
			<input placeholder="نمبر تذکره"  type="text"  class="form-control" name="identity_no">

		</div>

		<div class="input-group">
			<span class="input-group-addon">
			وظیفه:</span>
			<input type="text" placeholder="وظیفه"   class="form-control" name="position">

		</div>

		<div class="input-group">
			<span class="input-group-addon">
			ارگان/ محل وظیفه:</span>
			<input type="text" placeholder="محل وظیفه/ ارگان"   class="form-control" name="organization">

		</div>

		<div class="input-group">
			<span class="input-group-addon">
			تلیفون:</span>
			<input required type="text" placeholder="تلیفون"   class="form-control" name="phone">

		</div>

		<div class="input-group">
			<span class="input-group-addon">
			ایمیل:</span>
			<input type="email" placeholder="ایمیل"   class="form-control" name="email">

		</div>

		<div class="input-group">
			<span class="input-group-addon">
			آدرس:</span>
			<textarea required class="form-control" name="address">
			</textarea>

		</div>

		<input type="submit" value="ثبت نمودن" class="btn btn-primary">

		<div class="pull-left">
		<a class="btn btn-success" href="employee_reference_list.php">
			<span class="glyphicon glyphicon-list"></span>
			لیست ضمانت کننده ها
		</a>
		</div>


	</form>
</div>




<?php require_once("footer.php"); ?>

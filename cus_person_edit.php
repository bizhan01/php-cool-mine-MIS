<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>

<?php

	$cus_person = mysqli_query($az_con, "SELECT * FROM cus_person
	WHERE cus_person_id=" . $_GET["cus_person_id"]);

	$row_cus_person = mysqli_fetch_assoc($cus_person);


	if(isset($_POST["cus_firstname"])){
		$firstname = $_POST["cus_firstname"];
		$lastname = $_POST["cus_lastname"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		$address = $_POST["address"];
		$reg_date = $_POST["reg_date"];

	if(mysqli_query($az_con, "UPDATE cus_person SET cus_firstname='$firstname',
	cus_lastname='$lastname', phone='$phone', email='$email',
	address='$address', reg_date='$reg_date' WHERE cus_person_id="
	. $_GET["cus_person_id"])){

		header("location:cus_person_list.php?edit=done");
	}
	else{
		header("location:cus_person_edit.php?error=notupdate");

	}


	}
?>

<?php require_once("top.php"); ?>

<div class="col-lg-9">
	<h3>تصحیح مشخصات مشتریان فردی</h3>

	<form method="post">
		<div class="input-group">
			<span class="input-group-addon">
			نام مشتری:
			</span>
			<input value="<?php echo $row_cus_person["cus_firstname"]; ?>" type="text" name="cus_firstname" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			تخلص:
			</span>
			<input value="<?php echo $row_cus_person["cus_lastname"]; ?>" type="text" name="lastname" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			تلیفون:
			</span>
			<input value="<?php echo $row_cus_person["phone"]; ?>" type="text" name="phone" class="form-control">
		</div>
		<div class="input-group">
			<span class="input-group-addon">
			ایمیل:
			</span>
			<input value="<?php echo $row_cus_person["email"]; ?>" type="email" name="email" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			آدرس:
			</span>
			<textarea name="address" class="form-control">
				<?php echo $row_cus_person["address"]; ?>
			</textarea>
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			تاریخ ثبت:
			</span>
			<input value="<?php echo $row_cus_person["reg_date"]; ?>" type="text" name="reg_date" id="reg_date" class="form-control">
		</div>

		<input type="submit" value="ذخیره نمودن" class="btn btn-primary">

	</form>

	<script type="text/javascript">
			function catcalc(cal) {
					var date = cal.date;
					var time = date.getTime()
					var field = document.getElementById("reg_date");
					if (field == cal.params.inputField) {
							field = document.getElementById("reg_date");
							time -= Date.WEEK;
					} else {
							time += Date.WEEK;
					}
					var date = new Date(time);
					field.value = date.print("%Y-%m-%d");
			}

		Calendar.setup({
					inputField      :    "reg_date",
					ifFormat        :    "%Y-%m-%d",
					showsTime       :    false,
					timeFormat      :    "24"
			});
	</script>
</div>

<?php require_once("footer.php"); ?>

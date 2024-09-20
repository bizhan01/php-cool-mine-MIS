<?php require_once("restrict.php")?>
<?php
	require_once("connection.php");

	$employee = mysqli_query($az_con, "SELECT * FROM employee WHERE employee_id="
	. $_GET["employee_id"]);
	$row_employee = mysqli_fetch_assoc($employee);

	if(isset($_POST["firstname"])) {
		$firstname = $_POST["firstname"];
		$identity_no = $_POST["identity_no"];
		$lastname = $_POST["lastname"];
		$gender = $_POST["gender"];
		$marital = $_POST["marital"];
		$position = $_POST["position"];
		$salary = $_POST["salary"];
		$education = $_POST["education"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		$address = $_POST["address"];
		$hire_date = $_POST["hire_date"];
		$dob = $_POST["dob"];
		$shift = $_POST["shift"];
		$contract = $_POST["contract"];


		if($_FILES["image"]["name"] != "") {
			$path = "images/employee/" . time() . $_FILES["image"]["name"];
			move_uploaded_file($_FILES["image"]["tmp_name"], $path);
		}
		else {
			$path = $row_employee["image"];
		}

		if(mysqli_query($az_con, "UPDATE employee SET firstname='$firstname',
		lastname='$lastname', position='$position',
		education='$education', phone='$phone',
		email='$email', address='$address',
		image='$path', gender=$gender,
		hire_date='$hire_date', dob=$dob,
		marital_status=$marital, salary=$salary,
		shift='$shift' WHERE employee_id="
		. $_GET["employee_id"])) {
			header("location:employee_list.php?edit=done");
		}
		else {
			header("location:employee_edit.php?error=notupdate");
		}

	}


?>
<?php require_once("top.php"); ?>

<div class="col-lg-9">
	<h3>تصحیح مشخصات کارمند</h3>

	<?php if(isset($_GET["error"])) { ?>
		<div class="alert alert-danger alert-dismissable">
			<button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
			عملیه تصحیح معلومات انجام نشد! لطفا دوباره کوشش نمایید!
		</div>
	<?php } ?>


	<form method="post" enctype="multipart/form-data">

		<div class="input-group">
			<span class="input-group-addon">
			نام:</span>
			<input value="<?php echo $row_employee["firstname"]; ?>" title="نام کارمند اجباری است" type="text" class="form-control" name="firstname">
			<span class="input-group-addon red">*</span>
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			تخلص:</span>
			<input value="<?php echo $row_employee["lastname"]; ?>" type="text" class="form-control" name="lastname">
			<span class="input-group-addon red">*</span>
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			جنسیت:</span>

			<label><input <?php if($row_employee["gender"]==0) echo "checked"; ?> type="radio" name="gender" value="0"> مذکر</label>

			&nbsp;

			<label><input <?php if($row_employee["gender"]==1) echo "checked"; ?> type="radio" name="gender" value="1"> مونث</label>
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			حالت مدنی:</span>
			<label><input <?php if($row_employee["marital_status"]==0) echo "checked"; ?> type="radio" name="marital" value="0"> مجرد</label>

			 &nbsp;

			<label><input <?php if($row_employee["marital_status"]==1) echo "checked"; ?> type="radio" name="marital" value="1"> متاهل</label>

		</div>

		<div class="input-group">
			<span class="input-group-addon">
			وظیفه:</span>
			<input value="<?php echo $row_employee["position"]; ?>" type="text" class="form-control" name="position">
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			معاش:</span>
			<input type="text" value="<?php echo $row_employee["salary"]; ?>" name="salary" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			تحصیلات:</span>
			<select name="education" class="form-control">
				<option <?php if($row_employee["education"]=="بیسواد") echo "selected"; ?>>بیسواد</option>
				<option <?php if($row_employee["education"]=="دوازده پاس") echo "selected"; ?>>دوازده پاس</option>
				<option <?php if($row_employee["education"]=="چهارده پاس") echo "selected"; ?>>چهارده پاس</option>
				<option <?php if($row_employee["education"]=="لیسانس") echo "selected"; ?>>لیسانس</option>
				<option <?php if($row_employee["education"]=="ماستر") echo "selected"; ?>>ماستر</option>
				<option <?php if($row_employee["education"]=="دوکتور") echo "selected"; ?>>دوکتور</option>
			</select>
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			تلیفون:</span>
			<input value="<?php echo $row_employee["phone"]; ?>" type="text" name="phone" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			ایمیل:</span>
			<input type="email" value="<?php echo $row_employee["email"]; ?>" name="email" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			آدرس:</span>
			<textarea name="address" class="form-control"><?php echo $row_employee["address"]; ?></textarea>
		</div>


		<div class="input-group">
			<span class="input-group-addon">
			تاریخ استخدام:</span>
			<input autocomplete="off" value="<?php echo $row_employee["hire_date"]; ?>" type="text" name="hire_date" id="hire_date" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			سال تولد:</span>
			<select name="dob" class="form-control">
				<?php
					$min = date("Y") - 65;
					$max = date("Y") - 18;

					for($x=$max; $x>=$min; $x--) {
						if($row_employee["dob"] == $x) {
							echo "<option selected>$x</option>";
						} else {
							echo "<option>$x</option>";
						}

					}

				?>
			</select>
		</div>


		<div class="input-group">
			<span class="input-group-addon">
			اوقات کاری:</span>
			<select name="shift" class="form-control">
				<option <?php if($row_employee["shift"]=="قبل از ظهر") echo "selected"; ?>>قبل از ظهر</option>
				<option <?php if($row_employee["shift"]=="بعد از ظهر") echo "selected"; ?>>بعد از ظهر</option>
				<option <?php if($row_employee["shift"]=="شب") echo "selected"; ?>>شب</option>
			</select>
		</div>


		<div class="input-group">
			<span class="input-group-addon">
			قرار داد:</span>
			<input autocomplete="off" value="<?php echo $row_employee["contract"]; ?>" type="text" name="hire_date" id="hire_date" class="form-control">
		</div>


		<div class="input-group">
			<span class="input-group-addon">
			عکس:</span>
			<input type="file" name="image" class="form-control">
			<span class="input-group-addon">
				<img src="<?php echo $row_employee["image"]; ?>" width="20">
			</span>
		</div>


		<input type="submit" value="ذخیره نمودن" class="btn btn-primary fit-width">

	</form>

	<br>
	<br>

	<script type="text/javascript">
	    function catcalc(cal) {
	        var date = cal.date;
	        var time = date.getTime()
	        var field = document.getElementById("hire_date");
	        if (field == cal.params.inputField) {
	            field = document.getElementById("hire_date");
	            time -= Date.WEEK;
	        } else {
	            time += Date.WEEK;
	        }
	        var date = new Date(time);
	        field.value = date.print("%Y-%m-%d");
	    }

		Calendar.setup({
	        inputField      :    "hire_date",
	        ifFormat        :    "%Y-%m-%d",
	        showsTime       :    false,
	        timeFormat      :    "24"
	    });
	</script>

</div>


<?php require_once("footer.php"); ?>

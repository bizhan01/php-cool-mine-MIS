<?php require_once("restrict.php"); ?>
<?php

	require_once("connection.php");
	
	if(isset($_POST["firstname"])) {
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$identity_no = $_POST["identity_no"];
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
		
		$path = "images/employee/" . time() . $_FILES["image"]["name"];
		
		move_uploaded_file($_FILES["image"]["tmp_name"], $path);
	
		if(mysql_query("INSERT INTO employee VALUES (NULL, $identity_no, '$firstname', '$lastname',
		 '$position', '$education', '$phone', '$email', '$address', 
		'$path', $gender, '$hire_date', $dob, $marital, $salary, '$shift',
		'$contract')", $con)){
			header("location:employee_list.php?add=done");
		}
		else {
			header("location:employee_add.php?error=notinsert");
		}
	}	
?>


<?php require_once("top.php"); ?>

<h3>ثبت نمودن کارمند جدید</h3>

<?php if(isset($_GET["error"])) { ?>
	<div class="alert alert-danger alert-dismissable">
		<button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
		عملیه ثبت انجام نشد! لطفا دوباره کوشش نمایید!
	</div>
<?php } ?>


<form method="post" enctype="multipart/form-data">

	<div class="input-group">
		<span class="input-group-addon">
		نام:</span>
		<input  title="نام کارمند اجباری است" type="text" class="form-control" name="firstname">
		<span class="input-group-addon red">*</span>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		تخلص:</span>
		<input type="text" class="form-control" name="lastname">
		<span class="input-group-addon red">*</span>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		نمبر تذکره:</span>
		<input type="text"  class="form-control" name="identity_no">
		<span class="input-group-addon red">*</span>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		جنسیت:</span> 
		
		<label><input checked type="radio" name="gender" value="0"> مذکر</label>
		
		&nbsp; 
		
		<label><input type="radio" name="gender" value="1"> مونث</label>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		حالت مدنی:</span> 
		<label><input checked type="radio" name="marital" value="0"> مجرد</label>
		
		 &nbsp; 
		
		<label><input type="radio" name="marital" value="1"> متاهل</label>
		
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		وظیفه:</span>
		<input type="text" class="form-control" name="position">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		معاش:</span>
		<input type="text" name="salary" class="form-control">
	</div>

	<div class="input-group">
		<span class="input-group-addon">
		تحصیلات:</span>
		<select name="education" class="form-control">
			<option>کارمند عادی</option>
			<option>دوازده پاس</option>
			<option>چهارده پاس</option>
			<option>لیسانس</option>
			<option>ماستر</option>
			<option>دوکتور</option>
		</select>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		تلیفون:</span>
		<input type="text"  name="phone" class="form-control">
		<span class="input-group-addon red">*</span>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		ایمیل:</span>
		<input type="email" name="email" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		آدرس:</span>
		<textarea name="address" class="form-control"></textarea>
		<span class="input-group-addon red">*</span>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		تاریخ استخدام:</span>
		<input type="text" name="hire_date" id="hire_date" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		سال تولد:</span>
		<select name="dob" class="form-control">
			<?php
				$min = date("Y") - 65;
				$max = date("Y") - 18;
				
				for($x=$max; $x>=$min; $x--) {
					echo "<option>$x</option>";
				}
				
			?>
		</select>
	</div>
	
	
	<div class="input-group">
		<span class="input-group-addon">
		اوقات کاری:</span>
		<select name="shift" class="form-control">
			<option>قبل از ظهر</option>
			<option>بعد از ظهر</option>
			<option>تمام وقت</option>
		</select>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		قرار داد:</span>
		<input type="text" name="contract" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		عکس:</span>
		<input type="file" name="image" class="form-control">
	</div>
	<input type="submit" value="ثبت نمودن" class="btn btn-primary fit-width">
	
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

<?php require_once("footer.php"); ?>
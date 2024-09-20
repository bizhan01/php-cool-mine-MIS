<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>

<?php

if(isset($_POST["name"])){
		$name = $_POST["name"];
		$certify_no = $_POST["certify_no"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		$address = $_POST["address"];
		$reg_date = $_POST["reg_date"];

		if(mysqli_query($az_con, "INSERT INTO cus_company VALUES (NULL,
		'$name', '$certify_no', '$phone',
		'$email', '$address', '$reg_date')")){
			header("location:cus_company_add.php?add=done");
		}
		else {
			header("location:cus_person_add.php?error=notinsert");
		}}


?>



<?php require_once("top.php"); ?>

<?php if(isset($_GET["add"])) { ?>
	<div class="alert alert-success alert-dismissable">
		<button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
		عملیه ثبت انجام شد!
	</div>
<?php } ?>

<div class="col-lg-9">
	<a href="cus_company_list.php" class="btn btn-success pull-left">
		لست شرکت ها
	</a>

	<h3>ثبت شرکت</h3>

	<form method="post">

		<div class="input-group">
			<span class="input-group-addon">نام شرکت:</span>
			<input placeholder="نام شرکت" required type="text" name="name" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">جواز نمبر:</span>
			<input type="text" placeholder="جواز نمبر" name="certify_no" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">تلیفون:</span>
			<input type="text" placeholder="تلیفون" name="phone" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">ایمیل:</span>
			<input type="email" name="email" placeholder="ایمیل" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">آدرس:</span>
			<textarea name="address" class="form-control"></textarea>
		</div>

		<div class="input-group">
			<span class="input-group-addon">تاریخ ثبت:</span>
			<input type="text" placeholder="تاریخ ثبت" name="reg_date" id="reg_date" class="form-control">
		</div>

		<input type="submit" value="ثبت نمودن" class="btn btn-primary">
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

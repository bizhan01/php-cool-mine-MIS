<?php require_once("restrict.php")?>
<?php
require_once("connection.php");
	if(isset($_POST["firstname"])){
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		$address = $_POST["address"];
		$reg_date = $_POST["reg_date"];

		if(mysqli_query($az_con, "INSERT INTO cus_person VALUES (NULL,
		'$firstname', '$lastname','$phone',
		'$email', '$address', '$reg_date')")){
			header("location:cus_person_list.php?add=done");
		}
		else {
			header("location:cus_person_add.php?error=notinsert");
		}}
?>

<?php require_once("top.php"); ?>

<div class="col-lg-9">
	<a href="cus_person_list.php" class="btn btn-success pull-left">
		لیست مشتریان
	</a>


	<h3>ثبت مشتریان فردی</h3>


	<form method="post">

		<div class="input-group">
			<span class="input-group-addon">نام مشتری:</span>
			<input placeholder="نام مشتری" required type="text" name="firstname" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">تخلص:</span>
			<input placeholder="تخلص/ فامیلی" type="text" name="lastname" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">تلیفون:</span>
			<input type="text" placeholder="تلیفون" name="phone" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">ایمیل:</span>
			<input type="email" placeholder="ایمیل" name="email" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">آدرس:</span>
			<textarea  name="address" class="form-control"></textarea>
		</div>

		<div class="input-group">
			<span class="input-group-addon">تاریخ ثبت:</span>
			<input placeholder="تاریخ ثبت" type="text" name="reg_dat" id="reg_date" class="form-control">
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

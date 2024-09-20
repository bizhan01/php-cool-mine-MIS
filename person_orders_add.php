<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>

<?php

	if(isset($_POST["firstname"])){
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		$orders = $_POST["orders"];
		$address = $_POST["address"];
		$reg_date = $_POST["reg_date"];

		mysqli_query($az_con, "INSERT INTO person_order VALUES(NULL, '$firstname',
		'$lastname', '$phone', '$email', '$orders', '$address',
		'$reg_date')");

		header("location:person_orders_list.php?add=done");

	}


?>

<?php require_once("top.php"); ?>
<div class="col-lg-9">
	<a href="person_orders_list.php" class="btn btn-success pull-left">
		لست فرمایشات فردی
	</a>

	<h3> ثبت سفارشات فردی</h3>

	<?php if(isset($_GET["add"])) { ?>
		<div class="alert alert-success alert-dismissable">
		<button class="close" area-hidden="true" data-dismiss="alert">
		</button>
		سفارشات فردی با موفقیت ثبت گردید
		</div>
	<?php } ?>

	<form method="post">
		<div class="input-group">
			<span class="input-group-addon">نام مشتری:</span>
			<input placeholder="نام مشتری" required  type="text" name="firstname" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">تخلص/فامیلی:</span>
			<input type="text" placeholder="تخلص/ فامیلی"  name="lastname" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">تلیفون:</span>
			<input type="text" placeholder="تلیفون" required  name="phone" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">ایمیل:</span>
			<input type="email" placeholder="ایمیل"  name="email" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">سفارش:</span>
			<textarea name="orders" required  class="form-control"></textarea>
		</div>

		<div class="input-group">
			<span class="input-group-addon">آدرس:</span>
			<textarea name="address" required class="form-control"></textarea>
		</div>

		<div class="input-group">
			<span class="input-group-addon">تاریخ ثبت:</span>
			<input type="text" placeholder="تارخ ثبت"  autocomplete="off" id="reg_date" name="reg_date" class="form-control">
		</div>
		<input type="submit" value="ثبت کردن" class="btn btn-primary">


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

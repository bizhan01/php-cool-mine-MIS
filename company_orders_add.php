<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>

<?php

	if(isset($_POST["name"])){
		$name = $_POST["name"];
		$certify = $_POST["certify"];
		$person = $_POST["person"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		$orders = $_POST["orders"];
		$address = $_POST["address"];
		$reg_date = $_POST["reg_date"];

	if(mysqli_query($az_con, "INSERT INTO company_order VALUES(NULL,
	'$name', '$certify', '$person', '$phone',
	'$email', '$orders', '$address', '$reg_date')")){

		header("location:company_orders_add.php?add=done");

	}

	else{
		header("location:company_orders_add.php?error=notinsert");
	}


	}



?>


<?php require_once("top.php"); ?>

<div class="col-lg-9">
	<a href="company_orders_list.php" class="btn btn-success pull-left">
	لیست  فرمایشات شرکت ها
	</a>

	<h3>ثبت فرمایشات شرکت</h3>

	<form method="post">
		<div class="input-group">
			<span class="input-group-addon">
			نام شرکت:
			</span>
			<input placeholder="نام مشتری" required type="text" name="name" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			جواز نمبر:
			</span>
			<input type="text" placeholder="جواز نمبر" name="certify" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			شخص ارتباطی:
			</span>
			<input type="text" placeholder="شخص ارتباطی" name="person" class="form-control">
		</div>


		<div class="input-group">
			<span class="input-group-addon">
			تلیفون:
			</span>
			<input type="text" placeholder="تلیفون" required name="phone" class="form-control">
		</div>


		<div class="input-group">
			<span class="input-group-addon">
			ایمیل:
			</span>
			<input type="email" placeholder="ایمیل" name="email" class="form-control">
		</div>


		<div class="input-group">
			<span class="input-group-addon">
			سفارش:
			</span>
			<textarea name="orders" placeholder="سفارش" class="form-control"></textarea>
		</div>


		<div class="input-group">
			<span class="input-group-addon">
			آدرس:
			</span>
			<textarea required placeholder="آدرس" name="address" class="form-control">
			</textarea>
		</div>


		<div class="input-group">
			<span class="input-group-addon">
			تاریخ ثبت:
			</span>
			<input type="text" placeholder="تاریخ ثبت" autocomplete="off" id="reg_date" name="reg_date" class="form-control">
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

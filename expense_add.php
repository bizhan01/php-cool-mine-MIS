<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>

<?php

	if(isset($_POST["title"])){
		$title = $_POST["title"];
		$amount = $_POST["amount"];
		$currency = $_POST["currency"];
		$pay_date = $_POST["pay_date"];
		$employee_id = $_POST["employee_id"];
		$receiver = $_POST["receiver"];

		if(mysqli_query($az_con, "INSERT INTO expense VALUES(NULL, '$title', $amount,
			'$currency', '$pay_date', $employee_id, '$receiver')")){
			header("location:expense_list.php?add=done");
			}
			else{
			header("location:expense_add.php?add=notdone");
			}
	}

	$employee = mysqli_query($az_con, "SELECT * FROM employee
	ORDER BY employee_id ASC");
	$row_employee = mysqli_fetch_assoc($employee);



?>

<?php require_once("top.php"); ?>

<div class="col-lg-9">
	<h3>ثبت مصرف جدید</h3>

	<?php if(isset($_GET["add"])) { ?>
		<div class="alert alert-success alert-dismissable">
		<button class="close" area-hidden="true" data-dismiss="alert">
		</button>
		ثبت مصرف جدید با موفقیت ثبت گردید
		</div>
	<?php } ?>

	<form method="post">

			<div class="input-group">
			<span class="input-group-addon">
			عنوان مصرف:</span>
			<input required placeholder="عنوان مصرف"  type="text" class="form-control" name="title">
			</div>

			<div class="input-group">
			<span class="input-group-addon">
			مقدار مصرف:</span>
			<input placeholder="مقدار مصرف"  type="text" class="form-control" name="amount">
			</div>

			<div class="input-group">
			<span class="input-group-addon">
			واحد پولی:</span>
			<select type="text" name="currency" class="form-control">
				<option>لطفا نوعیت پول را انتخاب کنید</option>
				<option>افغانی</option>
				<option>دالر</option>
				<option>ریال</option>
			</select>
			</div>

			<div class="input-group">
			<span class="input-group-addon">
			تاریخ پرداخت:</span>
			<input placeholder="تاریخ پرداخت"  type="text" autocomplete="off" class="form-control" name="pay_date" id="pay_date">
			</div>

		<div class="input-group">
		<span class="input-group-addon">
		پول دهنده:
		</span>
			<select name="employee_id" class="form-control">
			<option>لطفا شخص پول دهنده را انتخاب کنید</option>
			<?php do{ ?>
			<option value="<?php echo $row_employee["employee_id"]; ?>">
			<?php echo $row_employee["firstname"] ." ". $row_employee["lastname"]; ?>
			</option>
			<?php } while($row_employee = mysqli_fetch_assoc($employee)); ?>
			</select>
		</div>


			<div class="input-group">
			<span class="input-group-addon">
			شخص گیرنده:</span>
			<input type="text" placeholder="شخص گیرنده"  class="form-control" name="receiver">
			</div>
			<input type="submit" value="ثبت نمودن" class="btn btn-primary">
			<a href="expense_list.php" class="btn btn-success pull-left">
		پایان ثبت
			</a>
	</form>

	<script type="text/javascript">
	    function catcalc(cal) {
	        var date = cal.date;
	        var time = date.getTime()
	        var field = document.getElementById("pay_date");
	        if (field == cal.params.inputField) {
	            field = document.getElementById("pay_date");
	            time -= Date.WEEK;
	        } else {
	            time += Date.WEEK;
	        }
	        var date = new Date(time);
	        field.value = date.print("%Y-%m-%d");
	    }

		Calendar.setup({
	        inputField      :    "pay_date",
	        ifFormat        :    "%Y-%m-%d",
	        showsTime       :    false,
	        timeFormat      :    "24"
	    });
	</script>

</div>



<?php require_once("footer.php"); ?>

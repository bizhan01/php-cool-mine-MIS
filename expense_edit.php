<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>

<?php

		$expense = mysqli_query($az_con, "SELECT * FROM expense WHERE expense_id="
		. $_GET["expense_id"]);

		$row_expense = mysqli_fetch_assoc($expense);


	if(isset($_POST["receiver"])){
		$receiver = $_POST["receiver"];
		$amount = $_POST["amount"];
		$currency = $_POST["currency"];
		$pay_date = $_POST["pay_date"];
		$employee_id = $_POST["employee_id"];
		$title = $_POST["title"];

		if(mysqli_query($az_con,"UPDATE expense SET title='$title',
		amount=$amount, currency='$currency', pay_date='$pay_date',
		employee_id='$employee_id', receiver='$receiver' WHERE expense_id="
		. $_GET["expense_id"])){

			header("location:expense_list.php?update=done");
		}
		else{
			header("location:expense_edit.php?update=notdone");

		}

	}



	$employee = mysqli_query($az_con, "SELECT * FROM employee
	ORDER BY employee_id ASC");
	$row_employee = mysqli_fetch_assoc($employee);


?>

<?php require_once("top.php"); ?>

<h3>تصحیح مشخصات مصارف</h3>

<form method="post" enctype="multipart/form-data">

		<div class="input-group">
		<span class="input-group-addon">
		عنوان مصرف:</span>
		<input value="<?php echo $row_expense["title"]; ?>" type="text" class="form-control" name="title">
		</div>

		<div class="input-group">
		<span class="input-group-addon">
		مقدار مصرف:</span>
		<input  value="<?php echo $row_expense["amount"]; ?>"type="text" class="form-control" name="amount">
		</div>

		<div class="input-group">
		<span class="input-group-addon">
		واحد پولی:</span>
		<select type="text"  name="currency" class="form-control">
			<option>لطفا نوعیت پول را انتخاب کنید</option>
			<option <?php if($row_expense["currency"]=="افغانی") echo "selected"; ?>> افغانی</option>
			<option <?php if($row_expense["currency"]=="دالر") echo "selected"; ?> >دالر</option>
			<option <?php if($row_expense["currency"]=="ریال") echo "selected"; ?> >ریال</option>
		</select>
		</div>

		<div class="input-group">
		<span class="input-group-addon">
		تاریخ پرداخت:</span>
		<input value="<?php echo $row_expense["pay_date"]; ?>" type="text" autocomplete="off" class="form-control" name="pay_date" id="pay_date">
		</div>

	<div class="input-group">
	<span class="input-group-addon">
	پول دهنده:
	</span>
		<select name="employee_id" class="form-control">
		<?php do{ ?>
		<option value="<?php echo $row_expense["employee_id"]; ?>">
		<?php echo $row_employee["firstname"] ." ". $row_employee["lastname"]; ?>
		</option>
		<?php } while($row_employee = mysql_fetch_assoc($employee)); ?>
		</select>
	</div>


		<div class="input-group">
		<span class="input-group-addon">
		شخص گیرنده:</span>
		<input value="<?php echo $row_expense["receiver"]; ?>" type="text" class="form-control" name="receiver">
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


<?php require_once("footer.php"); ?>

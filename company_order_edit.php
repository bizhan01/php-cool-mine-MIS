<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>

<?php
	
	$company_order = mysqli_query($az_con, "SELECT * FROM company_order
	WHERE company_order_id=" . $_GET["company_order_id"]);
	$row_company_order = mysqli_fetch_assoc($company_order);
	
	if(isset($_POST["name"])){
		$name = $_POST["name"];
		$certify_no = $_POST["certify_no"];
		$con_person = $_POST["con_person"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		$orders = $_POST["orders"];
		$address = $_POST["address"];
		$reg_date = $_POST["reg_date"];
	
		if(mysqli_query($az_con, "UPDATE company_order SET name='$name',
		certify_no='$certify_no', con_person='$con_person', phone='$phone',
		email='$email', orders='$orders', address='$address',
		reg_date='$reg_date' WHERE company_order_id="
		. $_GET["company_order_id"])){
			header("location:company_orders_list.php?update=done");
		}
		else{
			header("location:company_order_edit.php?update=notupdated");

		
		}
	
	}



?>


<?php require_once("top.php"); ?>

<h3>تصحیح مشخصات سفارشات شرکت ها</h3>

<form method="post">
	<div class="input-group">
		<span class="input-group-addon">نام شرکت:</span>
		<input type="text" value="<?php echo $row_company_order["name"];?>" name="name" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">جواز نمبر:</span>
		<input type="text" value="<?php echo $row_company_order["certify_no"];?>" name="certify_no" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">شخص ارتباطی:</span>
		<input type="text" value="<?php echo $row_company_order["con_person"];?>" name="con_person" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">تلیفون:</span>
		<input type="text" value="<?php echo $row_company_order["phone"];?>" name="phone" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">ایمیل:</span>
		<input type="email" value="<?php echo $row_company_order["email"];?>" name="email" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">سفارش:</span>
		<input type="text" value="<?php echo $row_company_order["orders"];?>" name="orders" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">آدرس:</span>
		<input type="text" value="<?php echo $row_company_order["address"];?>" name="address" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">تاریخ ثبت:</span>
		<input type="text" value="<?php echo $row_company_order["reg_date"];?>" name="reg_date" id="reg_date" class="form-control">
	</div>
	<input type="submit" value="دخیره نمودن" class="btn btn-primary">

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

<?php require_once("footer.php"); ?>
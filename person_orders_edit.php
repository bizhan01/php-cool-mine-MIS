<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>

<?php
	
	$person_order = mysqli_query($az_con, "SELECT * FROM person_order 
	WHERE person_order_id=" . $_GET["person_order_id"]);
	
	$row_person_order = mysqli_fetch_assoc($person_order);
	
	if(isset($_POST["firstname"])){
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		$orders = $_POST["orders"];
		$address = $_POST["address"];
		$reg_date = $_POST["reg_date"];
	
	
	if(mysqli_query($az_con, "UPDATE person_order SET firstname='$firstname',
	lastname='$lastname', phone='$phone', email='$email',
	orders='$orders', address='$address', reg_date='$reg_date' 
	WHERE person_order_id =" . $_GET["person_order_id"])){
		header("location:person_orders_list.php?edit=done");
	}
	else{
		header("location:person_orders_edit.php?edit=notupdate");
		}
	}

?>


<?php require_once("top.php"); ?>

<h3>تصحیح مشخصات فرمایشات فردی</h3>
<form method="post">
	<div class="input-group">
		<span class="input-group-addon">
		نام مشتری:
		</span>
		<input value="<?php echo $row_person_order["firstname"]; ?>" type="text" name="firstname" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		تخلص/ فامیلی:
		</span>
		<input value="<?php echo $row_person_order["lastname"]; ?>" type="text" name="lastname" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		تلیفون:
		</span>
		<input value="<?php echo $row_person_order["phone"]; ?>" type="text" name="phone" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		ایمیل:
		</span>
		<input value="<?php echo $row_person_order["email"]; ?>" type="email" name="email" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		سفارش:
		</span>
		<textarea name="orders" class="form-control">
			<?php echo $row_person_order["orders"]; ?>
		</textarea>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		آدرس:
		</span>
		<textarea name="address" class="form-control">
			<?php echo $row_person_order["address"]; ?>
		</textarea>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		تاریخ ثبت:
		</span>
		<input value="<?php echo $row_person_order["reg_date"]; ?>" type="text" autocomplete="off" id="reg_date" name="reg_date" class="form-control">
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


<?php require_once("footer.php"); ?>
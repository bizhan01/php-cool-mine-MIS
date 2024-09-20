<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>

<?php
	$cus_company = mysqli_query($az_con, "SELECT * FROM cus_company 
	WHERE cus_company_id=" . $_GET["cus_company_id"]);
	$row_cus_company = mysqli_fetch_assoc($cus_company);
	
	if(isset($_POST["name"])) {
		$name = $_POST["name"];
		$certify_no = $_POST["certify_no"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		$address = $_POST["address"];
		$reg_date = $_POST["reg_date"];
		
		
		if(mysqli_query($az_con, "UPDATE cus_company SET name='$name',
		certify_no='$certify_no', phone='$phone', email='$email',
		address='$address', reg_date='$reg_date'
		WHERE cus_company_id=" . $_GET["cus_company_id"])) {
			header("location:cus_company_list.php?edit=done");
		}
		else {
			header("location:cus_company_edit.php?error=notupdate");
		}
	
	}	
?>

<?php require_once("top.php"); ?>

<h3>تصحیح مشخصات شرکت ها</h3>

<form method="post" enctype="multipart/form-data">

	<div class="input-group">
		<span class="input-group-addon">
		نام شرکت:</span>
		<input value="<?php echo $row_cus_company["name"]; ?>" type="text" class="form-control" name="name">
		
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		جواز نمبر:</span>
		<input value="<?php echo $row_cus_company["certify_no"]; ?>" type="text" class="form-control" name="certify_no">
		
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		تلیفون:</span>
		<input value="<?php echo $row_cus_company["phone"]; ?>" type="text" name="phone" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		ایمیل:</span>
		<input type="email" value="<?php echo $row_cus_company["email"]; ?>" name="email" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		آدرس:</span>
		<textarea name="address" class="form-control"><?php echo $row_cus_company["address"]; ?></textarea>
	</div>
	
	
	<div class="input-group">
		<span class="input-group-addon">
		تاریخ ثبت:</span>
		<input autocomplete="off" value="<?php echo $row_cus_company["reg_date"]; ?>" type="text" name="reg_date" id="reg_date" class="form-control">
	</div>
	<input type="submit" value="ذخیره نمودن" class="btn btn-primary fit-width">
	
</form>

<br>
<br>

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
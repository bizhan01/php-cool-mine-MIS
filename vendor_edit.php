<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>
<?php require_once("top.php"); ?>




<?php

	$supplier = mysqli_query($az_con, "SELECT * FROM supplier WHERE supplier_id = "
	. $_GET["supplier_id"]);
	$row_supplier = mysqli_fetch_assoc($supplier);


	if(isset($_POST["name"])) { 
		$name = $_POST["name"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		$location = $_POST["location"];
		$type = $_POST["type"];
		
		$result = mysqli_query($az_con, "UPDATE supplier SET name='$name',
		phone='$phone', email='$email', supplier_type=$type,
		location='$location' WHERE supplier_id = " . $_GET["supplier_id"]);
		
		if($result) {
			header("location:vendor_list.php?edit=done");
		}
		else {
			header("location:vendor_edit.php?error=notadd");
		}
	}
?>

<h3>تصحیح معلومات فروشنده</h3>

<form method="post">

	<div class="input-group">
		<span class="input-group-addon">
			نام فروشنده: 
		</span>
	<input type="text" value="<?php echo $row_supplier["name"]; ?>" name="name" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			تلیفون:
		</span>
	<input type="text" value="<?php echo $row_supplier["phone"]; ?>" name="phone" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			ایمیل:
		</span>
	<input type="text" value="<?php echo $row_supplier["email"]; ?>" name="email" class="form-control">
	</div>

	
	<div class="input-group">
		<span class="input-group-addon">
			نوعیت فروشنده: 
		</span>
	<label><input type="radio" <?php if($row_supplier["supplier_type"]==0) echo "checked"; ?> name="type" value="0"> داخلی</label>
	<label><input type="radio" <?php if($row_supplier["supplier_type"]==1) echo "checked"; ?> name="type" value="1"> خارجی</label>
	
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
			آدرس: 
		</span>
	<textarea name="location" class="form-control"><?php echo $row_supplier["name"]; ?></textarea>
	</div>
	
	<input type="submit" value="ذخیره نمودن" class="btn btn-primary">
	
</form>

<?php require_once("footer.php"); ?>
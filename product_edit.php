<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>
<?php
	
	$product = mysqli_query($az_con, "SELECT * FROM product WHERE product_id="
	. $_GET["product_id"]);

	$row_product = mysqli_fetch_assoc($product);
	
	if(isset($_POST["product_name"])){
		$product_name = $_POST["product_name"];
		$barcod = $_POST["barcode"];
		$category_id = $_POST["category_id"];
		$unitprice = $_POST["unitprice"];
		$quantity = $_POST["quantity"];
		$store_date = $_POST["store_date"];
		$location = $_POST["location"];
		
		if($_FILES["image"]["name"] != "") { 
			$path = "images/product/" . time() . $_FILES["image"]["name"];
			move_uploaded_file($_FILES["image"]["tmp_name"], $path);
		}
		else {
			$path = "";
		}
		
		if($_FILES["image"]["name"] != ""){
			$qrpath = "images/qrcode/" . time() .$_FILES["image"]["name"];
			move_uploaded_file($_FILES["image"]["tmp_name"], $qrpath);
		}
		else{
			header("location:product_edit.php?error=notupdate");
		}
		
		if(mysqli_query($az_con, "UPDATE product SET product_name='$product_name',
		qr_code='$qrpath', barcode='$barcode', category_id='$category_id',
		unitprice='$unitprice', quantity='$quantity', image='$path', 
		store_date='$store_date', location='$location' WHERE product_id="
		.$_GET["product_id"])){
			header("location:product_list.php?update=done");
		}
		else{
		header("location:product_edit.php?error=notupdate");
		}
	}
	
	$category = mysqli_query($az_con, "SELECT * FROM category 
	ORDER BY category_id ASC");
	$row_category = mysqli_fetch_assoc($category);
?>

<?php require_once("top.php"); ?>

<h3>تصحیح مشخصات اجناس</h3>

<form method="post" enctype="multipart/form-data">
	
	<div class="input-group">
		<span class="input-group-addon">
		نام جنس:
		</span>
		<input value="<?php echo $row_product["product_name"]; ?>" type="text" name="product_name" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		کیو.آر کود:
		</span>
		<input value="<?php echo $row_product["qr_code"]; ?>"  type="file" name="qr_code" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		بارکود:
		</span>
		<input  value="<?php echo $row_product["barcode"]; ?>"  type="text" name="barcode" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		نوعیت جنس:
		</span>
		<select  name="category_id" class="form-control">
			
			<?php do{ ?>
			<option value="<?php echo $row_product["category_id"]; ?>">
			<?php echo $row_category["category_name"]; ?></option>
			<?php } while($row_category = mysqli_fetch_assoc($category)); ?>
		</select>
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		قیمت جنس:
		</span>
		<input value="<?php echo $row_product["unitprice"]; ?>"  type="text" name="unitprice" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		تعداد:
		</span>
		<input value="<?php echo $row_product["quantity"]; ?>"  type="text" name="quantity" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		تصویر:
		</span>
		<input value="<?php echo $row_product["image"]; ?>"  type="file" name="image" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		تاریخ ذخیره:
		</span>
		<input value="<?php echo $row_product["store_date"]; ?>"  type="text" name="store_date" id="store_date" class="form-control">
	</div>
	
	<div class="input-group">
		<span class="input-group-addon">
		مکان:</span>
		<select name="location" class="form-control">
			<option>گدام مورد نظر انتخاب کنید</option>
			<option <?php if($row_product["location"]=="گدام آ") echo "selected"; ?>>گدام آ</option>
			<option <?php if($row_product["location"]=="گدام ب") echo "selected"; ?>>گدام ب</option>
			<option <?php if($row_product["location"]=="گدام ج") echo "selected"; ?>>گدام ج</option>
		</select>
	</div>
	<input type="submit" value="ذخیره نمودن" class="btn btn-primary">

</form>

<script type="text/javascript">
    function catcalc(cal) {
        var date = cal.date;
        var time = date.getTime()
        var field = document.getElementById("store_date");
        if (field == cal.params.inputField) {
            field = document.getElementById("store_date");
            time -= Date.WEEK;
        } else {
            time += Date.WEEK;
        }
        var date = new Date(time);
        field.value = date.print("%Y-%m-%d");
    }
    
	Calendar.setup({
        inputField      :    "store_date",
        ifFormat        :    "%Y-%m-%d",
        showsTime       :    false,
        timeFormat      :    "24"
    });
</script>

<?php require_once("footer.php"); ?>
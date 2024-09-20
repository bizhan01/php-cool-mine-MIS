<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>


<?php

	$category = mysqli_query($az_con, "SELECT * FROM category
	ORDER BY category_name ASC");
	$row_category = mysqli_fetch_assoc($category);

	if(isset($_POST["product_name"])){
		$product_name = $_POST["product_name"];
		$barcode = $_POST["barcode"];
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
			header("location:product_add.php?error=qrnotadd");
		}


		mysql_query($az_con, "INSERT INTO product VALUES (NULL, '$product_name',
		'$qrpath', $barcode, $category_id, $unitprice, $quantity,
		'$path', '$store_date', '$location')");

		header("location:product_list.php?add=done");


	}


?>

<?php require_once("top.php"); ?>

<div class="col-lg-9">
	<h3>ثبت نمودن جنس جدید</h3>

	<?php if(isset($_GET["add"])) { ?>
		<div class="alert alert-danger alert-dismissable">
		<button class="close" area-hidden="true" data-dismiss="alert">
		</button>
		جنس جدید با موفقیت ثبت گردید
		</div>
	<?php } ?>

	<form method="post" enctype="multipart/form-data">

		<div class="input-group">
			<span class="input-group-addon">
			نام جنس:
			</span>
			<input placeholder="نام جنس" required  type="text" name="product_name" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			کیو.آر.کود:
			</span>
			<input type="file" placeholder="کیو.آر.کود"  name="qrcode" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			بارکد:
			</span>
			<input type="text" name="barcode" placeholder="بارکود"  class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			نوعیت جنس:
			</span>
			<select  name="category_id" class="form-control">

				<?php do{ ?>
				<option value="<?php echo $row_category["category_id"]; ?>">
				<?php echo $row_category["category_name"]; ?></option>
				<?php } while($row_category = mysqli_fetch_assoc($category)); ?>
			</select>
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			قیمت جنس:
			</span>
			<input type="text" placeholder="قیمت"  name="unitprice" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			تعداد:
			</span>
			<input type="text" name="quantity" placeholder="تعداد"  class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			تصویر:
			</span>
			<input type="file" name="image" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			تاریخ ذخیره:
			</span>
			<input type="text" placeholder="تاریخ ذخیره"  name="store_date" id="store_date" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			مکان گدام:
			</span>
			<select name="location" class="form-control">
				<option>گدام مورد نظر را انتخاب کنید</option>
				<option>گدام اول</option>
				<option>گدام دوم</option>
				<option>گدام سوم</option>
				<option>گدام چهارم</option>
			</select>
		</div>

		<input type="submit" value="اضافه نمودن" class="btn btn-primary">
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

</div>



<?php require_once("footer.php"); ?>

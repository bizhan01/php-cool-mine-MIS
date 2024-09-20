<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>
<?php require_once("top.php"); ?>
<?php


	$product = mysqli_query($az_con, "SELECT * FROM product ORDER BY product_name ASC");
	$row_product = mysqli_fetch_assoc($product);

	$sales = mysqli_query($az_con,"SELECT * FROM sales ORDER BY sales_id ASC");
	$row_sales = mysqli_fetch_assoc($sales);


	if(isset($_POST["reason"])){
		$sales_id = $_POST["sales_id"];
		$product_id = $_POST["product_id"];
		$return_date = $_POST["return_date"];
		$reason = $_POST["reason"];
		$quantity = $_POST["quantity"];
		$unitprice = $_POST["unitprice"];
		$totalprice = $_POST["totalprice"];

		$result = mysqli_query($az_con, "INSERT INTO sales_return VALUES ( NULL, $sales_id,
		$product_id, '$return_date', '$reason', $quantity, $unitprice,
		$totalprice )");

		if($result) {
			mysqli_query($az_con, "UPDATE product SET
			quantity = quantity + $quantity
			WHERE product_id=$product_id");
			header("location:sales_return.php?return=done");
		}
		else {
			header("location:sales_add.php?error=notadd");
		}
	}


?>

<div class="col-lg-9 ">
	<h3>واپسی اجناس خریداری شده</h3>

	<?php if(isset($_GET["return"])) { ?>
		<div class="alert alert-info alert-dismissable">
			<button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
			جنس مستردی به گدام اضافه شد
		</div>
	<?php } ?>

	<form method="post">
	<div class="input-group">
			<span class="input-group-addon">
			بل واپس شده:
			</span>
			<select name="sales_id" id="sales_id" class="form-control">
				<option value="0">بل واپس شده را انتخاب کنید</option>
				<?php do{ ?>
				<option value="<?php echo $row_sales["sales_id"]; ?>">
				<?php echo $row_sales["sales_id"]; ?> </option>
				<?php } while($row_sales = mysqli_fetch_assoc($sales)); ?>
			</select>
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			جنس:
			</span>
			<select name="product_id" id="product_id" class="form-control">
				<option value="0">جنس مورد نظر را انتخاب کنید</option>
				<?php do{ ?>
				<option value="<?php echo $row_product["product_id"]; ?>">
				<?php echo $row_product["product_name"]; ?> </option>
				<?php } while($row_product = mysqli_fetch_assoc($product)); ?>
			</select>
		</div>




		<div class="input-group">
		<span class="input-group-addon">تاریخ مستردی:</span>
		<input type="text" name="return_date" id="return_date" class="form-control">
		</div>

		<div class="input-group">
		<span class="input-group-addon">دلیل مستردی:</span>
		<textarea name="reason"  class="form-control"></textarea>
		</div>
			<div class="input-group">
		<span class="input-group-addon">تعداد:</span>
		<input type="text" name="quantity" id="quantity" class="form-control">
		</div>

		<div class="input-group">
		<span class="input-group-addon">قیمت:</span>
		<input type="text" name="unitprice" id="unitprice" class="form-control">
		</div>
			<div class="input-group">
		<span class="input-group-addon">مجموع:</span>
		<input type="text" name="totalprice" id="totalprice" class="form-control">
		</div>

		<input type="submit" value="ثبت نمودن" class="btn btn-primary">

	</form>

	<script type="text/javascript">
	    function catcalc(cal) {
	        var date = cal.date;
	        var time = date.getTime()
	        var field = document.getElementById("return_date");
	        if (field == cal.params.inputField) {
	            field = document.getElementById("return_date");
	            time -= Date.WEEK;
	        } else {
	            time += Date.WEEK;
	        }
	        var date = new Date(time);
	        field.value = date.print("%Y-%m-%d");
	    }

		Calendar.setup({
	        inputField      :    "return_date",
	        ifFormat        :    "%Y-%m-%d",
	        showsTime       :    false,
	        timeFormat      :    "24"
	    });
	</script>

</div>

<?php require_once("footer.php"); ?>

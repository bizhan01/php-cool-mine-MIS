<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>

<?php

	if(!isset($_SESSION)){
		session_start();
	}

	$product = mysqli_query($az_con, "SELECT * FROM product ORDER BY product_name ASC");
	$row_product = mysqli_fetch_assoc($product);

	$company = mysqli_query($az_con, "SELECT *  FROM cus_company ORDER BY cus_company_id ASC");
	$row_company = mysqli_fetch_assoc($company);


	$person = mysqli_query($az_con, "SELECT * FROM  cus_person ORDER BY cus_person_id ASC");
	$row_person = mysqli_fetch_assoc($person);



	/*if(isset($_POST["person"])){
	$employee_id = 2;
	$cus_person_id = $_POST["person"];
	$cus_company_id = $_POST["company"];
	mysql_query("INSERT INTO sales VALUES(NULL, $employee_id,
	$cus_person_id, $cus_company_id, CURDATE())", $con);

	$last_id = mysql_insert_id($con);

	header("location:sales_add.php?sales_id=$last_id");
	}*/


	if(isset($_POST["quantity"])){
		$employee_id = $_SESSION["login"];
		$cus_person_id = $_POST["cus_person_id"];
		$cus_company_id = $_POST["cus_company_id"];

		mysqli_query($az_con, "INSERT INTO sales VALUES(NULL, $employee_id,
		             $cus_person_id, $cus_company_id, CURDATE())");
		$sales_id = mysqli_insert_id($az_con);

		$product_id = $_POST["product_id"];
		$quantity = $_POST["quantity"];
		$unitprice = $_POST["unitprice"];
		$totalprice = $_POST["totalprice"];
		$discount = $_POST["discount"];
		$totalamount = $_POST["totalamount"];
		/*$sales_id = $_GET["sales_id"];*/

		$result = mysqli_query($az_con, "INSERT INTO sales_detail VALUES(NULL,
		$sales_id, $product_id, $quantity, $unitprice,
		$totalprice, $discount, $totalamount)");

		if($result){
			mysqli_query($az_con, "UPDATE product SET quantity = quantity - $quantity
			WHERE product_id = $product_id");
			header("location:sales_add.php?sales_id=$sales_id&add=done");
		}
		else{
			header("location:sales_add.php?sales_id=$sales_id&add=notdone");
		}

	}

?>
<?php require_once("top.php"); ?>


<div class="col-lg-9">
	<h3>اضافه نمودن جنس به بل</h3>

	<?php if(isset($_GET["add"])) { ?>
		<div class="alert alert-success alert-dismissable">
			<button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
			عملیه فروش با موفقیت ثبت گردید
		</div>
	<?php } ?>

	<form method="post" >
		<div class="input-group">
			<span class="input-group-addon">
			جنس:
			</span>
			<select placeholder="جنس"  name="product_id" id="product_id" class="form-control">
				<option value="0">جنس مورد نظر را انتخاب کنید</option>
				<?php do{ ?>
				<option value="<?php echo $row_product["product_id"]; ?>">
				<?php echo $row_product["product_name"]; ?> </option>
				<?php } while($row_product = mysqli_fetch_assoc($product)); ?>
			</select>
		</div>



			<div class="input-group">
			<span class="input-group-addon">
			فردی:
			</span>
			<select name="cus_person_id"   class="form-control">
				<option value="null">شخص مورد نظر را انتخاب نمایید</option>
				<?php do{ ?>
				<option value="<?php echo $row_person["cus_person_id"]; ?>">
				<?php echo $row_person["cus_firstname"].' '.$row_person["cus_lastname"]; ?> </option>
				<?php } while($row_person = mysqli_fetch_assoc($person)); ?>
			</select>
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			غیر فردی:
			</span>
			<select name="cus_company_id"  class="form-control">
				<option value="null">جنس مورد نظر را انتخاب کنید</option>
				<?php do{ ?>
				<option value="<?php echo $row_company["cus_company_id"]; ?>">
				<?php echo $row_company["name"]; ?> </option>
				<?php } while($row_company = mysqli_fetch_assoc($company)); ?>
			</select>
		</div>


		<div class="input-group">
			<span class="input-group-addon">
			تعداد:
			</span>
			<input placeholder="تعداد"  type="text" id="quantity" name="quantity" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			قیمت:
			</span>
			<input type="text" placeholder="قیمت"  id="unitprice" name="unitprice" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			قیمت مجموعی:
			</span>
			<input type="text" placeholder="قیمت مجموعی"  readonly name="totalprice" id="totalprice" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			تخفیف:
			</span>
			<input type="text" placeholder="تخفیف"  value="0" id="discount" name="discount" class="form-control">
		</div>

		<div class="input-group">
			<span class="input-group-addon">
			قیمت نهایی:
			</span>
			<input type="text" readonly id="totalamount" placeholder="قیمت نهایی"  name="totalamount" class="form-control">
		</div>

		<input type="submit" value="اضافه نمودن" class="btn btn-primary">

		<a href="sales_list.php?add=done" class="btn btn-success pull-left">
		پایان فروش
		</a>

	</form>
</div>


<?php require_once("footer.php"); ?>

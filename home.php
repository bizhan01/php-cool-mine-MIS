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


<div class="col-lg-9" style="background-image: url(images/0_8UNAgR_1_4SMV4BY.png); height: 500px; margin-top: -20px" >
	<center style="color: white">
		<br></br>
		<br></br>
		<img src="images/applogo.png" alt=""   height="100px" />
		<h3>خوش آمدید</h3>
		<h3>سیستم مدیریت اطلاعات معدن زغال سنگ </h3>
	</center>
</div>
<?php require_once("footer.php"); ?>

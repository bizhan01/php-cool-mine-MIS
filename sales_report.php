<?php require_once("connection.php"); ?>
<?php require_once("top.php"); ?>


<?php

	if(isset($_GET["report_type"])){
		$type = $_GET["report_type"];

		if($type == "daily"){
			$condition= "sale_date = CURDATE()";
		}
		else if($type == "weekly"){
			$condition = "DATEDIFF(CURDATE(), sale_date) <= 7";
		}

		else if($type == "monthly"){
			$condition = "DATEDIFF(CURDATE(), sale_date) <= 30";
		}
		else if($type == "annual" ){
			$condition = "DATEDIFF(CURDATE(), sale_date) <= 365";
		}

		///queryies
		$totalbill = mysqli_query($az_con, "SELECT COUNT(sales_id) AS total FROM sales
		WHERE $condition");
		$row_totalbill = mysqli_fetch_assoc($totalbill);

		$totalamount = mysqli_query($az_con, "SELECT SUM(totalamount) AS total FROM sales_detail
		INNER JOIN sales ON sales.sales_id = sales_detail.sales_id
		WHERE $condition");
		$row_totalamount = mysqli_fetch_assoc($totalamount);




	}

?>

<div class="col-lg-9">
	<h3>گزارش فروشات</h3>
	<form method="get">
		<div class="input-group">
			<span class="input-group-addon">
			نوعیت گزارش:
			</span>
			<select name="report_type" class="form-control">
				<option>نوعیت گزارش را انتخاب کنید</option>

				<option value="daily">روزانه</option>
				<option value="weekly">هفته وار</option>
				<option value="monthly">ماهانه</option>
				<option value="annual">سالانه</option>
			</select>
		</div>
		<input type="submit" value="نمایش" class="btn btn-primary fit-width">
	</form>

	<?php if(isset($_GET["report_type"])) { ?>

	<h3>تعداد بل های فروخته شده: <small> <?php echo $row_totalbill["total"]; ?> </small> </h3>
	<h3> مجموع فروشات:<small> <?php echo $row_totalamount["total"]; ?> </small> </h3>
	<?php } ?>

</div>


<?php require_once("footer.php"); ?>

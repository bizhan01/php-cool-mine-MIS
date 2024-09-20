<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>
<?php require_once("top.php"); ?>

<?php
	if(isset($_POST["new"])){
		$pass = $_POST["new"];
		$result = mysqli_query($az_con, "UPDATE users SET password= PASSWORD('$pass')
		WHERE employee_id=" . $_GET["employee_id"]);

		if($result){
			header("location:employee_users.php?reset=done");
		}
		else{
			header("location:employee_user_reset.php?error=noupdate
			&employee_id=" .$_GET["employee_id"]);
		}

	}

  $sales_detail = mysqli_query($az_con, "SELECT *, sales_detail.quantity AS sold_quantity
  FROM sales_detail INNER JOIN product ON product.product_id = sales_detail.product_id
 " );

  $row_sales_detail = mysqli_fetch_assoc($sales_detail);
?>

<?php
	$expense = mysqli_query($az_con, "SELECT expense_id, title,
	CONCAT(firstname, ' ', lastname) AS emp_name,
	amount, currency, pay_date, receiver
	FROM expense INNER JOIN employee ON employee.employee_id=
	expense.employee_id ORDER BY expense_id DESC");

	$row_expense = mysqli_fetch_assoc($expense);
?>

<?php
	$buy_detail = mysqli_query($az_con, "SELECT * FROM buy_detail
	INNER JOIN category ON category.category_id = buy_detail.category_id");

	$row_buy_detail = mysqli_fetch_assoc($buy_detail);
?>





<div class="col-lg-9">
	<?php require_once("print.php"); ?>


	<div id="printArea">
	<h3>آمار فروشات</h3>

	<table class="table table-hover table-striped table-bordered">
		<tr >
			<th>نام جنس</th>
			<th>تعداد</th>
			<th>قیمت</th>
			<th>مجموع</th>
			<th>تخفیف</th>
			<th>قیمت نهایی </th>

		</tr>
		<?php $revenue=0; do { ?>
		<tr>
			<td> <?php echo $row_sales_detail["product_name"]; ?> </td>
			<td> <?php echo $row_sales_detail["sold_quantity"]; ?> </td>
			<td> <?php echo $row_sales_detail["unitprice"]; ?> </td>
			<td> <?php echo $row_sales_detail["totalprice"]; ?> </td>
			<td> <?php echo $row_sales_detail["discount"]; ?> </td>
			<td> <?php echo $row_sales_detail["totalamount"];
				$revenue += $row_sales_detail["totalamount"]; ?> </td>
		</tr>
		<?php } while($row_sales_detail = mysqli_fetch_assoc($sales_detail)); ?>
		<tr style="background-color: yellow; font-size: 20px">
			<td colspan="6" align="center">
				مجموع بل: <?php echo $revenue; ?>
			</td>
		</tr>
	</table>

  <h3>آمار مصارف</h3>
  <table class="table table-striped table-bordered">
    <tr>
      <th>آی دی</th>
      <th>تاریخ</th>
      <th>عنوان مصرف</th>
      <th>پول دهنده</th>
      <th>گیرنده</th>
      <th>مقدار</th>
      <th>واحد پولی</th>
    </tr>
   <?php $sum=0; ?>
    <?php do{ ?>
    <tr>
      <td><?php echo $row_expense["expense_id"]; ?></td>
      <td><?php echo $row_expense["pay_date"]; ?></td>
      <td><?php echo $row_expense["title"]; ?></td>
      <td><?php echo $row_expense["emp_name"]; ?></td>
      <td><?php echo $row_expense["receiver"]; ?></td>
      <td><?php echo $row_expense["amount"]; ?></td>
      <td><?php echo $row_expense["currency"]; ?></td>
    </tr>
    <?php $sum += $row_expense["amount"];; ?>
    <?php } while($row_expense = mysqli_fetch_assoc($expense));?>

    <tfoot>
      <tr style="background-color: yellow; font-size: 20px">
        <th colspan="5">جمله مصارف</th>
        <th colspan="4"><?php echo $sum; ?></th>
      </tr>
    </tfoot>

  </table>


	<h3>آمار خریداری ها</h3>
  <table class="table table-striped table-bordered">
		<tr>
			<th>نام جنس</th>
			<th>نوعیت</th>
			<th>جزییات</th>
			<th>تعداد</th>
			<th>قیمت</th>
			<th>مجموع</th>
			<th>تاریخ تولید </th>
			<th>تاریخ انقضا</th>
		</tr>
		<?php $total=0; ?>
		<tr>
			<td> <?php echo $row_buy_detail["product_name"]; ?> </td>
			<td> <?php echo $row_buy_detail["category_name"]; ?> </td>
			<td> <?php echo $row_buy_detail["description"]; ?> </td>
			<td> <?php echo $row_buy_detail["quantity"]; ?> </td>
			<td> <?php echo $row_buy_detail["unitprice"]; ?> </td>
			<td> <?php echo $row_buy_detail["totalprice"];
				$total += $row_buy_detail["totalprice"];
			?> </td>
			<td> <?php echo $row_buy_detail["manufacture_date"]; ?> </td>
			<td> <?php echo $row_buy_detail["expire_date"]; ?> </td>
		</tr>
	  <tfoot>
			<tr style="background-color: yellow; font-size: 20px">
				<td align="center" colspan="8">
				مجموع خریداری: <?php echo $total;?>
				</td>
			</tr>
	  </tfoot>
	</table>

	<div class="col-lg-12">
		<div class="col-lg-3" style="background-color: blue; margin: 5px 5px 5px 30px; height: 100px">
			<h2 style="color: white"><?php echo $revenue - $sum - $total ;?></br>
				<span style="font-size: 15px">بیلانس</span>
			</h2>
		</div>
		<div class="col-lg-4" style="background-color: red; margin: 5px; height: 100px">
			<h2 style="color: white"><?php echo  $sum + $total;?></br>
				<span style="font-size: 15px">جمله مصارف</span>
			</h2>
		</div>
		<div class="col-lg-4" style="background-color: green; margin: 5px; height: 100px">
			<h2 style="color: white"><?php echo $revenue; ?></br>
				<span style="font-size: 15px">جمله عواید</span>
			</h2>
		</div>
	</div>
	<br></br>

	</div>
</div>
<?php require_once("footer.php"); ?>

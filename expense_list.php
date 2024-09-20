<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>

<?php
	$expense = mysqli_query($az_con, "SELECT expense_id, title,
	CONCAT(firstname, ' ', lastname) AS emp_name,
	amount, currency, pay_date, receiver
	FROM expense INNER JOIN employee ON employee.employee_id=
	expense.employee_id ORDER BY expense_id DESC");

	$row_expense = mysqli_fetch_assoc($expense);
?>

<?php require_once("top.php"); ?>
<div class="col-lg-9">
	<h3>لیست مصارفات</h3>
	<div class="table table-responsiv">
		<table class="table table-striped table-bordered">
			<tr>
				<th>آی دی</th>
				<th>تاریخ</th>
				<th>عنوان مصرف</th>
				<th>پول دهنده</th>
				<th>گیرنده</th>
				<th>مقدار</th>
				<th>واحد پولی</th>
				<th>تصحیح</th>
				<th>حذف</th>

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
				<td>
					<a href="expense_edit.php?expense_id=<?php echo $row_expense["expense_id"]; ?>">
						<span class="glyphicon glyphicon-edit"></span>
					</a>
				</td>

				<td>
					<a class="delete" href="expense_delete.php?expense_id=<?php echo $row_expense["expense_id"]; ?>">
						<span class="glyphicon glyphicon-trash"></span>
					</a>
				</td>

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
	</div>

</div>


<?php require_once("footer.php"); ?>

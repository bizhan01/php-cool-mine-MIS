<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>

<?php
	$q = "";
	$column = "";
	$condition = "";
	if(isset($_GET["q"])){
		$column = $_GET["searchby"];

		$q = $_GET["q"];

	$condition = " WHERE $column LIKE '%$q%' ";
	}
	$cus_company = mysqli_query($az_con, "SELECT cus_company_id, name,
	phone FROM cus_company
	$condition
	ORDER BY cus_company_id DESC");

	$row_cus_company = mysqli_fetch_assoc($cus_company);


?>

<?php require_once("top.php"); ?>

<div class="col-lg-9">
	<div class="search">

		<form>
			<input type="text" name="q"/>
			<select name="searchby">
				<option value="cus_company_id">شماره</option>
				<option value="name">نام</option>



			</select>
			<input type="submit" value="جستجو"/>
		</form>

	</div>
	<h3>لیست شرکت ها</h3>
	<?php if(mysqli_num_rows($cus_company) > 0) { ?>

		<?php if(isset($_GET["q"])) { ?>
		<div>
		<strong>تعداد نتائج بدست آمده: &nbsp;</strong><?php echo mysqli_num_rows($cus_company); ?>
		</div>
	<?php } ?>
	<div class="table table-responsive">
		<table class="table table-striped">
			<tr>
				<th>آی دی</th>
				<th>نام</th>
				<th>تلیفون</th>
				<th>جزییات</th>
			</tr>

			<?php do{ ?>
			<tr>
				<td> <?php echo $row_cus_company ["cus_company_id"]; ?> </td>
				<td> <?php echo $row_cus_company ["name"]; ?> </td>
				<td> <?php echo $row_cus_company ["phone"]; ?> </td>
				<td>
					<a href="cus_company_detail.php?cus_company_id=
					<?php echo $row_cus_company["cus_company_id"]; ?>">
						<span class="glyphicon glyphicon-search"></span>
					</a>
				</td>
			</tr>

			<?php } while($row_cus_company = mysqli_fetch_assoc($cus_company)); ?>


		</table>
	</div>

	<?php } else { ?>
			<h3 style="color:orange" align="center">
			هیچ نتیجه دریافت نشد!
			</h3>
	<?php } ?>

</div>

<?php require_once("footer.php"); ?>

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

	$cus_person = mysqli_query($az_con, "SELECT cus_person_id, cus_firstname,
	cus_lastname, phone FROM cus_person
	$condition
	ORDER BY cus_person_id DESC");

	$row_cus_person = mysqli_fetch_assoc($cus_person);


?>

<?php require_once("top.php"); ?>
<div class="col-lg-9">
	<div class="search">

		<form>
			<input type="text" name="q"/>
			<select name="searchby">
				<option value="cus_person_id">شماره</option>
				<option value="cus_firstname">نام</option>
				<option value="cus_lastname">فامیلی</option>


			</select>
			<input type="submit" value="جستجو"/>
		</form>

	</div>
	<h3>لیست مشتریان فردی</h3>
	<?php if(mysqli_num_rows($cus_person) > 0) { ?>

		<?php if(isset($_GET["q"])) { ?>
		<div>
		<strong>تعداد نتائج بدست آمده: &nbsp;</strong><?php echo mysqli_num_rows($cus_person); ?>
		</div>
	<?php } ?>



	<div class="table table-responsive">
		<table class="table table-hover">
			<tr>
				<th>آی دی</th>
				<th>نام</th>
				<th>تخلص</th>
				<th>تلیفون</th>
				<th>جزییات</th>
			</tr>

			<?php do{ ?>
			<tr>
				<td> <?php echo $row_cus_person ["cus_person_id"]; ?> </td>
				<td> <?php echo $row_cus_person ["cus_firstname"]; ?> </td>
				<td> <?php echo $row_cus_person ["cus_lastname"]; ?> </td>
				<td> <?php echo $row_cus_person ["phone"]; ?> </td>
				<td>
					<a href="cus_person_detail.php?cus_person_id=
					<?php echo $row_cus_person["cus_person_id"]; ?>">
						<span class="glyphicon glyphicon-search"></span>
					</a>
				</td>
			</tr>

			<?php } while($row_cus_person = mysqli_fetch_assoc($cus_person)); ?>
		</table>
	</div>

	<?php } else { ?>
			<h3 style="color:orange" align="center">
			هیچ نتیجه دریافت نشد!
			</h3>
	<?php } ?>
</div>

<?php require_once("footer.php"); ?>

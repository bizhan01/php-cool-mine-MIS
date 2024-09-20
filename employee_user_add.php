<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>
<?php require_once("top.php"); ?>


<?php


	$employee = mysqli_query($az_con, "SELECT * FROM employee WHERE employee_id
	NOT IN (SELECT employee_id FROM users)");
	$row_employee = mysqli_fetch_assoc($employee);
	if(isset($_POST["username"])){
		$id= $_POST["employee_id"];
		$username= $_POST["username"];
		$password= $_POST["password"];
		$level= $_POST["level"];
		$result = mysqli_query($az_con, "INSERT INTO users VALUES($id, '$username',
		PASSWORD('$password'), '$level')");
		//mysql_query("INSERT INTO user_level (employee_id) VALUES ($id)", $con);
		if($result){
			header("location:employee_users.php?create=done");
		}
		else{
			header("location:employee_user_add.php?error=notcreated");
		}
	}

	?>

	<div class="col-lg-9">
		<h3>ساختن حساب جدید</h3>
		<?php if(isset($_GET["error"])) { ?>
			<div class="alert alert-danger alert-dismissable">
			<button class="close" area-hidden="true" data-dismiss="alert">
			</button>
			حساب جدید ساخته نشد! لططفا دوباره کوشش نمایید
			</div>

		<?php } ?>



		<form method="post" id="password">
			<div class="input-group">
				<span class="input-group-addon">
				کارمند:
				</span>
				<select name="employee_id" class="form-control">
					<option>لطفا کارمند مورد نظر را انتخاب کنید</option>
					<?php do { ?>
					<option value="<?php echo $row_employee["employee_id"]; ?>">
					<?php echo $row_employee["firstname"]. " " .
						$row_employee["lastname"]; ?>
					</option>
					<?php } while($row_employee = mysqli_fetch_assoc($employee)); ?>


				</select>
			</div>

			<div class="input-group">
				<span class="input-group-addon">
				موقف:</span>
				<select required name="level" class="form-control">
					<option>لطفا موقف را انتخاب کنید</option>
					<option>Admin</option>
					<option>finance</option>
					<option>HR</option>
					<option>inventory</option>
				</select>
			</div>


			<div class="input-group">
				<span class="input-group-addon">
				نام حساب:
				</span>
				<input type="text" placeholder="نام حساب/ حساب کاربر"  name="username" class="form-control">
			</div>

			<div class="input-group">
				<span class="input-group-addon">
				رمز جدید:
				</span>
				<input type="password" placeholder="رمز"  id="new" name="password" class="form-control">
			</div>

			<div class="input-group">
				<span class="input-group-addon">
				تکرار رمز:
				</span>
				<input type="password" placeholder="تکرار رمز"  id="confirm" class="form-control">
			</div>

			<input type="submit" class="btn btn-primary" value="ساختن">




		</form>

	</div>




<?php require_once("footer.php"); ?>

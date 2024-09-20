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
?>

<div class="col-lg-9">
	<h3>تغیر رمز  کارمند</h3>
		<form method="post" id="password">
			<div class="input-group">
			<span class="input-group-addon">رمز جدید</span>
			<input type="password" id="new" name="new" class="form-control">
			</div>

			<div class="input-group">
			<span class="input-group-addon">تکرار رمز</span>
			<input type="password" id="confirm" class="form-control">
			</div>

			<input type="submit" class="btn btn-primary" value="تغیر رمز">
		</form>
</div>

<?php require_once("footer.php"); ?>

<?php
	session_start();
	require_once("connection.php");
	if(isset($_POST["username"])) {
		$user = $_POST["username"];
		$pass = $_POST["password"];
		$login = mysqli_query($az_con, "SELECT * FROM users
		WHERE username='$user' AND password=PASSWORD('$pass')");
	    if(mysqli_num_rows($login) == 1) {
			$row_login = mysqli_fetch_assoc($login);
			$_SESSION["login"] = $row_login["employee_id"];
            $_SESSION["user_level"]= $row_login["level"];
			header("location:home.php");
		}
		else {
			header("location:index.php?login=failed");
		}
	}
?>
<?php require_once("top.php"); ?>

<div class="img-cover"  style="background-image: url(images/coal-getty.jpg); height: 480px; margin-top: -20px" >
	<div class="col-lg-3"></div>
<div class="col-lg-5">
	<br></br>
		<div id="login" >
			<h3 class="text-center" style="margin: 0px">ورود به سستیم </h3><br>
		<?php if(isset($_GET["logout"])) { ?>
			<div class="alert alert-success alert-dismissable">
				<button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
				شما با موفقیت از سیستم خارج شده اید!
			</div>
		<?php } ?>


		<?php if(isset($_GET["login"])) { ?>
			<div class="alert alert-danger alert-dismissable">
				<button class="close" data-dismiss="alert" area-hidden="true">
					&times;
				</button>
				نام یوزر یا رمز عبور اشتباه است
			</div>
		<?php } ?>

		<?php if(isset($_GET["notlogin"])) { ?>
			<div class="alert alert-danger alert-dismissable">
				<button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
				شما به سیستم داخل نشده اید!
			</div>
		<?php } ?>


			<form method="post">
				<div class="input-group">
					<span class="input-group-addon">
					نام یوزر:  &nbsp;    </span>
					<input dir="ltr"  type="text" class="form-control" name="username"><br>
				</div>

				<div class="input-group">
					<span class="input-group-addon">
					رمز عبور: </span>
					<input dir="ltr" type="password" class="form-control" name="password"><br>
				</div>

				<button class="btn btn-primary fit-width">
					<span class="glyphicon glyphicon-log-in"></span>
					ورود
				</button>
			</form>
		</div>
	</div>
</div>
<?php require_once("footer.php"); ?>

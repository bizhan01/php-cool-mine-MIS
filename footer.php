

	<?php if(isset($_SESSION["login"])) { ?>
	<div id="rsb" class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<?php if($_SESSION["user_level"]=="admin"
		|| $_SESSION["user_level"]=="finance" ){ ?>
		<a href="sales_add.php" class="btn btn-success">
			<span class="glyphicon glyphicon-shopping-cart"> </span>
		فروش جدید
		</a>
		<?php } ?>
		<?php if($_SESSION["user_level"]=="admin"
		|| $_SESSION["user_level"]=="finance" ){ ?>
		<a href="product_list.php" class="btn btn-success">
			<span class="glyphicon glyphicon-tag"> </span>
		لیست اجناس
		</a>

		<?php } ?>

		<?php if($_SESSION["user_level"]=="admin"
		|| $_SESSION["user_level"]=="finance" ){ ?>
		<a href="sales_report.php" class="btn btn-success">
			<span class="glyphicon glyphicon-book"> </span>
		گزارش فروشات
		</a>
		<?php } ?>

		<?php if($_SESSION["user_level"]=="admin"
		|| $_SESSION["user_level"]=="finance"
		|| $_SESSION["user_level"]=="inventory" ){ ?>
		<a href="sales_return.php" class="btn btn-success">
			<span class="glyphicon glyphicon-book"> </span>
		واپسی اجناس
		</a>
		<?php } ?>


		<?php if($_SESSION["user_level"]=="admin"
		|| $_SESSION["user_level"]=="HR" ){ ?>
		<a href="employee_list.php" class="btn btn-success">
			<span class="glyphicon glyphicon-user"> </span>
		لیست کار مندان
		</a>
		<?php } ?>

		<a href="employee_users.php" class="btn btn-success">
			<span class="glyphicon glyphicon-lock"> </span>
		حساب کارمندان
		</a>

		<a href="employee_user_reset.php" class="btn btn-success">
			<span class="glyphicon glyphicon-lock"> </span>
		تغیر رمز
		</a>

		<a href="balance.php" class="btn btn-success">
			<span class="glyphicon glyphicon-leaf"> </span>
		بیلانس مالی
		</a>


	</div>
</div>

	<div class="clearfix"></div>
	<div id="footer" style="direction:rtl;">
		Copyright &copy; <?php echo date("Y");  ?> all right reserved
	</div>
	<?php } ?>
	</div>

</body>
</html>

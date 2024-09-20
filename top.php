
<?php
	if(!isset($_SESSION)){
	session_start();
	}
?>

<!DOCTYPE html>
<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<script type="text/javascript" src="js/jquery.min.js"> </script>
	<script type="text/javascript" src="js/bootstrap.min.js"> </script>

	<script type="text/javascript" src="cal/calendar.js"></script>
	<script type="text/javascript" src="cal/calendar-en.js"></script>
	<script type="text/javascript" src="cal/calendar-setup.js"></script>
	<link rel="stylesheet" type="text/css" href="cal/calendar-blue2.css">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">

	<script type="text/javascript" src="js/script.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title> Cool Mine CMS</title>

</head>
<body>
	<div class="">
	<div id="banner">
		<div id="logo">
			<img src="images/applogo.png" width="100" height="80">
		</div>
		<div id="slogan">سستیم مدیریتی زغال سنگ</div>
	</div>




	<nav class="navbar navbar-default" role="navigation">

<?php if(isset($_SESSION["login"])) { ?>
					<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
							</button>
					</div>
					<div class="collapse navbar-collapse" id="collapse">
						<ul class="nav navbar-nav" id="nav-top">
				<li><a href="home.php" style="color: white">صفحه اصلی</a></li>
			<?php if($_SESSION["user_level"]== "HR" || $_SESSION["user_level"]== "admin" ) { ?>
								<li class="dropdown"><a href="#" data-toggle="dropdown" style="color: white">کارمندان <span class="caret"></span></a>
										<ul class="dropdown-menu">
												<li><a href="employee_add.php">ثبت کارمند جدید</a></li>
													<li><a href="employee_list.php">لیست همه کارمندان</a></li>


						<li><a href="employee_users.php">حساب کارمندان</a></li>
											</ul>
									</li>
				<?php } ?>


				 <?php if($_SESSION["user_level"]== "admin"
				 || $_SESSION["user_level"]== "finance"  ){?>
								<li class="dropdown"><a href="#" data-toggle="dropdown" style="color: white">خریداری <span class="caret"></span></a>
										<ul class="dropdown-menu">
												<li><a href="buy_add.php">ثبت خریداری جدید</a></li>
													<li><a href="buy_list.php">لیست خریداری ها</a></li>
													<li><a href="vendor_list.php">لیست فروشندگان</a></li>
											</ul>
									</li>
				<?php } ?>

				<?php if($_SESSION["user_level"]== "admin"
				|| $_SESSION["user_level"]== "finance"
				|| $_SESSION["user_level"]== "inventory") {?>
								<li class="dropdown"><a href="#" data-toggle="dropdown" style="color: white">گدام <span class="caret"></span></a>
										<ul class="dropdown-menu">
												<li><a href="product_add.php">ثبت جنس جدید</a></li>
													<li><a href="product_list.php">لیست اجناس</a></li>
													<li><a href="category_list.php">انواع اجناس</a></li>
											</ul>
									</li>
				<?php } ?>
				<?php if($_SESSION["user_level"]=="admin"
				|| $_SESSION["user_level"]=="finance") {?>
								<li class="dropdown"><a href="#" data-toggle="dropdown" style="color: white">فروشات <span class="caret"></span></a>
										<ul class="dropdown-menu">
												<li><a href="sales_add.php">فروش جدید</a></li>
													<li><a href="sales_list.php">گزارش فروشات</a></li>
						<li><a href="sales_return.php">واپسی اجناس</a></li>

					</ul>
									</li>
				<?php } ?>

				<?php if($_SESSION["user_level"]=="admin"
				|| $_SESSION["user_level"]=="finance") {?>
								<li class="dropdown"><a href="#" data-toggle="dropdown" style="color: white">مشتریان <span class="caret"></span></a>
										<ul class="dropdown-menu">
												<li><a href="cus_person_add.php"> ثبت مشتریان فردی</a></li>

												<li><a href="cus_company_add.php"> ثبت شرکت</a></li>

													<li><a href="person_orders_add.php">ثبت فرمایشات فردی</a></li>

													<li><a href="company_orders_add.php">ثبت فرمایشات شرکت</a></li>

											</ul>
									</li>
				<?php } ?>

				<?php if($_SESSION["user_level"]=="admin"
				|| $_SESSION["user_level"]=="finance") {?>
									<li class="dropdown"><a href="#" data-toggle="dropdown" style="color: white">مالی <span class="caret"></span></a>
										<ul class="dropdown-menu">
												<li><a href="sales_report.php">گزارش فروشات</a></li>
													<li><a href="expense_add.php">ثبت مصرف جدید</a></li>
													<li><a href="expense_list.php">گزارش مصارفات</a></li>
											</ul>
									</li>
				<?php } ?>
									<li><a href="logout.php" style="color: red">خروج</a></li>
							</ul>
		</span>
					</div>
		<?php } ?>

		</nav>

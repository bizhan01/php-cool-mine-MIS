<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>
<?php require_once("top.php"); ?>

<?php
	if(isset($_POST["name"])){
		$name = $_POST["name"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		$location = $_POST["location"];
		$type = $_POST["type"];
		
		$result = mysqli_query($az_con, "INSERT INTO supplier VALUES (null, '$name', '$phone', 
		'$email', $type, '$location')");
	
		if($result){
			header("location:vendor_list.php?add=done");
		
		
		}
		else{
			header("location:vendor_add.php?error=notadd");
		
		}
	}


?>


<h3>ثبت فروشنده جدید</h3>

<?php if(isset($_GET["add"])) { ?>
	<div class="alert alert-success alert-dismissable">
	<button class="close" area-hidden="true" data-dismiss="alert">
	</button>
	فروشنده جدید با موفقیت ثبت شد
	</div>
<?php } ?>

<?php if(isset($_GET["error"])) { ?>
	<div class="alert alert-danger alert-dismissable">
	<button class="close" area-hidden="true" data-dismiss="alert">
	</button>
	فروشنده جدید ثبت نشد! لطفا دوباره کوشش نمایید
	</div>

<?php } ?>


<form  method="post">
	
	<div class="input-group">
	<span class="input-group-addon">
	نام فروشنده:
	</span>
	<input placeholder="نام فرفروشنده" required  type="text" name="name" class="form-control">
	</div>
	
	<div class="input-group">
	<span class="input-group-addon">
	تلیفون:
	</span>
	<input type="text" placeholder="تلیفون" required  name="phone" class="form-control">
	</div>
	
	<div class="input-group">
	<span class="input-group-addon">
	ایمیل:
	</span>
	<input type="email" name="email" placeholder="ایمیل"  class="form-control">
	</div>
	
	<div class="input-group">
	<span class="input-group-addon">
	نوع فروشنده:
	</span>
	<label><input type="radio" checked name="type" value="0">داخلی</label>
	<label><input type="radio" name="type" value="1">خارجی</label>
	</div>
	

	<div class="input-group">
	<span class="input-group-addon">
	آدرس:
	</span>
	<textarea required  name="location" class="form-control"></textarea>
	</div>
	
	<input type="submit" value="ثبت فروشنده" class="btn btn-primary">
	
</form>



<?php require_once("footer.php"); ?>
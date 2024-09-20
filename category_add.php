<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>

<?php

	if(isset($_POST["category_name"])){
		$cat_name = $_POST["category_name"];
		$result = mysqli_query($az_con, "INSERT INTO category values(NULL, '$cat_name')");
		
		if($result){
			header("location:category_list.php?add=done");
		}
		else{
			header("location:category_add.php?error=exist");	
		}
	}
?>
<?php require_once("top.php"); ?>

<h3>ثبت نوعیت جدید</h3>
<form method="post">
	<div class="input-group">
		<span class="input-group-addon">
		نوعیت:
		</span>
		<input type="text" name="category_name" class="form-control">
	</div>
	
	<input type="submit" value="ثبت نمودن" class="btn btn-primary">
	
<form>



<?php require_once("footer.php"); ?>
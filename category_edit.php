<?php require_once("connection.php"); ?>

<?php
	$category = mysqli_query($az_con, "SELECT * FROM category 
	WHERE category_id=" . $_GET["category_id"]);
	$row_category = mysqli_fetch_assoc($category);
	
	if(isset($_POST["category_name"])){
		$category_name = $_POST["category_name"];
		
		if(mysqli_query($az_con,"UPDATE category SET category_name='$category_name' 
		WHERE category_id=" . $_GET["category_id"])){
			header("location:category_list.php?eidt=done");
		}
		else{
			header("location:category_edit.php?error=notedited");
		}
	}

?>

<?php require_once("top.php"); ?>

<h3>تصحیح مشخصات انواع اجناس</h3>

<form method="post">
	<div class="input-group">
		<span class="input-group-addon">نوعیت:</span>
		<input value="<?php echo $row_category["category_name"]; ?>" type="text" name="category_name" class="form-control">
	</div>
	<input type="submit" value="ذخیره نمودن" class="btn btn-primary">
	
</form>



<?php require_once("footer.php"); ?>
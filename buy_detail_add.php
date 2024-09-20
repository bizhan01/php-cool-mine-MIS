<?php require_once("restrict.php")?>
<?php require_once("connection.php"); ?>

<?php

	if(isset($_POST["product_name"])){
		$name = $_POST["product_name"];
		$category = $_POST["category_id"];
		$desc = $_POST["description"];
		$quantity = $_POST["quantity"];
		$unitprice = $_POST["unitprice"];
		$totalprice = $_POST["totalprice"];
		$manufacture = $_POST["manufacture_date"];
		$expire = $_POST["expire_date"];		
		$buy_id = $_GET["buy_id"];
		
		$result = mysqli_query($az_con, "INSERT INTO buy_detail VALUES(NULL,
		$buy_id, '$name', $category, '$desc', $quantity,
		$unitprice, $totalprice, '$manufacture', '$expire')", $con);
		
		if($result){
			header("location:buy_detail_add.php?buy_id=
			$buy_id");
		}
		else{
			header("location:buy_detail_add.php?buy_id=
			$buy_id&error=notadd");
		
		}
	
	
	
	}

	$category = mysqli_query($az_con, "SELECT * FROM category ORDER BY category_name ASC");
	$row_category = mysqli_fetch_assoc($category);
	
	$buydetail = mysqli_query($az_con, "SELECT COUNT(detail_id) AS total FROM buy_detail
	WHERE buy_id = " . $_GET["buy_id"]);
	$row_buydetail = mysqli_fetch_assoc($buydetail);

?>


<?php require_once("top.php"); ?>

<h3>اضافه نمودن جنس به خریداری

	(<?php echo $row_buydetail["total"]; ?>)

</h3>

<form method="post">
	<div class="input-group">
	<span class="input-group-addon">
	نام جنس:
	</span>
	<input type="text" name="product_name" class="form-control">
	</div>
	
	<div class="input-group">
	<span class="input-group-addon">
	نوعیت:
	</span>
	<select name="category_id" class="form-control">
			<?php do { ?>
				
				<option value="<?php echo $row_category["category_id"]; ?>"><?php echo $row_category["category_name"]; ?></option>
				
			<?php } while($row_category = mysql_fetch_assoc($category)); ?>
		</select>
	</div>
	
	<div class="input-group">
	<span class="input-group-addon">
	جزییات:
	</span>
	<textarea name="description" rows="4" class="form-control"></textarea>
	</div>
	
	<div class="input-group">
	<span class="input-group-addon">
	تعداد:
	</span>
	<input type="text" id="quantity" name="quantity" class="form-control">
	</div>
	
	<div class="input-group">
	<span class="input-group-addon">
	قیمت:
	</span>
	<input type="text" id="unitprice" name="unitprice" class="form-control">
	</div>
	
	<div class="input-group">
	<span class="input-group-addon">
	مجموع:
	</span>
	<input type="text" readonly id="totalprice" name="totalprice" class="form-control">
	</div>
	
	<div class="input-group">
	<span class="input-group-addon">
	تاریخ تولید:
	</span>
	<input type="text" id="manufacture_date" name="manufacture_date" class="form-control">
	</div>
	
	<div class="input-group">
	<span class="input-group-addon">
	تاریخ انقضا:
	</span>
	<input type="text" id="expire_date" name="expire_date" class="form-control">
	</div>
	
	<input type="submit" value="اضافه نمودن" class="btn btn-primary">
	<a href="buy_list.php?add=done" class="btn btn-success">
	پایان خریداری
	</a>
	
</form>

<script type="text/javascript">
    function catcalc(cal) {
        var date = cal.date;
        var time = date.getTime()
        var field = document.getElementById("expire_date");
        if (field == cal.params.inputField) {
            field = document.getElementById("expire_date");
            time -= Date.WEEK;
        } else {
            time += Date.WEEK;
        }
        var date = new Date(time);
        field.value = date.print("%Y-%m-%d");
    }
    
	Calendar.setup({
        inputField      :    "expire_date",
        ifFormat        :    "%Y-%m-%d",
        showsTime       :    false,
        timeFormat      :    "24"
    });
	
	Calendar.setup({
        inputField      :    "manufacture_date",
        ifFormat        :    "%Y-%m-%d",
        showsTime       :    false,
        timeFormat      :    "24"
    });
	
</script>



<?php require_once("footer.php"); ?>
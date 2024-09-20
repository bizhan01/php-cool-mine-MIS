$(document).ready(function() {
	
	$(".alert").slideUp(5000);
	
	$("#printButton").click(function(){
		var printWindow = window.open("", "printWindow", "");
		var data = $("#printArea").html();
		printWindow.document.write("<html><head><link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'><link rel='stylesheet' type='text/css' href='css/bootstrap-theme.min.css'><link rel='stylesheet' type='text/css' href='css/style.css'></head><body>" + data + "</body></html>");
		
		printWindow.print();
		printWindow.close();
	});
		
	function calculatePrice() {
		var quantity = parseFloat($("#quantity").val());
		var unitprice = parseFloat($("#unitprice").val());
		$("#totalprice").val(quantity * unitprice);
		
		var discount = $("#discount").val();
		var totalprice = $("#totalprice").val();
		var totalamount = totalprice - (totalprice * discount / 100);
		$("#totalamount").val(totalamount);
	}
	
	
	$("#quantity").blur(function(){
		calculatePrice();	
	});
	
	$("#unitprice").blur(function(){
		calculatePrice();	
	});
	
	$("#discount").blur(function(){
		calculatePrice();
	});
	
	
	$("#product_id").change(function(){
		var product_id = $(this).val();
		if(product_id !=0){
			$.post("find_price.php", "x=" +product_id, function(data){
			$("#unitprice").val(data);
			});	
		}
	});
	
	$("#unitprice").blur(function(){
		var unitprice = parseFloat($("#unitprice").val());
		var quantity = parseFloat($("#quantity").val());
		var totalprice = quantity * unitprice;
	
		$("#totalprice").val(totalprice);
	
	});
	
	
	$("#quantity").blur(function(){
		var unitprice = parseFloat($("#unitprice").val());
		var quantity = parseFloat($("#quantity").val());
		var totalprice = quantity * unitprice;
	
		$("#totalprice").val(totalprice);
	
	});
	
	
	
	$("a.delete").click(function(){
		var sure = window.confirm("آیا نسبت به عملیه حذف اطمینان دارید؟");
	
		if(!sure){
			event.preventDefault();
		}
		
	});
	
	$("form#password").submit(function(){
		if($("#new").val() != $("#confirm").val()){
			$("#new").css("background-color", "pink");
			$("#confirm").css("background-color", "pink");
			$("#confirm").parent().after("<div class='alert alert-danger'>رمز جدید و تکرار آن مشابه نمی باشد</div>");
			event.preventDefault();
		}
	});
});
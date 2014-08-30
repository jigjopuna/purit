
$(document).ready(function(){
	$('#send').click(form_validate);
	//$('#week h1').load("../ajax/pay_week.php", function() {});
	//$('#month h1').load("../ajax/pay_month.php");
	
	$('#week table').hide();
	$('#week h1').click(showTableWeekDetail);
	
	$('#month table').hide();
	$('#month h1').click(showTableMonthDetail);
	
	
	
	
});

function form_validate(){
	var product_type = $('#cate').val();
	var amount = $('#amonth').val();
	if(product_type==0){
		alert('Please Select Product Type');
		return false;
	}
	if(amount==''){
		alert('Please Fill the money');
		return false;
	}
	
}

function showTableMonthDetail(){
	$('#month table').toggle('slow');
}

function showTableWeekDetail(){
	$('#week table').toggle('slow');
}


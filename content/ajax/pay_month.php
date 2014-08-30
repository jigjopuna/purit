<?
   require_once('../include/connect.php');
   $today = date("Y-m-d H:i:s");
   $start_month = date('Y-m').'%';
	$sql = "SELECT sum(acc_amount) AS total
			FROM tb_account 
			WHERE acc_date LIKE '$start_month'";		
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$a = 5555;
	echo "<span id='detail'>This month</span> : $row[total] Baht
		  <script>
				$('#detail').click(function(){
				//$('#month h1').load('../ajax/pay_month_detail.php');
				//var b = 8888;
				

				var a = '<table><thead><td>1</td><td>2</td></thead><tr><td>b</td><td>2</td></tr></table>';
				$('#month').append(a);
	        }); 
		  </script>
	     ";
?>
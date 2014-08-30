<?
   require_once('../include/connect.php');
   $today = date("Y-m-d H:i:s");
   $first_day_of_week = date('Y-m-d H:i:s', strtotime('Last Monday', time()));
	/*$sql = "SELECT sum(acc_amount) AS total
			FROM tb_account 
			WHERE acc_date BETWEEN '$first_day_of_week' AND '$today'";
		
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);*/
	echo "5556666";
?>
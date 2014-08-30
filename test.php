<?
$today = date("Y-m-d H:i:s");
echo $today; echo '<br>';

$first_day_of_week = date('Y-m-d H:i:s', strtotime('last monday', time()));
echo $first_day_of_week;echo '<br>';



$month_start = date('Y-m-d H:i:s', strtotime('last month', time()));
echo $month_start; echo '<br>';


echo date('Y-m-d H:i:s', strtotime('last monday'));echo '<br>';
echo date('t M Y'); echo '<br>'; //end of month
echo date('Y-m-t H:i:s'); echo '<br>'; //end of month
$a = date('Y-m').'-01 00:00:00';  //start of month
echo $a;
?>
<?php 
 //Connect Database Server
 date_default_timezone_set('Asia/Bangkok');
	/*$host = "localhost";
	$user = "phuritco_account";
	$pass = "acc1234";
	$db   = "phuritco_account";*/
	
	$host = "localhost";
	$user = "root";
	$pass = "1234";
	$db   = "account";
	
	$conn = mysql_connect($host, $user, $pass) or exit ("SERVER DB ERRORR");
	
	//Select Database
	mysql_select_db($db, $conn) or die("Not Found Database");
	mysql_query("set names utf8");
	
	
function d_diff($timestamp_var){
	
	$diff = time() - $timestamp_var;
    
	
	$periods = array("วินาที", "นาที", "ชั่วโมง", "วัน", "เดือน", "ปี");	
	$words="ที่แล้ว";
	
	if($diff<60){ // second
		$i=0;
		//echo $i; echo '<br>';
		$text = "$diff $periods[$i]$words";	
		
	}elseif($diff<3600){ //minute
		$i=1;
		$diff=round($diff/60);
		$text = "$diff $periods[$i]$words";

		
	}elseif($diff<86400){ //hour
		$i=2;
		$diff=round($diff/3600);	
		$text = "$diff $periods[$i]$words";
		
		
	}elseif($diff<2592000){ // day
		$i=3;
		$diff=round($diff/86400);
		if($diff<2){
			$text = "เมื่อวาน " .date("G:i ",$timestamp_var);
		}else{
		$text = "$diff $periods[$i]$words " .date("G:i ",$timestamp_var);
		}
		
							
	}elseif($diff<31104000){// month
		$i=4;
		$thMonth = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
		$month = $thMonth[date("m", $timestamp_var)-1];
		$diff=round($diff/2592000);
		if($diff<2){
			$text = "เดือนที่แล้ว" ;
		}else{
			//$text = "$diff $periods[$i]$words   $month" ;
			$text = "$diff $periods[$i]$words" ;

		}
	}else{
		$i=5;
		$thMonth = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
		$month = $thMonth[date("m", $timestamp_var)-1];
		$diff=round($diff/31104000);
		if($diff<2){
			$text = "ปีที่แล้ว $month" ;
		}else{
			$text = "$diff $periods[$i]$words";
		}	
	}
	return $text;
}
?>
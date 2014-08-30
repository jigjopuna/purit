<?php 
	require_once('../include/connect.php');
//Recive Data
	$cate = trim($_POST['cate']);
	$other = trim($_POST['other']);
	$amonth = trim($_POST['amonth']);
	$user = trim($_POST['user']);
	
	/*echo "cate = "; echo $cate; echo "<br>";
	echo "other = "; echo $other; echo "<br>";
	echo "amonth = "; echo $amonth; echo "<br>";
	exit();*/
	
	$sql = "INSERT INTO tb_account SET acc_type='$cate', 
			acc_descript='$other', 
			acc_amount='$amonth', acc_user='$user', acc_date=now()";
	$result = mysql_query($sql);
	
	
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
	<?php 
	    if($user==1){
			exit("<script>
			alert('บันทึกข้อมูลเรียบร้อย');
			window.location = '../html/account_main.php'
	       </script>");
		}else if($user==2){
			exit("<script>
			alert('บันทึกข้อมูลเรียบร้อย');
			window.location = '../../auy.php'
	       </script>");
		}
			
	?>
  </body>
</html>
	
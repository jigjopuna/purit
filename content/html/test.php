<?php 
require_once('../include/connect.php');
				$sql = "SELECT a.acc_date, a.acc_amount, n.type_name 
				        FROM tb_account a, tb_name n
						WHERE a.acc_type = n.type_id 
						ORDER BY acc_id DESC 
						LIMIT 0,3";
				$result = mysql_query($sql);
				$num = mysql_num_rows($result);
?>
<html>
<head>
</head>
<body>
	<table>
		<tr>
			<td>1</td>
			<td>2</td>
			<td>3</td>
		</tr>
		<?php for($i=1; $i<=$num; $i++){
			$row = mysql_fetch_array($result);
		?>
		<tr>
			<td><?php echo $row[acc_date]?></td>
			<td><?php echo $row[type_name]?></td>
			<td><?php echo $row[acc_amount]?></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>
				
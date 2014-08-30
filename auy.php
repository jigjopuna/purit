<?php
	require_once('content/include/connect.php');
	$today = date("Y-m-d H:i:s");
    $start_month = date('Y-m').'%';
    $first_day_of_week = date('Y-m-d H:i:s', strtotime('Last Monday', time()));
	$user = 2;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="mobile-web-app-capable" content="yes">
	<link rel="icon" size="196x196" href="content/images/favicon.png">
    <meta charset="utf-8">
    <title>money flow</title>
    <link type="text/css" rel="stylesheet" href="content/css/style.css">
    <link type="text/css" rel="stylesheet" href="content/css/media_query/tablet.css">
    <link type="text/css" rel="stylesheet" href="content/css/media_query/tabletSmall.css">
    <link type="text/css" rel="stylesheet" href="content/css/media_query/mobile.css">
    <link type="text/css" rel="stylesheet" href="content/css/base.css">
    <link type="text/css" rel="stylesheet" href="content/font/stylesheet.css">
    <script src="content/js/jquery-1.11.1.min.js"></script>
    <script src="content/js/main.js"></script>
  </head>
  <body>
    <nav class="menu slide-menu-left">
      <ul>
        <li>
          <button class="close-menu">&larr; Close</button>
        </li>
        <li><a href="#">HOME</a></li>
        <li><a href="#">Tomato</a></li>
        <li><a href="#">Cucumber</a></li>
        <li><a href="#">Kale</a></li>
        <li><a href="#">garlic </a></li>
      </ul>
    </nav>
    <nav class="menu push-menu-left">
      <ul>
        <li>
          <button class="close-menu">&larr; Close</button>
        </li>
        <li><a href="#">HOME</a></li>
        <li><a href="#">Tomato</a></li>
        <li><a href="#">Cucumber</a></li>
        <li><a href="#">Kale</a></li>
        <li><a href="#">garlic</a></li>
      </ul>
    </nav>
    <div id="wrapper">
      <div class="info-bar">
        <div class="container"></div>
      </div>
      <header>
        <div class="brading">
          <div class="container clearfix">
            <div class="logos"><img src="content/images/auy.png"></div>
            <div class="name">หมูอ้วน โสมทอง</div>
            <div class="social"></div>
          </div>
        </div>
        <div class="site-title">
          <div class="container">
            <h1>อย่ากินเยอะนะเปลืองตัง^^</h1>
          </div>
        </div>
      </header>
      <div id="main">
        <div class="container">
          <div class="buttons">
            <button class="nav-toggler toggle-slide-left">Menu</button>
            <button class="nav-toggler toggle-push-left">Menu</button>
          </div>
        </div>
        <section class="content">
          <h1>อย่าลืมบันทึกเด้อ.</h1>
          <form method="post" action="content/saveDB/save_money.php">
            <div>
              <label>ซื้อของอะไรดีน๊า</label>
              <div>
                <select name="cate" id="cate">
                  <option value="0">เลือกสักอย่างนะ </option>
                  <option value="1">อาหาร</option>
                  <option value="2">เครื่องดื่ม</option>
                  <option value="3">ค่าน้ำมันรถ</option>
                  <option value="4">ผลไม้</option>
                  <option value="5">ค่าเดินทาง</option>
                  <option value="99">อื่นๆ</option>
                </select>
              </div>
            </div>
            <div>
              <label>บอกอะไรเพิ่มเติมด้วยนะ</label>
              <div>
                <input type="text" id="other" name="other">
              </div>
            </div>
            <div>
              <label>เท่าไรจ๊ะ</label>
              <div>
                <input type="text" id="amonth" name="amonth">
              </div>
            </div>
			<input type="hidden" name="user" value="<?php echo $user;?>">
            <input type="submit" id="send" value="SEND">
          </form>
        </section>
        <section class="pay_history">
          <h1>ประวัติรายจ่าย</h1>
          <table>
            <thead>
              <td>ของ</td>
              <td>กี่บาท</td>
              <td>เมื่อ</td>
            </thead>
            <?php 
				$sql = "SELECT acc_date, acc_amount, acc_descript 
						FROM tb_account 
						WHERE acc_user = '$user'						
						ORDER BY acc_id DESC 
						LIMIT 0,7";
				$sql_sum_m = "  SELECT sum(acc_amount) AS total
								FROM tb_account 
								WHERE acc_date LIKE '$start_month' AND acc_user = '$user'";
				$sql_sum_w = "  SELECT sum(acc_amount) AS total_w
								FROM tb_account 
								WHERE acc_date BETWEEN '$first_day_of_week' AND '$today' 
									   AND acc_user = '$user'";
				
				$sql_detail_w = "   SELECT a.acc_type, n.type_name, SUM( acc_amount ) AS sum_m
									FROM tb_account a
									JOIN tb_name n ON a.acc_type = n.type_id
									WHERE acc_date BETWEEN '$first_day_of_week' AND '$today' AND acc_user = '$user'
									GROUP BY n.type_name";
				
				$sql_detail_m = "   SELECT n.type_name, SUM( acc_amount ) AS sum_m
									FROM tb_account a
									JOIN tb_name n ON a.acc_type = n.type_id
									WHERE a.acc_date LIKE  '%2014-08%' AND acc_user = '$user'
									GROUP BY n.type_name";
				
				$result = mysql_query($sql);
				$num = mysql_num_rows($result);
				
					
				$result_sum_m = mysql_query($sql_sum_m);
				$row_sum_m = mysql_fetch_array($result_sum_m);
				
				$result_sum_w = mysql_query($sql_sum_w);
				$row_sum_w = mysql_fetch_array($result_sum_w);
				
				$result_detail_w = mysql_query($sql_detail_w);
				$num_detail_w = mysql_num_rows($result_detail_w);
				
				$result_detail_m = mysql_query($sql_detail_m);
				$num_detail_m = mysql_num_rows($result_detail_m);
				
			?>
			<?php 			
				for($i=1; $i<=$num; $i++){
					$row = mysql_fetch_array($result);
			?>
				<tr>
					<td><?php echo $row[acc_descript];?></td>
					<td><?php echo $row[acc_amount]?></td>
					<td><?php echo d_diff(strtotime($row[acc_date])) ?></td>
				</tr>
			<?php }  ?>
          </table>
        </section>
        <section id="week">
          <h1><?php echo 'This week : '.$row_sum_w[total_w] .' Baht' ?></h1>
		  <table>
				<thead>
					<td>Type_name</td>
					<td>Sum of Week</td>
				</thead>
				<?php for($i=1; $i<=$num_detail_w; $i++){
					$row_detail_w = mysql_fetch_array($result_detail_w);?>
				<tr>
					
					<td><a href="content/html/report.php?type=<?php echo $row_detail_w[acc_type]?>&name=<?php echo $row_detail_w[type_name]?>&user=<?php echo $user?>">
						<?php echo $row_detail_w[type_name]?></a></td>
					
					<td><?php echo $row_detail_w[sum_m]?></td>
				</tr>
				<?php } ?>
		  </table>
        </section>
        <section id="month">
          <h1><?php echo '<span>This month : </span>'.$row_sum_m[total] .' Baht' ?></h1>
		  <table>
				<thead>
					<td>Type_name</td>
					<td>Sum of Month</td>
				</thead>
				<?php for($i=1; $i<=$num_detail_m; $i++){
					$row_detail_m = mysql_fetch_array($result_detail_m);?>
				<tr>
					<td><?php echo $row_detail_m[type_name]?></td>
					<td><?php echo $row_detail_m[sum_m]?></td>
				</tr>
				<?php } ?>
		  </table>
        </section>
      </div>
      <footer></footer>
    </div>
    <script src="content/js/classie.js"></script>
    <script src="content/js/nav.js"></script>
  </body>
</html>
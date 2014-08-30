<?php
	require_once('../include/connect.php');
	$today = date("Y-m-d H:i:s");
    $start_month = date('Y-m').'%';
    $first_day_of_week = date('Y-m-d H:i:s', strtotime('Last Monday', time()));
	
	$type = trim($_GET[type]); 
	$name = trim($_GET[name]);
	$user = trim($_GET[user]);
	
	
	
	$sql_w = "  SELECT *
				FROM tb_account 
				WHERE acc_date BETWEEN '$first_day_of_week' AND '$today' 
				AND acc_type = '$type' AND acc_user = '$user' 
				ORDER BY acc_date DESC";
				
	$sql_m = "  SELECT *
				FROM tb_account 
				WHERE acc_date LIKE '$start_month' 
				AND acc_type = '$type' AND acc_user = '$user' 
				ORDER BY acc_date DESC";
	
	$result_m = mysql_query($sql_m);
	$num_m	  = mysql_num_rows($result_m);
				
	$result_w = mysql_query($sql_w);
	$num_w	  = mysql_num_rows($result_w);
				      
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="mobile-web-app-capable" content="yes">
	<link rel="icon" size="196x196" href="../images/favicon.png">
    <meta charset="utf-8">
    <title>money flow</title>
    <link type="text/css" rel="stylesheet" href="../css/style.css">
    <link type="text/css" rel="stylesheet" href="../css/media_query/tablet.css">
    <link type="text/css" rel="stylesheet" href="../css/media_query/tabletSmall.css">
    <link type="text/css" rel="stylesheet" href="../css/media_query/mobile.css">
    <link type="text/css" rel="stylesheet" href="../css/base.css">
    <link type="text/css" rel="stylesheet" href="../font/stylesheet.css">
    <script src="../js/jquery-1.11.1.min.js"></script>
    <script src="../js/main.js"></script>
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
            <!--<div class="logo"><img></div>-->
            <div class="name">รายงาน</div>
            <div class="social"></div>
          </div>
        </div>
        <div class="site-title">
          <div class="container">
            <h1>รายงานการใช้เงิน</h1>
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
        <section class="pay_history">
         <h1><?php echo $name;?> This week</h1>
		  <table>
				<thead>
					<td>description</td>
					<td>Price</td>
					<td>date</td>
				</thead>
				<?php for($i=1; $i<=$num_w; $i++){
					$row_w = mysql_fetch_array($result_w);?>
				<tr>
					<td><?php echo $row_w[acc_descript ]?></td>
					<td><?php echo $row_w[acc_amount]?></td>
					<td><?php echo d_diff(strtotime($row_w[acc_date]))?></td>
				</tr>
				<?php } ?>
		  </table>
        </section>
		
		<section class="pay_history">
         <h1><?php echo $name;?> This month</h1>
		  <table>
				<thead>
					<td>description</td>
					<td>Price</td>
					<td>date</td>
				</thead>
				<?php for($i=1; $i<=$num_m; $i++){
					$row_m = mysql_fetch_array($result_m);?>
				<tr>
					<td><?php echo $row_m[acc_descript]?></td>
					<td><?php echo $row_m[acc_amount]?></td>
					<td><?php echo d_diff(strtotime($row_m[acc_date]))?></td>
				</tr>
				<?php } ?>
		  </table>
        </section>
		
      </div>
      <footer></footer>
    </div>
    <script src="../js/classie.js"></script>
    <script src="../js/nav.js"></script>
  </body>
</html>
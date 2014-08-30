<?php
	require_once('../include/connect.php');
	$sql = "SELECT * FROM tb_name ";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);
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
        <li><a href="href="admin.php">Admin </a></li>
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
        <li><a href="href="admin.php">Admin</a></li>
      </ul>
    </nav>
    <div id="wrapper">
      <div class="info-bar">
        <div class="container"></div>
      </div>
      <header>
        <div class="brading">
          <div class="container clearfix">
            <div class="logo"><img></div>
            <div class="name">purit chokeutsaha</div>
            <div class="social"></div>
          </div>
        </div>
        <div class="site-title">
          <div class="container">
            <h1>Control Panel</h1>
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
          <h1>แก้ไขรายการ</h1>
		  <table>
				<thead>
					<td>#</td>
					<td>Name</td>
					<td colspan=2>Edit ADD</td>
				</thead>
				<?php for($i=1; $i<=$num; $i++){
					$row = mysql_fetch_array($result);?>
				<tr>
					<td><?php echo $row[type_id]?></td>
					<td><?php echo $row[type_name]?></td>
					<td><a href="tbNameEidt.php?id=<?php echo $row[type_id]?>">Edit</a></td>
					<td><a href="tbNameAdd.php">ADD</a></td>
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
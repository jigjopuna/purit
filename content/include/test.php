<?php
  require_once('connect.php');
  echo date(strtotime('Last Monday', time())); echo '<br>';
  echo time(); echo "     now. <br>";
  echo strtotime('2014-08-17 21:00:00'); echo "     2014-08-17 21:00:00.<br>";

  echo d_diff(strtotime('2014-08-17'));
?>
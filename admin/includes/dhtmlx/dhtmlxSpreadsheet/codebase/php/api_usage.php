<?php
 require_once("api.php"); require_once("config.php"); $res = mysql_connect($db_host.":".$db_port, $db_user, $db_pass); mysql_select_db($db_name, $res); $sh = new SpreadSheet($res, "1", $db_prefix); $r = $sh->getCell("B2")->getStyle(); echo "<pre>"; print_r($r); echo "</pre>"; echo "<br>"; ?>
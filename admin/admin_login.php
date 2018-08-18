<?php
 $_SESSION['is_browser'] = 1; require_once("./includes/global.php"); if($_GET["act"] == "help") include template('','help'); else include template('','login');
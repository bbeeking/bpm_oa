<?php
 if (!defined('IN_DAEM')) { die('Hacking attempt'); } date_default_timezone_set("Asia/Shanghai"); define('START_TIME', microtime(true));define('START_MEMORY', memory_get_usage()); require_once("db_mysql.php"); require_once("db_oracle.php"); require_once("db_sqlserver.php"); require_once("global.php"); if($_SESSION['UserId']=="") { gourl("","/".SITE_DIR."/admin/admin_login.php",'',"top"); } $webtitle = WEBTITLE; require_once('template.func.php'); require_once('system.func.php'); $db = new db(); $db->connect($slaveDb); if(!empty($_SERVER['HTTP_HOST'])) { $db->user_log_record($db); } user_last_visit(); authority_permission($_SESSION['UserGroup']); 
<?php
 define('IN_DAEM', true); include '../includes/init.php'; include '../includes/ftp.func.php'; $out = shell_exec(dirname(ROOT_PATH)."/plugin/test.bat"); $out = mb_convert_encoding($out,"utf8","gb2312"); print_r($out); 
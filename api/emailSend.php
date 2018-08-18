<?php
 define('IN_DAEM', true); error_reporting(0); include_once '../init/global.php'; file_put_contents("./emailPost.log",json_encode($_GET)."\n",FILE_APPEND); echo json_encode(array("发送邮件成功!"));die;
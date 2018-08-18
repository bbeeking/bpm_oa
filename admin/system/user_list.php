<?php
 define('IN_DAEM', true); include '../includes/init.php'; $departmentAry = get_department_kv(); chkpurview('adminuserlist'); $user = ShowAdminUser(); include template('system','user_list'); 
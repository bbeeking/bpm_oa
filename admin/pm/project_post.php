<?php
 define('IN_DAEM', true); include_once '../includes/init.php'; $type = $_GET['type']; $pid = ceil($_POST['pid']); $parentPid = $_POST['parent_pid']; $projectName = (trim($_POST['project_name'])); $locality = ceil(trim($_POST['locality'])); $priority = $_POST['priority']; $status = $_POST['status']; $color = $_POST['color']; if ($type == 'add') { if ($parentPid == '' || $projectName == '') { $db->close(); gourl('缺少关键参数。','',-1); } $sql = "insert into ".DB_DAEMDB.".".TB_SUFFIX."task_project
			set pid = '".DAEM_TIME."',
			parent_pid = '".$parentPid."',
			project_name = '".$projectName."',
			locality = '".$locality."',
			priority = '".$priority."',
			status = '".$status."',
			color = '".$color."',
			builder = '".$_SESSION['UserName']."',
			create_date = '".date('Y-m-d H:i:s',DAEM_TIME)."',
			last_operator = '".$_SESSION['UserName']."',
			last_operation_time = '".date('Y-m-d H:i:s',DAEM_TIME)."'"; $query = $db->query($sql); if($query) { gourl('添加成功。','task_project_manager.php'); } else gourl('添加失败','',-1); } else { if ($pid < 1 || $parentPid == '' || $projectName == '') { $db->close(); gourl('缺少关键参数。','',-1); } if ($parentPid != '0') { $sql = "select pid from ".DB_DAEMDB.".".TB_SUFFIX."task_project where parent_pid='".$pid."'"; if ($db->query_first($sql)) { $db->close(); gourl($sql1.'对不起，该项目下存在子项目，不能设置为非顶级项目，如果您确定要设置为非顶级项目，请先删除其子项目。','',-1); } } $sql = "update ".DB_DAEMDB.".".TB_SUFFIX."task_project
			set parent_pid='".$parentPid."',
			project_name='".$projectName."',
			priority = '".$priority."',
			status = '".$status."',
			color = '".$color."',
			last_operator = '".$_SESSION['UserName']."',
			last_operation_time = '".date('Y-m-d H:i:s',DAEM_TIME)."',
			locality='".$locality."'
			where pid='".$pid."'"; $query = $db->query($sql); if($query) { gourl('修改成功。','task_project_manager.php'); } else gourl('修改失败','',-1); } 
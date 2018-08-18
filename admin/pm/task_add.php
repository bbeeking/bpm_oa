<?php  define('IN_DAEM', true); include '../includes/init.php'; include '../includes/task.func.php'; $userAry = get_user_realname(); $userAllowAry = get_user_realname('0'); $projectAry = get_project_info('y'); $versionAry = array(); $sql = "select distinct version from ".DB_DAEMDB.".".TB_SUFFIX."task_job"; $query = $db->query($sql); $key = 1; while ($row = $db->fetch_array($query)) { $versionAry[$key] = $row['version']; $key ++; } $content = $DefaultTaskAddContent; $startDate = date('Y-m-d 00:00:00'); $endDate = date('Y-m-d 23:59:59'); $performer = $_SESSION['UserName']; if (!empty($_POST)) { $status = !empty($_POST['status'])? $_POST['status'] : ''; $type = !empty($_POST['type'])? $_POST['type'] : ''; $performer = !empty($_POST['performer'])? $_POST['performer'] : ''; $follower = !empty($_POST['options_value'])? $_POST['options_value'] : ''; $version = !empty($_POST['version'])? $_POST['version'] : ''; $priority = !empty($_POST['priority']) ? intval($_POST['priority']) : ''; $startDate = !empty($_POST['startDate'])? $_POST['startDate'] : ''; $endDate = !empty($_POST['endDate'])? $_POST['endDate'] : ''; $progress = !empty($_POST['progress']) ? $_POST['progress'] : ''; $title = !empty($_POST['title'])? htmlspecialchars(trim($_POST['title'])) : ''; $content = !empty($_POST['myEditor']) ? $_REQUEST['myEditor'] : $DefaultTaskAddContent; $userName = $_SESSION['UserName']; $pid = !empty($_POST['pid']) ? $_POST['pid'] : ''; if (!empty($title) && !empty($content)) { $sql = "insert into ".DB_DAEMDB.".".TB_SUFFIX."task_job 
				set title = '".$title."',
				content = '".$content."',
				status = '".$status."',
				type = '".$type."',
				priority = '".$priority."',

				builder = '".$_SESSION['UserName']."',
				performer = '".$performer."',
				follower = '".$follower."',
				progress = '".$progress."',
				version = '".$versionAry[$version]."',

				pid = '".$pid."',

				start_time = '".date('Y-m-d H:i:s',strtotime($startDate))."',
				end_time = '".date('Y-m-d H:i:s',strtotime($endDate))."',
				create_time = '".time()."'"; $query = $db->query($sql); if ($query) { gourl('添加成功','task_manager.php'); } else { gourl('添加失败','', -1); } } else { gourl('主题和描述不能为空','',-1); } } include template();
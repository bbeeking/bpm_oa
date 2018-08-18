<?php  define('IN_DAEM', true); include '../includes/init.php'; $versionAry = array(); $sql = "select distinct version from ".DB_DAEMDB.".".TB_SUFFIX."task_job"; $query = $db->query($sql); $key = 1; while ($row = $db->fetch_array($query)) { $versionAry[$key] = $row['version']; $key ++; } $id = $_POST['id']; if (!empty($_POST['commit']) && !empty($id)) { $sql = "select id from ".DB_DAEMDB.".".TB_SUFFIX."task_job where id = '".$id."' limit 1"; $result = $db->query_first($sql); if (empty($result['id'])) { gourl('未能找到该记录', '', -1); } $status = !empty($_POST['status'])? $_POST['status'] : ''; $type = !empty($_POST['type'])? $_POST['type'] : ''; $performer = !empty($_POST['performer'])? $_POST['performer'] : ''; $follower = !empty($_POST['follower'])? $_POST['follower'] : ''; $version = !empty($_POST['version'])? $_POST['version'] : ''; $priority = !empty($_POST['priority']) ? intval($_POST['priority']) : ''; $startDate = !empty($_POST['startDate'])? $_POST['startDate'] : ''; $endDate = !empty($_POST['endDate'])? $_POST['endDate'] : ''; $progress = !empty($_POST['progress']) ? $_POST['progress'] : ''; $estimatedHours = !empty($_POST['estimated_hours']) ? $_POST['estimated_hours'] : ''; $title = !empty($_POST['title'])? htmlspecialchars(trim($_POST['title'])) : ''; $content = !empty($_POST['myEditor']) ? $_REQUEST['myEditor'] : ''; $userName = $_SESSION['UserName']; if (!empty($title) && !empty($content)) { $sql = "update ".DB_DAEMDB.".".TB_SUFFIX."task_job 
				set title = '".$title."',
				content = '".$content."',
				status = '".$status."',
				type = '".$type."',
				performer = '".$performer."',
				priority = '".$priority."',
				follower = '".$follower."',
				progress = '".$progress."',
				version = '".$versionAry[$version]."',
				start_time = '".date('Y-m-d H:i:s',strtotime($startDate))."',
				end_time = '".date('Y-m-d H:i:s',strtotime($endDate))."',
				estimated_hours = '".$estimatedHours."'
				where id = '".$id."'"; $query = $db->query($sql); if ($query) { gourl('修改成功','',-1); } else { gourl('修改失败','', -1); } } else { gourl('主题和描述不能为空','',-1); } } else { gourl('访问非法', '', -1); }
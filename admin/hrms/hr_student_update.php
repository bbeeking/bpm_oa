<?php  define('IN_DAEM', true); include '../includes/init.php'; $sid = $_GET['sid']; if (!empty($_GET['commit']) && !empty($sid)) { $sql = "select sid from ".DB_DAEMDB.".".TB_SUFFIX."hr_student where sid = '".$sid."' limit 1"; $result = $db->query_first($sql); if (empty($result['sid'])) { gourl('未能找到该学员信息', '', -1); } $name = !empty($_GET['name']) ? $_GET['name'] : ''; $birth = !empty($_GET['birth']) ? $_GET['birth'] : ''; $sex = !empty($_GET['sex']) ? $_GET['sex'] : ''; $grade = !empty($_GET['grade']) ? $_GET['grade'] : ''; $course = !empty($_GET['course']) ? $_GET['course'] : ''; $enrollment_date = !empty($_GET['enrollment_date']) ? $_GET['enrollment_date'] : ''; $entry_level = !empty($_GET['entry_level']) ? $_GET['entry_level'] : ''; $addr = !empty($_GET['addr']) ? $_GET['addr'] : ''; $parent = !empty($_GET['parent']) ? $_GET['parent'] : ''; $tel = !empty($_GET['tel']) ? $_GET['tel'] : ''; $phone = !empty($_GET['phone']) ? $_GET['phone'] : ''; $qq = !empty($_GET['qq']) ? $_GET['qq'] : ''; $school = !empty($_GET['school']) ? $_GET['school'] : ''; $channel = !empty($_GET['channel']) ? $_GET['channel'] : ''; $status = !empty($_GET['status']) ? $_GET['status'] : ''; $detail = !empty($_GET['myEditor']) ? $_REQUEST['myEditor'] : ''; $last_operator = $_SESSION['UserName']; $last_operation_time = date('Y-m-d H:i:s'); if (!empty($name) && !empty($birth) && !empty($school) && !empty($parent) && !empty($enrollment_date) && !empty($addr) && !empty($sex) && !empty($grade) && !empty($tel) && !empty($course) && !empty($status) && !empty($entry_level)) { $sql = "update ".DB_DAEMDB.".".TB_SUFFIX."hr_student 
				set name = '".$name."',
				birth = '".$birth."',
				sex = '".$sex."',
				grade = '".$grade."',
				course = '".$course."',
				
				enrollment_date = '".$enrollment_date."',
				entry_level = '".$entry_level."',
				addr = '".$addr."',
				parent = '".$parent."',
				tel = '".$tel."',
				 
				phone = '".$phone."',
				qq = '".$qq."',
				school = '".$school."',
				channel = '".$channel."',
				status = '".$status."',
				
				detail = '".$detail."',
				last_operator = '".$last_operator."',
				last_operation_time = '".$last_operation_time."'
				where sid = '".$sid."'"; $query = $db->query($sql); if ($query) { gourl('更新成功','',-1); } else { gourl('更新失败','', -1); } } else { gourl('请填写所需内容','',-1); } } else { gourl('访问非法', '', -1); }
<?php  define('IN_DAEM', true); include '../includes/init.php'; $userAry = get_user_realname(); $studentInfoAry = get_student_info('y'); $studentInfoNoLimitAry = get_student_info(); $cid = $_GET['cid']; if (!empty($cid)) { $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."hr_course_info where cid = '".$cid."'"; $result = $db->query_first($sql); if (empty($result)) { gourl('未能找到该记录信息', 'hr_course_info.php'); } $result['create_time'] = date('Y-m-d H:i:s',$result['last_update_time']); $result['last_update_time'] = date('Y-m-d H:i:s',$result['last_update_time']); $courseStudentAry = array(); $options_value = ''; $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."hr_course_enroll where cid = '".$cid."' and status = '1' order by create_time desc,status asc"; $query = $db->query($sql); while ($row = $db->fetch_array($query)) { $courseStudentAry[] = $row['sid']; $courseStudentNameAry[$row['sid']] = $studentInfoAry[$row['sid']]; $options_value .= $row['sid'].','; } $options_value = trim($options_value,','); $overStudentAry = array(); $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."hr_course_enroll where cid = '".$cid."' and status != '1'"; $query = $db->query($sql); while ($row = $db->fetch_array($query)) { $overStudentAry[] = $row['sid']; } $onReadyStudentAry = $studentInfoAry; foreach ($courseStudentAry as $val) { unset($onReadyStudentAry[$val]); } $courseTeacherRecordAry = array(); $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."hr_teacher_course_record 
			where cid = '".$cid."' and unix_timestamp(course_date) between '".strtotime(date('Y-m-01'))."' and '".strtotime(date('Y-m-t'))."'
			order by unix_timestamp(course_date) desc"; $query = $db->query($sql); while ($row = $db->fetch_array($query)) { $courseTeacherRecordAry[] = $row; } } else { gourl('未能找到该课程信息', '',-1); } include template(); 
<?php
 define('IN_DAEM', true); include '../includes/init.php'; $userAry = get_user_realname(); $studentInfoAry = get_student_info('y'); if (!empty($_POST['submit'])) { $cid = $_POST['cid']; $teacher_account = $_POST['teacher_account']; $course_name = $_POST['course_name']; $term = $_POST['term']; $grade = $_POST['grade']; $subject_type = $_POST['subject_type']; $status = $_POST['status']; $start_date = $_POST['startDate']; $end_date = $_POST['endDate']; $detail = !empty($_POST['myEditor']) ? $_REQUEST['myEditor'] : ''; $options_value = $_POST['options_value']; $oper_sign = $_POST['oper_sign']; if (!empty($cid) && !empty($teacher_account) && !empty($course_name) && !empty($term) && !empty($grade) && !empty($status) && !empty($start_date) && !empty($subject_type)) { $sql = "select cid from ".DB_DAEMDB.".".TB_SUFFIX."hr_course_info where cid = '".$cid."'"; $result = $db->query_first($sql); if ($oper_sign == 'update') { if (empty($result['cid'])) { gourl('未能找到该课程', '', -1); } $sql_ary = array(); $sqlA = "update ".DB_DAEMDB.".".TB_SUFFIX."hr_course_info 
					set teacher_account = '".$teacher_account."',
					course_name = '".$course_name."',
					term = '".$term."',
					grade = '".$grade."',
					
					subject_type = '".$subject_type."',
					status = '".$status."',
					start_date = '".$start_date."',
					end_date = '".$end_date."',
					detail = '".$detail."',
					
					last_editor = '".$_SESSION['UserName']."',
					last_update_time = '".DAEM_TIME."'
					where cid = '".$cid."'"; $sql_ary[] = $sqlA; $sqlB = "update ".DB_DAEMDB.".".TB_SUFFIX."hr_course_enroll set status = '2' where cid = '".$cid."'"; $sql_ary[] = $sqlB; $sidAry = explode(',', $options_value); foreach ($sidAry as $key=>$val) { if (empty($val)) continue; $sql = "select id from ".DB_DAEMDB.".".TB_SUFFIX."hr_course_enroll where cid = '".$cid."' and sid = '".$val."'"; $check_sid = $db->query_first($sql); if ($check_sid['id']>0) { $sqlC = "update ".DB_DAEMDB.".".TB_SUFFIX."hr_course_enroll 
							 set status = '1',last_editor = '".$_SESSION['UserName']."',last_update_time = '".DAEM_TIME."' 
							 where cid = '".$cid."' and sid = '".$val."'"; } else { $sqlC = "insert into ".DB_DAEMDB.".".TB_SUFFIX."hr_course_enroll 
							(cid,sid,status,create_time,last_editor,last_update_time) values 
							('".$cid."','".$val."','1','".DAEM_TIME."','".$_SESSION['UserName']."','".DAEM_TIME."')"; } $sql_ary[] = $sqlC; } $res = $db->_query($sql_ary); if ($res) { gourl('更新成功', 'hr_course_view.php?cid='.$cid); } } else { if (!empty($result['cid'])) { gourl('课程代号已经存在', '', -1); } $sql = "insert into ".DB_DAEMDB.".".TB_SUFFIX."hr_course_info 
					set cid = '".$cid."',
					teacher_account = '".$teacher_account."',
					course_name = '".$course_name."',
					term = '".$term."',
					grade = '".$grade."',
					
					subject_type = '".$subject_type."',
					status = '".$status."',
					start_date = '".$start_date."',
					end_date = '".$end_date."',
					detail = '".$detail."',
					
					create_time = '".DAEM_TIME."',
					last_editor = '".$_SESSION['UserName']."',
					last_update_time = '".DAEM_TIME."'"; $query = $db->query($sql); if (!$query) { gourl('添加课程失败','',-1); } $sidAry = explode(',', $options_value); $sql = "insert into ".DB_DAEMDB.".".TB_SUFFIX."hr_course_enroll (cid,sid,status,create_time,last_editor,last_update_time) values "; foreach ($sidAry as $key=>$val) { $sql .= "('".$cid."','".$val."','1','".DAEM_TIME."','".$_SESSION['UserName']."','".DAEM_TIME."'),"; } $sql = trim($sql,','); $query = $db->query($sql); if (!$query) { gourl('添加学员课程失败', '',-1); } gourl('添加成功', 'hr_course_view.php?cid='.$cid); } } else { gourl('缺少相关参数','',-1); } } include template();
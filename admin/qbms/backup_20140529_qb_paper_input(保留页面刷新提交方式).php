<?php
 define('IN_DAEM', true); include '../includes/init.php'; $userAry = get_user_realname(); $userName = $_SESSION['UserName']; $editor = $userName; $province = '广东'; $city = '珠海市'; $area = '斗门区'; $p_degree = 0; $q_degree = 3; $right_answer = '略'; if ($_POST['isAjax'] == true) { process_ajax_require(); } $pid = $_GET['pid']; if (!empty($pid)) { $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."qb_paper_info WHERE pid = '".$pid."'"; $result = $db->query_first($sql); $title = $result['title']; $province = $result['province']; $city = $result['city']; $area = $result['area']; $grade = $result['grade']; $subject_type = $result['subject_type']; $term = $result['term']; $textbook_version = $result['textbook_version']; $school = $result['school']; $p_degree = $result['p_degree']; $author = $result['author']; $year = $result['year']; $test_time = $result['test_time']; $total_score = $result['total_score']; $editor = $result['editor']; $detail = $result['detail']; $create_time = $result['create_time']; $pid = $result['pid']; $dataAry = $questionTypeAry = array(); $i=1; $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."qb_paper_question_relationship a,".DB_DAEMDB.".".TB_SUFFIX."qb_question_info b 
			where a.pid = '".$pid."' and a.qid = b.qid
			order by order_seed"; $query = $db->query($sql); while ($row = $db->fetch_array($query)) { $dataAry[$row['qid']] = $row; if ($i==1) { $questionTypeAry[$i][$row['question_type']]['qid'][] = $row['qid']; $questionTypeAry[$i][$row['question_type']]['totalScore'] += $row['score']; $lastQuestionType = $row['question_type']; $i++; } else { if ($row['question_type'] != $lastQuestionType) { $questionTypeAry[$i][$row['question_type']]['qid'][] = $row['qid']; $questionTypeAry[$i][$row['question_type']]['totalScore'] += $row['score']; $lastQuestionType = $row['question_type']; $i++; } else { $questionTypeAry[$i-1][$row['question_type']]['qid'][] = $row['qid']; $questionTypeAry[$i-1][$row['question_type']]['totalScore'] += $row['score']; } } } } if (!empty($_POST['submit']) && $_POST['tty'] == 'pa') { $title = $_REQUEST['title']; $province = $_POST['province']; $city = $_POST['city']; $area = $_POST['area']; $grade = $_POST['grade']; $subject_type = $_POST['subject_type']; $term = $_POST['term']; $textbook_version = $_POST['textbook_version']; $school = $_POST['school']; $p_degree = $_POST['p_degree']; $author = $_POST['author']; $year = $_POST['year']; $test_time = $_POST['test_time']; $total_score = $_POST['total_score']; $detail = !empty($_POST['myEditor']) ? $_REQUEST['myEditor'] : ''; $create_time = DAEM_TIME; if (!empty($title) && !empty($province) && !empty($city) && !empty($area) && !empty($grade) && !empty($subject_type) && !empty($term) && !empty($textbook_version) && !empty($school) && !empty($year) && !empty($editor) ) { if (!empty($_POST['pid'])) { $pid = $_POST['pid']; $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."qb_paper_info where pid = '".$pid."' limit 1"; $result = $db->query_first($sql); if (empty($result['pid'])) { gourl('未能找到该记录', '', -1); } $sql = "UPDATE ".DB_DAEMDB.".".TB_SUFFIX."qb_paper_info
					SET title = '".$title."',
					province = '".$province."',
					city = '".$city."',
					
					area = '".$area."',
					grade = '".$grade."',
					subject_type = '".$subject_type."',
					term = '".$term."',
					textbook_version = '".$textbook_version."',
					
					school = '".$school."',
					degree = '".$p_degree."',
					author = '".$author."',
					year = '".$year."',
					test_time = '".$test_time."',
					
					total_score = '".$total_score."',
					detail = '".$detail."',
					last_editor = '".$_SESSION['UserName']."',
					last_update_time = '".DAEM_TIME."'
					where pid = '".$pid."'"; $query = $db->query($sql); if ($query) { gourl('修改成功','qb_paper_input.php?pid='.$pid); } else { gourl('修改失败','', -1); } } else { $pid = $school."_".DAEM_TIME; $sql = "SELECT pid FROM ".DB_DAEMDB.".".TB_SUFFIX."qb_paper_info WHERE pid = '".$pid."'"; $check = $db->query_first($sql); if (!empty($check['pid']) && $check['pid'] > 0) { gourl('该试卷记录编号已存在，原因可能如下：1.操作频繁  2.系统错误 3.非法操作 ；您应尝试返回重新提交，如问题仍未能解决请联系管理员解决！', '', -1); } else { $sql = "INSERT INTO ".DB_DAEMDB.".".TB_SUFFIX."qb_paper_info
						SET pid = '".$pid."',
						title = '".$title."',
						province = '".$province."',
						city = '".$city."',
						
						area = '".$area."',
						grade = '".$grade."',
						subject_type = '".$subject_type."',
						term = '".$term."',
						textbook_version = '".$textbook_version."',
						
						school = '".$school."',
						degree = '".$p_degree."',
						author = '".$author."',
						year = '".$year."',
						test_time = '".$test_time."',
						
						total_score = '".$total_score."',
						editor = '".$_SESSION['UserName']."',
						detail = '".$detail."',
						create_time = '".DAEM_TIME."',
						
						last_editor = '".$_SESSION['UserName']."',
						last_update_time = '".DAEM_TIME."'"; $query = $db->query($sql); if ($query) { gourl('添加成功','qb_paper_input.php?pid='.$pid); } else { gourl('添加失败','', -1); } } } } else { gourl('添加失败，缺少所需的数据','qb_paper_input.php'); } } if (!empty($_POST['submit']) && $_POST['tty'] == 'qa') { $q_degree = $_POST['q_degree']; $chapter = $_POST['chapter']; $question_type = $_POST['question_type']; $q_index = str_replace(array('，',',','；'), ';', trim($_POST['q_index'])); $score = $_POST['score']; $order_seed = $_POST['order_seed']; $question_content = !empty($_POST['myEditor1']) ? $_REQUEST['myEditor1'] : ''; $question_content = str_replace(array('<p>','</p>'), '', $question_content); $optionA = $_POST['optionA']; $optionB = $_POST['optionB']; $optionC = $_POST['optionC']; $optionD = $_POST['optionD']; $right_answer = $_POST['right_answer']; $answer_analyze = !empty($_POST['myEditor2']) ? $_REQUEST['myEditor2'] : ''; if (!empty($q_degree) && !empty($chapter) && !empty($question_type) && !empty($editor) && !empty($question_content) && !empty($right_answer) && !empty($score) && !empty($order_seed)) { if (!empty($_POST['qid'])) { $qid = $_POST['qid']; $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."qb_question_info where qid = '".$qid."' limit 1"; $result = $db->query_first($sql); if (empty($result['qid'])) { gourl('未能找到该记录', '', -1); } $questionImgPath = !empty($_FILES['fileQst']['name']) ? img_upload('fileQst') : $result['question_img_path']; $optionImgPathA = !empty($_FILES['fileOptionA']['name']) ? img_upload('fileOptionA') : $result['a_option_img_path']; $optionImgPathB = !empty($_FILES['fileOptionB']['name']) ? img_upload('fileOptionB') : $result['b_option_img_path']; $optionImgPathC = !empty($_FILES['fileOptionC']['name']) ? img_upload('fileOptionC') : $result['c_option_img_path']; $optionImgPathD = !empty($_FILES['fileOptionD']['name']) ? img_upload('fileOptionD') : $result['d_option_img_path']; $sql = "UPDATE ".DB_DAEMDB.".".TB_SUFFIX."qb_question_info
					SET question_type = '".$question_type."',
					question_content = '".$question_content."',
					question_img_path = '".$questionImgPath."',
					optionA = '".$optionA."',
					a_option_img_path = '".$optionImgPathA."',
					
					optionB = '".$optionB."',
					b_option_img_path = '".$optionImgPathB."',
					optionC = '".$optionC."',
					c_option_img_path = '".$optionImgPathC."',
					optionD = '".$optionD."',
					
					d_option_img_path = '".$optionImgPathD."',
					right_answer = '".$right_answer."',
					answer_analyze = '".$answer_analyze."',
					degree = '".$q_degree."',
					chapter = '".$chapter."',
					
					q_index = '".$q_index."',
					verify = '1',
					last_editor = '".$_SESSION['UserName']."',
					last_update_time = '".DAEM_TIME."'
					where qid = '".$qid."'"; $query = $db->query($sql); if (!$query) { gourl('修改试题失败','', -1); } $sql = "update ".DB_DAEMDB.".".TB_SUFFIX."qb_paper_question_relationship 
					set score = '".$score."',order_seed = '".$order_seed."',
					last_update_time = '".DAEM_TIME."' 
					where pid = '".$pid."' and qid = '".$qid."'"; $query = $db->query($sql); if (query) { gourl('修改成功!','qb_paper_input.php?pid='.$pid); } else { gourl('修改试卷的关联属性失败!','qb_paper_input.php?pid='.$pid); } } else { $qid = $subject_type."_".$grade."_".$term."_".DAEM_TIME; $questionImgPath = !empty($_FILES['fileQst']['name']) ? img_upload('fileQst') : ''; $optionImgPathA = !empty($_FILES['fileOptionA']['name']) ? img_upload('fileOptionA') : ''; $optionImgPathB = !empty($_FILES['fileOptionB']['name']) ? img_upload('fileOptionB') : ''; $optionImgPathC = !empty($_FILES['fileOptionC']['name']) ? img_upload('fileOptionC') : ''; $optionImgPathD = !empty($_FILES['fileOptionD']['name']) ? img_upload('fileOptionD') : ''; $sql = "SELECT qid FROM ".DB_DAEMDB.".".TB_SUFFIX."qb_question_info WHERE qid = '".$qid."'"; $check = $db->query_first($sql); if (!empty($check['qid']) && $check['qid'] > 0) { gourl('该试题编号已存在，原因可能如下：1.操作频繁  2.系统错误 3.非法操作 ；您应尝试返回重新提交，如问题仍未能解决请联系管理员解决！', '', -1); } else { $sql = "INSERT INTO ".DB_DAEMDB.".".TB_SUFFIX."qb_question_info
						SET qid = '".$qid."',
						question_type = '".$question_type."',
						question_content  = '".$question_content."',
						question_img_path  = '".$questionImgPath."',
						optionA = '".$optionA."',
						  
						a_option_img_path = '".$optionImgPathA."',
						optionB = '".$optionB."',
						b_option_img_path = '".$optionImgPathB."',
						optionC = '".$optionC."',
						c_option_img_path = '".$optionImgPathC."',
						  
						optionD = '".$optionD."',
						d_option_img_path = '".$optionImgPathD."',
						right_answer = '".$right_answer."',
						answer_analyze = '".$answer_analyze."',
						degree = '".$q_degree."',
						
						chapter = '".$chapter."',
						q_index = '".$q_index."',
						verify = '1',
						author = '".$author."',
						editor = '".$_SESSION['UserName']."',
						 
						create_time = '".DAEM_TIME."',
						last_editor = '".$_SESSION['UserName']."',
						last_update_time = '".DAEM_TIME."'"; $query = $db->query($sql); if (!$query) { gourl('添加题目失败','', -1); } } $sql = "INSERT INTO ".DB_DAEMDB.".".TB_SUFFIX."qb_paper_question_relationship
					set pid = '".$pid."',qid = '".$qid."',score = '".$score."',order_seed = '".$order_seed."',
					create_time = '".DAEM_TIME."',last_update_time = '".DAEM_TIME."'"; $query = $db->query($sql); if ($query) { gourl('添加成功','qb_paper_input.php?pid='.$pid); } else { gourl('写入关联数据表失败', '',-1); } } } } function img_upload($seed) { if ((($_FILES[$seed]['type'] == 'image/gif') || ($_FILES[$seed]['type'] == 'image/jpeg') || ($_FILES[$seed]['type'] == 'image/png') || ($_FILES[$seed]['type'] == 'image/pjpeg')) && ($_FILES[$seed]['size'] < 100000)){ if ($_FILES[$seed]['error'] > 0) { } else { $icon_upload_path = '../images/question_bank/upload/qst_img_'.date('Ym'); if (!file_exists($icon_upload_path)) { $mkSign = mkdir($icon_upload_path,0600); } if (!is_writable($mkSign)) { $writeSign = chmod($mkSign, 0600); } $encryptFileName = md5(time().$_FILES[$seed]['name']).'.png'; $filePath = $icon_upload_path.'/'.$encryptFileName; if (file_exists($filePath)) { } else { move_uploaded_file($_FILES[$seed]['tmp_name'],$filePath); return $filePath; } } } else { } } include template(); 
<?php
 define('IN_DAEM', true); include '../includes/init.php'; $type = $_POST['type']; if ($type == 'select') { $qid = $_POST['qid']; if (!empty($qid)) { $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."qb_question_info a where a.qid = '".$qid."'"; $result = $db->query_first($sql); echo json_encode($result);die; } } elseif ($type == 'question_process') { process_question_ajax_require(); } elseif ($type == 'question_remove') { process_remove_question_ajax_require(); } elseif ($type == 'question_app') { app_question_ajax_require(); } function process_remove_question_ajax_require() { global $db; $qid = $_POST['qid']; if (!empty($qid)) { $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."qb_question_info where qid = '".$qid."' limit 1"; $result = $db->query_first($sql); if (empty($result['qid'])) { echo json_encode(array('sign'=>'0','content'=>'未能找到该记录'));die; } $sql = "delete from ".DB_DAEMDB.".".TB_SUFFIX."qb_question_info where qid = '".$qid."' limit 1"; $query = $db->query($sql); if (!query) { echo json_encode(array('sign'=>'0','content'=>'删除试题失败!'));die; } } else echo json_encode(array('sign'=>'0','content'=>'缺少必要的参数！'));die; } function app_question_ajax_require() { global $db; $qid = $_POST['qid']; $app_status = $_POST['app_status']; if (!empty($qid) && !empty($app_status)) { if ($app_status == '2') { $sql = "UPDATE ".DB_DAEMDB.".".TB_SUFFIX."qb_question_info
					SET app_status = '".$app_status."',
					proof_status = '2' 
					where qid = '".$qid."'"; } else { $sql = "UPDATE ".DB_DAEMDB.".".TB_SUFFIX."qb_question_info
					SET app_status = '".$app_status."' 
					where qid = '".$qid."'"; } $query = $db->query($sql); if (!$query) { echo json_encode(array('sign'=>'0','content'=>'审核试题失败'));die; } else { echo json_encode(array('sign'=>'1','content'=>'审核试题成功'));die; } } else { echo json_encode(array('sign'=>'0','content'=>'缺少必要的参数'));die; } } function process_question_ajax_require() { global $db,$DefineSubjectType,$DefineNumZhnAry,$DefineQuestionTypeAry; $q_degree = $_POST['q_degree']; $chapter = $_POST['chapter']; $question_type = $_POST['question_type']; $q_index = str_replace(array('，',',','；'), ';', trim($_POST['q_index'])); $score = $_POST['score']; $question_content = !empty($_POST['myEditor1']) ? $_REQUEST['myEditor1'] : ''; $optionA = $_POST['optionA']; $optionB = $_POST['optionB']; $optionC = $_POST['optionC']; $optionD = $_POST['optionD']; $right_answer = $_POST['right_answer']; $answer_analyze = !empty($_POST['myEditor2']) ? $_REQUEST['myEditor2'] : ''; $subject_type = $_POST['subject_type']; $grade = $_POST['grade']; $term = $_POST['term']; $author = $_POST['author']; $pid = $_POST['pid']; $editor = $_SESSION['UserName']; $proofStatus = $_POST['proofStatus']; if (!empty($question_type) && !empty($subject_type) && !empty($question_content)) { if (!empty($_POST['qid'])) { $qid = $_POST['qid']; $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."qb_question_info where qid = '".$qid."' limit 1"; $result = $db->query_first($sql); if (empty($result['qid'])) { echo json_encode(array('sign'=>'0','content'=>'未能找到该记录'));die; } $sql = "UPDATE ".DB_DAEMDB.".".TB_SUFFIX."qb_question_info
					SET question_type = '".$question_type."',
					question_content = '".$question_content."',
					optionA = '".$optionA."',
					
					optionB = '".$optionB."',
					optionC = '".$optionC."',
					optionD = '".$optionD."',
					
					right_answer = '".$right_answer."',
					answer_analyze = '".$answer_analyze."',
					degree = '".$q_degree."',
					chapter = '".$chapter."',
					
					proof_status = '".$proofStatus."',
					app_status = '0',
					
					q_index = '".$q_index."',
					verify = '1',
					last_editor = '".$_SESSION['UserName']."',
					last_update_time = '".DAEM_TIME."'
					where qid = '".$qid."'"; $query = $db->query($sql); if (!$query) { echo json_encode(array('sign'=>'0','content'=>'修改试题失败'));die; } else { echo '修改成功';die; } } else { $qid = $subject_type."_".$question_type."_".DAEM_TIME; $questionImgPath = !empty($_FILES['fileQst']['name']) ? img_upload('fileQst') : ''; $optionImgPathA = !empty($_FILES['fileOptionA']['name']) ? img_upload('fileOptionA') : ''; $optionImgPathB = !empty($_FILES['fileOptionB']['name']) ? img_upload('fileOptionB') : ''; $optionImgPathC = !empty($_FILES['fileOptionC']['name']) ? img_upload('fileOptionC') : ''; $optionImgPathD = !empty($_FILES['fileOptionD']['name']) ? img_upload('fileOptionD') : ''; $sql = "SELECT qid FROM ".DB_DAEMDB.".".TB_SUFFIX."qb_question_info WHERE qid = '".$qid."'"; $check = $db->query_first($sql); if (!empty($check['qid']) && $check['qid'] > 0) { echo json_encode(array('sign'=>'0','content'=>'该试题编号已存在，原因可能如下：1.操作频繁  2.系统错误 3.非法操作 ；您应尝试返回重新提交，如问题仍未能解决请联系管理员解决！'));die; } else { $sql = "INSERT INTO ".DB_DAEMDB.".".TB_SUFFIX."qb_question_info
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
						
						subject_type = '".$subject_type."',
						
						proof_status = '".$proofStatus."',
						 
						create_time = '".DAEM_TIME."',
						last_editor = '".$_SESSION['UserName']."',
						last_update_time = '".DAEM_TIME."'"; $query = $db->query($sql); if (!$query) { echo json_encode(array('sign'=>'0','content'=>'添加题目失败'));die; } else { echo '添加成功';die; } } } } else echo json_encode(array('sign'=>'0','content'=>'缺少必要的参数，请认真填写！'));die; } function img_upload($seed) { if ((($_FILES[$seed]['type'] == 'image/gif') || ($_FILES[$seed]['type'] == 'image/jpeg') || ($_FILES[$seed]['type'] == 'image/png') || ($_FILES[$seed]['type'] == 'image/pjpeg')) && ($_FILES[$seed]['size'] < 100000)){ if ($_FILES[$seed]['error'] > 0) { } else { $icon_upload_path = '../../data/upload/question_bank/qst_img_'.date('Ym'); if (!file_exists($icon_upload_path)) { $mkSign = mkdir($icon_upload_path,0600); } if (!is_writable($mkSign)) { $writeSign = chmod($mkSign, 0600); } $encryptFileName = md5(time().$_FILES[$seed]['name']).'.png'; $filePath = $icon_upload_path.'/'.$encryptFileName; if (file_exists($filePath)) { } else { move_uploaded_file($_FILES[$seed]['tmp_name'],$filePath); return $filePath; } } } else { } } 
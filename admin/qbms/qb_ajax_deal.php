<?php
 define('IN_DAEM', true); include '../includes/init.php'; $type = $_POST['type']; if ($type == 'select') { $pid = $_POST['pid']; $qid = $_POST['qid']; if (!empty($pid) && !empty($qid)) { $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."qb_question_info a,".DB_DAEMDB.".".TB_SUFFIX."qb_paper_question_relationship b 
				where a.qid = '".$qid."' and b.pid = '".$pid."' and a.qid = b.qid"; $result = $db->query_first($sql); echo json_encode($result);die; } } elseif ($type == 'paper_process') { process_paper_ajax_require(); } elseif ($type == 'question_process') { process_question_ajax_require(); } elseif ($type == 'question_remove') { process_remove_question_ajax_require(); } function process_paper_ajax_require() { global $db,$DefineSubjectType; $title = $_REQUEST['title']; $province = $_POST['province']; $city = $_POST['city']; $area = $_POST['area']; $grade = $_POST['grade']; $subject_type = $_POST['subject_type']; $term = $_POST['term']; $textbook_version = $_POST['textbook_version']; $school = $_POST['school']; $p_degree = $_POST['p_degree']; $author = $_POST['author']; $year = $_POST['year']; $test_time = $_POST['test_time']; $total_score = $_POST['total_score']; $detail = !empty($_POST['myEditor']) ? $_REQUEST['myEditor'] : ''; $create_time = DAEM_TIME; $editor = $_SESSION['UserName']; if (!empty($title) && !empty($province) && !empty($city) && !empty($area) && !empty($grade) && !empty($subject_type) && !empty($term) && !empty($textbook_version) && !empty($school) && !empty($year) && !empty($editor) ) { if (!empty($_POST['pid'])) { $pid = $_POST['pid']; $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."qb_paper_info where pid = '".$pid."' limit 1"; $result = $db->query_first($sql); if (empty($result['pid'])) { echo json_encode(array('sign'=>'0','content'=>'未能找到该记录'));die; } $sql = "UPDATE ".DB_DAEMDB.".".TB_SUFFIX."qb_paper_info
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
					where pid = '".$pid."'"; $query = $db->query($sql); if (!$query) { echo json_encode(array('sign'=>'0','content'=>'更新失败!'));die; } } else { $pid = $school."_".DAEM_TIME; $sql = "SELECT pid FROM ".DB_DAEMDB.".".TB_SUFFIX."qb_paper_info WHERE pid = '".$pid."'"; $check = $db->query_first($sql); if (!empty($check['pid']) && $check['pid'] > 0) { $content = '该试卷记录编号已存在，原因可能如下：1.操作频繁  2.系统错误 3.非法操作 ；您应尝试返回重新提交，如问题仍未能解决请联系管理员解决！'; echo json_encode(array('sign'=>'0','content'=>$content));die; } else { $sql = "INSERT INTO ".DB_DAEMDB.".".TB_SUFFIX."qb_paper_info
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
						last_update_time = '".DAEM_TIME."'"; $query = $db->query($sql); if (!$query) { $content = '该试卷记录编号已存在，原因可能如下：1.操作频繁  2.系统错误 3.非法操作 ；您应尝试返回重新提交，如问题仍未能解决请联系管理员解决！'; echo json_encode(array('sign'=>'0','content'=>$content));die; } } } $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."qb_paper_info WHERE pid = '".$pid."'"; $result = $db->query_first($sql); $content = "<div id=\"paper-title\">".$result['title']."<br />".$DefineSubjectType[$result['subject_type']]."试卷</div>
					<div id=\"paper-header-attribute\">
	  					<div>完成时间：".$result['test_time']."分钟</div>
						<div>总分：".$result['total_score']."分</div>
					</div>"; echo json_encode(array('sign'=>'1','content'=>$content,'pid'=>$pid));die; } else echo json_encode(array('sign'=>'0','content'=>'缺少必要的参数，请认真填写！'));die; } function process_remove_question_ajax_require() { global $db; $pid = $_POST['pid']; $qid = $_POST['qid']; if (!empty($pid) && !empty($qid)) { $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."qb_question_info where qid = '".$qid."' limit 1"; $result = $db->query_first($sql); if (empty($result['qid'])) { echo json_encode(array('sign'=>'0','content'=>'未能找到该记录'));die; } $sql = "delete from ".DB_DAEMDB.".".TB_SUFFIX."qb_paper_question_relationship 
				where pid = '".$pid."' and qid = '".$qid."' limit 1"; $query = $db->query($sql); if (!query) { echo json_encode(array('sign'=>'0','content'=>'处理试卷的试题回收失败!'));die; } get_paper_content($pid); } else echo json_encode(array('sign'=>'0','content'=>'缺少必要的参数，请认真填写！'));die; } function process_question_ajax_require() { global $db,$DefineSubjectType,$DefineNumZhnAry,$DefineQuestionTypeAry; $q_degree = $_POST['q_degree']; $chapter = $_POST['chapter']; $question_type = $_POST['question_type']; $q_index = str_replace(array('，',',','；'), ';', trim($_POST['q_index'])); $score = $_POST['score']; $order_seed = $_POST['order_seed']; $question_content = !empty($_POST['myEditor1']) ? $_REQUEST['myEditor1'] : ''; $optionA = $_POST['optionA']; $optionB = $_POST['optionB']; $optionC = $_POST['optionC']; $optionD = $_POST['optionD']; $right_answer = $_POST['right_answer']; $answer_analyze = !empty($_POST['myEditor2']) ? $_REQUEST['myEditor2'] : ''; $subject_type = $_POST['subject_type']; $grade = $_POST['grade']; $term = $_POST['term']; $author = $_POST['author']; $pid = $_POST['pid']; $editor = $_SESSION['UserName']; if (!empty($q_degree) && !empty($chapter) && !empty($question_type) && !empty($editor) && !empty($question_content) && !empty($right_answer) && !empty($score) && !empty($order_seed)) { if (!empty($_POST['qid'])) { $qid = $_POST['qid']; $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."qb_question_info where qid = '".$qid."' limit 1"; $result = $db->query_first($sql); if (empty($result['qid'])) { echo json_encode(array('sign'=>'0','content'=>'未能找到该记录'));die; } $questionImgPath = !empty($_FILES['fileQst']['name']) ? img_upload('fileQst') : $result['question_img_path']; $optionImgPathA = !empty($_FILES['fileOptionA']['name']) ? img_upload('fileOptionA') : $result['a_option_img_path']; $optionImgPathB = !empty($_FILES['fileOptionB']['name']) ? img_upload('fileOptionB') : $result['b_option_img_path']; $optionImgPathC = !empty($_FILES['fileOptionC']['name']) ? img_upload('fileOptionC') : $result['c_option_img_path']; $optionImgPathD = !empty($_FILES['fileOptionD']['name']) ? img_upload('fileOptionD') : $result['d_option_img_path']; $sql = "UPDATE ".DB_DAEMDB.".".TB_SUFFIX."qb_question_info
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
					where qid = '".$qid."'"; $query = $db->query($sql); if (!$query) { echo json_encode(array('sign'=>'0','content'=>'修改试题失败'));die; } $sql = "update ".DB_DAEMDB.".".TB_SUFFIX."qb_paper_question_relationship 
					set score = '".$score."',order_seed = '".$order_seed."',
					last_update_time = '".DAEM_TIME."' 
					where pid = '".$pid."' and qid = '".$qid."'"; $query = $db->query($sql); if (!query) { echo json_encode(array('sign'=>'0','content'=>'修改试卷的关联属性失败!'));die; } } else { $qid = $subject_type."_".$grade."_".$term."_".DAEM_TIME; $questionImgPath = !empty($_FILES['fileQst']['name']) ? img_upload('fileQst') : ''; $optionImgPathA = !empty($_FILES['fileOptionA']['name']) ? img_upload('fileOptionA') : ''; $optionImgPathB = !empty($_FILES['fileOptionB']['name']) ? img_upload('fileOptionB') : ''; $optionImgPathC = !empty($_FILES['fileOptionC']['name']) ? img_upload('fileOptionC') : ''; $optionImgPathD = !empty($_FILES['fileOptionD']['name']) ? img_upload('fileOptionD') : ''; $sql = "SELECT qid FROM ".DB_DAEMDB.".".TB_SUFFIX."qb_question_info WHERE qid = '".$qid."'"; $check = $db->query_first($sql); if (!empty($check['qid']) && $check['qid'] > 0) { echo json_encode(array('sign'=>'0','content'=>'该试题编号已存在，原因可能如下：1.操作频繁  2.系统错误 3.非法操作 ；您应尝试返回重新提交，如问题仍未能解决请联系管理员解决！'));die; } else { $sql = "INSERT INTO ".DB_DAEMDB.".".TB_SUFFIX."qb_question_info
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
						last_update_time = '".DAEM_TIME."'"; $query = $db->query($sql); if (!$query) { echo json_encode(array('sign'=>'0','content'=>'添加题目失败'));die; } } $sql = "INSERT INTO ".DB_DAEMDB.".".TB_SUFFIX."qb_paper_question_relationship
					set pid = '".$pid."',qid = '".$qid."',score = '".$score."',order_seed = '".$order_seed."',
					create_time = '".DAEM_TIME."',last_update_time = '".DAEM_TIME."'"; $query = $db->query($sql); if (!$query) { echo json_encode(array('sign'=>'0','content'=>'写入关联数据表失败'));die; } } get_paper_content($pid); } else echo json_encode(array('sign'=>'0','content'=>'缺少必要的参数，请认真填写！'));die; } function get_paper_content($pid) { global $db,$DefineSubjectType,$DefineNumZhnAry,$DefineQuestionTypeAry; $dataAry = $questionTypeAry = array(); $i=1; $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."qb_paper_question_relationship a,".DB_DAEMDB.".".TB_SUFFIX."qb_question_info b 
			where a.pid = '".$pid."' and a.qid = b.qid
			order by order_seed"; $query = $db->query($sql); while ($row = $db->fetch_array($query)) { $dataAry[$row['qid']] = $row; if ($i==1) { $questionTypeAry[$i][$row['question_type']]['qid'][] = $row['qid']; $questionTypeAry[$i][$row['question_type']]['totalScore'] += $row['score']; $lastQuestionType = $row['question_type']; $i++; } else { if ($row['question_type'] != $lastQuestionType) { $questionTypeAry[$i][$row['question_type']]['qid'][] = $row['qid']; $questionTypeAry[$i][$row['question_type']]['totalScore'] += $row['score']; $lastQuestionType = $row['question_type']; $i++; } else { $questionTypeAry[$i-1][$row['question_type']]['qid'][] = $row['qid']; $questionTypeAry[$i-1][$row['question_type']]['totalScore'] += $row['score']; } } } $content = ''; $iCount=1; foreach ($questionTypeAry as $qTypeSeedKey=>$depth1Ary) { foreach ($depth1Ary as $qTypeKey=>$depth2Ary) { $content .= "<div id=\"paper-question-type\">
							".$DefineNumZhnAry[$qTypeSeedKey].".".$DefineQuestionTypeAry[$qTypeKey]."
							(".count($questionTypeAry[$qTypeSeedKey][$qTypeKey]['qid'])."小题，共".$questionTypeAry[$qTypeSeedKey][$qTypeKey]['totalScore']."分)
						</div>"; if (!empty($questionTypeAry[$qTypeSeedKey][$qTypeKey]['qid'])) { foreach ($questionTypeAry[$qTypeSeedKey][$qTypeKey]['qid'] as $key=>$val) { $content .= "<div id=\"paper-question-content\">
								".$iCount."<a onclick=\"update_question_info('".$pid."','".$val."');\">(校正)</a>.".$dataAry[$val]['question_content']; if (!empty($dataAry[$val]['question_img_path'])) { $content .= "<div id=\"paper-question-img\">
							  			<img align=\"right\" src='".$dataAry[$val]['question_img_path']."'></img>
							  		</div>"; } if (!empty($dataAry[$val]['optionA'])) { $content .= "<div id=\"paper-question-answer\">A.".$dataAry[$val]['optionA']."</div>"; if (!empty($dataAry[$val]['a_option_img_path'])) { $content .= "<div id=\"paper-question-img\">
								  			<img align=\"right\" src='".$dataAry[$val]['a_option_img_path']."'></img>
								  		</div>"; } } if (!empty($dataAry[$val]['optionB'])) { $content .= "<div id=\"paper-question-answer\">B.".$dataAry[$val]['optionB']."</div>"; if (!empty($dataAry[$val]['b_option_img_path'])) { $content .= "<div id=\"paper-question-img\">
								  			<img align=\"right\" src='".$dataAry[$val]['b_option_img_path']."'></img>
								  		</div>"; } } if (!empty($dataAry[$val]['optionC'])) { $content .= "<div id=\"paper-question-answer\">C.".$dataAry[$val]['optionC']."</div>"; if (!empty($dataAry[$val]['c_option_img_path'])) { $content .= "<div id=\"paper-question-img\">
								  			<img align=\"right\" src='".$dataAry[$val]['c_option_img_path']."'></img>
								  		</div>"; } } if (!empty($dataAry[$val]['optionD'])) { $content .= "<div id=\"paper-question-answer\">D.".$dataAry[$val]['optionD']."</div>"; if (!empty($dataAry[$val]['d_option_img_path'])) { $content .= "<div id=\"paper-question-img\">
								  			<img align=\"right\" src='".$dataAry[$val]['d_option_img_path']."'></img>
								  		</div>"; } } $content .= "</div>"; $content .= "<div id=\"paper-answer-content\" class='paper-answer-content-".$iCount."'>
									正确答案：".$dataAry[$val]['right_answer']; if (!empty($dataAry[$val]['answer_analyze'])) { $content .= "<div id=\"paper-answer-analysis\">
							  			".$dataAry[$val]['answer_analyze']."
							  		</div>"; } $content .= "</div>"; $iCount++; } } } } echo $content;die; } function img_upload($seed) { if ((($_FILES[$seed]['type'] == 'image/gif') || ($_FILES[$seed]['type'] == 'image/jpeg') || ($_FILES[$seed]['type'] == 'image/png') || ($_FILES[$seed]['type'] == 'image/pjpeg')) && ($_FILES[$seed]['size'] < 100000)){ if ($_FILES[$seed]['error'] > 0) { } else { $icon_upload_path = '../images/question_bank/upload/qst_img_'.date('Ym'); if (!file_exists($icon_upload_path)) { $mkSign = mkdir($icon_upload_path,0600); } if (!is_writable($mkSign)) { $writeSign = chmod($mkSign, 0600); } $encryptFileName = md5(time().$_FILES[$seed]['name']).'.png'; $filePath = $icon_upload_path.'/'.$encryptFileName; if (file_exists($filePath)) { } else { move_uploaded_file($_FILES[$seed]['tmp_name'],$filePath); return $filePath; } } } else { } } 
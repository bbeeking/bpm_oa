<?php
 define('IN_DAEM', true); include '../includes/init.php'; include DAEM_CONFIG_ROOT."cdnConfig.php"; $isOpenCdn = TRUE; $userAry = get_user_realname(); $userName = $_SESSION['UserName']; $editor = $userName; if (!empty($_GET['qid'])) { $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."qb_question_info where qid = '".$_GET['qid']."'"; $result = $db->query_first($sql); } $questionAry = array(); $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."qb_question_info where question_type = 'ocq' and proof_status = '0' order by create_time desc limit 10"; $query = $db->query($sql); while ($row = $db->fetch_array($query)) { if ($isOpenCdn) { $row['question_img_path'] = str_replace('../../data/upload/question_bank/qst_img_201406/math/', CDN_PATH, $row['question_img_path']); $row['a_option_img_path'] = str_replace('../../data/upload/question_bank/qst_img_201406/math/', CDN_PATH, $row['a_option_img_path']); $row['b_option_img_path'] = str_replace('../../data/upload/question_bank/qst_img_201406/math/', CDN_PATH, $row['b_option_img_path']); $row['c_option_img_path'] = str_replace('../../data/upload/question_bank/qst_img_201406/math/', CDN_PATH, $row['c_option_img_path']); $row['d_option_img_path'] = str_replace('../../data/upload/question_bank/qst_img_201406/math/', CDN_PATH, $row['d_option_img_path']); } $questionAry[] = $row; } include template();
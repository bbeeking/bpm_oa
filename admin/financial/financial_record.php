<?php
 define('IN_DAEM', true); include '../includes/init.php'; $userAry = get_user_realname(); $userName = $_SESSION['UserName']; $content = $DefaultFinancialRecordContent; $appDate = date('Y-m-d'); $time = time(); if (!empty($_GET['submit'])) { $inorOut = !empty($_GET['inorOut'])? $_GET['inorOut'] : ''; $proposer = !empty($_GET['proposer'])? $_GET['proposer'] : ''; if ($inorOut == '1') { $appType = !empty($_GET['appIncomeType'])? $_GET['appIncomeType'] : ''; } elseif ($inorOut == '2') { $appType = !empty($_GET['appExpenseType'])? $_GET['appExpenseType'] : ''; } $appDate = !empty($_GET['application_date'])? $_GET['application_date'] : ''; $title = !empty($_GET['title'])? htmlspecialchars(trim($_GET['title'])) : ''; $amount = !empty($_GET['amount'])? $_GET['amount'] : ''; $content = !empty($_GET['myEditor']) ? $_REQUEST['myEditor'] : ''; if (!empty($inorOut) && !empty($proposer) && !empty($appType) && !empty($appDate) && !empty($title) && !empty($amount) && !empty($content)) { $recordPrimaryId = $time.$inorOut.(int)$amount.$appType; $sql = "SELECT detail_record FROM ".DB_DAEMDB.".".TB_SUFFIX."f_detail_record WHERE detail_record = '".$recordPrimaryId."'"; $check = $db->query_first($sql); if (!empty($check['detail_record']) && $check['detail_record'] > 0) { gourl('该收支明细记录编号已存在，原因可能如下：1.操作频繁  2.系统错误 3.非法操作 ；您应尝试返回重新提交，如问题仍未能解决请联系管理员解决！', '', -1); } else { if ($inorOut == '1') { $sql = "INSERT INTO ".DB_DAEMDB.".".TB_SUFFIX."f_detail_record
					SET detail_record = '".$recordPrimaryId."',
					type = '".$appType."',
					title = '".$title."',
					detail = '".$content."',
					proposer = '".$proposer."',
					amount = '".$amount."',
					inorOut = '".$inorOut."',
					application_date = '".$appDate."',
					status = '1',
					create_time = '".$time."'"; } elseif ($inorOut == '2') { $sql = "INSERT INTO ".DB_DAEMDB.".".TB_SUFFIX."f_detail_record
					SET detail_record = '".$recordPrimaryId."',
					type = '".$appType."',
					title = '".$title."',
					detail = '".$content."',
					proposer = '".$proposer."',
					amount = '".$amount."',
					inorOut = '".$inorOut."',
					application_date = '".$appDate."',
					status = '1',
					create_time = '".$time."'"; } $query = $db->query($sql); if ($query) { gourl('添加成功','financial_stat.php'); } else { gourl('添加失败','', -1); } } } else { gourl('请填写所需内容','',-1); } } include template();
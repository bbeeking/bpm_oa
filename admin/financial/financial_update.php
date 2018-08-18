<?php  define('IN_DAEM', true); include '../includes/init.php'; $id = $_GET['id']; $status = $_GET['status']; if (!empty($_GET['commit']) && !empty($id)) { $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."f_detail_record where id = '".$id."' limit 1"; $result = $db->query_first($sql); if (empty($result['id'])) { gourl('未能找到该记录', '', -1); } if (!empty($result['status']) && $result['status'] != '1') { gourl('该记录已审批', 'financial_stat.php'); } $appType = !empty($_GET['appType'])? $_GET['appType'] : ''; $title = !empty($_GET['title'])? htmlspecialchars(trim($_GET['title'])) : ''; $amount = !empty($_GET['amount'])? $_GET['amount'] : ''; $proposer = !empty($_GET['proposer'])? $_GET['proposer'] : ''; $appDate = !empty($_GET['application_date'])? $_GET['application_date'] : date('Y-m-d'); $content = !empty($_GET['myEditor']) ? $_REQUEST['myEditor'] : ''; if (!empty($appType) && !empty($title) && !empty($amount)) { if ($_GET['inorOut'] == '2') { $sql = "update ".DB_DAEMDB.".".TB_SUFFIX."f_detail_record 
				set type = '".$appType."',
				title = '".$title."',
				amount = '".$amount."',
				application_date = '".$appDate."',
				detail = '".$content."',
				proposer = '".$proposer."'
				where id = '".$id."'"; } else { $sql = "update ".DB_DAEMDB.".".TB_SUFFIX."f_detail_record 
				set type = '".$appType."',
				title = '".$title."',
				amount = '".$amount."',
				application_date = '".$appDate."',
				detail = '".$content."'
				where id = '".$id."'"; } $query = $db->query($sql); if ($query) { gourl('修改成功','',-1); } else { gourl('修改失败','', -1); } } else { gourl('请填写所需内容','',-1); } } elseif (!empty($id) && !empty($status)) { if (isset($appStateAry[$status])) { $sql = "select id from ".DB_DAEMDB.".".TB_SUFFIX."f_detail_record where id = '".$id."'"; $result = $db->query_first($sql); if ($result['id'] > 0) { $sql = "update ".DB_DAEMDB.".".TB_SUFFIX."f_detail_record 
					set status = '".$status."',
					approver = '".$_SESSION['UserName']."',
					approval_date = '".date('Y-m-d')."'
					where id = '".$id."'"; if ($db->query($sql)) { gourl('更新成功', '', -1); } else { gourl('更新失败，请联系管理员', '', -1); } } else { gourl('该记录不存在', '', -1); } } else { gourl('未能识别的操作', '', -1); } } else { gourl('访问非法', '', -1); }
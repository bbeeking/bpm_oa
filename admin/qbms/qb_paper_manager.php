<?php
 define('IN_DAEM', true); include '../includes/init.php'; $userAry = get_user_realname(); $startDate = !empty($_GET['startDate']) ? $_GET['startDate'] : date('Y-m-01'); $endDate = !empty($_GET['endDate'])? $_GET['endDate'] : date('Y-m-d'); $_GET['keyword'] = trim($_GET['keyword']); $keyword = !empty($_GET['keyword']) ? $_GET['keyword'] : ''; $page = $db->Get('page',1); $pageSize = $db->Get('pageSize',20); $offset = ($page-1)*$pageSize; $cond = ''; if (!empty($keyword)) { $cond .= " and title like '%".$keyword."%' or detail like '%".$keyword."%'"; } $sql = "SELECT * FROM ".DB_DAEMDB.".".TB_SUFFIX."qb_paper_info where 1=1 ".$cond." order by create_time desc limit ".$offset.",".$pageSize; $result = $db->query($sql); $dataAry = array(); while ($rows = $db->fetch_array($result)) { $dataAry[] = $rows; } $sSql = "select count(*) as total from ".DB_DAEMDB.".".TB_SUFFIX."qb_paper_info where 1=1 ".$cond; $row = $db->query_first($sSql); $total = $row['total']; $sUrl = "?keyword=$keyword&"; $pagehtml = showpage($page,$pageSize,$total,$sUrl); include template();
<?php
 define('IN_DAEM', true); require(dirname(__FILE__) . '/includes/init.php'); require (dirname(__FILE__) . '/includes/define_template.php'); require (dirname(__FILE__) . '/includes/product.func.php'); $menuDataAry = array(); if ($_SESSION['UserGroup'] != 1) { $sql = "select m.* from ".DB_DAEMDB.".".TB_SUFFIX."db_menu m,".DB_DAEMDB.".".TB_SUFFIX."db_purview p
				where m_id=p_rid and p_gid='".$_SESSION['UserGroup']."' and m_isview='1' UNION select m.* from ".DB_DAEMDB.".".TB_SUFFIX."db_menu m,".DB_DAEMDB.".".TB_SUFFIX."db_purview p
				where m_isview='2'
				order by m_locality asc"; } else { $sql="select * from ".DB_DAEMDB.".".TB_SUFFIX."db_menu where (m_isview='1') or (m_isview='2')order by m_locality asc"; } $query = $db->query($sql); while ($row = $db->fetch_array($query)) { $menuDataAry[$row['m_id']] = $row; } $parentMenuAry = array(); foreach ($menuDataAry as $key=>$val) { if ($val['m_parentid'] == '0') { $parentMenuAry[$val['m_id']] = $val['m_id']; } } $dataAry = array(); foreach ($parentMenuAry as $key=>$val) { foreach ($menuDataAry as $kk=>$vv) { if ($vv['m_parentid'] == $val) { $dataAry[$val][] = $vv['m_id']; } } } $menuDataInfo = array(); $menuDataInfo = get_infinite_classify_by_permission('0'); include template('','sidebar_2'); 
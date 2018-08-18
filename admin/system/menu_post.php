<?php
 define('IN_DAEM', true); include_once '../includes/init.php'; $type = $_GET['type']; $mid = ceil($_POST['mid']); $parentid = $_POST['parentid']; $menuname = (trim($_POST['menuname'])); $menulink = (trim($_POST['menulink'])); $locality = ceil(trim($_POST['locality'])); $moduleSign = trim($_POST['moduleSign']); $icon = trim($_POST['icon']); $isview = $_POST['isview']; if ($type == 'add') { if ($parentid == '' || $menuname == '' || $menulink == '' || $moduleSign == '') { $db->close(); gourl('缺少关键参数。','',-1); } $level = get_node_level($parentid); $sql = "insert into ".DB_DAEMDB.".".TB_SUFFIX."db_menu
			set m_id = '".DAEM_TIME."',
			m_parentid = '".$parentid."',
			m_name = '".$menuname."',
			m_url = '".$menulink."',
			m_locality = '".$locality."',
			module_sign = '".$moduleSign."',
			icon = '".$icon."',
			m_isview = '".$isview."',
			`level` = '".$level."'"; $query = $db->query($sql); if($query) { gourl('添加成功。','menu_list.php'); } else { print_r($query);die; gourl('添加失败','',-1); } } else { if ($mid < 1 || $parentid == '' || $menuname == '' || $menulink == '' || $moduleSign == '') { $db->close(); gourl('缺少关键参数。','',-1); } if ($parentid != '0') { $sql1 = "select m_id from ".DB_DAEMDB.".".TB_SUFFIX."db_menu where m_parentid='".$mid."'"; if ($db->query_first($sql1)) { $db->close(); gourl($sql1.'对不起，该菜单下存在子菜单，不能设置为非顶级菜单，如果您确定要设置为非顶级菜单，请先删除其子菜单。','',-1); } } $level = get_node_level($parentid); $sql = "update ".DB_DAEMDB.".".TB_SUFFIX."db_menu
			set m_parentid='".$parentid."',
			m_name='".$menuname."',
			m_url='".$menulink."',
			m_locality='".$locality."',
			module_sign = '".$moduleSign."',
			icon = '".$icon."',
			m_isview='".$isview."',
			`level` = '".$level."'
			where m_id='".$mid."'"; $query = $db->query($sql); if($query) { gourl('修改成功。','menu_list.php'); } else gourl('修改失败','',-1); } function get_node_level($parentid) { global $db; if($parentid != '0') { $sql = "select level from ".DB_DAEMDB.".".TB_SUFFIX."db_menu where m_id='".$parentid."'"; $result = $db->query_first($sql); return $result['level']+1; } else { return 0; } }
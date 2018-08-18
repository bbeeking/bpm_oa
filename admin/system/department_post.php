<?php
 define('IN_DAEM', true); include_once '../includes/init.php'; $id = ceil($_POST['id']); $name = trim($_POST['name']); $parentId = empty($_POST['parent_id']) ? 0 : trim($_POST['parent_id']); $description = trim($_POST['description']); $leader = trim($_POST['leader']); if ($id > 0) { if ($name == '' || $description == '') { $db->close(); gourl('缺少关键参数。','',-1); } $sql = "update ".DB_DAEMDB.".".TB_SUFFIX."db_department
			set name= '".$name."',
			parent_id = '".$parentId."',
			description='".$description."',
			leader='".$leader."'
			where id='".$id."'"; $db->query($sql); writerecord($_SESSION['UserId'],'修改部门！',$name); $db->close(); gourl('部门修改成功。','department_list.php'); } else { if ($name == '' || $description == '') { $db->close(); gourl('缺少关键参数。','',-1); } $sql = "insert into ".DB_DAEMDB.".".TB_SUFFIX."db_department(name,parent_id,description,leader)
			value('".$name."','".$parentId."','".$description."','".$leader."')"; $db->query($sql); writerecord($_SESSION['UserId'],'添加部门！',$name); $db->close(); gourl('部门添加成功。','department_list.php'); } 
<?php
 function ShowProject() { global $db; $sql = "select pid,project_name,color from ".DB_DAEMDB.".".TB_SUFFIX."task_project where parent_pid='0'"; $result = $db->query($sql); while ($rows = $db->fetch_array($result)) { $array['pid'] = $rows['pid']; $array['project_name'] = L($rows['project_name']); $array['color'] = $rows['color']; $arrays[] = $array; } return $arrays; } function get_project_info($status='n') { global $db; $cond = ''; if($status == 'y') { $cond .= " and status != '5'"; } $dataAry = array(); $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."task_project where 1=1 ".$cond; $query = $db->query($sql); while ($row = $db->fetch_array($query)) { $dataAry[$row['pid']] = $row['project_name']; } return $dataAry; } function get_project_detail() { global $db; $dataAry = array(); $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."task_project"; $query = $db->query($sql); while ($row = $db->fetch_array($query)) { $dataAry[$row['pid']] = $row; } return $dataAry; }
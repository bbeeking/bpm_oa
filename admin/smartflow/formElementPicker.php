<?php
 define('IN_DAEM', true); include '../includes/init.php'; $tagName = $_GET["name"]; $tableId = $_GET["tableId"]; $cond = ""; if($tableId>0) { $cond .= " and id = '".$tableId."'"; } $dataAry = $tmpAry = $nameToSignAry = array(); $sql = "select * from excel_template_struct where 1=1 ".$cond; $query = $db->query($sql); while($row = $db->fetch_array($query)) { $tmpAry[$row["name"]] = json_decode($row["template_struct"],true); $nameToSignAry[$row["name"]] = $row["sign"]; } foreach($tmpAry as $key=>$val) { foreach($val as $kk=>$vv) { foreach($vv as $k=>$v) { if($v["type"] == 'title') continue; $v["name"] = base64_decode($v["name"]); $v["sign"] = $nameToSignAry[$key].'.'.$v["param"]; $dataAry[$key][$v["name"].'('.$v["param"].')'] = $v; } } } include template();
<?php
 define('IN_DAEM', true); include '../includes/init.php'; require_once '../includes/excel/Classes/PHPExcel.php'; require_once "./excelBIConfig.php"; require_once DAEM_CONFIG_ROOT."dictionaryFunc.php"; require_once "../includes/class/pinyin.class.php"; $formElementAry = array(); $sql = "select form_element_sign,name from form_element_defined"; $query = $db->query($sql); while($row = $db->fetch_array($query)) { $formElementAry[$row["form_element_sign"]] = $row["name"]; } $elementPropertyExtraAry = array(); $sql = "select element_property_sign,name from element_property_extra"; $query = $db->query($sql); while($row = $db->fetch_array($query)) { $elementPropertyExtraAry[$row["element_property_sign"]] = $row["name"]; } if($_POST["act"]=="view" ) { $fileBasicPath = file_upload(DAEM_DATA_ROOT."upload"); $filePath = DAEM_PATH."data/upload/".basename($fileBasicPath); if (empty($filePath)) { Gourl("excel上传失败!", "", "-1"); } $dataAry = parse_excel($fileBasicPath); $maxCountNum = innerArrayCount($dataAry)*2; } elseif($_POST["act"]=="edit" ) { $fileBasicPath = $_POST["fileBasicPath"]; if(empty($fileBasicPath)) gourl("未能找到模板文件!","",-1); $tmpFileNameAry = explode(".",$_POST["fileName"]); $fileName = $tmpFileNameAry[0]; if(empty($fileName)) gourl("缺少模板文件名","",-1); $sign = CUtf8_PY::encode($fileName); $dataAry = parse_excel($fileBasicPath); $maxCountNum = innerArrayCount($dataAry)*2; } if($_POST["templateEdit"] == '1') { $fileBasicPath = $_POST["fileBasicPath"]; if(empty($fileBasicPath)) gourl("未能找到模板文件!","",-1); $tmpFileNameAry = explode(".",$_POST["fileName"]); $fileName = empty($_POST["templateName"]) ? $tmpFileNameAry[0] : $_POST["templateName"]; if(empty($fileName)) gourl("缺少模板文件名","",-1); $sign = empty($_POST["templateSign"]) ? CUtf8_PY::encode($fileName) : $_POST["templateSign"]; $dataAry = parse_excel($fileBasicPath); $maxCountNum = innerArrayCount($dataAry)*2; $tableName = "t_".$sign."_data"; foreach($dataAry as $key=>$val) { foreach($val as $k=>$v) { if(isset($_POST[$v["param"]]) && $_POST[$v["param"]] != '') { $dataAry[$key][$k]["type"] = $_POST[$v["param"]]; $dataAry[$key][$k]["property"] = $_POST[$v["param"].'_element_property']; if($dataAry[$key][$k]["type"] == "date") { $dataAry[$key][$k]["value"] = excelTime($dataAry[$key][$k]["value"]); } elseif(isset($elementTypeConfigAry[$dataAry[$key][$k]["type"]])) { $formElement = $_POST[$dataAry[$key][$k]["param"].'_element']; if(!empty($formElement)) { $dataAry[$key][$k]["formElement"] = $_POST[$dataAry[$key][$k]["param"].'_element']; } else { gourl("表单元素未定义，请返回重新选择！","",-1); } } } } } $sql = "select * from excel_template_struct where sign = '".$tableName."'"; $result = $db->query_first($sql); if(!$result["id"]) { $dataAry2 = $dataAry; foreach($dataAry as $key=>$val) { foreach($val as $k=>$v) { $dataAry2[$key][$k]["name"] = base64_encode($dataAry2[$key][$k]["name"]); $dataAry2[$key][$k]["value"] = base64_encode($dataAry2[$key][$k]["value"]); } } $sql = "insert into excel_template_struct
                set sign = '".$tableName."',
                name = '".$fileName."',
                template_struct = '".json_encode($dataAry2)."',
                create_time = '".time()."'"; if(!$db->query($sql)) { gourl("注册模板失败!请返回重试，如果问题仍然存在，请联系管理员!","",-1); } $sql = "CREATE TABLE `".$tableName."` (
                `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '主键id自增',
                `title` varchar(128) NOT NULL COMMENT '档案标题',
                `builder` varchar(64) NOT NULL COMMENT '创建人',
                `approver` varchar(64) NOT NULL COMMENT '审核人',
                `status` int(2) NOT NULL DEFAULT '0' COMMENT '审核状态（1：未审核 2：通过 3：驳回 4：申请取消）',
                `approval_date` varchar(12) NOT NULL DEFAULT '' COMMENT '审核日期 Y-m-d',
                `create_time` int(12) NOT NULL COMMENT '创建日期时间戳格式',"; foreach($dataAry as $key=>$val) { foreach($val as $k=>$v) { $isNeed = ($v["isNeed"] == '1') ? " NOT NULL " : "  DEFAULT 'NULL' "; if(in_array($v["type"],$dataTypeNoDefaultConfig)) $isNeed=""; if(isset($dataTypeToMysqlAry[$v["type"]])) { if(empty($v["param"])) gourl("模板字段不规范无法生成，请返回检查后重新提交!","",-1); $sql .= "`".$v["param"]."` ".$dataTypeToMysqlAry[$v["type"]]." ".$isNeed." COMMENT '".$v["name"]."',"; } } } $sql .= "PRIMARY KEY (`id`)
                ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='EXCEL模板数据记录表'"; if($db->query($sql)) { if($_POST["insertData"] == '0') { gourl("注册模板数据结构成功!","excel_data_form.php?templateSign=".$tableName); } } else { gourl("注册模板失败!请返回重试，如果问题仍然存在，请联系管理员!","",-1); } } else { gourl("已经存在该模板，请直接使用，或返回后重试!","excel_data_form.php?templateSign=".$result["sign"]); } if($_POST["insertData"] == '1') { $insertDataSql = "insert into ".$tableName." set "; foreach($dataAry as $key=>$val) { foreach($val as $k=>$v) { if(($v["isNeed"] == '1') && (trim($v["value"]) == '')) { gourl("模板数据结构注册成功！  ".$v["name"]." 不能为空，请返回填写后直接导入数据!","",-1); } elseif(trim($v["value"]) != '') { $insertDataSql .= $v["param"] . "='" . $v["value"] . "',"; } } } $insertDataSql .= "title = '".$_POST["title"]."',"; $insertDataSql .= "builder = '".$_SESSION["UserName"]."',"; $insertDataSql .= "status = '1',"; $insertDataSql .= "create_time = '".DAEM_TIME."',"; $insertDataSql = rtrim($insertDataSql,","); if($db->query($insertDataSql)) { gourl("导入数据成功!","dataInfoManagement.php?templateSign=".$tableName); } else { gourl("模板数据结构注册成功！    导入数据失败！请检查数据后到数据上传功能中选择该模板重试，如果问题仍然存在，请联系管理员!","",-1); } } } if($_GET["templateDel"] == '1' && $_GET["templateSign"] != "") { $sql = "select * from excel_template_struct where sign = '".$_GET["templateSign"]."'"; $result = $db->query_first($sql); if(!$result["id"]) { gourl("不存在该模板结构，请重新选择!","",-1); } else { $sqlDrop = "drop table if exists ".$_GET["templateSign"]; $db->query($sqlDrop); $sqlDel = "delete from excel_template_struct where id = ".$result["id"]; $res = $db->query($sqlDel); if($res) gourl("删除表结构及数据成功!","excel_data_form.php"); else gourl("操作失败!","excel_data_form.php"); } } function parse_excel($filePath) { $PHPExcel = new PHPExcel(); $PHPReader = new PHPExcel_Reader_Excel2007(); if(!$PHPReader->canRead($filePath)) { $PHPReader = new PHPExcel_Reader_Excel5(); if(!$PHPReader->canRead($filePath)) { echo 'no Excel'; return ; } } $dataString = ""; $PHPExcel = $PHPReader->load($filePath); $currentSheet = $PHPExcel->getSheet(0); $allColumn = $currentSheet->getHighestColumn(); $allRow = $currentSheet->getHighestRow(); for($currentRow = 2;$currentRow <= $allRow;$currentRow++) { for($currentColumn= 'A';$currentColumn<= $allColumn; $currentColumn++) { $val = $currentSheet->getCellByColumnAndRow(ord($currentColumn) - 65,$currentRow)->getValue(); if($currentColumn == 'A') { $dataString .= $val; } else { $dataString .= $val; } } $dataString .= "<br>"; } $dataAry = $checkParamAry = array(); $dataString = cicleReplace("<br><br><br>","<br><br>",$dataString); $dataString = str_replace(array("<br>□","<br>√","<br><br>"),array("<ibr>□","<ibr>√","<obr><br>"),$dataString); $dataStringToArray = explode("<br>",$dataString); foreach($dataStringToArray as $key=>$val) { $val = trim($val); if(empty($val)) continue; $pattern = '/\[(.*)\]/isU'; preg_match_all($pattern, $val, $matchess); $dataValueStr = str_replace($matchess['0'],'[]',$val); $dataValueArray = explode('[]',$dataValueStr); unset($dataValueArray[0]); if(count($matchess['1']) >0) { $step=0; foreach($matchess['1'] as $k=>$v) { $v = trim($v); $seed = parseStringStandardCode($v); $param = in_array(CUtf8_PY::encode($v).$seed,$checkParamAry) ? CUtf8_PY::encode($v).$seed.$key : CUtf8_PY::encode($v).$seed; $checkParamAry[] = $param; $dataAry[$key][$step]["param"] = $param; $dataAry[$key][$step]["name"] = trim($v,'*'); $dataAry[$key][$step]["value"] = $dataValueArray[$step+1]; $dataAry[$key][$step]["type"] = "text"; if(stristr($dataAry[$key][$step]["value"],"<obr>")) { $dataAry[$key][$step]["type"] = "textarea"; $dataAry[$key][$step]["value"] = str_replace("<obr>","",$dataAry[$key][$step]["value"]); } $dataAry[$key][$step]["isNeed"] = 0; if($v[strlen($v)-1] == '*') { $dataAry[$key][$step]["isNeed"] = 1; } $step++; } } else { $seed = parseStringStandardCode($val); $param = in_array(CUtf8_PY::encode($val).$seed,$checkParamAry) ? CUtf8_PY::encode($val).$seed.$key : CUtf8_PY::encode($val).$seed; $checkParamAry[] = $param; $dataAry[$key][0]["param"] = $param; $dataAry[$key][0]["name"] = $val; $dataAry[$key][0]["type"] = "title"; } } return $dataAry; } function GetData($val){ $jd = GregorianToJD(1, 1, 1970); $gregorian = JDToGregorian($jd+intval($val)-25569); return $gregorian; } function cicleReplace($search,$replace,$haystack) { if(empty($search) || empty($haystack)) return $haystack; for($i=0;$i>=0;$i++) { if(stristr($haystack,$search)) { $haystack = str_replace($search,$replace,$haystack); } else break; } return $haystack; } function excelTime($date, $time = false) { if(function_exists('GregorianToJD')){ if (is_numeric( $date )) { $jd = GregorianToJD( 1, 1, 1970 ); $gregorian = JDToGregorian( $jd + intval ( $date ) - 25569 ); $date = explode( '/', $gregorian ); $date_str = str_pad( $date [2], 4, '0', STR_PAD_LEFT ) ."-". str_pad( $date [0], 2, '0', STR_PAD_LEFT ) ."-". str_pad( $date [1], 2, '0', STR_PAD_LEFT ) . ($time ? " 00:00:00" : ''); return $date_str; } }else{ $date=$date>25568?$date+1:25569; $ofs=(70 * 365 + 17+2) * 86400; $date = date("Y-m-d",($date * 86400) - $ofs).($time ? " 00:00:00" : ''); } return $date; } function innerArrayCount($dataAry) { $maxCountNum = 0; foreach($dataAry as $key=>$val) { if(count($val)>$maxCountNum) { $maxCountNum = count($val); } } return $maxCountNum; } if($_POST["act"]=="edit") { include template("hightech","excel_template_edit"); } else { include template(); } 
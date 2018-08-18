<?php
 define('IN_DAEM', true); include '../includes/init.php'; require_once "../hightech/excelBIConfig.php"; include '../includes/process.func.php'; $realNameAry = get_user_realname(); $departmentAdminAry = get_department_admin(); $id = !empty($_GET["id"]) ? $_GET["id"] : ''; $currentLocation = !empty($_GET["currentLocation"]) ? $_GET["currentLocation"] : ''; if(empty($id) || empty($currentLocation))gourl("缺少关键参数!","",-1); $formDataAry = getCaseParamValue($id); $sql = "select a.*,b.process_title,b.config_data,b.node_property_config,b.type,b.debug from case_management a inner join process_management b
            where a.id = '".$id."' and a.process_id = b.id"; $result = $db->query_first($sql); $processJsonData = $result["config_data"]; $processAry = json_decode($processJsonData,true); $nodePropertyConfigJsonData = $result["node_property_config"]; $nodePropertyAry = json_decode($nodePropertyConfigJsonData,true); $caseName = $result["case_name"]; if(check_user_ele_role($nodePropertyAry[$currentLocation]["ele_role"])) { if(empty($nodePropertyAry[$currentLocation]["ele_table"])) { gourl("节点未配置表单或事件触发器等，请返回检查流程配置!","",-1); } $tmpTableId = ""; $tmpTableIdAry = explode(',',$nodePropertyAry[$currentLocation]["ele_table"]); foreach($tmpTableIdAry as $val) { $tmpTableIdAryDepth2 = explode(':',$val); $tmpTableId .= $tmpTableIdAryDepth2[0].","; } $tmpTableId = trim($tmpTableId,','); $resultDataAry = array(); $sql = "select * from excel_template_struct where id IN (".$tmpTableId.")  order by field(id,".$tmpTableId.")"; $query = $db->query($sql); while($row = $db->fetch_array($query)) { $resultDataAry[$row["id"]] = $row; } $templateDataAry = array(); foreach($resultDataAry as $key=>$val) { $templateDataAry[$key] = json_decode($val["template_struct"],true); foreach($templateDataAry[$key] as $kk=>$vv) { foreach($vv as $k=>$v) { $templateDataAry[$key][$kk][$k]["name"] = base64_decode($templateDataAry[$key][$kk][$k]["name"]); $templateDataAry[$key][$kk][$k]["value"] = base64_decode($templateDataAry[$key][$kk][$k]["value"]); if($elementTypeConfigAry[$templateDataAry[$key][$kk][$k]["type"]]) { $sql = "select config_data from form_element_defined where form_element_sign = '".$templateDataAry[$key][$kk][$k]["formElement"]."'"; $result = $db->query_first($sql); $formElementDataAry = unserialize($result["config_data"]); $templateDataAry[$key][$kk][$k]["formElementDataAry"] = $formElementDataAry; } } } } $maxCountNum = 0; foreach($templateDataAry as $val) { $maxCountNum = (innerArrayCount($val)*2 > $maxCountNum) ? innerArrayCount($val)*2 : $maxCountNum; } include template(); } else { gourl("无权限查看该输出结果","",-1); } function findNodeLineList($haystack,$conditionAry=array()) { $nodeArray = array(); foreach($haystack as $key=>$depth1) { foreach($depth1 as $kk=>$vv) { if(isset($conditionAry[$kk]) && $conditionAry[$kk]==$vv) { $nodeArray[$key] = $haystack[$key]; } } } return $nodeArray; } function innerArrayCount($dataAry) { $maxCountNum = 0; foreach($dataAry as $key=>$val) { if(count($val)>$maxCountNum) { $maxCountNum = count($val); } } return $maxCountNum; } function getFlowNextNode($case_attach_id) { global $db; $sql = "select a.*,b.process_id from case_attach a inner join case_management b where a.cid = b.id and  a.id = '".$case_attach_id."'"; $result = $db->query_first($sql); if(empty($result)) return; $sql = "select * from process_management where id = '".$result["process_id"]."'"; $resultProcessInfo = $db->query_first($sql); $processJsonData = $resultProcessInfo["config_data"]; $processAry = json_decode($processJsonData,true); $nodePropertyConfigJsonData = $resultProcessInfo["node_property_config"]; $nodePropertyAry = json_decode($nodePropertyConfigJsonData,true); $nodePropertyGateway = $nodePropertyAry[$result["current_location"]]["ele_gateway"]; $lineA = findNodeLineList($processAry["lines"],array('from'=>$result["current_location"])); $geteWayAry = parseGateway($nodePropertyGateway); $_depositDataAry = json_decode($result["form_data"],true); $nextNodeResult = ''; foreach($geteWayAry as $key=>$val) { if(eval("return $val;")) { $nextNodeResult .= $key.';'; } } $nextNodeResult = trim($nextNodeResult,';'); return $nextNodeResult; } function parseGateway($gatewayString) { $gatewayString = htmlspecialchars_decode($gatewayString); $gatewayString = trim($gatewayString,';'); $dataAry = array(); $tmpGatewayAry = explode(';',$gatewayString); foreach($tmpGatewayAry as $key=>$val) { $tmpAry = explode(':',$val); $tmpAry[1] = '$_depositDataAry[\''.$tmpAry[1]; $tmpAry[1] = str_replace(array("&&","||"),array('\'&&$_depositDataAry[\'','\'||$_depositDataAry[\''),$tmpAry[1]); $tmpAry[1] .= '\''; $tmpAry[1] = str_replace(array("==","!=",">","<",">=","<="),array('\']==\'','\']!=\'','\']>\'','\']<\'','\']>=\'','\']<=\''),$tmpAry[1]); $dataAry[$tmpAry[0]] = $tmpAry[1]; } return $dataAry; } function parseEleTableConfig($ele_table) { $ele_table = htmlspecialchars_decode($ele_table); $dataAry = array(); $tmpEleTableConfigAry = explode(',',$ele_table); foreach($tmpEleTableConfigAry as $val) { $tmpEleTableDepth1 = explode(':',$val); $tmpEleTableDepth2 = explode('&&',$tmpEleTableDepth1[2]); $dataAry[$tmpEleTableDepth1[0]]["type"] = $tmpEleTableDepth1[1]; foreach($tmpEleTableDepth2 as $kk=>$vv) { if(empty($vv)) continue; $dataAry[$tmpEleTableDepth1[0]]["exception"][$vv] = 1; } } return $dataAry; } function checkParamReadonly($tableId,$paramName) { global $nodePropertyAry,$currentLocation; $parseEleTableConfigAry = parseEleTableConfig($nodePropertyAry[$currentLocation]["ele_table"]); if(!isset($parseEleTableConfigAry[$tableId])) return; else { if($parseEleTableConfigAry[$tableId]["type"] == "readonly") { if($parseEleTableConfigAry[$tableId]["exception"][$paramName] == 1) return; else return "readonly=\"readonly\""; } else { if($parseEleTableConfigAry[$tableId]["exception"][$paramName] != 1) return; else return "readonly=\"readonly\""; } } } function getCaseParamValue($caseId) { global $db; if($caseId <= 0) return; $sql = "select form_circulation_sequence from case_management where id = '".$caseId."'"; $result = $db->query_first($sql); $formCirculationSequence = $result["form_circulation_sequence"]; $formDataAry = array(); $sql = "select * from case_attach where id IN (".$formCirculationSequence.")  order by field(id,".$formCirculationSequence.")"; $query = $db->query($sql); while($row = $db->fetch_array($query)) { $tmpFormDataAry = json_decode($row["form_data"],true); foreach($tmpFormDataAry as $key=>$val) { $formDataAry[$key] = $val; } } return $formDataAry; } 
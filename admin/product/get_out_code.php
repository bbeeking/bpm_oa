<?php
 define('IN_DAEM', true); include_once '../includes/init.php'; include_once './product.func.php'; include_once './specialConfig.php'; set_time_limit(0); $date = empty($_GET['date']) ? date('Ymd') : date('Ymd',strtotime($_GET['date'])); $resultStr = ''; for($i=0;$i>=0;$i++) { try { $client = new SoapClient("http://10.2.8.174:8780/BaanWebservice/services/baanGetItemByLcsj?wsdl",array('connection_timeout'=>3600)); $param['in0'] = $i*10000+1; $param['in1'] = ($i+1)*10000; $arrResult2 = $client->getMitmPageByArg($param)->out; if(empty($arrResult2) || $arrResult2 == '无数据' ) { break; } else { $resultStr .= $arrResult2.','; } } catch (SOAPFault $e) { print $e; } } $resultStr = trim($resultStr,','); $resultStr = '['.$resultStr.']'; $checkDataAry = json_decode($resultStr,true); $outDataAry = array(); foreach($checkDataAry as $key=>$val) { $outDataAry[$val['item']] = $val; } $sql = "select * from xcatentry where published != '0'"; $query = $db2->query($sql); $dataAry = array(); while($row = $db2->fetch_array($query)) { foreach($row as $key=>$val) { $row[$key] = iconv('gb2312','utf-8',$val); } if(isset($outDataAry[$row['PARTNUMBER']])) { $dataAry[$row['PARTNUMBER']] = $row; } } include template();
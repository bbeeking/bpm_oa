<?php
 define('IN_DAEM', true); include_once '../includes/init.php'; include_once '../includes/system.func.php'; include_once './product.func.php'; $perPageNum = '200'; $param = $_GET['query']; $catentryStr = ''; $sql = "select DISTINCT CATENTRY_ID from catentryattr c left join attr a on a.attr_id = c.attr_id
        left join attrval av on av.attrval_id = c.attrval_id
        where av.IDENTIFIER like '%".iconv('utf-8','gb2312',$param)."%'"; $query = $db2->query($sql); $j = 0; while($row = $db2->fetch_array($query)) { if($j >= $perPageNum) break; foreach($row as $key=>$val) { $row[$key] = iconv('gb2312','utf-8',$val); } $catentryStr .= "'".$row['CATENTRY_ID']."',"; $j++; } $catentryStr = trim($catentryStr,','); if(!empty($catentryStr)) { $cond = "catentry_id in (".$catentryStr.") or"; } $productTmpInfoAry = array(); $sql = "select * from xcatentry where ".$cond."  BRAND  like '%".iconv('utf-8','gb2312',$param)."%'
        or NAME  like '%".iconv('utf-8','gb2312',$param)."%'
        or TITLE  like '%".iconv('utf-8','gb2312',$param)."%'
        or KEYWORD  like '%".iconv('utf-8','gb2312',$param)."%'
        or TYPE  like '%".iconv('utf-8','gb2312',$param)."%'
        or XPARTNUMBER  like '%".iconv('utf-8','gb2312',$param)."%'"; $query = $db2->query($sql); $i = 0; while($row = $db2->fetch_array($query)) { if($i >= $perPageNum) break; foreach($row as $key=>$val) { $row[$key] = iconv('gb2312','utf-8',$val); } $productTmpInfoAry[$row['CATENTRY_ID']] = $row; $i++; } $countNum = count($productTmpInfoAry); include template(); 
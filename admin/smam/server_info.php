<?php
 define('IN_DAEM', TRUE); $stt = microtime(true); error_reporting(0); @header("content-Type: text/html; charset=utf-8"); ob_start(); define('HTTP_HOST', preg_replace('~^www\.~i', '', $_SERVER['HTTP_HOST'])); $time_start = microtime_float(); function memory_usage() { $memory = ( ! function_exists('memory_get_usage')) ? '0' : round(memory_get_usage()/1024/1024, 2).'MB'; return $memory; } function microtime_float() { $mtime = microtime(); $mtime = explode(' ', $mtime); return $mtime[1] + $mtime[0]; } function show($varName) { switch($result = get_cfg_var($varName)) { case 0: return '<font color="red">不支持</font>'; break; case 1: return '支持'; break; default: return $result; break; } } switch(PHP_OS) { case "Linux": $sysReShow = (false !== ($sysInfo = sys_linux()))?"show":"none"; break; case "FreeBSD": $sysReShow = (false !== ($sysInfo = sys_freebsd()))?"show":"none"; break; case "WINNT": $sysReShow = (false !== ($sysInfo = sys_windows()))?"show":"none"; break; default: break; } function sys_linux() { if (false === ($str = @file("/proc/cpuinfo"))) return false; $str = implode("", $str); @preg_match_all("/model\s+name\s{0,}\:+\s{0,}([\w\s\)\(\@.-]+)([\r\n]+)/s", $str, $model); @preg_match_all("/cpu\s+MHz\s{0,}\:+\s{0,}([\d\.]+)[\r\n]+/", $str, $mhz); @preg_match_all("/cache\s+size\s{0,}\:+\s{0,}([\d\.]+\s{0,}[A-Z]+[\r\n]+)/", $str, $cache); @preg_match_all("/bogomips\s{0,}\:+\s{0,}([\d\.]+)[\r\n]+/", $str, $bogomips); if (false !== is_array($model[1])) { $res['cpu']['num'] = sizeof($model[1]); for($i = 0; $i < $res['cpu']['num']; $i++) { $res['cpu']['model'][] = $model[1][$i]; $res['cpu']['mhz'][] = $mhz[1][$i]; $res['cpu']['cache'][] = $cache[1][$i]; $res['cpu']['bogomips'][] = $bogomips[1][$i]; } if (false !== is_array($res['cpu']['model'])) $res['cpu']['model'] = implode("<br />", $res['cpu']['model']); if (false !== is_array($res['cpu']['mhz'])) $res['cpu']['mhz'] = implode("<br />", $res['cpu']['mhz']); if (false !== is_array($res['cpu']['cache'])) $res['cpu']['cache'] = implode("<br />", $res['cpu']['cache']); if (false !== is_array($res['cpu']['bogomips'])) $res['cpu']['bogomips'] = implode("<br />", $res['cpu']['bogomips']); } if (false === ($str = @file("/proc/uptime"))) return false; $str = explode(" ", implode("", $str)); $str = trim($str[0]); $min = $str / 60; $hours = $min / 60; $days = floor($hours / 24); $hours = floor($hours - ($days * 24)); $min = floor($min - ($days * 60 * 24) - ($hours * 60)); if ($days !== 0) $res['uptime'] = $days."天"; if ($hours !== 0) $res['uptime'] .= $hours."小时"; $res['uptime'] .= $min."分钟"; if (false === ($str = @file("/proc/meminfo"))) return false; $str = implode("", $str); preg_match_all("/MemTotal\s{0,}\:+\s{0,}([\d\.]+).+?MemFree\s{0,}\:+\s{0,}([\d\.]+).+?Cached\s{0,}\:+\s{0,}([\d\.]+).+?SwapTotal\s{0,}\:+\s{0,}([\d\.]+).+?SwapFree\s{0,}\:+\s{0,}([\d\.]+)/s", $str, $buf); $res['memTotal'] = round($buf[1][0]/1024, 2); $res['memFree'] = round($buf[2][0]/1024, 2); $res['memCached'] = round($buf[3][0]/1024, 2); $res['memUsed'] = ($res['memTotal']-$res['memFree']); $res['memPercent'] = (floatval($res['memTotal'])!=0)?round($res['memUsed']/$res['memTotal']*100,2):0; $res['memRealUsed'] = ($res['memTotal'] - $res['memFree'] - $res['memCached']); $res['memRealPercent'] = (floatval($res['memTotal'])!=0)?round($res['memRealUsed']/$res['memTotal']*100,2):0; $res['swapTotal'] = round($buf[4][0]/1024, 2); $res['swapFree'] = round($buf[5][0]/1024, 2); $res['swapUsed'] = ($res['swapTotal']-$res['swapFree']); $res['swapPercent'] = (floatval($res['swapTotal'])!=0)?round($res['swapUsed']/$res['swapTotal']*100,2):0; if (false === ($str = @file("/proc/loadavg"))) return false; $str = explode(" ", implode("", $str)); $str = array_chunk($str, 4); $res['loadAvg'] = implode(" ", $str[0]); return $res; } function sys_freebsd() { if (false === ($res['cpu']['num'] = get_key("hw.ncpu"))) return false; $res['cpu']['model'] = get_key("hw.model"); if (false === ($res['loadAvg'] = get_key("vm.loadavg"))) return false; if (false === ($buf = get_key("kern.boottime"))) return false; $buf = explode(' ', $buf); $sys_ticks = time() - intval($buf[3]); $min = $sys_ticks / 60; $hours = $min / 60; $days = floor($hours / 24); $hours = floor($hours - ($days * 24)); $min = floor($min - ($days * 60 * 24) - ($hours * 60)); if ($days !== 0) $res['uptime'] = $days."天"; if ($hours !== 0) $res['uptime'] .= $hours."小时"; $res['uptime'] .= $min."分钟"; if (false === ($buf = get_key("hw.physmem"))) return false; $res['memTotal'] = round($buf/1024/1024, 2); $str = get_key("vm.vmtotal"); preg_match_all("/\nVirtual Memory[\:\s]*\(Total[\:\s]*([\d]+)K[\,\s]*Active[\:\s]*([\d]+)K\)\n/i", $str, $buff, PREG_SET_ORDER); preg_match_all("/\nReal Memory[\:\s]*\(Total[\:\s]*([\d]+)K[\,\s]*Active[\:\s]*([\d]+)K\)\n/i", $str, $buf, PREG_SET_ORDER); $res['memRealUsed'] = round($buf[0][2]/1024, 2); $res['memCached'] = round($buff[0][2]/1024, 2); $res['memUsed'] = round($buf[0][1]/1024, 2) + $res['memCached']; $res['memFree'] = $res['memTotal'] - $res['memUsed']; $res['memPercent'] = (floatval($res['memTotal'])!=0)?round($res['memUsed']/$res['memTotal']*100,2):0; $res['memRealPercent'] = (floatval($res['memTotal'])!=0)?round($res['memRealUsed']/$res['memTotal']*100,2):0; return $res; } function get_key($keyName) { return do_command('sysctl', "-n $keyName"); } function find_command($commandName) { $path = array('/bin', '/sbin', '/usr/bin', '/usr/sbin', '/usr/local/bin', '/usr/local/sbin'); foreach($path as $p) { if (@is_executable("$p/$commandName")) return "$p/$commandName"; } return false; } function do_command($commandName, $args) { $buffer = ""; if (false === ($command = find_command($commandName))) return false; if ($fp = @popen("$command $args", 'r')) { while (!@feof($fp)){ $buffer .= @fgets($fp, 4096); } return trim($buffer); } return false; } function sys_windows() { if (PHP_VERSION >= 5) { $objLocator = new COM("WbemScripting.SWbemLocator"); $wmi = $objLocator->ConnectServer(); $prop = $wmi->get("Win32_PnPEntity"); } else { return false; } $cpuinfo = GetWMI($wmi,"Win32_Processor", array("Name","L2CacheSize","NumberOfCores")); $res['cpu']['num'] = $cpuinfo[0]['NumberOfCores']; if (null == $res['cpu']['num']) { $res['cpu']['num'] = 1; } for ($i=0;$i<$res['cpu']['num'];$i++){ $res['cpu']['model'] .= $cpuinfo[0]['Name']."<br />"; $res['cpu']['cache'] .= $cpuinfo[0]['L2CacheSize']."<br />"; } $sysinfo = GetWMI($wmi,"Win32_OperatingSystem", array('LastBootUpTime','TotalVisibleMemorySize','FreePhysicalMemory','Caption','CSDVersion','SerialNumber','InstallDate')); $sysinfo[0]['Caption']=iconv('GBK', 'UTF-8',$sysinfo[0]['Caption']); $sysinfo[0]['CSDVersion']=iconv('GBK', 'UTF-8',$sysinfo[0]['CSDVersion']); $res['win_n'] = $sysinfo[0]['Caption']." ".$sysinfo[0]['CSDVersion']." 序列号:{$sysinfo[0]['SerialNumber']} 于".date('Y年m月d日H:i:s',strtotime(substr($sysinfo[0]['InstallDate'],0,14)))."安装"; $res['uptime'] = $sysinfo[0]['LastBootUpTime']; $sys_ticks = 3600*8 + time() - strtotime(substr($res['uptime'],0,14)); $min = $sys_ticks / 60; $hours = $min / 60; $days = floor($hours / 24); $hours = floor($hours - ($days * 24)); $min = floor($min - ($days * 60 * 24) - ($hours * 60)); if ($days !== 0) $res['uptime'] = $days."天"; if ($hours !== 0) $res['uptime'] .= $hours."小时"; $res['uptime'] .= $min."分钟"; $res['memTotal'] = $sysinfo[0]['TotalVisibleMemorySize']; $res['memFree'] = $sysinfo[0]['FreePhysicalMemory']; $res['memUsed'] = $res['memTotal'] - $res['memFree']; $res['memPercent'] = round($res['memUsed'] / $res['memTotal']*100,2); $swapinfo = GetWMI($wmi,"Win32_PageFileUsage", array('AllocatedBaseSize','CurrentUsage')); $loadinfo = GetWMI($wmi,"Win32_Processor", array("LoadPercentage")); $res['loadAvg'] = $loadinfo[0]['LoadPercentage']; return $res; } function GetWMI($wmi,$strClass, $strValue = array()) { $arrData = array(); $objWEBM = $wmi->Get($strClass); $arrProp = $objWEBM->Properties_; $arrWEBMCol = $objWEBM->Instances_(); foreach($arrWEBMCol as $objItem) { @reset($arrProp); $arrInstance = array(); foreach($arrProp as $propItem) { eval("\$value = \$objItem->" . $propItem->Name . ";"); if (empty($strValue)) { $arrInstance[$propItem->Name] = trim($value); } else { if (in_array($propItem->Name, $strValue)) { $arrInstance[$propItem->Name] = trim($value); } } } $arrData[] = $arrInstance; } return $arrData; } function bar($percent) { echo '<div class="bar"><div class="barli" style="width:'.$percent.'%">&nbsp;</div></div>'; } $uptime = $sysInfo['uptime']; $stime = date("Y-n-j H:i:s"); $df = round(@disk_free_space(".")/(1024*1024*1024),3); $mt = $sysInfo['memTotal']; $mu = round($sysInfo['memUsed']/1024,3); $mf = round($sysInfo['memFree']/1024,3); $mc = round($sysInfo['memCached']/1024,3); $st = $sysInfo['swapTotal']; $su = round($sysInfo['swapUsed']/1024,3); $sf = round($sysInfo['swapFree']/1024,3); $swapPercent = $sysInfo['swapPercent']; $load = $sysInfo['loadAvg']; $memRealPercent = $sysInfo['memRealPercent']; $memPercent = $sysInfo['memPercent']; $strs = @file("/proc/net/dev"); for ($i = 2; $i < count($strs); $i++ ) { preg_match_all( "/([^\s]+):[\s]{0,}(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)/", $strs[$i], $info ); $tmo = round($info[2][0]/1024/1024, 5); $tmo2 = round($tmo / 1024, 5); $NetInput[$i] = $tmo2; $tmp = round($info[10][0]/1024/1024, 5); $tmp2 = round($tmp / 1024, 5); $NetOut[$i] = $tmp2; } if ($_GET['act'] == "rt") { $arr=array('title'=>"$title",'freeSpace'=>"$df",'TotalMemory'=>"$mt",'UsedMemory'=>"$mu",'FreeMemory'=>"$mf",'CachedMemory'=>"$mc",'TotalSwap'=>"$st",'swapUsed'=>"$su",'swapFree'=>"$sf",'loadAvg'=>"$load",'uptime'=>"$uptime",'freetime'=>"$freetime",'bjtime'=>"$bjtime",'stime'=>"$stime",'memRealPercent'=>"$memRealPercent",'memPercent'=>"$memPercent%",'swapPercent'=>"$swapPercent",'barmemRealPercent'=>"$memRealPercent%",'barswapPercent'=>"$swapPercent%",'NetOut2'=>"$NetOut[2]",'NetOut3'=>"$NetOut[3]",'NetOut4'=>"$NetOut[4]",'NetOut5'=>"$NetOut[5]",'NetOut6'=>"$NetOut[6]",'NetOut7'=>"$NetOut[7]",'NetOut8'=>"$NetOut[8]",'NetOut9'=>"$NetOut[9]",'NetOut10'=>"$NetOut[10]",'NetInput2'=>"$NetInput[2]",'NetInput3'=>"$NetInput[3]",'NetInput4'=>"$NetInput[4]",'NetInput5'=>"$NetInput[5]",'NetInput6'=>"$NetInput[6]",'NetInput7'=>"$NetInput[7]",'NetInput8'=>"$NetInput[8]",'NetInput9'=>"$NetInput[9]",'NetInput10'=>"$NetInput[10]"); $jarr=json_encode($arr); echo $_GET['callback'],'(',$jarr,')'; exit; } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo WEBTITLE;?></title>
<style type="text/css">
<!--
* {font-family: Tahoma, "Microsoft Yahei", Arial; }
body{text-align: center; margin: 0 auto; padding: 0; background-color:#FFFFFF;font-size:12px;font-family:Tahoma, Arial}
h1 {font-size: 26px; font-weight: normal; padding: 0; margin: 0; color: #444444;}
h1 small {font-size: 11px; font-family: Tahoma; font-weight: bold; }
a{color: #333333; text-decoration:none;}
a.black{color: #000000; text-decoration:none;}
b{color: #999999;}
table{clear:both;padding: 0; margin: 0 0 10px;border-collapse:collapse; border-spacing: 0;}
th{padding: 3px 6px; font-weight:bold;background:#278296;color:#FFFFFF;border:1px solid #278296; text-align:left;}
tr{padding: 0; background:#F7F7F7;}
td{padding: 3px 6px; border:1px solid #CCCCCC;}
input{padding: 2px; background: #FFFFFF; border-top:1px solid #666666; border-left:1px solid #666666; border-right:1px solid #CCCCCC; border-bottom:1px solid #CCCCCC; font-size:12px}
input.btn{font-weight: bold; height: 20px; line-height: 20px; padding: 0 6px; color:#666666; background: #f2f2f2; border:1px solid #999;font-size:12px}
.bar {border:1px solid #999999; background:#FFFFFF; height:5px; font-size:2px; width:60%; margin:2px 0 5px 0;padding:1px;}
.barli{background:#36b52a; height:5px; margin:0px; padding:0;}
#page {width: 920px; padding: 0 20px; margin: 0 auto; text-align: left;}
#header{position: relative; padding: 10px;}
#footer {padding: 15px 0; text-align: center; font-size: 11px; font-family: Tahoma, Verdana;}
#download {position: absolute; top: 20px; right: 10px; text-align: right; font-weight: bold; color: #06C;}
#download a {color: #0000FF; text-decoration: underline;}
.w_small{font-family: Courier New;}
.w_number{color: #f800fe;}
-->
</style>
<script language="JavaScript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>
<script type="text/javascript">
<!--
$(document).ready(function(){getJSONData();});
function getJSONData()
{
	setTimeout("getJSONData()", 1000);
	$.getJSON('?act=rt&callback=?', displayData);
}
function displayData(dataJSON)
{
	$("#title").html(dataJSON.title);
	$("#freeSpace").html(dataJSON.freeSpace);
	$("#TotalMemory").html(dataJSON.TotalMemory);
	$("#UsedMemory").html(dataJSON.UsedMemory);
	$("#FreeMemory").html(dataJSON.FreeMemory);
	$("#CachedMemory").html(dataJSON.CachedMemory);
	$("#TotalSwap").html(dataJSON.TotalSwap);
	$("#swapUsed").html(dataJSON.swapUsed);
	$("#swapFree").html(dataJSON.swapFree);
	$("#swapPercent").html(dataJSON.swapPercent);
	$("#loadAvg").html(dataJSON.loadAvg);
	$("#uptime").html(dataJSON.uptime);
	$("#freetime").html(dataJSON.freetime);
	$("#stime").html(dataJSON.stime);
	$("#bjtime").html(dataJSON.bjtime);
	$("#memRealPercent").html(dataJSON.memRealPercent);
	$("#memPercent").html(dataJSON.memPercent);
	$("#barmemPercent").width(dataJSON.memPercent);
	$("#barmemRealPercent").width(dataJSON.barmemRealPercent);
	$("#barswapPercent").width(dataJSON.barswapPercent);
	$("#NetOut2").html(dataJSON.NetOut2);
	$("#NetOut3").html(dataJSON.NetOut3);
	$("#NetOut4").html(dataJSON.NetOut4);
	$("#NetOut5").html(dataJSON.NetOut5);
	$("#NetOut6").html(dataJSON.NetOut6);
	$("#NetOut7").html(dataJSON.NetOut7);
	$("#NetOut8").html(dataJSON.NetOut8);
	$("#NetOut9").html(dataJSON.NetOut9);
	$("#NetOut10").html(dataJSON.NetOut10);
	$("#NetInput2").html(dataJSON.NetInput2);
	$("#NetInput3").html(dataJSON.NetInput3);
	$("#NetInput4").html(dataJSON.NetInput4);
	$("#NetInput5").html(dataJSON.NetInput5);
	$("#NetInput6").html(dataJSON.NetInput6);
	$("#NetInput7").html(dataJSON.NetInput7);
	$("#NetInput8").html(dataJSON.NetInput8);
	$("#NetInput9").html(dataJSON.NetInput9);
	$("#NetInput10").html(dataJSON.NetInput10);
}
-->
</script>
</head>
<body>
<div id="page">
<!--服务器相关参数-->
<table width="100%" cellpadding="3" cellspacing="0">
  <tr>
    <td colspan="4"></td>
  </tr>
  <tr><th colspan="4">服务器参数</th></tr>
  <tr>
    <td>服务器域名/IP地址</td>
    <td colspan="3"><?php echo @get_current_user();?> - <?php echo $_SERVER['SERVER_NAME'];?>(<?=$_SERVER['SERVER_ADDR'];?>)&nbsp;&nbsp;你的IP地址是：<?php echo @$_SERVER['REMOTE_ADDR'];?></td>
  </tr>
  <tr>
    <td width="13%">服务器时间</td>
    <td width="37%"><span id="stime">0</span></td>
    <td width="13%">可用空间(磁盘区)</td>
    <td width="37%"><font color='#CC0000'><span id="freeSpace">0</span></font>&nbsp;G</td>
  </tr>
  <tr>
    <td>服务器语言</td>
    <td><?php echo getenv("HTTP_ACCEPT_LANGUAGE");?></td>
    <td>系统平均负载</td>
	<td class="w_number"><span id="loadAvg"></span></td>
  </tr>
</table>

<?if("show"==$sysReShow){?>
<table width="100%" cellpadding="3" cellspacing="0" align="center">
  <tr><th colspan="6">服务器CPU及内存相关运行参数</th></tr>
  <tr>
    <td>CPU核数</td>
    <td><?php echo $sysInfo['cpu']['num'];?>&nbsp;</td>
    <td>服务器已运行时间</td>
    <td><span id="uptime">0</span></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>CPU型号</td>
    <td><?php echo $sysInfo['cpu']['model'];?></td>
    <td>CPU二级缓存</td>
    <td><?php echo $sysInfo['cpu']['cache'];?></td>
    <td>系统Bogomips</td>
    <td><?=$sysInfo['cpu']['bogomips']?></td>
  </tr>
	  <tr>
		<td>内存使用状况</td>
		<td colspan="5">
<?php
$tmp = array( 'memTotal', 'memUsed', 'memFree', 'memPercent', 'memCached', 'memRealPercent', 'swapTotal', 'swapUsed', 'swapFree', 'swapPercent' ); foreach ($tmp AS $v) { $sysInfo[$v] = $sysInfo[$v] ? $sysInfo[$v] : 0; } ?>
          物理内存：共
          <font color='#CC0000'><?=round($sysInfo['memTotal']/1024,2)?></font>
          G , 已用
          <font color='#CC0000'><span id="UsedMemory">0</span></font>
          G , 空闲
          <font color='#CC0000'><span id="FreeMemory">0</span></font>
          G, 使用率
		  <span id="memPercent">0</span>
          <div class="bar"><div id="barmemPercent" class="barli" >&nbsp;</div> </div>
          Cache化内存为
          <span id="CachedMemory">0</span>
          G, 真实内存使用率为
          <span id="memRealPercent">0</span>
          %
          <div class="bar"><div id="barmemRealPercent" class="barli" >&nbsp;</div></div>
          SWAP区：共
          <?=round($sysInfo['swapTotal']/1024,2)?>
          G, 已使用
          <span id="swapUsed">0</span>
          G, 空闲
          <span id="swapFree">0</span>
          G, 使用率
          <span id="swapPercent">0</span>
          %
          <div class="bar"><div id="barswapPercent" class="barli" >&nbsp;</div> </div>
	  </td>
	</tr>
</table>
<?}?>

<?php if (false !== ($strs = @file("/proc/net/dev"))) : ?>
<table width="100%" cellpadding="3" cellspacing="0" align="center">
    <tr><th colspan="3">网络使用状况</th></tr>
<?php for ($i = 2; $i < count($strs); $i++ ) : ?>
<?php preg_match_all( "/([^\s]+):[\s]{0,}(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)/", $strs[$i], $info );?>
     <tr>
        <td width="15%"><?php echo $info[1][0]?> : </td>
        <td width="47%">已接收 : <font color='#CC0000'><span id="NetInput<?php echo $i?>">0</span></font> G</td>
        <td width="47%">已发送 : <font color='#CC0000'><span id="NetOut<?php echo $i?>">0</span></font> G</td>
    </tr>
<?php endfor; ?>
</table>
<?php endif; ?>

<table width="100%" cellpadding="3" cellspacing="0" align="center">
  <tr><th colspan="4">PHP相关参数</th></tr>
  <tr>
    <td width="35%">PHP版本（php_version）：</td>
    <td width="15%"><?php echo PHP_VERSION;?></td>
    <td>脚本占用最大内存（memory_limit）：</td>
    <td><?php echo show("memory_limit");?></td>
  </tr>
  <tr>
    <td>POST方法提交最大限制（post_max_size）：</td>
    <td><?php echo show("post_max_size");?></td>
    <td>浮点型数据显示的有效位数（precision）：</td>
    <td><?php echo show("precision");?></td>
  </tr>
  <tr>
    <td>脚本超时时间（max_execution_time）：</td>
    <td><?php echo show("max_execution_time");?>秒</td>
    <td>socket超时时间（default_socket_timeout）：</td>
    <td><?php echo show("default_socket_timeout");?>秒</td>
  </tr>
  <tr>
    <td>打开远程文件（allow_url_fopen）：</td>
    <td><?php echo show("allow_url_fopen");?></td>
    <td>声明argv和argc变量（register_argc_argv）：</td>
    <td><?php echo show("register_argc_argv");?></td>
  </tr>
	<tr>
		<td colspan="4">被禁用的函数（disable_functions）： <?=(""==($disFuns=get_cfg_var("disable_functions")))?"无":str_replace(",",", ",$disFuns)?></td>
	</tr>
</table>
<a id="bottom"></a>

<div id="footer">
<?php $run_time = sprintf('%0.4f', microtime_float() - $time_start);?>
Processed in <?=$run_time?> seconds. <?=memory_usage();?> memory usage.
</div>
</div>
</body>
</html>
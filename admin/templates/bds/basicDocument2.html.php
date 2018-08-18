<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$webtitle}</title>
<link href="../css/application.css" rel="stylesheet" type="text/css" />

<script src="../js/common.js"></script>
<script language="javascript" type="text/javascript" src="../js/My97DatePicker/WdatePicker.js"></script>

	<!--
	<style type="text/css">
		#all{width: 100%;height: auto}
		#left{width:80%;height: auto;float: left}
		#right{width:20%;height: auto;float: right}
	</style>
	-->


	<link rel="stylesheet" href="../css/navigation_bar/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../css/navigation_bar/menu.css">

	<style type="text/css" >
		a, a:link, a:visited {color: #2A5685;text-decoration: none;}
		a:hover, a:active{ color: #c61a1a; text-decoration: underline;}
	</style>


</head>
<body class="controller-issues action-show">
<div id="wrapper">
<div id="wrapper2">


	<!-- Mega Menu Start -->
	<div class="container">
		<div class="menu style-1">
			<ul class="menu">
				<li><a style="font-size: 18px;">基础文档应用管理系统</a></li>
				<li><a href="basicDocument.php">图文信息</a></li>
				<li><a href="basicDocument.php?store3=biaozhun">标准信息</a></li>
				<li><a href="basicDocument.php?store3=gongyi">工艺资料</a></li>
				<li><a href=""  class="arrow">家研中心</a>
					<div class="mega-menu">
						<div class="col-1">
							<h4><a href="">家电研究中心模块</a></h4>
							<ol>
								<li><a href="basicDocument.php?store3=jdtw">家电图文</a></li>
								<li><a href="basicDocument.php?store3=jdgongyi">家电工艺</a></li>
							</ol>
						</div>
					</div>
				</li>
				<li><a href="http://sc.chinaz.com/?contactus/" class="arrow">其他应用</a>
					<div class="mega-menu full-width">
						<div class="col-1">
							<h4><a href="">图文应用</a></h4>
							<ol>
								<li><a href="http://10.163.163.160/itemIndex.jsp" target="_blank">试用反馈</a></li>
								<li><a href="">报废图文</a></li>
								<li><a href="">商品编码</a></li>
								<li><a href="">资 料 员</a></li>
							</ol>
						</div>

						<div class="col-1">
							<h4><a href="http://sc.chinaz.com/?tag/freebie/">图文维护</a></h4>
							<ol>
								<li><a href="./basicDocMaintenance.php">图文新建</a></li>
								<li><a href="http://10.2.8.117/d/api/spiderAll.php" target="_blank">总部图文更新</a></li>
								<li><a href="http://10.2.8.117/d/api/spiderAllCS.php" target="_blank">长沙图文更新</a></li>
								<li><a href="http://10.2.8.117/d/api/rsyncDocumentCS.php" target="_blank">长沙文件同步</a></li>
							</ol>
						</div>

						<div class="col-1">
							<h4><a href="http://sc.chinaz.com/?tag/freebie/">报表功能</a></h4>
							<ol>
								<li><a href="">报表导出</a></li>
							</ol>
						</div>

						<div class="col-1">
							<h4><a href="http://sc.chinaz.com/?tag/freebie/">系统设置</a></h4>
							<ol>
								<li><a href="">菜单管理</a></li>
								<li><a href="">管理员列表</a></li>
								<li><a href="">系统常用设置</a></li>
								<li><a href="">后台操作监控</a></li>
								<li><a href="">添加管理员</a></li>
								<li><a href="">添加菜单</a></li>
								<li><a href="">群组管理</a></li>
							</ol>
						</div>

						<div class="col-1">
							<h4><a href="http://sc.chinaz.com/?category/website-designing/">其他功能</a></h4>
							<ol>
								<li><a href="" onclick="alert('无权限访问!');">BPM流程工具</a></li>
								<li><a href="http://10.1.11.156/piwik/index.php?module=CoreHome&action=index&idSite=4&period=day&date=today#/module=Dashboard&action=embeddedIndex&idSite=4&period=day&date=yesterday&idDashboard=1" target="_blank">Piwik统计分析工具</a></li>
								<li><a href="" onclick="alert('无权限访问!');">Xhprof性能分析工具</a></li>
								<li><a href="" onclick="alert('无权限访问!');">MemAdmin命中分析管理平台</a></li>
							</ol>
						</div>


					</div>
				</li>
				<li>
					<div id="sidesearch">
						<form id="sitesearchform" style="display:inline" method="get" action="http://sc.chinaz.com/?">
							<fieldset>
								<input class="sidesearch_input" type="text" value="图号/更改号/名称/经办人" onfocus="if (this.value == '图号/更改号/名称/经办人') {this.value = '';}"  x-webkit-speech="" onwebkitspeechchange="transcribe(this.value)" onblur="if (this.value == '') {this.value = '图号/更改号/名称/经办人';}" name="s" id="s">
								<input type="image" class="sidesearch_submit" src="../images/navigation_bar/sidesearchsubmit.png" />
							</fieldset>
						</form>
					</div>

				</li>
				<li class="right"><a href="" class="arrow">{$_SESSION['RealName']}</a>
					<ul>
						<li><a href="" class="rss" title="Subscribe to RSS">我的主页</a></li>
						<li><a href="" class="twitter" title="Follow us on Twitter">消息</a></li>
						<li><a href="" class="facebook" title="Follow us on Facebook">设置</a></li>
						<li><a href="{DAEM_PATH}admin/logout.php" class="pinterest" title="Follow us on Google+">登出</a></li>
<!--						<li><a href="http://sc.chinaz.com/" class="googleplus" title="Follow us on Pinterest">Pinterest</a></li>-->
<!--						<li><a href="http://sc.chinaz.com" class="stumbleupon" title="Follow us on Stumbleupon">Stumbleupon</a></li>-->
					</ul>
				</li>

			</ul>
		</div>
	</div>

	<br />

<div class="nosidebar" id="main">
 
    <div id="content">
		  <div id="update">

		  <h3 style="">{L("格力电器图文信息管理系统BDS")}</h3>












		  	<form action="" method="get">
				<table>
				  	<tr>
					 	<td>
						  	{L("图文号：")}<input type="text" id="DOCNUMBER" name="DOCNUMBER" value="{$DOCNUMBER}" />&nbsp;
						  	{L("名称：")}<input type="text" id="DOCNAME" name="DOCNAME" value="{$DOCNAME}" />&nbsp;
						  	{L("更改号：")}<input type="text" id="DOCNUMBERCHANGE" name="DOCNUMBERCHANGE" value="{$DOCNUMBERCHANGE}" />&nbsp;
						  	{L("编码：")}<input type="text" id="ITEMNUMBER" name="ITEMNUMBER" value="{$ITEMNUMBER}" />&nbsp;
							{L("种类：")}<input type="text" id="STORE2" name="STORE2" value="{$STORE2}" />&nbsp;
						 	{L("状态：")}{get_section('STATE',$basicDocumentConfig,$STATE,$ary_first=array(0=>''),'STATE')}&nbsp;

							<br/><br/>
<!--							{L("物料类型：")}<input type="text" id="ITEMTYPE" name="ITEMTYPE" value="{$ITEMTYPE}" />&nbsp;-->
							{L("物料组：")}<input type="text" id="ITEMGROUP" name="ITEMGROUP" value="{$ITEMGROUP}" />&nbsp;
<!--						  	{L("图幅：")}<input type="text" id="DOCSIZE" name="DOCSIZE" value="{$DOCSIZE}" />&nbsp;-->
						  	{L("图幅：")}{get_section('DOCSIZE',$docSizeConfig,$DOCSIZE,$ary_first=array(0=>''),'DOCSIZE')}&nbsp;
						  	{L("是否改模：")}{get_section('CHANGEMOULDFLAG',$isOrNotConfig,$CHANGEMOULDFLAG,$ary_first=array(''=>''),'CHANGEMOULDFLAG')}&nbsp;
<!--						  	{L("发往单位：")}{get_section('RECEPTDEPTNAME',$receptDeptNameAry,$RECEPTDEPTNAME,$ary_first=array(0=>''),'RECEPTDEPTNAME')}&nbsp;-->
						  	{L("发往单位代号：")}<input type="text" id="RECEPTDEPTNAME" name="RECEPTDEPTNAME" value="{$RECEPTDEPTNAME}" style="width:38px;" />&nbsp;
						  	{L("制品：")}{get_section('MADEPROUDFLAG',$isOrNotConfig,$MADEPROUDFLAG,$ary_first=array(''=>''),'MADEPROUDFLAG')}&nbsp;

							<br/><br/>
						  	{L("经办人：")}<input type="text" id="CREATOR" name="CREATOR" value="{$CREATOR}" />&nbsp;
<!--							{L("操作员：")}<input type="text" id="startDate" name="startDate" value="" />&nbsp;-->
						  	{L("备注：")}<input type="text" id="NOTE" name="NOTE" value="{$NOTE}" />&nbsp;
						  	{L("高级条件：")}
							更改单、包括历史

							<br/><br/>
						  	{L("开始日期：")}<input type="text" id="startDate" name="startDate" value="{$startDate}" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate" />&nbsp;
						  	{L("结束日期：")}<input type="text" id="endDate" name="endDate" value="{$endDate}" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate" />&nbsp;
							<input type="hidden" name="store3" id="store3" value="{$store3}"/>
						  	<input type="submit" value="{L("查询")}" />&nbsp;&nbsp;
						 </td>
					</tr>
				</table>
			</form>
			
			<h3></h3>
			
		  <form>
				<div class="autoscroll">
				{$pagehtml}
				<table class="list issues" style="font-size: 11px;">
				    <thead>
				    <tr>
				        <th class="checkbox hide-when-print">
				        	<a href=""  title="全选/清除">
				        	<img alt="全选/清除" src="../images/toggle_check.png" /></a>
				        </th>
				    	  <th><a href="">#</a></th>
				          <th><a href="">版本</a></th>
				          <th><a href="">图文号</a></th>
				          <th><a href="">更改号</a></th>
				          <th><a href="">名称</a></th>
				          <th><a href="">经办人</a></th>
				          <th><a href="">日期</a></th>
				          <th><a href="">发往单位</a></th>
				          <th><a href="">种类</a></th>
				          <th><a href="">状态</a></th>
				          <th><a href="">制品</a></th>
				          <th><a href="">编码</a></th>
				          <th><a href="">物料组</a></th>
				          <th><a href="">备注</a></th>
				          <th><a href="">流程</a></th>
				  </tr></thead>
				  
				  <tbody>
				    {if $dataAry}
	  					{loop $dataAry $key=>$val}
							  <tr class="hascontextmenu odd issue status-4 priority-4 overdue created-by-me assigned-to-me">
							    	<td class="checkbox hide-when-print"><input name="ids[]" value="{$val['ID']}" type="checkbox" /></td>
							    	<td class="id" title="{$val['ID']}">{$val['ID']}</td>
							        <td>{if ($val['NEWOROLD'] == 'new')} <span style="color: red;">{$basicDocumentControlStatusAry[$val['NEWOROLD']]}</span> {/if}</td>
							        <td>{$val['DOCNUMBER']}</td>

								  <!-- 更改单下载 -->
								  {if ($val['ADDONSNAME'] != '' && count($val['ADDONSNAME']) > 0)}
								  <td class="subject"><a href="{$val['changeFilePath']}" target="_blank">{$val['DOCNUMBERCHANGE']}</a></td>
								  {else}
								  <td class="subject">{$val['DOCNUMBERCHANGE']}</td>
								  {/if}

								  <!-- 主文件路径下载 -->
								  {if ($val['ADDONSPATH'] != '' && count($val['ADDONSPATH']) > 0)}
								  <td class="subject"><a href="{$val['mainPath']}" target="_blank">{$val['DOCNAME']}</a></td>
								  {else}
								  <td class="subject">{$val['DOCNAME']}</td>
								  {/if}

								  <!-- 创建人 -->
								  {if ($val['MXLINK'] != '')}
								  <td class="subject"><a href="{$val['MXLINK']}" target="_blank">{$val['CREATOR']}</a></td>
								  {else}
								  <td class="subject">{$val['CREATOR']}</td>
								  {/if}


								  <!-- 特批生产紧急单文件下载 -->
								  {if ($val['TIFFILE'] != '' && count($val['TIFFILE']) > 0)}
								  <td class="subject"><a href="{$val['tiffilePath']}" target="_blank">{$val['DATE']}</a></td>
								  {else}
								  <td class="subject">{$val['DATE']}</td>
								  {/if}

								    <td>{get_section('RECEPTDEPTNAME',$val["RECEPTDEPTNAME"],$RECEPTDEPTNAME,$ary_first=array(''),'','','width:75px;')}</td>
<!--						        	<td>{$val['RECEPTDEPTNAME']}</td>-->
								    <td>{$val['STORE2']}</td>
					        		<td>{$val['STATE']}</td>
								    <td>{$val["MADEPROUDFLAG"]}</td>
								    <td>{$val['ITEMNUMBER']}</td>
								    <td>{$val['ITEMGROUP']}</td>

								  <!-- 备注悬停显示 -->
								  {if ($val['NOTE'] != '')}
								  <td class="subject"><a title="{$val['NOTE']}">详细</a></td>
								  {else}
								  <td class="subject"></td>
								  {/if}

								  <!-- 流程文件下载 -->
								  {if ($val['STORE7'] != '' && count($val['STORE7']) > 0)}
								  <td class="subject"><a href="{$val['processPath']}" target="_blank">查看</a></td>
								  {else}
								  <td class="subject"></td>
								  {/if}

							  </tr>
						  {/loop}
					{/if}
			    </tbody>
			</table>
			{$pagehtml}
			</div>
		</form>
		</div>
    </div>
</div>

<div id="footer">
  <div class="bgl"><div class="bgr">
    Powered by <a href="http://www.gree.com" target="_blank">GREE.INC</a> © 2016-2017 &nbsp;
<!--	<a href="http://10.1.11.156/piwik/index.php" target="_blank"><img src="http://10.1.11.156/piwik/plugins/Morpheus/images/logo.svg" width="42px" alt="piwik"/></a>-->
	<a href="http://10.1.11.156/piwik/index.php?module=CoreHome&action=index&idSite=4&period=day&date=today#/module=Dashboard&action=embeddedIndex&idSite=4&period=day&date=yesterday&idDashboard=1" target="_blank"><img src="http://10.1.11.156/piwik/plugins/Morpheus/images/logo.svg" width="42px" alt="piwik"/></a>
  </div></div>
</div>
</div>
</div>

<!-- Piwik -->
<script type="text/javascript">
	var _paq = _paq || [];
	_paq.push(['trackPageView']);
	_paq.push(['enableLinkTracking']);
	(function() {
		var u="//10.1.11.156/piwik/";
		_paq.push(['setTrackerUrl', u+'piwik.php']);
		_paq.push(['setSiteId', 4]);
		var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
		g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
	})();
</script>
<noscript><p><img src="//10.1.11.156/piwik/piwik.php?idsite=4" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->


</body>
</html>


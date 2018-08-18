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

	<!-- 2017-03-15 加载导航navigation start -->
	<script type = "text/javascript" src = "../js/jquery-1.8.2.min.js"></script>
	<script type = "text/javascript" src = "../js/navigation/navigation.js"></script>
	<script type = "text/javascript" src = "../js/navigation/navigationT.js"></script>
	<link rel = "stylesheet" type = "text/css" href = "../css/navigation/navigation.css">
	<link rel = "stylesheet" type = "text/css" href = "../css/navigation/navigationT.css">
	<link rel = "stylesheet" type = "text/css" href = "../css/navigation/style.css">
	<script type="application/javascript">
		//初始化背景图片颜色
		setColors();
	</script>
	<!-- 2017-03-15 加载导航navigation end -->

</head>
<body class="controller-issues action-show">
<div id="wrapper">
<div id="wrapper2">

<div class="nosidebar" id="main">
 
    <div id="content">
		  <div id="update">

		  <h3 style="">{L("格力电器图文信息管理系统BDS")}</h3>


			  <!-- 顶部菜单导航 navigation start -->
			  <div class= "metro_na">
<!--				  <div class= "nav_title">Navigation 菜单导航栏</div>-->
				  <ul>
					  <li>
						  <a href = "basicDocument.php"><img src = "../images/navigation/icon_home.png"/><span>图文信息</span></a>
					  </li>
					  <li>
						  <a href = "basicDocument.php?store3=biaozhun"><img src = "../images/navigation/icon_gallery.png"/><span>标准信息</span></a>
					  </li>
					  <!--
					  <li>
						  <a href = "basicDocument.php?store3=><img src = "../images/navigation/icon_gallery.png"/><span>报废图文</span></a>
					  </li>
					  -->
					  <li>
						  <a href = "basicDocument.php?store3=gongyi"><img src = "../images/navigation/icon_gallery.png"/><span>工艺资料</span></a>
					  </li>
					  <li>
						  <a href = "#"><img src = "../images/navigation/icon_gallery.png"/><span>家研中心</span></a>
						  <ul>
							  <li><a href = "basicDocument.php?store3=jdtw"><img src = "../images/navigation/icon_menu.png"/><span>家电图文</span></a></li>
							  <li><a href = "basicDocument.php?store3=jdgongyi"><img src = "../images/navigation/icon_menu.png"/><span>家电工艺</span></a></li>
						  </ul>
					  </li>
					  <!--
					  <li>
						  <a href = "#"><img src = "../images/navigation/icon_gallery.png"/><span>Gallery</span></a>
						  <ul>
							  <li><a href = "#"><img src = "../images/navigation/icon_menu.png"/><span>Submenu</span></a></li>
							  <li><a href = "#"><img src = "../images/navigation/icon_menu.png"/><span>Submenu</span></a></li>
							  <li><a href = "#"><img src = "../images/navigation/icon_menu.png"/><span>Submenu</span></a></li>
							  <li><a href = "#"><img src = "../images/navigation/icon_menu.png"/><span>Submenu</span></a></li>
							  <li><a href = "#"><img src = "../images/navigation/icon_menu.png"/><span>Submenu</span></a></li>
							  <li><a href = "#"><img src = "../images/navigation/icon_menu.png"/><span>Submenu</span></a></li>
							  <li><a href = "#"><img src = "../images/navigation/icon_menu.png"/><span>Submenu</span></a></li>
							  <li><a href = "#"><img src = "../images/navigation/icon_menu.png"/><span>Submenu</span></a></li>
							  <li><a href = "#"><img src = "../images/navigation/icon_menu.png"/><span>Submenu</span></a></li>
						  </ul>
					  </li>
					  -->
					  <li>
						  <a href = "#"><img src = "../images/navigation/icon_apps.png"/><span>其他应用</span></a>
						  <ul>
							  <li><a href = "#"><img src = "../images/navigation/icon_menu.png"/><span>Submenu</span></a></li>
							  <li><a href = "#"><img src = "../images/navigation/icon_menu.png"/><span>Submenu</span></a></li>
							  <li><a href = "#"><img src = "../images/navigation/icon_menu.png"/><span>Submenu</span></a></li>
							  <li><a href = "#"><img src = "../images/navigation/icon_menu.png"/><span>Submenu</span></a></li>
							  <li><a href = "#"><img src = "../images/navigation/icon_menu.png"/><span>Submenu</span></a></li>
							  <li><a href = "#"><img src = "../images/navigation/icon_menu.png"/><span>Submenu</span></a></li>
							  <li><a href = "#"><img src = "../images/navigation/icon_menu.png"/><span>Submenu</span></a></li>
							  <li><a href = "#"><img src = "../images/navigation/icon_menu.png"/><span>Submenu</span></a></li>
							  <li><a href = "#"><img src = "../images/navigation/icon_menu.png"/><span>Submenu</span></a></li>
						  </ul>
					  </li>
					  <li>
						  <a><img src = "../images/navigation/icon_settings.png"/><span>系统配置</span></a>
						  <ul>
							  <li><a href = "#"><img src = "../images/navigation/icon_account.png"/><span>Account</span></a></li>
							  <li><a href = "#"><img src = "../images/navigation/icon_edit.png"/><span>Edit Settings</span></a></li>
						  </ul>
					  </li>
				  </ul>
			  </div>



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
    Powered by <a href="http://www.gree.com" target="_blank">GREE.INC</a> © 2016-2017
  </div></div>
</div>
</div>
</div>

</body>
</html>


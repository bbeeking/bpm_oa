<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$webtitle}</title>
<link href="../css/application.css" rel="stylesheet" type="text/css" />

<script src="../js/common.js"></script>
<script language="javascript" type="text/javascript" src="../js/My97DatePicker/WdatePicker.js"></script>
</head>
<body class="controller-issues action-show">
<div id="wrapper">
<div id="wrapper2">

<div class="nosidebar" id="main">
 
    <div id="content">
		  <div id="update">
		  <h3>{L("任务管理器")}</h3>
		  	<form action="" method="get">
				<table>
				  	<tr>	
					 	<td>
						 	{L("状态：")}{get_section('status',$jobStatus,$status,$ary_first=array(0=>'请选择'),'status')}&nbsp;
						  	{L("跟踪：")}{get_section('type',$trackerStatusAry,$type,$ary_first=array(0=>'请选择'),'type')}&nbsp;
						  	{L("创建人：")}{get_section('builder',$userAry,$builder,$ary_first=array(0=>'请选择'),'builder')}&nbsp;
						  	{L("指派人：")}{get_section('performer',$userAry,$performer,$ary_first=array(0=>'请选择'),'performer')}&nbsp;
						  	{L("跟踪者：")}{get_section('follower',$userAry,$follower,$ary_first=array(0=>'请选择'),'follower')}&nbsp;
						  	{L("版本：")}{get_section('version',$versionAry,$version,$ary_first=array(0=>'请选择'),'version')}&nbsp;
						  <br/><br/>
						  	{L("任务周期：")}<input type="text" id="jobStartDate" name="jobStartDate" value="{$jobStartDate}" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate" />&nbsp;~
						  					<input type="text" id="jobEndDate" name="jobEndDate" value="{$jobEndDate}" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate" />&nbsp;
						  	{L("开始日期：")}<input type="text" id="startDate" name="startDate" value="{$startDate}" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate" />&nbsp;
						  	{L("结束日期：")}<input type="text" id="endDate" name="endDate" value="{$endDate}" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate" />&nbsp;
						  	{L("记录日期：")}<input type="text" id="createDate" name="createDate" value="{$createDate}" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate" />&nbsp;
						  	<input type="submit" value="{L("查询")}" />&nbsp;&nbsp;
						 </td>
					</tr>
				</table>
			</form>
			
			<h3></h3>
			
		  <form>
				<div class="autoscroll">
				<table class="list issues">
				    <thead>
				    <tr>
				        <th class="checkbox hide-when-print">
				        	<a href=""  title="全选/清除">
				        	<img alt="全选/清除" src="../images/toggle_check.png" /></a>
				        </th>
				    	  <th><a href="">#</a></th>
				          <th><a href="">项目</a></th>
				          <th><a href="">跟踪</a></th>
				          <th><a href="">父任务</a></th>
				          <th><a href="">状态</a></th>
				          <th><a href="" class="sort desc">优先级</a></th>
				          <th><a href="">主题</a></th>
				          <th><a href="">指派给</a></th>
				          <th><a href="">目标版本</a></th>
				          <th><a href="">开始日期</a></th>
				          <th><a href="">完成日期</a></th>
				          <th><a href="">% 完成</a></th>
				        
				  </tr></thead>
				  
				  <tbody>
				    {if $dataAry}
	  					{loop $dataAry $key=>$val}
							  <tr class="hascontextmenu odd issue status-4 priority-4 overdue created-by-me assigned-to-me">
							    <td class="checkbox hide-when-print"><input name="ids[]" value="11322" type="checkbox" /></td>
							    <td class="id"><a href="">{$val['id']}</a></td>
							        <td><a href="">晨曦mlight项目</a></td>
							        <td>{$trackerStatusAry[$val['type']]}</td>
							        <td>无</td>
							        <td><font style="color:#ffffff;font-weight:bold;background:{$jobStatusBgColor[$val['status']]};">{$jobStatus[$val['status']]}</font></td>
							        <td>{$priorityStatusAry[$val['priority']]}</td>
							        <td class="subject">
							        	<a href="task_view.php?id={$val['id']}">{$val['title']}</a>
							        </td>
						        	<td>
						        		<a href="?performer={$val['performer']}">
						        			{if $val['performer']==$_SESSION['UserName']}
						        				<font style="color:#ffffff;font-weight:bold;background:#507AAA;">
						        				{$userAry[$val['performer']]}
						        				</font>
						        			{else}
						        				{$userAry[$val['performer']]}
						        			{/if}
						        		</a>
						        	</td>
						        	<td><a href="">v1.0.1</a></td>
					        		<td>{date('Y-m-d',strtotime($val['start_time']))}</td>
					        		<td>{date('Y-m-d',strtotime($val['end_time']))}</td>
					        		
				        			<!-- 输出显示的百分比 -->
								    <td>
									<table class="progress" style="width: 80px;" title="任务完成{$val['progress']}%">
										<tbody>
											<tr>
												{if $val['progress'] == 100 }
													<td class="closed" style="width: {$val['progress']}%;"></td>
												{else}
													{if $val['progress'] == 0 }
													<td class="todo" style="width: {$val['progress']}%;"></td>
													{else}
													<td class="closed" style="width: {$val['progress']}%;"></td>
													<td class="todo" style="width: {number_format(100-$val['progress'])}%;"></td>
													{/if}
												{/if}
											</tr>
										</tbody>
									</table>
									</td>
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
    Powered by mlight <a href="">MLight</a> © 2013-2015 YueFeng Leung
  </div></div>
</div>
</div>
</div>

</body>
</html>


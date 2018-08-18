<!-- 为兼容ueditor 增加模板头部增加输出空行 -->
<?php echo "&nbsp;";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{L("晨曦-项目管理系统mlight pms")}</title>
<link href="../css/application.css" rel="stylesheet" type="text/css" />

<script src="../js/common.js"></script>
<script language="javascript" type="text/javascript" src="../js/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="../js/mathjax/MathJax.js?config=AM_HTMLorMML-full"></script>
</head>
<body class="controller-issues action-show">
<div id="wrapper">
<div id="wrapper2">

<!--<div class="" id="main">-->
<div class="nosidebar" id="main">
<!-- 
    <div id="sidebar">
		<h3>问题</h3>
		<a href="">查看所有问题</a><br />
		<a href="">摘要</a><br />
		<a href="">日历</a><br />
		<a href="">甘特图</a><br />
		
		<h3>自定义查询</h3>
		<a href="" class="query">我提交的问题</a><br />
		<a href="" class="query">我跟踪的问题</a><br />
		<a href="" class="query">指派给我的问题</a>
	  
	    <div id="watchers">
			<h3>跟踪者 (2)</h3>
			<ul>
				<li><a href="">杨 建锐</a></li>
				<li><a href="">薛 荣军</a></li>
			</ul>
	    </div>
    </div>
 -->
 
    <div id="content">
        
		<h2>任务 #{$result['id']} <a href="#show" name="hide" onclick="update_task();">[更新]</a> <a onclick="del_task('{$result['title']}','{$result['id']}');">[删除]</a></h2>
		<div class="issue status-4 priority-4 overdue created-by-me assigned-to-me details">
		    <div class="next-prev-links contextual">
		      « 上一页 |<span class="position">1/35</span> |<a href="" title="#10642">下一页 »</a>
		    </div>
		  
			<div class="subject">
			<div><h3>{$result['title']}</h3></div>
			</div>
		        <p class="author">
		        	由 <a onclick="check_user_task('{$result['builder']}');">{$userAry[$result['builder']]}</a> 
		        	在 <a href="" title="{$result['create_time']}">{number_format((time()-$result['create_time'])/86400)}</a> 天之前添加.
		        </p>
		
				<table class="attributes">
					<tbody>
					<tr>
					    <th class="status">状态:</th>
					    	<td class="status">{$jobStatus[$result['status']]}</td>
					    <th class="start-date">开始日期:</th>
					    	<td class="start-date">{$result['start_time']}</td>
					</tr>
					<tr>
					    <th class="priority">优先级:</th>
					    	<td class="priority">{$priorityStatusAry[$result['priority']]}</td>
					    <th class="due-date">计划完成日期:</th>
					    	<td class="due-date">{$result['end_time']}</td>
					</tr>
					<tr>
					    <th class="assigned-to">指派给:</th>
					    	<td class="assigned-to"><a onclick="check_user_task('{$result['performer']}');">{$userAry[$result['performer']]}</a></td>
					    
					    <th class="progress">% 完成:</th>
					    <!-- 输出显示的百分比 -->
					    <td class="progress">
						<table class="progress" style="width: 80px;" title="任务完成{$result['progress']}%">
							<tbody>
								<tr>
									{if $result['progress'] == 100 }
										<td class="closed" style="width: {$result['progress']}%;"></td>
									{else}
										{if $result['progress'] == 0 }
										<td class="todo" style="width: {$result['progress']}%;"></td>
										{else}
										<td class="closed" style="width: {$result['progress']}%;"></td>
										<td class="todo" style="width: {number_format(100-$result['progress'])}%;"></td>
										{/if}
									{/if}
								</tr>
							</tbody>
						</table>
						</td>
						
					</tr>
					<tr>
					    <th class="category">类别:</th>
					    	<td class="category">{$trackerStatusAry[$result['type']]}</td>
					    <th class="spent-time">耗时:</th>
					    	<td class="spent-time">{if $result['spent_time']>0}{$result['spent_time']} h{else}未登记{/if}</td>
					</tr>
					<tr>
					    <th class="fixed-version">目标版本:</th>
					    	<td class="fixed-version"><a href="">{$result['version']}</a></td>
					</tr>
					</tbody>
				</table>
				
				<hr />
		
		  		<p><strong>描述</strong></p>
				<div class="wiki">
						<p>{$result['content']}</p>
				</div>
				
		</div>
		
		
		<div style="clear: both;"></div>
		  <div id="update" style="display:none;">
		  <h3>更新<a href="#hide" name="show" onclick="hidden_update();">[隐藏]</a></h3>
		  <form action="task_update.php" class="edit_issue" enctype="multipart/form-data" id="issue-form" method="POST">
		    <div class="box">
		        <fieldset class="tabular"><legend>修改属性</legend>
		        <div id="all_attributes">
					<p>
						<label for="type">跟踪<span class="required"> *</span></label>
						{get_section('type',$trackerStatusAry,$type,'1','type')}
					</p>
					<p>
						<label for="title">主题<span class="required"> *</span></label>
						<input id="title" name="title" size="80" value="{$result['title']}" type="text" />
					</p>
			
					<p>
					  <label>描述</label>
					  <a href="#" ><img alt="Edit" src="" /></a>
					  <span id="issue_description_and_toolbar" style="display:none">
					    <div class="jstEditor">
					    		<textarea cols="60" rows="10" style="height:300px;" name="myEditor" id="myEditor">{$result['content']}</textarea>
					    </div>
					    <div class="jstHandle"></div>
					  </span>
					</p>
			
			
					<div id="attributes" class="attributes">
						<div class="splitcontent">
						<div class="splitcontentleft">
							<p>
								<label for="status">状态<span class="required"> *</span></label>
								{get_section('status',$jobStatus,$result['status'],$ary_first=array(''),'status')}
							</p>
						
							<p>
								<label for="priority">优先级<span class="required"> *</span></label>
								{get_section('priority',$priorityStatusAry,$result['priority'],$ary_first=array(''),'priority')}
							</p>
						
							<p>
								<label for="performer">指派给</label>
								{get_section('performer',$userAry,$result['performer'],$ary_first=array(''),'performer')}
							</p>
						
							<p>
							<label for="version">目标版本</label>
							{get_section('version',$versionAry,$result['version'],'','version')}
							</p>
						</div>
					
						<div class="splitcontentright">
						
						<p>
							<label for="startDate">开始日期</label>
							<input type="text" id="startDate" name="startDate" value="{$result['start_time']}" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="Wdate" />
						</p>
						<p>
							<label for="endDate">计划完成日期</label>
							<input type="text" id="endDate" name="endDate" value="{$result['end_time']}" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="Wdate" />
						</p>
						<p>
							<label for="estimated_hours">预期时间</label>
							<input id="estimated_hours" name="estimated_hours" size="3" type="text" value="{$result['estimated_hours']}" /> 小时
						</p>
					
						<p>
						<label for="progress">% 完成</label>
							{get_section('progress',$doneRatioAry,$result['progress'],'0','progress')}
						</p>
					
						</div>
						</div>
					</div>
		        </div>
		        </fieldset>
		    
		        <fieldset class="tabular"><legend>登记工时</legend>
			        <div class="splitcontentleft">
			        	<p><label for="time_entry_hours">耗时</label><input id="time_entry_hours" name="time_entry[hours]" size="6" type="text"> 小时</p>
			        </div>
			        <div class="splitcontentright">
			        <p>
			        	<label for="time_entry_activity_id">活动</label>
			        	<select id="time_entry_activity_id" name="time_entry[activity_id]">
			        	<option value="8" selected="selected">设计</option>
						<option value="9">开发</option>
						<option value="12">美术</option></select></p>
			        </div>
			        <p><label for="time_entry_comments">注释</label><input id="time_entry_comments" name="time_entry[comments]" size="60" type="text"></p>
			    </fieldset>
		    </div>
		    <input type="hidden" id="id" name="id" value="{$result['id']}"/>
		    <input name="commit" value="提交" type="submit" />
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

<script type="text/javascript" src="../js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../js/ueditor/ueditor.all.js"></script>
<script language="javascript">
//激活ueditor
window.UEDITOR_HOME_URL = "/pms/admin/js/";
var editor = new UE.ui.Editor();
editor.render("myEditor");

//更新任务
function update_task()
{
	document.getElementById("update").style.display = "block";
}

//删除任务
function del_task(title,id)
{
	cs = '{L('是否删除任务：')} 《'+title+'》 ?';
	if(confirm(cs)) 
	window.location = 'task_del.php?id='+id;
}

//隐藏更新
function hidden_update()
{
	document.getElementById("update").style.display = "none";
}

//查看用户的工作
function check_user_task(user)
{
	window.location = 'task_manager.php?performer='+user;
//	alert("查看当前"+user+"的工作信息!");
}
</script>

</body>
</html>

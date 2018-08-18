<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$webtitle}</title>
<link href="../css/application.css" rel="stylesheet" type="text/css" />

<script src="../js/common.js"></script>
<script language="javascript" type="text/javascript" src="../js/My97DatePicker/WdatePicker.js"></script>

</head>
<body class="controller-my action-page">
<div class="main_outer" style="height:100%;width:100%;overflow:auto;">

<div id="wrapper">
<div id="wrapper2">
<div class="nosidebar" id="main">
    <div id="sidebar"></div>

    <div id="content">
		<h2>我的工作台</h2>
		<div id="list-top"></div>
		<div id="list-left" class="splitcontentleft">
 			<div class="mypage-box">
    			<h3>指派给我的问题 ({$myTaskCount})</h3>
				<form action="" method="post">
				  <table class="list issues">
				    <thead><tr>
				    <th>#</th>
				    <th>项目</th>
				    <th>跟踪</th>
				    <th>主题</th>
				    </tr></thead>
				    <tbody>
				    {if $myTaskAry}
					  {loop $myTaskAry $key=>$val}
						<tr id="issue-{$key}" class="hascontextmenu {if $key%2==0}odd{else}even{/if} issue">
					      <td class="id"><a href="task_view.php?id={$val['id']}">{$val['id']}</a></td>
					      <td class="project"><a href="">{$val['project_id']}</a></td>
					      <td class="tracker">{$typeAry[$val['type']]}</td>
					      <td class="subject">
					        <a href="task_view.php?id={$val['id']}">{$val['title']}</a> 
					        	<font style="color:#ffffff;font-weight:bold;background:{$jobStatusBgColor[$val['status']]};">{$jobStatus[$val['status']]}</font>
					      </td>
					    </tr>
					  {/loop}
					{/if}
				    </tbody>
				  </table>
				</form>
				<p class="small"><a href="task_manager.php?performer={$username}">查看所有问题</a></p>
			</div>
			
			<div class="mypage-box">
    			<h3>由我跟踪的问题 ({$myFollowTaskCount})</h3>
				<form action="" method="post">
				  <table class="list issues">
				    <thead><tr>
				    <th>#</th>
				    <th>项目</th>
				    <th>跟踪</th>
				    <th>主题</th>
				    </tr></thead>
				    <tbody>
				    {if $myFollowTaskAry}
					  {loop $myFollowTaskAry $key=>$val}
						<tr id="issue-{$key}" class="hascontextmenu {if $key%2==0}odd{else}even{/if} issue">
					      <td class="id"><a href="task_view.php?id={$val['id']}">{$val['id']}</a></td>
					      <td class="project"><a href="">{$val['project_id']}</a></td>
					      <td class="tracker">{$typeAry[$val['type']]}</td>
					      <td class="subject">
					        <a href="task_view.php?id={$val['id']}">{$val['title']}</a> 
					        	<font style="color:#ffffff;font-weight:bold;background:{$jobStatusBgColor[$val['status']]};">{$jobStatus[$val['status']]}</font>
					      </td>
					    </tr>
					  {/loop}
					{/if}
				    </tbody>
				  </table>
				</form>
				<p class="small"><a href="task_manager.php?follower={$username}">查看所有问题</a></p>
			</div>
		</div>

		<div id="list-right" class="splitcontentright">
 			<div class="mypage-box">
    		<h3>已报告的问题 ({$myCreateTaskCount})</h3>
			<form action="" method="post">
			  <table class="list issues">
			    <thead><tr>
			    <th>#</th>
			    <th>项目</th>
			    <th>跟踪</th>
			    <th>主题</th>
			    </tr></thead>
			    <tbody>
			    {if $myCreateTaskAry}
				  {loop $myCreateTaskAry $key=>$val}
					<tr id="issue-{$key}" class="hascontextmenu {if $key%2==0}odd{else}even{/if} issue">
				      <td class="id"><a href="task_view.php?id={$val['id']}">{$val['id']}</a></td>
				      <td class="project"><a href="">{$val['project_id']}</a></td>
				      <td class="tracker">{$typeAry[$val['type']]}</td>
				      <td class="subject">
				        <a href="task_view.php?id={$val['id']}">{$val['title']}</a> 
				        	<font style="color:#ffffff;font-weight:bold;background:{$jobStatusBgColor[$val['status']]};">{$jobStatus[$val['status']]}</font>
				      </td>
				    </tr>
				  {/loop}
				{/if}
			    </tbody>
			  </table>
			</form>
			<p class="small"><a href="task_manager.php?builder={$username}">查看所有问题</a></p>
			</div>
			
			<div class="mypage-box">
    			<h3>当前空闲(未指派)的任务 ({$idleTaskCount})</h3>
				<form action="" method="post">
				  <table class="list issues">
				    <thead><tr>
				    <th>#</th>
				    <th>项目</th>
				    <th>跟踪</th>
				    <th>主题</th>
				    </tr></thead>
				    <tbody>
				    {if $idleTaskAry}
					  {loop $idleTaskAry $key=>$val}
						<tr id="issue-{$key}" class="hascontextmenu {if $key%2==0}odd{else}even{/if} issue">
					      <td class="id"><a href="task_view.php?id={$val['id']}">{$val['id']}</a></td>
					      <td class="project"><a href="">{$val['project_id']}</a></td>
					      <td class="tracker">{$typeAry[$val['type']]}</td>
					      <td class="subject">
					        <a href="task_view.php?id={$val['id']}">{$val['title']}</a> 
					        	<font style="color:#ffffff;font-weight:bold;background:{$jobStatusBgColor[$val['status']]};">{$jobStatus[$val['status']]}</font>
					      </td>
					    </tr>
					  {/loop}
					{/if}
				    </tbody>
				  </table>
				</form>
				<p class="small"><a href="task_manager.php?performer=null">查看所有问题</a></p>
			</div>
		</div>
		
	</div>
</div>

<!--{include '../footer.php'}-->

</div>
</div>

</div>

</body>
</html>

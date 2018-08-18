<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{L("晨曦-项目管理系统mlight pms")}</title>
<link href="../css/application.css" rel="stylesheet" type="text/css" />
</head>
<body class="controller-issues action-show">
<div id="wrapper">
<div id="wrapper2">

<div class="nosidebar" id="main">
 
    <div id="content">
		  <h3>{L("学员信息列表")}</h3>
			<div class="autoscroll">
				<table class="list issues">
					<thead>
						<tr>
							<th><a href="">{L("id")}</a></th>
							<th><a href="">{L("姓名")}</a></th>
							<th><a href="">{L("出生日期")}</a></th>
							<th><a href="">{L("性别")}</a></th>
							<th><a href="">{L("报读课程")}</a></th>
							<th><a href="">{L("入学日期")}</a></th>
							<th><a href="">{L("入学成绩")}</a></th>
							<th><a href="">{L("家庭住址")}</a></th>
							<th><a href="">{L("联系电话")}</a></th>
							<th><a href="">{L("QQ")}</a></th>
							<th><a href="">{L("在读学校")}</a></th>
							<th><a href="">{L("报读渠道")}</a></th>
							<th><a href="">{L("在读")}</a></th>
							<th><a href="">{L("操作")}</a></th>
						</tr>
					</thead>
					<tbody>
					<?php $i=0;?>
					{loop $dataAry $data}
						{if $i%2 == 0}
						<tr class="hascontextmenu odd issue status-4 priority-4 overdue created-by-me assigned-to-me">
						{else}
						<tr class="hascontextmenu odd issue status-4 priority-4 overdue created-by-me assigned-to-me" style="background:#FFFFFF;">
						{/if}
							<td>{$data['sid']}</td>
							<td>{$data['name']}</td>
							<td>{date('Y-m-d',strtotime($data['birth']))}</td>
							<td>{$sexAry[$data['sex']]}</td>
							<td style="text-align:left;">{$data['course']}</td>
							<td>{date('Y-m-d',strtotime($data['enrollment_date']))}</td>
							<td>{$data['entry_level']}</td>
							<td style="text-align:left;">{$data['addr']}</td>
							<td>{$data['tel']}</td>
							<td>{$data['qq']}</td>
							<td style="text-align:left;">{$data['school']}</td>
							<td>{$data['channel']}</td>
							<td>{if $data['status'] == '1'}<font color="#ff0000">{L("是")}</font>{else}{L("否")}{/if}</td>
							<td><a href="edit_user.php?aid={$user['id']}">{L("修改")}</a></td>
						</tr>
						<?php $i++;?>
					{/loop}
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


</div>
</div>
</body>
</html>
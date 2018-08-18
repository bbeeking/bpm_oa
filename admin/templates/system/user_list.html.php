<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- 样式控制 header start -->
		{php include "../templates/header.html.php"}
		<!-- 样式控制 header end -->
    </head>
	<body class="ptrn_a">
		<div id="loading_layer" style="display:none"><img src="../templates/img/ajax_loader.gif" alt="" /></div>
		
		<!-- 加载颜色风格选择器 -->
		{php include "../templates/style_switcher.html.php"} 
		
		<div id="maincontainer" class="clearfix">
			
			<!-- 顶部导航栏 top start -->
            {php include "../top.php"}
            <!-- 顶部导航栏 top end -->
            
            <!-- 主加载程序main content start -->
			<div id="contentwrapper">
			<div class="main_content">
				<nav>
					<div id="jCrumbs" class="breadCrumb module">
						<ul>
							<li>
								<a href="#"><i class="icon-home"></i></a>
							</li>
							<li>
								系统设置
							</li>
							<li>用户信息列表</li>
						</ul>
					</div>
				</nav>
			    
				<div class="row-fluid">
					<div class="span12">
						<div class="heading clearfix">
							<h3 class="pull-left">管理员列表</h3>
							<span class="pull-right label label-important">{count($user)} Orders</span>
						</div>
						<table class="table table-striped table-bordered mediaTable" id="dt_d">
							<thead>
								<tr>
									<th class="optional">{L("用户名")}</th>
									<th class="optional">{L("姓名")}</th>
									<th class="essential persist">{L("群组")}</th>
									<th class="optional">{L("部门")}</th>
									<th class="optional">{L("工号")}</th>
									<th class="optional">{L("电话")}</th>
									<th class="essential">{L("最后登陆时间")}</th>
									<th class="essential">{L("最后登陆")}ip</th>
									<th class="essential">{L("禁止")}</th>
									<th class="essential">{L("注册")}</th>
									<th class="essential">{L("操作")}</th>
								</tr>
							</thead>
							<tbody>
								{loop $user $user}
									<tr>
										<td>{$user['account']}</td>
										<td>{$user['username']}</td>
										<td>{$user['g_name']}</td>
										<td>{$departmentAry[$user['department']]}</td>
										<td>{$user['number']}</td>
										<td>{$user['tel']}</td>
										<td>{$user['logtime']}</td>
										<td>{$user['logip']}</td>
										<td>{if $user['ispermit'] == '1'}<font color="#ff0000">{L("是")}</font>{else}{L("否")}{/if}</td>
										<td>{$user['regtime']}</td>
										<td><a href="edit_user.php?aid={$user['id']}">{L("修改")}</a>&nbsp;<a href="del.php?id={$user['id']}&type=user&name={$user['account']}" onclick="if(!confirm('{L("真的要删除")}《{$user['account']}》{L("管理员吗？")}'))return false;">{L("删除")}</a></td>
									</tr>
								{/loop}
							</tbody>
						</table>
					</div>
				</div>
			</div>
			</div>
			<!-- 主加载程序main content end -->
            
            
			<!-- 左侧菜单导航栏 sidebar start -->
            {php include "../sidebar.php"}
            <!-- 左侧菜单导航栏 sidebar end -->
            
			<!-- 尾部js加载 footer start -->
			{php include "../templates/footer.html.php"}
			<!-- 尾部js加载 footer end -->
			
		</div>
	</body>
</html>
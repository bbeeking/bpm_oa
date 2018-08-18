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
							<li>系统日志监控</li>
						</ul>
					</div>
				</nav>
			    
				<div class="row-fluid">
					<div class="span12">
						<div class="heading clearfix">
							<h3 class="pull-left">管理员列表</h3>
							<span class="pull-right label label-important">{$iTotal} Orders</span>
						</div>
						<table class="table table-striped table-bordered mediaTable" id="dt_dRecordTime">
							
							<thead>
								<tr>
									<th class="optional">{L("记录标识")}id</th>
									<th class="optional">{L("执行的")}URL</th>
									<th class="optional">{L("菜单")}ID</th>
									<th class="optional">{L("序号")}</th>
									<th class="optional">{L("账号")}</th>
									<th class="optional">IP</th>
									<th class="optional">{L("请求模块")}</th>
									<th class="optional">{L("操作时间")}</th>
								</tr>
							</thead>
							<tbody>
								{if $aData}
								  	{loop $aData $iKey=>$aInfo}
										<tr>
											<td>{$aInfo['iId']}</td>
											<td>{$aInfo['sUrl']}</td>
											<td>{$aInfo['iMenuId']}</td>
											<td>{$aInfo['iNum']}</td>
											<td>{$aInfo['sUserName']}</td>
											<td>{$aInfo['sIP']}</td>
											<td>{$aInfo['sMenuName']}</td>
											<td>{$aInfo['dRecordTime']}</td>
										 </tr>
									{/loop}
								{/if}
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
			
			<script languages="text/javascript">
				/* 重新初始化table，增加控制字段的排序 */
				$(document).ready(function() {
					var oTable = $('#dt_dRecordTime').dataTable({
						"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
						"sPaginationType": "bootstrap",
						"aaSorting": [[ 7, "desc" ]],
					});
				});
			</script>
			
		</div>
	</body>
</html>
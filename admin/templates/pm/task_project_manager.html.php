<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- 样式控制 header start -->
		{php include "../templates/header.html.php"}
		<!-- 样式控制 header end -->
    </head>
    <body>
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
			                    <a href="#">PMIS</a>
			                </li>
			                <li>
			                    <a href="#">系统设置</a>
			                </li>
			                <li>项目管理</li>
			            </ul>
			        </div>
			    </nav>
			    
				<div class="row-fluid">
					<div class="span12">
						<div class="heading clearfix">
							<h3 class="pull-left">项目管理</h3>
						</div>
						<table class="table table-bordered mediaTable">
							<thead>
								<tr>
									<th class="optional">{L("项目名称")}</th>
									<th class="optional">{L("显示位置")}</th>
									<th class="optional">{L("是否关闭")}</th>
									<th class="optional">{L("操作")}</th>
								</tr>
							</thead>
							<tbody>
								{$project}
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
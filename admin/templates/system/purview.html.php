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
			                <li>
			                    ACL权限控制
			                </li>
			                <li>查看</li>
			            </ul>
			        </div>
			    </nav>

			    <form action="purview_post.php" enctype="multipart/form-data" method="post" class="form-horizontal" onsubmit="return chksubmit();">
					<div class="row-fluid">
						<div class="span12">
							<div class="heading clearfix">
								<h3 class="pull-left">{L("权限分配")}</h3>
							</div>

							<table class="table table-bordered mediaTable">
								<thead>
									<tr>
										<th class="optional">{L("菜单名称")}</th>
										<th class="optional">{L("链接地址")}</th>
										<th class="optional">{L("显示位置")}</th>
										<th class="optional">{L("是否显示")}</th>
										<th class="optional">{L("操作")}</th>
									</tr>
								</thead>
								<tbody>
									{$modList}
								</tbody>
							</table>

							<input type="hidden" name="gid" value="{$gid}" style="display:none;" />
							<input type="hidden" name="gname" value="{$grouprow['g_name']}" style="display:none;" />

							<input type="submit" name="submit1" id="submit1" value="{L("提交")}" />
							<input type="reset" name="reset1" id="reset1" value="{L("重置")}" />
							<input type="button" name="fanhui" id="fanhui" value="{L("返回")}" onclick="window.location.href='group_list.php';" /></div>

						</div>
					</div>
				</form>
			</div>
			</div>
			<!-- 主加载程序main content end -->


			<!-- 左侧菜单导航栏 sidebar start -->
            {php include "../sidebar.php"}
            <!-- 左侧菜单导航栏 sidebar end -->

			<!-- 尾部js加载 footer start -->
			{php include "../templates/footer.html.php"}
			<!-- 尾部js加载 footer end -->

			<!-- 控制检测表单数据 -->
			<script src="../js/common.js"></script>

			<script>
			//更换群组时跳转新页面
			function onchanhref(val)
			{
				window.location.href='purview.php?gid='+val;
			}

			//全选功能
			function allselect(id,obj)
			{
				var obj_name = document.getElementsByName('purview'+id+'[]');
				for(var i=0;i<obj_name.length;i++) {
					if(obj.checked) {
						obj_name[i].checked = true;
					}
					else {
						obj_name[i].checked = false;
					}
				}
			}

			//顶级资源分类未勾选时，子资源disabled设为false，相反设为true
			function selectpurview(obj)
			{
				var obj_name = document.getElementsByName('purview'+obj.value+'[]');
				for(var i=0;i<obj_name.length;i++) {
					if(obj.checked) {
						obj_name[i].disabled = false;
					}
					else {
						obj_name[i].disabled = true;
					}
				}
				if(obj.checked) {
					document.getElementById('all'+obj.value).disabled = false;
				}
				else {
					document.getElementById('all'+obj.value).disabled = true;
				}
			}

			//页面加载完毕后执行顶级资源选择与否程序处理
			function onloadall()
			{
				var obj_name = document.getElementsByName('purview[]');
				for(var i=0;i<obj_name.length;i++) {
					selectpurview(obj_name[i]);
				}
			}

			//提交表单时验证
			function chksubmit()
			{
				var chk = true;
				var obj_name = document.getElementsByName('purview[]');
				for(var i=0;i<obj_name.length;i++) {
					if(obj_name[i].checked) {
						chk = false;
					}
				}
				if(chk) {
					if(confirm('{L("该群组未分配任何权限，您确定提交？")}')) {
						return true;
						document.getElementById('submit1').disabled = true;
					}
					else {
						return false;
					}
				}
			}
			</script>

		</div>
	</body>
</html>
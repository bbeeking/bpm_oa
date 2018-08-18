<!DOCTYPE html>
<html lang="en">
    <head>

		<!-- enhanced select 控制下拉列表多选 -->
		<link rel="stylesheet" href="../templates/lib/chosen/chosen.css" />

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
			                    系统设置
			                </li>
			                <li>部门管理</li>
			            </ul>
			        </div>
			    </nav>
			    
				<div class="row-fluid">
					
					<div class="span12">
					
						<div class="heading clearfix">
							<h3 class="pull-left">部门管理</h3>
							<span class="pull-right label label-important">{count($department)} Orders</span>
						</div>
						<table class="table table-striped table-bordered mediaTable" id="dt_d">
							<thead>
								<tr>
								    <th class="essential">{L("ID")}</th>
								    <th class="essential">{L("部门")}</th>
								    <th class="essential">{L("上级部门")}</th>
								    <th class="essential">{L("部门描述")}</th>
								    <th class="essential">{L("部门负责人")}</th>
								    <th class="optional">{L("操作")}</th>
								</tr>
							</thead>
							
							<tbody>
								{loop $department $key=>$val}
								<tr>
									<td>{$key}</td>
								    <td>{$val['name']}</td>
								    <td>{$department[$val['parent_id']]['name']}</td>
								    <td>{$val['description']}</td>
								    <td>{$val['leader']}</td>
								    <td>
								    	<a href="department_list.php?id={$val['id']}">{L("修改")}</a>&nbsp;&nbsp;
								    	<a href="del.php?id={$val['id']}&type=department" onclick="if(!confirm('{L("您真的要删除")}《{$val['name']}》{L("部门？删除后将不能恢复。")}')){return false;}">{L("删除")}</a>
								    </td>
								</tr>
								{/loop}
							</tbody>
						</table>
						
						</br>
						
						<form action="department_post.php" method="post" >
							<div class="formSep">
								<p><span class="label label-inverse">{if $result == ''}{L("添加部门")}{else}{L("修改部门")}{/if}</span></p>
								<div class="row-fluid">
									<div class="span5">
										<label for="">部门名称<span class="f_req">*</span></label>
										<input type="text" class="span8" name="name" id="name" value="{$result['name']}"  />
										<span class="help-block"></span>
									</div>
									<div class="span5">
										<label for="">上级部门</label>

										<!--
										<input type="text" class="span8" name="parent_id" id="parent_id" value="{$department[$val['parent_id']]['name']}" />
										-->
										{get_section("parent_id",$departmentAry,$department[$val['parent_id']]['name'],'',"parent_id")}
										<span class="help-block"></span>
									</div>
								</div>
								<div class="row-fluid">
									<div class="span5">
										<label for="">部门描述</label>
										<input type="text" class="span8" name="description" id="description" value="{$result['description']}" />
										<span class="help-block" id="submitmsg"></span>
									</div>
									<div class="span5">
										<label for="">部门负责人</label>
										<!--
										<input type="text" class="span8" name="leader" id="leader" value="{$result['leader']}" />
										-->

										<select name="select_option" id="select_option" multiple data-placeholder="选择用户...">
											{loop $userAry $key=>$val}
											<option value="{$key}">{$val}</option>
											{/loop}
										</select>
										<input type="hidden" name="leader" id="leader" value="{$result['leader']}" />

										<span class="help-block"></span>
									</div>
								</div>
								<input type="hidden" name="id" value="{$result['id']}">
								<input class="btn" type="submit" name="submit1" id="submit1" value="{L("提交")}" style="margin-top:22px;" />
								{if $result != ''}
								<input class="btn" type="button" name="fanhui" id="fanhui" value="{L("返回")}" onclick="window.location.href='department_list.php';"  style="margin-top:22px;" />
								{/if}
							</div>
						</form>
						
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

			<script src="../templates/lib/chosen/chosen.jquery.min.js"></script>
			<script src="../templates/js/pms_forms.js"></script>

			<script type="text/javascript">

				$(document).ready(function(){
					$("#select_option").chosen();

					//注册修改事件
					$('#select_option').change(function() {
						set_options_values();
					});
				})

				//设置跟踪用户选项值
				function set_options_values(){
					var options_str = '';
					$("#select_option option:selected").each(function () {
						var $option = $(this);
						var html = $option.html();
						var value = $option.val();
						options_str = options_str+','+value;
					});
					options_str = options_str.replace(/(^\,*)/g,"");
					$('#leader').val(options_str);
				}

			</script>
			
		</div>
	</body>
</html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- 样式控制 header start -->
		{php include "../templates/header.html.php"}
		<!-- 样式控制 header end -->
		
		<!-- enhanced select 控制下拉列表多选 -->
            <link rel="stylesheet" href="../templates/lib/chosen/chosen.css" />
            
        <!-- datepicker -->
            <link rel="stylesheet" href="../templates/lib/datepicker/datepicker.css" />
		<!-- nice form elements -->
            <link rel="stylesheet" href="../templates/lib/uniform/Aristo/uniform.aristo.css" />
		<!-- enhanced select -->
            <link rel="stylesheet" href="../templates/lib/chosen/chosen.css" />
            
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
                                    <a href="#">任务管理器TMS</a>
                                </li>
                                <li>
									 添加项目
                                </li>
                            </ul>
                        </div>
                    </nav>
                    
                    <form action="project_post.php?{if $pid>0}type=edit{else}type=add{/if}" enctype="multipart/form-data" method="post" class="form-horizontal" onsubmit="return chksubmit();">
                    
	                    <div class="row-fluid">
							<div class="span12">
								<h3 class="heading">{if $pid>0}{L("修改项目")}{else}{L("添加项目")}{/if}</h3>
								<div class="row-fluid">
								
									<fieldset>
										<div class="control-group formSep">
											<label for="parent_pid" class="control-label"><span class="f_req">*</span>所属项目</label>
											<div class="controls">
												{get_section('parent_pid',$project,$projectinfo['parent_pid'],$ary_first=array(0=>L("请选择")))}
												<span class="help-block">{L("添加一级项目无需选择")}</span>
											</div>
										</div>
										<div class="control-group formSep">
											<label for="project_name" class="control-label"><span class="f_req">*</span>项目名称</label>
											<div class="controls">
												<input type="text" maxlength="30" name="project_name" id="project_name" value="{$projectinfo['project_name']}" onblur="if(this.value!=''){$('#projectnamemsg').html('');}" />
												<span class="help-block" id="projectnamemsg" style="color:#ff0000;"></span>
											</div>
										</div>
										<div class="control-group formSep">
											<label for="locality" class="control-label"><span class="f_req">*</span>显示位置</label>
											<div class="controls">
												<input type="text" maxlength="3" name="locality" id="locality" value="{$projectinfo['locality']}" onblur="if(this.value!=''){$('#localitymsg').html('');}" />
												<span class="help-block" id="localitymsg" style="color:#ff0000;"></span>
											</div>
										</div>
										<div class="control-group formSep">
											<label for="priority" class="control-label"><span class="f_req">*</span>项目优先级</label>
											<div class="controls">
												{get_section('priority',$priorityStatusAry,$projectinfo['priority'],$ary_first=array(0=>L("请选择")))}
											</div>
										</div>
										<div class="control-group formSep">
											<label for="status" class="control-label"><span class="f_req">*</span>状态</label>
											<div class="controls">
												{get_section('status',$jobStatus,$projectinfo['status'],$ary_first=array(0=>L("请选择")))}
											</div>
										</div>
										<div class="control-group formSep">
											<label for="color" class="control-label">标记颜色</label>
											<div class="controls">
												<input type="text" maxlength="10" name="color" id="color" value="{$projectinfo['color']}"  />
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<input type="hidden" name="pid" id="pid" value="{$pid}" style="display:none;" />
												<button class="btn btn-gebo" type="submit" name="submit" id="submit">{L("提交")}</button>
												<input type="button" name="go_url" value="{L("返回")}" onclick="window.location.href='task_project_manager.php';" />
												<input type="reset" name="reset1" id="reset1" value="{L("重置")}" />
											</div>
										</div>
									</fieldset>
									
								</div>
								
							</div>
						</div>
					</form>
					
                </div>
            </div>
            
            
            
			<!-- 左侧菜单导航栏 sidebar start -->
            {php include "../sidebar.php"}
            <!-- 左侧菜单导航栏 sidebar end -->
            
			<!-- 尾部js加载 footer start -->
			{php include "../templates/footer.html.php"}
			<!-- 尾部js加载 footer end -->
			
			<!-- bootstrap plugins -->
			<script src="../templates/js/bootstrap.plugins.min.js"></script>
			<!-- autosize textareas -->
			<script src="../templates/js/forms/jquery.autosize.min.js"></script>
			<!-- enhanced select -->
			<script src="../templates/lib/chosen/chosen.jquery.min.js"></script>
			<!-- user profile functions -->
			<script src="../templates/js/gebo_user_profile.js"></script>
			<!-- user profile functions -->
			<script src="../templates/js/pms_forms.js"></script>
			 <!-- masked inputs 输入格式插件 -->
            <script src="../templates/js/forms/jquery.inputmask.min.js"></script>
			
			
			<!-- 脚本js控制 start -->
			
			<!-- 控制检测表单数据 -->
			<script src="../js/common.js"></script>
			
			<script language="javascript">
			function chksubmit()
			{
				var project_name = $('#project_name').val();
				var locality = $('#locality').val();
				if(trim(project_name) == '') {
					$('#projectamemsg').html('{L("项目名不能为空！")}');
					$('#project_name').focus();
					return false;
				}
				else{
					//如果是添加则进入检测，如果修改则跳过
					{if $pid<=0}
						$('#projectnamemsg').html('{L("正在检测，请稍后...")}');
						var ac_str = GetRequest('task_ajax.php?type=project&project_name='+encodeURI(project_name));
						if(ac_str == '2') {
							$('#projectnamemsg').html('');
						}
						else if(ac_str == '1') {
							$('#projectnamemsg').html('{L("项目名称已存在，请重新填写！")}');
							$('#project_name').focus();
							return false;
						}
						else {
							$('#project_namemsg').html('{L("程序可能出现异常，请联系管理员。")}');
							return false;
						}
					{/if}
				}
				if(trim(locality) != '') {
					if(isNaN(locality)) {
						$('#localitymsg').html('{L("显示位置只能填写数字！")}');
						$('#locality').focus();
						return false;
					}
				}
				$('#Submit').attr("disabled","disabled");
			}
			</script>
			<!-- 脚本js控制 end -->
			
		</div>
	</body>
</html>
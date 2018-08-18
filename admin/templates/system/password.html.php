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
							用户设置
						</li>
						<li>
							修改密码
						</li>
					</ul>
				</div>
			</nav>

			<form name="myform" id="myform" method="POST" action="" onsubmit="return chksubmit();">

				<div class="row-fluid">
					<div class="span12">
						<h3 class="heading">{L("密码修改")}</h3>
						<div class="row-fluid">

							<fieldset>
								<div class="control-group formSep">
									<label for="password" class="control-label"><span class="f_req">*</span>{L("原始密码：")}</label>
									<div class="controls">
										<input type="password" name="password" id="password" value="" onblur="if(this.value!=''){$('#passwordmsg').html('');}" />
										<span class="help-block" id="passwordmsg">{L("请输入原始密码")}</span>
									</div>
								</div>
								<div class="control-group formSep">
									<label for="password" class="control-label"><span class="f_req">*</span>{L("新密码：")}</label>
									<div class="controls">
										<input type="password" name="pwd" id="pwd" value="" onblur="if(this.value!=''){$('#pwdmsg').html('');}" />
										<span class="help-block" id="pwdmsg" style="color:#ff0000;"></span>
									</div>
								</div>
								<div class="control-group formSep">
									<label for="password" class="control-label"><span class="f_req">*</span>{L("确认密码：")}</label>
									<div class="controls">
										<input type="password" name="newpwd" id="newpwd" value="" onblur="if(this.value!=''){$('#newpwdmsg').html('');}" />
										<span class="help-block" id="newpwdmsg" style="color:#ff0000;"></span>
									</div>
								</div>
								<div class="control-group">
									<div class="controls">
										<input class="btn btn-gebo" type="submit" name="submit" id="submit" value="{L("提交")}" />
<!--										<button class="btn btn-gebo" type="submit" name="submit" id="submit">{L("提交")}</button>-->
<!--										<input type="reset" name="reset1" id="reset1" value="{L("重置")}" />-->
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
			var password = $('#password').val();
			var pwd = $('#pwd').val();
			var newpwd = $('#newpwd').val();
			if(trim(password) == '') {
				$('#passwordmsg').html('{L("请填写您的原始密码！")}');
				$('#password').focus();
				return false;
			}
			if(trim(pwd) == '') {
				$('#pwdmsg').html('{L("请输入您的新密码！")}');
				$('#pwd').focus();
				return false;
			}
			if(trim(newpwd) == '') {
				$('#newpwdmsg').html('{L("请输入您的确认密码！")}');
				$('#newpwd').focus();
				return false;
			}
			if(pwd != '' || newpwd != '') {
				if(pwd != newpwd) {
					$('#newpwdmsg').html('{L("两次密码输入不一致，请重新填写！")}');
					$('#newpwd').focus();
					return false;
				}
			}
			$('#submit1').attr('disabled','disabled');
		}
	</script>
	<!-- 脚本js控制 end -->

</div>
</body>
</html>

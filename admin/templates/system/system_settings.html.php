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
									系统设置
								</li>
								<li>系统常用设置</li>
							</ul>
						</div>
					</nav>
                    
                    <form action="" enctype="multipart/form-data" method="post" class="form-horizontal">
                    
	                    <div class="row-fluid">
							<div class="span12">
								<h3 class="heading">{L("设置后台语言")}</h3>
								<div class="row-fluid">
								
									<fieldset>
										<div class="control-group formSep">
											<label for="parentid" class="control-label"><span class="f_req">*</span>{L("语言种类：")}</label>
											<div class="controls">
												{get_section('lang_type',$LanguageAry,$_SESSION['LanguageType'],'','language')}
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<button class="btn btn-gebo" type="submit" name="submit" id="submit">{L("提交")}</button>
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
			
		</div>
	</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- 样式控制 header start -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Centone Tech -EBPM自动化平台</title>

	<!-- Bootstrap framework -->
	<link rel="stylesheet" href="./templates/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="./templates/bootstrap/css/bootstrap-responsive.min.css" />
	<!-- jQuery UI theme-->
	<link rel="stylesheet" href="./templates/lib/jquery-ui/css/Aristo/Aristo.css" />
	<!-- gebo blue theme-->
<!--	<link rel="stylesheet" href="./templates/css/blue.css" id="link_theme" />-->
	<link id="link_theme" rel="stylesheet" href="templates/../../templates/css/dark.css">
	<!--            <link rel="stylesheet" href="./templates/css/{get_random_array($DefineSystemColorAry)}.css" id="link_theme" />-->
	<!-- breadcrumbs-->
	<link rel="stylesheet" href="./templates/lib/jBreadcrumbs/css/BreadCrumb.css" />
	<!-- tooltips-->
	<link rel="stylesheet" href="./templates/lib/qtip2/jquery.qtip.min.css" />
	<!-- notifications -->
	<link rel="stylesheet" href="./templates/lib/sticky/sticky.css" />
	<!-- colorbox -->
	<link rel="stylesheet" href="./templates/lib/colorbox/colorbox.css" />
	<!-- notifications -->
	<link rel="stylesheet" href="./templates/lib/sticky/sticky.css" />
	<!-- splashy icons -->
	<link rel="stylesheet" href="./templates/img/splashy/splashy.css" />

	<!-- main styles -->
	<link rel="stylesheet" href="./templates/css/style.css" />

	<!-- Favicon -->
	<link rel="shortcut icon" href="./templates/icon-favicon.ico" />

	<!--[if lte IE 8]>
	<link rel="stylesheet" href="./templates/css/ie.css" />
	<script src="./templates/js/ie/html5.js"></script>
	<script src="./templates/js/ie/respond.min.js"></script>
	<![endif]-->

	<script>
		//* hide all elements & show preloader
		document.documentElement.className += 'js';
	</script>

	<!-- @todo 2015-05-21 将jquery基本包加载在头部支持slider，top，footer的独立js操作 -->
	<script src="./templates/js/jquery.min.js"></script>
	<!-- 样式控制 header end -->
</head>
<body class="ptrn_a">
<div id="loading_layer" style="display:none"><img src="./templates/img/ajax_loader.gif" alt="" /></div>

<!-- 加载颜色风格选择器 -->
{php include "./templates/style_switcher.html.php"}

<div id="maincontainer" class="clearfix">

	<!-- 顶部导航栏 top start -->
	{php include "./top.php"}
	<!-- 顶部导航栏 top end -->

	<!-- 主加载程序main content start -->
	<div id="contentwrapper">
		<div class="main_content">

			<div class="row-fluid">
				<div class="span12">

					<h3 class="heading">  GREE产品电子目录欢迎你 </h3>
					<div>

						<table class="table table-striped table-bordered">
							<tr>
								<td><img src="{DAEM_PATH}admin/images/indexFloor1.jpg" alt="" style="padding-right: 0px;" /></td>
								<td><img src="{DAEM_PATH}admin/images/indexFloor2.jpg" alt="" style="padding-right: 0px;" /></td>
								<td><img src="{DAEM_PATH}admin/images/indexFloor3.jpg" alt="" style="padding-right: 0px;" /></td>
								<td><img src="{DAEM_PATH}admin/images/indexFloor4.jpg" alt="" style="padding-right: 0px;" /></td>
								<td><img src="{DAEM_PATH}admin/images/indexFloor5.jpg" alt="" style="padding-right: 0px;" /></td>
							</tr>
							<tr>
								<td>家用产品：</td>
								<td>中央空调：</td>
								<td>生活电器：</td>
								<td>冰箱冰柜：</td>
								<td>工业制品：</td>
							</tr>
							<tr>
								<td>【家用内销】
									挂壁机，柜机，除湿机... 【家用出口】
									壁挂，窗机，特种空调，移动机，除湿机...</td>
								<td> 【家用中央空调】
									格力全能一体机，多联机系列，风管机系列... 【商用中央空调】
									多联机系列，离心机系列，螺杆机系列... </td>
								<td> 【内销产品】
									吸油烟机，燃气灶，消毒柜，电压力锅... 【出口产品】
									饮水机，电风扇，冷风扇，加湿器...</td>
								<td>【冰箱】
									单门，双门，多门，意式...</td>
								<td>【工业制品】
									压缩机，漆包线湿机，柜机...</td>
							</tr>
						</table>

					</div>
				</div>
			</div>

			<div class="alert alert-info tac">
				<strong>相关链接</strong><br />
				<a target="_blank" href="http://web.csj.com/gree_b2c/">产品目录系统后台管理</a>
				<span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
				<a target="_blank" href="https://web.csj.com:8000/lobtools/cmc/ManagementCenter">产品目录系统目录配置</a>
			</div>

		</div>
	</div>
	<!-- 主加载程序main content end -->


	<!-- 左侧菜单导航栏 sidebar start -->
	{php include "./sidebar.php"}
	<!-- 左侧菜单导航栏 sidebar end -->

	<!-- 尾部js加载 footer start -->
	<!--			<script src="./templates/js/jquery.min.js"></script>-->
	<!-- smart resize event -->
	<script src="./templates/js/jquery.debouncedresize.min.js"></script>
	<!-- hidden elements width/height -->
	<script src="./templates/js/jquery.actual.min.js"></script>
	<!-- js cookie plugin -->
	<script src="./templates/js/jquery.cookie.min.js"></script>
	<!-- main bootstrap js -->
	<script src="./templates/bootstrap/js/bootstrap.min.js"></script>
	<!-- bootstrap plugins -->
	<script src="./templates/js/bootstrap.plugins.min.js"></script>
	<!-- tooltips -->
	<script src="./templates/lib/qtip2/jquery.qtip.min.js"></script>
	<!-- jBreadcrumbs -->
	<script src="./templates/lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
	<!-- sticky messages -->
	<script src="./templates/lib/sticky/sticky.min.js"></script>
	<!-- fix for ios orientation change -->
	<script src="./templates/js/ios-orientationchange-fix.js"></script>
	<!-- scrollbar -->
	<script src="./templates/lib/antiscroll/antiscroll.js"></script>
	<script src="./templates/lib/antiscroll/jquery-mousewheel.js"></script>
	<!-- common functions -->
	<script src="./templates/js/gebo_common.js"></script>

	<!-- colorbox -->
	<script src="./templates/lib/colorbox/jquery.colorbox.min.js"></script>

	<!-- datatable -->
	<!--			<script src="./templates/lib/datatables/jquery.dataTables.min.js"></script>-->
	<script src="./templates/lib/datatables/jquery.dataTables_zh.min.js"></script>

	<!-- small charts 加载小图标 -->
	<script src="./templates/js/jquery.peity.min.js"></script>

	<!-- datatable functions -->
	<script src="./templates/js/gebo_datatables.js"></script>
	<!-- additional sorting for datatables -->
	<script src="./templates/lib/datatables/jquery.dataTables.sorting.js"></script>
	<!-- tables functions -->
	<script src="./templates/js/gebo_tables.js"></script>

	<!-- form表单的js -->
	<!-- datepicker -->
	<script src="./templates/lib/datepicker/bootstrap-datepicker.min.js"></script>

	<script>
		$(document).ready(function() {
			//* show all elements & remove preloader
			setTimeout('$("html").removeClass("js")',1000);
		});
	</script>
	<!-- 尾部js加载 footer end -->


	<!-- multi-column layout -->
	<script src="./templates/js/jquery.imagesloaded.min.js"></script>
	<script src="./templates/js/jquery.wookmark.js"></script>
	<!-- gallery functions -->
	<script src="./templates/js/gebo_gallery.js"></script>

</div>

<!-- Piwik -->
<script type="text/javascript">
	var _paq = _paq || [];
	_paq.push(['trackPageView']);
	_paq.push(['enableLinkTracking']);
	(function() {
		var u="//10.1.11.156/piwik/";
		_paq.push(['setTrackerUrl', u+'piwik.php']);
		_paq.push(['setSiteId', 1]);
		var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
		g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
	})();
</script>
<noscript><p><img src="//10.1.11.156/piwik/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->



</body>
</html>
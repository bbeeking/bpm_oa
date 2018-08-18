<!doctype html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>{$webtitle}</title>
</head>

<!-- 加载核心文件 -->
<script src="../js/dhtmlx/codebase/dhtmlxscheduler.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="../js/dhtmlx/codebase/dhtmlxscheduler.css" type="text/css" title="no title" charset="utf-8">


<!-- 加载伸缩扩展 -->
<script src="../js/dhtmlx/codebase/ext/dhtmlxscheduler_expand.js" type="text/javascript" charset="utf-8"></script>

<!-- 加载日历扩展 -->
<script src="../js/dhtmlx/codebase/ext/dhtmlxscheduler_minical.js" type="text/javascript" charset="utf-8"></script>

<script language="javascript" type="text/javascript" src="../js/My97DatePicker/WdatePicker.js"></script>

<!-- 加载语言包汉化 -->
<script src="../js/dhtmlx/sources/locale/locale_cn.js" type="text/javascript" charset="utf-8"></script>

<!-- 兼容其他浏览器的全屏样式设置，如不需要全屏则去除，此外也可以修改div scheduler_here的样式控制大小 -->	
<style type="text/css" media="screen">
	html, body{
		margin:0px;
		padding:0px;
		height:100%;
		overflow:hidden;
	}
	h3{
    border-bottom: 1px solid #BBBBBB;
    color: #444444;
    font-size: 16px;
    margin: 0 0 10px;
    padding: 2px 10px 1px 0;
	}
	form {
	display:block;
	font-size: 0.9em;
	text-decoration:none;
	line-height:1.3em;
	padding:4px 6px 4px 6px;
	border: 1px solid #ccc;
	border-bottom: 1px solid #bbbbbb;
	background-color: #f6f6f6;
	border-top-left-radius:3px;
	border-top-right-radius:3px;
	}
}	
</style>

<script type="text/javascript" charset="utf-8">
	function init() {
		
		scheduler.config.xml_date="%Y-%m-%d %H:%i";
		scheduler.config.prevent_cache = true;
		scheduler.locale.labels.section_template = 'details';
		scheduler.config.lightbox.sections=[	
			{name:"title", height:20, type:"textarea", map_to:"text" , focus:true},
			{name:"status",height:20, type:"template", map_to:"status" },
			{name:"builder",height:20, type:"template", map_to:"builder" },
			{name:"performer",height:20, type:"template", map_to:"performer" },
			{name:"description", height:140, type:"template", map_to:"details" },
			{name:"time", height:72, type:"calendar_time", map_to:"auto"}
//			{name:"time", height:72, type:"time", map_to:"auto"}
		]
		scheduler.config.first_hour=4;
		scheduler.locale.labels.section_location="Location";
		//scheduler.config.details_on_create=true;
		//scheduler.config.details_on_dblclick=true;

		//设置lightbox的左右按钮选择项，默认是左边：添加，取消 ；右边： 删除
		scheduler.config.buttons_left = ["dhx_cancel_btn"];
		scheduler.config.buttons_right = [] 

		//控制首次加载显示的日期
		scheduler.init('scheduler_here',new Date('{$statDate}'),"month");
		scheduler.setLoadMode("month");

		//采用php将业务查询的数据结果渲染显示
		scheduler.parse({$data},"json");
		
		//这里可以增加相应的参数，传递到数据接口中
//		scheduler.load("tmp_data.php?user=bbeeking&time=1382192074");
//		scheduler.load("../includes/load_data_dhtmlx.php?action=&status={$status}&type={$type}&builder={$builder}&performer={$performer}&statDate={$statDate}");
//		var dp = new dataProcessor("../includes/load_data_dhtmlx.php");
//		dp.init(scheduler);

	}
</script>

<body onload="init();">
	<form action="" method="get">
	<h3>{L("日程安排表")}</h3>
		<table>
		  	<tr>	
			 	<td>
				 	{L("状态：")}{get_section('status',$jobStatus,$status,$ary_first=array(0=>'请选择'),'status')}&nbsp;
				  	{L("跟踪：")}{get_section('type',$trackerStatusAry,$type,$ary_first=array(0=>'请选择'),'type')}&nbsp;
				  	{L("创建人：")}{get_section('builder',$userAry,$builder,$ary_first=array(0=>'请选择'),'builder')}&nbsp;
				  	{L("指派人：")}{get_section('performer',$userAry,$performer,$ary_first=array(0=>'请选择'),'performer')}&nbsp;
<!--				  	{L("查询日期：")}<input type="text" id="statDate" name="statDate" value="{$statDate}" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate" />&nbsp;-->
				  	<input type="submit" value="{L("查询")}" />&nbsp;&nbsp;
				 </td>
			</tr>
		</table>
	</form>
	<div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:80%;'>
		<div class="dhx_cal_navline">
			<div class="dhx_cal_prev_button">&nbsp;</div>
			<div class="dhx_cal_next_button">&nbsp;</div>
			<div class="dhx_cal_today_button"></div>
			<div class="dhx_cal_date"></div>
			<div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
			<div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
			<div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
		</div>
		<div class="dhx_cal_header">
		</div>
		<div class="dhx_cal_data">
		</div>		
	</div>
</body>
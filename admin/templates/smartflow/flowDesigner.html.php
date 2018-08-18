<!DOCTYPE html>
<html xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>流程图DEMO</title>
<link rel="stylesheet" type="text/css" href="./codebase/fonts/iconflow.css"/>
<link rel="stylesheet" type="text/css" href="./codebase/fonts/iconflow.css"/>
<link rel="stylesheet" type="text/css" href="./codebase/GooFlow.css"/>
<link rel="stylesheet" type="text/css" href="default.css"/>

	<!-- 样式控制 header start -->
	{php include "../templates/header.html.php"}
	<!-- 样式控制 header end -->

	<!-- enhanced select 控制下拉列表多选 -->
	<link rel="stylesheet" href="../templates/lib/chosen/chosen.css" />

	<style>
		.myForm{display:block;margin:0px;padding:0px;line-height:1.5;border:#ccc 1px solid;font: 12px Arial, Helvetica, sans-serif;margin:5px 5px 0px 0px;border-radius:4px;}
		.myForm .form_title{background:#428bca;padding:4px;color:#fff;border-radius:3px 3px 0px 0px;}
		.myForm .form_content{padding:4px;background:#fff;}
		.myForm .form_content table{border:0px}
		.myForm .form_content table td{border:0px}
		.myForm .form_content table .th{text-align:right;font-weight:bold;vertical-align:middle}
		.myForm .form_btn_div{text-align:center;border-top:#ccc 1px solid;background:#f5f5f5;padding:4px;border-radius:0px 0px 3px 3px;}
		#propertyForm{float:right;width:auto}
	</style>
<script type="text/javascript" src="child.js"></script>
<script type="text/javascript" src="data2.js"></script>
<!--<script type="text/javascript" src="./plugin/jquery.min.js"></script>-->
<script type="text/javascript" src="./codebase/GooFunc.js"></script>
<script type="text/javascript" src="./plugin/json2.js"></script>
<script type="text/javascript" src="./codebase/GooFlow.js"></script>
<script type="text/javascript" src="./codebase/GooFlow.color.js"></script>



<script type="text/javascript" src="./plugin/promise.min.js"></script>
<script type="text/javascript" src="./plugin/html2canvas.min.js"></script>
<!--[if lte IE 11]-->
<script type="text/javascript" src="./plugin/canvg.js"></script>
<!--[endif]-->
<script type="text/javascript" src="./codebase/GooFlow.export.js"></script>



<script type="text/javascript">
var property={
	width:950,
	height:540,
	toolBtns:["start round mix","end round","task","node","chat","state","plug","join","fork","complex mix"],
	haveHead:true,
	headLabel:true,
	headBtns:["new","open","save","undo","redo","reload","print"],//如果haveHead=true，则定义HEAD区的按钮
	haveTool:true,
	haveGroup:true,
	useOperStack:true
};
var remark={
	cursor:"选择指针",
	direct:"节点连线",
	start:"入口节点",
	"end":"结束节点",
	"task":"任务节点",
	node:"自动节点",
	chat:"决策节点",
	state:"状态节点",
	plug:"附加插件",
	fork:"分支节点",
	"join":"联合节点",
	"complex":"复合节点",
	group:"组织划分框编辑开关"
};
var demo;
$(document).ready(function(){

	//初始化chosen
	$("#ele_table").chosen();

	demo=$.createGooFlow($("#demo"),property);
	demo.setNodeRemarks(remark);

	demo.onItemDel=function(id,type){
		if(confirm("确定要删除该单元吗?")){
			this.blurItem();
			return true;
		}else{
			return false;
		}
	}

	demo.loadData(jsondata);
	//demo.reinitSize(1000,520);

	demo.onItemFocus=function(id,model){
		var obj;
		$("#ele_model").val(model);
		$("#ele_id").val(id);
		if(model=="line"){
			obj=this.$lineData[id];
			$("#ele_type").val(obj.M);
			$("#ele_left").val("");
			$("#ele_top").val("");
			$("#ele_width").val("");
			$("#ele_height").val("");
			$("#ele_from").val(obj.from);
			$("#ele_to").val(obj.to);
		}else if(model=="node"){
			obj=this.$nodeData[id];
			$("#ele_type").val(obj.type);
			$("#ele_left").val(obj.left);
			$("#ele_top").val(obj.top);
			$("#ele_width").val(obj.width);
			$("#ele_height").val(obj.height);
			$("#ele_from").val("");
			$("#ele_to").val("");
		}
		$("#ele_name").val(obj.name);
		return true;
	};
	demo.onItemBlur=function(id,model){
		document.getElementById("propertyForm").reset();
		return true;
	};


	demo.onPrintClick=function(){demo.exportDiagram("fuckyou");}
});
var out;
function Export(){
    document.getElementById("result").value=JSON.stringify(demo.exportData());
    alert(demo.$lineOper.data("tid"));
}
</script>


</head>



<body class="sidebar_left ptrn_a">
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
							流程工具
						</li>
					</ul>
				</div>
			</nav>

			<h3 class="heading"> 新增流程</h3>

<!--
<body>
<div id="demo" style="margin:10px"></div>
<input id="submit" type="button" value='导出结果' onclick="Export()"/>
<textarea id="result" row="6"></textarea>
</body>
</html>
-->
			<table>
				<tr>
					<td><div id="demo" style="margin:10px;"></div></td>
					<td style="vertical-align:middle;">
						<form class="myForm" id="propertyForm">
							<div class="form_title">属性设置</div>
							<div class="form_content">
								<table id="propertyFormTable">
									<tr><td class="th">Id：</td><td><input type="text" style="width:120px" id="ele_id" /></td></tr>
									<tr><td class="th">Name：</td><td><input type="text" style="width:120px" id="ele_name"/></td></tr>
									<tr><td class="th">Type：</td><td><input type="text" style="width:120px" id="ele_type"/></td></tr>
									<tr><td class="th">Model：</td><td><input type="text" style="width:120px" id="ele_model"/></td></tr>
									<tr><td class="th">Left-r：</td><td><input type="text" style="width:120px" id="ele_left"/></td></tr>
									<tr><td class="th">Top-r：</td><td><input type="text" style="width:120px" id="ele_top"/></td></tr>
									<tr><td class="th">Width：</td><td><input type="text" style="width:120px" id="ele_width"/></td></tr>
									<tr><td class="th">Height：</td><td><input type="text" style="width:120px" id="ele_height"/></td></tr>
									<tr><td class="th">From：</td><td><input type="text" style="width:120px" id="ele_from"/></td></tr>
									<tr><td class="th">To：</td><td><input type="text" style="width:120px" id="ele_to"/></td></tr>

									<tr>
										<td class="th">关联表单：</td>
										<td>
<!--											<input type="text" style="width:120px"  id="ele_table"/>-->
<!--											{get_section('ele_table[]',$templateDefineAry ,'',$ary_first=array(''),'ele_table','','width:120px;',$etc='data-placeholder="选择关联表单..."')}-->
											<select name="ele_table[]" id="ele_table" multiple data-placeholder="选择关联表单..."  style="width:150px;" >
												{loop $templateDefineAry $key=>$val}
												<option value="{$key}">{$val}</option>
												{/loop}
											</select>

										</td>
									</tr>
									<tr><td class="th">GateWay：</td><td><input type="text" style="width:120px" id="ele_gateway"/></td>
										<!-- 只发送当前的节点到子窗口，GET避免过长 -->
										<td class="th"><input type="button" value="展开" onclick="son=window.open('flowGatewayConfig.php?flowData='+JSON.stringify(demo.exportData().nodes),'son','width=680,height=528,top=150,left=280, toolbar=no, menubar=no, scrollbars=auto, resizable=no, location=no, status=no');"/></td>
									</tr>

								</table>
							</div>
							<div class="form_btn_div">
								<input type="hidden" id="options_value" name="options_value" value="{$options_value}" />
								<input type="reset" value="重置"/>
								<input type="button" value="确定" onclick="callback();"/>
							</div>
						</form>
					</td>
				</tr>
			</table>
			<div style="clear:both">
				<input id="submit" type="button" value='导出结果' onclick="Export()"/>
				<textarea id="result" row="6"></textarea>
			</div>


			<!--
			<div id="demo" style="margin:10px;"></div>
			<form class="myForm" id="propertyForm">
				<div class="form_title">属性设置</div>
				<div class="form_content">
					<table>
						<tr><td class="th">Id：</td><td><input type="text" style="width:120px" id="ele_id"/></td></tr>
						<tr><td class="th">Name：</td><td><input type="text" style="width:120px" id="ele_name"/></td></tr>
						<tr><td class="th">Type：</td><td><input type="text" style="width:120px" id="ele_type"/></td></tr>
						<tr><td class="th">Model：</td><td><input type="text" style="width:120px" id="ele_model"/></td></tr>
						<tr><td class="th">Left-r：</td><td><input type="text" style="width:120px" id="ele_left"/></td></tr>
						<tr><td class="th">Top-r：</td><td><input type="text" style="width:120px" id="ele_top"/></td></tr>
						<tr><td class="th">Width：</td><td><input type="text" style="width:120px" id="ele_width"/></td></tr>
						<tr><td class="th">Height：</td><td><input type="text" style="width:120px" id="ele_height"/></td></tr>
						<tr><td class="th">From：</td><td><input type="text" style="width:120px" id="ele_from"/></td></tr>
						<tr><td class="th">To：</td><td><input type="text" style="width:120px" id="ele_to"/></td></tr>
					</table>
				</div>
				<div class="form_btn_div">
					<input type="reset" value="重置"/>
					<input type="button" value="确定" onclick="alert(demo.$focus)"/>
				</div>
			</form>
			<div style="clear:both">
			<input id="submit" type="button" value='导出结果' onclick="Export()"/>
			<textarea id="result" row="6"></textarea>
			</div>
			-->

		</div>
	</div>
	<!-- 主加载程序main content end -->


	<!-- 左侧菜单导航栏 sidebar start -->
	{php include "../sidebar.php"}
	<!-- 左侧菜单导航栏 sidebar end -->

	<!-- 尾部js加载 footer start -->
	{php include "../templates/footer.html.php"}
	<!-- 尾部js加载 footer end -->

	<!-- autosize textareas -->
	<script src="../templates/js/forms/jquery.autosize.min.js"></script>
	<!-- 下拉框选项 -->
	<script src="../templates/lib/chosen/chosen.jquery.min.js"></script>


	<script type="text/javascript">

		/*
		 * 修改关联table后联动修改事件
		 */
		$(function(){
			//注册修改事件
			$('#ele_table').change(function() {
				set_options_values();
			});
		});

		//设置关联table选项值
		function set_options_values(){
			var options_str = '';
			$("#ele_table option:selected").each(function () {
				var $option = $(this);
				var html = $option.html();
				var value = $option.val();
//					    alert('显示的是' + html + '\n值是' + value);
				options_str = options_str+','+value;
			});
			options_str = options_str.replace(/(^\,*)/g,"");
			$('#options_value').val(options_str);
//					alert(options_str);
		}

		/**
		 * 提交节点相关属性
		 */
		function callback(){
//			alert($('#options_value').val());return;

			/**
			 * 遍历form下的所有字段，无需一个个获取
			 */
			var d = {};
			$("#propertyFormTable").find("tr").each(function(){
				var tdArr = $(this).children();
				var name = tdArr.eq(1).find('input').attr("id");
				var value = tdArr.eq(1).find('input').val();

				//同时将select对象也对应获取
				if(name==null||name==undefined||name==""){
					var name = tdArr.eq(1).find('select').attr("id");
					var value = tdArr.eq(1).find('select').val();
				}
//				alert(name+':'+value);
				//结果转换成json
				d[name] = value;
			});
//			alert(JSON.stringify(d));

			//发送到服务器上修改原来的流程配置
			$.ajax({
				type	: "post",
				url 	: "flowDesigner.php",
				data    : d,
				dataType:"json",
				success : function(rs){
					alert(rs);
				},
				error : function(){
					alert("配置节点属性失败!");
				}
			});

		}
	</script>

</div>
</body>
</html>
<!DOCTYPE html>
<html xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
		#propertyForm{float:;width:auto}

		textarea{
			border:0;
			background-color:transparent;
			/*scrollbar-arrow-color:yellow;
            scrollbar-base-color:lightsalmon;
            overflow: hidden;*/
			color: #666464;
			height: auto;
		}

		.myForm .form_content table td{
			padding-right:5px;
		}
	</style>
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
var jsondata = {$processDataAry["config_data"]};

/*
 节点属性获取
 */
var nodePropertyData={};
{if !empty($processDataAry["node_property_config"])}nodePropertyData = {$processDataAry["node_property_config"]}{/if}

var tableDefineConfig = {json_encode($templateDefineAry)};
var property={
	width:950,
	height:490,
//	toolBtns:["start round mix","end round","task","node","chat","state","plug","join","fork","complex mix"],
	toolBtns:["start round mix","end round mix","task","node","chat","state","plug","join","fork","complex mix"],
	haveHead:true,
	headLabel:true,
	headBtns:["new","open","save","undo","redo","reload","print"],//如果haveHead=true，则定义HEAD区的按钮
	haveTool:true,
//	haveDashed:true,
	haveGroup:true,
	useOperStack:true
};
var remark={
	cursor:"选择指针",
	direct:"节点连线",
//	dashed:"关联虚线",
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

		//加载table gateway role
		if(typeof(nodePropertyData[id])!="undefined"){
			$("#ele_table").val(HtmlUtil.htmlDecode(nodePropertyData[id]["ele_table"]));
			$("#ele_gateway").val(HtmlUtil.htmlDecode(nodePropertyData[id]["ele_gateway"]));
			$("#ele_role").val(HtmlUtil.htmlDecode(nodePropertyData[id]["ele_role"]));
		}

//		alert(nodePropertyData[id]["options_value"]);
		return true;
	};
	demo.onItemBlur=function(id,model){
		document.getElementById("propertyForm").reset();
		return true;
	};

	demo.onPrintClick=function(){demo.exportDiagram("download");}
});
var out;
function Export(){
    document.getElementById("result").value=JSON.stringify(demo.exportData());
//    alert(demo.$lineOper.data("tid"));
}

function SaveProcess(){
	var processDefine = demo.exportData();
	var id = $("#id").val();
	//发送到服务器上修改原来的流程结构
	$.ajax({
		type	: "post",
		url 	: "processDesigner.php?id="+id+"&type=SaveProcess",
		data    : processDefine,
		success : function(rs){
			alert(rs);
			window.location.reload();
		},
		error : function(){
			alert("更新流程成功!");
		}
	});
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


			<div id="demo"></div>

			<table>
				<tr>
					<td>
						<div class="span6">
							<form class="myForm" id="propertyForm" style="vertical-align:middle;">
								<div class="form_title">Node节点属性设置</div>
								<div class="form_content">
									<table id="propertyFormTable">
										<tr>
											<td class="th">Id：</td><td><input type="text" style="width:120px" id="ele_id" /></td>
											<td class="th">Name：</td><td><input type="text" style="width:120px" id="ele_name"/></td>
										</tr>
										<tr>
											<td class="th">Type：</td><td><input type="text" style="width:120px" id="ele_type"/></td>
											<td class="th">Model：</td><td><input type="text" style="width:120px" id="ele_model"/></td>
										</tr>
										<tr>
											<td class="th">关联表单：</td>
											<td><input type="text" style="width:120px" id="ele_table"/></td>
											<td class="th"><input type="button" class="btn btn-info" style="margin-bottom: 9px" value="+展开" onclick="son=window.open('flowTableConfig.php','son','width=680,height=528,top=150,left=280, toolbar=no, menubar=no, scrollbars=auto, resizable=no, location=no, status=no');"/></td>
										</tr>
										<tr>
											<td class="th">节点用户/部门：</td>
											<td><input type="text" style="width:120px" id="ele_role"/></td>
											<td class="th"><input type="button" class="btn btn-info" style="margin-bottom: 9px"  value="+展开" onclick="son=window.open('flowRoleConfig.php','son','width=680,height=528,top=150,left=280, toolbar=no, menubar=no, scrollbars=auto, resizable=no, location=no, status=no');"/></td>
										</tr>
										<tr>
											<td class="th">GateWay：</td>
											<td><input type="text" style="width:120px" id="ele_gateway"/></td>
											<td class="th"><input type="button" class="btn btn-info" style="margin-bottom: 9px"  value="+展开" onclick="son=window.open('flowGatewayConfig.php?flowData='+JSON.stringify(demo.exportData().nodes),'son','width=680,height=528,top=150,left=280, toolbar=no, menubar=no, scrollbars=auto, resizable=no, location=no, status=no');"/></td>
										</tr>
									</table>
								</div>
								<div class="form_btn_div">
									<input type="hidden" id="id" name="id" value="{$_GET["id"]}" />
									<input type="reset" value="重置" class="btn btn-danger"/>
									<input type="button" value="确定" class="btn btn-success" onclick="callback();"/>
								</div>
							</form>
						</div>
					</td>

					<td>
						<textarea id="result" row="12" style="height:173px;width: 500px;"  ></textarea><br />
						<div style="float: right">
							<input id="submit" type="button" class="btn btn-primary" value='导出流程图结果' onclick="Export()" />
							<input id="submit" type="button" value='保存流程'  class="btn btn-success" onclick="SaveProcess()" />
						</div>
					</td>
				</tr>
			</table>





		</div>
	</div>
	<!-- 主加载程序main content end -->


	<!-- 左侧菜单导航栏 sidebar start -->
	{php include "../sidebar.php"}
	<!-- 左侧菜单导航栏 sidebar end -->

	<!-- 尾部js加载 footer start -->
	{php include "../templates/footer.html.php"}
	<!-- 尾部js加载 footer end -->

	<!-- 加载common函数，创建HtmlUtil对象方法，实现html中显示的&& || 特殊符号转码 -->
	<script src="../js/common.js"></script>

	<!-- autosize textareas -->
	<script src="../templates/js/forms/jquery.autosize.min.js"></script>


	<script type="text/javascript">

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
				url 	: "processDesigner.php?id="+{$_GET["id"]}+"&type=node",
				data    : d,
//				dataType:"string",
				success : function(rs){
					alert(rs);
					window.location.reload();
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
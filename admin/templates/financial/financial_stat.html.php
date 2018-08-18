<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{L("晨曦-项目管理系统mlight pms")}</title>
<link href="../css/application.css" rel="stylesheet" type="text/css" />

<script src="../js/common.js"></script>
<script language="javascript" type="text/javascript" src="../js/My97DatePicker/WdatePicker.js"></script>
<script language="javascript" type="text/javascript" src="../js/jquery-1.8.2.min.js"></script>

</head>
<body class="controller-issues action-show">
<div id="wrapper">
<div id="wrapper2">

<div class="nosidebar" id="main">
 
    <div id="content">
		<div style="clear: both;"></div>
		  <div id="update" style="">
		  <h3>{L("财务收支明细信息")}</h3>
		  	<form name="financialForm" action="" method="get">
				<table>
				  	<tr>	
					 	<td>
					 		{L("开始日期：")}<input type="text" id="startDate" name="startDate" value="{$startDate}" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate" />&nbsp;
						  	{L("结束日期：")}<input type="text" id="endDate" name="endDate" value="{$endDate}" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate" />&nbsp;
						  	<br />
						  	<br />
						  	{L("收支：")}{get_section('inorOut',$inorOutType,$inorOut,$ary_first=array(''),'inorOut','onchange="change_section(this.options[this.options.selectedIndex].value)"')}&nbsp;
						  	
						  	{L("申请人：")}{get_section('proposer',$userAry,$proposer,$ary_first=array(''),'proposer')}&nbsp;
						  	{L("审批人：")}{get_section('approver',$userAry,$approver,$ary_first=array(''),'approver')}&nbsp;
						  	{L("审批状态：")}{get_section('appStatus',$appStateAry,$appStatus,$ary_first=array(''),'appStatus')}&nbsp;
						  	{L("标题关键字：")}<input type="text" id="keyword" name="keyword" value="{$keyword}" />
						  	<input type="submit" value="{L("查询")}" />&nbsp;&nbsp;
						  	
						  	<input type="hidden" name="selectDay" value=""/>
						  	<input type="button" id="preMonth" value="上一月" />
							<input type="button" id="nextMonth" value="下一月" />
							
						 </td>
					</tr>
					<tr>
						<td id="expenseType" style="display:none;">
							{L("支出类型：")}{get_section('appExpenseType',$applicationTypeAry,$appExpenseType,$ary_first=array(''),'appExpenseType')}&nbsp;
						</td>
						<td id="incomeType" style="display:none;">
							{L("收入类型：")}{get_section('appIncomeType',$collectionTypesAry,$appIncomeType,$ary_first=array(''),'appIncomeType')}&nbsp;
						</td>
					</tr>
				</table>
			</form>
			
			<br />
			<span><b>已支出金额合共：￥ {$pandectOutAmount}</b></span><br />
			<span><b>已收入金额合共：￥ {$pandectInAmount}</b></span><br />
			<span><b>盈利（已收入金额-已支出金额）：￥ {number_format($pandectInAmount-$pandectOutAmount,2,'.','')}</b></span><br />
			<span><b>待审批支出： {$outCount} 条，合共金额 ： ￥{$pandectOutAmountNot}</b></span><br />
			<br />
			<div id="container" class="tubiaoheight"></div>
			<?php  ?>
			<br />
			<h3></h3>
			
			
			<form action="/redmine/issues" method="post">
				<div class="autoscroll">
				<table class="list issues">
				    <thead>
				    <tr>
				    	<!--
				        <th class="checkbox hide-when-print">
				        	<a href=""  title="全选/清除">
				        	<img alt="全选/清除" src="../images/toggle_check.png" /></a>
				        </th>
				        -->
				    	  <th><a href="">#</a></th>
				          <th><a href="">类型</a></th>
				          <th><a href="">收支类型</a></th>
				          <th><a href="">收支编号</a></th>
				          <th><a href="">标题</a></th>
				          <th><a href="">金额</a></th>
				          <th><a href="">申请人</a></th>
				          <th><a href="">申请日期</a></th>
				          <th><a href="">审批状态</a></th>
				          <th><a href="">审批人</a></th>
				          <th><a href="">审批日期</a></th>
				          <th><a href="">操作</a></th>
				  </tr></thead>
				  
				  <tbody>
				    {if $dataAry}
	  					{loop $dataAry $key=>$val}
							  <tr class="hascontextmenu odd issue status-4 priority-4 overdue created-by-me assigned-to-me">
<!--							    <td class="checkbox hide-when-print"><input name="ids[]" value="11322" type="checkbox" /></td>-->
							    	<td class="id">{$val['id']}</td>
							    	
							    	<!-- 如果传递的查询 收支类型 必须同时附加 收支 -->
							        <td>
							        	{if ($val['inorOut'] == '1')}
							        		<a href="financial_stat.php?inorOut={$val['inorOut']}&appIncomeType={$val['type']}">
							        		{$collectionTypesAry[$val['type']]}
							        	{else}
							        		<a href="financial_stat.php?inorOut={$val['inorOut']}&appExpenseType={$val['type']}">
							        		{$applicationTypeAry[$val['type']]}
							        	{/if}
							        	</a>
							        </td>
							        
							        <td>{$inorOutType[$val['inorOut']]}</td>
							        <td>{$val['detail_record']}</td>
							        <td class="subject"><a href="financial_view.php?id={$val['id']}">{$val['title']}</a></td>
							        <td style="text-align:right;">￥{$val['amount']}</td>
							        <td>{$userAry[$val['proposer']]}</td>
							        <td>{$val['application_date']}</td>
							        <td>
							        	<a href="financial_stat.php?appStatus={$val['status']}">{$appStateAry[$val['status']]}</a>
							        </td>
							        <td>{$userAry[$val['approver']]}</td>
						        	<td>{$val['approval_date']}</td>
						        	<td>
						        		{if ($val['status'] == '1')}
						        		<a onclick="deal_list('{$val['title']}','{$val['id']}','2');">审核通过</a> |
						        		<a onclick="deal_list('{$val['title']}','{$val['id']}','3');">驳回</a> | 
						        		<a onclick="deal_list('{$val['title']}','{$val['id']}','4');">取消申请</a> | 
						        		<a onclick="del_list('{$val['title']}','{$val['id']}');">删除 </a>
						        		{else}
						        		-
						        		{/if}
						        	</td>
							  </tr>
						  {/loop}
					{/if}
			    </tbody>
			</table>
			{$pagehtml}
			</div>
		</form>
		</div>
    </div>
</div>

<div id="footer">
  <div class="bgl"><div class="bgr">
    Powered by mlight <a href="">MLight</a> © 2013-2015 YueFeng Leung
  </div></div>
</div>
</div>
</div>


<script language="javascript" type="text/javascript" src="../js/charts.js"></script>
<script language="javascript" type="text/javascript" src="../js/highcharts/highcharts.js"></script>
<script language="javascript" type="text/javascript" src="../js/highcharts/modules/exporting.js"></script>

<script language="javascript">

//加载时直接生成图表
$(document).ready(function() {

	initChart("800","270","0","container","line",{$xvalue},{$series},'{$title}',"金额",1,'元',true,"null","60");
	//	initChart("665","270","0","container","line",xvalue,series,'新增用户',"数据",5,'个',true,"null","60");
});

//删除款项 
function del_list(title,id)
{
	cs = '{L('是否删除款项：')} "'+title+'" ?';
	if(confirm(cs)) 
	window.location = 'financial_del.php?id='+id;
}

//审批款项 通过,驳回,取消申请
function deal_list(title,id,status)
{
	des = '';
	if(status == '2') des = '审核通过';
	else if(status == '3') des = '驳回';
	else if(status == '4') des = '取消申请';
	if(des == '') return;
	
	cs = '是否'+des+'款项： "'+title+'" ?';
	if(confirm(cs)) 
	window.location = 'financial_update.php?id='+id+'&status='+status;
}

//控制加载的收支下拉框
function change_section(selectedIndex){
	//类型为收入
	if(selectedIndex == '1'){
		document.getElementById("expenseType").style.display = "none" ;
		document.getElementById("incomeType").style.display = "block" ;
	}
	//类型为支出
	else if(selectedIndex == '2'){
		document.getElementById("expenseType").style.display = "block" ;
		document.getElementById("incomeType").style.display = "none" ;
	}
	else{
		document.getElementById("expenseType").style.display = "none" ;
		document.getElementById("expenseType").style.display = "none" ;
	}
}

$("#preMonth").click(function(){
	$("input[name='selectDay']").attr("value","preMonth");
	$("form[name='financialForm']").submit();
});
$("#nextMonth").click(function(){
	$("input[name='selectDay']").attr("value","nextMonth");
	$("form[name='financialForm']").submit();
});

</script>

</body>
</html>


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
			<h3>{L("试卷/测试题库")}&nbsp;<a>[当前共收录试题合计<span style="color:red;">{$total}</span>份]</a>
				<span style="color:green;float:right;">&nbsp;语文:XXX份&nbsp;数学:XXX份&nbsp;英语:XXXX份</span>
			</h3>
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
			<h3></h3>
			
			
			<form action="" method="post">
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
				          <th><a href="">试卷编号</a></th>
				          <th><a href="">试卷名称</a></th>
				          <th><a href="">科目类型</a></th>
				          <th><a href="">年级</a></th>
				          <th><a href="">学期</a></th>
				          <th><a href="">学校</a></th>
				          <th><a href="">出题/出版社</a></th>
				          <th><a href="">年份</a></th>
				          <th><a href="">录入人</a></th>
				          <th><a href="">操作</a></th>
				  </tr></thead>
				  
				  <tbody>
				    {if $dataAry}
	  					{loop $dataAry $key=>$val}
							  <tr class="hascontextmenu odd issue status-4 priority-4 overdue created-by-me assigned-to-me">
<!--							    <td class="checkbox hide-when-print"><input name="ids[]" value="11322" type="checkbox" /></td>-->
							    	<td class="id">{$val['id']}</td>
							        <td>{$val['pid']}</td>
							        <td class="subject"><a href="qb_paper_input.php?pid={$val['pid']}">{$val['title']}</a></td>
							        <td>{$DefineSubjectType[$val['subject_type']]}</td>
							        <td>{$DefineGradeAry[$val['grade']]}</td>
							        <td>{$DefineTermType[$val['term']]}</td>
							        <td>{$DefineSchoolAry[$val['school']]}</td>
							        <td>{$val['author']}</td>
							        <td>{$val['year']}</td>
							        <td>{$userAry[$val['editor']]}</td>
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

</script>

</body>
</html>


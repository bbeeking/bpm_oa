<!-- 为兼容ueditor 增加模板头部增加输出空行 -->
<?php echo "&nbsp;";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{L("晨曦-项目管理系统mlight pms")}</title>
<link href="../css/application.css" rel="stylesheet" type="text/css" />

<script src="../js/common.js"></script>
<script language="javascript" type="text/javascript" src="../js/My97DatePicker/WdatePicker.js"></script>
</head>
<body class="controller-issues action-show">
<div id="wrapper">
<div id="wrapper2">

<!--<div class="" id="main">-->
<div class="nosidebar" id="main">
 
    <div id="content">
        
		<h2>请款单编号 #{$result['detail_record']} 
			{if (empty($result['status']) || $result['status'] == '1')}
				<a href="#show" name="hide" onclick="update_financial();">[更新]</a> <a onclick="del_financial('{$result['title']}','{$result['id']}');">[删除]</a>
			{/if}
		</h2>
		<div class="issue status-4 priority-4 overdue created-by-me assigned-to-me details">
		    <div class="next-prev-links contextual">
		      « 上一页 |<span class="position">1/35</span> |<a href="" title="#10642">下一页 »</a>
		    </div>
		  
			<div class="subject">
			<div><h3>{$result['title']}</h3></div>
			</div>
		        <p class="author">
		        	由 <a onclick="check_proposer_financial('{$result['proposer']}');">{$userAry[$result['proposer']]}</a> 
		        	在 <a href="" title="{date('Y-m-d',$result['create_time'])}">{number_format((time()-$result['create_time'])/86400)}</a> 天之前添加.
		        </p>
		
				<table class="attributes">
					<tbody>
						<tr><td>状态：{$appStateAry[$result['status']]}</td></tr>
						<tr><td>收支：{$inorOutType[$result['inorOut']]}</td></tr>
						
						<?php if ($result['inorOut'] == '1'){ ?>
							<tr><td>收支类型：{$collectionTypesAry[$result['type']]}</td></tr>
							<tr><td>操作员：<a onclick="check_proposer_financial('{$result['proposer']}');">{$userAry[$result['proposer']]}</a></td></tr>
						<?php }elseif ($result['inorOut'] == '2'){ ?>
							<tr><td>收支类型：{$applicationTypeAry[$result['type']]}</td></tr>
							<tr><td>申请人：<a onclick="check_proposer_financial('{$result['proposer']}');">{$userAry[$result['proposer']]}</a></td></tr>
						<?php }?>
						
						<tr><td>请款金额：￥{$result['amount']}</td></tr>
						<tr><td>请款日期：{$result['application_date']}</td></tr>
						<tr><td>审批人：<a onclick="check_approver_financial('{$result['approver']}');">{$userAry[$result['approver']]}</a></td></tr>
						<tr><td>审批日期：{$result['approval_date']}</td></tr>
					</tbody>
				</table>
				
				<hr />
		
		  		<p><strong>详情：</strong></p>
				<div>
						<p>{$result['detail']}</p>
				</div>
				
		</div>
		
		
		<div style="clear: both;"></div>
		  <div id="update" style="display:none;">
		  <h3>更新<a href="#hide" name="show" onclick="hidden_update();">[隐藏]</a></h3>
		  <form action="financial_update.php" class="edit_issue" enctype="multipart/form-data" id="issue-form" method="get" onsubmit="return check_form()">
		    <div class="box">
		        <fieldset class="tabular"><legend>填写属性</legend>
			        <div id="all_attributes">
			        	<p>
			        		<label>单据编号<span class="required"> *</span></label>{$result['detail_record']}
			        	</p>
			        	<p>
							<label for="title">收支类型<span class="required"> *</span></label>{$inorOutType[$result['inorOut']]}
						</p>
			        	
			        	<?php if ($result['inorOut'] == '1'){ ?>
				        	<p>
								<label for="proposer">操作人<span class="required"> *</span></label>{$userAry[$result['proposer']]}
							</p>
				        	<p>
								<label for="issue_tracker_id">请款类型<span class="required"> *</span></label>
								{get_section('appType',$collectionTypesAry,$result['type'],$ary_first=array(''),'appType')}
							</p>
			        	<?php }elseif ($result['inorOut'] == '2'){ ?>
				        	<p>
								<label for="proposer">请款人<span class="required"> *</span></label>
								{get_section('proposer',$userAry,$result['proposer'],$ary_first=array(''),'proposer')}
							</p>
				        	<p>
								<label for="issue_tracker_id">请款类型<span class="required"> *</span></label>
								{get_section('appType',$applicationTypeAry,$result['type'],$ary_first=array(''),'appType')}
							</p>
			        	<?php }?>
			        	
						<p>
							<label for="application_date">申请日期<span class="required"> *</span></label>
							<input type="text" id="application_date" name="application_date" value="{$result['application_date']}" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate" />
						</p>
						<p>
							<label for="title">标题<span class="required"> *</span></label>
							<input type="text" id="title" name="title" value="{$result['title']}" size="50" />
						</p>
						<p>
							<label for="title">金额<span class="required"> *</span></label>
							<input id="amount" name="amount" value="{$result['amount']}" size="20" type="text"/>
						</p>
						<p>
						  <label>备注信息</label>
						  <span id="issue_description_and_toolbar" style="display:none">
						    <div class="jstEditor">
						    		<textarea name="myEditor" id="myEditor">{$result['detail']}</textarea>
						    </div>
						    <div class="jstHandle"></div>
						  </span>
						</p>
			        </div>
		        </fieldset>
		        
		    </div>
		    <input type="hidden" id="inorOut" name="inorOut" value="{$result['inorOut']}"/>
		    <input type="hidden" id="id" name="id" value="{$result['id']}"/>
		    <input name="commit" value="提交" type="submit" />
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

<script type="text/javascript" src="../js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../js/ueditor/ueditor.all.js"></script> 
<script language="javascript">
//激活ueditor
window.UEDITOR_HOME_URL = "/pms/admin/js/";
var editor = new UE.ui.Editor();
editor.render("myEditor");

//更新任务
function update_financial()
{
	document.getElementById("update").style.display = "block";
}

//删除任务
function del_financial(title,id)
{
	cs = '{L('是否删除记录：')} "'+title+'" ?';
	if(confirm(cs)) 
	window.location = 'financial_del.php?id='+id;
}

//隐藏更新
function hidden_update()
{
	document.getElementById("update").style.display = "none";
}

//查看申请用户的其他记录
function check_proposer_financial(proposer)
{
	window.location = 'financial_stat.php?proposer='+proposer;
}
//查看审批用户的其他记录
function check_approver_financial(approver)
{
	window.location = 'financial_stat.php?approver='+approver;
}

function check_form(){
	
	//判断收支类型是否为空
	var inorOut = document.getElementById("inorOut").value;
	if (inorOut == null || inorOut == 0){
		alert("请选择收支类型");return false;
	}

	//根据收支类型，决定获取那个类型
	var appType = document.getElementById("appType").value;
	if (appType == null || appType == 0){
		alert("请选择收支项类型");return false;
	}	
	

	//判断日期是否为空
	var application_date = document.getElementById("application_date").value;
	if (application_date == null || application_date == 0){
		alert("请填写登记日期");return false;
	}

	//判断标题是否为空
	var title = document.getElementById("title").value;
	if (title == null || title == 0){
		alert("请填写标题");return false;
	}

	//判断金额是否为空
	var amount = document.getElementById("amount").value;
	if (amount == null || amount == 0){
		alert("请填写金额");return false;
	}
}
</script>

</body>
</html>

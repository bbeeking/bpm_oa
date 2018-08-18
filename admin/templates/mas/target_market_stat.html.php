<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{L("晨曦-项目管理系统mlight pms")}</title>
<link href="../css/application.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/common.js"></script>
<script language="javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../js/ueditor/ueditor.all.js"></script>

<script language="javascript">
	$(document).ready(function(){
		//激活ueditor
		window.UEDITOR_HOME_URL = "/pms/admin/js/";
		var editor = new UE.ui.Editor();
		editor.render("myEditor1");
	});
</script>

</head>

<body class="controller-issues action-show">
<div id="wrapper">
<div id="wrapper2">

<div class="nosidebar" id="main">
 
    <div id="content">
		  <div id="update">
		  <h3>{if $id>0}{L("修改目标市场信息")}{else}{L("添加目标市场信息")}{/if}</h3>
		  
			<form method="post" action="menu_post.php?{if $id>0}type=edit{else}type=add{/if}" onsubmit="return chksubmit()" class="edit_issue" enctype="multipart/form-data" id="issue-form">
				<input type="hidden" name="mid" id="mid" value="{$menuinfo['m_id']}" style="display:none;" />
				<div class="box">
					<fieldset class="tabular"><legend>{L("属性")}</legend>
					<div id="all_attributes">
					
						<!-- 左侧表单 -->
		        		<div class="splitcontentleft">
		        			<p>
								<label>{L("名称：")}<span class="required"> *</span></label>
								<input type="text" maxlength="30" name="name" id="name" value="" />&nbsp;&nbsp;
								<span id="nameMsg" style="color:#ff0000;"></span>
							</p>
							<p>
								<label>{L("潜在客户数量：")}<span class="required"> *</span></label>
								<input type="text" maxlength="3" name="potential_customer " id="potential_customer " value="" />&nbsp;&nbsp;
								<span id="potentialCustomerMsg" style="color:#ff0000;"></span>
							</p>
							<p>
								<label>{L("周期流失率：")}<span class="required"> *</span></label>
								<input type="text" maxlength="3" name="cycle_turnover" id="cycle_turnover" value="" />&nbsp;&nbsp;
								<span id="cycleTurnoverMsg" style="color:#ff0000;"></span>
							</p>
							<p>
								<label>{L("当前覆盖率：")}<span class="required"> *</span></label>
								<input type="text" maxlength="3" name="coverage_rate" id="coverage_rate" value="" />&nbsp;&nbsp;
								<span id="coverageRateMsg" style="color:#ff0000;"></span>
							</p>
		        		</div>
		        		
		        		
		        		<!-- 右侧表单 -->
		        		<div class="splitcontentright">
		        			<p>
								<label>{L("位置/地址：")}<span class="required"> *</span></label>
								<input type="text" name="locate" id="locate" maxlength="100" value="" />&nbsp;&nbsp;
								<span id="locateMsg" style="color:#ff0000;"></span>
							</p>
							<p>
								<label>{L("流失周期：")}<span class="required"> *</span></label>
								<input type="text" maxlength="3" name="erosion_cycle" id="erosion_cycle" value="" />&nbsp;&nbsp;
								<span id="erosionCycleMsg" style="color:#ff0000;"></span>
							</p>
							<p>
								<label>{L("固定流失周期日：")}<span class="required"> *</span></label>
								<input type="text" maxlength="3" name="erosion_date" id="erosion_date" value="" />&nbsp;&nbsp;
								<span id="erosionDateMsg" style="color:#ff0000;"></span>
							</p>
							<p>
								<label>{L("干扰数量：")}<span class="required"> *</span></label>
								<input type="text" maxlength="3" name="confuse" id="confuse" value="" />&nbsp;&nbsp;
								<span id="confuseMsg" style="color:#ff0000;"></span>
							</p>
		        		</div>
		        		
						<p>
							<label>备注内容<span class="required"> *</span></label>
						  	<a href="#" ><img alt="Edit" src="../images/edit.png" /></a>
						  	<span id="issue_description_and_toolbar" style="display:none">
							    <div class="jstEditor">
							    	<textarea cols="40" rows="10" style="height:100px;" name="myEditor1" id="myEditor1">{$question_content}</textarea>
							    </div>
							    <div class="jstHandle"></div>
						  	</span>
						</p>
						<p>
							<label>{L("是否关闭：")}<span class="required"> *</span></label>
							<input type="radio" name="isstop" id="isstop" value="1" {if ($menuinfo['isstop'] != '0' && $menuinfo['isstop'] != '2')}checked{/if} />{L("是")}&nbsp;
							<input type="radio" name="isstop" id="isstop" value="0" {if $menuinfo['isstop'] == '0'}checked{/if} />{L("否")}&nbsp;
							<input type="radio" name="isstop" id="isstop" value="2" {if $menuinfo['isstop'] == '2'}checked{/if}/>{L("所有")}
						</p>
						
					</div>
					</fieldset>
					<input type="submit" name="Submit" id="Submit" value="{L("提交")}" />
					<input type="reset" name="reset1" id="reset1" value="{L("重置")}" />
					<input type="button" name="go_url" value="{L("返回")}" onclick="window.location.href='menu_list.php';" />
				</div>
			</form>

		</div>
    </div>
</div>

</div>
</div>

</body>
</html>
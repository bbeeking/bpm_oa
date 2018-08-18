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
<script type="text/javascript" src="../js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../js/ueditor/ueditor.all.js"></script> 
<script language="javascript">
	//激活ueditor
	window.UEDITOR_HOME_URL = "/pms/admin/js/";
	var editor = new UE.ui.Editor();
	editor.render("myEditor");
	
	function check_form(){
		
		//判断收支类型是否为空
		var inorOut = document.getElementById("inorOut").value;
		if (inorOut == null || inorOut == 0){
			alert("请选择收支类型");return false;
		}

		//根据收支类型，决定获取那个类型
		if (inorOut == 1){
			var appIncomeType = document.getElementById("appIncomeType").value;
			if (appIncomeType == null || appIncomeType == 0){
				alert("请选择收费项类型");return false;
			}
		}
		else{
			var appExpenseType = document.getElementById("appExpenseType").value;
			if (appExpenseType == null || appExpenseType == 0){
				alert("请选择支出项类型");return false;
			}
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
</script>
</head>
<body class="controller-issues action-show">
<div id="wrapper">
<div id="wrapper2">

<div class="nosidebar" id="main">
 
    <div id="content">
		<div style="clear: both;"></div>
		  <div id="update" style="">
		  <h3>财务收支明细登记表</h3>
		  <form action="" class="edit_issue" enctype="multipart/form-data" id="issue-form" method="get" onsubmit="return check_form()">
		    <div class="box">
		        <fieldset class="tabular"><legend>填写属性</legend>
		        <div id="all_attributes">
		        	<p>
						<label for="title">收支类型<span class="required"> *</span></label>
						{get_section('inorOut',$inorOutType,$inorOut,$ary_first=array(''),'inorOut','onchange="change_section(this.options[this.options.selectedIndex].value)"')}
					</p>
					
					<p id="expenseType" style="display:none;">
						<label for="proposer">请款人<span class="required"> *</span></label>{get_section('proposer',$userAry,$userName,'','proposer')}
						<br/>
						<label>支出类型<span class="required"> *</span></label>
						{get_section('appExpenseType',$applicationTypeAry,$appExpenseType,$ary_first=array(''),'appExpenseType')}
					</p>
					
					<p id="incomeType" style="display:none;">
						<label for="proposer">操作人<span class="required"> *</span></label>{$userAry[$userName]}
						<br/>
						<label>收入类型<span class="required"> *</span></label>
						{get_section('appIncomeType',$collectionTypesAry,$appIncomeType,$ary_first=array(''),'appIncomeType')}
					</p>
					
					<p>
						<label for="application_date">登记日期<span class="required"> *</span></label>
						<input type="text" id="application_date" name="application_date" value="{$appDate}" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate" />
					</p>
					<p>
						<label for="title">标题<span class="required"> *</span></label>
						<input type="text" id="title" name="title" value="{$title}" size="80" />
					</p>
					<p>
						<label for="title">金额<span class="required"> *</span></label>
						<input id="amount" name="amount" value="{$amount}" size="20" type="text"/>
					</p>
					<p>
					  <label>备注信息</label>
<!--					  <a href="#" ><img alt="Edit" src="" /></a>-->
					  <span id="issue_description_and_toolbar" style="display:none">
					    <div class="jstEditor">
					    		<textarea cols="60" rows="10" style="height:150px;" name="myEditor" id="myEditor">{$content}</textarea>
					    </div>
					    <div class="jstHandle"></div>
					  </span>
					</p>
		        </div>
		        </fieldset>
		    </div>
		    <input id="submit" name="submit" value="添加并继续" type="submit" />
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

</body>
</html>
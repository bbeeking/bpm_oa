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

		//判断姓名是否为空
		var name = document.getElementById("name").value;
		if (name == null || name == 0){
			alert("请填写姓名");return false;
		}
		//判断性别是否为空
		var sex = document.getElementById("sex").value;
		if (sex == null || sex == 0){
			alert("请选择性别");return false;
		}
		//判断日期是否为空
		var birth = document.getElementById("birth").value;
		if (birth == null || birth == 0){
			alert("请填写出生日期");return false;
		}
		//判断性别是否为空
		var school = document.getElementById("school").value;
		if (school == null || school == 0){
			alert("请填写在读学校");return false;
		}
		//判断年级是否为空
		var grade = document.getElementById("grade").value;
		if (grade == null || grade == 0){
			alert("请填写年级");return false;
		}
		var parent = document.getElementById("parent").value;
		if (parent == null || parent == 0){
			alert("请填写家长姓名");return false;
		}
		var tel = document.getElementById("tel").value;
		if (tel == null || tel == 0){
			alert("请填写联系电话");return false;
		}
		//判断入学日期是否为空
		var enrollment_date = document.getElementById("enrollment_date").value;
		if (enrollment_date == null || enrollment_date == 0){
			alert("请填写入学日期");return false;
		}
		var course = document.getElementById("course").value;
		if (course == null || course == 0){
			alert("请填写报读课程");return false;
		}
		var status = document.getElementById("status").value;
		if (status == null || status == 0){
			alert("请填写在读状态");return false;
		}
		var addr = document.getElementById("addr").value;
		if (addr == null || addr == 0){
			alert("请填写家庭住址");return false;
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
		  <h3>学员信息登记表</h3>
		  <form action="" class="edit_issue" enctype="multipart/form-data" id="issue-form" method="post" onsubmit="return check_form()">
		    <div class="box">
		        <fieldset class="tabular"><legend>填写属性 </legend>
		        <div id="all_attributes">
		        
		        	<!-- 左侧表单 -->
		        	<div class="splitcontentleft">
			        	<p>
			        		<label for="name">姓名<span class="required"> *</span></label>
			        		<input type="text" id="name" name="name" value="" size="20" />
			        	</p>
			        	<p>
							<label for="birth">出生日期<span class="required"> *</span></label>
							<input type="text" id="birth" name="birth" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate" />
						</p>
						<p>
			        		<label for="school">在读学校<span class="required"> *</span></label>
			        		<input type="text" id="school" name="school" value="" size="20" />
			        	</p>
			        	<p>
			        		<label for="parent">联系家长<span class="required"> *</span></label>
			        		<input type="text" id="parent" name="parent" value="" size="20" />
			        	</p>
			        	<p>
			        		<label for="qq">QQ号码</label>
			        		<input type="text" id="qq" name="qq" value="" size="20" />
			        	</p>
			        	<p>
							<label for="enrollment_date">入学日期<span class="required"> *</span></label>
							<input type="text" id="enrollment_date" name="enrollment_date" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate" />
						</p>
						<p>
							<label for="course">报读课程<span class="required"> *</span></label>
							{get_section('course',$EnumCourseAry,$course,$ary_first=array(0=>'请选择'),'course','','width:152px;')}
						</p>
		        		<p>
			        		<label for="addr">家庭住址<span class="required"> *</span></label>
			        		<input type="text" id="addr" name="addr" value="" size="35" />
			        	</p>
		        	</div>
		        	
		        	
		        	<!-- 右侧表单 -->
		        	<div class="splitcontentright">
		        		<p>
							<label for="sex">性别<span class="required"> *</span></label>
							{get_section('sex',$sexAry,$sex,$ary_first=array(0=>'请选择'),'sex','','width:152px;')}
						</p>
						<!-- 轮空 -->
						<p></p>
						<p>
							<label for="grade">当前年级<span class="required"> *</span></label>
							{get_section('grade',$DefineGradeAry,$grade,$ary_first=array(0=>'请选择'),'grade','','width:152px;')}
						</p>
						<p>
			        		<label for="tel">联系电话<span class="required"> *</span></label>
			        		<input type="text" id="tel" name="tel" value="" size="20" />
			        	</p>
		        		<p>
			        		<label for="phone">学生手机</label>
			        		<input type="text" id="phone" name="phone" value="" size="20" />
			        	</p>
						<p>
							<label for="channel">报读渠道</label>
							{get_section('channel',$channelAry,$channel,$ary_first=array(0=>'请选择'),'channel','','width:152px;')}
						</p>
						<p>
							<label for="entry_level">入学成绩<span class="required"> *</span></label>
							<input type="text" id="entry_level" name="entry_level" value="" size="20" />
						</p>
						<p>
							<label for="status">在读<span class="required"> *</span></label>
							{get_section('status',$statusAry,$status,$ary_first=array(0=>'请选择'),'status','','width:152px;')}
						</p>
		        	</div>
						
					<p>
					  <label>备注信息</label>
					  <span id="issue_description_and_toolbar" style="display:none">
					    <div class="jstEditor">
				    		<textarea cols="60" rows="10" style="height:150px;" name="myEditor" id="myEditor"></textarea>
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
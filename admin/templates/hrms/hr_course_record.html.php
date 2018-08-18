<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$webtitle}</title>
<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />

<!-- 设置打印的样式 -->
<link rel="stylesheet" media="print" type="text/css" href="../css/print.css" />

<script type="text/javascript" src="../js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="../js/common.js"></script>
<script type="text/javascript" src="../js/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="../js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../js/ueditor/ueditor.all.js"></script>

<script language="javascript">
	$(document).ready(function(){
		//激活ueditor
		window.UEDITOR_HOME_URL = "/pms/eonline/js/";
		var editor = new UE.ui.Editor();
		editor.render("myEditor");
	});
</script>
</head>

<body class="controller-my action-page">
<div id="wrapper">
	<div id="wrapper2">
		<div class="nosidebar" id="main">
		    <div id="sidebar"></div>
		
		    <div id="content">
		    	<!-- style="position:fixed;width:49%;float:left;" -->
				<div>
		 			<div class="mypage-box">
		    			<h3>课堂信息登记表</h3>
						<form action="" method="post">
						<div id="paper_attribute" class="box" >
					        <fieldset class="tabular"><legend>课程属性</legend>
					        <div id="all_attributes">
								<div id="attributes" class="attributes">
									<div class="splitcontent">
										<div class="splitcontentleft">
											<p>
												<label>课程代号<span class="required"> *</span></label>
												<input type="text" id="cid" name="cid" size="8" value="{$cid}" style="width:152px;" /></br>
												<span style="color:red;">(教师姓首字母大写+科目英文首字母大写+三位数字 如张老师的数学提高一班:ZM001)</span>
											</p>
											<p>
												<label>任课教师<span class="required"> *</span></label>
												{get_section('teacher_account',$userAry,$teacher_account,$ary_first=array(''),'teacher_account','','width:152px;')}
											</p>
											<p>
												<label>学期<span class="required"> *</span></label>
												{get_section('term',$DefineTermType,$term,$ary_first=array(''),'term','','width:152px;')}
											</p>
											<p>
												<label>课程开始日期<span class="required"> *</span></label>
												<input type="text" id="startDate" name="startDate" value="{$startDate}" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate" />&nbsp;
											</p>
											<p>
												<label>当前状态<span class="required"> *</span></label>
												{get_section('status',$DefineCourseStatusAry,$status,$ary_first=array(''),'status','','width:152px;')}
											</p>
										</div>
										
										<div class="splitcontentright">
											<p>
												<label>课程名称<span class="required"> *</span></label>
												<input type="text" id="course_name" name="course_name" size="64" value="{$course_name}" style="width:152px;" />
											</p>
											<p></p>
											<p>
												<label>年级<span class="required"> *</span></label>
												{get_section('grade',$DefineGradeAry,$grade,$ary_first=array(''),'grade','','width:152px;')}
											</p>
											<p>
												<label>科目类型<span class="required"> *</span></label>
												{get_section('subject_type',$DefineSubjectType,$subject_type,$ary_first=array(''),'subject_type','','width:152px;')}
											</p>
											<p>
												<label>课程关闭日期</label>
												<input type="text" id="endDate" name="endDate" value="{$endDate}" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate" />&nbsp;
											</p>
										</div>
										
									</div>
								</div>
								
								<div style="margin-left:180px;">
									<div>
										<label>全部学员</label>
										{get_section('select1',$studentInfoAry,'',$ary_first=array(''),'select1','','width:150px;height:200px;float:left;padding:4px;',' multiple="multiple"')}
										<!-- 
										<select multiple="multiple" id="select1" style="width:150px;height:200px; float:left; padding:4px; ">
								            <option value="超级管理员">超级管理员</option>
								            <option value="普通管理员">普通管理员</option>
								            <option value="信息发布员">信息发布员</option>
								            <option value="产品管理员">产品管理员</option>
								            <option value="信息发布员">信息发布员</option>
								            <option value="管理员">管理员</option>
										</select>
										-->
									</div>
									<div style="float:left">
										<span id="add">
											<input type="button" class="btn" value="&gt;"/>
										</span><br />
										<span id="add_all">
											<input type="button" class="btn" value="&gt;&gt;"/>
										</span><br />
										<span id="remove">
											<input type="button" class="btn" value="&lt;"/>
										</span><br />
										<span id="remove_all">
											<input type="button" class="btn" value="&lt;&lt;"/>
										</span>
									</div>
									<div>
										<select multiple="multiple" id="select2" name="select2" style="width:150px;height:200px;float:left;padding:4px;"></select>
									</div>
								</div>
						
								<p>
								  <label>课程信息备注</label>
								  <a href="#" ><img alt="Edit" src="../images/edit.png" /></a>
								  <span id="issue_description_and_toolbar" style="display:none">
								    <div class="jstEditor">
								    		<textarea cols="40" rows="10" style="height:100px;" name="myEditor" id="myEditor">{$detail}</textarea>
								    </div>
								    <div class="jstHandle"></div>
								  </span>
								</p>
								
								<input type="hidden" id="options_value" name="options_value" value="{$options_value}" />
<!--								<input type="button" value="test" onclick="test();" />-->
								<input type="submit" name="submit" value="提交课程信息" />
					        </div>
					        </fieldset>
					    </div>
					    </form>
					    
					</div>
					
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

<script type="text/javascript">
	//下拉框交换JQuery
	$(function(){
	    $('#add').click(function() {
	        $('#select1 option:selected').appendTo('#select2');
	        set_options_values();
	    });
	    $('#remove').click(function() {
	        $('#select2 option:selected').appendTo('#select1');
	        set_options_values();
	    });
	    $('#add_all').click(function() {
	        $('#select1 option').appendTo('#select2');
	        set_options_values();
	    });
	    $('#remove_all').click(function() {
	        $('#select2 option').appendTo('#select1');
	        set_options_values();
	    });
	    $('#select1').dblclick(function(){ //绑定双击事件
	        //获取全部的选项,删除并追加给对方
	        $("option:selected",this).appendTo('#select2');
	        set_options_values();
	    });
	    $('#select2').dblclick(function(){
	       $("option:selected",this).appendTo('#select1');
	       set_options_values();
	    });
	});

	//设置报读班级的学员选项值
	function set_options_values(){
		var options_str = '';
		$('#select2 option').each(function () {
		    var $option = $(this);
		    var html = $option.html();
		    var value = $option.val();
//		    alert('显示的是' + html + '\n值是' + value);
		    options_str = options_str+','+value;
		});
		options_str = options_str.replace(/(^\,*)/g,"");
		$('#options_value').val(options_str);
//		alert(options_str);
	}

//	function test(){
//		var aa = $('#options_value').val();
//		alert(aa);
//		}
</script>

</body>
</html>

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
		    			<h3>课程登记表/课程签到表</h3>
						<form action="" method="post">
						<div id="paper_attribute" class="box" >
					        <fieldset class="tabular"><legend>课程属性</legend>
					        <div id="all_attributes">
								<div id="attributes" class="attributes">
								
									<div class="splitcontent">
										<div class="splitcontentleft">
											<p>
												<label>日期<span class="required"> *</span></label>
												{if $isSpecial=='1'}
													<input type="text" id="recordDate" name="recordDate" value="{$recordDate}" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate" />&nbsp;
												{else}
													<span style="color:#2A5685;font-weight:bold;">{$recordDate}</span>
													<input type="hidden" name="recordDate" id="recordDate" value="{$recordDate}" />
												{/if}
											</p>
											<p>
												<label>任课老师<span class="required"> *</span></label>
												{if $isSpecial=='1'}
													{get_section('teacher',$userAry,$teacher,$ary_first=array(''),'teacher','','width:152px;')}
												{else}
													<span style="color:#ffffff;font-weight:bold;background:#507AAA;">{$userAry[$_SESSION['UserName']]}</span>
													<input type="hidden" name="teacher" id="teacher" value="{$_SESSION['UserName']}" />
												{/if}
											</p>
											<p>
												<label>课程选择<span class="required"> *</span></label>
												{get_section('course',$courseInfoAry,$course,$ary_first=array(''),'course','onchange="get_course_student(this.options[this.options.selectedIndex].value)"','width:152px;')}
												<span style="color:red;">(应勤学生：<font id="course_student_str" style="color:green;font-weight:bold;"></font>)</span>
											</p>
											<p>
												<label>上课时间<span class="required"> *</span></label>
												<input type="text" id="startTime" name="startTime" value="{$startTime}" onclick="WdatePicker({dateFmt:'HH:mm'})" class="Wdate" />&nbsp;
												<input type="text" id="endTime" name="endTime" value="{$endTime}" onclick="WdatePicker({dateFmt:'HH:mm'})" class="Wdate" />&nbsp;<br />
												<a onclick="absence_student_record();">[添加缺勤学员]</a><a onclick="add_extend_detail();">[添加备注信息]</a>
											</p>
										</div>
									</div>
								</div>
								
								<div class="control-group formSep">
									<label class="control-label">缺勤学员：</label>
									<div class="controls">
										<select name="user_languages" id="user_languages" multiple data-placeholder="Choose a language(s)..." >
											<option selected="selected">语文</option>
											<option>数学</option>
											<option>英语</option>
											<option>物理</option>
											<option>化学</option>
											<option>生物</option>
										</select>
									</div>
								</div>
								
								<div id="absence_student_record" style="margin-left:180px;">
									<div>
										<label>缺勤学员</label>
										<div id="section_html">
											{get_section('select1',$studentInfoAry,'',$ary_first=array(''),'select1','','width:150px;height:200px;float:left;padding:4px;',' multiple="multiple"')}
										</div>
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
								
								<div id="extend_detail" style="">
									<p>
									  <label>备注信息</label>
									  <a href="#" ><img alt="Edit" src="../images/edit.png" /></a>
									  <span id="issue_description_and_toolbar" style="display:none">
									    <div class="jstEditor">
									    		<textarea cols="40" rows="10" style="height:100px;" name="myEditor" id="myEditor">{$detail}</textarea>
									    </div>
									    <div class="jstHandle"></div>
									  </span>
									</p>
								</div>
								
								<p>
									<input type="hidden" id="options_value" name="options_value" value="{$options_value}" />
									<input type="submit" name="submit" value="签到" />
								</p>
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

	function absence_student_record(){
		document.getElementById("absence_student_record").style.display = "block";
	}
	function add_extend_detail(){
		document.getElementById("extend_detail").style.display = "block";
	}

	//ajax获取课程的应勤学生人数
	function get_course_student(cid){
		$.ajax({
			type	: "post",
			url 	: "hr_ajax_deal.php",
			data    :{"cid" : cid, "type" : "select"},
				dataType: "json",
				success : function(rs){
//					alert(rs);
					$('#course_student_str').html(rs['course_student_str']);
					$('#section_html').html(rs['section_html'])
				},
				error : function(){
					alert("获取数据失败!");
				}
			});
	}
</script>

</body>
</html>

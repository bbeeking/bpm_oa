<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$webtitle}</title>
<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="../js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="../js/common.js"></script>
<script type="text/javascript" src="../js/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="../js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../js/ueditor/ueditor.all.js"></script>
<script type="text/javascript" src="../js/mathjax/MathJax.js?config=AM_HTMLorMML-full"></script>
<script type="text/javascript" src="../js/ajaxfileupload.js"></script>
<script type="text/javascript" src="../js/showtipinfo.js"></script>

<script language="javascript">
	$(document).ready(function(){
		//激活ueditor
		window.UEDITOR_HOME_URL = "/pms/admin/js/";
		var editor = new UE.ui.Editor();
		editor.render("myEditor");

		var editor1 = new UE.ui.Editor();
		editor1.render("myEditor1");

		var editor2 = new UE.ui.Editor();
		editor2.render("myEditor2");
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
		<div id="list-left" class="splitcontentleft"  >
 			<div class="mypage-box">
    			<h3>试题录入
    				<a id="divTipAbrand1" onMouseOver="showTipsInfo('divTip1','divTipAbrand1')" onClick="return false;" onMouseOut="hideTipsInfo('divTip1')" style="float:right;color:green;">asciiML公式提示</a>
    				<div id=divTip1 onMouseOver="showTipsInfo('divTip1','divTipAbrand1');" onMouseOut="hideTipsInfo('divTip1');">
    					<table>
    						<thead>
    							<tr>
    								<td>公式</td>
    								<td>结果</td>
    							</tr>
    						</thead>
    						<tbody>
    							<tr>
    								<td>A_1,B_2,C_3</td>
    								<td>`A_1,B_2,C_3`</td>
    							</tr>
    							<tr>
    								<td>~=,~~,sum,prod,+-,_|_</td>
    								<td>`~=,~~,sum,prod,+-,_|_`</td>
    							</tr>
    							<tr>
    								<td>x = sqrt((-b +- b^2-4ac)/(2a)) .</td>
    								<td>`x = sqrt((-b +- b^2-4ac)/(2a)) .`</td>
    							</tr>
    							<tr>
    								<td>{:{(x=1+2),(y=a+b):} </td>
    								<td>`{:{(x=1+2),(y=a+b):}` </td>
    							</tr>
    							<tr>
    								<td>{:(x=1+2),(y=a+b):}</td>
    								<td>`{:(x=1+2),(y=a+b):}`</td>
    							</tr>
    							<tr>
    								<td>{:((x=1),(y=a+b):}</td>
    								<td>`{:((x=1),(y=a+b):}`</td>
    							</tr>
    							<tr>
    								<td>(:(x=1),(y=a+b):}</td>
    								<td> `(:(x=1),(y=a+b):}`</td>
    							</tr>
    						</tbody>
    					</table>
					</div>
    			</h3>
			    
			    <form action="" method="post"  enctype='multipart/form-data'>
			    <div id="question_content" class="box">
			        <fieldset class="tabular"><legend>题目属性</legend>
			        <div id="all_attributes">
						<div id="attributes" class="attributes">
							<div class="splitcontent">
								<div class="splitcontentleft">
									<p>
										<label>题目类型<span class="required"> *</span></label>
										{get_section('question_type',$DefineQuestionTypeAry,$question_type,$ary_first=array(''),'question_type')}
									</p>
									<p>
										<label>章节</label>
										{get_section('chapter',$DefineChapterAry,$chapter,$ary_first=array(''),'chapter')}
									</p>
									<p>
										<label>年级</label>
										{get_section('grade',$DefineGradeAry,$grade,$ary_first=array(''),'grade')}
									</p>
									<p>
										<label>难度系数(1/2/3/4/5)</label>
										<input type="text" id="q_degree" name="q_degree" size="8" value="{$q_degree}" />
									</p>
								</div>
							
								<div class="splitcontentright">
									<p>
										<label>科目类型<span class="required"> *</span></label>
										{get_section('subject_type',$DefineSubjectType,$subject_type,$ary_first=array(''),'subject_type')}
									</p>
									<p>
										<label>学期</label>
										{get_section('term',$DefineTermType,$term,$ary_first=array(''),'term')}
									</p>
									<p>
										<label>录入人:</label>
										<span style="color:blue;">{$userAry[$editor]}</span>
									</p>
									<p>
										<label style="color:#2a5685;">校对:</label>
										<span style="color:blue;">{get_section('proofStatus',$DefineProofStatusAry,$proofStatus,$ary_first=array(''),'proofStatus')}</span>
									</p>
									<!-- 
									<p>
										<label style="color:#2a5685;">审核:</label>
										<span style="color:blue;">{get_section('appState',$appStateAry,$appState,$ary_first=array(''),'appState')}</span>
									</p>
									-->
								</div>
							</div>
						</div>
						
						<p>
							<label><span style="color:red;">知识点(标签/索引)</span></label>
							<input type="text" id="q_index" name="q_index" size="45" /><br />
							<span>多个知识点用分号';'隔开</span>
						</p>
				
						<p>
							<label>试题内容<span class="required"> *</span></label>
						  	<a href="#" ><img alt="Edit" src="../images/edit.png" /></a>
						  	<span id="issue_description_and_toolbar" style="display:none">
							    <div class="jstEditor">
							    	<textarea cols="40" rows="10" style="height:100px;" name="myEditor1" id="myEditor1">{$question_content}</textarea>
							    </div>
							    <div class="jstHandle"></div>
						  	</span>
						</p>
						
						<p>
							<label>题目附加图片路径</label>
							<span id="divPreview">
								<input type='file' name='fileQst' id='fileQst' onchange="PreviewImage(this,'icon_img','divPreview');" />
							</span>
							<img class="border-radius-5" src="" alt="" id="icon_img" width="120px" style="margin-left:12%;"/>
						</p>
						
						<p><a onclick="add_option_attribute();">[+显示隐藏添加项]</a></p>
						<div id="optionDiv" style="display:none;">
							<p>
								<label>选项A</label>
								<input type="text" id="optionA" name="optionA" value="" size="30" />
								
								<span id="divOptionA">
									<input type='file' name='fileOptionA' id='fileOptionA' onchange="PreviewImage(this,'optionImgA','divOptionA');" />
								</span>
								<img class="border-radius-5" src="" alt="" id="optionImgA" width="120px" style="margin-left:12%;"/>
							</p>
							<p>
								<label>选项B</label>
								<input type="text" id="optionB" name="optionB" value="" size="30" />
								
								<span id="divOptionB">
									<input type='file' name='fileOptionB' id='fileOptionB' onchange="PreviewImage(this,'optionImgB','divOptionB');" />
								</span>
								<img class="border-radius-5" src="" alt="" id="optionImgB" width="120px" style="margin-left:12%;"/>
							</p>
							<p>
								<label>选项C</label>
								<input type="text" id="optionC" name="optionC" value="" size="30" />
								
								<span id="divOptionC">
									<input type='file' name='fileOptionC' id='fileOptionC' onchange="PreviewImage(this,'optionImgC','divOptionC');" />
								</span>
								<img class="border-radius-5" src="" alt="" id="optionImgC" width="120px" style="margin-left:12%;"/>
							</p>
							<p>
								<label>选项D</label>
								<input type="text" id="optionD" name="optionD" value="" size="30" />
								
								<span id="divOptionD">
									<input type='file' name='fileOptionD' id='fileOptionD' onchange="PreviewImage(this,'optionImgD','divOptionD');" />
								</span>
								<img class="border-radius-5" src="" alt="" id="optionImgD" width="120px" style="margin-left:12%;"/>
							</p>
						</div>
						<p>
							<label>正确答案</label>
							<input type="text" id="right_answer" name="right_answer" value="{$right_answer}" size="30" />
						</p>
						<p>
						  <label>答案参考及解析</label>
						  <a href="#" ><img alt="Edit" src="../images/edit.png" /></a>
						  <span id="issue_description_and_toolbar" style="display:none">
						    <div class="jstEditor">
						    	<textarea cols="40" rows="10" style="height:100px;" name="myEditor2" id="myEditor2">{$answer_analyze}</textarea>
						    </div>
						    <div class="jstHandle"></div>
						  </span>
						</p>
						
						<input type="hidden" id="question_pid" name="question_pid" value="{$pid}" />
						<input type="hidden" id="qid" name="qid" value="" />
						<input type="hidden" id="tty" name="tty" value="qa" />
						<input type="button" value="提交试题信息" onclick="ajax_submit_question_attribute();" />
						<input type="button" value="删除试题" onclick="ajax_del_question_attribute();" />
						<input type="button" value="弹出来" onclick="test();" />
						
			        </div>
			        </fieldset>
			    </div>
			    </form>
			</div>
		</div>

		<div id="list-right" class="splitcontentright">
			<div class="mypage-box">
    		<h3>试题预览 #{$qid}</h3>
			<form action="" method="post">
			<table class="list issues">
			<thead>
				<tr>
			    	<th style="text-align:left;">操作：
			    		<a onclick="hide_parse();">[隐藏答案及解析]</a>
			    		<a onclick="show_parse();">[显示答案及解析]</a>
			    	</th>
			    </tr>
		    </thead>
			</table>
			
			<?php $i=1;?>
			{loop $questionAry $data}
				<div id="question-div" style="over-flow:auto;">
					<table style="border: 2px solid #d1d1d1;margin-top:24px;width:100%;table-layout: auto;WORD-BREAK: break-all; WORD-WRAP: break-word">
						<tbody>
							<tr>
								<td align="left" valign="top">
									<span class="update-question-info-{$i}">
										<a onclick="update_question_info('{$data['qid']}');">
										{if $data['proof_status'] == '2'}
											<font style="color:red;">(修改)</font>
										{else}
											<font>(校正)</font>
										{/if}
										</a>
										<a style="color:red;" onclick="ajax_del_question_attribute('{$data['qid']}');">(删除)</a>
									</span>
									<b>{$i}.</b> {$data['question_content']}
									
									<!--  
									<br />
										{$data['qid']}
									<br />
									-->
									
								</td>
								{if !empty($data['question_img_path'])}
								<td>
									<img align="right" src="{$data['question_img_path']}">
								</td>
								{/if}
							</tr>
							<!-- 如果是选择题的话则输出选项框 -->
							{if $data['question_type'] == 'ocq' || $data['question_type'] == 'mcq'}
							<tr>
								<td colspan=2>
									<table style="width:100%;border:1px dotted #ccc;">
									<tr>
										<td>
											A.
											{if !empty($data['optionA'])}{$data['optionA']}{/if}
											{if !empty($data['a_option_img_path'])}
												<br /><img src="{$data['a_option_img_path']}"></img>
											{/if}
										</td>
										<td>
											B.
											{if !empty($data['optionB'])}{$data['optionB']}{/if}
											{if !empty($data['b_option_img_path'])}
												<br /><img src="{$data['b_option_img_path']}"></img>
											{/if}
										</td>
										<td>
											C.
											{if !empty($data['optionC'])}{$data['optionC']}{/if}
											{if !empty($data['c_option_img_path'])}
												<br /><img src="{$data['c_option_img_path']}"></img>
											{/if}
										</td>
										<td>
											D.
											{if !empty($data['optionD'])}{$data['optionD']}{/if}
											{if !empty($data['d_option_img_path'])}
												<br /><img src="{$data['d_option_img_path']}"></img>
											{/if}
										</td>
									</tr>
									</table>
								</td>
							</tr>
							{/if}
						</tbody>
					</table>
				</div>
				<div style="background-color:#a9c9e2;">
					正确答案：{$data['right_answer']}
					<div>{$data['answer_analyze']}</div>
				</div>
				<?php $i++;?>
			{/loop}
			
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

//隐藏显示试卷的答案
function hide_parse(){
	<?php for ($k=1;$k<=$iCount;$k++){?>
		$(".paper-answer-content-{$k}").hide();
	<?php }?>
}
function show_parse(){
	<?php for ($k=1;$k<=$iCount;$k++){?>
		$(".paper-answer-content-{$k}").show();
	<?php }?>
}

/**
 * 显示试题的选择项输入层
 */
function add_option_attribute(){
	$("#optionDiv").show();
}

/**
 * 从题库中移除该试题
 */
function ajax_del_question_attribute(qid){
	if (qid == ''){
		var qid = $('#qid').val();
	}
	$.ajax({
		type	: "post",
		url 	: "qb_ajax_question_deal.php",
		data    :{"qid":qid,"isAjax":true,"type":"question_remove"},
//			dataType: "String",
			success : function(rs){
				location.reload(true);
			},
			error : function(){
				alert("从试卷中移除试题失败!");
			}
		});
}

function test(){
	//获取ueditor的村文本内容
//	alert(UE.getEditor('myEditor1').getContentTxt());
	var win_art=window.open("http://www.baidu.com","info","width=794px,height=1090px,resizable=notop=0,left=0,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,status=no")
}

/**
 * 添加及修改试题内容
 */
function ajax_submit_question_attribute(){
	var q_degree = $('#q_degree').val();
	var chapter = $('#chapter').val();
	var question_type = $('#question_type').val();
	var subject_type = $("#subject_type").val();
	var q_index = $('#q_index').val();
	
//	var myEditor1 = $('#myEditor1').val();
	var myEditor1 = UE.getEditor('myEditor1').getContentTxt();
	
	var optionA = $('#optionA').val();
	var optionB = $('#optionB').val();
	var optionC = $('#optionC').val();
	var optionD = $('#optionD').val();
	var right_answer = $('#right_answer').val();
	
//	var myEditor2 = $('#myEditor2').val();
	var myEditor2 = UE.getEditor('myEditor2').getContentTxt(); 
	
	var qid = $('#qid').val();
	var author = $('#author').val();
	var grade = $('#grade').val();
	var term = $('#term').val();

	//2014-09-16增加校对状态
	var proofStatus = $('#proofStatus').val();

	//验证必要数据的完整性 question_type,subject_type,myEditor2
	if (question_type==0 || question_type=='')
	{
	    alert("题目类型不能为空");return;
	}
	if (subject_type==0 || subject_type=='')
	{
	    alert("科目类型不能为空");return;
	}

	$.ajaxFileUpload({
		url:'qb_ajax_question_deal.php',
		secureuri:false,
		
		//处理多文件上传的修改部分
//		fileElementId:'fileQst',
		fileElementId:['fileQst','fileOptionA','fileOptionB','fileOptionC','fileOptionD'],//原先是fileElementId:’id’ 只能上传一个
		
		dataType: 'String',
		data:{"q_degree":q_degree,"chapter":chapter,"question_type":question_type,"q_index":q_index,
				"myEditor1":myEditor1,"optionA":optionA,"optionB":optionB,"optionC":optionC,
				"optionD":optionD,"right_answer":right_answer,"myEditor2":myEditor2,
				"subject_type":subject_type,"grade":grade,"term":term,"proofStatus":proofStatus,
				"qid":qid,"author":author,"isAjax":true,"type":"question_process"},
		success: function (rs){
			location.reload(true);
//			location.href = './qb_question_input.php';
		},
		error : function(){
			alert("获取数据失败!");
		}
	});

}

//对应的题目数组中取出该题目的信息内容显示,结合试卷的编号进行控制更新
function update_question_info(qid){
	$("#qid").val(qid);
	$.ajax({
		type	: "post",
		url 	: "qb_ajax_question_deal.php",
		data    :{"qid" : qid,"type" : "select"},
			dataType: "json",
			success : function(rs){
//				alert(rs['qid']);
//				$('#user_design_menu').html(rs);
				
				$("#q_degree").val(rs['degree']);
				$("#chapter").val(rs['chapter']);
				$("#question_type").val(rs['question_type']);
				$("#q_index").val(rs['q_index']);
				$("#subject_type").val(rs['subject_type']);
				
				$("#optionA").val(rs['optionA']);
				$("#optionB").val(rs['optionB']);
				$("#optionC").val(rs['optionC']);
				$("#optionD").val(rs['optionD']);
				$("#right_answer").val(rs['right_answer']);

				$("#term").val(rs['term']);
				$("#proofStatus").val(rs['proof_status']);
				$("#grade").val(rs['grade']);

				//动态加载题目的图片
//				$("#icon_img").html('<img class="border-radius-5" src="'+rs['question_img_path']+'" id="icon_img" width="120px" style="margin-left:12%;"/>');
				document.getElementById("icon_img").src=rs['question_img_path'];
				document.getElementById("optionImgA").src=rs['a_option_img_path'];
				document.getElementById("optionImgB").src=rs['b_option_img_path'];
				document.getElementById("optionImgC").src=rs['c_option_img_path'];
				document.getElementById("optionImgD").src=rs['d_option_img_path'];

				//true 是追加的形式
//				UE.getEditor('myEditor1').setContent('欢迎使用ueditor', true);
				UE.getEditor('myEditor1').setContent(rs['question_content']);
				UE.getEditor('myEditor2').setContent(rs['answer_analyze']);

			},
			error : function(){
				alert("获取数据失败!");
			}
		});
}

</script>

</body>
</html>

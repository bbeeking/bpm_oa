<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$webtitle}</title>
<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/menu-css.css" />

<script type="text/javascript" src="../js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="../js/common.js"></script>
<script type="text/javascript" src="../js/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="../js/mathjax/MathJax.js?config=AM_HTMLorMML-full"></script>
<script type="text/javascript" src="../js/menu_min.js"></script>
</head>

<body class="controller-my action-page">
<div id="wrapper">
<div id="wrapper2">
<div class="nosidebar" id="main">
    <div id="sidebar"></div>

    <div id="content">
    	<!-- style="position:fixed;width:49%;float:left;" -->
<!--    	A4 style="width:756px;height:1086px;"		-->
			<h3>试题预览</h3>
			<form action="" method="get">
			<table>
			  	<tr>	
				 	<td>
					  	{L("年级：")}{get_section('grade',$DefineGradeAry,$grade,$ary_first=array(''),'grade')}&nbsp;&nbsp;
					  	{L("科目：")}{get_section('subject_type',$DefineSubjectType,$subject_type,$ary_first=array(''),'subject_type')}&nbsp;&nbsp;
					  	{L("学期：")}{get_section('term',$DefineTermType,$term,$ary_first=array(''),'term')}&nbsp;&nbsp;
					  	{L("章节：")}{get_section('chapter',$DefineChapterAry,$chapter,$ary_first=array(''),'chapter')}&nbsp;&nbsp;
					 	{L("题目类型：")}{get_section('question_type',$DefineQuestionTypeAry,$question_type,$ary_first=array(''),'question_type')}&nbsp;&nbsp;
					  	{L("录入者：")}{get_section('last_editor',$userAry,$last_editor,$ary_first=array(''),'last_editor')}&nbsp;&nbsp;
					  	<br /><br />
					  	{L("难度系数：")}<input type="text" id="q_degree" name="q_degree" size="8" value="{$q_degree}" />&nbsp;&nbsp;
					  	{L("校对：")}{get_section('proofStatus',$DefineProofStatusAry,$proofStatus,$ary_first=array(''),'proofStatus')}&nbsp;&nbsp;
					  	{L("审核：")}{get_section('appStatus',$DefineAppStatusAry,$appStatus,$ary_first=array(''),'appStatus')}&nbsp;&nbsp;
					  	{L("知识点：")}<input type="text" id="q_index" name="q_index" size="45" />&nbsp;&nbsp;
<!--					  	{L("题目内容(模糊识别)：")}-->
					  	<input type="submit" name="submit" value="{L("查询")}" />&nbsp;&nbsp;
					 </td>
				</tr>
			</table>
			</form>
			
			<br />
			<span><b>当前题库容量合计：<font style="font-size:18px;color:blue;">{check_empty_num($totalNum)}</font> 条,&nbsp;&nbsp;数学：<font style="font-size:18px;color:green;">{$countAry['math']} </font>条,&nbsp;&nbsp;
					物理：<font style="font-size:18px;color:green;">{check_empty_num($countAry['phy'])}</font> 条,&nbsp;&nbsp;
					化学： <font style="font-size:18px;color:green;">{check_empty_num($countAry['che'])}</font> 条&nbsp;&nbsp; </b>
			</span><br />
			<span><b>已校对题目共：<font style="font-size:18px;color:blue;">{check_empty_num($proofCountAry['1'])}</font> 条,&nbsp;&nbsp;
					未校对题目剩余：<font style="font-size:18px;color:red;">{check_empty_num($proofCountAry['0'])}</font> 条, &nbsp;&nbsp;
					返回修改题目： <font style="font-size:18px;color:red;">{check_empty_num($proofCountAry['2'])}</font> 条, &nbsp;&nbsp;
					已修改题目：<font style="font-size:18px;color:green;">{check_empty_num($proofCountAry['3'])}</font> 条 &nbsp;&nbsp;</b>
			</span><br />
			<span><b>已审核通过题目共：<font style="font-size:18px;color:blue;">{check_empty_num($appCountAry['1'])}</font> 条 ,&nbsp;&nbsp;
					审核不通过共有：<font style="font-size:18px;color:red;">{check_empty_num($appCountAry['2'])}</font> 条, &nbsp;&nbsp;
					未审核题目剩余： <font style="font-size:18px;color:green;">{check_empty_num($appCountAry['0'])}</font> 条 &nbsp;&nbsp;</b>
			</span><br />
			<span><b>各教师校对题目数量
					{loop $teacherProofCountAry $teacher $tCount}
						{if !empty($teacher)}
							{$teacher} : <font style="color:blue;">{$tCount}</font> 条 &nbsp;&nbsp;
						{/if}
					{/loop}
					</b>
			</span><br />
			<br />
			
			<h3></h3>
			
			<!--  
			<div style="width:268px;margin:30px auto 0 auto;float:left;">
				<div class="vtitle"><em class="v v02"></em>第1章 有理数</div>
					<div class="vcon">
					<ul class="vconlist clearfix">
						<li class="select"><a href="javascript:;">1.1 正数和负数</a></li>
						<li><a href="javascript:;">1.2 有理数</a></li>
						<li><a href="javascript:;">1.3 有理数的加减法</a></li>
						<li><a href="javascript:;">1.4 有理数的乘除法</a></li>
						<li><a href="javascript:;">1.5 有理数的乘方</a></li>
					</ul>
				</div>
				<div class="vtitle"><em class="v"></em>第2章 整式的加减</div>
					<div class="vcon" style="display: none;">
					<ul class="vconlist clearfix">
						<li><a href="javascript:;">2.1 整式</a></li>
						<li><a href="javascript:;">2.2 整式的加减</a></li>
					</ul>
				</div>
				<div class="vtitle"><em class="v"></em>第3章 一元一次方程</div>
					<div class="vcon" style="display: none;">
					<ul class="vconlist clearfix">
						<li><a href="javascript:;">3.1 从算式到方程</a></li>
						<li><a href="javascript:;">3.2 一元一次方程1</a></li>
						<li><a href="javascript:;">3.3 一元一次方程2</a></li>
						<li><a href="javascript:;">3.4 一元一次方程实际问题</a></li>
					</ul>
				</div>
				<div class="vtitle"><em class="v"></em>第4章 几何图形初步</div>
					<div class="vcon" style="display: none;">
					<ul class="vconlist clearfix">
						<li><a href="javascript:;">4.1 几何图形</a></li>
						<li><a href="javascript:;">4.2 直线、射线、线段</a></li>
						<li><a href="javascript:;">4.3 角</a></li>
					</ul>
				</div>
			</div>
			-->

<!--			<div style="width:756px;float:right;margin-right:10%;">-->

			<div style="width:756px;float:left;margin-left:15%;">
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
										<span class="update-question-info-{$i}"><a onclick="update_question_info('{$data['qid']}');" title="{$data['qid']}">(校正)</a></span>
										<b>{$i}.</b> {$data['question_content']}
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
						<div style="float:right;margin-right:15px;">
							{if $data['app_status'] == '0'}
								<a onclick="deal_list('{$data['qid']}','1');">审核通过 </a> | 
								<a onclick="deal_list('{$data['qid']}','2');">审核不通过 </a>
							{else}
								{if $data['app_status'] == '1'}
									<a>添加<img src="../images/add.png" alt="添加到选题车" title="添加到选题车" /></a>
								{else}
									{if $data['app_status'] == '2'}
										<span style="color:red;">已经驳回修改</span>
									{/if}
								{/if}
							{/if}
						</div>
						<div>{$data['answer_analyze']}</div>
					</div>
					<?php $i++;?>
				{/loop}
				
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

<script type="text/javascript">

//加载下拉框的js包
$(function(){
	//菜单隐藏展开
	var tabs_i=0
	$('.vtitle').click(function(){
		var _self = $(this);
		var j = $('.vtitle').index(_self);
		if( tabs_i == j ) return false; tabs_i = j;
		$('.vtitle em').each(function(e){
			if(e==tabs_i){
				$('em',_self).removeClass('v01').addClass('v02');
			}else{
				$(this).removeClass('v02').addClass('v01');
			}
		});
		$('.vcon').slideUp().eq(tabs_i).slideDown();
	});
})

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
 * 从试卷中移除该试题
 */
function ajax_del_question_attribute(){
	var qid = $('#qid').val();
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
				"subject_type":subject_type,"grade":grade,"term":term,
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

//审核题目状态 通过,返回修改
function deal_list(qid,app_status)
{
	des = '';
	if(app_status == '1') des = '审核通过';
	else if(app_status == '2') des = '审核不通过，返回修改';
	if(des == '') return;
	
	cs = '是否'+des+'该题目 ?';
	if(confirm(cs)) {
		$.ajax({
			type	: "post",
			url 	: "qb_ajax_question_deal.php",
			data    :{"qid":qid,"isAjax":true,"type":"question_app","app_status":app_status},
				dataType: "Json",
				success : function(rs){
					if (rs['sign'] == '0'){
						alert(rs['content']);
					}
					else
					{
						location.reload(true);
					}
				},
				error : function(){
					alert("审批操作失败!");
				}
			});
	}
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
				
				//true 是追加的形式
//				UE.getEditor('myEditor1').setContent('欢迎使用ueditor', true);
				UE.getEditor('myEditor1').setContent(rs['question_content']);
				UE.getEditor('myEditor2').setContent(rs['answer_analyze']);

				$("#optionA").val(rs['optionA']);
				$("#optionB").val(rs['optionB']);
				$("#optionC").val(rs['optionC']);
				$("#optionD").val(rs['optionD']);
				$("#right_answer").val(rs['right_answer']);

				//动态加载题目的图片
//				$("#icon_img").html('<img class="border-radius-5" src="'+rs['question_img_path']+'" id="icon_img" width="120px" style="margin-left:12%;"/>');
				document.getElementById("icon_img").src=rs['question_img_path'];
				document.getElementById("optionImgA").src=rs['a_option_img_path'];
				document.getElementById("optionImgB").src=rs['b_option_img_path'];
				document.getElementById("optionImgC").src=rs['c_option_img_path'];
				document.getElementById("optionImgD").src=rs['d_option_img_path'];

			},
			error : function(){
				alert("获取数据失败!");
			}
		});
}

</script>

</body>
</html>

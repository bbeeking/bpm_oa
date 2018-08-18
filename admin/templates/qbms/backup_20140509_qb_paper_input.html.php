<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$webtitle}</title>
<link href="../css/application.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="../js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="../js/common.js"></script>
<script type="text/javascript" src="../js/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="../js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../js/ueditor/ueditor.all.js"></script> 
<script type="text/javascript" src="../js/mathjax/MathJax.js?config=AM_HTMLorMML-full"></script>
<script language="javascript">
	$(document).ready(function(){
		//激活ueditor
		window.UEDITOR_HOME_URL = "/pms/eonline/js/";
		var editor = new UE.ui.Editor();
		editor.render("myEditor");
		editor.render("myEditor2");
		editor.render("myEditor3");
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
    			<h3>试卷录入管理器
    				<a>[隐藏]</a> 
    				<a id="u_paper_a" onclick="update_paper_attribute();" style="color:red;background-color:#FFFFDD;">[试卷属性]</a> 
    				<a id="u_question_a" onclick="update_question_content();">[试题内容]</a>
    			</h3>
				<form action="" method="post">
				<div id="paper_attribute" class="box" >
			        <fieldset class="tabular"><legend>试卷属性</legend>
			        <div id="all_attributes">
			        	<p>
							<label for="title">试卷名<span class="required"> *</span></label>
							<input type="text" id="title" name="title" size="40" />
						</p>
						
						<div id="attributes" class="attributes">
							<div class="splitcontent">
								<div class="splitcontentleft">
									<p>
										<label for="issue_tracker_id">科目类型<span class="required"> *</span></label>
										{get_section('type',$trackerStatusAry,$type,$ary_first=array(''),'type')}
									</p>
									<p>
										<label for="issue_tracker_id">学期<span class="required"> *</span></label>
										{get_section('type',$trackerStatusAry,$type,$ary_first=array(''),'type')}
									</p>
									<p>
										<label for="issue_tracker_id">教材版本<span class="required"> *</span></label>
										{get_section('type',$trackerStatusAry,$type,$ary_first=array(''),'type')}
									</p>
									<p>
										<label for="issue_tracker_id">学校<span class="required"> *</span></label>
										{get_section('type',$trackerStatusAry,$type,$ary_first=array(''),'type')}
									</p>
									<p>
										<label for="issue_tracker_id">难度系数<span class="required"> *</span></label>
										<input type="text" id="title" name="title" size="8" />
									</p>
									<p>
										<label for="issue_tracker_id">出题人<span class="required"> *</span></label>
										<input type="text" id="title" name="title" size="8" />
									</p>
								</div>
							
								<div class="splitcontentright">
									<p>
										<label for="issue_tracker_id">年级<span class="required"> *</span></label>
										{get_section('type',$trackerStatusAry,$type,$ary_first=array(''),'type')}
									</p>
									<p>
										<label for="issue_tracker_id">年份<span class="required"> *</span></label>
										{get_section('type',$trackerStatusAry,$type,$ary_first=array(''),'type')}
									</p>
									<p>
										<label for="issue_tracker_id">地区<span class="required"> *</span></label>
										{get_section('type',$trackerStatusAry,$type,$ary_first=array(''),'type')}
									</p>
									<p>
										<label for="issue_tracker_id">考试时间<span class="required"> *</span></label>
										<input type="text" id="title" name="title" size="8" />
									</p>
									<p>
										<label for="issue_tracker_id">满分<span class="required"> *</span></label>
										<input type="text" id="title" name="title" size="8" />
									</p>
									<p>
										<label for="issue_tracker_id">试卷录入人<span class="required"> *</span></label>
										<input type="text" id="title" name="title" size="8" />
									</p>
								</div>
							</div>
						</div>
						
				
						<p>
						  <label>试卷备注<span class="required"> *</span></label>
						  <a href="#" ><img alt="Edit" src="../images/edit.png" /></a>
						  <span id="issue_description_and_toolbar" style="display:none">
						    <div class="jstEditor">
						    		<textarea cols="40" rows="10" style="height:100px;" name="myEditor" id="myEditor">{$content}</textarea>
						    </div>
						    <div class="jstHandle"></div>
						  </span>
						</p>
						<input id="submit" name="submit" value="提交更新" type="submit" />
			        </div>
			        </fieldset>
			    </div>
			    </form>
			    
			    <form action="" method="post">
			    <div id="question_content" class="box" style="display:none;">
			        <fieldset class="tabular"><legend>题目属性</legend>
			        <div id="all_attributes">
			        	<p>
							<label for="title">试卷名<span class="required"> *</span></label>
							<input type="text" id="title" name="title" size="30" />
						</p>
						
						<div id="attributes" class="attributes">
							<div class="splitcontent">
								<div class="splitcontentleft">
									<p>
										<label for="issue_tracker_id">科目类型<span class="required"> *</span></label>
										{get_section('type',$trackerStatusAry,$type,$ary_first=array(''),'type')}
									</p>
									<p>
										<label for="issue_tracker_id">学期<span class="required"> *</span></label>
										{get_section('type',$trackerStatusAry,$type,$ary_first=array(''),'type')}
									</p>
									<p>
										<label for="issue_tracker_id">学校<span class="required"> *</span></label>
										{get_section('type',$trackerStatusAry,$type,$ary_first=array(''),'type')}
									</p>
									<p>
										<label for="issue_tracker_id">难度系数<span class="required"> *</span></label>
										<input type="text" id="title" name="title" size="8" />
									</p>
									<p>
										<label for="issue_tracker_id">出题人<span class="required"> *</span></label>
										<input type="text" id="title" name="title" size="8" />
									</p>
									<p>
										<label for="issue_tracker_id">章节<span class="required"> *</span></label>
										{get_section('type',$trackerStatusAry,$type,$ary_first=array(''),'type')}
									</p>
									<p>
										<label for="issue_tracker_id"><span style="color:red;">知识点(标签/索引)</span><span class="required"> *</span></label>
										<input type="text" id="title" name="title" size="30" /><br />
										<span>多个知识点用逗号','分隔开</span>
									</p>
								</div>
							
								<div class="splitcontentright">
									<p>
										<label for="issue_tracker_id">年级<span class="required"> *</span></label>
										{get_section('type',$trackerStatusAry,$type,$ary_first=array(''),'type')}
									</p>
									<p>
										<label for="issue_tracker_id">年份<span class="required"> *</span></label>
										{get_section('type',$trackerStatusAry,$type,$ary_first=array(''),'type')}
									</p>
									<p>
										<label for="issue_tracker_id">地区<span class="required"> *</span></label>
										{get_section('type',$trackerStatusAry,$type,$ary_first=array(''),'type')}
									</p>
									<p>
										<label for="issue_tracker_id">分值<span class="required"> *</span></label>
										<input type="text" id="title" name="title" size="8" />
									</p>
									<p>
										<label for="issue_tracker_id">录入人<span class="required"> *</span></label>
										<input type="text" id="title" name="title" size="8" />
									</p>
								</div>
							</div>
						</div>
						
				
						<p>
							<label>试题内容<span class="required"> *</span></label>
						  	<a href="#" ><img alt="Edit" src="../images/edit.png" /></a>
						  	<span id="issue_description_and_toolbar" style="display:none">
							    <div class="jstEditor">
							    	<textarea cols="40" rows="10" style="height:100px;" name="myEditor2" id="myEditor2">{$content}</textarea>
							    </div>
							    <div class="jstHandle"></div>
						  	</span>
						</p>
						
						<p>
							<label>图片路径</label>
							<span id="divPreview">
								<input type='file' name='file' id='file' onchange="PreviewImage(this,'icon_img','divPreview');" />
							</span>
							<img class="border-radius-5" src="{$dataAry['icon_img']}" alt="image" id="icon_img" width="120px" style="margin-left:12%;"/>
						</p>
						
						<p>
							<label for="status">答案A</label>
							<input type="text" id="title" name="title" size="8" />
						</p>
						<p>
							<label for="status">答案B</label>
							<input type="text" id="title" name="title" size="30" />
						</p>
						<p>
							<label for="status">答案C</label>
							<input type="text" id="title" name="title" size="30" />
						</p>
						<p>
							<label for="status">答案D</label>
							<input type="text" id="title" name="title" size="30" />
						</p>
						
						<p>
							<label for="status">正确答案<span class="required"> *</span></label>
							<input type="text" id="title" name="title" size="30" />
						</p>
						<p>
						  <label>答案及解析</label>
						  <a href="#" ><img alt="Edit" src="../images/edit.png" /></a>
						  <span id="issue_description_and_toolbar" style="display:none">
						    <div class="jstEditor">
						    	<textarea cols="40" rows="10" style="height:100px;" name="myEditor3" id="myEditor3">{$content}</textarea>
						    </div>
						    <div class="jstHandle"></div>
						  </span>
						</p>
						
						
						
						<input id="submit" name="submit" value="提交更新" type="submit" />
			        </div>
			        </fieldset>
			    </div>
			    
				</form>
			</div>
			
		</div>

		<div id="list-right" class="splitcontentright">
 			<div class="mypage-box">
    		<h3>试卷预览 #2212313121998 <a>[录入管理器]</a></h3>
			<form action="" method="post">
			  <table class="list issues">
			    <thead>
				    <tr>
				    	<th style="text-align:left;">操作：<a>[打印]</a> <a>[导出到TFR]</a>  <a>[隐藏答案及解析]</a></th>
				    </tr>
			    </thead>
			    <tbody></tbody>
			  </table>
			  
			  <!-- 试卷头部描述信息 -->
			  <div id="paper-header">
			  		<div id="paper-title">区四中13-14学年度第二学期第二次月考<br />数学试卷</div>
			  		<div id="paper-header-attribute">
				  		<div>完成时间：100分钟</div>
				  		<div>总分：100分</div>
			  		</div>
			  </div>
			  
			  <!-- 题目类型信息 -->
			  <div id="paper-question-type">一.选择题(每小题3分，共15分)</div>
			  
			  <!-- 题目内容 -->
			  <div id="paper-question-content">
			  		1<a>(校正)</a>.如果`x = sqrt((-b +- b^2-4ac)/(2a)) .`有意义，那么字母x的取值范围是(  )
			  		<div id="paper-question-img"><img align="right" width="60%" src="../images/test/1.jpg"></img></div>
			  		<div id="paper-question-answer">`A.x>=3`</div>
			  		<div id="paper-question-answer">`B.x<-3`</div>
			  		<div id="paper-question-answer">`C.x!=3`</div>
			  		<div id="paper-question-answer">`D.x<=-3`</div>
			  </div>
			  <!-- 答案内容及解析 -->
			  <div id="paper-answer-content">
			  		正确选项：A
			  		<div id="paper-answer-analysis">
			  		这是解析，对答案的解析等等。
			  		</div>
			  </div>
			  
			  
			  <!-- 题目内容 -->
			  <div id="paper-question-content">
			  		2<a>(校正)</a>.如果`x = sqrt((-b +- b^2-4ac)/(2a)) .`有意义，那么字母x的取值范围是(  )
			  		<div id="paper-question-img"><img align="right" width="60%" src="../images/test/1.jpg"></img></div>
			  		<div id="paper-question-answer">`A.x>=3`</div>
			  		<div id="paper-question-answer">`B.x<-3`</div>
			  		<div id="paper-question-answer">`C.x!=3`</div>
			  		<div id="paper-question-answer">`D.x<=-3`</div>
			  </div>
			  
			  <!-- 题目内容 -->
			  <div id="paper-question-content">
			  		3<a>(校正)</a>.如果`x = sqrt((-b +- b^2-4ac)/(2a)) .`有意义，那么字母x的取值范围是(  )
			  		<div id="paper-question-img"><img align="right" width="60%" src="../images/test/1.jpg"></img></div>
			  		<div id="paper-question-answer">`A.x>=3`</div>
			  		<div id="paper-question-answer">`B.x<-3`</div>
			  		<div id="paper-question-answer">`C.x!=3`</div>
			  		<div id="paper-question-answer">`D.x<=-3`</div>
			  </div>
			  
			  <!-- 题目内容 -->
			  <div id="paper-question-content">
			  		4<a>(校正)</a>.天灾无情人有情，绿色情结寄人间。如图所示，这个由绿丝带折成的祈福节的重叠部分所形成的的图形是 (  )
			  		<div id="paper-question-img"><img align="right" width="60%" src="../images/test/2.jpg"></img></div>
			  		<div id="paper-question-answer">`A.正方形`</div>
			  		<div id="paper-question-answer">`B.菱形`</div>
			  		<div id="paper-question-answer">`C.矩形`</div>
			  		<div id="paper-question-answer">`D.梯形`</div>
			  </div>
			  
			  <!-- 题目内容 -->
			  <div id="paper-question-content">
			  		5<a>(校正)</a>.如图，在矩形ABCD中，对角线AC，BD交于点O.已知△AOB=60°，AC=16，则图中长度为8的线段有 (  )
			  		<div id="paper-question-img"><img align="right" width="60%" src="../images/test/3.jpg"></img></div>
			  		<div id="paper-question-answer">`A.2条`</div>
			  		<div id="paper-question-answer">`B.4条`</div>
			  		<div id="paper-question-answer">`C.5条`</div>
			  		<div id="paper-question-answer">`D.6条`</div>
			  </div>
			  <!-- 答案内容及解析 -->
			  <div id="paper-answer-content">
			  		正确选项：A
			  		<div id="paper-answer-analysis">
			  		这是解析，对答案的解析等等。
			  		</div>
			  </div>
			  
			  <!-- 题目类型信息 -->
			  <div id="paper-question-type">二.填空题(每小题4分，共20分)</div>
			  
			  <!-- 题目内容 -->
			  <div id="paper-question-content">
			  		6<a>(校正)</a>.计算：`sqrt(2)+sqrt(8)=`_____
			  		<div id="paper-question-img"><img align="right" width="60%" src=""></img></div>
			  </div>
			  <div id="paper-question-content">
			  		7<a>(校正)</a>.计算：平行四边形ABCD两邻角角A:角B=1:2，那么角A = _____
			  		<div id="paper-question-img"><img align="right" width="60%" src=""></img></div>
			  </div>
			  <div id="paper-question-content">
			  		8<a>(校正)</a>.如图在RT△ABC中，角ACB=90°，AB=8,CD是AB上的中线，那么CD的长是_______
			  		<div id="paper-question-img"><img align="right" width="60%" src="../images/test/3.jpg"></img></div>
			  </div>
			  <div id="paper-question-content">
			  		8<a>(校正)</a>.如图在RT△ABC中，角ACB=90°，AB=8,CD是AB上的中线，那么CD的长是_______
			  		<div id="paper-question-img"><img align="right" width="60%" src=""></img></div>
			  </div>
			  <div id="paper-question-content">
			  		8<a>(校正)</a>.如图在RT△ABC中，角ACB=90°，AB=8,CD是AB上的中线，那么CD的长是_______
			  		<div id="paper-question-img"><img align="right" width="60%" src=""></img></div>
			  </div>
			  
			  <!-- 题目类型信息 -->
			  <div id="paper-question-type">三.解答题(每小题6分，共30分)</div>
			  <!-- 题目内容 -->
			  <div id="paper-question-content">
			  		11<a>(校正)</a>.计算： `sqrt(18)-sqrt(8)+sqrt(1/2)`
			  </div>
			  <!-- 题目内容 -->
			  <div id="paper-question-content">
			  		12<a>(校正)</a>.计算： `sqrt(18)-sqrt(8)+sqrt(1/2)`
			  </div>
			  <!-- 题目内容 -->
			  <div id="paper-question-content">
			  		13<a>(校正)</a>.如图，ABCD中，E,F分别是AD，BC上的一点。在①AE=CF，②BE//DF，③∠1=∠2中，请选择其中一个条件，证明BE=DF.<br />
			  		<div id="paper-question-img"><img align="right" width="60%" src="../images/test/4.jpg"></img></div>
			  		(1)你选择的条件是__________:(只需要填写序号)<br />
			  		(2)证明：<br />
			  </div>
			  <!-- 题目内容 -->
			  <div id="paper-question-content">
			  		13<a>(校正)</a>.如图，ABCD中，E,F分别是AD，BC上的一点。在①AE=CF，②BE//DF，③∠1=∠2中，请选择其中一个条件，证明BE=DF.<br />
			  		<div id="paper-question-img"><img align="right" width="60%" src="../images/test/4.jpg"></img></div>
			  		(1)你选择的条件是__________:(只需要填写序号)<br />
			  		(2)证明：<br />
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


//更新试卷属性
function update_paper_attribute()
{
	document.getElementById("paper_attribute").style.display = "block";
	document.getElementById("question_content").style.display = "none";
	document.getElementById("u_paper_a").style.background = "#FFFFDD";
	document.getElementById("u_paper_a").style.color = "red";
	document.getElementById("u_question_a").style.background = "";
	document.getElementById("u_question_a").style.color = "";
}

//更新题目内容
function update_question_content()
{
	document.getElementById("paper_attribute").style.display = "none";
	document.getElementById("question_content").style.display = "block";
	document.getElementById("u_paper_a").style.background = "";
	document.getElementById("u_paper_a").style.color = "";
	document.getElementById("u_question_a").style.background = "#FFFFDD";
	document.getElementById("u_question_a").style.color = "red";
}


//js本地图片预览，兼容ie[6-9]、火狐、Chrome17+、Opera11+、Maxthon3、360浏览器
function PreviewImage(fileObj,imgPreviewId,divPreviewId){
    var allowExtention=".jpg,.bmp,.gif,.png";//允许上传文件的后缀名document.getElementById("hfAllowPicSuffix").value;
    var extention=fileObj.value.substring(fileObj.value.lastIndexOf(".")+1).toLowerCase();            
    var browserVersion= window.navigator.userAgent.toUpperCase();
    if(allowExtention.indexOf(extention)>-1){
        if(fileObj.files){//兼容chrome、火狐7+、360浏览器5.5+等，应该也兼容ie10，HTML5实现预览
            if(window.FileReader){
                var reader = new FileReader(); 
                reader.onload = function(e){
                    document.getElementById(imgPreviewId).setAttribute("src",e.target.result);
                }  
                reader.readAsDataURL(fileObj.files[0]);
            }else if(browserVersion.indexOf("SAFARI")>-1){
                alert("不支持Safari浏览器6.0以下版本的图片预览!");
            }
        }else if (browserVersion.indexOf("MSIE")>-1){//ie、360低版本预览
            if(browserVersion.indexOf("MSIE 6")>-1){//ie6
                document.getElementById(imgPreviewId).setAttribute("src",fileObj.value);
            }else{//ie[7-9]
                fileObj.select();
                if(browserVersion.indexOf("MSIE 9")>-1)
                    fileObj.blur();//不加上document.selection.createRange().text在ie9会拒绝访问
                var newPreview =document.getElementById(divPreviewId+"New");
                if(newPreview==null){
                    newPreview =document.createElement("div");
                    newPreview.setAttribute("id",divPreviewId+"New");
                    newPreview.style.width = document.getElementById(imgPreviewId).width+"px";
                    newPreview.style.height = document.getElementById(imgPreviewId).height+"px";
                    newPreview.style.border="solid 1px #d2e2e2";
                }
                newPreview.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src='" + document.selection.createRange().text + "')";                            
                var tempDivPreview=document.getElementById(divPreviewId);
                tempDivPreview.parentNode.insertBefore(newPreview,tempDivPreview);
                tempDivPreview.style.display="none";                    
            }
        }else if(browserVersion.indexOf("FIREFOX")>-1){//firefox
            var firefoxVersion= parseFloat(browserVersion.toLowerCase().match(/firefox\/([\d.]+)/)[1]);
            if(firefoxVersion<7){//firefox7以下版本
                document.getElementById(imgPreviewId).setAttribute("src",fileObj.files[0].getAsDataURL());
            }else{//firefox7.0+                    
                document.getElementById(imgPreviewId).setAttribute("src",window.URL.createObjectURL(fileObj.files[0]));
            }
        }else{
            document.getElementById(imgPreviewId).setAttribute("src",fileObj.value);
        }         
    }else{
        alert("仅支持"+allowExtention+"为后缀名的文件!");
        fileObj.value="";//清空选中文件
        if(browserVersion.indexOf("MSIE")>-1){                        
            fileObj.select();
            document.selection.clear();
        }
        fileObj.outerHTML=fileObj.outerHTML;
    }
}
</script>

</body>
</html>

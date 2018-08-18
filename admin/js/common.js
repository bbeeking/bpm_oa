// JavaScript Document
function showmsg(id,string)
{
	document.getElementById(id).innerHTML = string;
}
function GetRequest(url)
{
	var xmlhttp;
	if(window.XMLHttpRequest) {
		//针对FireFox,Mozillar,Opera,Safari,IE7,IE8
		xmlhttp = new XMLHttpRequest();
		//针对某些特定版本mozillar浏览器的BUG进行修正
		if(xmlhttp.overrideMimeType) {
			xmlhttp.overrideMimeType("text/xml");	
		}
	}
	else if(window.ActiveXObject) {
		//针对IE6,5.5,5
		//两个可以创建XMLHttpRequest对象的空间名称，保存在一个JS数组中
		//排在前面的版本较新
		var activeName = ['MSXML2.XMLHTTP','Microsoft.XMLHTTP'];
		for(var i=0;i<activeName.length;i++) {
			try {
				//取出一个空间名进行创建，如果创建成功就终止循环
				//如果创建失败，会抛出异常，然后可以继续循环，继续尝试创建
				xmlhttp = new ActiveXObject(activeName[i]);
			}
			catch(e) {}
		}
	}
	xmlhttp.open("GET",url,false);
	xmlhttp.send(null);
	return xmlhttp.responseText;
}
function trim(sString)
{
	/*
	去除空格
	str:字符串
	*/
    while (sString.substring(0,1) == ' ')
    {
        sString = sString.substring(1, sString.length);
    }
    while (sString.substring(sString.length-1, sString.length) == ' ')
    {
        sString = sString.substring(0,sString.length-1);
    }
    return sString;
}

/**
	回车进行登录，空格记住密码
	2010-12-22更改为空格记住密码并登陆,回车不记密码登陆
	使用:<body onkeydown="opera_client(event);">
 */
function opera_client(event) {
	if(event.keyCode == 13) {//回车
		$('#remeber').attr("checked", false);
		chklogin();
	}
	if(event.keyCode == 32)//空格
	{
		$("#login").focus();
		$('#remeber').attr("checked", true);
		/*
		if($('#remeber').attr("checked") == true)
		{
			$('#remeber').attr("checked", false);
		}
		else
		{
			$('#remeber').attr("checked", true);
		}
		*/
	}
}


/**
	兼容document.getElementsByName在ie下不能获取多name
	tag:为html标签,input,select等
	name:为该标签的name
	value:为需要改动所有上面tag标签后的值
 */
/**
function GetElementsByName(tag, name,value) {
    var tagArr = document.getElementsByTagName(tag);
    var elements = [];     
    for (var i = 0; i < tagArr.length; i++)
    {
        var att = tagArr[i].getAttribute("name");
        if (att == name) {
            elements[i] = tagArr[i];
        }
        elements[i].value = value;
    }
    return true;
}
 */


/**
	兼容document.getElementsByName在ie下不能获取多name
	tag:为html标签,input,select等
	name:为该标签的name
	value:为需要改动所有上面tag标签后的值
 */
function GetElementsByName(tag, name,value) {
	$('input[name='+name+']').each(
    	function() 
    	{
    		$(this).attr("value",value);
    	}
    );
    return true;
}

/**
 * 获取物品id,与物品名
 * search_name:搜索的关键词的name
 * show_id_name:显示结果div的id和name
 * 返回id和name对应值
 */
function get_item_ary(search_name,show_id_name)
{
	$('#'+show_id_name).html("");
	var item=$('#'+search_name).val();
	$.post('../inc/atuo_get_item.php',{'item':item,'show_id_name':show_id_name},function (d)
		{
			if(d !='')
			{
				$('#'+show_id_name).html(d);
				$('#'+show_id_name).css('display','block');
				return;
			}
		}
	)
}

/**
 * confirm跳转到指定url
 */
function confirmToUrl( msg, toUrl )
{
	if( confirm(msg) ) //ok
	{
		window.location.href = toUrl;
	}
	else
	{
		return false;
	}
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




var HtmlUtil = {
	/*1.用浏览器内部转换器实现html转码*/
	htmlEncode:function (html){
		//1.首先动态创建一个容器标签元素，如DIV
		var temp = document.createElement ("div");
		//2.然后将要转换的字符串设置为这个元素的innerText(ie支持)或者textContent(火狐，google支持)
		(temp.textContent != undefined ) ? (temp.textContent = html) : (temp.innerText = html);
		//3.最后返回这个元素的innerHTML，即得到经过HTML编码转换的字符串了
		var output = temp.innerHTML;
		temp = null;
		return output;
	},
	/*2.用浏览器内部转换器实现html解码*/
	htmlDecode:function (text){
		//1.首先动态创建一个容器标签元素，如DIV
		var temp = document.createElement("div");
		//2.然后将要转换的字符串设置为这个元素的innerHTML(ie，火狐，google都支持)
		temp.innerHTML = text;
		//3.最后返回这个元素的innerText(ie支持)或者textContent(火狐，google支持)，即得到经过HTML解码的字符串了。
		var output = temp.innerText || temp.textContent;
		temp = null;
		return output;
	},
	/*3.用正则表达式实现html转码*/
	htmlEncodeByRegExp:function (str){
		var s = "";
		if(str.length == 0) return "";
		s = str.replace(/&/g,"&amp;");
		s = s.replace(/</g,"&lt;");
		s = s.replace(/>/g,"&gt;");
		s = s.replace(/ /g,"&nbsp;");
		s = s.replace(/\'/g,"&#39;");
		s = s.replace(/\"/g,"&quot;");
		return s;
	},
	/*4.用正则表达式实现html解码*/
	htmlDecodeByRegExp:function (str){
		var s = "";
		if(str.length == 0) return "";
		s = str.replace(/&amp;/g,"&");
		s = s.replace(/&lt;/g,"<");
		s = s.replace(/&gt;/g,">");
		s = s.replace(/&nbsp;/g," ");
		s = s.replace(/&#39;/g,"\'");
		s = s.replace(/&quot;/g,"\"");
		return s;
	}
};
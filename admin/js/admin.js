function chklogin()
{
	var username = $('#username').val();
	var password = $('#password').val();
	
	var code = $('#code').val();
	var remember = document.getElementById("remember-me").checked;
	
//	alert(username+'_'+password);return;
	if(username == "") {
		$('#loginmsg').html("请输入您的用户名！");
		return;
	}
	if(password == "") {
		$('#loginmsg').html("请输入您的密码！");
		return;
	}
	if(code == "") {
		$('#loginmsg').html("请输入验证码！");
		return;
	}
	$.post('chklogin.php',{'username':username,'password':password,'code':code},function (d){
		//alert(d);
		if(d == '4') {
			$('#loginmsg').html('你输入的验证码错误！');
			return;
		}
		else if(d == '2') {
			$('#loginmsg').html('用户名或密码不正确！');
			return;
		}
		else if(d == '3') {
			$('#loginmsg').html('帐号被禁止登录！');
			return;
		}
		else if(d == '1') {

			//记住账号
			if(remember==true)
			{
				SetCookie("cookie_username",username);
				SetCookie("cookie_password",password);
				SetCookie("cookie_remember",1);
			}
			else
			{
				if(getCookie("cookie_username")!=null)
				delCookie("cookie_username");
				
				if(getCookie("cookie_password")!=null)
				delCookie("cookie_password");
				
				if(getCookie("cookie_remember")!=null)
				delCookie("cookie_remember");
				
				
			}
			$('#loginmsg').html('登录成功，正在跳转...');
			window.location.href = 'index.php';
		}
		else {
			//$('#loginmsg').html('程序出现异常');
			$('#loginmsg').html(d);
		}
	});
}
/*
登录页清空功能
*/
function cancel()
{
	$('#username').val('');
	$('#password').val('');
	$('#code').val('');
}
/*
登录页验证码刷新
*/
function refurbish(){ 
     var img = document.getElementById("varImg"); 
     img.src = "includes/code.php?" + Math.random(); 
} 
/*
菜单列表JS代码
*/
function open_close_li(id)
{
	if(document.getElementById(id).style.display == "none") {
		document.getElementById(id).style.display = "block";
	}
	else {
		document.getElementById(id).style.display = "none";
	}
}
function open_close_item(id)
{
	if(document.getElementById(id).className == "openitem") {
		document.getElementById(id).className = "closeitem";
	}
	else {
		document.getElementById(id).className = "openitem";
	}
}
/*
时间代码
*/
function reloop()
{
	
	var time = new Date( ); //获得当前时间
	//获得年、月、日，Date()函数中的月份是从0－11计算
	var year = time.getYear(); 
	var month = time.getMonth()+1;
	var date = time.getDate();
	//获得小时、分钟、秒
	var hour = time.getHours();  
	var minute = time.getMinutes();
	var second = time.getSeconds();
	//获得一个星期中的第几天,西方的星期是从星期日开始，星期六结束
	var day = time.getDay();
	//如果分钟只有1位，补0显示
	if (minute < 10)
	minute="0"+minute;
	//如果秒数只有1位，补0显示
	if (second < 10)
	second="0"+second;
	//按12小时制显示
	if (hour>24) {
		hour=hour-24;
	}
	var weekday = 0;
	//firefox下的getyear是从1900年开始的
	year = (year < 1900)?(1900+year):year;
	
	switch(time.getDay()) {
		case 0:
			weekday = "星期日";
		break;
		case 1:
			weekday = "星期一";
		break;
		case 2:
			weekday = "星期二";
		break;
		case 3:
			weekday = "星期三";
		break;
		case 4:
			weekday = "星期四";
		break;
		case 5:
			weekday = "星期五";
		break;
		case 6:
			weekday = "星期六";
		break;
	}
	
	//document.getElementById("t").innerHTML="今天是："+year+"年"+month+"月"+date+"日"+weekday+"  "+hour+"时"+minute+"分"+second+"秒";
	setTimeout("reloop()",1000);
}

function SetCookie(name,value)//两个参数，一个是cookie的名子，一个是值
{
    var Days = 180; //此 cookie 将被保存 30 天
    var exp  = new Date();    //new Date("December 31, 9998");
    exp.setTime(exp.getTime() + Days*24*60*60*1000);
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
}
function getCookie(name)//取cookies函数        
{
    var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
     if(arr != null) return unescape(arr[2]); return null;

}
function delCookie(name)//删除cookie
{
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval=getCookie(name);
    if(cval!=null) document.cookie= name + "="+cval+";expires="+exp.toGMTString();
}
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{WEBTITLE} - 登陆</title>
    
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="./templates/bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="./templates/bootstrap/css/bootstrap-responsive.min.css" />
        <!-- theme color-->
            <link rel="stylesheet" href="./templates/css/blue.css" />
        <!-- tooltip -->    
			<link rel="stylesheet" href="./templates/lib/qtip2/jquery.qtip.min.css" />
        <!-- main styles -->
            <link rel="stylesheet" href="./templates/css/style.css" />
    
        <!-- Favicons and the like (avoid using transparent .png) -->
            <link rel="shortcut icon" href="./templates/icon-favicon.ico" />
            <link rel="apple-touch-icon-precomposed" href="./templates/icon-favicon.ico" />

        <!--[if lte IE 8]>
            <script src="js/ie/html5.js"></script>
			<script src="js/ie/respond.min.js"></script>
        <![endif]-->
		
    </head>
	<body class="login_page">
		
		<div class="login_box">
			
			<form id="login_form">
				<div class="top_b"><i><img src="./templates/icon-favicon.ico" width="28px"></i> {WEBTITLE}&nbsp;{VERSION}</div>
				<div class="alert alert-info alert-login">
					请正确填写你的用户名和密码.
				</div>
				<div class="cnt_b">
					<div class="formRow">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-user"></i></span><input type="text" id="username" name="username" placeholder="账号/手机号/邮箱" value="" />
						</div>
					</div>
					<div class="formRow">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-lock"></i></span><input type="password" id="password" name="password" placeholder="密码" value="" />
						</div>
					</div>
					<div class="formRow clearfix">
						<label class="checkbox"><input type="checkbox" id="remember" name="remember" /> 记住我</label>
					</div>
				
					<!-- 登录信息提示 -->
					<div id="loginmsg" class="formRow clearfix" style="color:#C62626;font-size:11px;"></div>
				</div>
				
				<div class="btm_b clearfix">
					<!-- <button class="btn btn-inverse pull-right" type="submit">登陆</button> -->
					<button class="btn btn-inverse pull-right" type="button" onclick="chklogin();">登陆</button>
<!--					<span class="link_reg"><a href="#reg_form">还没注册? 点击这里</a></span>-->
<!--					<span><a href="{DAEM_PATH}../pms_v1/admin/index.php">v1.0极速版</a></span>-->
					<span><a href="">维护服务热线</a></span>
				</div>  
			</form>
			
			<form action="dashboard.html" method="post" id="pass_form" style="display:none">
				<div class="top_b">不能登录?</div>    
					<div class="alert alert-info alert-login">
					请输入您的email地址.你将收到一封修改新密码的邮件.
				</div>
				<div class="cnt_b">
					<div class="formRow clearfix">
						<div class="input-prepend">
							<span class="add-on">@</span><input type="text" placeholder="your email address" />
						</div>
					</div>
				</div>
				<div class="btm_b tac">
					<button class="btn btn-inverse" type="submit">重新获取密码</button>
				</div>  
			</form>
			
			<form action="dashboard.html" method="post" id="reg_form" style="display:none">
				<div class="top_b">注册Daemon管理账号</div>
				<div class="alert alert-login">
					完成填写表单及点击"注册"按钮，表明你将接受以下<a data-toggle="modal" href="#terms">注册服务条款</a>.
				</div>
				<div id="terms" class="modal hide fade" style="display:none">
					<div class="modal-header">
						<a class="close" data-dismiss="modal">×</a>
						<h3>注册服务条款</h3>
					</div>
					<div class="modal-body">
						<p>
							 欢迎您成为Daemon管理系统注册会员，在您注册成为会员后，将享有我们提供的相应服务，但同时也要遵守相应的规则和履行一定的义务。请您务必在注册之前认真阅读全部服务协议内容，如有任何疑问，可向Daemon咨询，您一旦注册成为我们的会员，则意味着已完全接受以下条款。 
							1、注册用户的权利： <br />
							    1）用户有权拥有自已在Daemon管理系统的用户名及密码，并有权使用自已的用户名及密码随时登录系统。 
							    2）用户根据自身获得相应的操作系统权限。
							2、注册用户的义务： <br />
							    1）注册用户必须是具备完全民事行为能力的自然人，法人或能够独立承担民事责任的其他组织。 <br />
							    2）用户有义务在注册时提供自己的真实资料，并保证诸如电子邮件地址、联系电话、联系地址、邮政编码等内容的有效性及安全性，保证Daemon管理系统可以通过上述联系方式与自己进行联系。同时，用户也有义务在相关资料实际变更时及时更新有关注册资料。用户保证不以他人资料在Daemon管理系统进行注册或认证。如果用户提供的资料不准确，不真实，不合法有效，Daemon管理系统将保留结束用户使用各项服务的权利。 
							    3）未经Daemon管理系统许可，不得将Daemon管理系统的信息用于任何侵犯国家、集体或个人利益的行为和商业行为。<br /> 
							    4）您不得利用Daemon管理系统散发垃圾邮件、连锁邮件等骚扰性邮件；发布、传播或散发其它无关的信息。 <br />
							    5） 您不得擅自转让自己的用户名和口令给他人使用。通过您的用户名和口令编辑、发布的任何信息或做出的任何行为都被视为是您自己的行为。 <br />
							    6）您必须遵守国家法律、法规及规章，并特别注意并遵守以下事项： <br />
							不得以任何手段非法篡改、破坏、删除(或有此企图)Daemon管理系统或数据库中的内容，不得对Daemon管理系统所属的服务器、系统或网络进行任何形式的攻击、破坏，不得制作、传播病毒。一经发现，我们将立即无限期终止对您的服务，并报告国家有关行政机关和司法机关，追究您的法律责任。 
							不得利用Daemon管理系统来获取商业秘密，窥探个人隐私，侵犯他人知识产权，制造、传播和散布污蔑、诽谤、恐吓他人的言论和消息。一经发现，我们将立即无限期终止对您的服务，并报告国家有关行政机关和司法机关，追究您的法律责任。
							3、 服务的中断和终止 <br />
							在下列情况下，本中心可以通过注销用户的方式终止服务： <br />
							    1）用户因违反本服务协议相关规定而被Daemon管理系统中心中断服务，Daemon管理系统中心将在中断服务时通知用户。但用户被终止服务后，以本人或他人名义再次注册为用户的，Daemon管理系统中心可以单方面终止与该用户的服务协议； 
							    2）发现用户注册资料中主要内容是虚假的，可随时终止与该用户的服务协议； <br />
							    3）本服务协议终止或更新时，用户未确认新的服务协议的； <br />
							    4）其它Daemon管理系统认为需终止服务的情况。 <br />
							5、其它注意事项 
							用户在使用Daemon管理系统提供的各项服务时，承诺接受并遵守各项相关规则。Daemon管理系统有权根据需要不时的制定、修改本协议及各类规则。修订的协议一经在公布后，立即自动生效。各类规则会在发布后生效，亦成为本协议的一部分。登录或继续使用“服务”将表示用户接受经修订的协议。除另行明确声明外，任何使“服务”范围扩大或功能增强的新内容均受本协议约束。 
							6、如您不同意此服务条款，请勿注册为本网站用户。 <br />
							7、本协议的解释权归Daemon管理开发团队所有。 <br />
						</p>
					</div>
					<div class="modal-footer">
						<a data-dismiss="modal" class="btn" href="#">关闭</a>
					</div>
				</div>
				<div class="cnt_b">
					
					<div class="formRow">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-user"></i></span><input type="text" placeholder="Username" />
						</div>
					</div>
					<div class="formRow">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-lock"></i></span><input type="text" placeholder="Password" />
						</div>
					</div>
					<div class="formRow">
						<div class="input-prepend">
							<span class="add-on">@</span><input type="text" placeholder="Your email address" />
						</div>
						<small>放心，您的填写的资料我们均严格保密.</small>
					</div>
					 
				</div>
				<div class="btm_b tac">
					<button class="btn btn-inverse" type="submit">注册</button>
				</div>  
			</form>
			
		</div>
		
		<div class="links_b links_btm clearfix">
			<span class="linkform"><a href="#pass_form">忘记密码?</a></span>
			<span class="linkform" style="display:none">随便逛逛, <a href="#login_form">回到登录页面</a></span>
		</div>  
        
        <!-- 加载登录验证公共js -->
        <script src="./js/admin.js"></script>
        
        <script src="./templates/js/jquery.min.js"></script>
        <script src="./templates/js/jquery.actual.min.js"></script>
        <script src="./templates/lib/validation/jquery.validate.min.js"></script>
		<script src="./templates/bootstrap/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                
				//* boxes animation
				form_wrapper = $('.login_box');
                $('.linkform a,.link_reg a').on('click',function(e){
					var target	= $(this).attr('href'),
						target_height = $(target).actual('height');
					$(form_wrapper).css({
						'height'		: form_wrapper.height()
					});	
					$(form_wrapper.find('form:visible')).fadeOut(400,function(){
						form_wrapper.stop().animate({
                            height	: target_height
                        },500,function(){
                            $(target).fadeIn(400);
                            $('.links_btm .linkform').toggle();
							$(form_wrapper).css({
								'height'		: ''
							});	
                        });
					});
					e.preventDefault();
				});
				
				//* validation
				$('#login_form').validate({
					onkeyup: false,
					errorClass: 'error',
					validClass: 'valid',
					rules: {
						username: { required: true, minlength: 3 },
						password: { required: true, minlength: 3 }
					},
					highlight: function(element) {
						$(element).closest('div').addClass("f_error");
					},
					unhighlight: function(element) {
						$(element).closest('div').removeClass("f_error");
					},
					errorPlacement: function(error, element) {
						$(element).closest('div').append(error);
					}
				});
            });
        </script>
        
        <!-- 进入时首先判断cookie中username,password,remember是否存在 -->
        <script>
			var username="";
			if(username = getCookie("cookie_username"))
				document.getElementById("username").value=username;
			var password="";
			if(password = getCookie("cookie_password"))
				document.getElementById("password").value=password;
			var rember;
			if(getCookie("cookie_remember")!=null)
				document.getElementById("remember").checked=true;
			$("#username").focus();
		</script>
    </body>
</html>

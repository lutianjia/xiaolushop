<!DOCTYPE html>
<html>
<head>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>手机扫码登录等三大登录方式切换效果登录模板</title>
<script type="text/javascript" src="/index/js/jquery-1.12.3.min.js"></script>

<link type="text/css" href="/index/css/base.css" rel="stylesheet" />
<link href="/index/css/style.css" rel="stylesheet" />
	<link href="/index/js/bootstrap.min.js" rel="stylesheet" />
	<script src="/index/js/jquery-1.12.3.min.js"></script>
	<script src="/index/layer/mobile/layer.js" type="text/javascript" ></script>
	<script src="/index/layer/layer.js" type="text/javascript" ></script>
</head>

<body style="background: #f6f6f6">

<div class="wrapper" id="login_head" style="display:">
	<div class="log_head">
		<h1 class="log_logo left"><a href="javascript:;"><span>欢迎登录</span></a></h1>
	</div>
</div>
<div class="login_wrap" style="width:; background:#fff url(images/20161209115754_5628.jpg) no-repeat center top; padding:40px 0;">
	<div class="wrapper" id="login_body" style="width:;">
		<div class="log_ad" style="display:"><a href="javascript:;"></a></div>
		<div class="login_border" style="padding:8px;">
			<div class="login" style="display: block;">
				<div style="position:absolute; right:30px; top:14px;">
					<a href="{{url('index/register')}}" target="_blank">账号注册
					<em style="width:16px; height:16px; background:#999; float:right; color:#fff; border-radius:100%; text-align:center; line-height:16px; margin:1px 0 0 5px; font-family:'宋体'; font-weight:bold;">&gt;</em>
					</a>
				</div>
				<ul class="login-tab">
					<li class="login-on">普通登录</li>
					<li>手机登录</li>
				</ul>
				<div class="login-body">
					<div class="login-style" style="display: block;">
						<dl><dd><input name="txtUser" class="a"  type="text" id="txtUser" placeholder="用户名/邮箱" /></dd></dl>
						<div class="tishi"></div>
						<dl>
							<dd><input type="password" class="a" name="password" id="Userpwd"  placeholder="请输入您的密码" /></dd>
						</dl>
						<div class="tishi"></div>
						<!-- <dl id="logincode" style="display: none;">
						<dd><input type="text" id="txtCode" name="txtCode" style="width: 133px; margin-right: 10px;" placeholder="验证码" /><img id="vCodeImg" src="" width="90" height="34" title="点击换一个" style="vertical-align: middle; margin-top: -4px;" onclick="this.src='/ImgCode.aspx?t='+Math.random()*100" /></dd>
						</dl> -->
						<div class="psword" style="margin-top:15px;"><a href="{{url('index/forget')}}" onClick="zhaohui(this)" tabindex="-1" class="right" target="_blank">忘记密码?</a></div>
						<div class="remember">
							<input type="checkbox" checked="checked" id="issave"/><label for="issave">下次自动登录</label>
						</div>

						<button onClick="cliLogin()" id="logbtn" style="outline:none">登 录</button>
					</div>
					<div class="login-style">
						<dl><dd><input name="phone" type="text" id="phone" placeholder="您的手机号码" /></dd></dl>
						<!-- <dl id="yz-code" style="display: none;">
						<dd><input type="text" id="txtCode2" name="txtCode2" style="width: 133px; margin-right: 10px;" placeholder="验证码" /><img id="Img1" src="" width="90" height="34" title="点击换一个" style="vertical-align: middle; margin-top: -4px;" onclick="this.src='/ImgCode.aspx?t='+Math.random()*100" /></dd>
						</dl> -->
						<dl>
							<dd><input type="text" id="dynamicPWD" onKeyDown="enterHandler(event)" style="width: 133px;" placeholder="短信验证码" /><input type="button" id="btn" class="btn_mfyzm" value="获取动态密码" onClick="Sendpwd(this)" /></dd>
						</dl>
						<div class="remember">
							<input type="checkbox" id="issave1" checked /><label for="issave1">下次自动登录</label>
						</div>
						<div class="tishi"></div>
						<button type="button" id="dynamicLogon" style="outline:none">登 录</button>
					</div>
				</div>
				<div class="hezuo">
					<h3>使用合作网站的账号登录：</h3>
					<p>
						<a href="javascript:;" onClick="showWxlog()"><i class="wx"></i>微信</a>
						<a href="{{url('service/qqlogin')}}" ><i class="qq"></i>QQ号</a>
					</p>
				</div>
				<div class="qiehuan"></div>
				<div id="zhishi" style="position:absolute; right:-185px; bottom:0; cursor:pointer;"><img src="/index/images/zhishi2.png" /></div>
			</div>
			<div class="login" style="display: none;">
				<i class="qiehuan" style="background-position:left bottom;"></i>
				<div class="app_login">
					<h1><i>-</i>登录失败，请刷新二维码后重试！</h1>
					<h2>使用九机APP&nbsp;&nbsp;扫码安全登录</h2>
				</div>
				<div class="app_code"><img id="appLoginCode" src="http://pan.baidu.com/share/qrcode?w=155&h=155&url=http://www.htmlsucai.com" /></div>
				<div class="shuaxin">
					<span>刷新二维码</span>
					<p><a href="javascript:;" target="_blank">查看使用帮助</a></p>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div class="wxlogma">
	<a class="close" onClick="closewx()"></a>
	<h3>微信扫一扫二维码登录</h3>
	<iframe width="200" height="200" scrolling="no" frameborder="0" id="weixinCode"></iframe>
</div>
<div id="bindweixin" style="display:none;">
	<div class="bindWeixin">
		<p class="login-success">登录成功！</p>
		<div class="login-tips">为了您的帐号安全，建议绑定微信号</div>
		<img id="twocodetemp" src="#" />
	</div>
</div>
<div class="bottom">
	<div class="wrapper">
		<div class="foot_nav">
			<a href="http://www.htmlsucai.com" rel="nofollow">HTML素材网</a><i>|</i>
			<a href="http://www.htmlsucai.com" rel="nofollow">jquery特效</a><i>|</i>
			<a href="http://www.htmlsucai.com" rel="nofollow">jquery特效</a><i>|</i>
			<a href="http://www.htmlsucai.com" rel="nofollow">jquery特效</a><i>|</i>
			<a href="http://www.htmlsucai.com" rel="nofollow">jquery特效</a><i>|</i>
			<a href="http://www.htmlsucai.com" rel="nofollow">jquery特效</a><i>|</i>
			<a href="http://www.htmlsucai.com" rel="nofollow">jquery特效</a><i>|</i>
			<a href="http://www.htmlsucai.com" rel="nofollow">jquery特效</a><i>|</i>
			<a href="http://www.htmlsucai.com" rel="nofollow">jquery特效</a><i>|</i>
			<a href="http://www.htmlsucai.com" rel="nofollow">jquery特效</a>
		</div>
		<div class="copy">
			<p>各门店营业时间：周一至周日 09:00-21:30 &nbsp;&nbsp;&nbsp;&nbsp; 全国服务热线：000-000-00000 &nbsp;&nbsp;0000-00000000 &nbsp;&nbsp;&nbsp;&nbsp; 工作时间：周一至周日 09:00-21:30</p>
			<p>网站ICP备案号：<a rel="nofollow" href="javascript:;" target="_blank">滇ICP备xxxxx号</a> &nbsp;&nbsp;&nbsp;&nbsp; 电信业务经营许可证：滇B2-xxxx号 &nbsp;&nbsp;&nbsp;&nbsp; </p>
			<p>Copyright (c) 2006 - 2017 HTML素材网 All Rights Reserved</p>
		</div>
	</div>
</div>
<script>
	function login(account, password, check){
			$.ajax({
				type: 'POST',
				url: "{{'/service/index_login'}}",
				dataType: 'json',
				data: {
					account:account,
					password:password,
					check:check,
					_token: "{{csrf_token()}}"
				},
				success: function (data) {
					for(var a=0; a<2; a++){
						document.getElementsByClassName("tishi")[a].innerHTML = '';
						document.getElementsByClassName("a")[a].style="border:1px solid #d6d6d6";
					}

					if(data.account){
						for(var i=0; i<data.account.length; i++){
							document.getElementsByName("txtUser")[0].style="border:1px solid red";
							document.getElementsByClassName("tishi")[0].innerHTML += '<span>' + data.account[i] + '</span></br>';
						}
					}
					if(data.password){
						for(var i=0; i<data.password.length; i++){
							document.getElementsByName("password")[0].style="border:1px solid red";
							document.getElementsByClassName("tishi")[1].innerHTML += '<span>' + data.password[i] + '</span></br>';
						}
					}

					if (data.status == 1) {
						layer.msg(data.message, {icon: 5, time: 2000});
					} else if(data.status == 0){
						layer.msg(data.message, {icon: 1, time: 2000});
						setTimeout(function () {
							window.location.href = "{{url('')}}";
						},2000);
					}else{
						layer.msg({time: 1000});
					}
					// layer.closeAll('dialog');
				},
				error: function (data) {
					console.log(data);
					layer.closeAll('dialog');
				},
			});
	}
</script>
<script type="text/javascript" src="/index/js/style.js"></script>
</body>

</html>

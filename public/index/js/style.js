$("#zhishi").click(function() {
    $(this).hide();
});
$(".qiehuan").click(function (){
	$("#zhishi").hide(1000);
	$(this).parents(".login").hide().siblings().show();	
});


$(".login-tab li").click(function () {$(this).addClass("login-on").siblings().removeClass("login-on");$(".login-style").eq($(this).index()).show().siblings().hide();$(".tishi").hide();})

//注册操作
function register() {
	var nameNick = document.getElementsByName("nameNick")[0].value;
	var email = document.getElementsByName("email")[0].value;
	var password = document.getElementsByName("password")[0].value;
	var repassword = document.getElementsByName("repassword")[0].value;
	var captcha = document.getElementsByName("captcha")[0].value;

	// if(nameNick == ''){
	// 	layer.msg('昵称不能为空!', {icon:7, time:2000});
	// 	return;
	// }if(email == ''){
	// 	layer.msg('邮箱不能为空!', {icon:7, time:2000});
	// 	return;
	// }if(password == ''){
	// 	layer.msg('密码不能为空!', {icon:7, time:2000});
	// 	return;
	// }if(repassword == ''){
	// 	layer.msg('二次输入密码不能为空!', {icon:7, time:2000});
	// 	return;
	// }if(captcha == ''){
	// 	layer.msg('验证码不能为空!', {icon:7, time:2000});
	// 	return;
	// }
	//
	// var reg = /^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/;
	// if(!reg.test(email)){
	// 	layer.msg('邮箱格式错误!', {icon:7, time:2000});
	// 	return;
	// }
	// if(password != repassword){
	// 	layer.msg('两次密码输入不一致!', {icon:7, time:2000});
	// 	return;
	// }
	// if(captcha.length != 4){
	// 	layer.msg('验证码为4位!', {icon:7, time:2000});
	// 	return;
	// }
	var data = new Array();
	data['nameNick'] = nameNick;
	data['email'] = email;
	data['password'] = password;
	data['repassword'] = repassword;
	data['captcha'] = captcha;
	regSub(data);
}

//登录操作
function cliLogin() {

	var txtUser = $.trim($("#txtUser").val());
	var txtPwd = $("#Userpwd").val();
	if ($.trim(txtUser) == "") {
		Tip('请输入账号！');
		$("#txtUser").focus();
		return;
	}
	if ($.trim(txtPwd) == "") {
		Tip('请输入密码！');
		$("#Userpwd").focus();
		return;
	}
	var check = $('#issave').prop('checked');
	login(txtUser,txtPwd,check);
	return false;
}

function Sendpwd(sender) {
	var code = $("#txtCode2").val();
	var phone = $.trim($("#phone").val());
	if ($.trim(phone) == "") {
		Tip('请填写手机号码！');
		$("#phone").focus();
		return;
	}
	if ($("#yz-code").is(":visible") && $.trim(code) == "") {
		Tip('请填写验证码！');
		$("#txtCode2").focus();
		return;
	}
	return;
}
$("#dynamicLogon").click(function() {
	var pwd = $.trim($("#dynamicPWD").val());
	var phone = $.trim($("#phone").val());
	var code = $("#txtCode2").val();
	if ($.trim(phone) == "") {
		Tip('请填写手机号码！');
		$("#phone").focus();
		return;
	}
	if ($("#yz-code").is(":visible") && $.trim(code) == "") {
		Tip('请填写验证码！');
		$("#txtCode2").focus();
		return;
	}
	if ($.trim(pwd) == "") {
		Tip('动态密码未填写！');
		$("#dynamicPWD").focus();
		return;
	}
	return;
}); 
function Tip(msg) {
	$(".tishi").show().text(msg);
}
console.log("\u002f\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u000d\u000a\u0020\u002a\u0009\u0009\u0009\u0009\u0009\u0009\u0009\u0009\u0009\u0009\u0009\u0009\u0009\u0009\u0009\u0009\u002a\u0009\u0009\u000d\u000a\u0020\u002a\u0020\u0009\u0009\u0009\u0009\u0009\u0009\u0020\u0020\u0020\u0020\u0020\u0020\u4ee3\u7801\u5e93\u0009\u0009\u0009\u0009\u0009\u0009\u0009\u002a\u000d\u000a\u0020\u002a\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0077\u0077\u0077\u002e\u0064\u006d\u0061\u006b\u0075\u002e\u0063\u006f\u006d\u0009\u0009\u0009\u0009\u0009\u0009\u0009\u002a\u000d\u000a\u0020\u002a\u0020\u0020\u0020\u0020\u0020\u0020\u0020\u0009\u0009\u0020\u0020\u52aa\u529b\u521b\u5efa\u5b8c\u5584\u3001\u6301\u7eed\u66f4\u65b0\u63d2\u4ef6\u4ee5\u53ca\u6a21\u677f\u0009\u0009\u0009\u002a\u000d\u000a\u0020\u002a\u0020\u0009\u0009\u0009\u0009\u0009\u0009\u0009\u0009\u0009\u0009\u0009\u0009\u0009\u0009\u0009\u0009\u002a\u000d\u000a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002a\u002f");
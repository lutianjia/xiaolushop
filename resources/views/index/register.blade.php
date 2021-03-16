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
        <h1 class="log_logo left"><a href="javascript:;"><span>欢迎注册</span></a></h1>
    </div>
</div>
<div class="login_wrap" style="width:; background:#fff url(images/20161209115754_5628.jpg) no-repeat center top; padding:40px 0;">
    <div class="wrapper" id="login_body" style="width:;">
        <div class="log_ad" style="display:"><a href="javascript:;"></a></div>
        <div class="login_border" style="padding:8px;">
            <div class="login" style="display: block;">
                <div style="position:absolute; right:30px; top:14px;">
                    <a href="{{url('index/login')}}" target="_blank">账号登录
                        <em style="width:16px; height:16px; background:#999; float:right; color:#fff; border-radius:100%; text-align:center; line-height:16px; margin:1px 0 0 5px; font-family:'宋体'; font-weight:bold;">&gt;</em>
                    </a>
                </div>
                <ul class="login-tab">
                    <li class="login-on">邮箱注册</li>
                </ul>
                <div class="login-body">
                    <div class="login-style" style="display: block;">
                        <dl><dd><input name="nameNick" class="a" type="text" id="txtUser" placeholder="昵称" /></dd></dl>
                        <div class="tishi"></div>
                        <dl><dd><input name="email" class="a" type="text" id="txtUser" placeholder="邮箱" /></dd></dl>
                        <div class="tishi"></div>
                        <dl>
                            <dd><input type="password" class="a" id="Userpwd" name="password" placeholder="请输入您的密码" /></dd>
                        </dl>
                        <div class="tishi"></div>
                        <dl>
                            <dd><input type="password" class="a" id="Userpwd" name="repassword" placeholder="请再次输入您的密码" /></dd>
                        </dl>
                        <div class="tishi"></div>
                        <dl>
                            <dd><input type="text" class="a" style="width: 110px" id="Userpwd" name="captcha"  placeholder="请填写验证码" />
                            <div style="margin-top:-14px"><img src="{{captcha_src()}}" style="cursor: pointer;margin-left: 150px;margin-top: -90px" onclick="this.src='{{captcha_src()}}'+Math.random()" style="width: 50%; float: right"></div></dd>
                        </dl>
                        <div class="tishi"></div>
                        <button onClick="register()" id="logbtn" style="outline:none">注 册</button>
                    </div>
                </div>

            </div>

        </div>
        <div class="clear"></div>
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
    function regSub(data){
        layer.confirm('确认要提交吗？',function(index) {
            $.ajax({
                type: 'POST',
                url: "{{'/service/index_register'}}",
                dataType: 'json',
                data: {
                    nameNick: data['nameNick'],
                    email: data['email'],
                    password: data['password'],
                    password_confirmation: data['repassword'],
                    captcha: data['captcha'],
                    _token: "{{csrf_token()}}"
                },
                success: function (data) {
                    for(var a=0; a<5; a++){
                        document.getElementsByClassName("tishi")[a].innerHTML = '';
                        document.getElementsByClassName("a")[a].style="border:1px solid #d6d6d6";
                    }

                    if(data.captcha){
                        for(var i=0; i<data.captcha.length; i++){
                            document.getElementsByName("captcha")[0].style="border:1px solid red";
                            document.getElementsByClassName("tishi")[4].innerHTML = '<span>' + data.captcha[i] + '</span></br>';
                        }
                    }
                    if(data.email){
                        for(var i=0; i<data.email.length; i++){
                            document.getElementsByName("email")[0].style="border:1px solid red";
                            document.getElementsByClassName("tishi")[1].innerHTML += '<span>' + data.email[i] + '</span></br>';
                        }
                    }
                    if(data.nameNick){
                        for(var i=0; i<data.nameNick.length; i++){
                            document.getElementsByName("nameNick")[0].style="border:1px solid red";
                            document.getElementsByClassName("tishi")[0].innerHTML += '<span>' + data.nameNick[i] + '</span></br>';
                        }
                    }
                    if(data.password){
                        for(var i=0; i<data.password.length; i++){
                            document.getElementsByName("password")[0].style="border:1px solid red";
                            document.getElementsByClassName("tishi")[2].innerHTML += '<span>' + data.password[i] + '</span></br>';
                        }
                    }
                    if(data.password_confirmation){
                        for(var i=0; i<data.password_confirmation.length; i++){
                            document.getElementsByName("repassword")[0].style="border:1px solid red";
                            document.getElementsByClassName("tishi")[3].innerHTML += '<span>' + data.password_confirmation[i] + '</span></br>';
                        }
                    }


                    if (data.status == 1) {
                        layer.msg(data.message, {icon: 5, time: 2000});
                    } else if(data.status == 0){
                        layer.msg(data.message, {icon: 1, time: 2000});
                        setTimeout(function () {
                            window.location.href = "{{url('index/login')}}";
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
        });
    }

</script>
<script type="text/javascript" src="/index/js/style.js"></script>

</body>

</html>

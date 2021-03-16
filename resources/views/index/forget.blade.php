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
                <ul class="login-tab">
                    <li class="login-on">邮箱验证</li>
                </ul>
                <div class="login-body">
                    <div class="login-style" style="display: block;">
                        <dl><dd><input name="txtUser" class="a"  type="text" id="txtUser" value="" placeholder="邮箱" /></dd></dl>
                        <div class="tishi"></div>

                        <button onClick="emailSub()" id="logbtn" style="outline:none">提交</button>
                    </div>
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

<script type="text/javascript" src="/index/js/style.js"></script>
<script>
    function emailSub() {
        var email = document.getElementById("txtUser").value;
        if (email == "") {
            Tip('请输入邮箱！');
            $("#txtUser").focus();
            return;
        }
        layer.confirm('确认要提交吗？',function(index) {
            $.ajax({
                type: 'POST',
                url: "{{'/service/get_email'}}",
                // dataType: 'json',
                data: {
                    email:email,
                    _token: "{{csrf_token()}}"
                },
                success: function (data) {
                    console.log(data);
                    data=eval('('+data+')');
                    document.getElementsByClassName("tishi")[0].innerHTML = '';
                    document.getElementsByName("txtUser")[0].style="border:1px solid #d6d6d6";

                    if(data.email){
                        for(var i=0; i<data.email.length; i++){
                            document.getElementsByName("txtUser")[0].style="border:1px solid red";
                            document.getElementsByClassName("tishi")[0].innerHTML += '<span>' + data.email[i] + '</span></br>';
                        }
                    }

                    if (data.status == 1) {
                        layer.msg(data.message, {icon: 5, time: 2000});
                    } else if(data.status == 0){
                        layer.msg(data.message, {icon: 1, time: 2000});
                        setTimeout(function () {
                            window.location.href = "{{url('index/repassword')}}?id=" + data.id;
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
</body>

</html>

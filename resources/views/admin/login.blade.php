<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="/admin/assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/admin/assets/css/font-awesome.min.css"/>
    <!--[if IE 7]>
    <link rel="stylesheet" href="/admin/assets/css/font-awesome-ie7.min.css"/>
    <![endif]-->
    <link rel="stylesheet" href="/admin/assets/css/ace.min.css"/>
    <link rel="stylesheet" href="/admin/assets/css/ace-rtl.min.css"/>
    <link rel="stylesheet" href="/admin/assets/css/ace-skins.min.css"/>
    <link rel="stylesheet" href="/admin/css/style.css"/>
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="/admin/assets/css/ace-ie.min.css"/>
    <![endif]-->
    <script src="/admin/assets/js/ace-extra.min.js"></script>
    <!--[if lt IE 9]>
    <script src="/admin/assets/js/html5shiv.js"></script>
    <script src="/admin/assets/js/respond.min.js"></script>
    <![endif]-->
    <script src="/admin/js/jquery-1.9.1.min.js"></script>
    <script src="/admin/assets/layer/layer.js" type="text/javascript"></script>
    <title>登录</title>
</head>

<body class="login-layout Reg_log_style">
<div class="logintop">
    <span>欢迎后台管理界面平台</span>
    <ul>
        <li><a href="#">返回首页</a></li>
        <li><a href="#">帮助</a></li>
        <li><a href="#">关于</a></li>
    </ul>
</div>
<div class="loginbody">
    <div class="login-container">
        <div class="center">
            <img src="/admin/images/logo1.png"/>
        </div>

        <div class="space-6"></div>

        <div class="position-relative">
            <div id="login-box" class="login-box widget-box no-border visible">
                <div class="widget-body">
                    <div class="widget-main">
                        <h4 class="header blue lighter bigger">
                            <i class="icon-coffee green"></i>
                            管理员登录
                        </h4>

                        <div class="login_icon"><img src="/admin/images/login.png"/></div>

                        <form class="">
                            <fieldset>
                                <ul>
                                    <li class="frame_style form_error"><label class="user_icon"></label>
                                        <input name="account" type="text" id="账号" value="@if($account != null){{$account}}@endif"/><i id="account">账号</i></li>
                                    <li class="frame_style form_error"><label class="password_icon"></label>
                                        <input name="password" type="password" id="密码" value="@if($password != null){{$password}}@endif"/><i id="password">密码</i></li>
                                    <li class="frame_style form_error"><label class="Codes_icon"></label>
                                        <input name="validate_code" type="text" id="验证码"/><i>验证码</i>
                                        <div class="Codes_region"><img src="{{url('/service/validate_code/create')}}"class="code"/></div>
                                    </li>

                                </ul>
                                <div class="space"></div>

                                <div class="clearfix">
                                    <label class="inline">
                                        <input type="checkbox" class="ace" id="checkbox">
                                        <span class="lbl">保存密码</span>
                                    </label>

                                    <button type="button" class="width-35 pull-right btn btn-sm btn-primary"
                                            id="login_btn" onclick="onLoginClick()">
                                        <i class="icon-key"></i>
                                        登录
                                    </button>
                                </div>

                                <div class="space-4"></div>
                            </fieldset>
                        </form>

                        <div class="social-or-login center">
                            <span class="bigger-110">通知</span>
                        </div>

                        <div class="social-login center">
                            本网站系统不再对IE8以下浏览器支持，请见谅。
                        </div>
                    </div><!-- /widget-main -->

                    <div class="toolbar clearfix">


                    </div>
                </div><!-- /widget-body -->
            </div><!-- /login-box -->
        </div><!-- /position-relative -->
    </div>
</div>
<div class="loginbm">版权所有 2016 <a href="">南京思美软件系统有限公司</a></div>
<strong></strong>
</body>
</html>
<script>
    $('.code').click(function () {
        $(this).attr('src', '{{url('/service/validate_code/create')}}?random=' + Math.random());
    });

    window.onload= function (){
        var chartData='<?php echo "$account";?>';
         // alert(chartData);
        if (chartData){
            document.getElementById("account").innerHTML = '';
            document.getElementById("password").innerHTML = '';
        }
    };

    function onLoginClick(){
        var str = "";
        var account = $('input[name=account]').val();
        if(account.length == 0) {
            layer.alert(str += "" + "账号" + "不能为空！\r\n", {
                title: '提示框',
                icon: 0,
            });
            return;
        }
        if(account.length < 6) {
            layer.alert(str += "" + "账号不能少于6位！\r\n", {
                title: '提示框',
                icon: 0,
            });
            return;
        }
        // 密码
        var password = $('input[name=password]').val();
        if(password.length == 0) {
            layer.alert(str += "" + "密码" + "不能为空！\r\n", {
                title: '提示框',
                icon: 0,
            });
            return;
        }
        if(password.length < 6) {
            layer.alert(str += "" + "密码不能少于6位！\r\n", {
                title: '提示框',
                icon: 0,
            });
            return;
        }
        // 验证码
        var validate_code = $('input[name=validate_code]').val();
        if(validate_code.length == 0) {
            layer.alert(str += "" + "验证码" + "不能为空！\r\n", {
                title: '提示框',
                icon: 0,
            });
            return;
        }
        if(validate_code.length != 4) {
            layer.alert(str += "" + "验证码为4位！\r\n", {
                title: '提示框',
                icon: 0,
            });
            return;
        }

        var remember = $('#checkbox').prop('checked');
        $.ajax({
            type: "POST",
            url: '{{url('/service/login')}}',
            cache: false,
            data: {account: account, password: password, validate_code: validate_code,remember: remember, _token: "{{csrf_token()}}"},
            success: function(data) {
                var data = eval('(' + data + ')');
                console.log(data.status);
                if(data == null) {
                    layer.msg("服务器端错误",{icon:7,time:2000});
                    return;
                }

                if(data.status != 0) {
                    layer.msg(data.message,{icon:7,time:2000});
                    return;
                }
                layer.msg(data.message,{icon:1,time:1000});
                location.href = "{{url('/admin/index')}}";
            },
            error: function(xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    }

    $(document).ready(function () {
        $("input[type='text'],input[type='password']").blur(function () {
            var $el = $(this);
            var $parent = $el.parent();
            $parent.attr('class', 'frame_style').removeClass(' form_error');
            if ($el.val() == '') {
                $parent.attr('class', 'frame_style').addClass(' form_error');
            }
        });
        $("input[type='text'],input[type='password']").focus(function () {
            var $el = $(this);
            var $parent = $el.parent();
            $parent.attr('class', 'frame_style').removeClass(' form_errors');
            if ($el.val() == '') {
                $parent.attr('class', 'frame_style').addClass(' form_errors');
            } else {
                $parent.attr('class', 'frame_style').removeClass(' form_errors');
            }
        });
    });

</script>
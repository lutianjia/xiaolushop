@include('index.head')

<body class="page woocommerce-account woocommerce-page woocommerce-edit-account">
<div class="body-wrapper theme-clearfix">
    @include('index.header')

    <div class="listings-title">
        <div class="container">
            <div class="wrap-title">
                <h1>我的账户</h1>
                <div class="bread">
                    <div class="breadcrumbs theme-clearfix">
                        <div class="container">
                            <ul class="breadcrumb">
                                <li>
                                    <a href="{{url('')}}">首页</a>
                                    <span class="go-page"></span>
                                </li>

                                <li class="active">
                                    <span>我的账户</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div id="contents" role="main" class="main-page  col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="post-6 page type-page status-publish hentry">
                    <div class="entry-content">
                        <header>
                            <h2 class="entry-title">我的账户</h2>
                        </header>

                        <div class="entry-content">
                            <div class="woocommerce">
                                @include('index.myAccountNav')

                                <div class="woocommerce-MyAccount-content">
                                    <form class="edit-account" action="" method="post">
                                        <p class="form-row form-row-first">
                                            <label for="account_first_name">
                                                您的账号
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" class="input-text" name="account_first_name" id="account_first_name" value="{{$account}}">
                                        </p>

                                        <div class="clear"></div>

                                        <fieldset>
                                            <legend>修改密码</legend>
                                            <p class="form-row form-row-wide">
                                                <label for="password_current">旧密码</label>
                                                <input type="password" class="input-text" name="txtUser" id="password_current" value="">
                                            </p>
                                            <div class="tishi" STYLE="color:red"></div>
                                            <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                                                <label for="password_1">新密码</label>
                                                <input type="password" class="input-text" name="txtUser" id="password_1" value="">
                                            </p>
                                            <div class="tishi" STYLE="color:red"></div>
                                            <p class="form-row form-row-wide">
                                                <label for="password_2">再次输入新密码</label>
                                                <input type="password" class="input-text" name="txtUser" id="password_2" value="">
                                            </p>
                                            <div class="tishi" STYLE="color:red"></div>
                                        </fieldset>

                                        <div class="clear"></div>
                                        <p>
                                            <input type="button" class="button" onclick="passwordSub()" name="save_account_details" value="提交">
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @include('index.footer')
<script>
    function passwordSub() {
        for(var a=0; a<3; a++) {
            document.getElementsByClassName("tishi")[a].innerHTML = '';
            document.getElementsByName("txtUser")[a].style = "border:1px solid #d6d6d6";
        }
        var oldPassword = document.getElementsByName("txtUser")[0].value;
        if (oldPassword == "") {
            document.getElementsByClassName("tishi")[0].innerHTML = '旧密码不能为空！';
            document.getElementsByName("txtUser")[0].style="border:1px solid red";
            $("#txtUser").focus();
            return;
        }
        var password = document.getElementsByName("txtUser")[1].value;
        if (password == "") {
            document.getElementsByClassName("tishi")[1].innerHTML = '请输入密码！';
            document.getElementsByName("txtUser")[1].style="border:1px solid red";
            $("#txtUser").focus();
            return;
        }
        var password_confirmation = document.getElementsByName("txtUser")[2].value;
        if (password_confirmation == "") {
            document.getElementsByClassName("tishi")[2].innerHTML = '请二次输入密码！';
            document.getElementsByName("txtUser")[2].style="border:1px solid red";
            $("#txtUser").focus();
            return;
        }
        layer.confirm('确认要提交吗？',function(index) {
            $.ajax({
                type: 'POST',
                url: "{{'/service/changePassword'}}",
                dataType: 'json',
                data: {
                    oldPassword:oldPassword,
                    password:password,
                    password_confirmation:password_confirmation,
                    _token: "{{csrf_token()}}"
                },
                success: function (data) {
                    if(data.password){
                        for(var i=0; i<data.password.length; i++){
                            document.getElementsByName("txtUser")[1].style="border:1px solid red";
                            document.getElementsByClassName("tishi")[1].innerHTML += '<span>' + data.password[i] + '</span></br>';
                        }
                    }

                    if (data.status == 1) {
                        layer.msg(data.message, {icon: 5, time: 2000});
                    } else if(data.status == 0){
                        layer.msg(data.message, {icon: 1, time: 2000});
                    }else{
                        layer.msg('',{time: 1});
                    }
                },
                error: function (data) {
                    layer.closeAll('dialog');
                },
            });
        });
    }
</script>

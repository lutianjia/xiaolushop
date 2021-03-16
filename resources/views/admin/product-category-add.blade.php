<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link href="/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/admin/css/style.css"/>
    <link rel="stylesheet" href="/admin/assets/css/ace.min.css" />
    <link rel="stylesheet" href="/admin/assets/css/font-awesome.min.css" />
    <link href="/admin/Widget/icheck/icheck.css" rel="stylesheet" type="text/css" />
    <!--[if IE 7]>
    <link rel="stylesheet" href="/admin/assets/css/font-awesome-ie7.min.css" />
    <![endif]-->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="/admin/assets/css/ace-ie.min.css" />
    <![endif]-->
    <script src="/admin/js/jquery-1.9.1.min.js"></script>
    <script src="/admin/assets/js/bootstrap.min.js"></script>
    <title>添加产品分类</title>
</head>
<body>
<div class="type_style">
    <div class="type_title">产品类型信息</div>
    <div class="type_content">
        <div class="Operate_btn">
            <s id="category_start"><a href="javascript:void(0)" class="btn  btn-warning"><i class="icon-ok align-top bigger-125"onclick="category_start('id','tId')"></i>启用该类型</a></s>
            <s id="category_stop"><a href="javascript:void(0)" class="btn  btn-success" onclick="category_stop('id','tId')"><i class="icon-ok align-top bigger-125"></i>禁用该类型</a></s>
            <s id="category_delete"><a href="javascript:void(0)" class="btn  btn-danger" onclick="category_delete('id','from_id','pId','tId')"><i class="icon-trash   align-top bigger-125"></i>删除该类型</a></s>
        </div>
        <form action="" method="post" class="form form-horizontal" id="form-user-add">
            <div class="Operate_cont clearfix">
                <input type="hidden" value="0" name="parent_id" id="parent_id"/>
                <input type="hidden" value="0" name="parent_table_id" id="parent_table_id"/>
                <div class="Operate_cont clearfix">
                    <label class="form-label" style="margin-left: -10px"><span class="c-red">*</span>所属分类：</label>
                    <div class="formControls ">
                        <input type="text" class="input-text" value="" placeholder="" id="parent_name" name="parent_name">
                    </div>
                </div>
                <label class="form-label"><span class="c-red">*</span>分类名称：</label>
                <div class="formControls ">
                    <input type="text" class="input-text" value="" placeholder="" id="user-name" name="product-category-name">
                </div>
            </div>
            <div class="Operate_cont clearfix">
                <label class="form-label">备注：</label>
                <div class="formControls">
                    <textarea name="remarks" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="textarealength(this,100)"></textarea>
                    <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
                </div>
            </div>
            <div class="">
                <div class="" style=" text-align:center">
                    <input class="btn btn-primary radius" type="submit" onclick="category_submit()" value="提交">
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<script type="text/javascript" src="/admin/Widget/icheck/jquery.icheck.min.js"></script>
<script type="text/javascript" src="/admin/Widget/Validform/5.3.2/Validform.min.js"></script>
<script type="text/javascript" src="/admin/assets/layer/layer.js"></script>
<script type="text/javascript" src="/admin/js/H-ui.js"></script>
<script type="text/javascript" src="/admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        $("#form-user-add").Validform({
            tiptype:2,
            callback:function(form){
                form[0].submit();
                var index = parent.layer.getFrameIndex(window.name);
                parent.$('.btn-refresh').click();
                parent.layer.close(index);
            }
        });
    });

    function category_stop(id,tId){
        if(id == "id"){
            layer.msg('请选择类型!',{icon:2,time:1000});
        }else{
            layer.confirm('确认要禁用吗？',function(index){
                $.ajax({
                    type: 'POST',
                    url: "{{url('/service/change_status')}}",
                    dataType: 'json',
                    data:{
                        id:id,
                        table:'product_category',
                        status:0,
                        _token: "{{csrf_token()}}"
                    },
                    success: function(data){
                        // console.log(tId);
                        window.parent.document.getElementById(tId).getElementsByTagName("a")[0].style.backgroundColor="grey";
                        layer.msg('已禁用!',{icon:1,time:1000});
                    },
                    error:function(data) {
                        console.log(data.msg);
                        layer.closeAll('dialog');
                    },
                });
            });
        }

    }function category_start(id,tId){
        if(id == "id"){
            layer.msg('请选择类型!',{icon:2,time:1000});
        }else{
            layer.confirm('确认要启用吗？',function(index){
                $.ajax({
                    type: 'POST',
                    url: "{{url('/service/change_status')}}",
                    dataType: 'json',
                    data:{
                        id:id,
                        table:'product_category',
                        status:1,
                        _token: "{{csrf_token()}}"
                    },
                    success: function(data){
                        // console.log(tId);
                        window.parent.document.getElementById(tId).getElementsByTagName("a")[0].style.backgroundColor="white";
                        layer.msg('已启用!',{icon:1,time:1000});
                    },
                    error:function(data) {
                        console.log(data.msg);
                        layer.closeAll('dialog');
                    },
                });
            });
        }

    }

    function category_delete(id,from_id,pId,tId) {
        if(id == 'id'){
            layer.msg('请选择类型!',{icon:2,time:1000});
        }else{
            layer.confirm('确认要删除吗？',function(index){
                $.ajax({
                    type: 'POST',
                    url: "{{url('/service/change_status')}}",
                    dataType: 'json',
                    data:{
                        id:id,
                        table:'product_category',
                        status:-1,
                        pId:pId,
                        _token: "{{csrf_token()}}"
                    },
                    success: function(data){
                        // console.log(data.pId);
                        if(data.pId==0){
                            console.log(from_id);
                            var parentNode=window.parent.document.getElementById(from_id).parentNode;
                            parentNode.getElementsByTagName("span")[0].classList.remove("noline_open");
                            parentNode.getElementsByTagName("span")[0].classList.add("noline_docu");
                            parentNode.getElementsByTagName("a")[0].getElementsByTagName("span")[0].classList.remove("ico_open");
                            parentNode.getElementsByTagName("a")[0].getElementsByTagName("span")[0].classList.add("ico_docu");
                        }
                        window.parent.document.getElementById(tId).innerHTML='';
                        layer.msg('已删除!',{icon:1,time:1000});
                    },
                    error:function(data) {
                        console.log(data.msg);
                        layer.closeAll('dialog');
                    },
                });
            });
        }

    }

    function category_submit() {
        var parent_id = $('input[name=parent_id]').val();
        var parent_table_id = $('input[name=parent_table_id]').val();
        var product_category_name = $('input[name=product-category-name]').val();
        var remarks = $('textarea[name=remarks]').val();
        // console.log(parent_id);
        // console.log(product_category_name);
        // console.log(remarks);
        $.ajax({
            type: "POST",
            url: '{{url('/service/category_add')}}',
            dataType: 'json',
            cache: false,
            data: {parent_id: parent_id, product_category_name: product_category_name, remarks: remarks, _token: "{{csrf_token()}}"},
            success: function(data) {
                // console.log(data);
                if(data.status != 0) {

                    layer.msg(data.message,{icon:7,time:2000});

                    return;
                }
                if(window.parent.document.getElementById(parent_table_id).getElementsByTagName("a")[0].getElementsByTagName("span")[0].className.indexOf('ico_docu')){
                    var parentNode=window.parent.document.getElementById(parent_table_id);
                    parentNode.getElementsByTagName("span")[0].classList.remove("noline_docu");
                    parentNode.getElementsByTagName("span")[0].classList.add("noline_open");
                    parentNode.getElementsByTagName("a")[0].getElementsByTagName("span")[0].classList.remove("ico_docu");
                    parentNode.getElementsByTagName("a")[0].getElementsByTagName("span")[0].classList.add("ico_open");
                    parentNode.getElementsByTagName("span")[0].onclick = function (){
                        // console.log(parentNode.getElementsByTagName("span")[0].className);
                        if(parentNode.getElementsByTagName("span")[0].className.indexOf('noline_open')!=-1){
                            parentNode.getElementsByTagName("span")[0].classList.remove("noline_open");
                            parentNode.getElementsByTagName("span")[0].classList.add("noline_close");
                            // parentNode.getElementsByTagName("ul")[0].innerHTML = '';
                            var elem = parentNode.getElementsByTagName("ul")[0];
                            parentNode.removeChild(elem);
                        }else{
                            parentNode.getElementsByTagName("span")[0].classList.remove("noline_close");
                            parentNode.getElementsByTagName("span")[0].classList.add("noline_open");
                            var content=document.createElement("ul");
                            content.id="treeDemo_6_ul";
                            content.className="level1";
                            content.innerHTML=
                                '<li id="treeDemo_7" class="level2" tabindex="0" hidefocus="true" treenode=""> ' +
                                '<span id="treeDemo_7_switch" title="" class="button level2 switch noline_docu" treenode_switch=""></span>' +
                                ' <a id="treeDemo_7_a" class="level2" treenode_a="" onclick="" target="_blank" title="华为"> ' +
                                '<span id="treeDemo_7_ico" title="" treenode_ico="" class="button ico_docu" style=""></span>' +
                                '<span id="span"></span> </a> </li>';
                            window.parent.document.getElementById(parent_table_id).append(content);
                            window.parent.document.getElementById("span").innerHTML = product_category_name;
                        }

                    };
                    var content=document.createElement("ul");
                    content.id="treeDemo_6_ul";
                    content.className="level1";
                    content.innerHTML=
                        '<li id="treeDemo_7" class="level2" tabindex="0" hidefocus="true" treenode=""> ' +
                        '<span id="treeDemo_7_switch" title="" class="button level2 switch noline_docu" treenode_switch=""></span>' +
                        ' <a id="treeDemo_7_a" class="level2" treenode_a="" onclick="" target="_blank" title="华为"> ' +
                        '<span id="treeDemo_7_ico" title="" treenode_ico="" class="button ico_docu" style=""></span>' +
                        '<span id="span"></span> </a> </li>';
                    window.parent.document.getElementById(parent_table_id).append(content);
                    window.parent.document.getElementById("span").innerHTML = product_category_name;
                }else{
                    if(window.parent.document.getElementById(parent_table_id).getElementsByTagName("span")[0].className.indexOf('noline_close') == -1){
                        var content=document.createElement("li");
                        content.id="treeDemo_3";
                        content.className="level2";
                        content.tabindex="0";
                        content.hidefocus="true";
                        content.innerHTML=
                            '<span id="treeDemo_3_switch" title="" class="button level2 switch noline_docu" treenode_switch=""></span>' +
                            '<a id="treeDemo_3_a" class="level2" treenode_a="" onclick="" target="_blank" style="" title="格力">' +
                            '<span id="treeDemo_3_ico" title="" treenode_ico="" class="button ico_docu" style=""></span>' +
                            '<span id="span"></span>' +
                            '</a>';

                        window.parent.document.getElementById(parent_table_id).getElementsByTagName("ul")[0].append(content);
                        window.parent.document.getElementById("span").innerHTML = product_category_name;
                    }
                }


                layer.msg(data.message,{icon:1,time:1000});
            },
            error: function(xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    }
</script>
</body>
</html>
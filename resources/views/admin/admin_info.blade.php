<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Cache-Control" content="no-siteapp" />
 <link href="/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/admin/css/style.css"/>
        <link href="/admin/assets/css/codemirror.css" rel="stylesheet">
        <link rel="stylesheet" href="/admin/assets/css/ace.min.css" />
        <link rel="stylesheet" href="/admin/font/css/font-awesome.min.css" />
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="/admin/assets/css/ace-ie.min.css" />
		<![endif]-->
		<script src="/admin/js/jquery-1.9.1.min.js"></script>
		<script src="/admin/assets/layer/layer.js" type="text/javascript" ></script>
        <script src="/admin/assets/laydate/laydate.js" type="text/javascript"></script>
        <script src="/admin/assets/js/bootstrap.min.js"></script>
		<script src="/admin/assets/js/typeahead-bs2.min.js"></script>
		<script src="/admin/assets/js/jquery.dataTables.min.js"></script>
		<script src="/admin/assets/js/jquery.dataTables.bootstrap.js"></script>
                      
<title>个人信息管理</title>
</head>

<body>
<div class="clearfix">
 <div class="admin_info_style">
   <div class="admin_modify_style" id="Personal">
     <div class="type_title">管理员信息 </div>
      <div class="xinxi">
          <input type="hidden" name="id" id="id" value="{{$adminMessage[0]->id}}" class="col-xs-7 text_info" disabled="disabled">
        <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">用户名： </label>
          <div class="col-sm-9"><input type="text" name="用户名" id="website-title" value="{{$adminMessage[0]->username}}" class="col-xs-7 text_info" disabled="disabled">
          &nbsp;&nbsp;&nbsp;<a href="#" onclick="change_Password()" class="btn btn-warning btn-xs">修改密码</a></div>
          
          </div>
          <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">移动电话： </label>
          <div class="col-sm-9"><input type="text" name="移动电话" id="website-title" value="{{$adminMessage[0]->number}}" class="col-xs-7 text_info" disabled="disabled"></div>
          </div>
          <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">电子邮箱： </label>
          <div class="col-sm-9"><input type="text" name="电子邮箱" id="website-title" value="{{$adminMessage[0]->email}}" class="col-xs-7 text_info" disabled="disabled"></div>
          </div>
           <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">权限： </label>
          <div class="col-sm-9" > <span>{{$adminMessage[0]->role}}</span></div>
          </div>
           <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">注册时间： </label>
          <div class="col-sm-9" > <span>{{$adminMessage[0]->create_time}}</span></div>
          </div>
           <div class="Button_operation clearfix"> 
				<button onclick="modify();" class="btn btn-danger radius" type="submit">修改信息</button>				
				<button onclick="save_info();" class="btn btn-success radius" type="button">保存修改</button>              
			</div>
            </div>
    </div>
    <div class="recording_style">
    <div class="type_title">管理员登录记录 </div>
    <div class="recording_list">
     <table class="table table-border table-bordered table-bg table-hover table-sort" id="sample-table">
    <thead>
      <tr class="text-c">
        <th width="25"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
        <th width="80">ID</th>
        <th width="100">类型</th>
        <th>内容</th>
        <th width="10%">用户名</th>
        <th width="120">客户端IP</th>
        <th width="150">时间</th>
      </tr>
    </thead>
    <tbody>
    @foreach($adminHistoryMessage as $list)
      <tr>
        <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
        <td>{{$list->id}}</td>
        <td>@if($list->content == '登陆成功'){{1}}@else{{2}}@endif</td>
        <td>{{$list->content}}!</td>
        <td>{{$list->username}}</td>
        <td>{{$list->ip}}</td>
        <td>{{$list->create_time}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
    </div>
    </div>
 </div>
</div>
 <!--修改密码样式-->
         <div class="change_Pass_style" id="change_Pass">
            <ul class="xg_style">
             <input name="原密码" type="hidden" class="" value="{{$adminMessage[0]->id}}" id="id">
             <li><label class="label_name">原&nbsp;&nbsp;密&nbsp;码</label><input name="原密码" type="password" class="" id="password"></li>
             <li><label class="label_name">新&nbsp;&nbsp;密&nbsp;码</label><input name="新密码" type="password" class="" id="Nes_pas"></li>
             <li><label class="label_name">确认密码</label><input name="再次确认密码" type="password" class="" id="c_mew_pas"></li>
              
            </ul>
     <!--       <div class="center"> <button class="btn btn-primary" type="button" id="submit">确认修改</button></div>-->
         </div>
</body>
</html>
<script>

 //按钮点击事件
function modify(){
	 $('.text_info').attr("disabled", false);
	 $('.text_info').addClass("add");
	  $('#Personal').find('.xinxi').addClass("hover");
	  $('#Personal').find('.btn-success').css({'display':'block'});
	};
function save_info(){
	     var num=0;
		 var str="";
     $(".xinxi input[type$='text']").each(function(n){
          if($(this).val()=="")
          {
               
			   layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
                title: '提示框',				
				icon:0,								
          }); 
		    num++;
            return false;            
          } 
		 });
		  if(num>0){  return false;}	 	
          else{
              var username = document.getElementsByName('用户名')[0].value;
              if(username == ''){
                  layer.msg('用户名不能为空',{icon: 5,time:1000});
                  return false;
              }
              var number = document.getElementsByName('移动电话')[0].value;
              if(number == ''){
                  layer.msg('移动电话不能为空',{icon: 5,time:1000});
                  return false;
              }
              var myreg = /^[1][3,4,5,7,8,9][0-9]{9}$/;
              if (!myreg.test(number)) {
                  layer.msg('移动电话格式错误',{icon: 5,time:1000});
                  return false;
              }
              var email = document.getElementsByName('电子邮箱')[0].value;
              if(email == ''){
                  layer.msg('电子邮箱不能为空',{icon: 5,time:1000});
                  return false;
              }
              var reg = new RegExp("^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$");
              if(!reg.test(email)){
                  layer.msg('电子邮箱格式错误',{icon: 5,time:1000});
                  return false;
              }
              var id = document.getElementsByName('id')[0].value;
              $.ajax({
                  type: 'POST',
                  url: "{{url('/service/change_message')}}",
                  // dataType: 'json',
                  data:{id:id,username:username,number:number,email:email,_token: "{{csrf_token()}}"},
                  success: function(data){
                      var data = eval('(' + data + ')');
                      if(data.status == 0){
                          layer.alert(data.message,{
                              title: '提示框',
                              icon:1,
                          });
                          $('#Personal').find('.xinxi').removeClass("hover");
                          $('#Personal').find('.text_info').removeClass("add").attr("disabled", true);
                          $('#Personal').find('.btn-success').css({'display':'none'});
                      }else{
                          layer.msg(data.message,{icon: 5,time:1000});
                      }

                      layer.close(index);
                  },
                  error:function(data) {
                      console.log(data);
                      layer.closeAll('dialog');
                  },
              });
		  }		  		
	};
 //初始化宽度、高度    
    $(".admin_modify_style").height($(window).height()); 
	$(".recording_style").width($(window).width()-400); 
    //当文档窗口发生改变时 触发  
    $(window).resize(function(){
	$(".admin_modify_style").height($(window).height()); 
	$(".recording_style").width($(window).width()-400); 
  });
  //修改密码
  function change_Password(){
	   layer.open({
    type: 1,
	title:'修改密码',
	area: ['300px','300px'],
	shadeClose: true,
	content: $('#change_Pass'),
	btn:['确认修改'],
	yes:function(index, layero){
        var id = $("#id").val();
        var hisPassword = $("#password").val();
		   if (hisPassword==""){
			  layer.alert('原密码不能为空!',{
              title: '提示框',				
				icon:0,
			    
			 });
			return false;
          }
		var password = $("#Nes_pas").val();
		  if (password==""){
			  layer.alert('新密码不能为空!',{
              title: '提示框',				
				icon:0,
			    
			 });
			return false;
          } 
		   
		  if ($("#c_mew_pas").val()==""){
			  layer.alert('确认新密码不能为空!',{
              title: '提示框',				
				icon:0,
			    
			 });
			return false;
          }
		    if(!$("#c_mew_pas").val || $("#c_mew_pas").val() != $("#Nes_pas").val() )
        {
            layer.alert('密码不一致!',{
              title: '提示框',				
				icon:0,
			    
			 });
			 return false;
        }   
		 else{
                $.ajax({
                    type: 'POST',
                    url: "{{url('/service/change_password')}}",
                    // dataType: 'json',
                    data:{id:id,hisPassword:hisPassword,password:password,_token: "{{csrf_token()}}"},
                    success: function(data){
                        var data = eval('(' + data + ')');
                        if(data.status == 0){
                            layer.alert('修改成功！',{
                                title: '提示框',
                                icon:1,
                            });
                        }else{
                            layer.msg(data.message,{icon: 5,time:1000});
                        }
                        layer.close(index);
                    },
                    error:function(data) {
                        console.log(data);
                        layer.closeAll('dialog');
                    },
                });
		  }	 
	}
    });
  }
</script>
<script>
jQuery(function($) {
		var oTable1 = $('#sample-table').dataTable( {
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,2,3,4,5,6]}// 制定列不参与排序
		] } );
				
				
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});
});</script>

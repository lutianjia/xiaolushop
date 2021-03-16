<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
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
		<script src="/admin/assets/js/typeahead-bs2.min.js"></script>
        <script src="/admin/js/lrtk.js" type="text/javascript" ></script>
		<script src="/admin/assets/js/jquery.dataTables.min.js"></script>
		<script src="/admin/assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="/admin/assets/layer/layer.js" type="text/javascript" ></script>
        <script type="text/javascript" src="/admin/Widget/swfupload/swfupload.js"></script>
        <script type="text/javascript" src="/admin/Widget/swfupload/swfupload.queue.js"></script>
        <script type="text/javascript" src="/admin/Widget/swfupload/swfupload.speed.js"></script>
        <script type="text/javascript" src="/admin/Widget/swfupload/handlers.js"></script>
<title>广告管理</title>
</head>

<body>
<div class=" clearfix" id="advertising">
       <div id="scrollsidebar" class="left_Treeview">
    <div class="show_btn" id="rightArrow"><span></span></div>
    <div class="widget-box side_content" >
    <div class="side_title"><a title="隐藏" class="close_btn"><span></span></a></div>
     <div class="side_list">
      <div class="widget-header header-color-green2">
          <h4 class="lighter smaller">广告图分类</h4>
      </div>
      <div class="widget-body">
         <ul class="b_P_Sort_list">
             <li><i class="orange  fa fa-user-secret"></i><a href="{{url('/admin/advertising')}}">全部({{count($imageList)}})</a></li>
             @foreach($imageCategoryList as $list)
             <li><i class="fa fa-image pink "></i> <a href="{{url('/admin/advertising',['category_id'=>$list->id])}}">{{$list->image_category_name}}({{$list->count}})</a></li>
             @endforeach
         </ul>
  </div>
  </div>
  </div>  
  </div><div class="Ads_list">
   <div class="border clearfix">
       <span class="l_f">
        <a href="#" id="ads_add" class="btn btn-warning"><i class="fa fa-plus"></i> 添加广告</a>
        <a href="#" class="btn btn-danger" onclick="batchDelect()"><i class="fa fa-trash"></i> 批量删除</a>
       </span>
       <span class="r_f">共：<b>{{count($imageList)}}</b>条广告</span>
     </div>
     <div class="Ads_lists">
       <table class="table table-striped table-bordered table-hover" id="sample-table">
		<thead>
		 <tr>
				<th width="25"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th width="80">ID</th>
                <th>排序</th>
				<th width="100">分类</th>
				<th width="220px">图片</th>
				<th width="150px">尺寸（大小）</th>
				<th width="250px">链接地址</th>
				<th width="180px">加入时间</th>
				<th width="70px">状态</th>                
				<th width="250px">操作</th>
			</tr>
		</thead>
	<tbody>
    @foreach($imageList as $list)
      <tr>
       <td><label><input type="checkbox" class="ace" name="id" value="{{$list->id}}"><span class="lbl"></span></label></td>
       <td>{{$list->id}}</td>
       <td><input name="" id="sort{{$list->id}}" type="text" value="{{$list->sort}}" onblur="changeSort({{$list->id}})" style=" width:50px" placeholder="1"/></td>
       <td id="category_name{{$list->id}}">{{$list->image_category_name}}</td>
       <td><span class="ad_img"><img src="{{$list->image}}" id="image{{$list->id}}" width="100%" height="100%"/></span></td>
       <td id="size{{$list->id}}">{{$list->size}}</td>
       <td><a href="{{$list->url}}" target="_blank" id="url{{$list->id}}">{{$list->url}}</a></td>
       <td>{{$list->create_time}}</td>
       <td class="td-status">
           @if($list->status == '1')
               <span class="label label-success radius">显示</span>
           @elseif($list->status == '0')
               <span class="label label-success radius">已关闭</span>
           @endif
       </td>
      <td class="td-manage">
          @if($list->status == '1')
              <a onClick="member_stop(this,{{$list->id}})"  href="javascript:;" title="关闭"  class="btn btn-xs btn-success"><i class="fa fa-check  bigger-120"></i></a>
          @elseif($list->status == '0')
              <a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,{{$list->id}})" href="javascript:;" title="显示"><i class="fa fa-close bigger-120"></i></a>
          @endif
        <a title="编辑" onclick="member_edit({{$list->id}})" href="javascript:;"  class="btn btn-xs btn-info" ><i class="fa fa-edit bigger-120"></i></a>
        <a title="删除" href="javascript:;"  onclick="member_del(this,{{$list->id}})" class="btn btn-xs btn-warning" ><i class="fa fa-trash  bigger-120"></i></a>
      </td>
      </tr>
    @endforeach
    </tbody>
    </table>
     </div>
 </div>
</div>
<!--添加广告样式-->
<div id="add_ads_style"  style="display:none">
 <div class="add_adverts">
 <ul>
  <li>
      <input type="hidden" id="update_id" value=""/>
  <label class="label_name">所属分类</label>
  <span class="cont_style">
  <select class="form-control" id="form-field-select-1" name="category">
    <option value="" id="select">选择分类</option>
      @foreach($imageCategoryList as $list)
        <option value="{{$list->id}}">{{$list->image_category_name}}</option>
      @endforeach
  </select></span>
  </li>
  <li><label class="label_name">图片尺寸</label><span class="cont_style">
  <input name="长" type="text" id="form-field-1" placeholder="0" class="col-xs-10 col-sm-5" style="width:80px">
  <span class="l_f" style="margin-left:10px;">x</span><input name="宽" type="text" id="form-field-1" placeholder="0" class="col-xs-10 col-sm-5" style="width:80px"></span></li>
  <li><label class="label_name">显示排序</label><span class="cont_style"><input name="排序" type="text" id="form-field-1" value="0" class="col-xs-10 col-sm-5" style="width:50px"></span></li>
  <li><label class="label_name">链接地址</label><span class="cont_style"><input name="地址" type="text" id="form-field-1" placeholder="地址" class="col-xs-10 col-sm-5" style="width:450px"></span></li>
     <li><label class="label_name">图片</label><span class="cont_style">
 <div class="demo">
	           <div class="logobox"><div class="resizebox"><img src="images/image.png" id="image" width="100px" alt="" height="100px"/></div></div>
               <div class="logoupload">
                  <div class="btnbox"><a id="uploadBtnHolder" class="uploadbtn" href="javascript:;">上传替换</a></div>
                  <div style="clear:both;height:0;overflow:hidden;"></div>
                  <div class="progress-box" style="display:none;">
                    <div class="progress-num">上传进度：<b>0%</b></div>
                    <div class="progress-bar"><div style="width:0%;" class="bar-line"></div></div>
                  </div>  <div class="prompt"><p>图片大小小于5MB,支持.jpg;.gif;.png;.jpeg格式的图片</p></div>  
              </div>                                
           </div>           
   </span>
  </li>


 </ul>
 </div>
</div>
<script>
    function a(id) {
        var image = document.getElementById("image"+id).src;
        var url = document.getElementById("url"+id).href;

        var size = document.getElementById("size"+id).innerHTML;
        size1 = size.split("x")[0];
        size2 = size.split("x")[1];
        var sort = document.getElementById("sort"+id).value;
        var category_name = document.getElementById("category_name"+id).innerHTML;
        var select = document.getElementById("form-field-select-1");
        for (var i = 0; i < select.options.length; i++){
            if (select.options[i].innerHTML == category_name){
                select.options[i].selected = true;
                break;
            }
        }
        document.getElementsByName("长")[0].value = size1;
        document.getElementsByName("宽")[0].value = size2;
        document.getElementsByName("排序")[0].value = sort;
        document.getElementsByName("地址")[0].value = url;
        document.getElementById("image").src = image;
        document.getElementById("update_id").value = id;
    }
</script>
</body>
</html>
<script>
    function changeSort(id) {
        var sort = document.getElementById("sort"+id).value;
        $.ajax({
            type: 'POST',
            url:"{{url('/service/change_sort')}}",
            dataType: 'json',
            data:{id:id,sort:sort,_token: "{{csrf_token()}}"},
            success: function(data){},
            error:function(data) {
                console.log(data.msg);
                layer.closeAll('dialog');
            },
        });
    }
    function batchDelect(obj){
        layer.confirm('确定要批量删除吗？',function(index) {
            var id = new Array();
            $('input[name="id"]:checked').each(function () {
                id.push($(this).val());
            });
            $.ajax({
                type: 'POST',
                url:"{{url('/service/change_status')}}",
                dataType: 'json',
                data:{id:id,table:'images',status:'-1',from:'batchDelete',_token: "{{csrf_token()}}"},
                success: function(data){
                    if(data.status == '0'){
                        for(var i=0; i<document.getElementsByClassName("sorting_1").length; i++){
                            for(var j=0; j<data.id.length; j++){
                                if(document.getElementsByClassName("sorting_1")[i].innerHTML == data.id[j]){
                                    document.getElementsByClassName("sorting_1")[i].parentNode.parentNode.removeChild(document.getElementsByClassName("sorting_1")[i].parentNode);
                                }
                            }
                        }
                        document.getElementsByClassName("r_f")[0].getElementsByTagName("b")[0].innerHTML=document.getElementsByClassName("r_f")[0].getElementsByTagName("b")[0].innerHTML-data.id.length;
                        var pag = document.getElementById("sample-table_info").innerHTML;
                        var value = pag.replace(/[^0-9]/ig,"");
                        var array=value.split("");
                        var num = array[1]-data.id.length;
                        var content = '第 1 到'+num+'条记录，共'+num+'条';
                        document.getElementById("sample-table_info").innerHTML=content;

                        layer.msg('已删除!',{icon:1,time:1000});
                    }
                },
                error:function(data) {
                    console.log(data.msg);
                    layer.closeAll('dialog');
                },
            });
        })
    }

//初始化宽度、高度  
 $(".widget-box").height($(window).height()); 
 $(".Ads_list").width($(window).width()-220);
  //当文档窗口发生改变时 触发  
    $(window).resize(function(){
	$(".widget-box").height($(window).height());
	 $(".Ads_list").width($(window).width()-220);
	});
	$(function() { 
	$("#advertising").fix({
		float : 'left',
		//minStatue : true,
		skin : 'green',	
		durationTime :false,
		stylewidth:'220',
		spacingw:30,//设置隐藏时的距离
	    spacingh:250,//设置显示时间距
		set_scrollsidebar:'.Ads_style',
		table_menu:'.Ads_list'
	});
});

function member_edit(id) {
    layer.open({
        type: 1,
        title: '添加广告',
        maxmin: true,
        shadeClose: false, //点击遮罩关闭层
        area : ['800px' , ''],
        content:$('#add_ads_style'),
        btn:['提交','取消'],
        function:a(id),
        yes:function(index,layero){
            var num=0;
            var str="";
            var category = document.getElementsByName("category")[0].value;
            var size1 = document.getElementsByName("长")[0].value;
            var size2 = document.getElementsByName("宽")[0].value;
            var sort = document.getElementsByName("排序")[0].value;
            var url = document.getElementsByName("地址")[0].value;
            var image = document.getElementById("image").src;
            var id = document.getElementById("update_id").value;
            if(category == ''){
                layer.alert(str+="分类"+"不能为空！\r\n",{
                    title: '提示框',
                    icon:0,
                });
                return false;
            }if(size1 == ''){
                layer.alert(str+="图片尺寸"+"不能为空！\r\n",{
                    title: '提示框',
                    icon:0,
                });return false;
            }if(size2 == ''){
                layer.alert(str+="图片尺寸"+"不能为空！\r\n",{
                    title: '提示框',
                    icon:0,
                });return false;
            }
            if(url == ''){
                layer.alert(str+="链接地址"+"不能为空！\r\n",{
                    title: '提示框',
                    icon:0,
                });return false;
            }
            if(image == 'http://ret.com:8080/admin/images/image.png'){
                layer.alert("请上传图片！\r\n",{
                    title: '提示框',
                    icon:0,
                });return false;
            }

            if(num>0){  return false;}
            else{
                layer.confirm('确认要提交吗？',function(){
                    $.ajax({
                        type: 'POST',
                        url: "{{url('/service/image_add')}}",
                        // dataType: 'json',
                        data:{id:id,category:category,size1:size1,size2:size2,sort:sort,url:url,image:image,_token: "{{csrf_token()}}"},
                        success: function(data){
                            var data = eval('(' + data + ')');
                            layer.alert(data.message,{
                                title: '提示框',
                                icon:1,
                            });
                            layer.close(index);
                        },
                        error:function(data) {
                            console.log(data);
                            layer.closeAll('dialog');
                        },
                    });
                });

            }
        }
    });
}

/*广告图片-停用*/
function member_stop(obj,id){
    layer.confirm('确认要停用吗？',function(index){
        $.ajax({
            type: 'POST',
            url: "{{url('/service/change_status')}}",
            dataType: 'json',
            data:{id:id,table:'images',status:'0',_token: "{{csrf_token()}}"},
            success: function(data){
                $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,\''+data.id+'\')" href="javascript:;" title="显示"><i class="fa fa-close bigger-120"></i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已关闭</span>');
                $(obj).remove();
                layer.msg('已停用!',{icon: 5,time:1000});
            },
            error:function(data) {
                console.log(data);
                layer.closeAll('dialog');
            },
        });
    });
}

/*广告图片-启用*/
function member_start(obj,id){
    layer.confirm('确认要启用吗？',function(index){
        $.ajax({
            type: 'POST',
            url: "{{url('/service/change_status')}}",
            dataType: 'json',
            data:{id:id,table:'images',status:'1',_token: "{{csrf_token()}}"},
            success: function(data){
                $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_stop(this,\''+data.id+'\')" href="javascript:;" title="关闭"><i class="fa fa-check  bigger-120"></i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">显示</span>');
                $(obj).remove();
                layer.msg('已启用!',{icon: 6,time:1000});
            },
            error:function(data) {
                console.log(data);
                layer.closeAll('dialog');
            },
        });
    });
}

/*广告图片-删除*/
function member_del(obj,id){
    layer.confirm('确认要删除吗？',function(index){
        $.ajax({
            type: 'POST',
            url: "{{url('/service/change_status')}}",
            dataType: 'json',
            data:{id:id,table:'images',status:'-1',_token: "{{csrf_token()}}"},
            success: function(data){
                $(obj).parents("tr").remove();
                document.getElementsByClassName("r_f")[0].getElementsByTagName("b")[0].innerHTML = document.getElementsByClassName("r_f")[0].getElementsByTagName("b")[0].innerHTML-1;
                var pag = document.getElementById("sample-table_info").innerHTML;
                var value = pag.replace(/[^0-9]/ig,"");
                var array=value.split("");
                var num = array[1]-data.id.length;
                var content = '第 1 到'+num+'条记录，共'+num+'条';
                document.getElementById("sample-table_info").innerHTML=content;
                layer.msg('已删除!',{icon:1,time:1000});
            },
            error:function(data) {
                console.log(data);
                layer.closeAll('dialog');
            },
        });
    });
}

/*******添加广告*********/
 $('#ads_add').on('click', function(){
	  layer.open({
        type: 1,
        title: '添加广告',
		maxmin: true, 
		shadeClose: false, //点击遮罩关闭层
        area : ['800px' , ''],
        content:$('#add_ads_style'),
		btn:['提交','取消'],
		yes:function(index,layero){	
		 var num=0;
		 var str="";
         var category = document.getElementsByName("category")[0].value;
         var size1 = document.getElementsByName("长")[0].value;
         var size2 = document.getElementsByName("宽")[0].value;
         var sort = document.getElementsByName("排序")[0].value;
         var url = document.getElementsByName("地址")[0].value;
         var image = document.getElementById("image").src;
          if(category == ''){
              layer.alert(str+="分类"+"不能为空！\r\n",{
                  title: '提示框',
                  icon:0,
              });
              return false;
          }if(size1 == ''){
              layer.alert(str+="图片尺寸"+"不能为空！\r\n",{
                  title: '提示框',
                  icon:0,
              });return false;
          }if(size2 == ''){
              layer.alert(str+="图片尺寸"+"不能为空！\r\n",{
                  title: '提示框',
                  icon:0,
              });return false;
          }
          if(url == ''){
              layer.alert(str+="链接地址"+"不能为空！\r\n",{
                  title: '提示框',
                  icon:0,
              });return false;
          }
          if(image == 'http://ret.com:8080/admin/images/image.png'){
              layer.alert("请上传图片！\r\n",{
                  title: '提示框',
                  icon:0,
              });return false;
          }

		  if(num>0){  return false;}	 	
          else{
              layer.confirm('确认要提交吗？',function(){
                  $.ajax({
                      type: 'POST',
                      url: "{{url('/service/image_add')}}",
                      // dataType: 'json',
                      data:{category:category,size1:size1,size2:size2,sort:sort,url:url,image:image,_token: "{{csrf_token()}}"},
                      success: function(data){
                          layer.alert('添加成功！',{
                              title: '提示框',
                              icon:1,
                          });
                          layer.close(index);
                      },
                      error:function(data) {
                          console.log(data);
                          layer.closeAll('dialog');
                      },
                  });
              });

		  }		  		     				
		}
    });
})
</script>
<script type="text/javascript">
function updateProgress(file) {
	$('.progress-box .progress-bar > div').css('width', parseInt(file.percentUploaded) + '%');
	$('.progress-box .progress-num > b').html(SWFUpload.speed.formatPercent(file.percentUploaded));
	if(parseInt(file.percentUploaded) == 100) {
		// 如果上传完成了
		$('.progress-box').hide();
	}
}

function initProgress() {
	$('.progress-box').show();
	$('.progress-box .progress-bar > div').css('width', '0%');
	$('.progress-box .progress-num > b').html('0%');
}

function successAction(fileInfo) {
	var up_path = fileInfo.path;
	var up_width = fileInfo.width;
	var up_height = fileInfo.height;
	var _up_width,_up_height;
	if(up_width > 120) {
		_up_width = 120;
		_up_height = _up_width*up_height/up_width;
	}
	$(".logobox .resizebox").css({width: _up_width, height: _up_height});
	$(".logobox .resizebox > img").attr('src', up_path);
	$(".logobox .resizebox > img").attr('width', _up_width);
	$(".logobox .resizebox > img").attr('height', _up_height);
}

var swfImageUpload;
$(document).ready(function() {
	var settings = {
		flash_url : "Widget/swfupload/swfupload.swf",
		flash9_url : "Widget/swfupload/swfupload_fp9.swf",
		upload_url: "{{url('/service/upload')}}",// 接受上传的地址
		file_size_limit : "5MB",// 文件大小限制
		file_types : "*.jpg;*.gif;*.png;*.jpeg;",// 限制文件类型
		file_types_description : "图片",// 说明，自己定义
		file_upload_limit : 100,
		file_queue_limit : 0,
		custom_settings : {},
		debug: false,
		// Button settings
		button_image_url: "Widget/swfupload/upload-btn.png",
		button_width: "95",
		button_height: "30 ",
		button_placeholder_id: 'uploadBtnHolder',
		button_window_mode : SWFUpload.WINDOW_MODE.TRANSPARENT,
		button_cursor : SWFUpload.CURSOR.HAND,
		button_action: SWFUpload.BUTTON_ACTION.SELECT_FILE,
		
		moving_average_history_size: 40,
		
		// The event handler functions are defined in handlers.js
		swfupload_preload_handler : preLoad,
		swfupload_load_failed_handler : loadFailed,
		file_queued_handler : fileQueued,
		file_dialog_complete_handler: fileDialogComplete,
		upload_start_handler : function (file) {
			initProgress();
			updateProgress(file);
		},
		upload_progress_handler : function(file, bytesComplete, bytesTotal) {
			updateProgress(file);
		},
		upload_success_handler : function(file, data, response) {
			// 上传成功后处理函数
			var fileInfo = eval("(" + data + ")");
            document.getElementById("image").src='/'+fileInfo.url;
			successAction(fileInfo);
		},
		upload_error_handler : function(file, errorCode, message) {
			alert('上传发生了错误！');
		},
		file_queue_error_handler : function(file, errorCode, message) {
			if(errorCode == -110) {
				alert('您选择的文件太大了。');	
			}
		}
	};
	swfImageUpload = new SWFUpload(settings);
});
</script>
<script>
jQuery(function($) {
				var oTable1 = $('#sample-table').dataTable( {
				"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,2,3,4,5,7,8,]}// 制定列不参与排序
		] } );
				
				
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});
			
			
				// $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				// function tooltip_placement(context, source) {
				// 	var $source = $(source);
				// 	var $parent = $source.closest('table')
				// 	var off1 = $parent.offset();
				// 	var w1 = $parent.width();
                //
				// 	var off2 = $source.offset();
				// 	var w2 = $source.width();
                //
				// 	if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
				// 	return 'left';
				// }
			})
</script>

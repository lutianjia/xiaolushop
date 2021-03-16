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
    <script src="/admin/assets/laydate/laydate.js" type="text/javascript"></script>
<title>分类管理</title>
</head>

<body>
<div class="page-content clearfix">
 <div class="sort_style">
     <div class="border clearfix">
       <span class="l_f">
        <a href="#" id="sort_add" class="btn btn-warning showBox"><i class="fa fa-plus"></i> 添加分类</a>
        <a href="#" onclick="sortDelect()" class="btn btn-danger"><i class="fa fa-trash"></i> 批量删除</a>
       </span>
       <span class="r_f">共：<b>{{count($category_list)}}</b>类</span>
     </div>
  <div class="sort_list">
    <table class="table table-striped table-bordered table-hover" id="sample-table">
		<thead>
		 <tr>
				<th width="25px"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th width="50px">ID</th>
				<th width="100px">分类名称</th>
				<th width="50px">数量</th>
				<th width="350px">描述</th>
				<th width="180px">加入时间</th>
				<th width="70px">状态</th>                
				<th width="250px">操作</th>
			</tr>
		</thead>
	<tbody>
    @foreach($category_list as $list)
      <tr>
       <td><label><input type="checkbox" class="ace" name="id" value="{{$list->id}}"><span class="lbl"></span></label></td>
       <td>{{$list->id}}</td>
       <td id="name{{$list->id}}">{{$list->image_category_name}}</td>
       <td>5</td>
          <td id="remarks{{$list->id}}">@if($list->remarks == '')发布者并未描述@else{{$list->remarks}}</td>@endif
       <td>{{$list->create_time}}</td>
          <td class="td-status">
              @if($list->status == '1')
                  <span class="label label-success radius">显示</span>
              @elseif($list->status == '0')
                  <span class="label label-defaunt radius">已关闭</span>
              @endif
          </td>
          <td class="td-manage">
              @if($list->status == '1')
                  <a onClick="member_stop(this,{{$list->id}})"  href="javascript:;" title="停用"  class="btn btn-xs btn-success"><i class="fa fa-check bigger-120"></i></a>
              @elseif($list->status == '0')
                  <a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,{{$list->id}})" href="javascript:;" title="启用"><i class="fa fa-close bigger-120"></i></a>
              @endif
              <a title="编辑"  href="javascript:;" onclick="quanji({{$list->id}})" name="edit" id=""  class="btn btn-xs btn-info showBox2" ><i class="fa  fa-edit bigger-120"></i></a>
              <a title="删除" href="javascript:;"  onclick="member_del(this,{{$list->id}})" class="btn btn-xs btn-warning" ><i class="fa fa-trash  bigger-120"></i></a>
              <a href="#" name="Ads_list.html" class="btn btn-xs btn-pink ads_link" onclick="AdlistOrders('{{$list->id}}');" title="幻灯片广告列表"><i class="fa  fa-bars  bigger-120"></i></a>
          </td>
      </tr>
    @endforeach
    </tbody>
    </table>
  </div>
 </div>
</div>
<!--添加分类-->
<script>
    var tid;
    function quanji(id) {
        tid = id;
    }

</script>
<div class="sort_style_add margin" id="sort_style_add" style="display:none">
  <div class="">
     <ul>
      <input name="image_category_name" type="hidden" id="id" value="" placeholder="" class="col-xs-10 col-sm-5">
      <li><label class="label_name">分类名称</label><div class="col-sm-9"><input name="image_category_name" type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5"></div></li>
      <li><label class="label_name">分类说明</label><div class="col-sm-9"><textarea name="remarks" class="form-control" id="form-field-8" placeholder="" onkeyup="checkLength(this);"></textarea><span class="wordage">剩余字数：<span id="sy" style="color:Red;">200</span>字</span></div></li>
      <li><label class="label_name">分类状态</label>
      <span class="add_content"> &nbsp;&nbsp;<label><input name="form-field-radio1" type="radio" id="show" checked="checked" class="ace"><span class="lbl">显示</span></label>&nbsp;&nbsp;&nbsp;
     <label><input name="form-field-radio1" type="radio" id="hidden" class="ace"><span class="lbl">隐藏</span></label></span>
     </li>
     </ul>
  </div>
    <script>
        function a(tid){
            var name = document.getElementById("name"+tid).innerHTML;
            var remarks = document.getElementById("remarks"+tid).innerHTML;
            document.getElementById("form-field-1").value=name;
            if(remarks != '发布者并未描述       '){
                document.getElementById("form-field-8").value=remarks;
            }
            document.getElementById('id').value = tid;
        }
        function b(){
            document.getElementById("form-field-1").value='';
            document.getElementById("form-field-8").value='';
            document.getElementById('id').value = '';
        }
    </script>
</div>
</body>
</html>
<script type="text/javascript">
    function sortDelect(obj){
        layer.confirm('确定要批量删除吗？',function(index) {
            var id = new Array();
            $('input[name="id"]:checked').each(function () {
                id.push($(this).val());
            });
            // console.log(id);
            $.ajax({
                type: 'POST',
                url:"{{url('/service/change_status')}}",
                dataType: 'json',
                data:{id:id,table:'image_category',status:'-1',from:'batchDelete',_token: "{{csrf_token()}}"},
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
                        if(num == 0){
                            var content = '没有数据';
                        }else{
                            var content = '第' +array[0]+ '到'+num+'条记录，共'+num+'条';
                        }
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

$('.showBox').on('click', function(){

    //console.log(tid);
	  layer.open({
        type: 1,
        title: '添加分类',
		maxmin: true,
		shadeClose: false, //点击遮罩关闭层
        area : ['750px' , ''],
        content:$('#sort_style_add'),
		btn:['提交','取消'],
          function:b(),
		yes:function(index,layero){
		 var num=0;
		 var str="";
         var image_category_name = document.getElementById("form-field-1").value;
          if(image_category_name == '')
          {
			   layer.alert(str+=""+'分类名称'+"不能为空！\r\n",{
                title: '提示框',
				icon:0,
                });
		        num++;
                return false;
          }

         var remarks = document.getElementById("form-field-8").value;

         var show = $('#show').prop('checked');
         var hidden = $('#hidden').prop('checked');
         if(show){
             var status = 1;
         }else{
             status = 0;
         }
		  if(num>0){  return false;}
          else{
              layer.confirm('确认要保存吗？',function(index){
                  $.ajax({
                      type: 'POST',
                      url: "{{url('/service/add_picture_category')}}",
                      // dataType: 'json',
                      data:{image_category_name:image_category_name,remarks:remarks,status:status,_token: "{{csrf_token()}}"},
                      success: function(data){
                          console.log(data);
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
$('.showBox2').on('click', function(){

    //console.log(tid);
	  layer.open({
        type: 1,
        title: '添加分类',
		maxmin: true,
		shadeClose: false, //点击遮罩关闭层
        area : ['750px' , ''],
        content:$('#sort_style_add'),
		btn:['提交','取消'],
        function:a(tid),
		yes:function(index,layero){
		 var num=0;
		 var str="";
         var image_category_name = document.getElementById("form-field-1").value;
          if(image_category_name == '')
          {
			   layer.alert(str+=""+'分类名称'+"不能为空！\r\n",{
                title: '提示框',
				icon:0,
                });
		        num++;
                return false;
          }

         var remarks = document.getElementById("form-field-8").value;
         var id = document.getElementById("id").value;

         var show = $('#show').prop('checked');
         var hidden = $('#hidden').prop('checked');
         if(show){
             var status = 1;
         }else{
             status = 0;
         }
		  if(num>0){  return false;}
          else{
              layer.confirm('确认要保存吗？',function(index){
                  $.ajax({
                      type: 'POST',
                      url: "{{url('/service/add_picture_category')}}",
                      // dataType: 'json',
                      data:{id:id,image_category_name:image_category_name,remarks:remarks,status:status,_token: "{{csrf_token()}}"},
                      success: function(data){
                          layer.alert('修改成功！',{
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


function checkLength(which) {
	var maxChars = 200; //
	if(which.value.length > maxChars){
	   layer.open({
	   icon:2,
	   title:'提示框',
	   content:'您出入的字数超多限制!',	
    });
		// 超过限制的字数了就将 文本框中的内容按规定的字数 截取
		which.value = which.value.substring(0,maxChars);
		return false;
	}else{
		var curr = maxChars - which.value.length; //250 减去 当前输入的
		document.getElementById("sy").innerHTML = curr.toString();
		return true;
	}
};

/*品牌-停用*/
function member_stop(obj,id){
    layer.confirm('确认要关闭吗？',function(index){
        $.ajax({
            type: 'POST',
            url: "{{url('/service/change_status')}}",
            dataType: 'json',
            data:{id:id,table:'image_category',status:'0',_token: "{{csrf_token()}}"},
            success: function(data){
                $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,\''+data.id+'\')" href="javascript:;" title="显示"><i class="fa fa-close bigger-120"></i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已关闭</span>');
                $(obj).remove();
                layer.msg('关闭!',{icon: 5,time:1000});
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
            data:{id:id,table:'image_category',status:'1',_token: "{{csrf_token()}}"},
            success: function(data){
                $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_stop(this,\''+data.id+'\')" href="javascript:;" title="关闭"><i class="fa fa-check  bigger-120"></i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">显示</span>');
                $(obj).remove();
                layer.msg('显示!',{icon: 6,time:1000});
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
	layer.confirm('确认要删除吗？',{icon:0,},function(index){
		$(obj).parents("tr").remove();
		layer.msg('已删除!',{icon:1,time:1000});
	});
}
function member_del(obj,id){
    layer.confirm('确认要删除吗？',function(index){
        $.ajax({
            type: 'POST',
            url: "{{url('/service/change_status')}}",
            dataType: 'json',
            data:{id:id,table:'image_category',status:'-1',_token: "{{csrf_token()}}"},
            success: function(data){
                $(obj).parents("tr").remove();
                // document.getElementsByClassName("r_f")[0].getElementsByTagName("b")[0].innerHTML = document.getElementsByClassName("r_f")[0].getElementsByTagName("b")[0].innerHTML-1;
                layer.msg('已删除!',{icon:1,time:1000});
            },
            error:function(data) {
                console.log(data);
                layer.closeAll('dialog');
            },
        });
    });
}
laydate({
    elem: '#start',
    event: 'focus'
});
//面包屑返回值
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('.Order_form ,.ads_link').on('click', function(){
	var cname = $(this).attr("title");
	var cnames = parent.$('.Current_page').html();
	var herf = parent.$("#iframe").attr("src");
    parent.$('#parentIframe span').html(cname);
	parent.$('#parentIframe').css("display","inline-block");
    parent.$('.Current_page').attr("name",herf).css({"color":"#4c8fbd","cursor":"pointer"});
	//parent.$('.Current_page').html("<a href='javascript:void(0)' name="+herf+">" + cnames + "</a>");
    parent.layer.close(index);
	
});
function AdlistOrders(id){
	window.location.href = "{{url('/admin/ads_list')}}?="+id;
};
</script>
<script type="text/javascript">
jQuery(function($) {
				var oTable1 = $('#sample-table').dataTable( {
				"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,2,4,6,7,]}// 制定列不参与排序
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
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			})
</script>
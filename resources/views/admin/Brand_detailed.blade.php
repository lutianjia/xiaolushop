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
  <script src="/admin/assets/js/typeahead-bs2.min.js"></script>
  <script src="/admin/assets/js/jquery.dataTables.min.js"></script>
  <script src="/admin/assets/js/jquery.dataTables.bootstrap.js"></script>
  <script src="/admin/assets/layer/layer.js" type="text/javascript" ></script>
  <script src="/admin/assets/laydate/laydate.js" type="text/javascript"></script>
  <script type="text/javascript" src="/admin/js/H-ui.js"></script>
  <script type="text/javascript" src="/admin/js/H-ui.admin.js"></script>
  <script src="/admin/js/lrtk.js" type="text/javascript"></script>
<title>品牌详细</title>
</head>

<body>
<div class="page-content clearfix">
 <div class="brand_detailed">
  <div class="brand_info clearfix">
   <div class="title_brand">品牌信息</div>
   <form>
    <ul class="Info_style clearfix">
     <li><label class="label_name">品牌名称：</label> <span class="name">{{$detail->brand_name}}</span></li>
      <li><label class="label_name">品牌类型：</label><span class="name">@if($detail->country == 'China')国内品牌@else国外品牌@endif</span></li>
      <li><label class="label_name">所属国家：</label><span class="name">{{$detail->country}}</span></li>
      <li><label class="label_name">品牌编号：</label><span class="name">{{$detail->id}}</span></li>
      <li><label class="label_name">品牌商品：</label><span class="name">共{{$count}}件</span></li>
      <li><label class="label_name">添加时间：</label><span class="name">{{$detail->create_time}}</span></li>
      <li><label class="label_name">状&nbsp;&nbsp;&nbsp;&nbsp;态：</label><span class="name">@if($detail->status == '1')启用@else停用@endif</span></li>
      <li class="b_Introduce"><label class="label_name">品牌介绍：</label><span class="name" style="display: block;width: 1000px">@if($detail->detail == '')无@else{{$detail->detail}}@endif</span></li>
    </ul>
    <div class="brand_logo">
      <img src="{{$detail->logo}}"  width="120px" height="60px"/>
      <p class="name">{{$detail->brand_name}}</p>
    </div>
   </form>
   </div>
 </div>
 <!--品牌商品-->
 <div class="border clearfix">
       <span class="l_f">
        <a href="{{'/admin/picture_add'}}"  title="添加商品" class="btn btn-warning Order_form"><i class="icon-plus"></i>添加商品</a>
        <a href="#" class="btn btn-danger" onclick="productDelect()"><i class="icon-trash"></i>批量删除</a>
       </span>
       <span class="r_f">该品牌下共：<b>{{$count}}</b>件商品</span>
  </div>

     <!--列表展示-->
       <div class="table_menu_list" id="testIframe">
       <table class="table table-striped table-bordered table-hover" id="sample-table">
		<thead>
		 <tr>
				<th width="25px"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th width="80px">产品编号</th>
				<th width="250px">产品名称</th>
				<th width="100px">原价格</th>
				<th width="100px">现价</th>
                <th width="100px">所属地区/国家</th>				
				<th width="180px">加入时间</th>
                <th width="80px">审核状态</th>
				<th width="70px">状态</th>                
				<th width="200px">操作</th>
			</tr>
		</thead>
	<tbody>
    @foreach($message as $list)
     <tr>
        <td width="25px"><label><input type="checkbox" class="ace" value="{{$list->id}}" id="id" name="id"><span class="lbl"></span></label></td>
        <td width="80px">{{$list->id}}</td>
        <td width="250px"><u style="cursor:pointer" class="text-primary" onclick="">{{$list->product_name}}</u></td>
        <td width="100px">{{$list->original_price}}</td>
        <td width="100px">{{$list->current_price}}</td>
        <td width="100px">{{$list->country}}</td>
        <td width="180px">{{$list->create_time}}</td>
        <td class="text-l">通过</td>
        <td class="td-status">
             @if($list->status == '1')
                 <span class="label label-success radius">已启用</span>
            @elseif($list->status == '0')
                 <span class="label label-defaunt radius">已停用</span>
             @endif
        </td>
        <td class="td-manage">
            @if($list->status == '1')
                <a onClick="member_stop(this,{{$list->id}})"  href="javascript:;" title="停用"  class="btn btn-xs btn-success"><i class="icon-ok bigger-120"></i></a>
            @elseif($list->status == '0')
                <a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,{{$list->id}})" href="javascript:;" title="启用"><i class="icon-ok bigger-120"></i></a>
            @endif
        <a title="编辑" onclick="member_edit('编辑','{{url('/admin/picture_add')}}',{{$list->id}},'','510')" href="javascript:;"  class="btn btn-xs btn-info" ><i class="icon-edit bigger-120"></i></a>
        <a title="删除" href="javascript:;"  onclick="member_del(this,{{$list->id}})" class="btn btn-xs btn-warning" ><i class="icon-trash  bigger-120"></i></a>
       </td>
	  </tr>
    @endforeach
    </tbody>
    </table>
    </div>     
     </div>
</div>
</body>
</html>
<script type="text/javascript">
    function productDelect(obj){
        layer.confirm('确定要批量删除吗？',function(index) {
            var id = new Array();
            $('input[name="id"]:checked').each(function () {
                id.push($(this).val());
            });
            console.log(id);
            $.ajax({
                type: 'POST',
                url:"{{url('/service/change_status')}}",
                dataType: 'json',
                data:{id:id,table:'products',status:'-1',from:'batchDelete',_token: "{{csrf_token()}}"},
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
                        console.log(array[1]);
                        console.log(data.id.length);
                        var num = array[1]-data.id.length;
                        var content = '第 1 到'+num+'条记录，共'+num+'条';
                        console.log(content);
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

//数据
jQuery(function($) {
		var oTable1 = $('#sample-table').dataTable( {
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,2,3,4,5,8,9]}// 制定列不参与排序
		] } );
				
				
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});
			
			
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
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
			});
 	//图层隐藏限时参数		 
$(function() { 
	$("#products_list").fix({
		float : 'left',
		//minStatue : true,
		skin : 'green',	
		durationTime :false,
		stylewidth:'220',
		spacingw:30,//设置隐藏时的距离
	    spacingh:260,//设置显示时间距
	});
});
//初始化宽度、高度  
 $(".widget-box").height($(window).height()-215); 
$(".table_menu_list").width($(window).width()-260);
 $(".table_menu_list").height($(window).height()-215);
  //当文档窗口发生改变时 触发  
    $(window).resize(function(){
	$(".widget-box").height($(window).height()-215);
	 $(".table_menu_list").width($(window).width()-260);
	  $(".table_menu_list").height($(window).height()-215);
	});

/*品牌-编辑*/
function member_edit(title,url,id,w,h) {
    layer_show(title, url, w, h);
    $.ajax({
        type: 'post',
        url: "{{url('/admin/picture_add')}}",
        // dataType: 'json',
        data: {id: id, _token: "{{csrf_token()}}"},
        success: function (data) {
            var obj = document.getElementById("layui-layer-iframe1").contentWindow;

            var timer = setInterval(function () {
                var oele = obj.document.getElementById("product_name");
                if (oele) {
                    clearInterval(timer);
                    oele.value = data[0].product_name;
                    obj.document.getElementById("country").value = data[0].country;
                    obj.document.getElementById("weight").value = data[0].weight;
                    obj.document.getElementById("current_price").value = data[0].current_price;
                    obj.document.getElementById("original_price").value = data[0].original_price;
                    obj.document.getElementById("id").value = data[0].id;
                    var select = obj.document.getElementById("brand");
                    select.options[data[0].id].selected = true;
                }
            }, 50);
        },
        error: function (data) {
            console.log(data);
            layer.closeAll('dialog');
        },
    });
}

/*品牌-停用*/
function member_stop(obj,id){
    layer.confirm('确认要停用吗？',function(index){
        $.ajax({
            type: 'POST',
            url: "{{url('/service/change_status')}}",
            dataType: 'json',
            data:{id:id,table:'products',status:'0',_token: "{{csrf_token()}}"},
            success: function(data){
                $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,\''+data.id+'\')" href="javascript:;" title="启用"><i class="icon-ok bigger-120"></i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
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

/*用户-启用*/
function member_start(obj,id){
    layer.confirm('确认要启用吗？',function(index){
        $.ajax({
            type: 'POST',
            url: "{{url('/service/change_status')}}",
            dataType: 'json',
            data:{id:id,table:'products',status:'1',_token: "{{csrf_token()}}"},
            success: function(data){
                $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_stop(this,\''+data.id+'\')" href="javascript:;" title="停用"><i class="icon-ok bigger-120"></i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
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

/*品牌-删除*/
function member_del(obj,id){
    layer.confirm('确认要删除吗？',function(index){
        $.ajax({
            type: 'POST',
            url: "{{url('/service/change_status')}}",
            dataType: 'json',
            data:{id:id,table:'products',status:'-1',_token: "{{csrf_token()}}"},
            success: function(data){
                $(obj).parents("tr").remove();
                layer.msg('已删除!',{icon:1,time:1000});
            },
            error:function(data) {
                console.log(data);
                layer.closeAll('dialog');
            },
        });
    });
}
//面包屑返回值
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('.Order_form').on('click', function(){
	var cname = $(this).attr("title");
	var chref = $(this).attr("href");
	var cnames = parent.$('.Current_page').html();
	var herf = parent.$("#iframe").attr("src");
    parent.$('#parentIfour').html(cname);
    parent.$('#iframe').attr("src",chref).ready();;
	parent.$('#parentIfour').css("display","inline-block");
	//parent.$('.Current_page').attr({"name":herf,"href":"javascript:void(0)"}).css({"color":"#4c8fbd","cursor":"pointer"});
	parent.$('.parentIframe').attr("name",herf).css({"color":"#4c8fbd","cursor":"pointer"});
	//parent.$('.Current_page').html("<a href='javascript:void(0)' name="+herf+" class='iframeurl'>" + cnames + "</a>");
    parent.layer.close(index);
	
});
</script>

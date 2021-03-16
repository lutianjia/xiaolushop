<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/style.css"/>
        <link href="assets/css/codemirror.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/ace.min.css" />
        <link rel="stylesheet" href="Widget/zTree/css/zTreeStyle/zTreeStyle.css" type="text/css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
			<script src="assets/js/jquery.min.js"></script>
		<!-- <![endif]-->
		<!--[if IE]>
       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <![endif]-->
		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>
		<!-- <![endif]-->
		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
        <script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/typeahead-bs2.min.js"></script>
        <script type="text/javascript" src="Widget/zTree/js/jquery.ztree.all-3.5.min.js"></script>
        <script src="js/lrtk.js" type="text/javascript" ></script>
<title>分类管理</title>
</head>

<body>
<div class=" clearfix">
 <div id="category">
    <div id="scrollsidebar" class="left_Treeview">
    <div class="show_btn" id="rightArrow"><span></span></div>
    <div class="widget-box side_content" >
    <div class="side_title"><a title="隐藏" class="close_btn"><span></span></a></div>
     <div class="side_list">
      <div class="widget-header header-color-green2">
          <h4 class="lighter smaller">产品类型列表</h4>
      </div>
      <div class="widget-body">
          <div class="widget-main padding-8">
              <div  id="treeDemo" class="ztree"></div>
          </div>
  </div>
  </div>
  </div>
  </div>
<!---->
 <iframe id="testIframe" Name="testIframe" FRAMEBORDER=0 SCROLLING=AUTO  SRC="{{url('/admin/product-category-add')}}" class="page_right_style"></iframe>
 </div>
</div>
</body>
</html>
<script type="text/javascript">
$(function() {
	$("#category").fix({
		float : 'left',
		//minStatue : true,
		skin : 'green',
		durationTime :false
	});
});
</script>
<script type="text/javascript">
//初始化宽度、高度
 $(".widget-box").height($(window).height());
 $(".page_right_style").width($(window).width()-220);
  //当文档窗口发生改变时 触发
    $(window).resize(function(){
	$(".widget-box").height($(window).height());
	 $(".page_right_style").width($(window).width()-220);
	})



/**************/
var setting = {
	view: {
		dblClickExpand: false,
		showLine: false,
		selectedMulti: false
	},
	data: {
		simpleData: {
			enable:true,
			idKey: "id",
			pIdKey: "pId",
			rootPId: ""
		}
	},
	callback: {
		beforeClick: function(treeId, treeNode) {
		    // console.log(treeNode);
		    // console.log(treeId);
			var zTree = $.fn.zTree.getZTreeObj("tree");
			if (treeNode.isParent) {
                var obj=document.getElementById("testIframe").contentWindow;
                var ifmObj=obj.document.getElementById("parent_id");
                ifmObj.value = treeNode.id;
                var parent_table_id=obj.document.getElementById("parent_table_id");
                parent_table_id.value = treeNode.tId;
                var parent_name=obj.document.getElementById("parent_name");
                parent_name.value = treeNode.name;
				return false;
			} else {
                var obj=document.getElementById("testIframe").contentWindow;
                var ifmObj=obj.document.getElementById("parent_id");
                ifmObj.value = treeNode.id;
                var parent_table_id=obj.document.getElementById("parent_table_id");
                parent_table_id.value = treeNode.tId;
                var parent_name=obj.document.getElementById("parent_name");
                parent_name.value = treeNode.name;

                var delNodeId=document.getElementById(treeNode.tId).parentNode.id;

                content = '<a href="javascript:void(0)" class="btn  btn-success" onclick="category_stop(\''+treeNode.id+'\',\''+treeNode.tId+'\')"><i class="icon-ok align-top bigger-125"></i>禁用该类型</a>';
                obj.document.getElementById("category_stop").innerHTML = content;
                content = '<a href="javascript:void(0)" class="btn  btn-warning" onclick="category_start(\''+treeNode.id+'\',\''+treeNode.tId+'\')"><i class="icon-ok align-top bigger-125"></i>启用该类型</a>';
                obj.document.getElementById("category_start").innerHTML = content;
                content = '<a href="javascript:void(0)" class="btn  btn-danger" onclick="category_delete(\''+treeNode.id+'\',\''+delNodeId+'\',\''+treeNode.pId+'\',\''+treeNode.tId+'\')"><i class="icon-trash   align-top bigger-125"></i>删除该类型</a>';
                obj.document.getElementById("category_delete").innerHTML = content;
				return true;
			}
		}
	}
};

var result='<?php echo "$result";?>';
var downCategory = '<?php echo "$downCategory"?>';
downCategory = JSON.parse(downCategory);

result = JSON.parse(result);

var zNodes = result;
//console.log(zNodes);
var code;

function showCode(str) {
	if (!code) code = $("#code");
	code.empty();
	code.append("<li>"+str+"</li>");
}

$(document).ready(function(){
	var t = $("#treeDemo");
	t = $.fn.zTree.init(t, setting, zNodes);
});
</script>

<script>
    window.onload=function a() {
        window.p = document.getElementsByClassName("noline_close");
        for (var a = 0; a < p.length; a++) {
            p[a].onclick = function () {
                var category_name = this.nextElementSibling.title;
                var id = this.id;
                $.ajax({
                    type: 'POST',
                    url: "{{url('/admin/category_manages')}}",
                    dataType: 'json',
                    data: {
                        category_name: category_name,
                        id:id,
                        _token: "{{csrf_token()}}"
                    },
                    success: function (data) {
                        // console.log(data);
                        for (var i = 0; i < (data[data.length-1]); i++) {
                            for (var j = 0; j < (data.length - 2); j++) {
                                if (document.getElementById(data[data.length-2]).parentNode.children[2].getElementsByTagName("li")[i].getElementsByTagName("a")[0].getElementsByTagName("span")[1].innerHTML == data[j].name) {
                                    document.getElementById(data[data.length-2]).parentNode.children[2].getElementsByTagName("li")[i].getElementsByTagName("a")[0].style.backgroundColor = "grey";
                                }
                                close();
                            }
                        }
                    },
                    error: function (data) {
                        console.log(data);
                    },
                });
            };
        }
    }
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/admin/css/style.css"/>
        <link rel="stylesheet" href="/admin/assets/css/font-awesome.min.css" />
        <link href="/admin/assets/css/codemirror.css" rel="stylesheet">
        <link rel="stylesheet" href="/admin/font/css/font-awesome.min.css" />
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="/admin/assets/css/ace-ie.min.css" />
		<![endif]-->
		<!--[if IE 7]>
		  <link rel="stylesheet" href="/admin/assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="/admin/assets/css/ace-ie.min.css" />
		<![endif]-->
		<script src="/admin/assets/js/ace-extra.min.js"></script>
		<!--[if lt IE 9]>
		<script src="/admin/assets/js/html5shiv.js"></script>
		<script src="/admin/assets/js/respond.min.js"></script>
		<![endif]-->
        		<!--[if !IE]> -->
		<script src="/admin/js/jquery-1.9.1.min.js" type="text/javascript"></script>
		<!-- <![endif]-->
        <script src="/admin/assets/dist/echarts.min.js"></script>
        <script src="/admin/assets/js/bootstrap.min.js"></script>
<title>交易</title>
</head>

<body>
<div class=" page-content clearfix">
 <div class="transaction_style">
   <ul class="state-overview clearfix">
    <li class="Info">
     <span class="symbol red"><i class="fa fa-jpy"></i></span>
     <span class="value"><h4>交易金额</h4><p class="Quantity color_red" id="totalPrice">{{$totalPrice}}</p></span>
    </li>
     <li class="Info">
     <span class="symbol  blue"><i class="fa fa-shopping-cart"></i></span>
     <span class="value"><h4>订单数量</h4><p class="Quantity color_red" id="orderCount">{{$orderCount}}</p></span>
    </li>
     <li class="Info">
     <span class="symbol terques"><i class="fa fa-shopping-cart"></i></span>
     <span class="value"><h4>交易成功</h4><p class="Quantity color_red" id="payCount">{{$payCount}}</p></span>
    </li>
     <li class="Info">
     <span class="symbol yellow"><i class="fa fa-shopping-cart"></i></span>
     <span class="value"><h4>交易失败</h4><p class="Quantity color_red" id="orderFailCount">{{$orderFailCount}}</p></span>
    </li>
   </ul>
 
 </div>
 <div class="t_Record">
               <div id="main" style="height:400px; overflow:hidden; width:1300px; overflow:auto" ></div>
              </div> 
</div>
</body>
</html>
<script type="text/javascript">
// var myChart = ec.init(document.getElementById('main'),theme);
var myChart = echarts.init(document.getElementById('main'));
var months='<?php echo "$months";?>';
var months = eval('(' + months + ')');

var orderCount='<?php echo "$orderCountByMonth";?>';
var orderCount=eval('(' + orderCount + ')');

var allOrderCount = orderCount['allResult'];
var payOrderCount = orderCount['payResult'];
setInterval(function(){
    $.ajax({
        type: 'POST',
        url: "{{url('/admin/transaction')}}",
        dataType: 'json',
        async:false,
        data:{from:'transaction',_token: "{{csrf_token()}}"},
        success: function(data){
            console.log(data);
            var orderCountByMonth = data['orderCountByMonth'];
            var orderCountByMonth=eval('(' + orderCountByMonth + ')');
            allOrderCount = orderCountByMonth['allResult'];
            payOrderCount = orderCountByMonth['payResult'];
            document.getElementById("totalPrice").innerHTML = data['totalPrice'];
            document.getElementById("orderCount").innerHTML = data['orderCount'];
            document.getElementById("payCount").innerHTML = data['payCount'];
            document.getElementById("orderFailCount").innerHTML = data['orderFailCount'];
        },
        error:function(data) {},
    });
    option = {
        title : {
            text: '月购买订单交易记录',
            subtext: '实时获取用户订单购买记录'
        },
        tooltip : {
            trigger: 'axis'
        },
        legend: {
            data:['所有订单','待付款','已付款','代发货']
        },
        toolbox: {
            show : true,
            feature : {
                mark : {show: true},
                dataView : {show: true, readOnly: false},
                magicType : {show: true, type: ['line', 'bar']},
                restore : {show: true},
                saveAsImage : {show: true}
            }
        },
        calculable : true,
        xAxis : [
            {
                type : 'category',
                data : months
            }
        ],
        yAxis : [
            {
                type : 'value'
            }
        ],
        series : [
            {
                name:'所有订单',
                type:'bar',
                data:allOrderCount,
                markPoint : {
                    data : [
                        {type : 'max', name: '最大值'},
                        {type : 'min', name: '最小值'}
                    ]
                }
            },

            {
                name:'已付款',
                type:'bar',
                data:payOrderCount,
                markPoint : {
                    data : [
                        {name : '年最高', value : 172, xAxis: 7, yAxis: 172, symbolSize:18},
                        {name : '年最低', value : 23, xAxis: 11, yAxis: 3}
                    ]
                },

            }
        ]
    };
    myChart.setOption(option);
},2000);


    </script> 
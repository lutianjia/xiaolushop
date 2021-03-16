<!DOCTYPE html>
<html lang="en">
<head>
	<title>Checkout</title>
	<meta charset="utf-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- GOOGLE WEB FONTS -->
	<link rel="stylesheet" href="/index/css/font-awesome.min.css">

	<!-- BOOTSTRAP 3.3.7 CSS -->
	<link rel="stylesheet" href="/index/css/bootstrap.min.css" />

	<!-- SLICK v1.6.0 CSS -->
	<link rel="stylesheet" href="/index/css/slick-1.6.0/slick.css" />

	<link rel="stylesheet" href="/index/css/select2/select2.css">

	<link rel="stylesheet" href="/index/css/jquery.fancybox.css" />
	<link rel="stylesheet" href="/index/css/yith-woocommerce-compare/colorbox.css" />
	<link rel="stylesheet" href="/index/css/owl-carousel/owl.carousel.min.css" />
	<link rel="stylesheet" href="/index/css/owl-carousel/owl.theme.default.min.css" />
	<link rel="stylesheet" href="/index/css/js_composer/js_composer.min.css" />
	<link rel="stylesheet" href="/index/css/woocommerce/woocommerce.css" />
	<link rel="stylesheet" href="/index/css/woocommerce/woocommerce-layout.css" />
	<link rel="stylesheet" href="/index/css/woocommerce/woocommerce-smallscreen.css" />
	<link rel="stylesheet" href="/index/css/yith-woocommerce-wishlist/style.css" />


	<link rel="stylesheet" href="/index/css/custom.css" />
	<link rel="stylesheet" href="/index/css/app-orange.css" id="theme_color" />
	<link rel="stylesheet" href="" id="rtl" />
	<link rel="stylesheet" href="/index/css/app-responsive.css" />
</head>

<body class="page woocommerce-checkout woocommerce-page">



<div class="body-wrapper theme-clearfix">
	@include('index.header')

	<div class="listings-title">
		<div class="container">
			<div class="wrap-title">
				<h1>结账</h1>
				<div class="bread">
					<div class="breadcrumbs theme-clearfix">
						<div class="container">
							<ul class="breadcrumb">
								<li>
									<a href="{{url('')}}">首页</a>
									<span class="go-page"></span>
								</li>

								<li class="active">
									<span>结账</span>
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
				<div class="page type-page status-publish hentry">
					<div class="entry-content">
						<div class="woocommerce">
							<form class="checkout_coupon" method="post" style="display:none">
								<p class="form-row form-row-first">
									<input type="text" name="coupon_code" class="input-text" placeholder="Coupon code" id="coupon_code" value="" />
								</p>

								<p class="form-row form-row-last">
									<input type="submit" class="button" name="apply_coupon" value="Apply Coupon" />
								</p>

								<div class="clear"></div>
							</form>

							<form name="checkout" method="post" class="checkout woocommerce-checkout" action="" enctype="multipart/form-data">
								<div class="col2-set" id="customer_details">
									<div class="col-1">
										<div class="woocommerce-billing-fields">
											<h3>结账明细</h3>
											@foreach($addressList as $list)
												<div class="u-column1 col-1 woocommerce-Address addresses" id="addressChoice{{$list->id}}" onclick="addressChoice({{$list->id}})">
													<address>
														{{$list->recipient}}<br>
														{{$list->phone}}<br>
														{{$list->country}}<br>
														{{$list->city}}<br>
														{{$list->detail_address}}<br>
													</address>
												</div>
											@endforeach

										</div>
									</div>

									<div class="col-2">
										<div class="woocommerce-shipping-fields">
											<h3>附加信息</h3>

											<p class="form-row form-row notes" id="order_comments_field">
												<label for="order_comments" class="">订购须知</label>
												<textarea name="order_comments" class="input-text " id="order_comments" placeholder="有关订单的注释，例如：交货的特殊注释" rows="2" cols="5"></textarea>
											</p>
										</div>
									</div>
								</div>

								<h3 id="order_review_heading">你的订单</h3>

								<div id="order_review" class="woocommerce-checkout-review-order">
									<table class="shop_table woocommerce-checkout-review-order-table">
										<thead>
										<tr>
											<th class="product-name">产品</th>
											<th class="product-total">总共</th>
										</tr>
										</thead>

										<tbody>
										@foreach($productMessage as $list)
                                            <input type="hidden" name="product_id" value="{{$list->product_id}}"/>
											<tr class="cart_item">
												<td class="product-name">
													<a href="{{url('/index/simple_product',['id' => $list->product_id])}}">{{$list->product_name}}</a>&nbsp;<strong class="product-quantity">&#215; <c name="product_count">{{$list->product_count}}</c></strong>
												</td>

												<td class="product-total">
													<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$list->product_price}}</span>
												</td>
											</tr>
										@endforeach
										</tbody>

										<tfoot>

										<tr class="order-total">
											<th>总共</th>

											<td>
												<strong>
															<span class="woocommerce-Price-amount amount">
																<span class="woocommerce-Price-currencySymbol">$</span>{{$orderTotalPrice}}
															</span>
												</strong>
											</td>
										</tr>
										</tfoot>
									</table>

									<div id="payment" class="woocommerce-checkout-payment">
										<ul class="wc_payment_methods payment_methods methods">
											<li class="wc_payment_method payment_method_cheque">
												<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="cheque" checked="checked" data-order_button_text="">
												<label for="payment_method_cheque">支票付款</label>
												<div class="payment_box payment_method_cheque">
													<p>请发送支票到商店名称，商店街道，商店城镇，商店州/县，商店邮政编码。</p>
												</div>
											</li>

											<li class="wc_payment_method payment_method_cod">
												<input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="cod" data-order_button_text="">
												<label for="payment_method_cod">货到付款</label>
												<div class="payment_box payment_method_cod" style="display:none;">
													<p>货到付款。</p>
												</div>
											</li>

											<li class="wc_payment_method payment_method_paypal">
												<input id="payment_method_paypal" type="radio" class="input-radio" name="payment_method" value="paypal" data-order_button_text="Proceed to PayPal">

												<label for="payment_method_paypal">
													贝宝 <img src="/index/images/2003/AM_mc_vs_dc_ae.jpg" alt="PayPal Acceptance Mark">
												</label>

												<div class="payment_box payment_method_paypal" style="display:none;">
													<p>通过贝宝付款；如果您没有PayPal帐户，则可以使用信用卡付款。</p>
												</div>
											</li>
										</ul>

										<div class="form-row place-order">
											<noscript>
												Since your browser does not support JavaScript, or it is disabled, please ensure you click the &lt;em&gt;Update Totals&lt;/em&gt; button before placing your order. You may be charged more than the amount stated above if you fail to do so.			&lt;br/&gt;&lt;input type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Update totals" /&gt;
											</noscript>
											<input type="button" class="button alt" onclick="buy()" name="woocommerce_checkout_place_order" id="place_order" value="付款" data-value="付款">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@include('index.footer')
</div>
<script>
	var addressList = '<?php echo json_encode($addressList);?>';
	var addressList = eval('(' + addressList + ')');
	var productList = '<?php echo json_encode($productMessage);?>';
	var productList = eval('(' + productList + ')');
	var orderId = '<?php echo json_encode($orderId);?>';
	var orderId = eval('(' + orderId + ')');
	var id='';
	function addressChoice(id) {
		for(var i=0;i<addressList.length;i++){
			document.getElementsByClassName("addresses")[i].style.background = 'white';
		}
		this.id = id;
		document.getElementById("addressChoice"+id).style.background = 'whitesmoke';
	}
	function buy() {
		var data = new Array();
		var dataId = new Array();
		var dataCount = new Array();
		for(var i=0;i<productList.length;i++){
			dataId[i] = document.getElementsByName("product_id")[i].value;
			dataCount[i] = document.getElementsByName("product_count")[i].innerHTML;
		}
		for(var i=0;i<dataId.length;i++){
			data[i] = new Array();
			data[i]['id'] = dataId[i];
			data[i]['count'] = dataCount[i];
		}

		var temp = document.getElementsByName("payment_method");
		for(var i=0;i<temp.length;i++) {
			if (temp[i].checked) {
				var payWay = temp[i].value;
				break;
			}
		}
		if(id == ''){
			layer.msg('请选择收货地址',{icon:4,time:1500});
			return;
		}
		if(payWay != 'paypal'){
			layer.msg('该购买方式暂未开通',{icon:4,time:1500});
			return;
		}

		data = arrayToJsonString(data);
		layer.confirm('确认要购买吗？',function(index) {
			$.ajax({
				type: 'POST',
				url: "{{'/service/pay'}}",
				data: {
					orderMessage: data,
					addressId: id,
					orderId:orderId,
					_token: "{{csrf_token()}}"
				},
				success: function (a) {
					var a = eval('(' + a + ')');
					if(a.status != 0){
						layer.msg(a.message,{icon:5,time:1500});
					}else{
						layer.msg(a.message,{icon:1,time:1500});
						setTimeout(function () {
							window.location.href="{{url('/index/order/addition/1')}}";
						},1000);
					}
				},
				error: function (data) {
					console.log(data);
					layer.closeAll('dialog');
				},
			});
		});
	}

	function arrayToJsonString(o) {
		var len = o.length;
		var new_arr = new Array();
		var str = '',strone='',strs='',jsonstr='';
		for(var i = 0;i<len;i++){
			new_arr = o[i];
			for(var k in new_arr){
				strone += '"'+k+'"'+':'+'"'+new_arr[k]+'"'+',';
			}
			str = '{'+strone.substring(0,strone.length-1)+'}';
			strone='';
			strs += str+',';
			new_arr=[];
		}
		strs = '['+strs.substring(0,strs.length-1)+']';
		return strs;
	}

</script>
@include('index.head')

<body class="page woocommerce-cart woocommerce-page">
     

	<div class="body-wrapper theme-clearfix">
		@include('index.header')
		
		<div class="listings-title">
			<div class="container">
				<div class="wrap-title">
					<h1>购物车</h1>
					<div class="bread">
						<div class="breadcrumbs theme-clearfix">
							<div class="container">
								<ul class="breadcrumb">
									<li>
										<a href="{{url('')}}">首页</a>
										<span class="go-page"></span>
									</li>
									
									<li class="active">
										<span>购物车</span>
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
				<div id="contents" role="main" class="main-page col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="page type-page status-publish hentry">
						<div class="entry-content">
							<div class="entry-summary">
								<div class="woocommerce">
									<form action="" method="post">
										<table class="shop_table shop_table_responsive cart" cellspacing="0">
											<thead>
												<tr>
													<th class="product-remove">&nbsp;</th>
													<th class="product-thumbnail">&nbsp;</th>
													<th class="product-name">产品</th>
													<th class="product-price">价钱</th>
													<th class="product-quantity">数量</th>
													<th class="product-subtotal">总共</th>
												</tr>
											</thead>
											
											<tbody>
											@foreach($products as $list)
												<tr class="cart_item" id="{{$list->id}}">
													<input type="hidden" name="productId" value="{{$list->productId}}"/>
													<td class="product-remove">
														<a class="remove" onclick="deleteProduct('{{$list->id}}',this)" title="删除"><i class="fa fa-times" aria-hidden="true"></i></a>
													</td>
													
													<td class="product-thumbnail">
														<a href="{{url('/index/simple_product',['id' => $list->productId])}}">
															<img width="180" height="180" src="/{{$list->productImage}}" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="">
														</a>
													</td>
													
													<td class="product-name" data-title="Product">
														<a href="{{url('/index/simple_product',['id' => $list->productId])}}">{{$list->productName}}</a>
													</td>
													
													<td class="product-price" data-title="Price">
														<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span><c id="price{{$list->id}}">{{$list->productPrice}}</c></span>
													</td>
													
													<td class="product-quantity" data-title="Quantity">
														<div class="quantity">
															<input id="number{{$list->id}}" onblur="changeNumber({{$list->id}})" type="number" step="1" min="0" max="" name="productCount" value="{{$list->productCount}}" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric">
														</div>
													</td>
													
													<td class="product-subtotal" data-title="Total">
														<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span><c id="totlePrice{{$list->id}}">{{$list->productPrice * $list->productCount}}</c></span>
													</td>
												</tr>
											@endforeach
											</tbody>
										</table>
									</form>
								
									<div class="cart-collaterals">
										<div class="products-wrapper">
											<div class="cart_totals ">
												<h2>购物车总计</h2>
												
												<table cellspacing="0" class="shop_table shop_table_responsive">
													<tbody>
														<tr class="order-total">
															<th>总计</th>
															<td data-title="Total">
																<strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span><c id="totalPrice">{{$totalPrice}}</c></span></strong>
															</td>
														</tr>
													</tbody>
												</table>
												
												<div class="wc-proceed-to-checkout">
													<a onclick="order()" class="checkout-button button alt wc-forward" style="height: 28px;">进行结算</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>

@include('index.footer')
	</div>
	<script type="text/javascript" src="/index/js/jquery/jquery.min.js"></script>
	<script src="/index/layer/mobile/layer.js" type="text/javascript" ></script>
	<script src="/index/layer/layer.js" type="text/javascript" ></script>
<script>
	function order() {
		var productId = new Array();
		var productCount = new Array();
		var productIds = document.getElementsByName("productId");
		var productCounts = document.getElementsByName("productCount");
		for(var i=0; i<productIds.length;i++){
			productId[i] = productIds[i].value;
			productCount[i] = productCounts[i].value;
		}
		productId = arrayToJson(productId);
		productCount = arrayToJson(productCount);
		layer.confirm('确认要购买吗？',function(index) {
			$.ajax({
				type: 'POST',
				url:"{{url('/service/order_add')}}",
				dataType: 'json',
				data:{id:productId,count:productCount,_token: "{{csrf_token()}}"},
				success: function(data){
					console.log(data.id);
					layer.msg(data.message,{icon:1,time:1000});
					setTimeout(function () {
						window.location.href="http://ret.com:8080/index/checkout/"+data.id;
					},1000);
				},
				error:function(data) {
					console.log(data.msg);
					layer.closeAll('dialog');
				},
			});
		});
	}
	function arrayToJson(arr) {
		var res = '{';
		for (var key in arr){
			res += '"'+ key + '":"' + arr[key] + '",'
		}
		res = res.substr(0 , res.lastIndexOf(','));
		res += '}';
		return res;
	}
	function changeNumber($id) {
		var id = $id;
		var cartId = id;

		var price = document.getElementById("price"+id).innerHTML;
		var count = document.getElementById("number"+id).value;
		$.ajax({
			type: 'POST',
			url:"{{url('/service/change_count')}}",
			// dataType: 'json',
			data:{cartId:cartId,count:count,_token: "{{csrf_token()}}"},
			success: function(data){
				var data = eval('(' + data + ')');
				document.getElementById("totlePrice"+id).innerHTML = price*count;
				document.getElementById("totalPrice").innerHTML = data.data;
			},
			error:function(data) {
				console.log(data.msg);
				layer.closeAll('dialog');
			},
		});

	}
	
	function deleteProduct($id,obj) {
		var id = $id;
		var price = document.getElementById('totlePrice'+id).innerHTML;
		var totlePrice = document.getElementById('totalPrice').innerHTML;
		var p = totlePrice-price;
		layer.confirm('确定要删除吗？',function(index) {
			$.ajax({
				type: 'POST',
				url:"{{url('/service/change_status')}}",
				// dataType: 'json',
				data:{id:id,table:'cart',status:'-1',_token: "{{csrf_token()}}"},
				success: function(data){
					var index = $(obj).parents("tr").index(); //这个可获取当前tr的下标 未使用
					$(obj).parents("tr").remove();
					document.getElementById('totalPrice').innerHTML = p;
					layer.msg('已删除!',{icon:1,time:1000});
				},
				error:function(data) {
					console.log(data.msg);
					layer.closeAll('dialog');
				},
			});
		})
	}
</script>
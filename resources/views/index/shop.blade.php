@include('index.head')

<body class="archive post-type-archive woocommerce post-type-archive-product">




	<div class="body-wrapper theme-clearfix">
		@include('index.header')

		<div class="listings-title">
			<div class="container">
				<div class="wrap-title">
					<h1>产品展示</h1>

					<div class="bread">
						<div class="breadcrumbs theme-clearfix">
							<div class="container">
								<ul class="breadcrumb">
									<li>
										<a href="{{url('')}}">首页</a>
										<span class="go-page"></span>
									</li>

									<li class="active">
										<span>产品展示</span>
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
				<div id="contents" class="content col-lg-9 col-md-8 col-sm-8" role="main">
					<div class="listing-top">
						<div class="widget-1 widget-first widget rev-slider-widget-2 widget_revslider">
							<div class="widget-inner">
								<!-- OWL SLIDER -->
								<div class="wpb_revslider_element wpb_content_element no-margin">
									<div class="vc_column-inner ">
										<div class="wpb_wrapper">
											<div class="wpb_revslider_element wpb_content_element">
												<div id="main-slider" class="fullwidthbanner-container" style="position:relative; width:100%; height:auto; margin-top:0px; margin-bottom:0px">
													<div class="module slideshow no-margin">
														@foreach($image[6] as $k=>$list)
														<div class="item">
															<a href="{{$list->url}}"><img src="{{$list->image}}" style="width: 1000px;height: 270px;" alt="slider1" class="img-responsive" height="559"></a>
														</div>
														@endforeach
													</div>
													<div class="loadeding"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- OWL LIGHT SLIDER -->
							</div>
						</div>

						<div class="widget-2 widget-last widget sw_brand-2 sw_brand">
							<div class="widget-inner">
								<div id="sw_brand_01" class="responsive-slider sw-brand-container-slider clearfix" data-lg="5" data-md="4" data-sm="3" data-xs="2" data-mobile="1" data-speed="1000" data-scroll="1" data-interval="5000" data-autoplay="false">
									<div class="resp-slider-container">
										<div class="slider responsive">
											@foreach($brandMessage as $list)
											<div class="item item-brand-cat">
												<div class="item-image">
													<a href="{{url('/index/shop/brand_id/'.$list->id.'/category_id/'.$category_id.'/orderBy/'.$order_by.'/pageCount/'.$page_count.'/type/'.$type)}}"><img style="width: 134px;height: 70px;" src="{{$list->logo}}" class="attachment-173x91 size-173x91" alt=""></a>
												</div>
											</div>
											@endforeach
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div id="container">
						<div id="content" role="main">
							<!--  Shop Title -->
							<div class="products-wrapper">

								<div class="clear"></div>

								<ul class="products-loop row grid clearfix">
									@foreach($products as $list)
									<li id="{{$list['id']}}" class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 post-255 product type-product status-publish has-post-thumbnail product_cat-electronics product_cat-home-appliances product_cat-vacuum-cleaner product_brand-apoteket first instock sale featured shipping-taxable purchasable product-type-simple">
										<div class="products-entry item-wrap clearfix">
											<div class="item-detail">
												<div class="item-img products-thumb">
													<span class="onsale">Sale!</span>
													<a href="{{url('/index/simple_product',['id' => $list['id']])}}">
														<div class="product-thumb-hover">
															<img style="width: 200px;height: 200px;" width="300" height="300" src="/{{$list['image']}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="">
														</div>
													</a>

													<!-- add to cart, wishlist, compare -->
													<div class="item-bottom clearfix">
														<a rel="nofollow" href="#" onclick="addCart({{$list['id']}})" class="button product_type_simple add_to_cart_button ajax_add_to_cart" title="Add to Cart">Add to cart</a>

														<a href="javascript:void(0)" class="compare button" rel="nofollow" title="Add to Compare">Compare</a>

														<div class="yith-wcwl-add-to-wishlist add-to-wishlist-248">
															<div class="yith-wcwl-add-button show" style="display:block">
																<a href="#" rel="nofollow" onclick="addWish({{$list['id']}})" class="add_to_wishlist">Add to Wishlist</a>
																<img src="/index/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
															</div>

															<div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
																<span class="feedback">Product added!</span>
																<a href="#" rel="nofollow">Browse Wishlist</a>
															</div>

															<div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
																<span class="feedback">The product is already in the wishlist!</span>
																<a href="#" rel="nofollow">Browse Wishlist</a>
															</div>

															<div style="clear:both"></div>
															<div class="yith-wcwl-wishlistaddresponse"></div>
														</div>

														<div class="clear"></div>
														<a href="#" onclick="javascript:window.open('http://shop.nyistqiusuo.cn/index/simple_product/'+{{$list['id']}},'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="sm_quickview_handler-list fancybox ">Quick View </a>
													</div>
												</div>

												<div class="item-content products-content">
													<div class="reviews-content">
														<div class="star">
															<span style="width:{{$list['viewCount']/500*70}}px"></span>
														</div>
													</div>

													<h4><a href="{{url('/index/simple_product',['id' => $list['id']])}}" title="Cleaner with bag">{{$list['product_name']}}</a></h4>

													<span class="item-price"><del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$list->original_price}}</span></del> <ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$list->current_price}}</span></ins></span>

													<div class="item-description">Proin nunc nibh, adipiscing eu nisi id, ultrices suscipit augue. Sed rhoncus hendrerit lacus, et venenatis felis. Donec ut fringilla magna ultrices suscipit augue. Proin nunc nibh, adipiscing eu nisi id, ultrices suscipit augue. Sed rhoncus hendrerit lacus, et venenatis felis. Donec ut fringilla magna ultrices suscipit augue.</div>
												</div>
											</div>
										</div>
									</li>
									@endforeach
								</ul>

								<div class="clear"></div>

								<div class="products-nav clearfix">
									<div class="view-mode-wrap pull-left clearfix">
										<div class="view-mode">
											<a href="javascript:void(0)" class="grid-view active" title="Grid view"><span>Grid view</span></a>
											<a href="javascript:void(0)" class="list-view" title="List view"><span>List view</span></a>
										</div>
									</div>

									<div class="catalog-ordering">
										<div class="orderby-order-container clearfix">
											<ul class="orderby order-dropdown pull-left">
												<li>
													<span class="current-li"><span class="current-li-content"><a>默认排序</a></span></span>
													<ul>
														<li class="current"><a href="{{url('/index/shop/brand_id/'.$brand_id.'/category_id/'.$category_id.'/orderBy/0/pageCount/'.$page_count.'/type/'.$type)}}">默认排序</a></li>
														<li class=""><a href="{{url('/index/shop/brand_id/'.$brand_id.'/category_id/'.$category_id.'/orderBy/1/pageCount/'.$page_count.'/type/'.$type)}}">按人气排序</a></li>
														<li class=""><a href="{{url('/index/shop/brand_id/'.$brand_id.'/category_id/'.$category_id.'/orderBy/2/pageCount/'.$page_count.'/type/'.$type)}}">按日期排序</a></li>
														<li class=""><a href="{{url('/index/shop/brand_id/'.$brand_id.'/category_id/'.$category_id.'/orderBy/3/pageCount/'.$page_count.'/type/'.$type)}}">按价格排序</a></li>
													</ul>
												</li>
											</ul>

											<ul class="order pull-left">
												@if($type == 'down')
													<li class="asc"><a href="{{url('/index/shop/brand_id/'.$brand_id.'/category_id/'.$category_id.'/orderBy/3/pageCount/'.$page_count.'/type/up')}}" onclick="typeDown()" id="typeDown"><i class="fa fa-long-arrow-down"></i></a></li>
												@elseif($type == 'up')
													<li class="desc"><a href="{{url('/index/shop/brand_id/'.$brand_id.'/category_id/'.$category_id.'/orderBy/3/pageCount/'.$page_count.'/type/down')}}" onclick="typeUp()" id="typeUp"><i class="fa fa-long-arrow-up"></i></a></li>
												@endif
											</ul>

											<div class="product-number pull-left clearfix">
												<span class="show-product pull-left">展示 </span>
												<ul class="sort-count order-dropdown pull-left">
													<li>
														<span class="current-li"><a>12</a></span>
														<ul>
															<li class="current"><a href="{{url('/index/shop/brand_id/'.$brand_id.'/category_id/'.$category_id.'/orderBy/'.$order_by.'/pageCount/12'.'/type/'.$type)}}">12</a></li>
															<li class=""><a href="{{url('/index/shop/brand_id/'.$brand_id.'/category_id/'.$category_id.'/orderBy/'.$order_by.'/pageCount/24'.'/type/'.$type)}}">24</a></li>
															<li class=""><a href="{{url('/index/shop/brand_id/'.$brand_id.'/category_id/'.$category_id.'/orderBy/'.$order_by.'/pageCount/36'.'/type/'.$type)}}">36</a></li>
														</ul>
													</li>
												</ul>
											</div>
										</div>
									</div>

									<nav class="woocommerce-pagination pull-right">
										{{ $paginate }}
									</nav>
								</div>
							</div>
						</div>
					</div>
				</div>

				<aside id="right" class="sidebar col-lg-3 col-md-4 col-sm-4">
					<div class="widget-1 widget-first widget woocommerce_product_categories-3 woocommerce widget_product_categories">
						<div class="widget-inner">
							<div class="block-title-widget">
								<h2><span>分类目录</span></h2>
							</div>

							<ul class="product-categories">
								@foreach($category as $list)
								<li class="cat-item"><a href="{{url('/index/shop/brand_id/'.$brand_id.'/category_id/'.$list->id.'/orderBy/'.$order_by.'/pageCount/'.$page_count.'/type/'.$type)}}">{{$list->name}}</a></li>
								@endforeach
							</ul>
						</div>
					</div>

					<div class="widget-4 widget woocommerce_price_filter-3 woocommerce widget_price_filter">
						<div class="widget-inner">
							<div class="block-title-widget">
								<h2><span>价钱</span></h2>
							</div>

							<form method="" action="">
								<div class="price_slider_wrapper">
									<div class="price_slider" style="display:none;"></div>
									<div class="price_slider_amount">
										<input type="text" id="min_price" name="low_price" value="100" data-min="150" placeholder="Min price">
										<input type="text" id="max_price" name="height_price" value="650" data-max="700" placeholder="Max price">

										<button type="button" onclick="colation()" class="button">过滤</button>

										<div class="price_label" style="display:none;">
											Price: <span class="from"></span> - <span class="to"></span>
										</div>
										<div class="clear"></div>
									</div>
								</div>
							</form>
						</div>
					</div>

					<div class="widget-5 widget etrostore_best_seller_product-3 etrostore_best_seller_product">
						<div class="widget-inner">
							<div class="block-title-widget">
								<h2><span>最畅销</span></h2>
							</div>

							<div id="best-seller-01" class="sw-best-seller-product">
								<ul class="list-unstyled">
									@foreach($publicProducts as $list)
									<li class="clearfix">
										<div class="item-img">
											<a href="{{url('/index/simple_product',['id' => $list->id])}}" title="corned beef enim">
												<img style="width: 100px;height: 100px;" width="180" height="180" src="/{{$list->image}}" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" sizes="(max-width: 180px) 100vw, 180px">
											</a>
										</div>

										<div class="item-content">
											<div class="reviews-content">
												<div class="star">
													<span style="width:{{$list->viewCount/500*70}}px"></span>
												</div>
												<div class="item-number-rating">
													{{$list->viewCount}} Review(s)
												</div>
											</div>

											<h4><a href="{{url('/index/simple_product',['id' => $list->id])}}" title="corned beef enim">{{$list->product_name}}</a></h4>

											<div class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$list->current_price}}</span></div>
										</div>
									</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>

					<div class="widget-6 widget-last widget text-6 widget_text">
						<div class="widget-inner">
							<div class="textwidget">
								<div class="banner-sidebar">
									<a href="{{$image[7][0]->url}}"><img src="{{$image[7][0]->image}}" title="banner" alt="banner"></a>
								</div>
							</div>
						</div>
					</div>
				</aside>
			</div>
		</div>
		<script>
            var page_count = '<?php echo "$page_count";?>';
            var order_by = '<?php echo "$order_by";?>';
			window.onload = function a() {

				document.getElementsByClassName("current-li")[1].innerHTML = '<a>'+ page_count +'</a>';
				if(order_by == 1){
					document.getElementsByClassName("current-li-content")[0].innerHTML = '<a>'+ '按人气排序' +'</a>';
				}
				if(order_by == 2){
					document.getElementsByClassName("current-li-content")[0].innerHTML = '<a>'+ '按日期排序' +'</a>';
				}
				if(order_by == 3){
					document.getElementsByClassName("current-li-content")[0].innerHTML = '<a>'+ '按价格排序' +'</a>';
				}
			}

			var brand_id = '<?php echo "$brand_id";?>';
			var category_id = '<?php echo "$category_id";?>';
			var page = getQueryVariable("page") ;
			// console.log(page);
			function getQueryVariable(variable)
			{
				var query = window.location.search.substring(1);
				var vars = query.split("&");
				for (var i=0;i<vars.length;i++) {
					var pair = vars[i].split("=");
					if(pair[0] == variable){return pair[1];}
				}
				return(false);
			}
			if(!page){
				page = 1;
			}
			function colation(){
				var low_price = document.getElementsByName("low_price")[0].value;
				var height_price = document.getElementsByName("height_price")[0].value;
				var price = document.getElementsByTagName('ins');
				for(var i=0;i<price.length;i++){
					var span = price[i].getElementsByTagName('span');
					var reg = /[1-9][0-9]*/g;
					var numList = span[0].innerHTML.match(reg);
					if(parseInt(numList[0])<low_price || parseInt(numList[0])>height_price){
						var elem=price[i].parentNode.parentNode.parentNode.parentNode.parentNode; // 按 id 获取要删除的元素--}}
						elem.parentNode.removeChild(elem);
						i--;
					}
				}

                        {{--$.ajax({--}}
				{{--	type: 'POST',--}}
				{{--	url: "{{url('/index/shop')}}",--}}
				{{--	// dataType: 'json',--}}
				{{--	data:{low_price:low_price,height_price:height_price,page:page,page_count:page_count,brand_id:brand_id,order_by:order_by,category_id:category_id,_token: "{{csrf_token()}}"},--}}
				{{--	success: function(data){--}}
				{{--		console.log(data);--}}
				{{--		for(var i=0;i<data.length;i++){--}}
				{{--			var elem=document.getElementById(data[i].id); // 按 id 获取要删除的元素--}}
				{{--			elem.parentNode.removeChild(elem); // 让 “要删除的元素” 的 “父元素” 删除 “要删除的元素”--}}
				{{--		}--}}
				{{--	},--}}
				{{--	error:function(data) {--}}
				{{--		console.log(data);--}}
				{{--		layer.closeAll('dialog');--}}
				{{--	},--}}
				{{--});--}}
			}

			function addCart(id){
				$.ajax({
					type: 'POST',
					url: "{{url('/service/cart_add')}}",
					dataType: 'json',
					data: {
						id:id,
						count:1,
						_token: "{{csrf_token()}}"
					},
					success: function (data) {

					},
					error: function (data) {
						console.log(data);
					},
				});
			}
			function addWish(id){
				console.log(id);
				$.ajax({
					type: 'POST',
					url: "{{url('/service/wish_add')}}",
					dataType: 'json',
					data: {
						id:id,
						count:1,
						_token: "{{csrf_token()}}"
					},
					success: function (data) {

					},
					error: function (data) {
						console.log(data);
					},
				});
			}
		</script>
	</div>
@include('index.footer')

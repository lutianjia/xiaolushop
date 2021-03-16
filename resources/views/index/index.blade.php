<link href="/index/js/bootstrap.min.js" rel="stylesheet" />
<script src="/admin/js/jquery-1.9.1.min.js"></script>
<script src="/index/layer/mobile/layer.js" type="text/javascript" ></script>
<script src="/index/layer/layer.js" type="text/javascript" ></script>
<script>
    function openwin() {
        var qqPro='<?php echo "$qqPro";?>';
        if(qqPro == 1){
            layer.config({
                offset: '100',
            });
            // layer.msg('已删除!',{icon:1,time:10000});
            layer.confirm('您还未绑定qq，为了您的账号安全，请及时绑定qq！', {
                btn: ['确定','取消'] //按钮
            }, function(){
                window.location.href="http://shop.nyistqiusuo.cn/service/qqlogin";
            }, function(){

            });

        }
    }
</script>
@include('index.head')

<body class="page page-id-6 home-style1" onload="openwin()">


	<div class="body-wrapper theme-clearfix">
		@include('index.header')

		<div class="listings-title">
			<div class="container">
				<div class="wrap-title">
					<h1>Home</h1>

					<div class="bread">
						<div class="breadcrumbs theme-clearfix">
							<div class="container">
								<ul class="breadcrumb">
									<li>
										<a href="#">Home</a>
										<span class="go-page"></span>
									</li>

									<li class="active">
										<span>Home</span>
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
					<div class="post-6 page type-page status-publish hentry">
						<div class="entry-content">
							<div class="entry-summary">
								<div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid bg-wrap vc_custom_1487642348040 vc_row-no-padding">
									<div class="container float wpb_column vc_column_container vc_col-sm-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1481518924466">
													<div class="wrap-vertical wpb_column vc_column_container vc_col-sm-2">
														<div class="vc_column-inner vc_custom_1481518234612">
															<div class="wpb_wrapper">
																<div class="vc_wp_custommenu wpb_content_element wrap-title">
																	<div class="mega-left-title">
																		<strong>分类目录</strong>
																	</div>

																	<div class="wrapper_vertical_menu vertical_megamenu">
																		<div class="resmenu-container">
																			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#ResMenuvertical_menu">
																				<span class="sr-only">Categories</span>
																				<span class="icon-bar"></span>
																				<span class="icon-bar"></span>
																				<span class="icon-bar"></span>
																			</button>

																			<div id="ResMenuvertical_menu" class="collapse menu-responsive-wrapper">
																				<ul id="menu-vertical-menu" class="etrostore_resmenu">
                                                                                    @foreach($tree[1]['children'] as $list)
                                                                                        <li class="fix-menu dropdown menu-smartphones-tablet etrostore-mega-menu level1">
                                                                                            <a href="{{url('/index/shop/brand_id/0/category_id/'.$list['id'].'/orderBy/0/pageCount/12/type/down')}}" class="item-link dropdown-toggle">
																							<span class="have-title">
																								<span class="menu-color" data-color="#efc73a"></span>

																								<span class="menu-title">{{$list['name']}}</span>
																							</span>
                                                                                            </a>

                                                                                            <ul class="dropdown-menu nav-level1 column-3" style="height:500px">
                                                                                                @foreach($list['children'] as $v)
                                                                                                    <li class="dropdown-submenu column-3 menu-computer">
                                                                                                        <ul class="dropdown-sub nav-level2">
                                                                                                            <li class="menu-macbooks-imacs">
                                                                                                                <a href="{{url('/index/shop/brand_id/0/category_id/'.$v['id'].'/orderBy/0/pageCount/12/type/down')}}">
																											<span class="have-title">
																												<span class="menu-title">{{$v['name']}}</span>
																											</span>
                                                                                                                </a>
                                                                                                            </li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                @endforeach
                                                                                            </ul>
                                                                                        </li>

                                                                                    @endforeach
																				</ul>
																			</div>
																		</div>

																		<ul id="menu-vertical-menu-1" class="nav vertical-megamenu etrostore-mega etrostore-menures">
																			@foreach($tree[1]['children'] as $list)
																					<li class="fix-menu dropdown menu-smartphones-tablet etrostore-mega-menu level1">
																						<a href="{{url('/index/shop/brand_id/0/category_id/'.$list['id'].'/orderBy/0/pageCount/12/type/down')}}" class="item-link dropdown-toggle">
																							<span class="have-title">
																								<span class="menu-color" data-color="#efc73a"></span>

																								<span class="menu-title">{{$list['name']}}</span>
																							</span>
																						</a>

																						<ul class="dropdown-menu nav-level1 column-3" style="height:500px">
																							@foreach($list['children'] as $v)
																							<li class="dropdown-submenu column-3 menu-computer">
																								<ul class="dropdown-sub nav-level2">
																									<li class="menu-macbooks-imacs">
																										<a href="{{url('/index/shop/brand_id/0/category_id/'.$v['id'].'/orderBy/0/pageCount/12/type/down')}}">
																											<span class="have-title">
																												<span class="menu-title">{{$v['name']}}</span>
																											</span>
																										</a>
																									</li>
																								</ul>
																							</li>
																							@endforeach
																						</ul>
																					</li>

																			@endforeach
																		</ul>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div class="wrap-slider wpb_column vc_column_container vc_col-sm-8">
														<div class="vc_column-inner vc_custom_1483000674370">
															<div class="wpb_wrapper">
																<!-- OWL SLIDER -->
																<div class="wpb_revslider_element wpb_content_element no-margin">
																	<div class="vc_column-inner ">
																		<div class="wpb_wrapper">
																			<div class="wpb_revslider_element wpb_content_element">
																				<div id="main-slider" class="fullwidthbanner-container" style="position:relative; width:100%; height:auto; margin-top:0px; margin-bottom:0px">
																					<div class="module slideshow no-margin">
																						@foreach($image[0] as $list)
																							<div class="item">
																								<a href="{{$list->url}}"><img src="{{$list->image}}" alt="slider1" class="img-responsive" height="559"></a>
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

																<div class="wpb_raw_code wpb_content_element wpb_raw_html">
																	<div class="wpb_wrapper">
																		<div class="banner">
																			@foreach($image[2] as $list)
																				<a href="{{$list->url}}" class="banner1">
																					<img src="{{$list->image}}" alt="banner" title="banner" />
																				</a>
																			@endforeach
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div class="wrap-banner wpb_column vc_column_container vc_col-sm-2">
														<div class="vc_column-inner vc_custom_1483000922579">
															<div class="wpb_wrapper">
																<div class="wpb_single_image wpb_content_element vc_align_center vc_custom_1481518385054">
																	<figure class="wpb_wrapper vc_figure">
																		<a href="{{$image[1][0]->url}}" target="_self" class="vc_single_image-wrapper vc_box_border_grey">
																			<img class="vc_single_image-img" src="{{$image[1][0]->image}}" width="193" height="352" alt="banner1" title="banner1" />
																		</a>
																	</figure>
																</div>

																<div class="wpb_single_image wpb_content_element vc_align_center">
																	<figure class="wpb_wrapper vc_figure">
																		<a href="{{$image[3][0]->url}}" target="_self" class="vc_single_image-wrapper vc_box_border_grey">
																			<img class="vc_single_image-img" src="{{$image[3][0]->image}}" width="193" height="175" alt="banner2" title="banner2" />
																		</a>
																	</figure>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="wpb_raw_code wpb_content_element wpb_raw_html">
													<div class="wpb_wrapper">
														<div class="wrap-transport">
															<div class="row">
																<div class="item item-1 col-lg-3 col-md-3 col-sm-6">
																	<a href="#" class="wrap">
																		<div class="icon">
																			<i class="fa fa-paper-plane"></i>
																		</div>

																		<div class="content">
																			<h3>保证退款</h3>
																			<p>30天退款</p>
																		</div>
																	</a>
																</div>

																<div class="item item-2 col-lg-3 col-md-3 col-sm-6">
																	<a href="#" class="wrap">
																		<div class="icon">
																			<i class="fa fa-map-marker"></i>
																		</div>

																		<div class="content">
																			<h3>全球免费配送</h3>
																			<p>订单满$100</p>
																		</div>
																	</a>
																</div>

																<div class="item item-3 col-lg-3 col-md-3 col-sm-6">
																	<a href="#" class="wrap">
																		<div class="icon">
																			<i class="fa fa-tag"></i>
																		</div>

																		<div class="content">
																			<h3>会员优惠</h3>
																			<p>高达 70% 的优惠</p>
																		</div>
																	</a>
																</div>

																<div class="item item-4 col-lg-3 col-md-3 col-sm-6">
																	<a href="#" class="wrap">
																		<div class="icon">
																			<i class="fa fa-life-ring"></i>
																		</div>

																		<div class="content">
																			<h3>24/7在线支持</h3>
																			<p>技术支持 24/7</p>
																		</div>
																	</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="vc_row-full-width vc_clearfix"></div>
								@if(!empty($payMessage))
								<div class="vc_row wpb_row vc_row-fluid margin-bottom-60">
									<div class="wpb_column vc_column_container vc_col-sm-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div id="_sw_countdown_01" class="sw-woo-container-slider responsive-slider countdown-slider" data-lg="5" data-md="4" data-sm="2" data-xs="1" data-mobile="1" data-speed="1000" data-scroll="1" data-interval="5000" data-autoplay="false" data-circle="false">
													<div class="resp-slider-container">
														<div class="box-title clearfix">
															<h3>历史交易</h3>
															<a href="{{url('/index/order/addition/1')}}">查看全部</a>
														</div>

														<div class="banner-content clearfix">
															<img 	width="195" height="354" src="index/images/1903/image-cd.jpg" class="attachment-larges size-larges" alt="" />
														</div>

														<div class="slider responsive">
															@foreach($payMessage as $list)
															<div class="item-countdown product " id="product_sw_countdown_02">
																<div class="item-wrap" style="width: 200px;height: 350px;">
																	<div class="item-detail">
																		<div class="item-content">
																			<!-- rating  -->
																			<div class="reviews-content">
																				<div class="star">
																					<span style="width:{{$list[0]->viewCount/500*70}}px"></span>
																				</div>

																				<div class="item-number-rating">{{$list[0]->viewCount}} Review(s)</div>
																			</div>
																			<!-- end rating  -->

																			<h4 style="width: 160px;height: 60px">
																				<a href="{{url('index/simple_product/'.$list[0]->id)}}" title="veniam dolore">{{$list[0]->product_name}}</a>
																			</h4>

																			<!-- Price -->
																			<div class="item-price">
																				<span>
																					<del>
																						<span class="woocommerce-Price-amount amount">
																							<span class="woocommerce-Price-currencySymbol">$</span>{{$list[0]->original_price}}
																						</span>
																					</del>

																					<ins>
																						<span class="woocommerce-Price-amount amount">
																							<span class="woocommerce-Price-currencySymbol">$</span>{{$list[0]->current_price}}
																						</span>
																					</ins>
																				</span>
																			</div>

																			<div class="sale-off">{{-round(($list[0]->original_price-$list[0]->current_price)/$list[0]->original_price,2)*100}}%</div>

																			<div class="product-countdown" data-date="1519776000" data-price="$250" data-starttime="1483747200" data-cdtime="1519776000" data-id="product_sw_countdown_02"></div>
																		</div>

																		<div class="item-image-countdown" style="margin-top:40px;width: 200px;">
																			<span class="onsale">Sale!</span>

																			<a href="{{url('index/simple_product/'.$list[0]->id)}}" style="margin-top: 10px">
																				<div class="product-thumb-hover" style="margin-top:10px;width: 200px;height: 180px">
																					<img style="width: 150px;" width="300" height="300" src="/{{$list[0]->image}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt=""
																							sizes="(max-width: 300px) 100vw, 300px" />
																				</div>
																			</a>

																			<!-- add to cart, wishlist, compare -->
																			<div class="item-bottom clearfix">
																				<a rel="nofollow" onclick="addCart({{$list[0]->id}})" href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart" title="Add to Cart">Add to cart</a>

																				<a href="javascript:void(0)" class="compare button" rel="nofollow" title="加入对比">Compare</a>

																				<div class="yith-wcwl-add-to-wishlist add-to-wishlist-248">
																					<div class="yith-wcwl-add-button show" style="display:block">
																						<a href="#" onclick="addWish({{$list[0]->id}})" rel="nofollow" class="add_to_wishlist">Add to Wishlist</a>
																						<img src="index/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
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
																				<a href="#" onclick="javascript:window.open('http://shop.nyistqiusuo.cn/index/simple_product/'+{{$list[0]->id}},'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="sm_quickview_handler-list fancybox ">Quick View </a>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															@endforeach
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endif
								<div class="vc_row wpb_row vc_row-fluid margin-bottom-60">
									<div class="wpb_column vc_column_container vc_col-sm-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div id="slider_sw_woo_slider_widget_1" class="responsive-slider woo-slider-default sw-child-cat clearfix" data-lg="3" data-md="3" data-sm="2" data-xs="2" data-mobile="1" data-speed="1000" data-scroll="1" data-interval="5000" data-autoplay="false">
													<div class="child-top clearfix" data-color="#ff9901">
														<div class="box-title pull-left">
															<h3>手机数码</h3>

															<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#child_sw_woo_slider_widget_1" aria-expanded="false">
																<span class="icon-bar"></span>
																<span class="icon-bar"></span>
																<span class="icon-bar"></span>
															</button>
														</div>

														<div class="box-title-right clearfix">
															<div class="childcat-content pull-left" id="child_sw_woo_slider_widget_1">
																<ul>
																	@foreach($phoneCategory as $list)
																	<li><a href="{{url('/index/shop/brand_id/0/category_id/'.$list->id.'/orderBy/0/pageCount/12/type/down/index')}}">{{$list->name}}</a></li>
																	@endforeach
																</ul>
															</div>

															<div class="view-all">
																<a href="{{url('/index/shop/brand_id/0/category_id/26/orderBy/0/pageCount/12/type/down')}}">查看全部<i class="fa  fa-caret-right"></i></a>
															</div>
														</div>
													</div>

													<div class="content-slider">
														<div class="childcat-slider-content clearfix">
															<!-- Brand -->
															<div class="child-cat-brand pull-left">
																@foreach($brandList['phoneBrand'] as $list)
																<div class="item-brand" >
																	<a href="{{url('/index/shop/brand_id/'.$list->id.'/category_id/0/orderBy/0/pageCount/12/type/down')}}">
																		<img width="170" style="height: 80px" height="87" src="{{$list->logo}}" class="attachment-170x90 size-170x90" alt="" />
																	</a>
																</div>
																@endforeach
															</div>

															<!-- slider content -->
															<div class="resp-slider-container">
																<div class="slider responsive" >
																	@foreach($products['phoneproducts']['phoneproducts'] as $k=>$list)

																		<div class="item product">
																			<div class="item-wrap" style="width: 243px;height: 350px;">
																				<div class="item-detail">
																					<div class="item-content">
																						<!-- rating  -->
																						<div class="reviews-content">
																							<div class="star">
																								<span style="width:{{$list[0]->viewCount/500*70}}px"></span>
																							</div>
																							<div class="item-number-rating">{{$list[0]->viewCount}} Review(s)</div>
																						</div>
																						<!-- end rating  -->

																						<h4 style="width: 200px;height: 80px">
																							<a href="{{url('/index/simple_product',['id' => $list[0]->id])}}" title="voluptate ipsum">{{$list[0]->product_name}}</a>
																						</h4>

																						<!-- Price -->
																						<div class="item-price">
																						<span>
																							<del>
																								<span class="woocommerce-Price-amount amount">
																									<span class="woocommerce-Price-currencySymbol">$</span>{{$list[0]->original_price}}
																								</span>
																							</del>

																							<ins>
																								<span class="woocommerce-Price-amount amount">
																									<span class="woocommerce-Price-currencySymbol">$</span>{{$list[0]->current_price}}
																								</span>
																							</ins>
																						</span>
																						</div>
																					</div>

																					<div class="item-img products-thumb">
																						<a href="{{url('/index/simple_product',['id' => $list[0]->id])}}">
																							<div class="product-thumb-hover" style="width: 159px;height: 150px">
																								<img 	width="300" height="300" src="/{{$list[0]->image}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt=""
																										sizes="(max-width: 300px) 100vw, 300px" />
																							</div>
																						</a>

																						<!-- add to cart, wishlist, compare -->
																						<div class="item-bottom clearfix">
																							<a rel="nofollow" href="#" onclick="addCart({{$list[0]->id}})" class="button product_type_simple add_to_cart_button ajax_add_to_cart" title="Add to Cart">Add to cart</a>

																							<a href="javascript:void(0)" class="compare button" rel="nofollow" title="Add to Compare">Compare</a>

																							<div class="yith-wcwl-add-to-wishlist add-to-wishlist-248">
																								<div class="yith-wcwl-add-button show" style="display:block">
																									<a href="#" rel="nofollow" onclick="addWish({{$list[0]->id}})" class="add_to_wishlist">Add to Wishlist</a>
																									<img src="index/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
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
																							<a href="#" onclick="javascript:window.open('http://shop.nyistqiusuo.cn/index/simple_product/'+{{$list[0]->id}},'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="sm_quickview_handler-list fancybox ">Quick View </a>
																						</div>
																					</div>
																				</div>
																			</div>

																			<div class="item-wrap">
																				<div class="item-detail">
																					<div class="item-content">
																						<!-- rating  -->
																						<div class="reviews-content">
																							<div class="star">
																								<span style="width:{{$list[1]->viewCount/500*70}}px"></span>
																							</div>
																							<div class="item-number-rating">{{$list[1]->viewCount}} Review(s)</div>
																						</div>
																						<!-- end rating  -->

																						<h4 style="width: 200px;height: 80px">
																							<a href="{{url('/index/simple_product',['id' => $list[1]->id])}}" title="veniam dolore">{{$list[1]->product_name}}</a>
																						</h4>

																						<!-- Price -->
																						<div class="item-price">
																						<span>
																							<del>
																								<span class="woocommerce-Price-amount amount">
																									<span class="woocommerce-Price-currencySymbol">$</span>{{$list[1]->original_price}}
																								</span>
																							</del>

																							<ins>
																								<span class="woocommerce-Price-amount amount">
																									<span class="woocommerce-Price-currencySymbol">$</span>{{$list[1]->current_price}}
																								</span>
																							</ins>
																						</span>
																						</div>
																					</div>

																					<div class="item-img products-thumb">
																						<a href="{{url('/index/simple_product',['id' => $list[1]->id])}}">
																							<div class="product-thumb-hover" style="width: 159px;height: 150px">
																								<img 	width="300" height="300" src="/{{$list[1]->image}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt=""
																										sizes="(max-width: 300px) 100vw, 300px" />
																							</div>
																						</a>

																						<!-- add to cart, wishlist, compare -->
																						<div class="item-bottom clearfix">
																							<a rel="nofollow" href="#" onclick="addCart({{$list[1]->id}})" class="button product_type_simple add_to_cart_button ajax_add_to_cart" title="Add to Cart">Add to cart</a>

																							<a href="javascript:void(0)" class="compare button" rel="nofollow" title="Add to Compare">Compare</a>

																							<div class="yith-wcwl-add-to-wishlist add-to-wishlist-248">
																								<div class="yith-wcwl-add-button show" style="display:block">
																									<a href="#" rel="nofollow" onclick="addWish({{$list[1]->id}})" class="add_to_wishlist">Add to Wishlist</a>
																									<img src="index/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
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
																							<a href="#" onclick="javascript:window.open('http://shop.nyistqiusuo.cn/index/simple_product/'+{{$list[1]->id}},'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="sm_quickview_handler-list fancybox ">Quick View </a>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	@endforeach

																</div>
															</div>
														</div>

														<div class="best-seller-product">
															<div class="box-slider-title">
																<h2 class="page-title-slider">最畅销</h2>
															</div>

															<div class="wrap-content">
																@foreach($sellProducts['sellPhoneProducts'] as $k=>$list)
																<div class="item">
																	<div class="item-inner">
																		<div class="item-img">
																			<a href="{{url('/index/simple_product',['id' => $list->id])}}" title="Sony BRAVIA 4K">
																				<img 	width="180" height="180" src="/{{$list->image}}" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt=""/>
																			</a>
																		</div>

																		<div class="item-sl pull-left">{{$k+1}}</div>

																		<div class="item-content">
																			<!-- rating  -->
																			<div class="reviews-content">
																				<div class="star">
																					<span style="width:{{$list->viewCount/500*70}}px"></span>
																				</div>
																				<div class="item-number-rating">{{$list->viewCount}} Review(s)</div>
																			</div>
																			<!-- end rating  -->

																			<h4>
																				<a href="{{url('/index/simple_product',['id' => $list->id])}}" title="Sony BRAVIA 4K">{{$list->product_name}}</a>
																			</h4>

																			<div class="item-price">
																				<span class="woocommerce-Price-amount amount">
																					<span class="woocommerce-Price-currencySymbol">$</span>{{$list->current_price}}
																				</span>
																			</div>
																		</div>
																	</div>
																</div>
																@endforeach
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="vc_row wpb_row vc_row-fluid margin-bottom-60">
									@foreach($image[4] as $k=>$list)
									<div class="wpb_column vc_column_container vc_col-sm-6">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div class="wpb_single_image wpb_content_element vc_align_center">
													<figure class="wpb_wrapper vc_figure">
														<a href="{{$list->url}}" target="_self" class="vc_single_image-wrapper vc_box_border_grey">
															<img class="vc_single_image-img" src="{{$list->image}}" width="570" height="220" alt="banner6" title="banner6" />
														</a>
													</figure>
												</div>
											</div>
										</div>
									</div>
									@endforeach
								</div>

								<div class="vc_row wpb_row vc_row-fluid margin-bottom-60">
									<div class="wpb_column vc_column_container vc_col-sm-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div id="slider_sw_woo_slider_widget_2" class="responsive-slider woo-slider-default sw-child-cat clearfix" data-lg="3" data-md="3" data-sm="2" data-xs="2" data-mobile="1" data-speed="1000" data-scroll="1" data-interval="5000" data-autoplay="false">
													<div class="child-top clearfix" data-color="#7ac143">
														<div class="box-title pull-left">
															<h3>服装</h3>

															<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#child_sw_woo_slider_widget_2" aria-expanded="false">
																<span class="icon-bar"></span>
																<span class="icon-bar"></span>
																<span class="icon-bar"></span>
															</button>
														</div>

														<div class="box-title-right clearfix">
															<div class="childcat-content pull-left" id="child_sw_woo_slider_widget_2">
																<ul>
																	@foreach($computerCategory as $list)
																		<li><a href="{{url('/index/shop/brand_id/0/category_id/'.$list->id.'/orderBy/0/pageCount/12/type/down/index')}}">{{$list->name}}</a></li>
																	@endforeach
																</ul>
															</div>

															<div class="view-all">
																<a href="/index/shop/brand_id/0/category_id/40/orderBy/0/pageCount/12/type/down">查看全部<i class="fa fa-caret-right"></i></a>
															</div>
														</div>
													</div>

													<div class="content-slider">
														<div class="childcat-slider-content clearfix">
															<!-- Brand -->
															<div class="child-cat-brand pull-left">
																@foreach($brandList['computerBrand'] as $list)
																	<div class="item-brand" >
																		<a href="{{url('/index/shop/brand_id/'.$list->id.'/category_id/0/orderBy/0/pageCount/12/type/down')}}">
																			<img width="170" style="height: 80px" height="87" src="{{$list->logo}}" class="attachment-170x90 size-170x90" alt="" />
																		</a>
																	</div>
																@endforeach
															</div>

															<!-- slider content -->
															<div class="resp-slider-container">
																<div class="slider responsive">
																	@foreach($products['computerproducts']['computerproducts'] as $k=>$list)

																	<div class="item product">
																		<div class="item-wrap" style="width: 243px;height: 350px;">
																			<div class="item-detail">
																				<div class="item-content">
																					<!-- rating  -->
																					<div class="reviews-content">
																						<div class="star">
																							<span style="width:{{$list[0]->viewCount/500*70}}px"></span>
																						</div>
																						<div class="item-number-rating">{{$list[0]->viewCount}} Review(s)</div>
																					</div>
																					<!-- end rating  -->

																					<h4 style="width: 200px;height: 80px">
																						<a href="{{url('/index/simple_product',['id' => $list[0]->id])}}" title="voluptate ipsum">{{$list[0]->product_name}}</a>
																					</h4>

																					<!-- Price -->
																					<div class="item-price">
																						<span>
																							<del>
																								<span class="woocommerce-Price-amount amount">
																									<span class="woocommerce-Price-currencySymbol">$</span>{{$list[0]->original_price}}
																								</span>
																							</del>

																							<ins>
																								<span class="woocommerce-Price-amount amount">
																									<span class="woocommerce-Price-currencySymbol">$</span>{{$list[0]->current_price}}
																								</span>
																							</ins>
																						</span>
																					</div>
																				</div>

																				<div class="item-img products-thumb">
																					<a href="{{url('/index/simple_product',['id' => $list[0]->id])}}">
																						<div class="product-thumb-hover" style="width: 159px;height: 150px">
																							<img 	width="300" height="300" src="/{{$list[0]->image}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt=""
																									sizes="(max-width: 300px) 100vw, 300px" />
																						</div>
																					</a>

																					<!-- add to cart, wishlist, compare -->
																					<div class="item-bottom clearfix">
																						<a rel="nofollow" href="#" onclick="addCart({{$list[0]->id}})" class="button product_type_simple add_to_cart_button ajax_add_to_cart" title="Add to Cart">Add to cart</a>

																						<a href="javascript:void(0)" class="compare button" rel="nofollow" title="Add to Compare">Compare</a>

																						<div class="yith-wcwl-add-to-wishlist add-to-wishlist-248">
																							<div class="yith-wcwl-add-button show" style="display:block">
																								<a href="#" rel="nofollow" onclick="addWish({{$list[0]->id}})" class="add_to_wishlist">Add to Wishlist</a>
																								<img src="index/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
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
																						<a href="#" onclick="javascript:window.open('http://shop.nyistqiusuo.cn/index/simple_product/'+{{$list[0]->id}},'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="sm_quickview_handler-list fancybox ">Quick View </a>
																					</div>
																				</div>
																			</div>
																		</div>

																		<div class="item-wrap">
																			<div class="item-detail">
																				<div class="item-content">
																					<!-- rating  -->
																					<div class="reviews-content">
																						<div class="star">
																							<span style="width:{{$list[1]->viewCount/500*70}}px"></span>
																						</div>
																						<div class="item-number-rating">{{$list[1]->viewCount}}} Review(s)</div>
																					</div>
																					<!-- end rating  -->

																					<h4 style="width: 200px;height: 80px">
																						<a href="{{url('/index/simple_product',['id' => $list[1]->id])}}" title="veniam dolore">{{$list[1]->product_name}}</a>
																					</h4>

																					<!-- Price -->
																					<div class="item-price">
																						<span>
																							<del>
																								<span class="woocommerce-Price-amount amount">
																									<span class="woocommerce-Price-currencySymbol">$</span>{{$list[1]->original_price}}
																								</span>
																							</del>

																							<ins>
																								<span class="woocommerce-Price-amount amount">
																									<span class="woocommerce-Price-currencySymbol">$</span>{{$list[1]->current_price}}
																								</span>
																							</ins>
																						</span>
																					</div>
																				</div>

																				<div class="item-img products-thumb">
																					<a href="{{url('/index/simple_product',['id' => $list[1]->id])}}">
																						<div class="product-thumb-hover" style="width: 159px;height: 150px">
																							<img 	width="300" height="300" src="/{{$list[1]->image}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt=""
																									sizes="(max-width: 300px) 100vw, 300px" />
																						</div>
																					</a>

																					<!-- add to cart, wishlist, compare -->
																					<div class="item-bottom clearfix">
																						<a rel="nofollow" href="#" onclick="addCart({{$list[1]->id}})" class="button product_type_simple add_to_cart_button ajax_add_to_cart" title="Add to Cart">Add to cart</a>

																						<a href="javascript:void(0)" class="compare button" rel="nofollow" title="Add to Compare">Compare</a>

																						<div class="yith-wcwl-add-to-wishlist add-to-wishlist-248">
																							<div class="yith-wcwl-add-button show" style="display:block">
																								<a href="#" rel="nofollow" onclick="addWish({{$list[1]->id}})" class="add_to_wishlist">Add to Wishlist</a>
																								<img src="index/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
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
																						<a href="#" onclick="javascript:window.open('http://shop.nyistqiusuo.cn/index/simple_product/'+{{$list[1]->id}},'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="sm_quickview_handler-list fancybox ">Quick View </a>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	@endforeach



																</div>
															</div>
														</div>

														<div class="best-seller-product">
															<div class="box-slider-title">
																<h2 class="page-title-slider">最畅销</h2>
															</div>

															<div class="wrap-content">
																@foreach($sellProducts['sellcomputerProducts'] as $k=>$list)
																<div class="item">
																	<div class="item-inner">
																		<div class="item-img">
																			<a href="{{url('/index/simple_product',['id' => $list->id])}}" title="corned beef enim">
																				<img 	width="180" height="180" src="/{{$list->image}}" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt=""/>
																			</a>
																		</div>

																		<div class="item-sl pull-left">{{$k+1}}</div>

																		<div class="item-content">
																			<!-- rating  -->
																			<div class="reviews-content">
																				<div class="star">
																					<span style="width:{{$list->viewCount/500*70}}px"></span>
																				</div>
																				<div class="item-number-rating">{{$list->viewCount}} Review(s)</div>
																			</div>
																			<!-- end rating  -->

																			<h4>
																				<a href="{{url('/index/simple_product',['id' => $list->id])}}" title="corned beef enim">{{$list->product_name}}</a>
																			</h4>

																			<div class="item-price">
																				<span class="woocommerce-Price-amount amount">
																					<span class="woocommerce-Price-currencySymbol">$</span>{{$list->current_price}}
																				</span>
																			</div>
																		</div>
																	</div>
																</div>
																@endforeach
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="vc_row wpb_row vc_row-fluid margin-bottom-60">
									@foreach($image[5] as $k=>$list)
									<div class="wpb_column vc_column_container vc_col-sm-6">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div class="wpb_single_image wpb_content_element vc_align_center">
													<figure class="wpb_wrapper vc_figure">
														<a href="{{$list->url}}" target="_self" class="vc_single_image-wrapper vc_box_border_grey">
															<img class="vc_single_image-img" src="{{$list->image}}" width="570" height="220" alt="banner8" title="banner8" />
														</a>
													</figure>
												</div>
											</div>
										</div>
									</div>
								    @endforeach
								</div>

								<div class="vc_row wpb_row vc_row-fluid margin-bottom-60">
									<div class="wpb_column vc_column_container vc_col-sm-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div id="slider_sw_woo_slider_widget_3" class="responsive-slider woo-slider-default sw-child-cat clearfix" data-lg="3" data-md="3" data-sm="2" data-xs="2" data-mobile="1" data-speed="1000" data-scroll="1" data-interval="5000" data-autoplay="false">
													<div class="child-top clearfix" data-color="#356acb">
														<div class="box-title pull-left">
															<h3>家电类</h3>
															<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#child_sw_woo_slider_widget_3" aria-expanded="false">
																<span class="icon-bar"></span>
																<span class="icon-bar"></span>
																<span class="icon-bar"></span>
															</button>
														</div>

														<div class="box-title-right clearfix">
															<div class="childcat-content pull-left" id="child_sw_woo_slider_widget_3">
																<ul>
																	@foreach($applianceCategory as $list)
																		<li><a href="{{url('/index/shop/brand_id/0/category_id/'.$list->id.'/orderBy/0/pageCount/12/type/down/index')}}">{{$list->name}}</a></li>
																	@endforeach
																</ul>
															</div>

															<div class="view-all">
																<a href="{{url('/index/shop/brand_id/0/category_id/34/orderBy/0/pageCount/12/type/down')}}">
																	查看全部<i class="fa  fa-caret-right"></i>
																</a>
															</div>
														</div>
													</div>

													<div class="content-slider">
														<div class="childcat-slider-content clearfix">
															<!-- Brand -->
															<div class="child-cat-brand pull-left">
																@foreach($brandList['applianceBrand'] as $list)
																	<div class="item-brand" >
																		<a href="{{url('/index/shop/brand_id/'.$list->id.'/category_id/0/orderBy/0/pageCount/12/type/down')}}">
																			<img width="170" style="height: 80px" height="87" src="{{$list->logo}}" class="attachment-170x90 size-170x90" alt="" />
																		</a>
																	</div>
																@endforeach
															</div>

															<!-- slider content -->
															<div class="resp-slider-container">
																<div class="slider responsive">
																	@foreach($products['applianceproducts']['applianceproducts'] as $k=>$list)

																		<div class="item product">
																			<div class="item-wrap" style="width: 243px;height: 350px;">
																				<div class="item-detail">
																					<div class="item-content">
																						<!-- rating  -->
																						<div class="reviews-content">
																							<div class="star">
																								<span style="width:{{$list[0]->viewCount/500*70}}px"></span>
																							</div>
																							<div class="item-number-rating">{{$list[0]->viewCount}} Review(s)</div>
																						</div>
																						<!-- end rating  -->

																						<h4 style="width: 200px;height: 80px">
																							<a href="{{url('/index/simple_product',['id' => $list[0]->id])}}" title="voluptate ipsum">{{$list[0]->product_name}}</a>
																						</h4>

																						<!-- Price -->
																						<div class="item-price">
																						<span>
																							<del>
																								<span class="woocommerce-Price-amount amount">
																									<span class="woocommerce-Price-currencySymbol">$</span>{{$list[0]->original_price}}
																								</span>
																							</del>

																							<ins>
																								<span class="woocommerce-Price-amount amount">
																									<span class="woocommerce-Price-currencySymbol">$</span>{{$list[0]->current_price}}
																								</span>
																							</ins>
																						</span>
																						</div>
																					</div>

																					<div class="item-img products-thumb">
																						<a href="{{url('/index/simple_product',['id' => $list[0]->id])}}">
																							<div class="product-thumb-hover" style="width: 159px;height: 150px">
																								<img 	width="300" height="300" src="/{{$list[0]->image}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt=""
																										sizes="(max-width: 300px) 100vw, 300px" />
																							</div>
																						</a>

																						<!-- add to cart, wishlist, compare -->
																						<div class="item-bottom clearfix">
																							<a rel="nofollow" href="#" onclick="addCart({{$list[0]->id}})" class="button product_type_simple add_to_cart_button ajax_add_to_cart" title="Add to Cart">Add to cart</a>

																							<a href="javascript:void(0)" class="compare button" rel="nofollow" title="Add to Compare">Compare</a>

																							<div class="yith-wcwl-add-to-wishlist add-to-wishlist-248">
																								<div class="yith-wcwl-add-button show" style="display:block">
																									<a href="#" rel="nofollow" onclick="addWish({{$list[0]->id}})" class="add_to_wishlist">Add to Wishlist</a>
																									<img src="index/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
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
																							<a href="#" onclick="javascript:window.open('http://shop.nyistqiusuo.cn/index/simple_product/'+{{$list[0]->id}},'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="sm_quickview_handler-list fancybox ">Quick View </a>
																						</div>
																					</div>
																				</div>
																			</div>

																			<div class="item-wrap">
																				<div class="item-detail">
																					<div class="item-content">
																						<!-- rating  -->
																						<div class="reviews-content">
																							<div class="star">
																								<span style="width:{{$list[1]->viewCount/500*70}}px"></span>
																							</div>
																							<div class="item-number-rating">{{$list[1]->viewCount}} Review(s)</div>
																						</div>
																						<!-- end rating  -->

																						<h4 style="width: 200px;height: 80px">
																							<a href="{{url('/index/simple_product',['id' => $list[1]->id])}}" title="veniam dolore">{{$list[1]->product_name}}</a>
																						</h4>

																						<!-- Price -->
																						<div class="item-price">
																						<span>
																							<del>
																								<span class="woocommerce-Price-amount amount">
																									<span class="woocommerce-Price-currencySymbol">$</span>{{$list[1]->original_price}}
																								</span>
																							</del>

																							<ins>
																								<span class="woocommerce-Price-amount amount">
																									<span class="woocommerce-Price-currencySymbol">$</span>{{$list[1]->current_price}}
																								</span>
																							</ins>
																						</span>
																						</div>
																					</div>

																					<div class="item-img products-thumb">
																						<a href="{{url('/index/simple_product',['id' => $list[1]->id])}}">
																							<div class="product-thumb-hover" style="width: 159px;height: 150px">
																								<img 	width="300" height="300" src="/{{$list[1]->image}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt=""
																										sizes="(max-width: 300px) 100vw, 300px" />
																							</div>
																						</a>

																						<!-- add to cart, wishlist, compare -->
																						<div class="item-bottom clearfix">
																							<a rel="nofollow" href="#" onclick="addCart({{$list[1]->id}})" class="button product_type_simple add_to_cart_button ajax_add_to_cart" title="Add to Cart">Add to cart</a>

																							<a href="javascript:void(0)" class="compare button" rel="nofollow" title="Add to Compare">Compare</a>

																							<div class="yith-wcwl-add-to-wishlist add-to-wishlist-248">
																								<div class="yith-wcwl-add-button show" style="display:block">
																									<a href="#" rel="nofollow" onclick="addWish({{$list[1]->id}})" class="add_to_wishlist">Add to Wishlist</a>
																									<img src="index/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
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
																							<a href="#" onclick="javascript:window.open('http://shop.nyistqiusuo.cn/index/simple_product/'+{{$list[1]->id}},'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="sm_quickview_handler-list fancybox ">Quick View </a>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	@endforeach
																</div>
															</div>
														</div>

														<div class="best-seller-product">
															<div class="box-slider-title">
																<h2 class="page-title-slider">最畅销</h2>
															</div>

															<div class="wrap-content">
																@foreach($sellProducts['sellapplianceProducts'] as $k=>$list)
																<div class="item">
																	<div class="item-inner">
																		<div class="item-img">
																			<a href="{{url('/index/simple_product',['id' => $list->id])}}" title="Vacuum cleaner">
																				<img 	width="180" height="180" src="/{{$list->image}}" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt=""/>
																			</a>
																		</div>

																		<div class="item-sl pull-left">{{$k+1}}</div>

																		<div class="item-content">
																			<!-- rating  -->
																			<div class="reviews-content">
																				<div class="star">
																					<span style="width:{{$list->viewCount/500*70}}px"></span>
																				</div>

																				<div class="item-number-rating">
																					{{$list->viewCount}} Review(s)
																				</div>
																			</div>
																			<!-- end rating  -->

																			<h4>
																				<a href="{{url('/index/simple_product',['id' => $list->id])}}" title="Vacuum cleaner">{{$list->product_name}}</a>
																			</h4>

																			<div class="item-price">
																				<del>
																					<span class="woocommerce-Price-amount amount">
																						<span class="woocommerce-Price-currencySymbol">$</span>{{$list->original_price}}
																					</span>
																				</del>

																				<ins>
																					<span class="woocommerce-Price-amount amount">
																						<span class="woocommerce-Price-currencySymbol">$</span>{{$list->current_price}}
																					</span>
																				</ins>
																			</div>
																		</div>
																	</div>
																</div>
																@endforeach
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="vc_row wpb_row vc_row-fluid">
									<div class="wpb_column vc_column_container vc_col-sm-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper"></div>
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
<script>
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
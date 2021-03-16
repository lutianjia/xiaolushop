@include('index.head')

<body class="product-template-default single single-product woocommerce woocommerce-page">
     

	<div class="body-wrapper theme-clearfix">
		@include('index.header')
		
		<div class="listings-title">
			<div class="container">
				<div class="wrap-title">
					<h1>{{$productDetail->product_name}}</h1>
					<div class="bread">
						<div class="breadcrumbs theme-clearfix">
							<div class="container">
								<ul class="breadcrumb">
									<li><a href="{{url('')}}">首页</a><span class="go-page"></span></li>
									<li><a href="group_product.html">集团产品</a><span class="go-page"></span></li>
									<li class="active"><span>产品名称</span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="container">
			<div class="row">
				<div id="contents-detail" class="content col-lg-12 col-md-12 col-sm-12" role="main">
					<div id="container">
						<div id="content" role="main">
							<div class="single-product clearfix">
								<div id="product-01" class="product type-product status-publish has-post-thumbnail product_cat-accessories product_brand-global-voices first outofstock featured shipping-taxable purchasable product-type-simple">
									<div class="product_detail row">
										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 clear_xs">
											<div class="slider_img_productd">
												<!-- woocommerce_show_product_images -->
												<div id="product_img_01" class="product-images loading" data-rtl="false">
													<div class="product-images-container clearfix thumbnail-bottom">
														<!-- Image Slider -->
														<div class="slider product-responsive">
															<div class="item-img-slider">
																<div class="images">					
																	<a href="/{{$productDetail->image}} " data-rel="prettyPhoto[product-gallery]" class="zoom">
																		<img style="width: 600px;height: 500px"  src="/{{$productDetail->image}}" class="attachment-shop_single size-shop_single" alt="">
																	</a>
																</div>
															</div>
														</div>
														

													</div>
												</div>
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 clear_xs">
											<div class="content_product_detail">
												<h1 class="product_title entry-title">{{$productDetail->product_name}}</h1>
												<input type="hidden" name="id" value="{{$productDetail->id}}"/>
												<div class="reviews-content">
													<div class="star">
														<span style="width:{{$productDetail->viewCount/500*70}}px"></span>
													</div>
													<a href="#reviews" class="woocommerce-review-link" rel="nofollow"><span class="count">{{$productDetail->viewCount}}</span> Review(s)</a>
												</div>
												
												<div>
													<p class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$productDetail->current_price}}</span></p>
												</div>
												
												<div class="product-info clearfix">
													<div class="product-stock pull-left out-stock">
														@if($productDetail->wareHouseCount <= '0')
															<span style="color: red;font-size: 30px">无货</span>
														@elseif($productDetail->wareHouseCount > '0')
															<span style="font-size: 20px">出货</span>
														@endif
													</div>
												</div>

												<div class="shoes-cnt" style="margin-left: -10px;font-size: 20px;margin-top: 10px;">
													<div class="shoes-cnt-notice">
														数量
													</div>
													<div class="shoes-cnt-minus shoes-cnt-minus-blur">
														-
													</div>
													<div class="shoes-cnt-area">
														<input type="text" name="count" class="shoes-cnt-input" value="1"/>
													</div>
													<div class="shoes-cnt-plus">
														+
													</div>
													<div class="shoes-cnt-max">
														（限购200件）
													</div>
												</div>

												<div class="description" itemprop="description" style="margin-top: 50px;width: 570px;height: 50px">
													<a id="J_LinkBuy" rel="nofollow" onclick="order()" data-addfastbuy="true" title="点击此按钮，到下一步确认购买信息。" role="button">立即购买</a>
													<button href="#" rel="nofollow" id="J_LinkBasket" role="button" onclick="addCart()">加入购物车</button>
												</div>


												<p class="stock out-of-stock">Out of stock</p>
												
												<div class="social-share">
													<div class="title-share">分享</div>
													<div class="wrap-content">
														<a href="#" onclick="shareTo('qq')"><i class="fa fa-qq"></i></a>
														<a href="#" onclick="shareTo('qzone')"><i class="fa fa-star-o"></i></a>
														<a href="#" onclick="shareTo('sina')"><i class="fa fa-weibo"></i></a>
														<a href="#" onclick="shareTo('wechat')"><i class="fa fa-weixin"></i></a>
													</div>
												</div>
												<div class="tm-ser tm-clear" style="width: 570px;height: 60px;position:relative;">
													<dl class="tm-clear">
														<dt class="tb-metatit"style="margin-top:20px;">服务承诺</dt>
														<dd class="tm-laysku-dd" style="margin-left:0;">
															<ul class="tb-serPromise"><li><a href="" title="卖家投保退货运费险（保单生效以订单页展示保险为准），消费者发生退款，商家将承担首次退货邮费。" target="_blank">退货包邮费</a></li><li><a href="" title="购买天猫商品时选择购买“意外保修”后，在服务保障期内如消费者购买的商品正常使用过程中出现意外导致机器性能故障（无自行拆装,非人为故意损坏），由消费者发起申请，由天猫负责委派第三方服务商在消费者的服务保障额度范围内为消费者提供维修的保障服务项目。服务保障额度等于消费者购买该商品时支付的实际成交金额。" target="_blank">意外保修</a></li><li><a href="" title="商家投保保价险，活动结束后15天内若发生降价，可举证申请保险理赔。部分场景下不支持理赔（如双十一活动订单等），具体理赔范围详见天猫【帮助中心-营销平台保价险服务】" target="_blank">赠保价险</a></li><li><a href="" title="送货入户" target="_blank">送货入户</a></li><li><a href="" title="全国联保" target="_blank">全国联保</a></li><li><a href="" title="商品支持正品保障服务" target="_blank">正品保证</a></li><li><a href="" title="预约安装" target="_blank">预约安装</a></li><li><a href="" title="天猫电器延保服务，全国联保结束后天猫为电器继续延长服务保障期，为影响正常使用的性能故障提供维修" target="_blank">延保服务</a></li><li><a href="" title="购买天猫商品时选择购买“全面保修”后，在服务保障期内如消费者购买的商品正常使用过程中出现三包范围内的性能故障以及意外导致机器性能故障（无自行拆装,非人为故意损坏），由天猫负责委派第三方服务商在消费者的服务保障额度范围内为消费者提供维修的保障服务项目" target="_blank">全面保修</a></li><li><a href="" title="极速退款是为诚信会员提供的退款退货流程的专享特权，额度是根据每个用户当前的信誉评级情况而定" target="_blank">极速退款</a></li><li><a href="" title="七天无理由退换" target="_blank">七天无理由退换</a></li></ul>
														</dd>
													</dl>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="tabs clearfix">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="description_tab active">
												<a href="#tab-description" data-toggle="tab">描述</a>
											</li>
											
											<li class="reviews_tab ">
												<a href="#tab-reviews" data-toggle="tab">评论 (<c id="commentCount">{{count($commentMessage)}}</c>)</a>
											</li>
										</ul>
										
										<div class="clear"></div>
										
										<div class=" tab-content">
											<div class="tab-pane active" id="tab-description">
												<h2>Product Description</h2>
												<p id="detail"></p>
											</div>
											
											<div class="tab-pane " id="tab-reviews">
												<div id="reviews">
													<div id="comments">
														<h2>Reviews</h2>
														@if(empty($commentMessage))
															<p class="woocommerce-noreviews">该商品还没有评论</p>
														@endif
														@foreach($commentMessage as $list)
															<li>{{$list->content}}<br>{{$list->create_time}}<br></li>
														@endforeach
													</div>
													
													<div id="review_form_wrapper">
														<div id="review_form">
															<div id="respond" class="comment-respond">
																<form action="" method="post" id="commentform" class="comment-form">
																	
																	<p class="comment-form-comment">
																		<label for="comment">你的评论</label>
																		<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
																	</p>
																	
																	<p class="form-submit">
																		<input name="submit" type="button" onclick="commentSubmit()" id="submit" class="submit" value="提交">
																	</p>
																</form>
															</div>
														</div>
													</div>
													
													<div class="clear"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="bottom-single-product theme-clearfix">
									<div class="widget-1 widget-first widget sw_related_upsell_widget-2 sw_related_upsell_widget" data-scroll-reveal="enter bottom move 20px wait 0.2s">
										<div class="widget-inner">
											<div id="slider_sw_related_upsell_widget-2" class="sw-woo-container-slider related-products responsive-slider clearfix loading" data-lg="4" data-md="3" data-sm="2" data-xs="2" data-mobile="1" data-speed="1000" data-scroll="1" data-interval="5000" data-autoplay="false">
												<div class="resp-slider-container">
													<div class="box-slider-title">
														<h2><span>相关产品</span></h2>
													</div>
													
													<div class="slider responsive">
														@foreach($relatedProduct as $list)
														<div class="item ">
															<div class="item-wrap">
																<div class="item-detail">
																	<div class="item-img products-thumb">
																		<a href="{{url('/index/simple_product',['id' => $list->id])}}">
																			<div class="product-thumb-hover">
																				<img style="width: 200px;height: 200px;" src="/{{$list->image}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" >
																			</div>
																		</a>																
																				
																		<!-- add to cart, wishlist, compare -->
																		<div class="item-bottom clearfix">
																			<a rel="nofollow" onclick="addCart1({{$list->id}})" href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart" title="Add to Cart">Add to cart</a>
																			
																			<a href="javascript:void(0)" class="compare button" rel="nofollow" title="Add to Compare">Compare</a>
																			
																			<div class="yith-wcwl-add-to-wishlist add-to-wishlist-248">
																				<div class="yith-wcwl-add-button show" style="display:block">
																					<a href="#" onclick="addWish({{$list->id}})" rel="nofollow" class="add_to_wishlist">Add to Wishlist</a>
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
																			<a href="#" data-fancybox-type="ajax" class="sm_quickview_handler-list fancybox fancybox.ajax">Quick View </a>
																		</div>
																	</div>
																	
																	<div class="item-content">
																		<!-- rating  -->
																		<div class="reviews-content">
																			<div class="star"></div>
																			<div class="item-number-rating">
																				{{$list->viewCount}} Review(s)
																			</div>
																		</div>
																		<!-- end rating  -->
																		
																		<h4><a href="{{url('/index/simple_product',['id' => $list->id])}}" title="turkey qui">{{$list->product_name}}</a></h4>
																		
																		<!-- price -->
																		<div class="item-price">
																			<span>
																				<span class="woocommerce-Price-amount amount">
																					<span class="woocommerce-Price-currencySymbol">$</span>{{$list->current_price}}
																				</span>
																			</span>
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
								   
									<div class="widget-2 widget-last widget sw_related_upsell_widget-3 sw_related_upsell_widget" data-scroll-reveal="enter bottom move 20px wait 0.2s">
										<div class="widget-inner"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="/index/js/jquery/jquery.min.js"></script>
		<script src="/index/layer/mobile/layer.js" type="text/javascript" ></script>
		<script src="/index/layer/layer.js" type="text/javascript" ></script>
		<script>
			function commentSubmit() {
				var productId = document.getElementsByName("id")[0].value;
				var comment = document.getElementById("comment").value;
				if(comment == ''){
					layer.msg('评论不能为空！',{icon:5,time:1000});
				}
				layer.confirm('确认要发布吗？',function(index) {
					$.ajax({
						type: 'POST',
						url:"{{url('/service/comment_add')}}",
						dataType: 'json',
						data:{productId:productId,comment:comment,_token: "{{csrf_token()}}"},
						success: function(data){
						    if(data.status == 0){
								var myDate = new Date();
								var mytime=myDate.toLocaleString('chinese', { hour12: false });
								mytime = mytime.replace(/\//g,'-');
								var commentCount = document.getElementById("commentCount");
								if(commentCount.innerHTML == 0){
									document.getElementsByClassName("woocommerce-noreviews")[0].innerHTML = '';
								}
								document.getElementById("comments").innerHTML += data.data+'<br>'+mytime;
								document.getElementById("comment").value = '';
								document.getElementById("commentCount").innerHTML = parseInt(document.getElementById("commentCount").innerHTML)+parseInt(1);
                            }
							layer.msg(data.message,{icon:1,time:1000});
						},
						error:function(data) {
							console.log(data.msg);
							layer.closeAll('dialog');
						},
					});
				});
			}

			function order() {
				layer.confirm('确认要购买吗？',function(index) {
					var id = document.getElementsByName('id')[0].value;
					var count = document.getElementsByName('count')[0].value;
					$.ajax({
						type: 'POST',
						url:"{{url('/service/order_add')}}",
						dataType: 'json',
						data:{id:id,count:count,_token: "{{csrf_token()}}"},
						success: function(data){
							if(data.status == -1){
								layer.msg(data.message,{icon:5,time:1000});
								setTimeout(function () {
									window.location.href="http://ret.com:8080/index/login";
								},1000);
							}else{
								layer.msg(data.message,{icon:1,time:1000});
								setTimeout(function () {
									window.location.href="http://ret.com:8080/index/checkout/"+data.id;
								},1000);
							}

						},
						error:function(data) {
							console.log(data.msg);
							layer.closeAll('dialog');
						},
					});
				});
			}

			var detail = '<?php echo "$productDetail->detail";?>';
			document.getElementById("detail").innerHTML = detail;

			function addCart() {
				var id = document.getElementsByName('id')[0].value;
				var count = document.getElementsByName('count')[0].value;
				layer.confirm('确认要加入购物车吗？',function(index) {
					$.ajax({
						type: 'POST',
						url:"{{url('/service/cart_add')}}",
						dataType: 'json',
						data:{id:id,count:count,_token: "{{csrf_token()}}"},
						success: function(data){
							if(data.status == -1) {
								layer.msg(data.message, {icon: 5, time: 1000});
								setTimeout(function () {
									window.location.href = "http://shop.nyistqiusuo.cn/index/login";
								}, 1000);
							}else{
								layer.msg(data.message,{icon:1,time:1000});
							}
						},
						error:function(data) {
							console.log(data.msg);
							layer.closeAll('dialog');
						},
					});
				});
			}
			
			//单次可以购买鞋的最大数量
			var cnt_max=200;

			$(".shoes-cnt-minus").click(function(){
				var input_value=$(".shoes-cnt-input").val();
				$(".shoes-cnt-input").val(--input_value);
				validateCnt();
			});

			$(".shoes-cnt-plus").click(function(){
				var input_value=$(".shoes-cnt-input").val();
				$(".shoes-cnt-input").val(++input_value);
				validateCnt();
			});



			$(".shoes-cnt-input").blur(function(){
				validateCnt();
			});

			$(".shoes-cnt-input").keyup(function(){
				var input_value=$(".shoes-cnt-input").val();
				if(input_value.length>2)
				{
					validateCnt();
				}
			});



			/*数字验证*/
			function validateCnt(){
				var input_value=$(".shoes-cnt-input").val();
				$(".shoes-cnt-max").hide();
				if(isNaN(input_value))
				{
					$(".shoes-cnt-input").val(1);
					$(".shoes-cnt-minus").addClass("shoes-cnt-minus-blur");

				}else{
					if(input_value>=cnt_max)
					{
						$(".shoes-cnt-input").val(cnt_max);

						$(".shoes-cnt-max").show();
						$(".shoes-cnt-minus").removeClass("shoes-cnt-minus-blur");
						$(".shoes-cnt-plus").addClass("shoes-cnt-plus-blur");
					}

					if(input_value<=1)
					{
						$(".shoes-cnt-input").val(1);

						$(".shoes-cnt-minus").addClass("shoes-cnt-minus-blur");
					}

					if(input_value>1&&input_value<cnt_max)
					{
						$(".shoes-cnt-minus").removeClass("shoes-cnt-minus-blur");
						$(".shoes-cnt-plus").removeClass("shoes-cnt-plus-blur");
					}
				}
			}

			function shareTo(types){

				var title,imageUrl,url,description,keywords;

				//获取文章标题
				title = document.title;

				//获取网页中内容的第一张图片地址作为分享图
				//imageUrl = document.images[0].src;
				imageUrl = 'http://shop.nyistqiusuo.cn//index/images/icons/logo-orange.png';
				//当内容中没有图片时，设置分享图片为网站logo
				if(typeof imageUrl == 'undefined'){
					imageUrl = 'https://'+window.location.host+'/static/images/logo.png';
				} else {
					imageUrl = imageUrl.src;
				}

				//获取当前网页url
				url = document.location.href;

				//获取网页描述
				description = document.getElementById('detail').innerHTML;

				//获取网页关键字
				keywords = '小鹿商城';

				//qq空间接口的传参
				if(types=='qzone'){
					window.open('https://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+url+'&sharesource=qzone&title='+title+'&pics='+imageUrl+'&summary='+description);
				}
				//新浪微博接口的传参
				if(types=='sina'){
					window.open('http://service.weibo.com/share/share.php?url='+url+'&sharesource=weibo&title='+title+'&pic='+imageUrl+'&appkey=2706825840');
				}
				//qq好友接口的传参
				if(types == 'qq'){
					window.open('http://connect.qq.com/widget/shareqq/index.html?url='+url+'&sharesource=qzone&title='+title+'&pics='+imageUrl+'&summary='+description+'&desc='+keywords);
				}
				//生成二维码给微信扫描分享
				if(types == 'wechat'){
					//在线二维码（服务器性能限制，仅测试使用，屏蔽非大陆ip访问）
					window.open('https://zixuephp.net/inc/qrcode_img.php?url='+url);
				}

			}

			function addCart1(id){
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
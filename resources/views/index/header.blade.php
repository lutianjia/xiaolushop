<header id="header" class="header header-style1">
    <div class="header-top clearfix">
        <div class="container">
            <div class="rows">
                <!-- SIDEBAR TOP MENU -->
                <div class="pull-left top1">
                    <div class="widget text-2 widget_text pull-left">
                        <div class="widget-inner">
                            <div class="textwidget">
                                <div class="call-us"><span>立即致电我们: </span>0123-444-666654123<span style="margin-left: 750px">你好! </span>@if($account != null){{$account}}@else游客@endif</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wrap-myacc pull-right">
                    <div class="sidebar-account pull-left">

                        <div class="account-title">我的账户</div>

                        <div id="my-account" class="my-account">
                            <div class="widget-1 widget-first widget nav_menu-4 widget_nav_menu">
                                <div class="widget-inner">
                                    <ul id="menu-my-account" class="menu">
                                        <li class="menu-my-account">
                                            <a class="item-link" href="{{url('/index/my_account/addition/0')}}">
                                                <span class="menu-title">我的账户</span>
                                            </a>
                                        </li>

                                        <li class="menu-cart">
                                            <a class="item-link" href="{{url('/index/cart')}}">
                                                <span class="menu-title">购物车</span>
                                            </a>
                                        </li>

                                        <li class="menu-checkout">
                                            <a class="item-link" href="{{url('/index/checkout')}}">
                                                <span class="menu-title">结账</span>
                                            </a>
                                        </li>

                                        <li class="menu-wishlist">
                                            <a class="item-link" href="#">
                                                <span class="menu-title">心愿单</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="widget-2 widget-last widget sw_top-4 sw_top">
                                <div class="widget-inner">
                                    <div class="top-login">
                                        <div class="div-logined">
                                            <ul>
                                                <li>
                                                    <a href="{{url('/index/login')}}" data-toggle="modal">
                                                        <span>登录</span>
                                                    </a>
                                                    <span class="wg">Welcome Guest</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pull-left top2">
                        <div class="widget-1 widget-first widget nav_menu-2 widget_nav_menu">
                            <div class="widget-inner">
                                <ul id="menu-checkout" class="menu">
                                    <li class="menu-checkout">
                                        <a class="item-link" href="{{url('/index/checkout')}}">
                                            <span class="menu-title">结账</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-mid clearfix">
        <div class="container">
            <div class="rows">
                <!-- LOGO -->
                <div class="etrostore-logo pull-left">
                    <a href="#">
                        <img src="/index/images/icons/logo-orange.png" alt="Shoopy">
                    </a>
                </div>

                <div class="mid-header pull-right">
                    <div class="widget-1 widget-first widget sw_top-2 sw_top">
                        <div class="widget-inner">
                            <div class="top-form top-search">
                                <div class="topsearch-entry">
                                    <form method="get" action="">
                                        <div>
                                            <input type="text" value="" name="s" placeholder="输入您的关键字...">
                                            <div class="cat-wrapper">
                                                <label class="label-search">
                                                    <select name="search_category" class="s1_option">
                                                        <option value="">&nbsp;&nbsp;&nbsp;&nbsp;所有类别&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                                        @foreach($category as $list)
                                                            <option value="{{$list->id}}" style="width: 400px;display: block;">&nbsp;&nbsp;&nbsp;&nbsp;{{$list->name}}&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                                        @endforeach
                                                    </select>
                                                </label>
                                            </div>

                                            <button type="submit" title="搜索" class="fa fa-search button-search-pro form-button"></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widget sw_top-3 sw_top pull-left">
                        <div class="widget-inner">
                            <div class="top-form top-form-minicart etrostore-minicart pull-right">
                                <div class="top-minicart-icon pull-right">
                                    <i class="fa fa-shopping-cart"></i>
                                    <a class="cart-contents" href="cart.html" title="View your shopping cart">
                                        <span class="minicart-number">{{$cartCount}}</span>
                                    </a>
                                </div>

                                <div class="wrapp-minicart">
                                    <div class="minicart-padding">
                                        <div class="number-item">
                                            您购物车中有<span>{{$cartCount}}</span>件物品
                                        </div>

                                        <ul class="minicart-content">
                                            @foreach($cartList as $list)
                                            <li id="{{$list->id}}">
                                                <a href="simple_product.html" class="product-image">
                                                    <img 	width="100" height="100" src="/{{$list->productImage}}" class="attachment-100x100 size-100x100 wp-post-image" alt=""/>
                                                </a>

                                                <div class="detail-item">
                                                    <div class="product-details">
                                                        <h4>
                                                            <a class="title-item" href="{{url('/index/simple_product',['id' => $list->productId])}}">{{$list->productName}}</a>
                                                        </h4>

                                                        <div class="product-price">
																	<span class="price">
																		<span class="woocommerce-Price-amount amount">
																			<span class="woocommerce-Price-currencySymbol">$</span>{{$list->productPrice}}
																		</span>
																	</span>

                                                            <div class="qty">
                                                                <span class="qty-number">{{$list->productCount}}</span>
                                                            </div>
                                                        </div>

                                                        <div class="product-action clearfix">
                                                            <a onclick="deleteProduct('{{$list->id}}')" class="btn-remove" title="Remove this item">
                                                                <span class="fa fa-trash-o"></span>
                                                            </a>

                                                            <a class="btn-edit" href="{{url('/index/cart')}}" title="View your shopping cart">
                                                                <span class="fa fa-pencil"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>

                                        <div class="cart-checkout">
                                            <div class="price-total">
                                                <span class="label-price-total">总共</span>

                                                <span class="price-total-w">
															<span class="price">
																<span class="woocommerce-Price-amount amount">
																	<span class="woocommerce-Price-currencySymbol">$</span>{{$totalPrice}}
																</span>
															</span>
														</span>
                                            </div>

                                            <div class="cart-links clearfix">
                                                <div class="cart-link">
                                                    <a href="{{url('/index/cart')}}" title="Cart">查看购物车</a>
                                                </div>

                                                <div class="checkout-link">
                                                    <a href="checkout.html" title="Check Out">结账</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widget nav_menu-3 widget_nav_menu pull-left">
                        <div class="widget-inner">
                            <ul id="menu-wishlist" class="menu">
                                <li class="menu-wishlist">
                                    <a  class="item-link" href="{{url('/index/wish_list')}}">
                                        <span class="menu-title">心愿单</span>
                                    </a>
                                </li>

                                <li class="yith-woocompare-open menu-compare">
                                    <a class="item-link compare" href="#">
                                        <span class="menu-title">对比</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom clearfix">
        <div class="container">
            <div class="rows">
                <!-- Primary navbar -->
                <div id="main-menu" class="main-menu">
                    <nav id="primary-menu" class="primary-menu">
                        <div class="navbar-inner navbar-inverse">
                            <div class="resmenu-container">
                                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#ResMenuprimary_menu">
                                    <span class="sr-only">Categories</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>

                                <div id="ResMenuprimary_menu" class="collapse menu-responsive-wrapper">
                                    <ul id="menu-primary-menu" class="etrostore_resmenu">
                                        <li><a href="{{url('')}}">首页</a></li>
                                        <li><a href="{{url('/index/cart')}}">购物车</a></li>
                                        <li><a href="{{url('/index/checkout')}}">结账</a></li>
                                        <li><a href="{{url('/index/my_account/addition/0')}}">我的账户</a></li>
                                        <li><a href="{{url('/index/shop/'.'brand_id/0'.'/'.'category_id/0'.'/'.'orderBy/0'.'/'.'pageCount/12'.'/'.'type/down')}}">产品</a></li>
                                        <li><a href="{{url('/index/about_us')}}">关于我们</a></li>
                                        <li><a href="{{url('/index/contact_us')}}">联系我们</a></li>
                                    </ul>
                                </div>
                            </div>

                            <ul id="menu-primary-menu-1" class="nav nav-pills nav-mega etrostore-mega etrostore-menures">
                                <li><a href="{{url('')}}">首页</a></li>
                                <li><a href="{{url('/index/cart')}}">购物车</a></li>
                                <li><a href="{{url('/index/checkout')}}">结账</a></li>
                                <li><a href="{{url('/index/my_account/addition/0')}}">我的账户</a></li>
                                <li><a href="{{url('/index/shop/'.'brand_id/0'.'/'.'category_id/0'.'/'.'orderBy/0'.'/'.'pageCount/12'.'/'.'type/down')}}">产品</a></li>
                                <li><a href="{{url('/index/about_us')}}">关于我们</a></li>
                                <li><a href="{{url('/index/contact_us')}}">联系我们</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!-- /Primary navbar -->



                <div class="mid-header pull-right">
                    <div class="widget sw_top">
								<span class="stick-sr">
									<i class="fa fa-search" aria-hidden="true"></i>
								</span>

                        <div class="top-form top-search">
                            <div class="topsearch-entry">
                                <form role="search" method="get" class="form-search searchform" action="">
                                    <label class="hide"></label>
                                    <input type="text" value="" name="s" class="search-query" placeholder="Keyword here..." />
                                    <button type="submit" class="button-search-pro form-button">搜索</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<script type="text/javascript" src="/index/js/jquery/jquery.min.js"></script>
<script src="/index/layer/mobile/layer.js" type="text/javascript" ></script>
<script src="/index/layer/layer.js" type="text/javascript" ></script>
<script>
    function deleteProduct($id) {
        var id = $id;
        layer.confirm('确定要删除吗？',function(index) {
            $.ajax({
                type: 'POST',
                url:"{{url('/service/change_status')}}",
                // dataType: 'json',
                data:{id:id,table:'cart',status:'-1',_token: "{{csrf_token()}}"},
                success: function(data){
                    var box=document.getElementById($id);
                    box.remove();
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
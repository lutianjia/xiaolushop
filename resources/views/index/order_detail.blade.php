@include('index.head')
<body class="page woocommerce-account woocommerce-page woocommerce-view-order">
<div class="body-wrapper theme-clearfix">
    @include('index.header')

    <div class="listings-title">
        <div class="container">
            <div class="wrap-title">
                <h1>我的账户</h1>
                <div class="bread">
                    <div class="breadcrumbs theme-clearfix">
                        <div class="container">
                            <ul class="breadcrumb">
                                <li>
                                    <a href="{{url('')}}">首页</a>
                                    <span class="go-page"></span>
                                </li>

                                <li class="active">
                                    <span>我的账户</span>
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
                    <div class="entry">
                        <div class="entry-content">
                            <header>
                                <h2 class="entry-title">我的账户</h2>
                            </header>

                            <div class="entry-summary">
                                <div class="woocommerce">
                                    @include('index.myAccountNav')

                                    <div class="woocommerce-MyAccount-content">
                                        <p>
                                            订单 #<mark class="order-number">{{$orderMessage['orderMessage']->orderId}}</mark>
                                            被下单在 <mark class="order-date">{{$orderMessage['orderMessage']->create_time}}</mark>
                                            @if($orderMessage['orderMessage']->status == '1')
                                                并且当前正处在 <mark class="order-status">已支付，快递发货中</mark>.
                                            @elseif($orderMessage['orderMessage']->status == '0')
                                                并且当前正处在 <mark class="order-status">未支付状态</mark>.
                                            @endif
                                        </p>

                                        <h2>订单详情</h2>

                                        <table class="shop_table order_details">
                                            <thead>
                                            <tr>
                                                <th class="product-name">产品</th>
                                                <th class="product-total">总计</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr class="order_item">
                                                <td class="product-name">
                                                    <a href="shop_product_style2.html">{{$orderMessage['orderMessage']->product_name}}</a>
                                                    <strong class="product-quantity">× {{$orderMessage['orderMessage']->product_count}}</strong>
                                                </td>

                                                <td class="product-total">
															<span class="amount">
																{{$orderMessage['orderMessage']->product_price}}
															</span>
                                                </td>
                                            </tr>
                                            </tbody>

                                            <tfoot>

                                            <tr>
                                                <th scope="row">付款方式:</th>

                                                <td>贝宝</td>
                                            </tr>

                                            <tr>
                                                <th scope="row">总计:</th>

                                                <td>
                                                    {{$orderMessage['orderMessage']->product_price}}
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>

                                        <header>
                                            <h2>客户相关信息</h2>
                                        </header>

                                        <table class="shop_table customer_details">
                                            <tbody>

                                            <tr>
                                                <th class="title">电话:</th>
                                                <td>{{$orderMessage['addressMessage']->phone}}</td>
                                            </tr>
                                            </tbody>
                                        </table>

                                        <header class="title">
                                            <h3>订单地址</h3>
                                        </header>

                                        <address>
                                            永久地址<br>
                                            {{$orderMessage['addressMessage']->country}}<br>
                                            {{$orderMessage['addressMessage']->city}}<br>
                                            {{$orderMessage['addressMessage']->detail_address}}<br>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('index.footer')
</div>


<div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none; max-width: none;"></div></div></body></html>
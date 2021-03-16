@include('index.head')
<body class="page woocommerce-account woocommerce-page woocommerce-orders">
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

                            <div class="entry-content">
                                <div class="woocommerce">
                                    @include('index.myAccountNav')

                                    <div class="woocommerce-MyAccount-content">
                                        <table class="shop_table shop_table_responsive my_account_orders account-orders-table">
                                            <thead>
                                            <tr>
                                                <th class="order-number"><span class="nobr">订单号</span></th>
                                                <th class="order-date"><span class="nobr">日期</span></th>
                                                <th class="order-status"><span class="nobr">状态</span></th>
                                                <th class="order-total"><span class="nobr">总价</span></th>
                                                <th class="order-actions"><span class="nobr">&nbsp;</span></th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($orderMessage as $list)
                                                <tr class="order">
                                                    <td class="order-number" data-title="Order">
                                                        <a href="{{url('index/order_detail/addition/1',['orderId'=>$list->orderId])}}">{{$list->orderId}}</a>
                                                    </td>
                                                    <td class="order-date" data-title="Date" >
                                                        <time datetime="2017-01-10" title="1484074846"> {{date('Y-m-d',strtotime($list->create_time))}}　</time>
                                                    </td>
                                                    <td class="order-status" data-title="Status">
                                                        @if($list->status == '1')
                                                            已付款
                                                        @elseif($list->status == '0')
                                                            未付款
                                                        @endif
                                                    </td>
                                                    <td class="order-total" data-title="Total">
                                                        {{$list->product_count * $list->product_price}}
                                                    </td>

                                                    <td class="order-actions" data-title="&nbsp;">
                                                        <a href="{{url('index/order_detail/addition/1',['orderId'=>$list->orderId])}}" class="button view" style="width: 60px;height: 30px;">查看</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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
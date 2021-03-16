@include('index.head')
<body class="page woocommerce-account woocommerce-page woocommerce-edit-address">
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
                                        <p>
                                            默认情况下，快递使用以下地址
                                        </p>
                                        @foreach($addressList as $list)
                                        <div class="u-column1 col-1 woocommerce-Address addresses">
                                            <header class="woocommerce-Address-title title">
                                                <h3>永久地址</h3>
                                                <a href="{{url('/index/address_shipping_details/addition/2',['id' => $list->id])}}" class="edit">编辑</a>
                                            </header>

                                            <address>
                                                {{$list->recipient}}<br>
                                                {{$list->phone}}<br>
                                                {{$list->country}}<br>
                                                {{$list->city}}<br>
                                                {{$list->detail_address}}<br>
                                            </address>
                                        </div>
                                        @endforeach
                                        <a href="{{url('/index/address_shipping_details/addition/2')}}" class="edit">添加地址</a>
                                    </div>
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

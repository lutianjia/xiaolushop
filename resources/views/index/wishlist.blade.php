@include('index.head')
<body class="page woocommerce-wishlist woocommerce woocommerce-page">
<div class="body-wrapper theme-clearfix">
    @include('index.header')

    <div class="listings-title">
        <div class="container">
            <div class="wrap-title">
                <h1>心愿单</h1>
                <div class="bread">
                    <div class="breadcrumbs theme-clearfix">
                        <div class="container">
                            <ul class="breadcrumb">
                                <li>
                                    <a href="{{url('')}}">首页</a>
                                    <span class="go-page"></span>
                                </li>

                                <li class="active">
                                    <span>心愿单</span>
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
                            <div id="yith-wcwl-messages"></div>
                            <form id="yith-wcwl-form" action="" method="post" class="woocommerce">
                                <!-- TITLE -->
                                <div class="wishlist-title ">
                                    <h2>我在市场商店的愿望清单</h2>
                                </div>
                                <!-- END TITLE -->

                                <!-- WISHLIST TABLE -->
                                <table class="shop_table cart wishlist_table">

                                    <thead>
                                    <tr>
                                        <th class="product-remove"></th>

                                        <th class="product-name">
                                            <span class="nobr">商品名称</span>
                                        </th>

                                        <th class="product-price">
                                            <span class="nobr">价格</span>
                                        </th>

                                        <th class="product-stock-stauts">
                                            <span class="nobr">状态</span>
                                        </th>

                                        <th class="product-add-to-cart"></th>
                                    </tr>
                                    </thead>
                                    @foreach($wishList as $list)
                                    <tbody id="{{$list->id}}">
                                    <tr>
                                        <td class="product-remove">
                                            <div>
                                                <a  onclick="deleteProduct('{{$list->id}}')" class="remove remove_from_wishlist" title="Remove this product">×</a>
                                            </div>
                                        </td>

                                        <td class="product-name">
                                            <a href="{{url('/index/simple_product',['id' => $list->productId])}}">{{$list->productName}}</a>
                                        </td>

                                        <td class="product-price">
                                            <ins>
                                                {{$list->productPrice}}
                                            </ins>
                                        </td>

                                        <td class="product-stock-status">
                                            @if($list->count == '0')
                                                <span class="wishlist-in-stock">无货</span>
                                            @elseif($list->count != '0')
                                                <span class="wishlist-in-stock">出货</span>
                                            @endif
                                        </td>

                                        <td class="product-add-to-cart">
                                            @if($list->inCart == 'true')
                                                <a rel="nofollow" class="button  ajax_add_to_cart add_to_cart button alt" style="background: cadetblue" title="Add to Cart">已加入购物车</a>
                                            @elseif($list->inCart != 'false')
                                                <a rel="nofollow" id="cart{{$list->productId}}" onclick="addCart({{$list->productId}})" class="button product_type_simple add_to_cart_button ajax_add_to_cart add_to_cart button alt" title="Add to Cart">点击加入购物车</a>
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('index.footer')
    <script type="text/javascript" src="/index/js/jquery/jquery.min.js"></script>
    <script src="/index/layer/mobile/layer.js" type="text/javascript" ></script>
    <script src="/index/layer/layer.js" type="text/javascript" ></script>
<SCRIPT>
    function deleteProduct($id) {
        var id = $id;
        layer.confirm('确定要删除吗？',function(index) {
            $.ajax({
                type: 'POST',
                url:"{{url('/service/change_status')}}",
                // dataType: 'json',
                data:{id:id,table:'wish',status:'-1',_token: "{{csrf_token()}}"},
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

    function addCart(id){
        $.ajax({
            type: 'POST',
            url: "{{url('/service/cart_add')}}",
            dataType: 'json',
            data: {
                id:id,
                count:1,
                from:'wish',
                _token: "{{csrf_token()}}"
            },
            success: function (data) {
                document.getElementById("cart"+data.id).innerHTML = '已加入购物车';
                document.getElementById("cart"+data.id).style.background = "cadetblue";
                setTimeout(function () {
                    document.getElementById("cart"+data.id).classList.remove("added");
                },1000);
            },
            error: function (data) {
                console.log(data);
            },
        });
    }
</SCRIPT>
<div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none; max-width: none;"></div></div></body></html>
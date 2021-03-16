<nav class="woocommerce-MyAccount-navigation">
    <ul>

        <li id="addition0">
            <a href="{{url('index/my_account/addition/0')}}">仪表盘</a>
        </li>

        <li id="addition1">
            <a href="{{url('index/order/addition/1')}}">订单</a>
        </li>

        <li id="addition2">
            <a href="{{url('index/addresses/addition/2')}}">地址</a>
        </li>

        <li id="addition3">
            <a href="{{url('index/account_details/addition/3')}}">账户详细资料</a>
        </li>

        <li>
            <a href="{{url('/service/index_login_out')}}">登出</a>
        </li>

    </ul>
</nav>
<script>

    var addition = '<?php echo "$addition";?>';
    document.getElementById("addition"+addition).classList.add("is-active");
</script>
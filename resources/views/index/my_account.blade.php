@include('index.head')

<body class="page woocommerce-account woocommerce-page">

     


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
												你好 <strong>{{$account}}</strong> (not {{$account}}? <a href="{{url('/service/index_login_out')}}">退出</a>)
											</p>
											<p>
												在帐户仪表板中，您可以查看 
												<a href="{{'/index/order/addition/1'}}">最近的订单</a>,
												管理 <a href="{{'/index/addresses/addition/2'}}">送货和帐单地址</a>
												以及 <a href="{{'/index/account_details/addition/3'}}">编辑密码和帐户详细信息</a>。
											</p>
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
@php
$favorite = \App\Models\Favorite::where('user_id', Auth::id())->get();
$count = count($favorite);
$cart = \App\Models\CartModel::where('user_id', Auth::id())->get();
$category = \App\Models\CategoryModel::get();
$countcart = count($cart);
// $total = 0;
// foreach ($cart as $item) {
//     $item->total = $item->price * $item->quantity;
//     $total += $item->total;
// }
@endphp
	<header class="version_1">
		<div class="layer"></div><!-- Mobile menu overlay mask -->
		<div class="main_header">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
						<div id="logo">
							<a href="index.html"><img src="{{asset('assets/img/D.png')}}" alt="" width="70" height="55" style="border-radius: 50%"></a>
						</div>
					</div>
					<nav class="col-xl-6 col-lg-7">
						<a class="open_close" href="javascript:void(0);">
							<div class="hamburger hamburger--spin">
								<div class="hamburger-box">
									<div class="hamburger-inner"></div>
								</div>
							</div>
						</a>
						<div class="main-menu">
							<div id="header_menu">
								<a href="index.html"><img src="assets/img/D.png" alt="" width="100" height="35"></a>
								<a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
							</div>
							<ul>
								<li class="">
									<a href="{{route('home')}}" >Trang Chủ</a>
								</li>
								<li class="">
									<a href="{{route('about')}}" >Giới Thiệu</a>
									<div class="menu-wrapper">
									</div>
								</li>
								<li class="submenu">
									<a href="{{route('products')}}" class="show-submenu">Sản Phẩm</a>
									<ul>
										@foreach($category as $categorys)
										<li><a href="{{ route('detail_category', ['id' => $categorys->id]) }}">{{$categorys->name}}</a></li>
										@endforeach
									</ul>
								</li>
								<li>
									<a href="{{route('new')}}">Tin Tức</a>
								</li>
								<li>
									<a href="{{route('contact')}}">Liên Hệ</a>
								</li>
							</ul>
						</div>
					</nav>
					<div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-end">
						<a class="phone_top" href="tel://9438843343"><strong><span>Hổ trợ?</span>+94 423-23-221</strong></a>
					</div>
				</div>
			</div>
		</div>
		<div class="main_nav Sticky">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 col-md-3">
						<nav class="categories">
							<ul class="clearfix">
								<li><span>
										<a href="#">
											<span class="hamburger hamburger--spin">
												<span class="hamburger-box">
													<span class="hamburger-inner"></span>
												</span>
											</span>
											Top danh mục
										</a>
									</span>
									<div id="menu">
										<ul>
											@foreach($category as $categorye)
											<li><span><a href="{{ route('detail_category', ['id' => $categorye->id]) }}">{{$categorye->name}}</a></span>
											</li>
											@endforeach
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</div>
					<div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
						<div class="custom-search-input">
							<form action="{{ route('product.search') }}" method="GET">
								<input type="text" name="query" placeholder="Tìm kiếm trên 10.000 sản phẩm ?">
								<button type="submit"><i class="header-icon_search_custom"></i></button>
							</form>
						</div>
					</div>
					<div class="col-xl-3 col-lg-2 col-md-3">
						<ul class="top_tools">
							<li>
								<div class="dropdown dropdown-cart">
									<a href="{{route('cartadd')}}" class="cart_bt"><strong>{{$countcart}}</strong></a>
									<div class="dropdown-menu">
										<ul>
											@foreach ($cart as $carts)
											<li>
												<a href="product-detail-1.html">
													<figure><img src="{{$carts->img}}"  alt="" width="50" height="50" ></figure>
													<strong><span>{{$carts->product->name}}</span>{{$carts->price}}</strong>
												</a>
													<form action="{{ route('cart.remove', ['id' => $carts->id]) }}" method="POST">
														@csrf
														@method('DELETE')
														<button type="submit" class="btn-danger">Xóa</button>
													</form>
											</li>
											@endforeach
										</ul>
										<div class="total_drop">
											<div class="clearfix"><strong>Total</strong><span>$200.00</span></div>
											<a href="cart.html" class="btn_1 outline">View Cart</a><a href="checkout.html" class="btn_1">Checkout</a>
										</div>
									</div>
								</div>
								<!-- /dropdown-cart-->
							</li>
							<li>
								<div class="dropdown dropdown-cart">
									{{-- <a href="cart.html" class="wishlist"><strong>2</strong></a> --}}
									<a href="{{route('heartadd')}}" class="wishlist"><strong>{{$count}}</strong></a>
									<div class="dropdown-menu">
										<ul>
											@foreach ($favorite as $item)
											<li>
												<a href="product-detail-1.html">
													<figure><img src="{{$item->product->img}}"  alt="" width="50" height="50" ></figure>
													<strong><span>{{$item->product->name}}</span>{{$item->product->price}}</strong>
												</a>
												<a href="{{ route('heart.remove', $item->product_id) }}" class="action"><i class="ti-trash"></i></a>
											</li>
											@endforeach
										</ul>
										<div class="total_drop">
											
											<a href="{{route('heartadd')}}" class="btn_1 outline">Xem sản phẩm yêu thích</a>
										</div>
									</div>
								</div>
								{{-- <a href="cart.html" class="cart_bt"></a> --}}
								
							</li>
							<li>
								<div class="dropdown dropdown-access">
									@if(Auth::user()=="")
									<a href="{{asset('login')}}" class="access_link"><span>Account</span></a>
								@else
								<a href="{{route('detail_users')}}" >
									<img src="" alt="" width="30px" height="30px" style="border-radius: 50%">
									</a>
									<div class="dropdown-menu">
										{{-- <a href="account.html" class="btn_1">Sign In or Sign Up</a> --}}
										<a href="">Xin chào: <strong class="fs-6">{{ Auth::user()->username }}</strong></a>
										<ul>
											<li>
												<a href="{{route('profile')}}"><i class="ti-user"></i>Thông tin cá nhân </a>
											</li>
											<li>
												<a href="{{route('profile.order')}}"><i class="ti-package"></i>Đơn hàng của bạn</a>
											</li>
											<li>
												<a href="{{route('change_password')}}"><i class="ti-truck"></i>Đổi mật khẩu</a>
											</li>
											<li>
												<a class="dropdown-item" href="#" onclick="event.preventDefault();
                    							document.getElementById('logout-form').submit();">Đăng xuất </a>
											</li>
											<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
												@csrf
											</form>
										</ul>
									</div>
								@endif
								
								</div>
								<!-- /dropdown-access-->
							</li>
							<li>
								<a href="javascript:void(0);" class="btn_search_mob"><span>Tìm kiếm</span></a>
							</li>
							<li>
								<a href="#menu" class="btn_cat_mob">
									<div class="hamburger hamburger--spin" id="hamburger">
										<div class="hamburger-box">
											<div class="hamburger-inner"></div>
										</div>
									</div>
									Top danh mục
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<div class="search_mob_wp">
				<form action="{{ route('product.search') }}" method="GET">
					<input type="text" name="query" class="form-control" placeholder="Tìm kiếm trên 10.000 sản phẩm ?">
					<input type="submit" class="btn_1 full-width" value="Search">
				</form>
			</div>
			
			<!-- /search_mobile -->
		</div>
		<!-- /main_nav -->
	</header>
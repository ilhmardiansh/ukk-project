<!DOCTYPE html>
<html lang="en">
  <head>
    <title>IL Store &mdash; Toko Handphone Online </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/shoes.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">

 	<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/slick.css') }}"/>
 	<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}"/>

 	<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/nouislider.min.css') }}"/>

	<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('shopper') }}/css/aos.css">

    <link rel="stylesheet" href="{{ asset('shopper') }}/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

  </head>
  @auth
  @php
              $id_user = Auth::user()->id;
        $keranjangs = App\Keranjang::join('users', 'users.id', '=', 'keranjang.user_id')
            ->join('products', 'products.id', '=', 'keranjang.products_id')
            ->select('products.name as nama_produk', 'products.image', 'users.name', 'keranjang.*', 'products.price')
            ->where('keranjang.user_id', '=', $id_user)
            ->get();

            $total_price = 0;
            foreach ($keranjangs as $key => $item) {
              $total_price += $item->price * $item->qty;
            }

  @endphp
  @endauth
  <body>
    <div id="preloader"></div>
		<div class="sidebar-search-wrap">
      <div class="sidebar-table-container">
        <div class="sidebar-align-container">
            <div class="search-closer right-side"></div>
            <div class="search-container">
              <form action="{{ route('user.produk.cari') }}" method="get">
                @csrf
                <input type="text" name="cari" id="s" class="search-input" name="s" placeholder="Search Produk">
              </form>
              <span>Search and Press Enter</span>
            </div>
        </div>
      </div>
  </div>
  <!-- Search Screen end -->





  <div class="main" id="main">
    <header class="header transition">
      <div class="container position-r">
        <div class="row">
          <div class="col-lg-2 col-md-4 col-6 align-flax">
                  <div class="navbar-header">
                    <a class="navbar-brand" href="/">
                        <img alt="log" src="{{asset('assets/images/logo.png')}}" class="transition">
                    </a>
                  </div>
            </div>
            <div class="col-lg-10 col-md-8 col-6 position-i">
                 <div class="menu-left transition">
                  <div class="menu" >
                      <ul>
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        @if (Route::has('login'))
                        @auth
                      <li>
                        <a href="{{ route('user.alamat') }}">alamat</a>
                      </li>
                      <li>
                        <a href="{{ route('user.order') }}">Pemesanan</a>
                      </li>
                      @endauth
                      @endif
                        <li>

                        </li>
                      </ul>
                  </div>
                </div>
                <div class="search-right">
                  <div class="menu-toggle"><span></span></div>
                  <div class="search-menu">
                    <form action="{{ route('user.produk.cari') }}" method="get">

                      <input type="text" name="cari" class="search-input" placeholder="Search Produk">
                      <input type="submit" name="submit" class="search-btn">
                      <div class="search-button-i transition">
                        <img src="{{asset('assets/images/search.png')}}" class="position-r transition" alt="search">
                      </div>
                    </form>
                  </div>
                  <ul class="login-cart">

                    @if (Route::has('login'))
                    @auth
                    <li>
                      <div class="login-head">
                        <a href="{{  route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" ><i class="fa fa-user-o" aria-hidden="true"></i></a>
                      </div>
                    </li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <li>
                  <div class="cart-menu">
                    <div class="cart-icon position-r">
                      <img src="{{asset('assets/images/car-icon-w.png')}}" class="position-r transition" alt="cart">
                    </div>
                    <div class="cart-dropdown header-link-dropdown">
                  <ul class="cart-list link-dropdown-list">
                    @foreach($keranjangs as $item)
                    <li style="width: 100%">
                        <figure>
                          <a href="product-detail.html" class="pull-left">
                            <img alt="product" src="{{ asset($item->image) }}">
                          </a>
                            <figcaption>
                              <span>
                                <a href="product-detail.html" class="w-100">{{$item->nama_produk}}</a>
                              </span>
                              <p class="cart-price">Rp. {{ number_format($item->price, 0, '.', ',')}}</p>
                              <div class="product-qty">
                                  <label>Qty:</label>
                                  <div class="custom-qty">
                                    <input type="text" name="qty" maxlength="8" value="{{$item->qty}}" title="Qty" class="input-text qty" disabled>
                                  </div>
                              </div>
                            </figcaption>
                        </figure>
                    </li>
                    @endforeach
                  </ul>
                  <p class="cart-sub-totle">
                    <span class="pull-left">Cart Subtotal</span>
                    <span class="pull-right"><strong class="price-box">Rp. {{ number_format($total_price, 0, '.', ',') }}</strong></span>
                  </p>
                  <div class="clearfix"></div>
                  <div class="mt-20">
                    <a href="{{route('user.keranjang')}}" class="btn">Cart</a>
                  </div>
                </div>
                  </div>
                </li>
                  @else

                    <li>
                      <div class="login-head">
                        <a href="{{ route('login') }}"><i class="fa fa-user-o" aria-hidden="true"></i></a>
                      </div>
                    </li>

                  @endauth
                  @endif
                  </ul>
                </div>
            </div>
        </div>
      </div>
    </header>

    @yield('content')




  </div>

  <script src="{{ asset('shopper') }}/js/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
  <script src="{{ asset('shopper') }}/js/jquery-ui.js"></script>
  <script src="{{ asset('shopper') }}/js/popper.min.js"></script>
  <script src="{{ asset('shopper') }}/js/bootstrap.min.js"></script>
  <script src="{{ asset('shopper') }}/js/owl.carousel.min.js"></script>
  <script src="{{ asset('shopper') }}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{ asset('shopper') }}/js/aos.js"></script>
<!-- latest jquery-->
<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script type="text/script">

$(window).on("load", function() {
        $('#preloader').delay(2000).fadeOut(500);
    });
</script>
    @yield('js')
  </body>
</html>

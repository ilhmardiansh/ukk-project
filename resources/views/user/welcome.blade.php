@extends('user.app')
@section('content')

<section class="home-banner">
  <div class="container">
    <div class="home-slider owl-carousel">
      @foreach($produks as $produk)
      <div class="banner-bg align-flax">
        <div class="w-100">
          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 align-flax">
              <div class="banner-img"><img src="{{$produk->image}}" alt="banner"></div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 align-flax">
              <div class="banner-heading w-100">
                <h2 class="banner-title">{{$produk->name}}</h2>
                <p class="banner-sub">{{$produk->description}}</p>
                <a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}" class="btn">Shop now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section class="featured pt-100">
  <div class="container">
    <div class="row mb-25">
      <div class="col-xl-6 col-lg-6 col-md-6">
        <div class="hading">
          <h2 class="hading-title">FEATURED <span>PRODUCTS</span></h2>
        </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6">
        <ul id="tabs" class="product-isotop filters-product text-right text-uppercase nav nav-tabs" role="tablist">
          @foreach($categories as $item)
          <li role="presentation" class="transition" data-filter=".item-{{$item->id}}">
            <a href="#item-{{$item->id}}" role="tab" data-toggle="tab">{{$item->name}}</a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="tab-content">
      @foreach($categories as $key => $item )
      <div role="tabpanel" class="row tab-pane fade {{$key == 0 ? 'active show' : ''}}" id="item-{{$item->id}}">
        @foreach($item->product as $citem)
        <div class="featured-product mb-25">
          <div class="product-img transition mb-15">
            <a href="{{ route('user.produk.detail',['id' =>  $citem->id]) }}">
              <img src="{{$citem->image}}" alt="product" class="transition">
            </a>
            <div class="product-details-btn text-uppercase text-center transition">
              <a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}" class="quick-popup">Quick View</a>
            </div>
          </div>
          <div class="product-desc" data-category="accessories">
            <a href="{{ route('user.produk.detail',['id' =>  $citem->id]) }}" class="product-name text-uppercase">{{$citem->name}}</a>
            <span class="product-pricce">{{number_format($citem->price, 2, '.', ',')}}</span>
          </div>
        </div>
        @endforeach
      </div>
      @endforeach
    </div>
  </div>
</section>
<div id="newsletter" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>Follow us in <strong>SOCIAL MEDIA</strong></p>
                    <ul class="newsletter-follow">
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-10 col-xs-5">
                    <div class="footer">
                        <h3 class="footer-title">About</h3>
                        <p>Sedang mencari HP murah? Temukan di IL Store Indonesia! Tak dapat dipungkiri, zaman sekarang semua orang membutuhkan handphone atau HP untuk berbagai keperluan. Tidak sekadar untuk komunikasi saja, handphone bahkan sudah berkembang sebagai alat hiburan, alat kerja, bahkan mampu membantu memantau kesehatan kamu.

                            Yuk, temukan harga HP murah ya sesuai dengan budget kamu di IL Store Indonesia</p>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-phone"></i>081357018437</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>ilham.ardiansah40@gmail.com</a></li>
                        </ul>
                    </div>
                </div>

</footer>

    @endsection

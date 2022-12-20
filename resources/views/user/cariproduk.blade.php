@extends('user.app')
@section('content')

<section class="page-banner">
  <div class="container">
    <div class="page-banner-in">
      <div class="row">
        <div class="col-xl-6 col-lg-6 col-12">
          <h1 class="page-banner-title text-uppercase">Hasil Pencarian Untuk : {{ $cari }} ({{ $total  }} Hasil)</h1>
        </div>
        <div class="col-xl-6 col-lg-6 col-12">
          <ul class="right-side">
            <li><a href="/">Home</a></li>
            <li>cari</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="product-list">
  <div class="container">
    <div class="row pt-100">
      <div class="col-xl-12 col-lg-12 col-12">
        <div class="featured">
          <div class="row">
            @foreach($produks as $produk)
            <div class="featured-product mb-25">
              <div class="product-img transition mb-15">
                <a href="product-detail.html">
                  <img src="{{asset($produk->image)}}" alt="product" class="transition">
                </a>
                <div class="product-details-btn text-uppercase text-center transition">
                  <a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}" class="quick-popup">Quick View</a>
                </div>
              </div>
              <div class="product-desc">
                <a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}" class="product-name text-uppercase">{{ $produk->name }}</a>
                <span class="product-pricce">Rp. {{ number_format($produk->price, 0, '.', ',') }}</span>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="category3 " data-aos="fade-up">
    <div class="custom-container">
      <div class="row category-block">
        <div class="col-12 pr-0">
          <div class="category-slide5 no-arrow mb--5">
            @foreach($produks as $produk)
            <div>
              <div class="category-box">
                <div class="img-wrraper">
                  <a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}">
                    <img src="{{asset($produk->image)}}" alt="category" class="img-fluid">
                  </a>
                  <div class="category-detail">
                    <h4>{{ $produk->name }}</h4>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
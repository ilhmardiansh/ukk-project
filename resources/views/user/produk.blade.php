@extends('user.app')
@section('content')
<div class="bg-light py-3">
    <div class="container">
    <div class="row">
        <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
    </div>
    </div>
</div>

<section class="box-category">
    <div class="container-fluid ">
      <div class="row">
        <div class="col pl-0">
          <div class="slide-10 no-arrow">
            @foreach($categories as $categori)
            <div>
              <a href="{{ route('user.kategori',['id' => $categori->id]) }}">
                <div class="box-category-contain">
                  <h4>{{$categori->name}}</h4>
                </div>
              </a>
            </div>
            @endforeach
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

{{-- <div class="site-section">
    <div class="container">

    <div class="row mb-5">
        <div class="col-md-9 order-2"> --}}

        <!-- <div class="row">
            <div class="col-md-12 mb-5">
            <div class="float-md-left mb-4"><h2 class="text-black h5">Shop All</h2></div>
            <div class="d-flex">
                <div class="dropdown mr-1 ml-md-auto">
                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Latest
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                    <a class="dropdown-item" href="#">Men</a>
                    <a class="dropdown-item" href="#">Women</a>
                    <a class="dropdown-item" href="#">Children</a>
                </div>
                </div>
                <div class="btn-group">
                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                    <a class="dropdown-item" href="#">Relevance</a>
                    <a class="dropdown-item" href="#">Name, A to Z</a>
                    <a class="dropdown-item" href="#">Name, Z to A</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Price, low to high</a>
                    <a class="dropdown-item" href="#">Price, high to low</a>
                </div>
                </div>
            </div>
            </div>
        </div> -->




{{--
        <div class="col-md-3 order-1 mb-5 mb-md-0">
        <div class="border p-4 rounded mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
            <ul class="list-unstyled mb-0">
            @foreach($categories as $categori)
            <li class="mb-1"><a href="{{ route('user.kategori',['id' => $categori->id]) }}" class="d-flex"><span>{{ $categori->name }}</span> <span class="text-black ml-auto">( {{ $categori->jumlah }} )</span></a>
            </li>
            @endforeach
            </ul>
        </div> --}}

        <!-- <div class="border p-4 rounded mb-4">
            <div class="mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
            <div id="slider-range" class="border-primary"></div>
            <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
            </div>

            <div class="mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Size</h3>
            <label for="s_sm" class="d-flex">
                <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">Small (2,319)</span>
            </label>
            <label for="s_md" class="d-flex">
                <input type="checkbox" id="s_md" class="mr-2 mt-1"> <span class="text-black">Medium (1,282)</span>
            </label>
            <label for="s_lg" class="d-flex">
                <input type="checkbox" id="s_lg" class="mr-2 mt-1"> <span class="text-black">Large (1,392)</span>
            </label>
            </div>

            <div class="mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Color</h3>
            <a href="#" class="d-flex color-item align-items-center" >
                <span class="bg-danger color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Red (2,429)</span>
            </a>
            <a href="#" class="d-flex color-item align-items-center" >
                <span class="bg-success color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Green (2,298)</span>
            </a>
            <a href="#" class="d-flex color-item align-items-center" >
                <span class="bg-info color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Blue (1,075)</span>
            </a>
            <a href="#" class="d-flex color-item align-items-center" >
                <span class="bg-primary color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Purple (1,075)</span>
            </a>
            </div>

        </div> -->
        {{-- </div>
    </div>

    </div>
</div> --}}
@endsection

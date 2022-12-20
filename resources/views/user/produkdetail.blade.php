@extends('user.app')
@section('content')

<section class="page-banner">
    <div class="container">
        <div class="page-banner-in">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-12">
                    <h1 class="page-banner-title text-uppercase">Product</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-12">
                    <ul class="right-side">
                        <li><a href="javascript:void(0)">Home</a></li>
                        <li><a href="javascript:void(0)">Product</a></li>
                        <li>Product Detail</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product-detail-main pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6 col-12">
                <div class="align-center mb-md-30">
                    <ul id="glasscase" class="gc-start">
                        <li><img src="{{ asset($produk->image) }}" alt="product" /></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7 col-md-10 col-12">
                <div class="product-detail-in">
                    <h2 class="product-item-name text-uppercase">{{ $produk->name }}</h2>
                    <div class="price-box">
                        <span class="price">Rp. {{ number_format($produk->price, 2, '.', ',') }}</span>
                        <div class="rating-summary-block">

                        </div>
                        <div class="product-des">
                            <p>{{$produk->description}}</p>
                        </div>
                        <div class="row mt-20 mb-20">
                            <div class="col-12">
                                <form action="{{ route('user.keranjang.simpan') }}" method="post">
                                    @csrf
                                    @if(Route::has('login'))
                                        @auth
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        @endauth
                                    @endif
                                    <small>Sisa Stok {{ $produk->stok }}</small>
                                    <input type="hidden" value="{{ $produk->stok }}" id="sisastok">
                                    <input type="hidden" name="products_id" value="{{ $produk->id }}">
                                <div class="table-listing qty">
                                    <label>Qty:</label>
                                    <div class="fill-input">
                                        <button type="button" id="sub" class="sub cou-sub">
                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                        </button>
                                        <input type="number" id="1" class="input-text qty" value="1" name="qty" min="1" />
                                        <button type="button" id="add" class="add cou-sub">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="product-action">
                                    <ul>
                                        <li>
                                            <button type="submit"  class="btn btn-color">
                                                <img src="{{asset('assets/images/shop-b')}}ag.png" alt="bag">
                                                <span>add to cart</span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-10 col-xs-5">
                    <div class="footer">
                        <h3 class="footer-title">For your information</h3>
                        <p>Harga yang dinyatakan mungkin telah berubah sejak update terakhir. Namun, tidak memungkinkan bagi kami untuk memperbarui harga di website kami dengan segera. Jika toko tidak menawarkan harga dalam mata uang lokal Anda, kami dapat menghitung harga dan menampilkannya dengan nilai tukar harian yang diperbarui.</p>
                        <span class="copyright">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </span>
                    </div>
                </div>

</footer>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        $('.js-minus').on('click', function(e){
			e.preventDefault();
			if ( $(this).closest('.input-group').find('.form-control').val() != 0  ) {
				$(this).closest('.input-group').find('.form-control').val(parseInt($(this).closest('.input-group').find('.form-control').val()) - 1);
			} else {
				$(this).closest('.input-group').find('.form-control').val(parseInt(0));
			}
		});
		$('.js-plus').on('click', function(e){
			e.preventDefault();
			$(this).closest('.input-group').find('.form-control').val(parseInt($(this).closest('.input-group').find('.form-control').val()) + 1);
		});
});

</script>
@endsection

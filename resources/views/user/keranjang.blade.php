@extends('user.app')
@section('content')

<style>
    	button {cursor:pointer; }
		.number{
			margin:100px;
		}
		.minus, .plus{
			background:#f2f2f2;
			border-radius:4px;
			padding:8px 5px 8px 5px;
			border:1px solid #ddd;
      vertical-align: middle;
      text-align: center;
		}

		input{
			height:34px;
      width: 100px;
      text-align: center;
      font-size: 26px;
			border:1px solid #ddd;
			border-radius:4px;
      display: inline-block;
      vertical-align: middle;

        }

</style>
<div class="bg-light py-3">
    <div class="container">
    <div class="row">
        <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
    </div>
    </div>
</div>


<div class="site-section">
    <div class="container">
    <div class="row mb-20">
        <form class="col-md-12" method="post" action="{{ route('user.keranjang.update') }}">
        @csrf
            <table class="table table-bordered">
            <thead>
                <tr>
                <th class="product-thumbnail">Gambar</th>
                <th class="product-name">Produk</th>
                <th class="product-price">Harga</th>
                <th class="product-quantity">Jumlah</th>
                <th class="product-total">Total</th>
                <th class="product-remove">Hapus</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                <?php $subtotal=0; foreach($keranjangs as $keranjang): ?>
                <td class="product-thumbnail">
                    <img src="{{ asset($keranjang->image) }}" alt="Image" class="img-fluid" width="150">
                </td>
                <td class="product-name">
                    <h2 class="h5 text-black">{{ $keranjang->nama_produk }}</h2>
                </td>
                <td>Rp. {{ number_format($keranjang->price,2,',','.') }} </td>
                <td>
                    {{-- <button type="button" class="minus js-minus">&minus;</button>
                    <input type="text" name="qty[]" value="{{ $keranjang->qty }}"/>
                    <button type="button" class="plus js-plus">&plus;</button>

                     --}}
                    <div class="input-group mb-3" style="max-width: 120px;">
                    <div class="input-group-prepend">
                        <button class="plus js-minus" type="button">&minus;</button>
                    </div>
                    <input type="text" name="qty[]" class="form-control text-center" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" value="{{ $keranjang->qty }}">
                    <input type="hidden" name="id[]" value="{{ $keranjang->id }}">
                    <div class="input-group-append">
                        <button class="minus js-plus" type="button">&plus;</button>
                    </div>
                    </div>

                </td>
                <?php
                    $total = $keranjang->price * $keranjang->qty;
                    $subtotal = $subtotal + $total;
                ?>
                <td>Rp. {{ number_format($total,2,',','.') }}</td>
                <td><a href="{{ route('user.keranjang.delete',['id' => $keranjang->id]) }}" class="btn btn-sm">X</a></td>
                </tr>
                <?php endforeach;?>
            </tbody>
            </table>

    </div>

    <div class="row">
        <div class="col-md-6">
        <div class="row mb-10">
            <div class="col-md-6 mb-3 mb-md-0">
            <button type="submit" class="btn btn-sm btn-block">Update Keranjang</button>
            </div>
            </form>
        </div>
        </div>
        <div class="col-md-6 pl-5">
        <div class="row justify-content-end">
            <div class="col-md-7">
            <div class="row">
                <div class="col-md-12 text-right border-bottom mb-5">
                <h3 class="text-black h4 text-uppercase">Total Belanja</h3>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6">
                <span class="text-black">Total</span>
                </div>
                <div class="col-md-6 text-right">
                <strong class="text-black">Rp. {{ number_format($subtotal,2,',','.') }}</strong>
                </div>
            </div>

            <div class="row">
                @if($cekalamat > 0)
                <div class="col-md-12">
                <a href="{{ route('user.checkout') }}" class="btn btn-lg py-3 btn-block" >Checkout</a>
                <small>Jika Merubah jumlah Pada Keranjang Maka Klik Update Keranjang Dulu Sebelum Melakukan Checkout</small>
                </div>
                @else
                <div class="col-md-12">
                <a href="{{ route('user.alamat') }}" class="btn btn-lg py-3 btn-block" >Atur Alamat</a>
                <small>Anda Belum Mengatur Alamat</small>
                </div>
                @endif
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
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

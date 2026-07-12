@extends('layouts.user.main')

@section('content')
<section class="banner-area">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="banner-content">
                            <h1>Nike New <br>Collection!</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="banner-img">
                            <img class="img-fluid" src="{{ asset('assets/templates/user/img/banner/banner-img.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if(isset($flashsale) && $flashsale->count())
<section class="section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h1>Flash Sale 🔥</h1>
                    <p>Produk pilihan dengan harga promosi terbatas.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($flashsale as $item)
            <div class="col-lg-3 col-md-6">
                <div class="single-product">
                    <img class="img-fluid" src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name }}">
                    <div class="product-details">
                        <h6>{{ $item->name }}</h6>
                        <span class="badge badge-danger mb-2">Flash Sale</span>
                        <div class="price">
                            <h6>{{ number_format($item->discount_price) }} Points</h6>
                            <h6 class="l-through">{{ number_format($item->price) }} Points</h6>
                        </div>
                        <p><strong>Stock :</strong>
                            @if($item->stock > 0)
                            <span class="text-success">{{ $item->stock }}</span>
                            @else
                            <span class="text-danger">Habis</span>
                            @endif
                        </p>
                        <div class="prd-bottom">
                            @if($item->stock > 0)
                            <a class="social-info" href="javascript:void(0);" onclick="confirmPurchase('{{ $item->id }}','{{ Auth::user()->id }}')">
                                <span class="ti-bag"></span>
                                <p class="hover-text">Beli</p>
                            </a>
                            @else
                            <a class="social-info" href="javascript:void(0);">
                                <span class="ti-close"></span>
                                <p class="hover-text">Stok Habis</p>
                            </a>
                            @endif
                            <a href="{{ route('user.detail.product',$item->id) }}" class="social-info">
                                <span class="lnr lnr-eye"></span>
                                <p class="hover-text">Detail</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h1>Latest Products</h1>
                    <p>Temukan berbagai produk terbaik dengan harga terjangkau dan kualitas terbaik.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ($products as $item)
            <div class="col-lg-3 col-md-6">
                <div class="single-product">
                    <img class="img-fluid" src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name }}">
                    <div class="product-details">
                        <h6>{{ $item->name }}</h6>
                        <span class="badge badge-primary mb-2">{{ $item->category }}</span>
                        <div class="price">
                            @if($item->is_flash_sale && $item->discount_price)
                            <h6>{{ number_format($item->discount_price) }} Points</h6>
                            <h6 class="l-through">{{ number_format($item->price) }} Points</h6>
                            @else
                            <h6>{{ number_format($item->price) }} Points</h6>
                            @endif
                        </div>
                        <p><strong>Stock :</strong>
                            @if($item->stock > 0)
                            <span class="text-success">{{ $item->stock }}</span>
                            @else
                            <span class="text-danger">Habis</span>
                            @endif
                        </p>
                        <p>{{ \Illuminate\Support\Str::limit($item->description, 50) }}</p>
                        <div class="prd-bottom">
                            @if($item->stock > 0)
                            <a class="social-info" href="javascript:void(0);" onclick="confirmPurchase('{{ $item->id }}','{{ Auth::user()->id }}')">
                                <span class="ti-bag"></span>
                                <p class="hover-text">Beli</p>
                            </a>
                            @else
                            <a class="social-info" href="javascript:void(0);">
                                <span class="ti-close"></span>
                                <p class="hover-text">Stok Habis</p>
                            </a>
                            @endif
                            <a href="{{ route('user.detail.product',$item->id) }}" class="social-info">
                                <span class="lnr lnr-eye"></span>
                                <p class="hover-text">Detail</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-lg-12">
                <div class="text-center py-5">
                    <h3>Tidak ada produk.</h3>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmPurchase(productId, userId) {
        Swal.fire({
            title: 'Beli Produk?',
            text: 'Point Anda akan dikurangi sesuai harga produk.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/product/purchase/' + productId + '/' + userId;
            }
        });
    }
</script>
@endsection
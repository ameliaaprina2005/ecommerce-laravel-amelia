@extends('layouts.user.main')

@section('content')
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Detail Produk</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('user.dashboard') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#">Detail Produk</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="section_gap">
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="single-prd-item">
                        <img class="img-fluid" src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}">
                    </div>
                </div>

                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">

                        <h3>{{ $product->name }}</h3>

                        <h2>{{ number_format($product->price) }} Points</h2>

                        <ul class="list">
                            <li>
                                <a href="#">
                                    <span>Kategori</span> :
                                    {{ $product->category }}
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <span>Stock</span> :

                                    @if($product->stock > 0)
                                    <span class="text-success">{{ $product->stock }}</span>
                                    @else
                                    <span class="text-danger">Habis</span>
                                    @endif

                                </a>
                            </li>
                        </ul>

                        <p>
                            {{ $product->description }}
                        </p>

                        <div class="card_area d-flex align-items-center">

                            @if($product->stock > 0)

                            <a class="primary-btn"
                                href="javascript:void(0);"
                                onclick="confirmPurchase('{{ $product->id }}','{{ Auth::user()->id }}')">

                                Beli Produk

                            </a>

                            @else

                            <button class="primary-btn" disabled>

                                Stock Habis

                            </button>

                            @endif

                            <a href="{{ route('user.dashboard') }}"
                                class="genric-btn default-border ml-3">

                                Kembali

                            </a>

                        </div>

                    </div>
                </div>
            </div>
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
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Beli!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/product/purchase/' + productId + '/' + userId;
            }
        });
    }
</script>

@endsection
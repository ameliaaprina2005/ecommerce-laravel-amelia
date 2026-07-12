@extends('layouts.admin.main')

@section('title', 'Admin Detail Product')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Produk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.product') }}">Produk</a>
                </div>
                <div class="breadcrumb-item">Detail Produk</div>
            </div>
        </div>

        <a href="{{ route('admin.product') }}" class="btn btn-icon icon-left btn-warning mb-4">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="row">
            <div class="col-12">
                <article class="article article-style-c">
                    <div class="article-header">
                        <div class="article-image" data-background="{{ asset('images/' . $product->image) }}"></div>
                    </div>
                    <div class="article-details">
                        <div class="article-category">
                            <a href="#">{{ $product->name }}</a>
                            <div class="bullet"></div>
                            <a href="#">{{ $product->category }}</a>
                        </div>

                        <div class="article-category">
                            <a href="#">
                                Distributor:
                                {{ $product->distributor?->nama_distributor ?? 'Distributor tidak ditemukan' }}
                            </a>
                        </div>

                        <div class="article-title">
                            @if ($product->is_flash_sale && $product->discount_price)
                            <h2>
                                <a href="#">
                                    Harga Flash Sale:
                                    {{ number_format($product->discount_price) }} Points
                                </a>
                            </h2>
                            <p>
                                Harga Normal:
                                <del>{{ number_format($product->price) }} Points</del>
                            </p>
                            @else
                            <h2>
                                <a href="#">
                                    Harga:
                                    {{ number_format($product->price) }} Points
                                </a>
                            </h2>
                            @endif
                        </div>

                        <p>
                            <strong>Stock:</strong>
                            @if ($product->stock > 0)
                            <span class="badge badge-success">{{ $product->stock }}</span>
                            @else
                            <span class="badge badge-danger">Habis</span>
                            @endif
                        </p>

                        <hr>

                        <p>{{ $product->description }}</p>
                    </div>
                </article>
            </div>
        </div>
    </section>
</div>
@endsection
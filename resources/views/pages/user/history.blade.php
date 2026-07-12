@extends('layouts.user.main')

@section('content')
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Halaman History Pembelian</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('user.dashboard') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#">History Pembelian</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="section_gap">
    <div class="container">
        <div class="row">
            @forelse ($data as $item)
            <div class="col-lg-3 col-md-6">
                <div class="single-product">
                    <img class="img-fluid" src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name }}">
                    <div class="product-details">
                        <h6>{{ $item->name }}</h6>
                        <div class="price">
                            <h6>{{ number_format($item->total_harga) }} Points</h6>
                        </div>
                        <p>
                            Tanggal:
                            {{ \Carbon\Carbon::parse($item->tanggal_pembelian)->format('d-m-Y H:i') }}
                        </p>
                        <div class="prd-bottom">
                            <a href="{{ route('user.detail.history', $item->history_id) }}" class="social-info">
                                <span class="lnr lnr-move"></span>
                                <p class="hover-text">Detail</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-lg-12 col-md-12">
                <div class="single-product">
                    <h3 class="text-center">Tidak ada riwayat pembelian</h3>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
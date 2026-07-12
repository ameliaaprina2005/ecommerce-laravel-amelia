@extends('layouts.user.main')

@section('content')
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Halaman Detail Pembelian</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('user.dashboard') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="{{ route('user.history', Auth::id()) }}">History<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#">Detail Pembelian</a>
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
                        <img class="img-fluid" src="{{ asset('images/' . $data->image) }}" alt="{{ $data->name }}">
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{ $data->name }}</h3>
                        <h2>{{ number_format($data->total_harga) }} Points</h2>
                        <ul class="list">
                            <li>
                                <a class="active" href="#">
                                    <span>Kategori</span> : {{ $data->category }}
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>Tanggal Pembelian</span> :
                                    {{ \Carbon\Carbon::parse($data->tanggal_pembelian)->format('d-m-Y H:i') }}
                                </a>
                            </li>
                        </ul>
                        <p>{{ $data->description }}</p>
                        <a href="{{ route('user.history', Auth::id()) }}" class="primary-btn">
                            Kembali ke History
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
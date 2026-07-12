@extends('layouts.admin.main')

@section('title', 'Admin Detail History Pembelian')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail History Pembelian</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.history') }}">History Pembelian</a>
                </div>
                <div class="breadcrumb-item">Detail History</div>
            </div>
        </div>

        <a href="{{ route('admin.history') }}" class="btn btn-warning mb-4">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Pengguna</label>
                            <input type="text" class="form-control" value="{{ $data->name }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email Pengguna</label>
                            <input type="text" class="form-control" value="{{ $data->email }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" class="form-control" value="{{ $data->nama_produk }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kategori Produk</label>
                            <input type="text" class="form-control" value="{{ $data->category }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Total Harga Pembelian</label>
                            <input type="text" class="form-control" value="{{ number_format($data->total_harga) }} Points" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Pembelian</label>
                            <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($data->created_at)->format('d-m-Y H:i') }}" readonly>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Deskripsi Produk</label>
                            <textarea class="form-control" rows="4" readonly>{{ $data->description }}</textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        <label>Gambar Produk</label><br>
                        <img src="{{ asset('images/' . $data->image) }}" width="180" alt="{{ $data->nama_produk }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
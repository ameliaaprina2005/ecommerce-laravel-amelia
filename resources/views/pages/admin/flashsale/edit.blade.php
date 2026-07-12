@extends('layouts.admin.main')

@section('title', 'Edit Flash Sale')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Flash Sale</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{ route('admin.flashsale') }}">Flash Sale</a>
                </div>
                <div class="breadcrumb-item active">
                    Edit Flash Sale
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Pengaturan Flash Sale</h4>
            </div>

            <div class="card-body">

                <form action="{{ route('flashsale.update',$product->id) }}" method="POST">

                    @csrf

                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" value="{{ $product->name }}" readonly>
                    </div>

                    <div class="form-group">
                        <label>Harga Normal</label>
                        <input type="number" class="form-control" value="{{ $product->price }}" readonly>
                    </div>

                    <div class="form-group">
                        <label>Harga Flash Sale</label>
                        <input type="number"
                            name="discount_price"
                            class="form-control"
                            value="{{ old('discount_price',$product->discount_price) }}"
                            min="0"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" class="form-control" value="{{ $product->stock }}" readonly>
                    </div>

                    <div class="text-right">
                        <a href="{{ route('admin.flashsale') }}" class="btn btn-secondary">
                            Kembali
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Flash Sale
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </section>
</div>
@endsection
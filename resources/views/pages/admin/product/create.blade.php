@extends('layouts.admin.main')

@section('title', 'Tambah Produk')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Produk</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>

                <div class="breadcrumb-item">
                    <a href="{{ route('admin.product') }}">Produk</a>
                </div>

                <div class="breadcrumb-item active">
                    Tambah Produk
                </div>
            </div>
        </div>

        <div class="card">

            <div class="card-header">
                <h4>Form Tambah Produk</h4>
            </div>

            <div class="card-body">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">
                        <label>Distributor</label>

                        <select name="id_distributor" class="form-control" required>

                            <option value="">-- Pilih Distributor --</option>

                            @foreach($distributor as $item)

                            <option value="{{ $item->id }}"
                                {{ old('id_distributor') == $item->id ? 'selected' : '' }}>

                                {{ $item->nama_distributor }}

                            </option>

                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Harga Produk</label>
                        <input type="number" name="price" class="form-control" value="{{ old('price') }}" min="0" required>
                    </div>

                    <div class="form-group">
                        <label>Stock Produk</label>
                        <input type="number" name="stock" class="form-control" value="{{ old('stock') }}" min="0" required>
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>

                        <select name="category" class="form-control" required>

                            <option value="">-- Pilih Kategori --</option>

                            <option value="Elektronik" {{ old('category')=='Elektronik'?'selected':'' }}>Elektronik</option>

                            <option value="Fashion" {{ old('category')=='Fashion'?'selected':'' }}>Fashion</option>

                            <option value="Makanan" {{ old('category')=='Makanan'?'selected':'' }}>Makanan</option>

                            <option value="Minuman" {{ old('category')=='Minuman'?'selected':'' }}>Minuman</option>

                            <option value="Aksesoris" {{ old('category')=='Aksesoris'?'selected':'' }}>Aksesoris</option>

                            <option value="Lainnya" {{ old('category')=='Lainnya'?'selected':'' }}>Lainnya</option>

                        </select>

                    </div>

                    <div class="form-group">
                        <label>Deskripsi Produk</label>

                        <textarea name="description" class="form-control" rows="5" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Gambar Produk</label>

                        <input type="file" name="image" class="form-control" accept="image/*" required>
                    </div>

                    <div class="text-right">

                        <a href="{{ route('admin.product') }}" class="btn btn-secondary">
                            Kembali
                        </a>

                        <button type="submit" class="btn btn-primary">

                            <i class="fas fa-save"></i>

                            Simpan Produk

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </section>
</div>
@endsection
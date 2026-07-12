@extends('layouts.admin.main')

@section('title', 'Admin Edit Product')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Produk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.product') }}">Produk</a>
                </div>
                <div class="breadcrumb-item">Edit Produk</div>
            </div>
        </div>

        <a href="{{ route('admin.product') }}" class="btn btn-icon icon-left btn-warning mb-4">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="card">
            <form action="{{ route('product.update', $product->id) }}" class="needs-validation" novalidate enctype="multipart/form-data" method="POST">
                @csrf

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

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="id_distributor">Nama Distributor</label>
                                <select id="id_distributor" name="id_distributor" class="form-control" required>
                                    <option value="">-- Pilih Distributor --</option>

                                    @foreach ($distributor as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('id_distributor', $product->id_distributor) == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama_distributor }}
                                    </option>
                                    @endforeach
                                </select>

                                <div class="invalid-feedback">
                                    Distributor harus dipilih!
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Nama Produk</label>
                                <input id="name" type="text" class="form-control" name="name"
                                    value="{{ old('name', $product->name) }}" required>

                                <div class="invalid-feedback">
                                    Kolom ini harus diisi!
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="price">Harga Produk (Point)</label>
                                <input id="price" type="number" class="form-control" name="price"
                                    value="{{ old('price', $product->price) }}" min="0" required>

                                <div class="invalid-feedback">
                                    Kolom ini harus diisi!
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="stock">Stock Produk</label>
                                <input id="stock" type="number" class="form-control" name="stock"
                                    value="{{ old('stock', $product->stock) }}" min="0" required>

                                <div class="invalid-feedback">
                                    Kolom ini harus diisi!
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="category">Kategori Produk</label>
                                <select id="category" name="category" class="form-control" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="Elektronik" {{ old('category', $product->category) == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                                    <option value="Fashion" {{ old('category', $product->category) == 'Fashion' ? 'selected' : '' }}>Fashion</option>
                                    <option value="Makanan" {{ old('category', $product->category) == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                                    <option value="Minuman" {{ old('category', $product->category) == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                                    <option value="Aksesoris" {{ old('category', $product->category) == 'Aksesoris' ? 'selected' : '' }}>Aksesoris</option>
                                    <option value="Lainnya" {{ old('category', $product->category) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>

                                <div class="invalid-feedback">
                                    Kategori harus dipilih!
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="description">Deskripsi Produk</label>
                                <textarea class="form-control" name="description" id="description"
                                    rows="5" required>{{ old('description', $product->description) }}</textarea>

                                <div class="invalid-feedback">
                                    Deskripsi harus diisi!
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Gambar Lama</label>
                                <br>

                                @if ($product->image)
                                <img src="{{ asset('images/' . $product->image) }}"
                                    width="120" class="mb-3" alt="{{ $product->name }}">
                                @else
                                <p class="text-muted">Tidak ada gambar.</p>
                                @endif

                                <div class="custom-file">
                                    <input class="custom-file-input" name="image"
                                        id="customFile" type="file" accept="image/*">

                                    <label class="custom-file-label" for="customFile">
                                        Pilih Gambar Baru
                                    </label>
                                </div>

                                <small class="form-text text-muted">
                                    Kosongkan jika tidak ingin mengganti gambar.
                                </small>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-icon icon-left btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
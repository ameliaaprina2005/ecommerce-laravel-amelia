@extends('layouts.admin.main')

@section('title', 'Admin Product')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Produk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Produk</div>
            </div>
        </div>

        <a href="{{ route('product.create') }}" class="btn btn-icon icon-left btn-primary">
            <i class="fas fa-plus"></i> Produk
        </a>

        <div class="card mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Gambar</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stock</th>
                                <th>Kategori</th>
                                <th>Nama Distributor</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('images/' . $item->image) }}" width="70" alt="{{ $item->name }}">
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ number_format($item->price) }} Points</td>
                                <td>
                                    @if ($item->stock > 0)
                                    <span class="badge badge-success">{{ $item->stock }}</span>
                                    @else
                                    <span class="badge badge-danger">Habis</span>
                                    @endif
                                </td>
                                <td>{{ $item->category }}</td>
                                <td>
                                    {{ $item->distributor?->nama_distributor ?? 'Distributor tidak ditemukan' }}
                                </td>
                                <td>
                                    <a href="{{ route('product.detail', $item->id) }}" class="badge badge-info">Detail</a>
                                    <a href="{{ route('product.edit', $item->id) }}" class="badge badge-warning">Edit</a>
                                    <a href="{{ route('product.delete', $item->id) }}" class="badge badge-danger" data-confirm-delete="true">Hapus</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">Data Produk Kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@extends('layouts.admin.main')

@section('title', 'Flash Sale')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Flash Sale</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Flash Sale</div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Daftar Produk Flash Sale</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tr>
                            <th>#</th>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Harga Normal</th>
                            <th>Harga Flash Sale</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>

                        @forelse ($products as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <img src="{{ asset('images/' . $item->image) }}" width="70" alt="">
                            </td>

                            <td>{{ $item->name }}</td>

                            <td>{{ number_format($item->price) }} Points</td>

                            <td>
                                @if($item->discount_price)
                                {{ number_format($item->discount_price) }} Points
                                @else
                                -
                                @endif
                            </td>

                            <td>{{ $item->stock }}</td>

                            <td>
                                @if($item->is_flash_sale)
                                <span class="badge badge-success">Aktif</span>
                                @else
                                <span class="badge badge-secondary">Tidak Aktif</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('flashsale.edit', $item->id) }}" class="badge badge-warning">
                                    Edit
                                </a>

                                @if($item->is_flash_sale)
                                <a href="{{ route('flashsale.remove', $item->id) }}" class="badge badge-danger">
                                    Hapus Flash Sale
                                </a>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Data produk kosong</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
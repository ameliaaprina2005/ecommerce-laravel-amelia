@extends('layouts.admin.main')

@section('title', 'Admin History Pembelian')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>History Pembelian</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">History Pembelian</div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Data Pembelian</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Pengguna</th>
                                <th>Nama Produk</th>
                                <th>Total Harga</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->nama_produk }}</td>
                                <td>{{ number_format($item->total_harga) }} Points</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('history.detail', $item->id) }}" class="badge badge-info">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Data Pembelian Kosong</td>
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
@extends('layouts.admin.main')

@section('title', 'Admin Distributor')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Distributor</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Distributor</div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4 col-sm-12">
                <a href="{{ route('distributor.create') }}" class="btn btn-icon icon-left btn-primary">
                    <i class="fas fa-plus"></i> Distributor
                </a>

                <a href="{{ route('distributor.export') }}" class="btn btn-icon icon-left btn-info">
                    <i class="fas fa-print"></i> Export PDF
                </a>
            </div>

            <div class="col-md-8 col-sm-12">
                <form action="{{ route('distributor.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="d-flex align-items-center">
                        <div class="form-group mb-0 mr-2 flex-grow-1">
                            <div class="custom-file">
                                <input class="custom-file-input" name="file" id="customFile" type="file" accept=".xlsx,.xls,.csv" required>
                                <label class="custom-file-label" for="customFile">Pilih File Excel</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-icon icon-left btn-success">
                            <i class="fas fa-file-import"></i> Import
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4>Data Distributor</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Distributor</th>
                                <th>Kota</th>
                                <th>Provinsi</th>
                                <th>Kontak</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($distributor as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_distributor }}</td>
                                <td>{{ $item->kota }}</td>
                                <td>{{ $item->provinsi }}</td>
                                <td>{{ $item->kontak }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <a href="{{ route('distributor.edit', $item->id) }}" class="badge badge-warning">
                                        Edit
                                    </a>

                                    <a href="{{ route('distributor.delete', $item->id) }}" class="badge badge-danger" data-confirm-delete="true">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    Data Distributor Kosong
                                </td>
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
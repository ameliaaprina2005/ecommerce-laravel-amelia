@extends('layouts.admin.main')

@section('title', 'Edit Distributor')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Distributor</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{ route('admin.distributor') }}">Distributor</a>
                </div>
                <div class="breadcrumb-item active">Edit Distributor</div>
            </div>
        </div>

        <div class="card">
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

                <form action="{{ route('distributor.update', $distributor->id) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Nama Distributor</label>
                        <input type="text" name="nama_distributor" class="form-control" value="{{ old('nama_distributor', $distributor->nama_distributor) }}" required>
                    </div>

                    <div class="form-group">
                        <label>Kota</label>
                        <input type="text" name="kota" class="form-control" value="{{ old('kota', $distributor->kota) }}" required>
                    </div>

                    <div class="form-group">
                        <label>Provinsi</label>
                        <input type="text" name="provinsi" class="form-control" value="{{ old('provinsi', $distributor->provinsi) }}" required>
                    </div>

                    <div class="form-group">
                        <label>Kontak</label>
                        <input type="text" name="kontak" class="form-control" value="{{ old('kontak', $distributor->kontak) }}" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $distributor->email) }}" required>
                    </div>

                    <div class="text-right">
                        <a href="{{ route('admin.distributor') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
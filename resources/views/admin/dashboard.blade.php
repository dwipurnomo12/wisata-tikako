@extends('admin.layouts.main')

@section('content')
<div class="content">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="pb-2 fw-bold">Dashboard</h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body bg-secondary text-white">
                        <h3>Anda Login sebagai {{ auth()->user()->role->role }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card bg-primary mb-3">
                    <div class="card-body text-white">
                        <i class="fa fa-bed fa-2x"></i>
                        <h3 class="mt-3">Total Penginapan</h3>
                        <h3>{{ $totalpenginapan }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card bg-success mb-3">
                    <div class="card-body text-white">
                        <i class="fa fa-check fa-2x"></i>
                        <h3 class="mt-3">Reservasi Lunas</h3>
                        <h3>{{ $reservasiLunas }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card bg-warning text-white mb-3">
                    <div class="card-body">
                        <i class="fa fa-solid fa-spinner fa-2x"></i>
                        <h3 class="mt-3">Reservasi Perlu Persetujuan</h3>
                        <h3>{{ $reservasiPending }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-title">Pemesanan Perlu Persetujuan</div>
                            </div>
                            <div class="col-md-6">
                                <a href="/admin/reservasi" class="btn btn-primary float-right">Tinjau Pemesanan</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Pemesanan</th>
                                    <th>Nama Pemesan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pemesananPending as $pemesanan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pemesanan->kd_pemesanan }}</td>
                                        <td>{{ $pemesanan->user->name }}</td>
                                        <td><button class="btn btn-warning">{{ $pemesanan->status }}</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

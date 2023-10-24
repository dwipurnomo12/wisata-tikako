@extends('layouts.main')

@section('content')
<div class="container-fluid bg-primary py-5 mb-5 hero-header">
    <div class="container py-5">
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center pb-4 wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Penginapan</h6>
            <h1 class="mb-5">Rwayat Pemesanan</h1>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($booking->isEmpty())
                    <div class="alert alert-warning" role="alert">
                        Tidak ada riwayat pemesanan penginapan
                    </div>
                @else
                    @foreach ($booking as $item)
                    <div class="card mb-4">
                        <div class="card-header">
                            Detail Pemesanan
                        </div>
                        <div class="card-body">
                            <div class="col-md-4">
                                <p class="text-muted">Nama</p>
                                <h5>{{ auth()->user()->name }}</h5>
                            </div>
                            <div class="col-md-4">
                                <p class="text-muted">Tanggal Mulai</p>
                                <h5>{{ $item->tgl_mulai }}</h5>
                            </div>
                            <div class="col-md-4">
                                <p class="text-muted">Tanggal Selesai</p>
                                <h5>{{ $item->tgl_selesai }}</h5>
                            </div>
                            <div class="col-md-4">
                                <p class="text-muted">Total Harga</p>
                                <h5>Rp. {{ $item->total_harga }}</h5>
                            </div>
                            <div class="col-md-4">
                                <p class="text-muted">Status Pembayaran</p>
                                @if ($item->status == 'pending')
                                    <button class="btn btn-warning">{{ $item->status }}</button>
                                @else
                                    <button class="btn btn-success">{{ $item->status }}</button>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer">
                            <form id="{{ $item->id }}" action="/riwayat-booking/{{ $item->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <div class="btn btn-sm btn-danger my-1 swal-confirm" data-form="{{ $item->id }}">Hapus</div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
        
        
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
                            <table class="table">
                                <tr>
                                    <td>Kode Pemesanan</td>
                                    <td>:</td>
                                    <td>{{ $item->kd_pemesanan }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Pemesan</td>
                                    <td>:</td>
                                    <td>{{ auth()->user()->name }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Mulai</td>
                                    <td>:</td>
                                    <td>{{ $item->tgl_mulai }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Selesai</td>
                                    <td>:</td>
                                    <td>{{ $item->tgl_selesai }}</td>
                                </tr>
                                <tr>
                                    <td>Total Biaya</td>
                                    <td>:</td>
                                    <td>Rp. {{ number_format($item->total_harga, 2, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td>Status Pemesanan</td>
                                    <td>:</td>
                                    <td>
                                        @if ($item->status == 'pending')
                                            <button class="btn btn-warning">{{ $item->status }}</button>
                                        @else
                                            <button class="btn btn-success">{{ $item->status }}</button>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                            
                            <div class="card-footer">
                                <form id="{{ $item->id }}" action="/riwayat-booking/{{ $item->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <div class="btn btn-danger my-1 float-end swal-confirm" data-form="{{ $item->id }}">Hapus</div>
                                </form>
                                <a href="/print-pemesanan/{{ $item->id }}" class="btn btn-success float-end my-1 me-2">Print</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
        
        
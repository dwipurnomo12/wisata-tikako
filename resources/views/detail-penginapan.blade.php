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
            <h1 class="mb-5">Detail Penginapan</h1>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <img class="img-fluid" src="{{ asset('storage/' . $penginapan->gambar) }}" alt="">
            </div>
            <div class="col-lg-6 mt-4">
                <table class="table">
                    <tr>
                        <td>Harga per-malam</td>
                        <td>: </td>
                        <td>Rp. {{ $penginapan->harga }}</td>
                    </tr>
                    <tr>
                        <td>Jumlah kamar</td>
                        <td>: </td>
                        <td>{{ $penginapan->jumlah_kamar }}</td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>: </td>
                        <td>{{ $penginapan->deskripsi }}</td>
                    </tr>
                </table>
                <a href="/booking/{{ $penginapan->id }}" class="btn btn btn-primary mt-3 px-3 float-end">Pesan Sekarang</a>
            </div>
        </div>
    </div>
</div>
@endsection
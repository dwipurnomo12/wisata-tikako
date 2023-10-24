@extends('layouts.main')

@section('content')
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
        </div>
    </div>
    <!-- Process Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center pb-4 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Penginapan</h6>
                <h1 class="mb-5">3 Reservasi Penginapan Mudah</h1>
            </div>
            <div class="row gy-5 gx-4 justify-content-center">
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                            <i class="fa fa-globe fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4">Pilih Tempat Penginapan</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <p class="mb-0">Pilih tempat Penginapan yang sesuai dengan kebutuhan anda dan keluarga. Jangan lupa juga untuk menentukan jumlah harinya</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                            <i class="fa fa-dollar-sign fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4">Pembayaran Online</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <p class="mb-0">Metode Pembayaran online bisa dilakukan dari rumah, kemudian upload bukti pembayaran maka otomatis anda telah melakukan booking penginapan</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                            <i class="fa fa-plane fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4">Datang Sesuai Hari</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <p class="mb-0">Datang ke Tikako sesuai hari yang ditentukan dan jangan lupa bawa bukti reservasi anda. Nikmati keindahan alam wisata Tikako Banjarnegara</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Process End -->

    <!-- Package Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Penginapan</h6>
                <h1 class="mb-5">Reservasi Penginapan</h1>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach ($penginapans as $penginapan)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="package-item">
                            <div class="overflow-hidden" style="max-height: 230px">
                                <img class="img-fluid" src="{{ asset('storage/' . $penginapan->gambar) }}" alt="">
                            </div>
                            <div class="d-flex border-bottom">
                                <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>{{ $penginapan->jumlah_kamar }} Kamar</small>
                            </div>
                            <div class="text-center p-4">
                                <h3 class="mb-0">Rp. {{ $penginapan->harga }}</h3>
                                <div class="mb-3">
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                </div>
                                <p>{{ $penginapan->deskripsi }}</p>
                                <div class="d-flex justify-content-center mb-2">
                                    <a href="/detail-penginapan/{{ $penginapan->id }}" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Selengkapnya</a>
                                    <a href="/booking/{{ $penginapan->id }}" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Pesan Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Package End -->
@endsection
@extends('layouts.main')

@section('content')
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5"> 
        </div>
    </div>
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Layanan</h6>
                <h1 class="mb-5">Layanan Wisata Tikako</h1>
            </div>
            <div class="row g-4">
                @foreach ($fasilitases as $fasilitas)
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-check text-primary mb-4"></i>
                            <h5>{{ $fasilitas->fasilitas }}</h5>
                            <p>{{ $fasilitas->deskripsi }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->
@endsection
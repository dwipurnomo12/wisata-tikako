@extends('layouts.main')

@section('content')
<div class="container-fluid bg-primary py-5 mb-5 hero-header">
    <div class="container py-5">
    </div>
</div>
<!-- Destination Start -->
<div class="container-xxl py-5 destination">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Wisata</h6>
            <h1 class="mb-5">Wisata Populer Di Tikako</h1>
        </div>
        <div class="row">
            @foreach ($wisatas as $wisata)
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <a class="position-relative d-block overflow-hidden">
                        <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">{{ $wisata->wisata }}</div>
                        <img class="img-fluid" src="{{ asset('storage/'. $wisata->gambar) }}" alt="">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
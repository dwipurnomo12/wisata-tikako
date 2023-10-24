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
            <h1 class="mb-5">Booking Penginapan</h1>
        </div>

        <div class="row">
            <div class="col-lg-8 mx-auto">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @auth
                    <form method="POST" action="/booking/{{ $penginapan->id }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $penginapan->id }}" name="penginapan_id">
                        <input type="hidden" id="harga" value="{{ $penginapan->harga }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tgl_mulai" class="form-label">Tanggal Mulai<span style="color: red">*</span></label>
                                    <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" >
                                    @error('tgl_mulai')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tgl_selesai" class="form-label">Tanggal Selesai<span style="color: red">*</span></label>
                                    <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" >
                                    @error('tgl_selesai')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <label for="total_harga" class="form-label">Total Harga</label><br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                            <input type="text" class="form-control" name="total_harga" id="total_harga" readonly>
                        </div>
                        <div class="mb-">
                            <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran <span style="color: red">*</span></label>
                            <input type="file" class="form-control @error('bukti_pembayaran') is-invalid @enderror" name="bukti_pembayaran" onchange="previewImage()">
                            <img src="" class="img-preview img-fluid mb-3 mt-2" id="preview" style="max-height: 250px; overflow:hidden; border: 1px solid black;">
                            @error('bukti_pembayaran')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <span style="color: red">*</span> Artinya wajib di isi !
                        <button type="submit" class="btn btn-success float-end">Booking Sekarang</button>
                    </form>
                @else
                    <div class="alert alert-warning" role="alert">
                        Upss.. Anda harus Login/Register terlebih dahulu !
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        function calculateTotal() {
            var hargaPerHari    = parseFloat($("#harga").val());
            var tglMulai        = $("#tgl_mulai").val();
            var tglSelesai      = $("#tgl_selesai").val();

            if (tglMulai && tglSelesai) {
                var dateMulai   = new Date(tglMulai);
                var dateSelesai = new Date(tglSelesai);
                var selisihHari = (dateSelesai - dateMulai) / (1000 * 60 * 60 * 24);
                var totalHarga  = hargaPerHari * selisihHari;

                if (!isNaN(totalHarga)) {
                    $("#total_harga").val(totalHarga);
                }
            }
        }

        $("#tgl_mulai, #tgl_selesai").on("change", calculateTotal);

        calculateTotal();
    });
</script>
<script>
    function previewImage(){
        preview.src=URL.createObjectURL(event.target.files[0]);
    }
</script>
@endsection
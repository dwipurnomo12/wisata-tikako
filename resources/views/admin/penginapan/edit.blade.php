@extends('admin.layouts.main')

@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Edit Penginapan</h4>
            <a href="/admin/penginapan" class="btn btn-primary ml-auto">Kembali</a>
        </div>

        <div class="row">
            <div class="col-lg-12">
               <div class="card">
                    <div class="card-header">
                        Penginapan
                    </div>
                    <div class="card-body">
                        @if (session()->has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form method="POST" action="/admin/penginapan/{{ $penginapan->id }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                        
                            <div class="mb-">
                                <label for="gambar" class="form-label @error('gambar') is-invalid @enderror">Gambar</label>
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" onchange="previewImage()">
                                @if($penginapan->gambar)
                                    <img src="{{ asset('storage/' . $penginapan->gambar) }}" class="img-preview img-fluid mb-3 mt-2" id="preview" style="max-height: 500px; overflow:hidden; border: 1px solid black;">
                                @else
                                    <img src="" class="img-preview img-fluid mb-3 mt-2" id="preview" style="max-height: 250px; overflow:hidden; border: 1px solid black;">
                                @endif
                                @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="harga">Harga Per-Malam</label>
                                <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga', $penginapan->harga) }}" required>
                                @error('harga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="jumlah_kamar">Jumlah Kamar</label>
                                <input type="number" class="form-control @error('jumlah_kamar') is-invalid @enderror" name="jumlah_kamar" value="{{ old('jumlah_kamar', $penginapan->jumlah_kamar) }}" required>
                                @error('jumlah_kamar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" cols="30" rows="10" required>{{ old('deskripsi', $penginapan->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <button type="submit" class="btn btn-success float-right">Update</button>
                        </form>                        
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(){
        preview.src=URL.createObjectURL(event.target.files[0]);
    }
</script>
@endsection
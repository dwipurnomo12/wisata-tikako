@extends('admin.layouts.main')

@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Tambah Wisata</h4>
            <a href="/admin/wisata" class="btn btn-primary ml-auto">Kembali</a>
        </div>

        <div class="row">
            <div class="col-lg-12">
               <div class="card">
                    <div class="card-header">
                        Wisata
                    </div>
                    <div class="card-body">
                        @if (session()->has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form method="POST" action="/admin/wisata" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-">
                                <label for="gambar" class="form-label">Gambar</label>
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" onchange="previewImage()" required>
                                <img src="" class="img-preview img-fluid mb-3 mt-2" id="preview" style="max-height: 250px; overflow:hidden; border: 1px solid black;">
                            </div>
                            <div class="mb-3">
                                <label for="wisata">Wisata</label>
                                <input type="text" class="form-control @error('wisata') is-invalid @enderror" name="wisata" required>
                            </div>
                            <button type="submit" class="btn btn-success float-right">Simpan</button>
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
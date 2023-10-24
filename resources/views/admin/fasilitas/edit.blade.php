@extends('admin.layouts.main')

@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Edit Fasilitas</h4>
            <a href="/admin/fasilitas" class="btn btn-primary ml-auto">Kembali</a>
        </div>

        <div class="row">
            <div class="col-lg-12">
               <div class="card">
                    <div class="card-header">
                        Fasilitas
                    </div>
                    <div class="card-body">
                        @if (session()->has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form method="POST" action="/admin/fasilitas/{{ $fasilitas->id }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="fasilitas">Nama Fasilitas</label>
                                <input type="text" class="form-control" name="fasilitas" value="{{ old('fasilitas', $fasilitas->fasilitas) }}" required>
                            </div>
                            <div class="mb-">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10">{{ old('deskripsi', $fasilitas->deskripsi) }}</textarea>
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
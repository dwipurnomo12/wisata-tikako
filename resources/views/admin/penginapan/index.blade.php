@extends('admin.layouts.main')

@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Penginapan</h4>
            <a class="btn btn-primary ml-auto" href="/admin/penginapan/create" role="button">Tambah penginapan</a>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar penginapan</h4>
                    </div>
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive"> 
                            <table id="table_id" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Harga</th>
                                        <th>Jumlah Kamar</th>
                                        <th>Deskripsi</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penginapans as $penginapan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ asset('storage/'. $penginapan->gambar) }}" alt="penginapan" style="width: 150px"; height="150px"></td>
                                            <td>Rp. {{ $penginapan->harga }}</td>
                                            <td>{{ $penginapan->jumlah_kamar }}</td>
                                            <td>{{ $penginapan->deskripsi }}</td>
                                            <td>
                                                <a href="/admin/penginapan/{{ $penginapan->id }}/edit" class="btn btn-icon btn-warning pt-2">
                                                    <i class="fas fa-edit align-items-center"></i>
                                                </a>
                                                <form id="{{ $penginapan->id }}" action="/admin/penginapan/{{ $penginapan->id }}" method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <div class="btn btn-sm btn-danger my-1 swal-confirm" data-form="{{ $penginapan->id }}"><i class="fa fa-trash align-items-center pt-2"></i></div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    });
</script>

@endsection
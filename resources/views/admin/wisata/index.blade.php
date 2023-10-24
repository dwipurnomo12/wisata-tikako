@extends('admin.layouts.main')

@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Wisata</h4>
            <a class="btn btn-primary ml-auto" href="/admin/wisata/create" role="button">Tambah wisata</a>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar wisata</h4>
                    </div>
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table id="table_id" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>No</th>   
                                        <th>Foto</th>  
                                        <th>wisata</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wisatas as $wisata)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ asset('storage/'. $wisata->gambar) }}" alt="wisata" style="width: 150px"; height="150px"></td>
                                            <td>{{ $wisata->wisata }}</td>
                                            <td>
                                                <a href="/admin/wisata/{{ $wisata->id }}/edit" class="btn btn-icon btn-warning">
                                                    <i class="fas fa-edit align-items-center pt-2"></i>
                                                </a>
                                                <form id="{{ $wisata->id }}" action="/admin/wisata/{{ $wisata->id }}" method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <div class="btn btn-sm btn-danger my-1 swal-confirm" data-form="{{ $wisata->id }}"><i class="fa fa-trash align-items-center pt-2"></i></div>
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
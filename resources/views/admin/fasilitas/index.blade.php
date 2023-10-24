@extends('admin.layouts.main')

@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Fasilitas</h4>
            <a class="btn btn-primary ml-auto" href="/admin/fasilitas/create" role="button">Tambah Fasilitas</a>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Fasilitas</h4>
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
                                        <th>Fasilitas</th>
                                        <th>Deskripsi</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fasilitases as $fasilitas)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $fasilitas->fasilitas }}</td>
                                            <td>{{ $fasilitas->deskripsi }}</td>
                                            <td>
                                                <a href="/admin/fasilitas/{{ $fasilitas->id }}/edit" class="btn btn-icon btn-warning">
                                                    <i class="fas fa-edit align-items-center pt-2"></i>
                                                </a>
                                                <form id="{{ $fasilitas->id }}" action="/admin/fasilitas/{{ $fasilitas->id }}" method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <div class="btn btn-sm btn-danger my-1 swal-confirm" data-form="{{ $fasilitas->id }}"><i class="fa fa-trash align-items-center pt-2"></i></div>
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
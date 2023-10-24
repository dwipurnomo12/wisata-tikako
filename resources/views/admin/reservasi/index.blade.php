@extends('admin.layouts.main')

@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Booking Penginapan</h4>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Reservasi Masuk</h4>
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
                                        <th>Nama</th>
                                        <th>Tgl. Mulai</th>
                                        <th>Tgl. Selesai</th>
                                        <th>Total Biaya</th>
                                        <th>Status</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Konfirmasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservasis as $reservasi)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $reservasi->user->name }}</td>
                                            <td>{{ $reservasi->tgl_mulai }}</td>
                                            <td>{{ $reservasi->tgl_selesai }}</td>
                                            <td>Rp. {{ $reservasi->total_harga }}</td>
                                            <td>
                                                @if ($reservasi->status == 'pending')
                                                    <button class="btn btn-warning">{{ $reservasi->status }}</button>
                                                @else
                                                    <button class="btn btn-success">{{ $reservasi->status }}</button>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#gambarModal">
                                                    <img src="{{ asset('storage/' . $reservasi->bukti_pembayaran) }}" alt="bukti pembayaran" style="width: 150px; height: 150px">
                                                </a>
                                            </td>
                                           <!-- Modal -->
                                            <div class="modal fade" id="gambarModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Bukti Pembayaran</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="{{ asset('storage/' . $reservasi->bukti_pembayaran) }}" alt="bukti pembayaran" style="max-width: 100%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                           <td>
                                                <a href="/admin/reservasi/{{ $reservasi->id }}/konfirmasi" class="btn btn-success pt-2">
                                                    Konfirmasi
                                                </a>
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
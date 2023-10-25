<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Pemesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .status-button {
            padding: 6px 12px;
            border: none;
            border-radius: 3px;
            color: white;
            font-weight: bold;
        }
        .btn-warning {
            background-color: #ffc107;
        }
        .btn-success {
            background-color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="text-align: center">Bukti Pemesanan</h1>
        <table>
            <tr>
                <td>Kode Pemesanan</td>
                <td>:</td>
                <td>{{ $data->kd_pemesanan }}</td>
            </tr>
            <tr>
                <td>Nama Pemesan</td>
                <td>:</td>
                <td>{{ auth()->user()->name }}</td>
            </tr>
            <tr>
                <td>Tanggal Mulai</td>
                <td>:</td>
                <td>{{ $data->tgl_mulai }}</td>
            </tr>
            <tr>
                <td>Tanggal Selesai</td>
                <td>:</td>
                <td>{{ $data->tgl_selesai }}</td>
            </tr>
            <tr>
                <td>Total Biaya</td>
                <td>:</td>
                <td>Rp. {{ number_format($data->total_harga, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Status Pemesanan</td>
                <td>:</td>
                <td>
                    @if ($data->status == 'pending')
                        <button class="status-button btn-warning">{{ $data->status }}</button>
                    @else
                        <button class="status-button btn-success">{{ $data->status }}</button>
                    @endif
                </td>
            </tr>
        </table>
    </div>
</body>
</html>

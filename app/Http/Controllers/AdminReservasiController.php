<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class AdminReservasiController extends Controller
{
    public function index()
    {
        $reservasi = Booking::with('user')
            ->orderBy('created_at', 'DESC')->get();
        return view('admin.reservasi.index', [
            'reservasis'    => $reservasi
        ]);
    }

    public function konfirmasi($id)
    {
        $reservasi = Booking::find($id);

        $reservasi->status = 'lunas';
        $reservasi->save();
        return redirect()->back()->with('success', 'Reservasi telah dikonfirmasi.');
    }
}

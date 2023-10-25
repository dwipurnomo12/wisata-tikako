<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Barryvdh\DomPDF\Facade\pdf as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RiwayatBookingController extends Controller
{
    public function riwayat()
    {
        $booking = Booking::where('user_id', auth()->user()->id)->get();
        return view('riwayat-booking', [
            'booking'   => $booking
        ]);
    }

    public function print($id)
    {
        $printPemesanan = Booking::find($id);
        $pdf = PDF::loadView('print-pemesanan', [
            'data'      => $printPemesanan
        ]);

        return $pdf->stream('print-pemesanan.pdf');
    }

    public function delete($id)
    {
        Booking::find($id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data riwayat pemesanan');
    }
}

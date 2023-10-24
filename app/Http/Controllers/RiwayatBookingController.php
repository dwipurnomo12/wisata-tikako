<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class RiwayatBookingController extends Controller
{
    public function riwayat()
    {
        $booking = Booking::where('user_id', auth()->user()->id)->get();
        return view('riwayat-booking', [
            'booking'   => $booking
        ]);
    }

    public function delete($id)
    {
        Booking::find($id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data riwayat pemesanan');
    }
}

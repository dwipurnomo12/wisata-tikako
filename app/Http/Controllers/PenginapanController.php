<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Penginapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenginapanController extends Controller
{
    public function penginapan()
    {
        return view('penginapan', [
            'penginapans'   => Penginapan::orderBy('id', 'DESC')->get()
        ]);
    }

    public function detail($id)
    {
        $penginapan = Penginapan::find($id);
        return view('detail-penginapan', [
            'penginapan'    => $penginapan
        ]);
    }

    public function booking($id)
    {
        $penginapan = Penginapan::find($id);
        return view('booking', [
            'penginapan'    => $penginapan,
        ]);
    }

    public function bookingNow(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tgl_mulai'         => 'required',
            'tgl_selesai'       => 'required',
            'total_harga'       => 'required',
            'penginapan_id'     => 'required',
            'bukti_pembayaran'  => 'required|mimetypes:image/jpeg,image/png', 
        ], [
            'tgl_mulai.required'        => 'Form ini wajib diisi !',
            'tgl_selesai.required'      => 'Form ini wajib diisi !',
            'total_harga.required'      => 'Form ini wajib diisi !',
            'penginapan_id.required'    => 'Form ini wajib diisi !',
            'bukti_pembayaran.required' => 'Form ini wajib diisi !',
            'bukti_pembayaran.mimetypes' => 'Gunakan format yang diijinkan yaitu jpg, jpeg, png !',
        ]);

        $kd_pemesanan = 'QJDE-' . str_pad(rand(1,999999), 6, '0', STR_PAD_LEFT);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public/bukti-pembayaran', $fileName);
    
            Booking::create([
                'kd_pemesanan'      => $kd_pemesanan,
                'bukti_pembayaran'  => 'bukti-pembayaran/' . $fileName, 
                'tgl_mulai'         => $request->tgl_mulai,
                'tgl_selesai'       => $request->tgl_selesai,
                'total_harga'       => $request->total_harga,
                'penginapan_id'     => $request->penginapan_id,
                'user_id'           => auth()->user()->id,
            ]);
    
            return redirect()->back()->with('success', 'Berhasil memesan penginapan baru');
        } else {
            return back()->with('error', 'Gagal menyimpan bukti pembayaran');
        }
    }
    
    
}

<?php

namespace App\Http\Controllers;

use App\Models\Penginapan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminPenginapanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.penginapan.index', [
            'penginapans'   => Penginapan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.penginapan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'harga'         => 'required',
            'gambar'        => 'required|mimes:jpeg,png,jpg',
            'jumlah_kamar'  => 'required',
            'deskripsi'     => 'required'
        ], [
            'harga.required'        => 'Form wajib diisi !',
            'gambar.required'       => 'Form wajib diisi !',
            'gambar.mimes'          => 'Gunakan format gambar jpeg,png,jpg',
            'jumlah_kamar.required' => 'Form wajib diisi !',
            'deskripsi.required'    => 'Form wajib diisi !'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public/gambar-penginapan', $fileName); 
    
            Penginapan::create([
                'gambar'        => 'gambar-penginapan/' . $fileName, 
                'harga'         => $request->harga,
                'jumlah_kamar'  => $request->jumlah_kamar,
                'deskripsi'     => $request->deskripsi
            ]);
    
            return redirect('/admin/penginapan')->with('success', 'Berhasil menambahkan penginapan baru');
        } else {
            return back()->with('error', 'Gagal menyimpan gambar');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penginapan = Penginapan::find($id);
        return view('admin.penginapan.edit', [
            'penginapan' => $penginapan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $penginapan = Penginapan::find($id);
        $validator = Validator::make($request->all(), [
            'harga'         => 'required',
            'gambar'        => 'mimes:jpeg,png,jpg',
            'jumlah_kamar'  => 'required',
            'deskripsi'     => 'required'
        ], [
            'harga.required'        => 'Form wajib diisi !',
            'gambar.required'       => 'Form wajib diisi !',
            'gambar.mimes'          => 'Gunakan format gambar jpeg,png,jpg',
            'jumlah_kamar.required' => 'Form wajib diisi !',
            'deskripsi.required'    => 'Form wajib diisi !'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $penginapan->harga          = $request->harga;
        $penginapan->jumlah_kamar   = $request->jumlah_kamar;
        $penginapan->deskripsi      = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public/gambar-penginapan', $fileName);
            $penginapan->gambar = 'gambar-penginapan/' . $fileName;
        }
    
        $penginapan->save();
        return redirect('/admin/penginapan')->with('success', 'penginapan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Penginapan::find($id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data penginapan !');
    }
}

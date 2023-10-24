<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminFasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.fasilitas.index', [
            'fasilitases'   => Fasilitas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fasilitas'     => 'required',
            'deskripsi'     => 'required'
        ], [
            'fasilitas.required'    => 'Form wajib diisi !',
            'deskripsi.required'    => 'Form wajib diisi !',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        Fasilitas::create([
            'fasilitas'     => $request->fasilitas,
            'deskripsi'     => $request->deskripsi
        ]);

        return redirect('/admin/fasilitas')->with('success', 'Berhasil menambahkan fasilitas baru');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $fasilitas = Fasilitas::find($id);
        return view('admin.fasilitas.edit', [
            'fasilitas' => $fasilitas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $fasilitas = Fasilitas::find($id);
        $validator = Validator::make($request->all(), [
            'fasilitas' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg', // Validasi gambar (opsional)
        ], [
            'fasilitas.required' => 'Form wajib diisi !',
            'gambar.image' => 'Harus berupa gambar.',
            'gambar.mimes' => 'Gunakan format gambar jpeg, png, jpg',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        $fasilitas->update([
            'fasilitas'     => $request->fasilitas,
            'deskripsi'     => $request->deskripsi
        ]);

        return redirect('/admin/fasilitas')->with('success', 'Fasilitas berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Fasilitas::find($id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data fasilitas !');
    }
}

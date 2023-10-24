<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.wisata.index', [
            'wisatas'   => Wisata::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.wisata.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'wisata'         => 'required',
            'gambar'         => 'required|mimes:jpeg,png,jpg',
        ], [
            'wisata.required'        => 'Form wajib diisi !',
            'gambar.required'       => 'Form wajib diisi !',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public/gambar-wisata', $fileName); 
    
            Wisata::create([
                'gambar'        => 'gambar-wisata/' . $fileName, 
                'wisata'        => $request->wisata,
            ]);
    
            return redirect('/admin/wisata')->with('success', 'Berhasil menambahkan wisata baru');
        } else {
            return back()->with('error', 'Gagal menyimpan gambar');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $wisata = Wisata::find($id);
        return view('admin.wisata.edit', [
            'wisata'    => $wisata
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $wisata = Wisata::find($id);
        $validator  = Validator::make($request->all(), [
            'wisata'        => 'required',
            'gambar'        => 'mimes:jpeg,png,jpg',
        ], [
            'wisata.required'       => 'Form wajib diisi !',
            'gambar.required'       => 'Form wajib diisi !',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $wisata->wisata          = $request->wisata;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public/gambar-wisata', $fileName);
            $wisata->gambar = 'gambar-wisata/' . $fileName;
        }
    
        $wisata->save();
        return redirect('/admin/wisata')->with('success', 'wisata berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Wisata::find($id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data wisata !');
    }
}

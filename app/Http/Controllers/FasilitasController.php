<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function fasilitas()
    {
        return view('fasilitas', [
            'fasilitases'     => Fasilitas::all()
        ]);
    }
}

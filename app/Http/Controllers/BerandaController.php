<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\Fasilitas;
use App\Models\Penginapan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BerandaController extends Controller
{
    public function index()
    {
        return view('/index', [
            'fasilitas'     => Fasilitas::take(3)->get(),
            'wisata'        => Wisata::take(3)->get(),
            'penginapan'    => Penginapan::take(3)->get()
        ]);
    }
}

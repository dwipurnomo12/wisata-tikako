<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Wisata;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        return view('/index', [
            'fasilitas'     => Fasilitas::take(3)->get(),
            'wisata'        => Wisata::take(3)->get()
        ]);
    }
}

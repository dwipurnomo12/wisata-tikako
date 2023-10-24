<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WisataController extends Controller
{
    public function wisata()
    {
        return view('wisata', [
            'wisatas'   => Wisata::all()
        ]);
    }
}

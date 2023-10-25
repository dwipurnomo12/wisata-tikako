<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Penginapan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard', [
            'totalpenginapan'   => Penginapan::count(),
            'reservasiLunas'    => Booking::where('status', 'lunas')->count(),
            'reservasiPending'  => Booking::where('status', 'pending')->count(),
            'pemesananPending'  => Booking::where('status', 'pending')->orderBy('id', 'DESC')->get()
        ]);
    }
}

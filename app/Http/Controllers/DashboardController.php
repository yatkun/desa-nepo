<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Layanan;
use App\Models\Pengumuman;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $berita = Berita::all()->count();
        $pengumuman = Pengumuman::all()->count();
        $layanan = Layanan::all()->count();
        $admin = User::all()->count();
        return view('dashboard.index',compact('berita','pengumuman','layanan','admin'),[
            'title' => 'Dashboard'
        ]);
    }
}

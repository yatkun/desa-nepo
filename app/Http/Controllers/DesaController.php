<?php

namespace App\Http\Controllers;

use App\Models\Aparatur;
use App\Models\Berita;
use App\Models\Identitas;
use App\Models\Layanan;
use App\Models\Pengumuman;
use App\Models\Sejarah;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    public function index()
    {
        $baru = Berita::latest()->first();
        $pengumuman = Pengumuman::latest()->paginate(6);
        $identitas = Identitas::latest()->first();
        $aparatur = Aparatur::all();
        if($baru){
            $berita = Berita::latest()
            ->where('id', '<>', $baru->id)
            ->paginate(6);
            return view('desa.index', compact('baru', 'berita','pengumuman', 'identitas','aparatur'));
        }
        return view('desa.index', compact('baru','pengumuman', 'identitas','aparatur'));
        
    }

    public function layanan()
    {
        
        $aparatur = Aparatur::all();
        $layanan = Layanan::all();
        $identitas = Identitas::latest()->first();
        $pengumuman = Pengumuman::latest()->paginate(6);
        return view('desa.layanan', compact('pengumuman','identitas','aparatur','layanan'));
    }

    public function dokumentasi()
    {
        
        $aparatur = Aparatur::all();
        $layanan = Layanan::all();
        $identitas = Identitas::latest()->first();
        $pengumuman = Pengumuman::latest()->paginate(6);
        return view('desa.dokumentasi', compact('pengumuman','identitas','aparatur','layanan'));
    }

    public function sejarah()
    {
       
        $aparatur = Aparatur::all();
        $identitas = Identitas::latest()->first();
        $pengumuman = Pengumuman::latest()->paginate(6);
        $sejarah = Sejarah::latest()->first();
        return view('desa.sejarah', compact('pengumuman','identitas','sejarah','aparatur'));
    }

    public function pengumuman($slug)
    {
      
        $aparatur = Aparatur::all();
        $identitas = Identitas::latest()->first();
        $pengumuman = Pengumuman::latest()->paginate(6);
        $post = Pengumuman::where('slug', $slug)->firstOrFail();
        $sejarah = Sejarah::latest()->first();
        return view('desa.pengumuman', compact('pengumuman','identitas','sejarah','post','aparatur'));
    }

}

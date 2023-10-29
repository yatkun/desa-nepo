<?php

namespace App\Http\Controllers;

use App\Models\Aparatur;
use App\Models\Visimisi;
use App\Models\Identitas;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class VisimisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visiMisiDesa = Visimisi::first();
        return view('profil.visimisi', compact('visiMisiDesa'),[
            'title' => 'Visi Misi',
        ]);
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'visi' => 'required',
            'misi' => 'required',
        ],
        [
            'visi.required' => 'Visi harus diisi !',
            'misi.required' => 'Misi harus diisi !'
        ]
        );

        $visiMisiDesa = Visimisi::first();

        if ($visiMisiDesa) {
            // Jika data sudah ada, perbarui data yang ada
            $visiMisiDesa->update($data);
        } else {
            // Jika data belum ada, buat data baru
            Visimisi::create($data);
        }

        return redirect()->route('visimisi')->with(['success' => 'Visi Misi Berhasil Diperbaharui!']);;

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        
        $aparatur = Aparatur::all();
        $identitas = Identitas::latest()->first();
        $post = Visimisi::first();
        $pengumuman = Pengumuman::latest()->take(6)->get();
        // You can pass the $post variable to a view or return it as JSON, depending on your needs.
        return view('desa.visi', compact('post', 'pengumuman','identitas','aparatur'), [
            'title' => 'Visi Misi',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visimisi $visimisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visimisi $visimisi)
    {
        //
    }
}

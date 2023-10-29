<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
use Illuminate\Http\Request;

class SejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sejarah = Sejarah::first();
        return view('profil.sejarah', compact('sejarah'),[
            'title' => 'Sejarah',
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
            'sejarah' => 'required',
          
        ],
        [
            'sejarah.required' => 'Sejarah harus diisi !',
            'misi.required' => 'Misi harus diisi !'
        ]
        );

        $sejarah = Sejarah::first();

        if ($sejarah) {
            // Jika data sudah ada, perbarui data yang ada
            $sejarah->update($data);
        } else {
            // Jika data belum ada, buat data baru
            Sejarah::create($data);
        }

        return redirect()->route('sejarah')->with(['success' => 'Sejarah Berhasil Diperbaharui!']);;

    }

    /**
     * Display the specified resource.
     */
    public function show(Sejarah $sejarah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sejarah $sejarah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sejarah $sejarah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sejarah $sejarah)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Identitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IdentitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $identitas = Identitas::first();
        return view('identitas.index', compact('identitas'),[
            'title' => 'Identitas',
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
            'namadesa' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'nohp' => 'nullable',
            'email' => 'nullable',
            'kodepos' => 'nullable',
            'logo' => 'nullable',
        ],
        [
            'namadesa.required' => 'Nama desa harus diisi !',
            'kecamatan.required' => 'Nama kecamatan harus diisi !',
            'kabupaten.required' => 'Nama kabupaten harus diisi !'
        ]
        );
      
        $identitas = Identitas::first();

        if ($identitas) {
            // Jika data sudah ada, perbarui data yang ada
            if ($request->file('logo')) {
                if ($identitas->logo) {
                    Storage::disk('public')->delete($identitas->logo);
                    // Storage::disk('s3')->delete($identitas->logo);
                }
                $data['logo'] = $request->file('logo')->store('image', 'public');
            }
            $identitas->update($data);
            
        } else {
            // Jika data belum ada, buat data baru
            if ($request->file('logo')) {
                $data['logo'] = $request->file('logo')->store('image', 'public');
            }
            Identitas::create($data);
        }

        return redirect()->route('identitas')->with(['success' => 'Identitas Berhasil Diperbaharui!']);;

    }

    /**
     * Display the specified resource.
     */
    public function show(Identitas $identitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Identitas $identitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Identitas $identitas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Identitas $identitas)
    {
        //
    }
}

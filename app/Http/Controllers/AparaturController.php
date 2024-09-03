<?php

namespace App\Http\Controllers;

use App\Models\Aparatur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AparaturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Aparatur::all();

        return view('aparatur.index', compact('post'), [
            'title' => 'Aparatur Desa',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aparatur.tambah', [
            'title' => 'Tambah Aparatur',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'required|image|file|max:7048'
        ],[
            'nama.required' => 'Nama harus diisi !',
            'jabatan.required' => 'Jabatan harus diisi !',
            'foto.required' => 'Foto harus dimasukkan !',
            
        ]);

        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('aparatur-desa','public');
        }

        Aparatur::create($validatedData);

        return redirect()->route('aparatur')->with('success', 'Aparatur berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aparatur $aparatur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //get post by ID
        $post = Aparatur::findOrFail($id);

        //render view with post
        return view('aparatur.edit', compact('post'), [
            'title' => 'Edit Aparatur',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //validate form
        $validatedData = $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'image|file|max:2048'
        ]);

        //get post by ID
        $post = Aparatur::findOrFail($id);

        if($request->file('foto')){
            if ($post->foto) {
                Storage::disk('public')->delete($post->foto);
                // Storage::disk('s3')->delete($identitas->logo);
            }
            $validatedData['foto'] = $request->file('foto')->store('aparatur-desa','public');
        }
        $post->update($validatedData);
        //redirect to index
        return redirect()->route('aparatur')->with('success', 'Aparatur berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //get post by ID
        $post = Aparatur::findOrFail($id);

        //delete image
        // Storage::delete('public/posts/'. $post->image);

        if ($post->foto) {
            Storage::disk('public')->delete($post->foto);
        }


        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('aparatur')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

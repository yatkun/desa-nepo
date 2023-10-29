<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokumentasi = Dokumentasi::latest()->get();

        return view('dokumentasi.index', compact('dokumentasi'), [
            'title' => 'Daftar Dokumentasi',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dokumentasi.tambah', [
            'title' => 'Tambah Dokumentasi',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'gambar' => 'image|file|max:3072'
        ], [
            'judul.required' => 'Judul harus diisi !',
            'judul.max' => 'Judul terlalu panjang !',
            'gambar.max' => 'Ukuran gambar maksimal 3mb !'
        ]);

        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('dokumentasi', 'public');
        }

        Dokumentasi::create($validatedData);

        return redirect()->route('dokumentasi')->with('success', 'Dokumentasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dokumentasi $dokumentasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //get post by ID
        $post = Dokumentasi::findOrFail($id);

        //render view with post
        return view('dokumentasi.edit', compact('post'), [
            'title' => 'Edit Dokumentasi',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'gambar' => 'image|file|max:3072'
        ], [
            'judul.required' => 'Judul harus diisi !',
            'judul.max' => 'Judul terlalu panjang !',
            'gambar.max' => 'Ukuran gambar maksimal 3mb !'
        ]);

        //get post by ID
        $post = Dokumentasi::findOrFail($id);

        if ($request->file('gambar')) {
            if ($post->gambar) {
                Storage::disk('public')->delete($post->gambar);
                // Storage::disk('s3')->delete($identitas->logo);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('dokumentasi', 'public');
        }
        $post->update($validatedData);
        //redirect to index
        return redirect()->route('dokumentasi')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //get post by ID
        $post = Dokumentasi::findOrFail($id);

        //delete image
        // Storage::delete('public/posts/'. $post->image);

        if ($post->gambar) {
            Storage::disk('public')->delete($post->gambar);
        }
        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('dokumentasi')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

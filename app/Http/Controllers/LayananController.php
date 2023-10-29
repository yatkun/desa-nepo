<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanan = Layanan::latest()->get();

        return view('layanan.index', compact('layanan'), [
            'title' => 'Daftar Layanan',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layanan.tambah', [
            'title' => 'Tambah Layanan',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Layanan::class, 'slug', $request->judul);

        return response()->json(['slug' => $slug]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'slug' => 'required|unique:layanans',
            'isi' => 'required',
            'gambar' => 'image|file|max:3072'
        ], [
            'judul.required' => 'Judul harus diisi !',
            'judul.max' => 'Judul terlalu panjang !',
            'slug.unique' => 'Slug telah digunakan !',
            'isi.required' => 'Isi berita harus diisi !',
            'gambar.max' => 'Ukuran gambar maksimal 3mb !'
        ]);

        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('layanan', 'public');
        }

        Layanan::create($validatedData);

        return redirect()->route('layanan')->with('success', 'Layanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Layanan $layanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //get post by ID
        $post = Layanan::findOrFail($id);

        //render view with post
        return view('layanan.edit', compact('post'), [
            'title' => 'Edit Layanan',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //validate form
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'slug' => 'required',
            'isi' => 'required',
            'gambar' => 'image|file|max:3072'
        ], [
            'judul.required' => 'Judul harus diisi !',
            'judul.max' => 'Judul terlalu panjang !',
            'slug.required' => 'Slug harus diisi !',
            'isi.required' => 'Isi berita harus diisi !',
            'gambar.max' => 'Ukuran gambar maksimal 3mb !'
        ]);

        //get post by ID
        $post = Layanan::findOrFail($id);

        if ($request->file('gambar')) {
            if ($post->gambar) {
                Storage::disk('public')->delete($post->gambar);
                // Storage::disk('s3')->delete($identitas->logo);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('layanan', 'public');
        }
        $post->update($validatedData);
        //redirect to index
        return redirect()->route('layanan')->with(['success' => 'Data Berhasil Diubah!']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //get post by ID
        $post = Layanan::findOrFail($id);

        //delete image
        // Storage::delete('public/posts/'. $post->image);

        if ($post->gambar) {
            Storage::disk('public')->delete($post->gambar);
        }
        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('layanan')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Aparatur;
use App\Models\Berita;
use App\Models\Identitas;
use App\Models\Pengumuman;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::latest()->get();

        return view('berita.index', compact('berita'), [
            'title' => 'Daftar Berita',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('berita.tambah', [
            'title' => 'Tambah Berita',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'slug' => 'required|unique:beritas',
            'isi' => 'required',
            'gambar' => 'image|file|max:3072'
        ], [
            'judul.required' => 'Judul harus diisi !',
            'judul.max' => 'Judul terlalu panjang !',
            'slug.unique' => 'Slug telah digunakan !',
            'isi.required' => 'Isi berita harus diisi !',
            'gambar.max' => 'Ukuran gambar maksimal 1mb !'
        ]);

        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('post-images', 'public');
        }

        $validatedData['user_id'] = auth()->user()->id;
        Berita::create($validatedData);

        return redirect()->route('berita')->with('success', 'Berita berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {

        $post = Berita::where('slug', $slug)->firstOrFail();
        $identitas = Identitas::latest()->first();
        $aparatur = Aparatur::all();
        $pengumuman = Pengumuman::latest()->take(6)->get();
        // You can pass the $post variable to a view or return it as JSON, depending on your needs.
        return view('desa.detail_berita', compact('post', 'pengumuman', 'identitas','aparatur'), [

            'title' => 'Berita',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //get post by ID
        $post = Berita::findOrFail($id);

        //render view with post
        return view('berita.edit', compact('post'), [
            'title' => 'Edit Berita',
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
            'gambar' => 'image|file|max:1024'
        ], [
            'judul.required' => 'Judul harus diisi !',
            'judul.max' => 'Judul terlalu panjang !',
            'slug.required' => 'Slug harus diisi !',
            'isi.required' => 'Isi berita harus diisi !',
            'gambar.max' => 'Ukuran gambar maksimal 1mb !'
        ]);

        //get post by ID
        $post = Berita::findOrFail($id);

        if ($request->file('gambar')) {
            if ($post->gambar) {
                Storage::disk('public')->delete($post->gambar);
                // Storage::disk('s3')->delete($identitas->logo);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('post-images', 'public');
        }
        $post->update($validatedData);
        //redirect to index
        return redirect()->route('berita')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */


    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Berita::class, 'slug', $request->judul);

        return response()->json(['slug' => $slug]);
    }

    public function destroy($id)
    {
        //get post by ID
        $post = Berita::findOrFail($id);

        //delete image
        // Storage::delete('public/posts/'. $post->image);

        if ($post->gambar) {
            Storage::delete($post->gambar);
        }


        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('berita')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

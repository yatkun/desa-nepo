<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengumuman = Pengumuman::latest()->get();
        
        return view('pengumuman.index', compact('pengumuman'), [
            'title' => 'Daftar Pengumuman',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengumuman.tambah', [
            'title' => 'Tambah Pengumuman',
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
            'gambar' => 'image|file|max:1024'
        ], [
            'judul.required' => 'Judul harus diisi !',
            'judul.max' => 'Judul terlalu panjang !',
            'slug.unique' => 'Slug telah digunakan !',
            'isi.required' => 'Isi pengumuman harus diisi !',
            'gambar.max' => 'Ukuran gambar maksimal 1mb !'
        ]);

        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('post-images', 'public');
        }

        $validatedData['user_id'] = auth()->user()->id;
        Pengumuman::create($validatedData);

        return redirect()->route('pengumuman')->with('success', 'Pengumuman berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Pengumuman $pengumuman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //get post by ID
        $post = Pengumuman::findOrFail($id);

        //render view with post
        return view('pengumuman.edit', compact('post'), [
            'title' => 'Edit Pengumuman',
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
        ],[
            'judul.required' => 'Judul harus diisi !',
            'judul.max' => 'Judul terlalu panjang !',
            'slug.required' => 'Slug harus diisi !',
            'isi.required' => 'Isi pengumuman harus diisi !',
            'gambar.max' => 'Ukuran gambar maksimal 1mb !'
        ]);

        //get post by ID
        $post = Pengumuman::findOrFail($id);

        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('post-images');
        }
        $post->update($validatedData);
        //redirect to index
        return redirect()->route('pengumuman')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //get post by ID
        $post = Pengumuman::findOrFail($id);

        //delete image
        // Storage::delete('public/posts/'. $post->image);

        if($post->gambar){
            Storage::delete($post->gambar);
        }

       
        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('pengumuman')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Pengumuman::class, 'slug', $request->judul);

        return response()->json(['slug' => $slug]);
    }
}

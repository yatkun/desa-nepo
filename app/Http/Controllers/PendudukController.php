<?php

namespace App\Http\Controllers;

use App\Models\Aparatur;
use App\Models\Penduduk;
use App\Models\Identitas;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penduduk = Penduduk::all();

        return view('penduduk.index', compact('penduduk'), [
            'title' => 'Daftar Penduduk',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penduduk.tambah', [
            'title' => 'Tambah Penduduk',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
   

        $rules = [
            'nama' => 'required',
            'nik' => 'required|unique:penduduks',
            'nohp' => '',
            'pekerjaan' => '',
        ];

        $messages = [
            // Definisikan pesan error kustom untuk setiap aturan validasi di sini
            'nik.unique' => 'NIK sudah terdaftar pada sistem',
            'nama.required' => 'Nama wajib diisi',
            'nohp.required' => 'No.HP wajib diisi',
            'pekerjaan.required' => 'Pekerjaan wajib diisi',
            'nik.required' => 'NIK wajib diisi',
           
            // ...
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        // Jika validasi berhasil, simpan data ke database
        $data = new Penduduk();
        $data->nama = $request->input('nama');
        $data->nik = $request->input('nik');
        $data->nohp = $request->input('nohp');
        $data->kelamin = $request->input('kelamin');
        $data->pendidikan = $request->input('pendidikan');
        $data->agama = $request->input('agama');
        $data->perkawinan = $request->input('perkawinan');
        $data->pekerjaan = $request->input('pekerjaan');
        // ...

        $data->save();
     

        return redirect()->route('penduduk')->with('success', 'Penduduk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
       
        $aparatur = Aparatur::all();
       $penduduk = Penduduk::all();
        $identitas = Identitas::latest()->first();
        $pengumuman = Pengumuman::latest()->paginate(6);
        $pendidikan = Penduduk::select('pendidikan')->whereNotNull('pendidikan')->distinct()->get();
       
        $pekerjaan = Penduduk::select('pekerjaan')->whereNotNull('pekerjaan')->distinct()->get();
        $agama = Penduduk::select('agama')->whereNotNull('agama')->distinct()->get();
        $perkawinan = Penduduk::select('perkawinan')->whereNotNull('perkawinan')->distinct()->get();
        $dusun = Penduduk::select('dusun')->whereNotNull('dusun')->distinct()->get();
        return view('desa.penduduk', compact('pengumuman','identitas','aparatur','penduduk','pendidikan','pekerjaan','agama','dusun','perkawinan'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penduduk $penduduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penduduk $penduduk)
    {
        //
    }
}

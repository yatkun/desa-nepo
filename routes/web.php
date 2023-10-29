<?php

use App\Http\Controllers\AparaturController;
use App\Models\Sejarah;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\IdentitasController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\VisimisiController;
use App\Models\Visimisi;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





// Publik Desa
Route::get('/', [DesaController::class, 'index'])->name('desa');
Route::get('/layanan-desa', [DesaController::class, 'layanan'])->name('desa.layanan');
Route::get('/sejarah', [DesaController::class, 'sejarah'])->name('desa.sejarah');
Route::get('/dokumentasi', [DesaController::class, 'dokumentasi'])->name('desa.dokumentasi');

// Dashboard Layanan
Route::get('/layanan/daftar-layanan', [LayananController::class, 'index'])->name('layanan')->middleware('auth');
Route::get('/layanan/tambah', [LayananController::class, 'create'])->name('layanan.create')->middleware('auth');
Route::post('/layanan/store', [LayananController::class, 'store'])->name('layanan.store')->middleware('auth');
Route::get('/layanan/tambah/checkSlug', [LayananController::class, 'checkSlug'])->middleware('auth');
Route::get('/layanan/edit/{id}', [LayananController::class, 'edit'])->middleware('auth');
Route::put('/layanan/update/{id}', [LayananController::class, 'update'])->middleware('auth')->name('layanan.update');
Route::get('/layanan/hapus/{id}', [LayananController::class, 'destroy'])->middleware('auth')->name('layanan.hapus');


// Dashboard Visi Misi
Route::get('/profil/visi-misi', [VisimisiController::class, 'index'])->name('visimisi')->middleware('auth');
Route::post('/profil/visi-misi/store', [VisimisiController::class, 'store'])->name('visi.post')->middleware('auth');

// Dashboard Identitas
Route::get('/identitas', [IdentitasController::class, 'index'])->name('identitas')->middleware('auth');
Route::post('/identitas/store', [IdentitasController::class, 'store'])->name('identitas.post')->middleware('auth');

// Dashboard Aparatur
Route::get('/aparatur-desa', [AparaturController::class, 'index'])->name('aparatur')->middleware('auth');
Route::get('/aparatur-desa/tambah', [AparaturController::class, 'create'])->name('aparatur.tambah')->middleware('auth');
Route::post('/aparatur-desa/store', [AparaturController::class, 'store'])->name('aparatur.post')->middleware('auth');
Route::get('/aparatur-desa/edit/{id}', [AparaturController::class, 'edit'])->middleware('auth');
Route::put('/aparatur-desa/update/{id}', [AparaturController::class, 'update'])->middleware('auth')->name('aparatur.update');
Route::get('/aparatur-desa/hapus/{id}', [AparaturController::class, 'destroy'])->middleware('auth')->name('aparatur.hapus');



// Dashboard Sejarah
Route::get('/profil/sejarah', [SejarahController::class, 'index'])->name('sejarah')->middleware('auth');
Route::post('/profil/sejarah/store', [SejarahController::class, 'store'])->name('sejarah.post')->middleware('auth');

// Dashboard Berita
Route::get('/berita/daftar-berita', [BeritaController::class, 'index'])->name('berita')->middleware('auth');
Route::get('/berita/tambah', [BeritaController::class, 'create'])->name('berita.create')->middleware('auth');
Route::post('/berita/tambah', [BeritaController::class, 'store'])->name('berita.store')->middleware('auth');
Route::get('/berita/tambah/checkSlug', [BeritaController::class, 'checkSlug'])->middleware('auth');
Route::get('/berita/edit/{id}', [BeritaController::class, 'edit'])->middleware('auth');
Route::put('/berita/update/{id}', [BeritaController::class, 'update'])->middleware('auth')->name('berita.update');
Route::get('/berita/hapus/{id}', [BeritaController::class, 'destroy'])->middleware('auth')->name('berita.hapus');
Route::get('/berita/{slug}', [BeritaController::class, 'show']);

// Dashboard Admin
Route::get('/admin/daftar-admin', [UserController::class, 'index'])->name('user')->middleware('auth');
Route::get('/admin/tambah', [UserController::class, 'create'])->name('user.create')->middleware('auth');
Route::post('/admin/tambah/store', [UserController::class, 'store'])->name('user.store')->middleware('auth');

// Login Page
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

// Dashboard Page
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');


// Dashboard Berita
Route::get('/pengumuman/daftar-pengumuman', [PengumumanController::class, 'index'])->name('pengumuman')->middleware('auth');
Route::get('/pengumuman/tambah', [PengumumanController::class, 'create'])->name('pengumuman.create')->middleware('auth');
Route::post('/pengumuman/tambah', [PengumumanController::class, 'store'])->name('pengumuman.store')->middleware('auth');
Route::get('/pengumuman/tambah/checkSlug', [PengumumanController::class, 'checkSlug'])->middleware('auth');
Route::get('/pengumuman/edit/{id}', [PengumumanController::class, 'edit'])->middleware('auth');
Route::put('/pengumuman/update/{id}', [PengumumanController::class, 'update'])->middleware('auth')->name('pengumuman.update');
Route::get('/pengumuman/hapus/{id}', [PengumumanController::class, 'destroy'])->middleware('auth')->name('pengumuman.hapus');
Route::get('/pengumuman/{slug}', [DesaController::class, 'pengumuman'])->name('pengumuman.lihat');

Route::get('/visi-misi', [VisimisiController::class, 'show'])->name('visi');
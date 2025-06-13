<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AlumniController;
use App\Http\Controllers\Admin\PertanyaanController;
use App\Http\Controllers\Admin\GrupKuesionerController;
use App\Http\Controllers\Alumni\RiwayatPekerjaanController;
use App\Http\Controllers\Admin\RiwayatAlumniController;
use App\Http\Controllers\Admin\JawabanAlumniController;
use App\Models\User;
use App\Models\JawabanKuesioner;
use App\Models\RiwayatPekerjaan;
use Illuminate\Support\Facades\App;

Route::get('/', function () {
    return view('welcome'); 
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('alumni', AlumniController::class);
    Route::get('/riwayat-pekerjaan', [RiwayatAlumniController::class, 'index'])->name('admin.riwayat.index');
    Route::get('/jawaban-alumni', [JawabanAlumniController::class, 'index'])->name('admin.jawaban.index');
    Route::get('/pertanyaan-kuesioner', [PertanyaanController::class, 'index'])->name('admin.pertanyaan.index');

    Route::resource('pertanyaan', PertanyaanController::class);
    Route::resource('grup-kuesioner', GrupKuesionerController::class);
    
});

Route::get('/admin/alumni', [AlumniController::class, 'index'])->name('alumni.index');

// Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
//     Route::resource('pertanyaan', PertanyaanController::class);
// });

Route::middleware(['auth', 'alumni'])->prefix('alumni')->name('alumni.')->group(function () {
    Route::get('/dashboard', function () {
        return view('alumni.dashboard');
    })->name('dashboard');

    Route::get('/kuesioner', [\App\Http\Controllers\Alumni\KuesionerController::class, 'index'])->name('kuesioner');
    Route::post('/kuesioner', [\App\Http\Controllers\Alumni\KuesionerController::class, 'store'])->name('kuesioner.store');;

    // 🔥 Tambahkan ini dengan nama sesuai kebutuhan
    Route::resource('riwayat', RiwayatPekerjaanController::class);
    Route::get('/riwayat', [\App\Http\Controllers\Alumni\RiwayatPekerjaanController::class, 'index'])->name('riwayat.index');
    Route::get('/riwayat/create', [\App\Http\Controllers\Alumni\RiwayatPekerjaanController::class, 'create'])->name('riwayat.create');
    Route::post('/riwayat', [\App\Http\Controllers\Alumni\RiwayatPekerjaanController::class, 'store'])->name('riwayat.store');
});


// Group untuk admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        $totalAlumni = User::where('role', 'alumni')->count();
        $totalKuesioner = JawabanKuesioner::distinct('user_id')->count('user_id');
        $totalRiwayat = RiwayatPekerjaan::count();$sudahBekerja = User::where('role', 'alumni')->whereHas('riwayatPekerjaan')->count();
        $belumBekerja = User::where('role', 'alumni')->whereDoesntHave('riwayatPekerjaan')->count();
        $belumKuesioner = User::where('role', 'alumni')->whereDoesntHave('jawabanKuesioner')->count();
        
        return view('admin.dashboard', compact(
            'totalAlumni',
            'totalKuesioner',
            'totalRiwayat',
            'sudahBekerja',
            'belumBekerja',
            'belumKuesioner'
        ));
    })->name('admin.dashboard');
});


// Group untuk alumni
Route::middleware(['auth', 'alumni'])->group(function () {
    Route::get('/alumni/dashboard', function () {
        return view('alumni.dashboard');
    })->name('alumni.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

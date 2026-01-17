<?php

use App\Http\Controllers\DivisiController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\UserController;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

// Route::get('/pegawai', function(){
//     return view('pegawai');
// });

// Route::get('/data_pegawai', function(){
//     $pegawai = Pegawai::find(5);
//     dd($pegawai);

//     $pegawai = Pegawai::create(25);
//     dd($pegawai);

//     $pegawai = Pegawai::where('nama_pegawai', 'Adithya')->first()
//     $pegawai = Pegawai::where('umur', '>', 35)->get();

//     Pegawai::where('nama_pegawai', 'Aditya')->delete();
//     Pegawai::Destroy(1);

//     Pegawai::where('id', 2)->update([
//         'nama_pegawai' => "Cemplank Sihotang"
//     ]);
// });


Route::resource('pegawai', PegawaiController::class);
Route::resource('divisi', DivisiController::class);
Route::resource('users', UserController::class)->middleware('isSupervisor');
Route::post('users-update-role', [UserController::class, 'updateRole'])->name('users.update-role');

Route::fallback(function () {
    return view('404');
});

// Route::get('/truncate', function(){
//     Pegawai::truncate();
// });
<?php

use App\Http\Livewire\PasswordController;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Home;
use App\Http\Livewire\NewAccount;
use App\Http\Livewire\Upload;
use Illuminate\Support\Facades\Route;

Route::get('/',Home::class);

Route::group(['middleware' => ['auth', 'cekRole:admin,user']], function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/upload', Upload::class)->name('upload');
    Route::get('/edit-password', PasswordController::class)->name('edit-password');
});

Route::group(['middleware' => ['auth', 'cekRole:admin']], function () {
    Route::get('/akun-baru', NewAccount::class)->name('akun-baru');
});

// Route::get('/dashboard', [HomeDashboard::class,'index'])->name('dashboard');


Auth::routes();
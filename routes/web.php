<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Pengurusan\UserController;

//Route::get('/', [HomepageController::class, 'welcome']);
Route::redirect('/', '/login');

// Jika dalam 1 controller ada lebih daripada 1 funtion,
// Kita perlu maklumkan nama controller dan nama function/method
// yang digunakan dalam bentuk array [Controller, function]
Route::get('login', [LoginController::class, 'borangLogin'])->name('login');
Route::post('login', [LoginController::class, 'terimaDataBorangLogin'])->name('login.authenticate');

// Jika menggunakan function/method/action invoke (hanya ada 1 function),
// begini penulisan kod. Tiada array
Route::get('dashboard/user', DashboardController::class)->name('dashboard.pengguna');

Route::post('punch-in', [KehadiranController::class, 'punchIn'])->name('kehadiran.punchin');
Route::post('punch-out', [KehadiranController::class, 'punchOut'])->name('kehadiran.punchout');
Route::get('kehadiran', [KehadiranController::class, 'index'])->name('kehadiran.index');
Route::get('kehadiran/{id}', [KehadiranController::class, 'show'])->name('kehadiran.show');

Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');

Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::post('users/add', [UserController::class, 'store'])->name('users.store');
Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::patch('users/{id}/edit', [UserController::class, 'update'])->name('users.update');
Route::delete('users', [UserController::class, 'destroy'])->name('users.destroy');



Route::get('switch', function (Request $request) {

    $lang = $request->input('lang');

    $lang == 'en' ? App::setLocale('en') : App::setLocale('my');

    $locale = App::currentLocale();

    dd($locale);

    return redirect()->back();

})->name('change.language');

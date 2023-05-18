<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pengurusan\UserController;
use App\Http\Controllers\Pengurusan\KehadiranController;

//Route::group(['prefix' => 'pengurusan'], function() {

//});

// Pengurusan Users
Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/add', [UserController::class, 'create'])->name('users.create');
Route::post('users/add', [UserController::class, 'store'])->name('users.store');
Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::patch('users/{id}/edit', [UserController::class, 'update'])->name('users.update');
Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// Pengurusan kehadiran
Route::get('kehadiran', [KehadiranController::class, 'index'])->name('kehadiran.index');
Route::delete('kehadiran/{id}', [KehadiranController::class, 'destroy'])->name('kehadiran.destroy');

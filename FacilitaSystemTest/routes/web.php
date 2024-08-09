<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('index');

// cadastro

Route::get('cadastrar', [LoginController::class, 'cadastrar'])->name('cadastrar');
Route::post('cadastrar', [LoginController::class, 'registro'])->name('registro');

// login

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'autenticar'])->name('autenticar');

// dashboard

Route::middleware(["autenticacao:examinador"])->group(function() {
    Route::get('dashboard/examinador/', [UsuarioController::class, 'examinador'])->name('dashboard.examinador');
});

Route::middleware(["autenticacao:usuario"])->group(function() {
    Route::get('dashboard/usuario', [UsuarioController::class, 'usuario'])->name('dashboard.usuario');
});


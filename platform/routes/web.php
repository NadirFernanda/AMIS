<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/servicos', [PublicController::class, 'services'])->name('services');
Route::get('/formacao', [PublicController::class, 'courses'])->name('courses');
Route::get('/sobre', [PublicController::class, 'about'])->name('about');
Route::get('/contacto', [PublicController::class, 'contact'])->name('contact');
Route::post('/contacto', [PublicController::class, 'sendContact'])->name('contact.send');

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Área Cliente (protegida)
Route::middleware('auth')->prefix('cliente')->name('cliente.')->group(function () {
    Route::get('/dashboard', [ClienteController::class, 'dashboard'])->name('dashboard');
});

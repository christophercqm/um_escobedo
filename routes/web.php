<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\NavigationController;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Rutas públicas
Route::get('/club', [NavigationController::class, 'club'])->name('club');
Route::get('/primer-equipo', [NavigationController::class, 'primerEquipo'])->name('primer-equipo');
Route::get('/escuela', [NavigationController::class, 'escuela'])->name('escuela');
Route::get('/prensa', [NavigationController::class, 'prensa'])->name('prensa');
Route::get('/contacto', [NavigationController::class, 'contacto'])->name('contacto');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

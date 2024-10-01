<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\NavigationController;
use App\Http\Controllers\PrensaController;
use App\Http\Controllers\PrimerEquipoController;
use App\Http\Controllers\JugadoresController;
use App\Http\Controllers\CuerpoTecnicoController;


use App\Models\Jugadores;




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
Route::get('/primer-equipo', [NavigationController::class, 'primerEquipo'])->name('public.primerEquipo');
Route::get('/escuela', [NavigationController::class, 'escuela'])->name('escuela');
Route::get('/prensa', [NavigationController::class, 'prensa'])->name('prensa');
Route::get('/prensa-public/{id}', [PrensaController::class, 'showPublic'])->name('prensa.public.show');
Route::get('/contacto', [NavigationController::class, 'contacto'])->name('contacto');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // RUTAS ESCOBEDO ADMIN

    // PRENSA
    Route::get('/prensa/admin', [PrensaController::class, 'index'])->name('admin.prensa');
    Route::get('/prensa/admin/create', [PrensaController::class, 'create'])->name('admin.prensa.create');
    Route::post('/prensa/admin', [PrensaController::class, 'store'])->name('admin.prensa.store');
    Route::get('/prensa/admin/{id}/edit', [PrensaController::class, 'edit'])->name('admin.prensa.edit');
    Route::put('/prensa/admin/{id}', [PrensaController::class, 'update'])->name('admin.prensa.update');
    Route::delete('/prensa/admin/{id}', [PrensaController::class, 'destroy'])->name('admin.prensa.destroy');
    Route::get('/prensa/admin/{id}', [PrensaController::class, 'show'])->name('admin.prensa.show');

    Route::get('/primer-equipo/admin', [Jugadores::class, 'index'])->name('admin.primerEquipo');
    
    // JUGADORES
    Route::get('/jugadores/admin', [JugadoresController::class, 'index'])->name('admin.jugadores');
    Route::get('/jugadores/admin/create', [JugadoresController::class, 'create'])->name('admin.jugadores.create');
    Route::post('/jugadores/admin', [JugadoresController::class, 'store'])->name('admin.jugadores.store');
    Route::get('/jugadores/admin/{id}/edit', [JugadoresController::class, 'edit'])->name('admin.jugadores.edit');
    Route::put('/jugadores/admin/{id}', [JugadoresController::class, 'update'])->name('admin.jugadores.update');
    Route::delete('/jugadores/admin/{id}', [JugadoresController::class, 'destroy'])->name('admin.jugadores.destroy');
    Route::get('/jugadores/admin/{id}', [JugadoresController::class, 'show'])->name('admin.jugadores.show');

    // CUERPO TÉCNICO
    Route::get('/cuerpo-tecnico/admin', [CuerpoTecnicoController::class, 'index'])->name('cuerpo-tecnico.index');
    Route::get('/cuerpo-tecnico/admin/create', [CuerpoTecnicoController::class, 'create'])->name('cuerpo-tecnico.create');
    Route::post('/cuerpo-tecnico/admin', [CuerpoTecnicoController::class, 'store'])->name('cuerpo-tecnico.store');
    Route::get('/cuerpo-tecnico/admin/{id}/edit', [CuerpoTecnicoController::class, 'edit'])->name('cuerpo-tecnico.edit');
    Route::put('/cuerpo-tecnico/admin/{id}', [CuerpoTecnicoController::class, 'update'])->name('cuerpo-tecnico.update');
    Route::delete('/cuerpo-tecnico/admin/{id}', [CuerpoTecnicoController::class, 'destroy'])->name('cuerpo-tecnico.destroy');
    Route::get('/cuerpo-tecnico/admin/{id}', [CuerpoTecnicoController::class, 'show'])->name('cuerpo-tecnico.show');


});

require __DIR__.'/auth.php';

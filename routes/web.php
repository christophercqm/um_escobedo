<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\NavigationController;
use App\Http\Controllers\PrensaController;
use App\Http\Controllers\PrimerEquipoController;


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

    // RUTAS ESCOBEDO ADMIN
    Route::get('/prensa/admin', [PrensaController::class, 'index'])->name('admin.prensa');
    Route::get('/prensa/admin/create', [PrensaController::class, 'create'])->name('admin.prensa.create');
    Route::post('/prensa/admin', [PrensaController::class, 'store'])->name('admin.prensa.store');
    Route::get('/prensa/admin/{id}/edit', [PrensaController::class, 'edit'])->name('admin.prensa.edit');
    Route::put('/prensa/admin/{id}', [PrensaController::class, 'update'])->name('admin.prensa.update');
    Route::delete('/prensa/admin/{id}', [PrensaController::class, 'destroy'])->name('admin.prensa.destroy');
    Route::get('/prensa/admin/{id}', [PrensaController::class, 'show'])->name('admin.prensa.show');

    Route::get('/primer-equipo', [PrimerEquipoController::class, 'index'])->name('primerEquipo');


});

require __DIR__.'/auth.php';

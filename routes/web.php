<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\NavigationController;
use App\Http\Controllers\PrensaController;
use App\Http\Controllers\JugadoresController;
use App\Http\Controllers\CuerpoTecnicoController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\JuntaController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\ProximosPartidosController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PrimerEquipoController;
use App\Http\Controllers\UltimoPartidoController;
use App\Http\Controllers\HomeController;






//Formularios
use App\Http\Controllers\FormularioContactarController;
use App\Http\Controllers\FormularioPatrocinadorController;
use App\Http\Controllers\FormularioAcreditacionController;


use App\Models\Jugadores;

Route::get('/', [HomeController::class, 'index'])->name('home');


// Rutas públicas
Route::get('/club', [JuntaController::class, 'publicIndex'])->name('club.index'); 
Route::get('/primer-equipo', [PrimerEquipoController::class, 'index'])->name('public.primerEquipo');
Route::get('/escuela', [NavigationController::class, 'escuela'])->name('escuela');
Route::get('/prensa', [PrensaController::class, 'publicIndex'])->name('prensa.index');
Route::get('/prensa-public/{id}', [PrensaController::class, 'showPublic'])->name('prensa.showPublic');


Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.enviar');


Route::get('/proximos-partidos', [ProximosPartidosController::class, 'index'])->name('proximos-partidos.index');


// Formularios 
Route::post('/contactar', [FormularioContactarController::class, 'store'])->name('contactar.store');

// Rutas para el formulario de acreditación
Route::post('/acreditacion', [FormularioAcreditacionController::class, 'storeAcreditacion'])->name('formulario.acreditacion');


// Ruta para revisar la acreditación
Route::get('/acreditacion/revisar/{token}', [FormularioAcreditacionController::class, 'revisar'])->name('acreditacion.revisar');
Route::post('/aprobar-acreditacion/{id}', [FormularioAcreditacionController::class, 'aprobar'])->name('acreditacion.aprobar');
Route::post('/rechazar-acreditacion/{token}', [FormularioAcreditacionController::class, 'rechazar'])->name('acreditacion.rechazar');


// Rutas para el formulario de patrocinadores
Route::post('/patrocinadores', [FormularioPatrocinadorController::class, 'store'])->name('patrocinadores.store');

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
    Route::post('/jugadores/admin/{id}', [JugadoresController::class, 'update'])->name('admin.jugadores.update');
    Route::delete('/jugadores/admin/{id}', [JugadoresController::class, 'destroy'])->name('admin.jugadores.destroy');
    Route::get('/jugadores/admin/{id}', [JugadoresController::class, 'show'])->name('admin.jugadores.show');

    // CUERPO TÉCNICO
    Route::get('/cuerpo-tecnico/admin', [CuerpoTecnicoController::class, 'index'])->name('cuerpo-tecnico.index');
    Route::get('/cuerpo-tecnico/admin/create', [CuerpoTecnicoController::class, 'create'])->name('cuerpo-tecnico.create');
    Route::post('/cuerpo-tecnico/admin', [CuerpoTecnicoController::class, 'store'])->name('cuerpo-tecnico.store');
    Route::get('/cuerpo-tecnico/admin/{id}/edit', [CuerpoTecnicoController::class, 'edit'])->name('cuerpo-tecnico.edit');
    Route::post('/cuerpo-tecnico/admin/{id}', [CuerpoTecnicoController::class, 'update'])->name('cuerpo-tecnico.update');
    Route::delete('/cuerpo-tecnico/admin/{id}', [CuerpoTecnicoController::class, 'destroy'])->name('cuerpo-tecnico.destroy');
    Route::get('/cuerpo-tecnico/admin/{id}', [CuerpoTecnicoController::class, 'show'])->name('cuerpo-tecnico.show');

    // Rutas para gestionar la junta
    Route::get('/junta/admin', [JuntaController::class, 'index'])->name('admin.junta.index'); // Listar miembros de la junta
    Route::get('/junta/admin/create', [JuntaController::class, 'create'])->name('admin.junta.create'); // Mostrar formulario para crear un miembro de la junta
    Route::post('/junta/admin', [JuntaController::class, 'store'])->name('admin.junta.store'); // Guardar un nuevo miembro de la junta
    Route::get('/junta/admin/{id}/edit', [JuntaController::class, 'edit'])->name('admin.junta.edit'); // Mostrar formulario para editar un miembro de la junta
    Route::post('/junta/admin/{id}', [JuntaController::class, 'update'])->name('admin.junta.update'); // Actualizar un miembro de la junta
    Route::delete('/junta/admin/{id}', [JuntaController::class, 'destroy'])->name('admin.junta.destroy'); // Eliminar un miembro de la junta
    Route::get('/junta/admin/{id}', [JuntaController::class, 'show'])->name('admin.junta.show'); // Mostrar detalles de un miembro de la junta




    // Rutas para gestionar equipos
    Route::get('/equipos/admin', [EquipoController::class, 'index'])->name('equipos.index'); // Listar equipos
    Route::get('/equipos/admin/create', [EquipoController::class, 'create'])->name('equipos.create'); // Mostrar formulario para crear un equipo
    Route::post('/equipos/admin', [EquipoController::class, 'store'])->name('equipos.store'); // Guardar un nuevo equipo
    Route::get('/equipos/admin/{id}/edit', [EquipoController::class, 'edit'])->name('equipos.edit'); // Mostrar formulario para editar un equipo
    Route::post('/equipos/admin/{id}', [EquipoController::class, 'update'])->name('equipos.update'); // Actualizar un equipo
    Route::delete('/equipos/admin/{id}', [EquipoController::class, 'destroy'])->name('equipos.destroy'); // Eliminar un equipo
    Route::get('/equipos/admin/{id}', [EquipoController::class, 'show'])->name('equipos.show'); // Mostrar detalles de un equipo


    // Rutas para gestionar partidos
    Route::get('/partidos/admin', [PartidoController::class, 'index'])->name('partidos.index');
    Route::get('/partidos/admin/create', [PartidoController::class, 'create'])->name('partidos.create');
    Route::post('/partidos/admin', [PartidoController::class, 'store'])->name('partidos.store');
    Route::get('/partidos/admin/{id}/edit', [PartidoController::class, 'edit'])->name('partidos.edit');
    Route::put('/partidos/admin/{id}', [PartidoController::class, 'update'])->name('partidos.update');
    Route::delete('/partidos/admin/{id}', [PartidoController::class, 'destroy'])->name('partidos.destroy');
    Route::get('/partidos/admin/{id}', [PartidoController::class, 'show'])->name('partidos.show');


    // ÚLTIMOS PARTIDOS
    Route::get('/ultimos-partidos/admin', [UltimoPartidoController::class, 'index'])->name('admin.ultimos_partidos');
    Route::get('/ultimos-partidos/admin/create', [UltimoPartidoController::class, 'create'])->name('admin.ultimos_partidos.create');
    Route::post('/ultimos-partidos/admin', [UltimoPartidoController::class, 'store'])->name('admin.ultimos_partidos.store');
    Route::get('/ultimos-partidos/admin/{id}/edit', [UltimoPartidoController::class, 'edit'])->name('admin.ultimos_partidos.edit');
    Route::post('/ultimos-partidos/admin/{id}', [UltimoPartidoController::class, 'update'])->name('admin.ultimos_partidos.update');
    Route::delete('/ultimos-partidos/admin/{id}', [UltimoPartidoController::class, 'destroy'])->name('admin.ultimos_partidos.destroy');
    Route::get('/ultimos-partidos/admin/{id}', [UltimoPartidoController::class, 'show'])->name('admin.ultimos_partidos.show');


});

require __DIR__.'/auth.php';

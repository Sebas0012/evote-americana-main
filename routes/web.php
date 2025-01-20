<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\EleccionController;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\PapeletaController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\ResultadoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VotanteController;
use App\Http\Controllers\AuditoriaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('papeleta.login');
});

Route::prefix('papeleta')->group(function () {
    Route::get('/login', [PapeletaController::class, 'login'])->name('papeleta.login');
    Route::post('/login', [PapeletaController::class, 'makeLogin'])->name('papeleta.makeLogin');
    Route::get('/verificacion', [PapeletaController::class, 'verificacion'])->name('papeleta.verificacion');
    Route::post('/verificacion', [PapeletaController::class, 'makeVerificacion'])->name('papeleta.makeVerificacion');
    Route::get('/eleccion', [PapeletaController::class, 'eleccion'])->name('papeleta.eleccion');
    Route::post('/eleccion', [PapeletaController::class, 'preEleccion'])->name('papeleta.preEleccion');
    Route::get('/confirmarEleccion/{id}', [PapeletaController::class, 'confirmarEleccion'])->name('papeleta.confirmarEleccion');
    Route::post('/makeConfirmarEleccion', [PapeletaController::class, 'makeConfirmarEleccion'])->name('papeleta.makeConfirmarEleccion');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::view('/', 'admin.index')->name('admin.inicio');

    Route::prefix('eleccion')->group(function () {
        // index
        Route::get('/', [EleccionController::class, 'index'])->name('admin.eleccion.index');
        // guardado de registro
        Route::post('/', [EleccionController::class, 'store'])->name('admin.eleccion.store');
        // form de creacion
        Route::get('/create', [EleccionController::class, 'create'])->name('admin.eleccion.create');
        // Vista registro individual
        Route::get('/{id}', [EleccionController::class, 'show'])->name('admin.eleccion.show');
        // form de edición
        Route::get('/{id}/edit', [EleccionController::class, 'edit'])->name('admin.eleccion.edit');
        // actualización de registro
        Route::put('/{id}', [EleccionController::class, 'update'])->name('admin.eleccion.update');
        // eliminacion de registro
        Route::delete('/{id}', [EleccionController::class, 'destroy'])->name('admin.eleccion.destroy');
    });

    Route::prefix('lista')->group(function () {
        // index
        Route::get('/', [ListaController::class, 'index'])->name('admin.lista.index');
        // form de creacion
        Route::get('/create', [ListaController::class, 'create'])->name('admin.lista.create');
        // Vista registro individual
        Route::get('/{id}', [ListaController::class, 'show'])->name('admin.lista.show');
        // form de edición
        Route::get('/{id}/edit', [ListaController::class, 'edit'])->name('admin.lista.edit');
        // actualización de registro
        Route::put('/{id}', [ListaController::class, 'update'])->name('admin.lista.update');
        // eliminacion de registro
        Route::delete('/{id}', [ListaController::class, 'destroy'])->name('admin.lista.destroy');
        // guardado de registro
        Route::post('/', [ListaController::class, 'store'])->name('admin.lista.store');
    });

    Route::prefix('candidato')->group(function () {
        // index
        Route::get('/', [CandidatoController::class, 'index'])->name('admin.candidato.index');
        // form de creacion
        Route::get('/create', [CandidatoController::class, 'create'])->name('admin.candidato.create');
        // Vista registro individual
        Route::get('/{id}', [CandidatoController::class, 'show'])->name('admin.candidato.show');
        // form de edición
        Route::get('/{id}/edit', [CandidatoController::class, 'edit'])->name('admin.candidato.edit');
        // actualización de registro
        Route::put('/{id}', [CandidatoController::class, 'update'])->name('admin.candidato.update');
        // eliminacion de registro
        Route::delete('/{id}', [CandidatoController::class, 'destroy'])->name('admin.candidato.destroy');
        // guardado de registro
        Route::post('/', [CandidatoController::class, 'store'])->name('admin.candidato.store');
    });

    Route::prefix('votante')->group(function () {
        // index
        Route::get('/', [VotanteController::class, 'index'])->name('admin.votante.index');
        // form de creacion
        Route::get('/create', [VotanteController::class, 'create'])->name('admin.votante.create');
        // form de importacion
        Route::get('/import', [VotanteController::class, 'import'])->name('admin.votante.import');
        // Vista registro individual
        Route::get('/{id}', [VotanteController::class, 'show'])->name('admin.votante.show');
        // form de edición
        Route::get('/{id}/edit', [VotanteController::class, 'edit'])->name('admin.votante.edit');
        // actualización de registro
        Route::put('/{id}', [VotanteController::class, 'update'])->name('admin.votante.update');
        // eliminacion de registro
        Route::delete('/{id}', [VotanteController::class, 'destroy'])->name('admin.votante.destroy');
        // guardado de registro
        Route::post('/', [VotanteController::class, 'store'])->name('admin.votante.store');
        // guardado de registro
        Route::post('/import', [VotanteController::class, 'importStore'])->name('admin.votante.importStore');
    });

    Route::prefix('usuario')->group(function () {
        // index
        Route::get('/', [UsuarioController::class, 'index'])->name('admin.usuario.index');
        // form de creacion
        Route::get('/create', [UsuarioController::class, 'create'])->name('admin.usuario.create');
        // Vista registro individual
        Route::get('/{id}', [UsuarioController::class, 'show'])->name('admin.usuario.show');
        // form de edición
        Route::get('/{id}/edit', [UsuarioController::class, 'edit'])->name('admin.usuario.edit');
        // actualización de registro
        Route::put('/{id}', [UsuarioController::class, 'update'])->name('admin.usuario.update');
        // eliminacion de registro
        Route::delete('/{id}', [UsuarioController::class, 'destroy'])->name('admin.usuario.destroy');
        // guardado de registro
        Route::post('/', [UsuarioController::class, 'store'])->name('admin.usuario.store');
    });

    Route::prefix('resultado')->group(function () {
        // index
        Route::get('/', [ResultadoController::class, 'index'])->name('admin.resultado.index');
        // Vista registro individual
        Route::get('/{id}', [ResultadoController::class, 'show'])->name('admin.resultado.show');
        // form de creacion
        Route::get('/create', [ResultadoController::class, 'create'])->name('admin.resultado.create');
        // form de edición
        Route::get('/{id}/edit', [ResultadoController::class, 'edit'])->name('admin.resultado.edit');
        // actualización de registro
        Route::put('/{id}', [ResultadoController::class, 'update'])->name('admin.resultado.update');
        // eliminacion de registro
        Route::delete('/{id}', [ResultadoController::class, 'destroy'])->name('admin.resultado.destroy');
        // guardado de registro
        Route::post('/', [ResultadoController::class, 'store'])->name('admin.resultado.store');
    });

    Route::prefix('reporte')->group(function () {
        // index
        Route::get('/', [ReporteController::class, 'index'])->name('admin.reporte.index');
        // Vista registro individual
        Route::get('/{id}', [ReporteController::class, 'show'])->name('admin.reporte.show');
        // form de creacion
        Route::get('/create', [ReporteController::class, 'create'])->name('admin.reporte.create');
        // form de edición
        Route::get('/{id}/edit', [ReporteController::class, 'edit'])->name('admin.reporte.edit');
        // actualización de registro
        Route::put('/{id}', [ReporteController::class, 'update'])->name('admin.reporte.update');
        // eliminacion de registro
        Route::delete('/{id}', [ReporteController::class, 'destroy'])->name('admin.reporte.destroy');
        // guardado de registro
        Route::post('/', [ReporteController::class, 'store'])->name('admin.reporte.store');
    });

    Route::prefix('auditoria')->group(function () {
        // index
        Route::get('/', [AuditoriaController::class, 'index'])->name('admin.auditoria.index');
        // Vista registro individual
        Route::get('/{id}', [AuditoriaController::class, 'show'])->name('admin.auditoria.show');
    });
});

require __DIR__ . '/auth.php';

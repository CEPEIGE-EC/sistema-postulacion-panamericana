<?php

use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Formulario público de inscripción
Route::get('/', [InscripcionController::class, 'create'])->name('inscripcion.create');
Route::post('/inscripcion', [InscripcionController::class, 'store'])->name('inscripcion.store');

use App\Http\Controllers\AdminInscripcionController;

// Dashboard y Gestión de Inscripciones (autenticado)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AdminInscripcionController::class, 'index'])->name('dashboard');
    Route::get('/inscripciones/{inscripcion}', [AdminInscripcionController::class, 'show'])->name('inscripciones.show');
    Route::get('/inscripciones/{inscripcion}/cv', [AdminInscripcionController::class, 'downloadCv'])->name('inscripciones.cv');
    Route::get('/inscripciones-export/excel', [AdminInscripcionController::class, 'exportExcel'])->name('inscripciones.export.excel');
    Route::get('/inscripciones/{inscripcion}/edit', [AdminInscripcionController::class, 'edit'])->name('inscripciones.edit');
    Route::put('/inscripciones/{inscripcion}', [AdminInscripcionController::class, 'update'])->name('inscripciones.update');
    Route::patch('/inscripciones/{inscripcion}/estado', [AdminInscripcionController::class, 'updateEstado'])->name('inscripciones.estado');
    Route::delete('/inscripciones/{inscripcion}', [AdminInscripcionController::class, 'destroy'])->name('inscripciones.destroy');
});

// Perfil (autenticado)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

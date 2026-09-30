<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\LibroController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LibroController::class, 'index'])->name('libros.index');

Route::get('/bienvenida', function () {
    return view('bienvenida');
})->name('bienvenida');

// Libros (crear va antes que {libro} para que no se confunda con un ID)
Route::get('/libros/crear', [LibroController::class, 'create'])->name('libros.create');
Route::post('/libros', [LibroController::class, 'store'])->name('libros.store');
Route::get('/libros/{libro}', [LibroController::class, 'show'])->name('libros.show');
Route::get('/libros/{libro}/editar', [LibroController::class, 'edit'])->name('libros.edit');
Route::put('/libros/{libro}', [LibroController::class, 'update'])->name('libros.update');
Route::delete('/libros/{libro}', [LibroController::class, 'destroy'])->name('libros.destroy');

// Autores
Route::get('/autores', [AutorController::class, 'index'])->name('autores.index');
Route::get('/autores/crear', [AutorController::class, 'create'])->name('autores.create');
Route::post('/autores', [AutorController::class, 'store'])->name('autores.store');
Route::get('/autores/{autor}/editar', [AutorController::class, 'edit'])->name('autores.edit');
Route::put('/autores/{autor}', [AutorController::class, 'update'])->name('autores.update');
Route::delete('/autores/{autor}', [AutorController::class, 'destroy'])->name('autores.destroy');

// Editoriales
Route::get('/editoriales', [EditorController::class, 'index'])->name('editores.index');
Route::get('/editoriales/crear', [EditorController::class, 'create'])->name('editores.create');
Route::post('/editoriales', [EditorController::class, 'store'])->name('editores.store');
Route::get('/editoriales/{editor}/editar', [EditorController::class, 'edit'])->name('editores.edit');
Route::put('/editoriales/{editor}', [EditorController::class, 'update'])->name('editores.update');
Route::delete('/editoriales/{editor}', [EditorController::class, 'destroy'])->name('editores.destroy');

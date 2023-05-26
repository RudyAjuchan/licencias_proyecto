<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/windows', [\App\Http\Controllers\ListarProductosController::class, 'listarWindows']);
Route::get('/antivirus', [\App\Http\Controllers\ListarProductosController::class, 'listarAntivirus']);
Route::get('/office', [\App\Http\Controllers\ListarProductosController::class, 'listarOffice']);
Route::resource('/procesoCompra', \App\Http\Controllers\PagoController::class, ['only' => ['index', 'show', 'store', 'edit', 'update', 'destroy']]);    

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/categorias', \App\Http\Controllers\CategoriasController::class, ['only' => ['index', 'show', 'store', 'edit', 'update', 'destroy']]);    
    Route::resource('/licencias', \App\Http\Controllers\LicenciasController::class, ['only' => ['index', 'show', 'store', 'edit', 'update', 'destroy']]);        
});



require __DIR__.'/auth.php';

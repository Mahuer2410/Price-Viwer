<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use App\Models\Producto;

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

Route::get('/welcome', function () {return view('welcome');});

// Rutas de Productos
Route::get('/', [ProductoController::class,'mainProductos'])->name('Productos.main');

Route::get('Productos',[ProductoController::class,'index'])->name('Productos.index');
Route::get('Productos/create',[ProductoController::class,'create'])->name('Productos.create');
Route::post('Productos',[ProductoController::class,'store'])->name('Productos.store');
Route::get('Productos/{id}',[ProductoController::class,'show'])->name('Productos.show');
Route::get('Productos/{id}/edit',[ProductoController::class,'edit'])->name('Productos.edit');
Route::put('Productos/{id}',[ProductoController::class,'update'])->name('Productos.update');
Route::delete('Productos/{id}',[ProductoController::class,'destroy'])->name('Productos.destroy');

// Rutas de Breeze
Route::get('/dashboard', function () {
    $productos = Producto::all();
    return view('dashboard', compact('productos'));
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

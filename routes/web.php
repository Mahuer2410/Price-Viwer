<?php

use App\Http\Controllers\ProductoController;
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

Route::get('/', [ProductoController::class,'mainProductos'])->name('Productos.main');

Route::get('Productos',[ProductoController::class,'index'])->name('Productos.index');
Route::get('Productos/create',[ProductoController::class,'create'])->name('Productos.create');
Route::post('Productos',[ProductoController::class,'store'])->name('Productos.store');
Route::get('Productos/{id}',[ProductoController::class,'show'])->name('Productos.show');
Route::get('Productos/{id}/edit',[ProductoController::class,'edit'])->name('Productos.edit');
Route::put('Productos/{id}',[ProductoController::class,'update'])->name('Productos.update');
Route::delete('Productos/{id}',[ProductoController::class,'destroy'])->name('Productos.destroy');


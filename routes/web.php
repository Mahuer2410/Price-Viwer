<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
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

// Ruta pública del buscador
Route::get('/', [ProductoController::class, 'buscador'])
->name('Productos.buscador');

// Rutas protegidas que requieren autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/main', [RoleController::class,'index'])
    ->name('main');

    //Rutas de los roles
    Route::post('/',[RoleController::class,'store'])
    ->name('roles.store');

    //Productos
    Route::get('Productos',[ProductoController::class,'index'])
    ->name('Productos.index');
    Route::get('Productos/create',[ProductoController::class,'create'])
    ->name('Productos.create');
    Route::post('Productos',[ProductoController::class,'store'])
    ->name('Productos.store');
    Route::get('Productos/{id}',[ProductoController::class,'show'])
    ->name('Productos.show');
    Route::get('Productos/{id}/edit',[ProductoController::class,'edit'])
    ->name('Productos.edit');
    Route::put('Productos/{id}',[ProductoController::class,'update'])
    ->name('Productos.update');
    Route::delete('Productos/{id}',[ProductoController::class,'destroy'])
    ->name('Productos.destroy');
});

// Rutas de Breeze
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
    ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
    ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
    ->name('profile.destroy');
});

require __DIR__.'/auth.php';

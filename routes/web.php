<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::resource('producto', ProductoController::class);

Route::resource('empleado', EmpleadoController::class);
Route::get('/empleado/{empleado}/asignar-tienda', [EmpleadoController::class, 'asignarTienda'])->name('empleado.asignar-tienda');
Route::post('/empleado/{empleado}/asignar-tienda-empleado', [EmpleadoController::class,
 'relacionarTiendaConEmpleado'])->name('empleado.asignar-tienda-empleado');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

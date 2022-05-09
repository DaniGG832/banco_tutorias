<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\MovimientoController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

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

    return Redirect('/clientes');
    //return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::resource('clientes',ClienteController::class);

Route::get('/cuentas/create',[CuentaController::class,'create'])->name('cuentas.create');

Route::post('/cuentas/store',[CuentaController::class,'store'])->name('cuentas.store');

Route::resource('movimientos',MovimientoController::class);

Route::resource('cuentas',CuentaController::class);


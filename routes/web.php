<?php

use App\Http\Controllers\ClientesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\FacturasController;
use App\Http\Controllers\FacturalineasController;


Route::get('/', function(){
    return view('auth.login');
});


/* Forma 1 de mostrarlo, sin lo del ClientesController.php

// http://localhost/laravel/public/clientes/index
Route::get('/clientes/index', function () {
    return view('clientes.index');
});

// http://localhost/laravel/public/clientes/create
Route::get('/clientes/create', function () {
    return view('clientes.create');
});

// http://localhost/laravel/public/clientes/edit
Route::get('/clientes/edit', function () {
    return view('clientes.edit');
}); 

*/


/* Forma 2 de mostrarlo */
Route::get('/clientes', [ClientesController::class, 'index']);
Route::get('/clientes/create', [ClientesController::class, 'create']);
Route::get('/clientes/{id}/edit', [ClientesController::class, 'edit']);
Route::post('/clientes', [ClientesController::class, 'store']);
Route::delete('/clientes/{id}', [ClientesController::class, 'destroy']);
Route::post('/clientes/{id}', [ClientesController::class, 'update']);


Route::resource('clientes', ClientesController::class)->middleware('auth');
Route::resource('facturas', FacturasController::class)->middleware('auth');
Route::resource('facturalineas', FacturalineasController::class)->middleware('auth');


Route::get('/facturas/cliente/{id}', [FacturasController::class, 'facturascliente'])->middleware('auth');
Route::get('/facturalineas/facturas/{id_factura}', [FacturalineasController::class, 'facturalineasfactura'])->middleware('auth');

Auth::routes(['register' => false, 'reset' => false]);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});



<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ComprasController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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
    return view('welcome');
});

Route::resource('productos', ProductosController::class)->middleware(['auth','role:1']);
Route::resource('categorias', CategoriasController::class)->middleware(['auth','role:1']);
Route::resource('compras', ComprasController::class)->middleware(['auth','role:1']);;


Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/', [App\Http\Controllers\ProductosController::class, 'list'])->name('welcome');
Route::get('/listado', [App\Http\Controllers\ProductosController::class, 'listAll'])->name('listado');
Route::get('/listado/filter/{id}', [App\Http\Controllers\ProductosController::class, 'filter'])->name('listado.filter');
//Route::get('/comprasverificadas', [App\Http\Controllers\ComprasController::class, 'verificadas'])->name('compras.verificadas')->middleware(['auth','role:1']);
Route::post('/compras', 'App\Http\Controllers\ComprasController@store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

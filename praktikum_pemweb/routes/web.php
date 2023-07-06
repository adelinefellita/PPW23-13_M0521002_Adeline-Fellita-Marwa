<?php

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ManagerMenuController;
use App\Http\Controllers\MenuController;
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
    return view('home');
});

Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/table', [MenuController::class, 'index']) -> name('table.index');
    Route::post('/table', [MenuController::class, 'store']) -> name('table.store');
    Route::get('/table/{id}/edit', [MenuController::class, 'edit']) -> name('table.edit');
    Route::put('/table/{id}', [MenuController::class, 'update']) -> name('table.update');
    Route::delete('/{id}', [MenuController::class, 'destroy']) -> name('table.destroy');
});

Route::middleware(['auth', 'manager'])->group(function(){
    Route::get('/manager_table', [ManagerMenuController::class, 'index']) -> name('manager_table');
});

Auth::routes([
    'reset' => false,
    'verify' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ManagerController;
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

Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/{id}', [MainController::class, 'show'])->where('id', '[0-9]+')->name('news.show');

Route::prefix('manager')->group(function () {
    Route::get('/', [ManagerController::class, 'index'])->name('manager.index');
    Route::get('/{id}/edit', [ManagerController::class, 'edit'])->name('manager.edit');
    Route::get('/create', [ManagerController::class, 'create'])->name('manager.create');
    Route::post('/', [ManagerController::class, 'store'])->name('manager.store');
    Route::put('/{id}', [ManagerController::class, 'update'])->name('manager.update');
    Route::delete('/{id}', [ManagerController::class, 'delete'])->name('manager.delete');
});

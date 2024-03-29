<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\ItemsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::middleware('items')->name('item.')->prefix('item.')->group(function () {
Route::name('items.')->prefix('/items')->group(function () {
    Route::get('/all', [ItemsController::class, 'showAll'])->name('all');
    Route::get('/page/{page}', [ItemsController::class, 'index'])->name('page');
    Route::get('/one/{id}', [ItemsController::class, 'show'])->name('one');

    Route::post('/add', [ItemsController::class, 'store'])->name('add');
    Route::delete('/delete/{id}', [ItemsController::class, 'destroy'])->name('delete');
});

//Route::middleware('companies')->name('companies.')->prefix('/companies')->group(function () {
Route::name('companies.')->prefix('/companies')->group(function () {
    Route::get('/all', [CompaniesController::class, 'showAll'])->name('all');
    Route::get('/page/{page}', [CompaniesController::class, 'index'])->name('page');
    Route::get('/one/{id}', [CompaniesController::class, 'show'])->name('one');
    Route::get('/items/{id}', [CompaniesController::class, 'items'])->name('items');

    Route::post('/add', [CompaniesController::class, 'store'])->name('add');
    Route::delete('/delete/{id}', [CompaniesController::class, 'destroy'])->name('delete');
});

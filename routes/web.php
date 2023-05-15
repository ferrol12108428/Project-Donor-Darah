<?php

use App\Http\Controllers\DataController;
use App\Exports\DonorExport;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResponseController;

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

Route::get('/user', function () {
    return view('welcome');
});

Route::get('/', [DataController::class , 'index'])->name('index');

Route::get('/login', function () {
    return view('login');
})->name('login');


Route::post('/auth', [DataController::class, 'auth'])->name('auth');

Route::post('/store', [DataController::class, 'store'])->name('store');

Route::middleware('isLogin', 'cekRole:petugas')->group(function () {
    Route::get('/data/petugas', [DataController::class, 'dataPetugas'])->name('data.petugas');
    Route::get('/response/edit/{data_id}', [ResponseController::class, 'edit'])->name('response.edit');
    Route::patch('/response/update/{data_id}', [ResponseController::class, 'update'])->name('response.update');
});

Route::middleware('isLogin', 'cekRole:admin')->group(function () {
Route::get('/data', [DataController::class, 'data'])->name('data');
Route::post('/destroy/{id}', [DataController::class, 'destroy'])->name('delete');
Route::get('/export/pdf', [DataController::class, 'createPDF'])->name('export.pdf');
Route::get('/export/excel', [DataController::class,  'createExcel'])->name('export.excel');
});

Route::middleware(['isLogin', 'cekRole:admin,petugas'])->group(function () {
    Route::get('/logout', [DataController::class, 'logout'])->name('logout');
});
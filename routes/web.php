<?php

use App\Http\Controllers\API\TenderController;
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

Route::get('/', [TenderController::class, 'index']);
Route::get('/tenders/create', [TenderController::class, 'create'])->name("tenders.create");
Route::get('/tenders/{id}/edit', [TenderController::class, 'edit'])->name("tenders.edit");

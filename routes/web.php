<?php

use App\http\Controllers\BukuController;
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

Route::resource('buku', BukuController::class);
Route::get('/', [BukuController::class, 'index']);
	


// Route::get('/', function () {
//     return view('buku');
// });

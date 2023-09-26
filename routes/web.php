<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardsController;

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
    //return view('welcome');
    return view('menu');
});

Route::get('/add_card', [CardsController::class, 'addCard']);
Route::get('/list_card', [CardsController::class, 'listCard']);
Route::get('/delete_card/{delete}', [CardsController::class, 'deleteCard']);
Route::get('/buy_token/{token}', [CardsController::class, 'buyTokenCard']);

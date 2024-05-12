<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('users', 'users.index')->name('users.index')->middleware('auth');

Route::view('game', 'game.index')->name('game.index');

Route::get('chat', [ChatController::class, 'showChat'])->name('chat.index');

Route::post('chat/message', [ChatController::class, 'messageRecevied'])->name('chat.message');

Route::post('chat/greet/{user}', [ChatController::class, 'greetRecevied'])->name('chat.greet');

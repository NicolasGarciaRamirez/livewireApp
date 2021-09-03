<?php

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

// Route::get('/', App\Http\Livewire\PokeIndex::class);
Route::get('/chat', App\Http\Livewire\Chat::class);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function(){
    $mesages = App\Models\Message::with('user')->get();
    return view('chat', ['messages' => $mesages]);

})->middleware('auth');

Route::resource('messages', App\Http\Controllers\MessageController::class)->only([
    'index',
    'store'
]);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

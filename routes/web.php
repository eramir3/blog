<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EntryController;
use App\Http\Controllers\TweetController;

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

Route::redirect('/', '/entries');

Route::get('entries', [EntryController::class, 'index'])->name('entries.index');
Route::get('entries/{id}/show', [EntryController::class, 'show'])->name('entries.show');
Route::get('entries/users/{id}/show', [EntryController::class, 'indexByUserId'])->name('user.entries.index');


Route::get('tweets', [TweetController::class, 'indexByUserId'])->name('tweets.index');

Route::middleware(['auth:web','verified'])->group(function() {

    Route::get('entries/create', [EntryController::class, 'create'])->name('entries.create');
    Route::post('entries/store', [EntryController::class, 'store'])->name('entries.store');    
    Route::get('entries/{id}/edit', [EntryController::class, 'edit'])->name('entries.edit');
    Route::put('entries/{id}/update', [EntryController::class, 'update'])->name('entries.update');

    Route::post('tweets/store', [TweetController::class, 'store'])->name('tweets.store');
    Route::put('tweets/{id}/hide', [TweetController::class, 'hide'])->name('tweets.hide');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

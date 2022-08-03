<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TagController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth'])->name('dashboard');


Route::resource('/dashboard/tags',TagController::class)->middleware('auth');
Route::get('/tags/trash',[TagController::class,'trash'])->name('tags.trash');
Route::put('/tags/{tags}/restore',[TagController::class,'restore'])->name('tags.restore');
Route::delete('/tags/{tags}/force-delete',[TagController::class,'force-delete'])->name('tags.force-delete');

Route::resource('/dashboard/question',QuestionController::class)->middleware('auth');


require __DIR__.'/auth.php';
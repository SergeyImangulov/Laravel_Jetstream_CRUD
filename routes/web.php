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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/DBtest', function () {
//     $dbtest = DB::table('crud')->get();
//     return view('DBtest', compact('dbtest'));
// });

Route::get('/History', function () {
    $posts = App\Models\Posts::all();
    return view('History', compact('posts'));
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Route::get('/', [TaskController::class, 'index'])->name('index');
Route::resource('tasks', App\Http\Controllers\TaskController::class);
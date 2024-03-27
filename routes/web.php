<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/',[DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::put('/check-task/{id}', [DashboardController::class, 'checkTask'])->name('task.check');

    Route::get('/create-todo', [TaskController::class, 'create'])->name('task.create');
    Route::post('/create-todo', [TaskController::class, 'store'])->name('task.store');
    Route::get('/edit-todo/{id}', [TaskController::class, 'edit'])->name('task.edit');
    Route::put('/edit-todo/{id}', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/delete-todo/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
});


require __DIR__.'/auth.php';

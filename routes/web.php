<?php

use App\Http\Controllers\CheckInController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CheckInSearchController;
use App\Http\Controllers\CheckOutSearchController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

Route::get('/dashboard',  [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    //Route::get('/borrowed', 'BorrowedController@viewAllData')->name('borrowed.index');
    //Route::post('/borrowed', [StudentController::class, 'viewAllData'])->name('dashboard');
    Route::post('/save-student', [StudentController::class, 'saveStudent'])->name('save-student');
    Route::post('/borrowed/{id}/update-status', [StudentController::class, 'updateStatus'])->name('update-status');
    Route::post('/students/search', [StudentController::class, 'search'])->name('students.search');
    //Route::post('/students/return-book', [StudentController::class, 'return'])->name('students.return-book');

    Route::get('/check-in', [CheckInController::class, 'store'])->name('check-in');
    Route::post('/check-out', [CheckOutController::class, 'store'])->name('check-out');

    Route::get('/check-in/search', [CheckInSearchController::class, 'index'])->name('check-in-search');
    Route::get('/check-out/search', [CheckOutSearchController::class, 'index'])->name('check-out-search');

    Route::get('/students', [StudentController::class, 'index']);
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/return-book', [StudentController::class, 'return'])->name('return-book');
});



require __DIR__.'/auth.php';

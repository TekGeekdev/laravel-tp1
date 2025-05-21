<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;
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
    return view('layouts/app');
});


Route::get('/students', [StudentController::class, 'index'])->name('student.index');
Route::get('/create/student', [StudentController::class, 'create'])->name('student.create');
Route::get('/student/{student}', [StudentController::class, 'show'])->name('student.show');
Route::get('/edit/student/{student}', [StudentController::class, 'edit'])->name('student.edit');
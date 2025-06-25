<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\SetLocaleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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

Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');


Route::get('/registration', [UserController::class, 'create'])->name('user.create');
Route::post('/registration', [UserController::class, 'store'])->name('user.store');

Route::get('/', [PostController::class, 'index'])->name('post.index');

Route::middleware('auth')->group(function () {
    Route::get('/students', [StudentController::class, 'index'])->name('student.index');
    Route::get('/create/student', [StudentController::class, 'create'])->name('student.create');
    Route::post('/create/student', [StudentController::class, 'store'])->name('student.store');
    Route::get('/student/{student}', [StudentController::class, 'show'])->name('student.show');
    Route::get('/edit/student/{student}', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/edit/student/{student}', [StudentController::class, 'update'])->name('student.update');
    Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('student.delete');

    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/edit/user/{user}', [UserController::class, 'edit'])->name('user.edit');

    Route::get('/create/post', [PostController::class, 'create'])->name('post.create');
    Route::post('/create/post', [PostController::class, 'store'])->name('post.store');
    Route::get('/edit/post/{post}', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/edit/post/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');
});
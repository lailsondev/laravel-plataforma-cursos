<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/curso', [CourseController::class, 'index'])->name('course.index')->middleware('auth');
Route::get('/cursos', [CoursesController::class, 'index'])->name('courses.index');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::get('/aula', [LessonController::class, 'index'])->name('lesson.index');
Route::get('/contato', [ContactController::class, 'index'])->name('contact.index');
Route::resource('logar', LoginController::class)->only([
    'index', 'store'
]);
Route::delete('/deslogar', [LoginController::class, 'destroy'])->name('logar.destroy');


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
Route::get('/curso', [CourseController::class])->name('course.index');
Route::get('/cursos', [CoursesController::class])->name('courses.index');
Route::get('/checkout', [CheckoutController::class])->name('checkout.index');
Route::get('/aula', [LessonController::class])->name('lesson.index');
Route::get('/contato', [ContactController::class])->name('contact.index');
Route::resource('logar', LoginController::class)->only(['index', 'store']);

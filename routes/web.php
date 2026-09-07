<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\EmailVerifyController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/curso/{course:slug}', [CourseController::class, 'show'])->name('course.show');
Route::get('/cursos', [CoursesController::class, 'index'])->name('courses.index');

Route::middleware('can:access,course,lesson')
    ->get('/curso/{course:slug}/aula/{lesson:slug}', [LessonController::class, 'show'])
    ->name('lesson.show');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::get('/contato', [ContactController::class, 'index'])->name('contact.index');

Route::get('/email/verify', [EmailVerifyController::class, 'index'])->name('verification.notice')->middleware('auth');
Route::post('/email/verification-notification', [EmailVerifyController::class, 'send'])->name('verification.send')->middleware('auth');
Route::get('/email/verify/{id}/{hash}', [EmailVerifyController::class, 'verify'])->name('verification.verify')->middleware(['auth', 'signed']);

Route::controller(UserController::class)
    ->prefix('usuario')
    ->name('user.')
    ->group(function () {
        Route::middleware('guest')->group(function () {
            Route::get('/cadastrar', 'create')->name('create');
            Route::post('/', 'store')->name('store');
        });
        Route::middleware('auth')->group(function () {
            Route::put('/atualizar/{user}', 'update')->name('update');
        });
    });

Route::resource('logar', LoginController::class)->only([
    'index', 'store',
]);
Route::delete('/deslogar', [LoginController::class, 'destroy'])->name('logar.destroy');

Route::post('/comentario/responder', [ReplyController::class, 'store'])->middleware('auth')->name('reply.store');
Route::post('/comentario/{id}', [CommentController::class, 'store'])->middleware('auth')->name('comment.store');

Route::middleware('guest')->controller(ForgotPasswordController::class)
    ->group(function () {
        Route::get('/esqueci-senha', 'index')->name('forgot-password.index');
        Route::post('/esqueci-senha', 'store')->name('forgot-password.store');
        Route::get('/esqueci-senha/{token}', 'edit')->name('password.reset');
        Route::put('/esqueci-senha', 'update')->name('forgot-password.update');
    });

Route::middleware('auth')->controller(ProfileController::class)
    ->prefix('perfil')
    ->name('profile.')
    ->group(function () {
        Route::get('/editar', 'edit')->name('edit');
        Route::post('/salvar', 'store')->name('store');
        Route::put('/atualizar/{profile}', 'update')->name('update')
            ->middleware('can:update,profile');
        Route::put('/avatar/{profile}', 'avatar')->name('avatar')
            ->middleware('can:update,profile');
    });

Route::fallback([ErrorController::class, 'index']);

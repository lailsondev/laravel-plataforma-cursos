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
use App\Http\Controllers\MyCoursesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rotas Públicas (URLs em PT-BR, names em EN)
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/cursos', [CoursesController::class, 'index'])->name('courses.index');
Route::get('/curso/{course:slug}', [CourseController::class, 'show'])->name('course.show');
Route::get('/contato', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contato', [ContactController::class, 'store'])->name('contact.store')->middleware('throttle:3,1,contact');
Route::get('/finalizar', [CheckoutController::class, 'index'])->name('checkout.index');

/*
|--------------------------------------------------------------------------
| Autenticação - Visitantes (guest)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    // Cadastro
    Route::controller(UserController::class)->prefix('usuario')->name('user.')->group(function () {
        Route::get('/cadastrar', 'create')->name('create');
        Route::post('/', 'store')->name('store');
    });

    // Login - URL em PT-BR (/logar), name em EN (login.*)
    Route::controller(LoginController::class)->group(function () {
        Route::get('/logar', 'index')->name('login.index');
        Route::post('/logar', 'store')->name('login.store');
    });

    // Esqueci senha - URL PT-BR, name EN
    Route::controller(ForgotPasswordController::class)->group(function () {
        Route::get('/esqueci-senha', 'index')->name('forgot-password.index');
        Route::post('/esqueci-senha', 'store')->name('forgot-password.store');
        Route::get('/esqueci-senha/{token}', 'edit')->name('password.reset');
        Route::put('/esqueci-senha', 'update')->name('forgot-password.update');
    });
});

/*
|--------------------------------------------------------------------------
| Autenticação - Logado
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::delete('/deslogar', [LoginController::class, 'destroy'])->name('logout');
    Route::put('/usuario/atualizar/{user}', [UserController::class, 'update'])->name('user.update')->middleware('throttle:3,1,update-user');
});

/*
|--------------------------------------------------------------------------
| Área do Aluno (auth + verified)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/meus-cursos', [MyCoursesController::class, 'index'])->name('mycourses.index');
    Route::get('/curso/{course:slug}/aula/{lesson:slug}', [LessonController::class, 'show'])->middleware('can:access,course,lesson')->name('lesson.show');

    // Comentários - URL PT-BR, name EN
    Route::post('/comentario/responder', [ReplyController::class, 'store'])->name('reply.store');
    Route::post('/comentario/{id}', [CommentController::class, 'store'])->name('comment.store');
});

/*
|--------------------------------------------------------------------------
| Verificação de E-mail (auth)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/email/verificar', [EmailVerifyController::class, 'index'])->name('verification.notice');
    Route::post('/email/notificacao', [EmailVerifyController::class, 'send'])->name('verification.send');
    Route::get('/email/verificar/{id}/{hash}', [EmailVerifyController::class, 'verify'])->name('verification.verify')->middleware('signed');
});

/*
|--------------------------------------------------------------------------
| Perfil (auth + verified)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->controller(ProfileController::class)->prefix('perfil')->name('profile.')->group(function () {
    Route::get('/editar', 'edit')->name('edit');
    Route::post('/salvar', 'store')->name('store');
    Route::put('/atualizar/{profile}', 'update')->name('update')->middleware('can:update,profile', 'throttle:3,1,update-profile');
    Route::put('/avatar/{profile}', 'avatar')->name('avatar')->middleware('can:update,profile', 'throttle:3,1,update-avatar');
});

/*
|--------------------------------------------------------------------------
| Fallback 404
|--------------------------------------------------------------------------
*/
Route::fallback([ErrorController::class, 'index']);

<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ReminderController;
use App\Http\Middleware\AdminAuth;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Request;

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
    return Inertia::render('Dashboard', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    }
    )->name('dashboard');
    Route::get('horario', [ActivityController::class, 'index'])->name('horario');
    Route::post('horario', [ActivityController::class, 'store'])->name('horario.store');
    Route::get('/agenda', [ReminderController::class, 'index'])->name('agenda');
    Route::post('/agenda', [ReminderController::class, 'store'])->name('agenda.store');
    Route::get('/agenda/{reminder}', [ReminderController::class, 'show'])->name('agenda.show');
    Route::put('/agenda/{reminder}', [ReminderController::class, 'update'])->name('agenda.update');
});

Route::middleware([AdminAuth::class])->group(function () {
    Route::get('/admin', function (User $user) {
        return Inertia::render('Admin', ['users' => $user->all()]);
    }
    )->name('admin');
    Route::get('/users/{user}', function (User $user) {
        return Inertia::render('Admin/User', ['user' => $user]);
    }
    )->name('admin.user');
});
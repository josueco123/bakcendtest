<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TaskController;


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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/tasksall', [TaskController::class, 'index']);

Route::get('/tareas/crear', [TaskController::class, 'create'])
->middleware(['auth', 'verified'])->name('createtasks');

Route::post('/tareas/crear', [TaskController::class, 'store'])
->middleware(['auth', 'verified'])->name('savetasks');

Route::get('/tareas/consultar', [TaskController::class, 'getMyTask'])
->middleware(['auth', 'verified']);

Route::post('/tareas/completar', [TaskController::class, 'completTask'])
->middleware(['auth', 'verified']);

Route::post('/tareas/borrar', [TaskController::class, 'deletTask'])
->middleware(['auth', 'verified']);

Route::get('/tareas/show', [TaskController::class, 'showMyTask'])
->middleware(['auth', 'verified'])->name('showmytask');

Route::get('/tareas/actualizar/{id?}', [TaskController::class, 'editTask'])
->middleware(['auth', 'verified'])->name('editwmytask');

Route::post('/tareas/actualizar/{id?}', [TaskController::class, 'UpdateTask'])
->middleware(['auth', 'verified']);

Route::get('/tareas/consultar/pendientes', [TaskController::class, 'getMyPendingTasks'])
->middleware(['auth', 'verified']);

Route::get('/tareas/consultar/finalizadas', [TaskController::class, 'getMyFinishedTasks'])
->middleware(['auth', 'verified']);

Route::get('/tareas/consultar/fecha', [TaskController::class, 'getMyTasksByDue'])
->middleware(['auth', 'verified']);

Route::get('/tareas/pendientes/consultar', [TaskController::class, 'showMyPendingTask'])
->middleware(['auth', 'verified'])->name('pendingtasks');

Route::get('/tareas/finalizadas/consultar', [TaskController::class, 'showMyFinishedTask'])
->middleware(['auth', 'verified'])->name('finishedtasks');

Route::get('/tareas/fecha/consultar', [TaskController::class, 'showByDuegTask'])
->middleware(['auth', 'verified'])->name('duetasks');



require __DIR__.'/auth.php';

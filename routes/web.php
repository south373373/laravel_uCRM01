<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
// 追記
use App\Http\Controllers\InertiaTestController;
use App\Http\Controllers\ItemController;

// 追記分
Route::resource('/items', ItemController::class)
    ->middleware(['auth', 'verified']);

// 仮作成
Route::get('/inertia-test',function(){
    return Inertia::render('InertiaTest');
});
Route::get('/component-test',function(){
    return Inertia::render('ComponentTest');
});

// 自作画面
Route::get('/inertia/index',[InertiaTestController::class, 'index'])->name('inertia.index');
Route::get('/inertia/create',[InertiaTestController::class, 'create'])->name('inertia.create');
Route::post('/inertia',[InertiaTestController::class, 'store'])->name('inertia.store');
Route::get('/inertia/show/{id}',[InertiaTestController::class, 'show'])->name('inertia.show');
Route::delete('/inertia/{id}',[InertiaTestController::class, 'delete'])->name('inertia.delete');


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



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';

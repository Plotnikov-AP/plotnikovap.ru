<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Middleware\LanguageMiddleware;

Route::get('/', function () {
    return redirect()->route('main');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/main', [MainController::class, 'main'])->name('main');
Route::get('/contacts', [MainController::class, 'contacts'])->name('contacts');
Route::get('/pyatnashki', [MainController::class, 'pyatnashki'])->name('pyatnashki');
Route::post('/language-switch', [MainController::class, 'languageSwitch'])->name('language.switch');
Route::get('/page-in-work', [MainController::class, 'pageInWork'])->name('page.in.work');


require __DIR__.'/auth.php';

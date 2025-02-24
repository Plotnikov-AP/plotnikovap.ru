<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;
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
Route::get('/pyatnashki', [MainController::class, 'pyatnashki'])->name('pyatnashki');
Route::get('/chats', [ChatController::class, 'chats'])
->middleware('auth')                                  
->name('chats');
Route::post('/chats/add_chat', [ChatController::class, 'add_chat']);
Route::get('/chat/{id}', [ChatController::class, 'chat'])
->middleware('auth')                                      
->name('chat');
Route::post('/chat/add_message', [MessageController::class, 'add_message']);     
Route::post('/chat/del_message/{id}', [MessageController::class, 'del_message']);
Route::get('/contacts', [MainController::class, 'contacts'])->name('contacts');                                     
Route::post('/language-switch', [MainController::class, 'languageSwitch'])->name('language.switch');
Route::get('/page-in-work', [MainController::class, 'pageInWork'])->name('page.in.work');
Route::get('/page404', [MainController::class, 'page404'])->name('page404');


require __DIR__.'/auth.php';

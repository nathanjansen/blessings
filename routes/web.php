<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/app', \App\Livewire\Home::class)
    ->middleware(['web', 'auth'])
    ->name('index');

Route::get('/unsubscribe-notification/{list}/{user}', \App\Http\Controllers\UnsubscribeNotification::class)
    ->name('unsubscribe-notification');

Route::get('/mail', function() {
    $user = \App\Models\User::query()->first();

    return (new \App\Notifications\Reminder())->toMail($user);
})->middleware(['web', 'auth'])->name('mail');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

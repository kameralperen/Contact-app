<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProfileController;

Route::middleware('localization')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('home');

    Route::middleware('auth', 'localization')->group(function () {
        Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create')->middleware('role:admin');
        Route::post('/contacts/create', [ContactController::class, 'store'])->name('contacts.store')->middleware('role:admin');
        Route::get('/search', [SearchController::class, 'index'])->name('search');
    });

    Route::middleware(['auth', 'role:admin', 'localization'])->group(function () {
        Route::get('/contacts/edit/{id}', [ContactController::class, 'edit'])->name('contacts.edit');
        Route::put('/contacts/edit/{id}', [ContactController::class, 'update'])->name('contacts.update');
        Route::delete('/contacts/delete/{id}', [ContactController::class, 'delete'])->name('contacts.delete');
    });

    Route::prefix('admin')->middleware(['auth', 'admin', 'localization'])->group(function () {
        Route::get('/home', [AdminController::class, 'page'])->name('admin.home');
        Route::get('/users', [AdminController::class, 'adminUsers'])->name('admin.users');
        Route::get('/contacts', [AdminController::class, 'adminContacts'])->name('admin.contacts');
    });

    Route::prefix('admin')->middleware(['auth', 'admin', 'localization'])->group(function () {
        Route::get('/user/{id}/edit', [AdminController::class, 'userEdit'])->name('user.edit');
        Route::put('/user/{id}', [AdminController::class, 'userUpdate'])->name('user.update');
        Route::put('/user/makeAdmin/{id}', [AdminController::class, 'makeUserToAdmin'])->name('admin.makeAdmin');
        Route::delete('/user/{id}', [AdminController::class, 'userDestroy'])->name('user.destroy');
    });

    Route::prefix('admin')->middleware(['auth', 'admin', 'localization'])->group(function () {
        Route::get('/contact/{id}/edit', [AdminController::class, 'contactEdit'])->name('contact.edit');
        Route::put('/contact/{id}', [AdminController::class, 'contactUpdate'])->name('contact.update');
        Route::delete('/contact/{id}', [AdminController::class, 'contactDestroy'])->name('contact.destroy');
    });

    Route::prefix('locale')->group(function () {
        Route::get('{lang}', [LocaleController::class, 'setlocale']);
    });


    Route::get('/switch-theme/{theme}', [LocaleController::class, 'switchTheme'])
        ->name('switch.theme')
        ->middleware('auth');


    Route::get('/contacts/{id}', [ContactController::class, 'show'])
        ->name('contacts.show')
        ->middleware('auth', 'role:user');

});





require __DIR__ . '/auth.php';

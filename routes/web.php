<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


Route::middleware(['guest'])->group(function() {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register/post', [RegisterController::class, 'post'])->name('register.submit');


});
Route::get('/',[GuestController::class, 'index'])->name('dashboard.guest');
Route::get('/back', [GuestController::class, 'back'])->name('back');


Route::middleware(['auth'])->group(function () {


    Route::prefix('/dashboard')->group(function() {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/album/{id}', [DashboardController::class, 'viewAlbum'])->name('view.album');
        Route::get('/dashboard/sort/{albumId}', [DashboardController::class, 'sortPhotosByAlbum'])->name('dashboard.sort');


        // Route Album
        Route::get('/album',[AlbumController::class, 'index'])->name('album');
        Route::post('/album/post',[AlbumController::class, 'post'])->name('album.post');

        // Route Foto
        Route::get('/foto', [FotoController::class, 'index'])->name('foto');
        Route::post('/foto/post', [FotoController::class, 'post'])->name('foto.post');
        Route::delete('/delete-photo/{id}', [FotoController::class, 'delete'])->name('deletePhoto');

        // Route Like
        Route::post('/like/{id}', [FotoController::class, 'like'])->name('like');

        // Router Comment
        Route::get('/comment/{id}',[CommentsController::class, 'show'])->name('comment');
        Route::post('/add-comment', [CommentsController::class, 'post'])->name('add.comment');
    });
});


Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



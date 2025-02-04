<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;



Route::get('/example', function () {
    return view('example');
});

Route::get('/edit_profile', function () {
    return view('edit_profile.edit_profile');
});
Route::get('/comment', function () {
    return view('comment_discussion.comment');
});

Route::get('/new_discussion', function () {
    return view('create_new_discussion.new_discussion');
});



// Route::get('/login', function () {
//     return view('auth.login.login');
// });

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', function () {
    return view('auth.register.resgister');
});

Route::get('/forget', function () {
    return view('auth.forget.forget');
});

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', function () {
        return view('home.home');
    });
});


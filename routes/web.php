<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiskusiController;



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

Route::post('new_discussion', [DiskusiController::class, 'add'])->name('diskusi.add');




// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardController::class, 'index']);


Route::get('/home', [DiskusiController::class, 'index']);


// Route::get('/home', function () {
//     return view('home.home');
// });

Route::get('/login', function () {
    return view('auth.login.login');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', function () {
    return view('auth.register.resgister');
});

Route::post('register', [RegisterController::class, 'add']);


Route::get('/forget', function () {
    return view('auth.forget.forget');
});

Route::get('/comment/{id_diskusi}', [DiskusiController::class, 'show']);


/*Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', function () {
        return view('home.home');
    });
});*/


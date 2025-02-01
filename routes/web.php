<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/example', function () {
    return view('example');
});

Route::get('/edit_profile', function () {
    return view('edit_profile.edit_profile');
});
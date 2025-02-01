<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/example', function () {
    return view('example');
});

Route::get('/comment', function () {
    return view('comment_discussion.comment');
});

Route::get('/new-discussion', function () {
    return view('create_new_discussion.new_discussion');
});
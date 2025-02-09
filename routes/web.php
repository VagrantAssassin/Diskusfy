<?php
use Illuminate\Http\Request;
use App\Exports\DiskusiExport;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\BalasanController;
use App\Http\Controllers\DiskusiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Balasan2Controller;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryAdmin;
use App\Http\Controllers\DiscussionAdminController;
use App\Http\Controllers\ReplyAdminController;
use App\Http\Controllers\ReportController;


Route::get('/popular-discussions', [DiskusiController::class, 'popular'])->name('popular.discussions');

Route::get('/search', [DiskusiController::class, 'search'])->name('diskusi.search');

Route::get('/exportExcel', [ReportController::class, 'exportExcel'])->name('export.excel');

Route::post('/vote/toggle-like', [VoteController::class, 'toggleLike'])->name('vote.toggle');

Route::get('/reply', function () {
    return view('reply_admin.reply');
});


Route::get('/reply/data', [ReplyAdminController::class, 'index']);
Route::get('/reply/{id}', [ReplyAdminController::class, 'edit']);
Route::put('/reply/{id}', [ReplyAdminController::class, 'update']);
Route::delete('/reply/{id}', [ReplyAdminController::class, 'destroy']);

Route::get('/discussionAdmin', function () {
    return view('discussion_admin.discussionAdmin');
});

Route::post('/reply/{id_balasan}', [Balasan2Controller::class, 'store']);

Route::get('/discussionAdmin/data', [DiscussionAdminController::class, 'index']);
Route::get('/discussionAdmin/{id}', [DiscussionAdminController::class, 'edit']);
Route::put('/discussionAdmin/{id}', [DiscussionAdminController::class, 'update']);
Route::delete('/discussionAdmin/{id}', [DiscussionAdminController::class, 'destroy']);

Route::get('/categoryAdmin', function () {
    return view('category_admin.categoryAdmin');
});
Route::post('/categoryAdmin', [CategoryAdmin::class, 'store']);
Route::get('/categoryAdmin/data', [CategoryAdmin::class, 'index']);
Route::get('/categoryAdmin/{id}', [CategoryAdmin::class, 'edit']);
Route::put('/categoryAdmin/{id}', [CategoryAdmin::class, 'update']);
Route::delete('/categoryAdmin/{id}', [CategoryAdmin::class, 'destroy']);

Route::get('/users', function () {
    return view('users.users');
});

Route::get('/users/data', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'edit']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::get('/dashboardAdmin', [PanelController::class, 'index'])->name('dashboard.admin');

Route::get('/dashboard-stats', [PanelController::class, 'stats'])->name('dashboard.stats');


Route::post('/balasan/store/{id_diskusi}', [BalasanController::class, 'store']);

Route::post('/reply/{id_balasan}', [Balasan2Controller::class, 'store']);

Route::delete('/delete-comment/{id_balasan}', [BalasanController::class, 'destroy']);

Route::delete('/delete-reply/{id_balasan2}', [Balasan2Controller::class, 'destroy']);

//Route::post('/diskusi/{id_diskusi}/balasan', [BalasanController::class, 'store'])->middleware('auth')->name('balasan.store');

// Route::post('balasan/{id_diskusi}', [BalasanController::class, 'store'])->name('balasan.store');

// Route::post('/balasan/store/{id_diskusi}', [BalasanController::class, 'store']);

Route::get('/loginAdmin', function () {
    return view('auth.login.loginAdmin');
});

Route::get('/dashboardAdmin', function () {
    return view('welcomeAdmin');
});


Route::get('/api/profile/{uid}', [ProfileController::class, 'show']);

Route::post('/api/profile/update', [ProfileController::class, 'update']);

Route::post('/chat', [ChatController::class, 'handleChat'])->name('chat.handle');

Route::get('/', [DashboardController::class, 'index']);

Route::get('/example', function () {
    return view('example');
});

Route::get('/edit_profile', function () {
    return view('edit_profile.edit_profile');
});

// Route::get('/comment', function () {
//     return view('comment_discussion.comment');
// });

Route::get('/new_discussion', function () {
    return view('create_new_discussion.new_discussion');
});

Route::post('new_discussion', [DiskusiController::class, 'add'])->name('diskusi.add');

Route::get('/home', [DiskusiController::class, 'index']);

Route::get('/home', [DiskusiController::class, 'index'])->name('diskusi.index');

Route::get('/category/{id_kategori}', [DiskusiController::class, 'filterByCategory'])->name('diskusi.filterByCategory');

Route::get('/login', [AuthController::class, 'loginPage']);

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function () {
    return view('auth.register.resgister');
});

Route::post('register', [RegisterController::class, 'add']);

Route::get('/forget', function () {
    return view('auth.forget.forget');
});

Route::get('/comment/{id_diskusi}', [DiskusiController::class, 'show']);

// Route::get('/export-diskusi', function () {
//     return Excel::download(new DiskusiExport, 'diskusi.xlsx');
// })->name('export.diskusi');
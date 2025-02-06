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

//Route::post('/diskusi/{id_diskusi}/balasan', [BalasanController::class, 'store'])->middleware('auth')->name('balasan.store');

// Route::post('balasan/{id_diskusi}', [BalasanController::class, 'store'])->name('balasan.store');

Route::post('/balasan/store/{id_diskusi}', [BalasanController::class, 'store']);


// API untuk mendapatkan data profil berdasarkan uid
Route::get('/api/profile/{uid}', [ProfileController::class, 'show']);

// API untuk memperbarui profil
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


/*route kategori*/
Route::get('/indonesia', function () {
    return view('category.indonesia');
});

Route::get('/matematika', function () {
    return view('category.matematika');
});

Route::get('/coding', function () {
    return view('category.coding');
});

Route::get('/hukum', function () {
    return view('category.hukum');
});

Route::get('/algoritma', function () {
    return view('category.algoritma');
});

Route::get('/export-diskusi', function () {
    return Excel::download(new DiskusiExport, 'diskusi.xlsx');
})->name('export.diskusi');
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

use App\Http\Controllers\PanelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryAdmin;

// Route untuk menampilkan halaman categoryAdmin (view)
Route::get('/categoryAdmin', function () {
    return view('category_admin.categoryAdmin');
});

// Route API untuk kategori (mengembalikan JSON)
Route::get('/categoryAdmin/data', [CategoryAdmin::class, 'index']);
Route::get('/categoryAdmin/{id}', [CategoryAdmin::class, 'edit']);
Route::put('/categoryAdmin/{id}', [CategoryAdmin::class, 'update']);
Route::delete('/categoryAdmin/{id}', [CategoryAdmin::class, 'destroy']);

// Route untuk menampilkan halaman daftar pengguna (view)
Route::get('/users', function () {
    return view('users.users');
});

// Route API untuk mengambil data JSON pengguna
Route::get('/users/data', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'edit']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

// Route untuk menampilkan halaman dashboard (misalnya dashboardAdmin atau welcomeAdmin)
Route::get('/dashboardAdmin', [PanelController::class, 'index'])->name('dashboard.admin');

// Route API untuk mengambil data statistik dashboard
Route::get('/dashboard-stats', [PanelController::class, 'stats'])->name('dashboard.stats');


// Rute untuk menyimpan komentar
Route::post('/balasan/store/{id_diskusi}', [BalasanController::class, 'store']);

// Rute untuk menghapus komentar
Route::delete('/delete-comment/{id_balasan}', [BalasanController::class, 'destroy']);

//Route::post('/diskusi/{id_diskusi}/balasan', [BalasanController::class, 'store'])->middleware('auth')->name('balasan.store');

// Route::post('balasan/{id_diskusi}', [BalasanController::class, 'store'])->name('balasan.store');

// Route::post('/balasan/store/{id_diskusi}', [BalasanController::class, 'store']);

Route::get('/loginAdmin', function () {
    return view('auth.login.loginAdmin');
});

Route::get('/dashboardAdmin', function () {
    return view('welcomeAdmin');
});


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

// Menampilkan halaman login
Route::get('/login', [AuthController::class, 'loginPage']);

// Menangani proses login (POST request dari Firebase)
Route::post('/login', [AuthController::class, 'login']);

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
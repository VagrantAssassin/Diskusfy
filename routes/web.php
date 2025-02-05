<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiskusiController;

Route::post('/chatbot', function (Request $request) {
    $message = $request->input('message');

    $API_KEY = "AIzaSyCwvzFM0By4tApqp6hY_bmEYTKge1-tJg0"; // Ganti dengan API Key yang baru dan aman

    $response = Http::post("https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateText?key=$API_KEY", [
        "contents" => [
            ["parts" => [["text" => $message]]]
        ]
    ]);

    if ($response->successful()) {
        return response()->json([
            'reply' => $response->json()['candidates'][0]['content'] ?? "Maaf, saya tidak mengerti."
        ]);
    } else {
        return response()->json([
            'error' => 'Failed to fetch reply from API'
        ], 500);
    }
});


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
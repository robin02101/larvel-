<?php
use App\Models\myClass;
use App\Models\Book;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//     $a = 0;
//     $b = (object)['id'=>1];
//     $books = Book::get();
    // dd($books);
    // return Inertia::render('text', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);
    // return Inertia::render('text',[
    //     'books' => $books,
    //     'count'=>5,
    //     'title'=>'黃昏書店',
    // ]);
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/CourseClass', [TestController::class,'index'])->middleware(['auth', 'verified']);


Route::get('/text', [TestController::class,'indexTeacher'])->middleware(['auth', 'verified']);
Route::get('/addTeacher', [TestController::class,'classIndex'])->middleware(['auth', 'verified']);
Route::get('/changeTeacher', [TestController::class,'classIndex2'])->middleware(['auth', 'verified']);

// Route::get('/text', function () {
//     return Inertia::render('text');
// })->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/semester', function () {
    return Inertia::render('semester');
})->middleware(['auth', 'verified']);

Route::get('/saveClass', function () {
    return Inertia::render('saveClass');
})->middleware(['auth', 'verified']);

Route::get('/changeClass', function () {
    return Inertia::render('changeClass');
})->middleware(['auth', 'verified']);

// Route::get('/addTeacher', function () {
//     return Inertia::render('addTeacher');
// })->middleware(['auth', 'verified']);

// Route::get('/changeTeacher', function () {
//     return Inertia::render('changeTeacher');
// })->middleware(['auth', 'verified']);


Route::get('/changeSemester', function () {
    return Inertia::render('changeSemester');
})->middleware(['auth', 'verified']);

Route::get('/addSemester', function () {
    return Inertia::render('addSemester');
})->middleware(['auth', 'verified']);

// Route::get('/addBooks', [TestController::class,'store'])->middleware(['auth', 'verified']);

// Route::post('/addBooks', [TestController::class,'add'])->middleware(['auth', 'verified']);

// Route::post('/removeBooks', [TestController::class,'remove'])->middleware(['auth', 'verified']);

Route::post('/addClasses', [TestController::class,'add'])->middleware(['auth', 'verified']);

Route::post('/removeClasses', [TestController::class,'remove'])->middleware(['auth', 'verified']);

Route::post('/addTeacher', [TestController::class,'addTeacher'])->middleware(['auth', 'verified']);
Route::post('/removeTeacher', [TestController::class,'removeTeacher'])->middleware(['auth', 'verified']);


Route::post('/updateTeacher', [TestController::class,'updateTeacher'])->middleware(['auth', 'verified']);
Route::post('/updateClasses', [TestController::class,'updateClasses'])->middleware(['auth', 'verified']);

Route::post('/addId', [TestController::class,'addId'])->middleware(['auth', 'verified']);
Route::post('/teacherAddid', [TestController::class,'teacherAddid'])->middleware(['auth', 'verified']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

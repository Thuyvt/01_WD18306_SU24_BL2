<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\NhacsiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanPhamController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::method($uri, $callback);
// method: get, post, put, patch, delete
Route::get('/', function () {
     return view('welcome'); // Hiển thị view
//    // return "Hello World!"; // Hiển thị chuỗi
//    // return ['phở bò', 'cơm rang']; // Hiển thị mảng
//    return response()->json([
//        'name' => 'Vũ Thị Thúy',
//        'email' => 'thuyvt66@fpt.edu.vn'
//    ]); // Hiển thị dạng object json
})->name('welcome');

Route::get('/user/{id}/{name?}', function(string $id, string $name = null) {
    echo route('welcome') . "<br>";
    return 'User:' .$id . '- Name: ' . $name;
})
// ->where('id', '[0-9]+') // ràng buộc 1 điều kiện
-> where([
    'id' => '[0-9]+',
    'name' => '[a-zA-Z0-9]+'
]); // ràng buộc nhiều điều kiện

// DAY02
// Tao controller: php artisan make:controller SanPhamController
Route::get('/san-pham', [SanPhamController::class, 'list'])->name('san-pham.list');
Route::get('/san-pham/{id}', [SanPhamController::class, 'detail'])->name('san-pham.detail');
Route::get('/san-pham/xoa/{id}', [SanPhamController::class, 'delete']);


// Route Nhacsi
Route::get('/nhacsi', [NhacsiController::class, 'index'])->name('nhacsi.index');
Route::get('/nhacsi/create', [NhacsiController::class, 'create'])->name('nhacsi.create');
Route::get('/nhacsi/{id}/edit', [NhacsiController::class, 'edit'])->name('nhacsi.edit');
Route::get('/nhacsi/{id}/show', [NhacsiController::class, 'show'])->name('nhacsi.show');
Route::post('/nhacsi/store', [NhacsiController::class, 'store'])->name('nhacsi.store');
Route::put('/nhacsi/{id}/update', [NhacsiController::class, 'update'])->name('nhacsi.update');
Route::delete('/nhacsi/{id}/destroy', [NhacsiController::class, 'destroy'])->name('nhacsi.destroy');

// Route resource
Route::resource('books', BookController::class);

// Login
Route::get('auth/login' ,[LoginController::class, 'index'])
    ->name('login');
Route::post('auth/login' ,[LoginController::class, 'login'])
    ->name('login');
Route::get('auth/logout' ,[LoginController::class, 'logout'])
    ->name('logout');
Route::get('auth/verify/{token}' ,[LoginController::class, 'verify'])
    ->name('verify');

// Register
Route::get('auth/register' ,[RegisterController::class, 'index'])
    ->name('register');
Route::post('auth/register' ,[RegisterController::class, 'register'])
    ->name('register');

Route::get('admin', function () {
    return 'ĐÂy là admin';
})->middleware(\App\Http\Middleware\CheckAdminMiddleware::class);

Route::get('admin', function () {
    return 'Đây là admin';
})->middleware('isAdmin');

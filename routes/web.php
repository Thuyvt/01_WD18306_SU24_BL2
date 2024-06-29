<?php

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
    // return view('welcome'); / Hiển thị view
    // return "Hello World!"; // Hiển thị chuỗi
    // return ['phở bò', 'cơm rang']; // Hiển thị mảng
    return response()->json([
        'name' => 'Vũ Thị Thúy',
        'email' => 'thuyvt66@fpt.edu.vn'
    ]); // Hiển thị dạng object json
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





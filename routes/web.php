<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenberController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsMenber;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [
    MenberController::class,
    'client',
    'first_section',
    'content_right',
    'header'
])->name('/');


Route::get('/show/{id}',[MenberController::class,'show'])->name('chi-tiet');

Route::get('login/menber', [MenberController::class, 'menber'])->middleware(IsMenber::class);



// ------------ADMIN--------------------------

Route::get('/admin', [AdminController::class, 'admin'])->middleware(IsAdmin::class)->name('dashboard');

$cruds = [
    'posts' => PostController::class,
    'categories' => CategoryController::class,

];

foreach ($cruds as $obj => $controller) {
    Route::resource($obj, $controller);
}


Route::get('auth/login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('auth/register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('auth/register', [AuthController::class, 'register']);


Route::get('/home', [AuthController::class, 'home']);

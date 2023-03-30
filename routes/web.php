<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Follower;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

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
// clochu
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeController::class)->name('home');

// -> name para el route
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


// editar cuenta
Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');
Route::post('/editar-perfil-email', [PerfilController::class, 'store_email'])->name('perfil.store.email');
Route::post('/editar-perfil-password', [PerfilController::class, 'store_password'])->name('perfil.store.password');
// routa asociada al modelo, ruta dinamica


Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/{user:username}/posts/{post:id}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post:id}', [PostController::class, 'destroy'])->name('posts.destroy');

// agregar comentarios
Route::post('/{user:username}/posts/{post:id}', [ComentarioController::class, 'store'])->name('comentarios.store');

// 
Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');
// Route::get('/muro', [PostController::class, 'index'])->name('posts.index');

// Like
Route::post('/posts/{post:id}/likes', [LikeController::class, 'store'])->name('posts.likes.store');
Route::delete('/posts/{post:id}/likes', [LikeController::class, 'destroy'])->name('posts.likes.destroy');

Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');

// {{route('{user:user_name}/editar')}}
// {{route('perfil.index')}}

Route::post('{user:username}/follow', [FollowerController::class, 'store'])->name('users.follow');
Route::delete('{user:username}/unfollow', [FollowerController::class, 'destroy'])->name('users.unfollow');

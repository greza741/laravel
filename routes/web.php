<?php

use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

// Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
// Route::post('/register', [RegisteredUserController::class, 'store']);

// Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
// Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



Route::get('/', function () {
    return view('home', [
        "title" => "Home Page"
    ]);
});

Route::get('/posts', function () {

    $post = Post::latest()->get();


    return view('posts', [
        "title" => "Blog Page",
        "posts" => $post
    ]);
});


Route::get('/posts/{post:slug}', function (Post $post) {


    return view('post', [
        "title" => "Detail Page",
        "post" => $post
    ]);
});

Route::get('/author/{user:username}', function (User $user) {

    return view('posts', [
        "title" => count($user->posts) . " Post By " . $user->name,
        "posts" => $user->posts
    ]);
});

Route::get('/category/{category:slug}', function (Category $category) {

    return view('posts', [
        "title" => count($category->posts) . " Blog Found in  " . $category->name,
        "posts" => $category->posts
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About Page"
    ]);
});


Route::get('/contact', function () {
    return view('contact', [
        "title" => "Contact Page"
    ]);
});

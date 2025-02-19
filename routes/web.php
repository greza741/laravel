<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', [
        "title" => "Home Page"
    ]);
});

Route::get('/posts', function () {
    return view('posts', [
        "title" => "Blog Page",
        "posts" => Post::all()
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

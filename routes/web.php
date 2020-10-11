<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', function () {
    return view('blogsite.index');
})->name('blogsite');

Route::get('/about', function () {
    return view('blogsite.about');
});
Route::get('/category', function () {
    return view('blogsite.category');
});
Route::get('/contact', function () {
    return view('blogsite.contact');
});
Route::get('/post', function () {
    return view('blogsite.single');
});

// Admin Routes 

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    Route::resource('category', 'CategoryController');
    Route::resource('tag', 'TagController');
    Route::resource('post', 'PostController');

});


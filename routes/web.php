<?php

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
    return view('main');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/employee')->group(function () {
    Route::get('/home', 'EmployeeAuth\LoginController@index')->name('employee.home');
    Route::get('/login', 'EmployeeAuth\LoginController@showLoginForm')->name('employee.login.form');
    Route::post('/login', 'EmployeeAuth\LoginController@Login')->name('employee.login');
    Route::get('/register', 'EmployeeAuth\RegisterController@showRegisterForm')->name('employee.register')->name('employee.register.form');
    Route::post('/register', 'EmployeeAuth\RegisterController@Register')->name('employee.register')->name('employee.register');
});

Route::prefix('/posts')->group(function () {
    Route::get('/', 'PostController@index')->name('posts');
    Route::get('/my', 'PostController@userPosts')->name('user.posts');
    Route::get('/create', 'PostController@create')->name('post.create');
    Route::post('/create', 'PostController@store')->name('post.store');
    Route::get('/{id}', 'PostController@show')->name('post');
    Route::get('/close/{id}', 'PostController@close')->name('post.close');
    Route::get('/delete/{id}', 'PostController@destroy')->name('post.destroy');
    Route::get('/chat/{id}', 'MessageController@index')->name('messages');
    Route::post('/chat/{id}', 'MessageController@store')->name('message.store');
});
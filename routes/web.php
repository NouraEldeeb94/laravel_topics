<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'users',
    'controller' => UserController::class,
    'as' => 'users.',
    'middleware' => ['auth', 'verified'],
], function () {

    Route::get('users', [UserController::class, 'index'])->middleware('auth', 'verified')->name('admin');
    Route::get('add_user', [UserController::class, 'create'])->middleware(['auth', 'verified'])->name('add');
    Route::get('edit_user/{id}', [UserController::class, 'edit'])->middleware(['auth', 'verified'])->name('edit');
    Route::put('update_user/{id}', [UserController::class, 'update'])->middleware(['auth', 'verified'])->name('update');
    Route::post('store_user', [UserController::class, 'store'])->middleware(['auth', 'verified'])->name('store');

});

Route::group([
    'prefix' => 'topics',
    'controller' => TopicController::class,
    'as' => 'topic.',
    'middleware' => ['auth', 'verified'],
], function () {

    Route::get('admin', 'index')->name('admin');
    Route::get('add', 'create')->name('add');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::put('update/{id}', 'update')->name('update');
    Route::get('delete/{id}', 'destroy')->name('destroy');
    Route::get('details/{id}', 'show')->name('show');
});


Route::group([
    'prefix' => 'categories',
    'controller' => CategoryController::class,
    'as' => 'category.',
    'middleware' => ['auth', 'verified'],
], function () {

    Route::get('admin', 'index')->name('admin');
    Route::get('add', 'create')->name('add');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::put('update/{id}', 'update')->name('update');
    Route::get('delete/{id}', 'destroy')->name('destroy');
});


Route::group([
    'prefix' => 'testimonials',
    'controller' => TestimonialController::class,
    'as' => 'testimonial.',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('admin', 'index')->name('admin');
    Route::get('add', 'create')->name('add');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::put('update/{id}', 'update')->name('update');
    Route::get('delete/{id}', 'destroy')->name('destroy');
   

});

Route::group([
    'prefix' => 'message',
    'controller' => ContactController::class,
    'as' => 'messages.',
    'middleware' => ['auth', 'verified'],
], function () {

    Route::get('admin', 'messages')->name('admin');
    Route::get('delete/{id}', 'destroy')->name('destroy');
    Route::get('read/{id}', 'show')->name('detail');

});
   Route::get('message/contact', [ContactController::class,'contact'])->name('messages.contact');
   Route::post('message/contact_us', [ContactController::class,'sendemail'])->name('messages.sendemail');


Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');



Route::group([
    'prefix' => 'index',
    'controller' => PublicController::class,
    'as' => 'index.',
], function () {
    Route::get('testimonials', 'show')->name('testimonial');
    Route::get('topic_list', 'topic_list')->name('topics-listing');
    Route::get('topic/{id}', 'topic_detail')->name('topics-detail');
    Route::get('public', 'index')->name('public');
    Route::get('error', 'errorpage')->name('error');

});

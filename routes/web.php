<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\website\contact\sliderContactController;
use App\Http\Controllers\website\Gallery\sliderGalleryController;
use App\Http\Controllers\website\home\sliderHomeController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Auth;
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

// define('PAGINATION_COUNT',10);
Auth::routes();

    Route::get('home', [WebsiteController::class , 'index'])->name('index');
    Route::get('category/{slug}' , [WebsiteController::class , 'category'])->name('category');
    Route::get('post/{slug}' , [WebsiteController::class , 'post'])->name('post');
    Route::get('page/{slug}' , [WebsiteController::class , 'page'])->name('page');
    Route::get('gallery' , [WebsiteController::class , 'gallery'])->name('gallery');
    Route::get('contact' , [WebsiteController::class , 'showContactForm'])->name('contact.show');
    Route::post('contact' , [WebsiteController::class , 'submitContactForm'])->name('contact.submit');


Route::group(['prefix' => 'admin' , 'middleware' => 'auth'], function() {
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::resource('slider-home', sliderHomeController::class);
    Route::resource('slider-contact', sliderContactController::class);
    Route::resource('slider-gallery', sliderGalleryController::class);
    Route::resource('categories' , CategoryController::class);
    Route::resource('posts' , PostController::class);
    Route::resource('pages' , PageController::class);
    Route::resource('galleries' , GalleryController::class);
    Route::get('profile', [profileController::class, 'index'])->name('profile');
});


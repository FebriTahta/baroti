<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCont;
use App\Http\Controllers\ProfileCont;
use App\Http\Controllers\UserCont;
use App\Http\Controllers\ContactCont;
use App\Http\Controllers\SliderCont;
use App\Http\Controllers\LandingCont;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TagController;

use App\Http\Controllers\AboutController;

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
    return view('fe.landing');
    // return view('fe.about');
});
Auth::routes();

Route::get('/about-us',[AboutController::class,'index'])->name('fe.about');
Route::get('/our-product',[ProductCont::class,'product'])->name('fe.product');
Route::get('/contact-us',[ContactCont::class,'contact'])->name('fe.contact');

// Route::get('/',[LandingCont::class,'landing'])->name('landing');
// Route::get('/daftar-product',[ProductCont::class,'index'])->name('list.product');

Route::group(['middleware' => ['auth', 'CheckRole:admin']], function () {
    //BE
    //PRODUCT
    Route::get('/admin-product',[ProductCont::class,'be_product'])->name('be.product');
    Route::post('/admin-product-post',[ProductCont::class,'be_product_post'])->name('be.product_post');
    Route::post('/admin-product-dell',[ProductCont::class,'be_product_dell'])->name('be.product_dell');
    Route::get('/admin-product-edit-page/{slug}',[ProductCont::class,'be_product_edit']);
    Route::get('/admin-product-post-page',[ProductCont::class,'be_product_post_page'])->name('be.product_post_page');
    //BE
    //SLIDER
    Route::get('/admin-slider',[SliderCont::class,'be_slider'])->name('be.slider');
    Route::post('/admin-slider-post',[SliderCont::class,'be_slider_post'])->name('be.slider_post');
    Route::post('/admin-slider-dell',[SliderCont::class,'be_slider_dell'])->name('be.slider_dell');
    //BE
    //KATEGORI
    Route::get('/admin-kategori',[KategoriController::class,'be_kategori'])->name('be.kategori');
    Route::post('/admin-kategori-post',[KategoriController::class,'be_kategori_post'])->name('be.kategori_post');
    Route::post('/admin-kategori-dell',[KategoriController::class,'be_kategori_dell'])->name('be.kategori_dell');
    //BE
    //TAG
    Route::get('/admin-tag',[TagController::class,'be_tag'])->name('be.tag');
    Route::post('/admin-tag-post',[TagController::class,'be_tag_post'])->name('be.tag_post');
    Route::post('/admin-tag-dell',[TagController::class,'be_tag_dell'])->name('be.tag_dell');
    //BE
    //PROFILE
    Route::get('/admin-profile',[ProfileCont::class,'be_profile'])->name('be.profile');
    Route::post('/admin-profile-post',[ProfileCont::class,'be_profile_post'])->name('be.profile_post');
    //BE
    //USER
    Route::post('/admin-user-update',[UserCont::class,'be_user_update'])->name('be.user_update');
    //BE
    //HOME
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


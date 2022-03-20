<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCont;
use App\Http\Controllers\ProfileCont;
use App\Http\Controllers\UserCont;
use App\Http\Controllers\ContactCont;
use App\Http\Controllers\SliderCont;
use App\Http\Controllers\LandingCont;
use App\Http\Controllers\TeamCont;
use App\Http\Controllers\BidangCont;
use App\Http\Controllers\BlogCont;
use App\Http\Controllers\ButtonCont;
use App\Http\Controllers\BahanCont;
use App\Http\Controllers\TestiCont;
use App\Http\Controllers\AjakanCont;
use App\Http\Controllers\PesanCont;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\JenisCont;
use App\Http\Controllers\KeunggulanCont;


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

// Route::get('/', function () {
//     return view('fe.landing');
//     // return view('fe.about');
// });
Route::get('/',[LandingCont::class,'landing']);
Auth::routes();

Route::get('/about-us',[AboutController::class,'index'])->name('fe.about');
Route::get('/our-product',[ProductCont::class,'product'])->name('fe.product');
Route::get('/contact-us',[ContactCont::class,'contact'])->name('fe.contact');
Route::get('/blog',[BlogCont::class,'blog'])->name('fe.blog');
Route::get('/blog/{slug}',[BlogCont::class,'blog_detail'])->name('fe.blog_detail');

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
    //TEAM
    Route::get('/admin-our-team',[TeamCont::class,'be_team'])->name('be.team');
    Route::post('/admin-our-team-post',[TeamCont::class,'be_team_post'])->name('be.team_post');
    Route::post('/admin-our-team-dell',[TeamCont::class,'be_team_dell'])->name('be.team_dell');
    //BE
    //ABOUT
    Route::get('/admin-about-us',[AboutController::class,'be_about'])->name('be.about');
    Route::post('/admin-about-us-post',[AboutController::class,'be_about_post'])->name('be.about_post');
    //BE
    //BIDANG
    Route::get('/admin-bidang',[BidangCont::class,'be_bidang'])->name('be.bidang');
    Route::post('/admin-bidang-post',[BidangCont::class,'be_bidang_post'])->name('be.bidang_post');
    //BE
    //KEUNGGULAN
    Route::get('/admin-keunggulan',[KeunggulanCont::class,'be_keunggulan'])->name('be.keunggulan');
    Route::post('/admin-keunggulan-post',[KeunggulanCont::class,'be_keunggulan_post'])->name('be.keunggulan_post');
    //BE
    //AJAKAN
    Route::get('/admin-ajakan',[AjakanCont::class,'be_ajakan'])->name('be.ajakan');
    Route::post('/admin-ajakan-post',[AjakanCont::class,'be_ajakan_post'])->name('be.ajakan_post');
    Route::post('/admin-linkbutton-post',[AjakanCont::class,'be_link_button_post'])->name('be.link_button_post');
    Route::post('/admin-linkbutton-dell',[AjakanCont::class,'be_link_button_dell'])->name('be.link_button_dell');
    //BE
    //CONTACT
    Route::get('/admin-contact',[ContactCont::class,'be_contact'])->name('be.contact');
    Route::post('/admin-contact-post',[ContactCont::class,'be_contact_post'])->name('be.contact_post');
    //BE
    //BLOG
    Route::get('/admin-blog',[BlogCont::class,'be_blog'])->name('be.blog');
    Route::post('/admin-blog-post',[BlogCont::class,'be_blog_post'])->name('be.blog_post');
    Route::get('/admin-blog-update/{slug_blog}',[BlogCont::class,'be_blog_update'])->name('be.blog_update');
    Route::post('/submit-komen',[BlogCont::class,'submit_komen'])->name('submit_komen');
    Route::get('/hapus-komen/{id_komen}',[BlogCont::class,'hapus_komen'])->name('hapus_komen');
    
    //BE
    //JENIS / KATEGORI BLOG
    Route::get('/admin-jenis-kategori',[JenisCont::class,'be_jenis'])->name('be.jenis');
    Route::post('/admin-jenis-kategori-post',[JenisCont::class,'be_jenis_post'])->name('be.jenis_post');
    Route::post('/admin-jenis-kategori-dell',[JenisCont::class,'be_jenis_dell'])->name('be.jenis_dell');
    //BE
    //BUTTON
    Route::get('/admin-daftar-link-button',[ButtonCont::class,'be_button'])->name('be.button');
    //BE
    //BAHAN
    Route::get('/admin-bahan-product',[BahanCont::class,'be_bahan'])->name('be.bahan');
    Route::post('/admin-bahan-product-post',[BahanCont::class,'be_bahan_post'])->name('be.bahan_post');
    Route::post('/admin-bahan-product-dell',[BahanCont::class,'be_bahan_dell'])->name('be.bahan_dell');
    //BE
    //TESTI
    Route::get('/admin-testimoni',[TestiCont::class,'be_testi'])->name('be.testi');
    Route::post('/admin-testimoni-post',[TestiCont::class,'be_testi_post'])->name('be.testi_post');
    Route::post('/admin-testimoni-dell',[TestiCont::class,'be_testi_dell'])->name('be.testi_dell');
    //BE
    //PESAN
    Route::post('/submit-pesan',[PesanCont::class,'submit_pesan'])->name('fe.submit_pesan');
    Route::get('/admin-pesan',[PesanCont::class,'be_pesan'])->name('be.pesan');
    Route::post('/admin-pesan-dell',[PesanCont::class,'be_pesan_dell'])->name('be.pesan_dell');
    //BE
    //TES
    Route::post('/tes',[AjakanCont::class,'tes']);









    //BE
    //HOME
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


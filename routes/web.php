<?php

use App\Http\Controllers\BlogCommentController;
use App\Http\Controllers\SiteController;
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

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/checkout/{membership}/{page}', [SiteController::class, 'membership_checkout'])->name('membership-checkout');
Route::post('/checkout/proceed', [SiteController::class, 'membership_checkout_proceed'])->name('membership-checkout-proceed');
Route::get('/checkout/save_payment', [SiteController::class, 'membership_save_payment'])->name('membership-save-payment');
Route::get('payment/status', [SiteController::class, 'payment_status'])->name('payment.status');

//about-us page route
Route::get('about-us', [SiteController::class, 'aboutUs'])->name('about-us');

//route for blogs
Route::get('/blogs', [SiteController::class, 'blogs'])->name('blogs');

//routes for page
Route::get('/{slug}', [SiteController::class, 'page'])->where('slug', '^(?!admin$)([a-zA-Z0-9-]+)')->name('page');

//routes for blog
Route::get('/blog/{slug}', [SiteController::class, 'blog'])->name('blog');

//contact form submit
Route::post('contact-us/save', [SiteController::class, 'saveContact'])->name('contact');

//comments route
Route::post('comments/add', [BlogCommentController::class, 'create'])->name('comments.add');
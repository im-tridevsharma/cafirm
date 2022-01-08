<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MembershipController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SiteConfigController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\BusinessCategoryController;
use Illuminate\Support\Facades\Route;

//admin panel routes goes here

Route::get('/', [AuthController::class, 'login'])->name('admin.login');
Route::post('/authenticate-admin', [AuthController::class, 'authenticateAdmin'])->name('admin.authenticate');
Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

//route to dashboard
Route::middleware('admin', 'prevent-back')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    /**routes for banner */
    Route::get('/banners/create', [BannerController::class, 'create'])->name('admin.banners.add');
    Route::get('/banners/all', [BannerController::class, 'index'])->name('admin.banners.all');
    Route::get('/banners/edit/{id}', [BannerController::class, 'edit'])->name('admin.banners.edit');
    Route::get('/banners/delete/{id}', [BannerController::class, 'destroy'])->name('admin.banners.delete');
    Route::post('/banners/save-banner', [BannerController::class, 'saveBanner'])->name('admin.banners.save');
    Route::post('/banners/update-banner/{id}', [BannerController::class, 'update'])->name('admin.banners.update');

    /**routes for category */
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.add');
    Route::get('/categories/all', [CategoryController::class, 'index'])->name('admin.categories.all');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::get('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.delete');
    Route::post('/categories/save-category', [CategoryController::class, 'save'])->name('admin.categories.save');
    Route::post('/categories/update-category/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');

    
    /**routes for BusinessCategory */
    Route::get('/business_categories/create', [BusinessCategoryController::class, 'create'])->name('admin.business_categories.add');
    Route::get('/business_categories/all', [BusinessCategoryController::class, 'index'])->name('admin.business_categories.all');
    Route::get('/business_categories/edit/{id}', [BusinessCategoryController::class, 'edit'])->name('admin.business_categories.edit');
    Route::get('/business_categories/delete/{id}', [BusinessCategoryController::class, 'destroy'])->name('admin.business_categories.delete');
    Route::post('/business_categories/save-business_category', [BusinessCategoryController::class, 'save'])->name('admin.business_categories.save');
    Route::post('/business_categories/update-business_category/{id}', [BusinessCategoryController::class, 'update'])->name('admin.business_categories.update');


    /**membership routes */
    Route::get('/memberships/create', [MembershipController::class, 'create'])->name('admin.memberships.add');
    Route::get('/memberships/all', [MembershipController::class, 'index'])->name('admin.memberships.all');
    Route::get('/memberships/edit/{id}', [MembershipController::class, 'edit'])->name('admin.memberships.edit');
    Route::get('/memberships/delete/{id}', [MembershipController::class, 'destroy'])->name('admin.memberships.delete');
    Route::post('/memberships/save-membership', [MembershipController::class, 'save'])->name('admin.memberships.save');
    Route::post('/memberships/update-membership/{id}', [MembershipController::class, 'update'])->name('admin.memberships.update');

    /**pages route */
    Route::get('/pages/create', [PageController::class, 'create'])->name('admin.pages.add');
    Route::get('/pages/all', [PageController::class, 'index'])->name('admin.pages.all');
    Route::get('/pages/edit/{id}', [PageController::class, 'edit'])->name('admin.pages.edit');
    Route::get('/pages/delete/{id}', [PageController::class, 'destroy'])->name('admin.pages.delete');
    Route::post('/pages/save-page', [PageController::class, 'save'])->name('admin.pages.save');
    Route::post('/pages/update-page/{id}', [PageController::class, 'update'])->name('admin.pages.update');

    /**blogs route */
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('admin.blogs.add');
    Route::get('/blogs/all', [BlogController::class, 'index'])->name('admin.blogs.all');
    Route::get('/blogs/edit/{id}', [BlogController::class, 'edit'])->name('admin.blogs.edit');
    Route::get('/blogs/comments/{id}', [BlogController::class, 'comments'])->name('admin.blogs.comments');
    Route::get('/blogs/delete/{id}', [BlogController::class, 'destroy'])->name('admin.blogs.delete');
    Route::post('/blogs/save-blog', [BlogController::class, 'save'])->name('admin.blogs.save');
    Route::post('/blogs/update-blog/{id}', [BlogController::class, 'update'])->name('admin.blogs.update');

    /**testimonials route */
    Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('admin.testimonials.add');
    Route::get('/testimonials/all', [TestimonialController::class, 'index'])->name('admin.testimonials.all');
    Route::get('/testimonials/edit/{id}', [TestimonialController::class, 'edit'])->name('admin.testimonials.edit');
    Route::get('/testimonials/delete/{id}', [TestimonialController::class, 'destroy'])->name('admin.testimonials.delete');
    Route::post('/testimonials/save-testimonial', [TestimonialController::class, 'save'])->name('admin.testimonials.save');
    Route::post('/testimonials/update-testimonial/{id}', [TestimonialController::class, 'update'])->name('admin.testimonials.update');


    /**teams route */
    Route::get('/teams/create', [TeamController::class, 'create'])->name('admin.teams.add');
    Route::get('/teams/all', [TeamController::class, 'index'])->name('admin.teams.all');
    Route::get('/teams/edit/{id}', [TeamController::class, 'edit'])->name('admin.teams.edit');
    Route::get('/teams/delete/{id}', [TeamController::class, 'destroy'])->name('admin.teams.delete');
    Route::post('/teams/save-team', [TeamController::class, 'save'])->name('admin.teams.save');
    Route::post('/teams/update-team/{id}', [TeamController::class, 'update'])->name('admin.teams.update');

    /**menus route */
    Route::get('/menus/create', [MenuController::class, 'create'])->name('admin.menus.add');
    Route::get('/menus/all', [MenuController::class, 'index'])->name('admin.menus.all');
    Route::get('/menus/edit/{id}', [MenuController::class, 'edit'])->name('admin.menus.edit');
    Route::get('/menus/delete/{id}', [MenuController::class, 'destroy'])->name('admin.menus.delete');
    Route::post('/menus/save-menu', [MenuController::class, 'save'])->name('admin.menus.save');
    Route::post('/menus/update-menu/{id}', [MenuController::class, 'update'])->name('admin.menus.update');

     /**reviews route */
     Route::get('/reviews/create', [ReviewController::class, 'create'])->name('admin.reviews.add');
     Route::get('/reviews/all', [ReviewController::class, 'index'])->name('admin.reviews.all');
     Route::get('/reviews/edit/{id}', [ReviewController::class, 'edit'])->name('admin.reviews.edit');
     Route::get('/reviews/delete/{id}', [ReviewController::class, 'destroy'])->name('admin.reviews.delete');
     Route::post('/reviews/save-review', [ReviewController::class, 'save'])->name('admin.reviews.save');
     Route::post('/reviews/update-review/{id}', [ReviewController::class, 'update'])->name('admin.reviews.update');

     /**membership bookigs */
     Route::get('/bookings', [AdminController::class, 'membership_bookings'])->name('admin.bookings');
     Route::get('/bookings/delete/{id}', [AdminController::class, 'membership_bookings_delete'])->name('admin.bookings.delete');
     Route::get('/bookings/view/{id}', [AdminController::class, 'membership_bookings_view'])->name('admin.bookings.view');

     /**settings route */
     Route::get('/settings/general', [SiteConfigController::class, 'general'])->name('admin.settings.general');
     Route::post('/settings/save-settings', [SiteConfigController::class, 'set_bulk'])->name('admin.settings.config-save');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontHomeController;
use App\Http\Middleware\TrackVisitor;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\ForgotPasswordController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\CacheController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\ServicesController;
use App\Http\Controllers\Frontend\SiteMapController;

Route::get('/', [FrontHomeController::class, 'home'])->name('home');
Route::get('about-us', [FrontHomeController::class, 'aboutUs'])->name('about-us');
Route::get('services', [FrontHomeController::class, 'servicesList'])->name('services');
Route::get('services/{slug}', [FrontHomeController::class, 'servicesDetails'])->name('services.details');
Route::get('blog', [FrontHomeController::class, 'blogList'])->name('blog');
Route::get('blog/{slug}', [FrontHomeController::class, 'blogDetails'])->name('blog.details');
Route::get('contact-us', [FrontHomeController::class, 'contactUs'])->name('contact-us');
Route::post('contact-us-submit', [FrontHomeController::class, 'contactSubmitForm'])->name('contact-us.submit');
Route::post('enquiry-submit', [FrontHomeController::class, 'EnquirySubmitForm'])->name('enquiry.submit');
Route::get('ajax-testimonial/{id}', [FrontHomeController::class, 'AjaxTestimonials'])->name('ajax.testimonial');
Route::get('faq', [FrontHomeController::class, 'faq'])->name('faq');
Route::get('/images/{folder}/{image}', [FrontHomeController::class, 'resizeImage']);
Route::get('/ajax/enquiry-form', [FrontHomeController::class, 'AjaxEnquiryForm'])->name('ajax.enquiry.form');
Route::get('/sitemap.xml', [SiteMapController::class, 'index'])->name('sitemap.xml');
Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm']);
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('forget/password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password');
    Route::post('forget.password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.submit');

    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/get-daily-visitors', [DashboardController::class, 'getDailyVisitors'])->name('get-daily-visitors');   
   
    Route::resource('manage-blog', BlogController::class)->names('manage-blog');
    Route::resource('manage-testimonials', TestimonialController::class)->names('manage-testimonials');
    Route::resource('manage-services', ServicesController::class)->names('manage-services');
    Route::post('/services/reorder', [ServicesController::class, 'reorder'])->name('services.reorder');
    Route::resource('manage-gallery', GalleryController::class)->names('manage-gallery');
    Route::get('/clear-cache', [CacheController::class, 'clearCache'])->name('clear-cache');
    Route::resource('pages', PageController::class);
    Route::resource('menus', MenuController::class);
    Route::get('menu/items/{menu}', [MenuController::class, 'displayMenuItem'])->name('menus.items');
    Route::post('menu/{menu}/item', [MenuController::class, 'storeItem'])->name('menu.item.store');
    
    Route::get('menu/{menu}/item/{item}/edit', [MenuController::class, 'editItem'])
    ->name('menu.item.edit');
    Route::put('menu/{menu}/item/{item}', [MenuController::class, 'updateItem'])->name('menu.item.update');
    Route::delete('menu/{menu}/item/{item}', [MenuController::class, 'destroyItem'])->name('menu.item.destroy');
    Route::post('menus/{menu}/items/order', [MenuController::class, 'orderItems'])->name('menus.items.order');
});

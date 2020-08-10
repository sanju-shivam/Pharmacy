<?php

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


Route::get('/', 'PagesController@index');
Route::get('state/{name}','PagesController@state');
Route::get('/States', 'PagesController@states');
Route::get('single_product_state/{slug}','PagesController@single_product_state_wise');

Route::get('/categories', 'PagesController@category');


Route::get('/career', 'PagesController@career');

Route::get('/company', 'PagesController@company');

Route::get('/contact', 'PagesController@contact');

Route::get('/faq', 'PagesController@faq');

Route::get('/logins', 'PagesController@login');

Route::get('/termsandcondition', 'PagesController@termsandcondition');

Route::resource('company', 'CompanyController');

Route::get('products/search', 'ProductsController@search')->name('products.search');

Route::get('inc/socials', 'Admin\SocialLinksController@socials')->name('inc.socials');



//Auth Routes

Auth::routes(['verify' => true]);

// Facebook Login
Route::get('login/facebook', 'Auth\LoginController@facebookRedirect')->name('redirect');

Route::get('/login/facebook/callback', 'Auth\LoginController@facebookCallback')->name('callback');

// Google Login
Route::get('login/google', 'Auth\LoginController@googleRedirect')->name('google.login');

Route::get('login/google/callback', 'Auth\LoginController@googleCallback')->name('google.callback');


// Suppiler Dashboard
Route::get('dashboard/', 'DashboardController@index')->name('dashboard');

Route::get('dashboard/banner', 'DashboardController@banner')->name('dashboard.banner');

Route::get('banners/', 'BannersController@index')->name('banners');

Route::get('dashboard/products', 'DashboardController@product')->name('dashboard.products');

Route::get('products/', 'ProductsController@index')->name('products');

Route::get('admin/', 'Admin\DashPagesController@adminIndex')->middleware('can:edit-blog')->name('admin');


// Admin Routes Only

// Route::get('admin/login', 'Admin\DashPagesController@adminLogin')->name('admin.login');

Route::namespace('Admin')
    ->prefix('admin')
    ->name('admin.')
    ->middleware('can:manage-users')
    ->group(function() {

    Route::resource('/users', 'UsersController', ['except' => ['create', 'store']]);

});

Route::prefix('admin')
    ->name('admin.')
    ->group(function() {

    Route::resource('/brands', 'BrandsController');
    Route::resource('/leads', 'LeadsController');

});

Route::resource('admin/team', 'Admin\TeamController');


Route::post('admin/products/import', 'ProductsController@import')
        ->name('admin.products.import');

Route::get('admin/products/export', 'ProductsController@export')
        ->name('admin.products.export');

Route::resource('admin/category', 'Admin\CategoryController');

Route::resource('blogs', 'Admin\BlogsController');

Route::get('admin', 'Admin\DashPagesController@adminIndex')->name('admin');

Route::get('admin/blogs', 'Admin\DashPagesController@adminBlogs')->name('blogs');

Route::get('admin/banners', 'Admin\DashPagesController@adminBanners')->name('banners');

Route::get('admin/pages', 'Admin\DashPagesController@adminPages')->name('pages');

Route::get('admin/products', 'Admin\DashPagesController@adminProducts')->name('admin.products');

Route::get('{page}', 'Admin\AdminPagesController@show')->name('show');

Route::get('admin/pages/{page}/edit', 'Admin\AdminPagesController@edit')->name('admin.pages.edit');

Route::put('admin/pages/update', 'Admin\AdminPagesController@update')->name('admin.pages.update');

Route::resource('pages', 'Admin\AdminPagesController');

Route::resource('banners', 'BannersController');

Route::resource('products', 'ProductsController');

Route::resource('admin/socials', 'Admin\SocialLinksController');






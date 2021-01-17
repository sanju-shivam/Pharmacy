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

Route::GET('/search', 'ProductsController@fetch')->name('sanju.shivam');




Route::get('login/facebook', 'Admin\SocialLinksController@redirectToProvider');
Route::get('login/facebook/callback', 'Admin\SocialLinksController@handleProviderCallback');
Route::get('product', 'PaymentController@razorpayProduct'); //NEW

Route::get('paysuccess', 'PaymentController@razorPaySuccess')->name('autocomplete.fetch'); //NEW
 
Route::get('razorthankyou', 'PaymentController@RazorThankYou'); //NEW

Route::get('/form/email', 'PagesController@leadStored')->name('lead.email');

Route::get('/', 'PagesController@index');
Route::get('state/{name}','PagesController@state')->name('satate.statename'); //NEW
Route::get('/states', 'PagesController@states')->name('states');// NEW
Route::get('/SelectBrands','BrandsController@brands_add_view_supplier');// NEW
Route::post('/save_brands','BrandsController@brands_store_supplier')->name('savebrands');// NEW
Route::get('/SelectedBrands','BrandsController@brands_view_supplier')->name('selected.brands');// NEW
// Route::post('/brands_update','BrandsController@brands_update_supplier');// NEW
Route::post('filter/','ProductsController@filter')->name('filter'); //NEW
Route::get('/lead-supplier','LeadsController@lead_supplier')->name('lead.Supplier');//NEW
Route::get('user/{id}/edit','Admin\AdminPagesController@edit_admin')->name('user.id.edit');// NEW
Route::post('admin/{id}','Admin\AdminPagesController@update_admin')->name('admin.id');// NEW
Route::get('/categories', 'PagesController@category')->name('categories');//NEW
Route::post('lead/store','LeadsController@store')->name('lead.store');//NEW
Route::resource('admin/subscription', 'Admin\SubscriptionController');//NEW
Route::get('admin/subscription/edit/{id}','Admin\SubscriptionController@edit');//NEW
Route::get('admin/subscription/delete/{id}','Admin\SubscriptionController@destroy');//NEW
Route::get('checkout','PagesController@checkout');//NEW
Route::post('admin/subscription/store','Admin\SubscriptionController@store');//NEW
Route::post('admin/subscription/update/{id}','Admin\SubscriptionController@update');//NEW
Route::get('Supplier/subscription','Admin\SubscriptionController@supplier_subscription');//NEW
Route::get('Supplier/subscription/Book/{id}','Admin\SubscriptionController@supplier_subscription_book');//NEW
Route::get('Supplier/subscription/Delete/{id}','Admin\SubscriptionController@supplier_subscription_delete');//NEW



Route::get('/career', 'PagesController@career')->name('career');

Route::get('/company', 'PagesController@company')->name('company');

Route::get('/contact', 'PagesController@contact')->name('contact');

Route::get('/faq', 'PagesController@faq')->name('faq');

Route::get('/logins', 'PagesController@login');// NEW
Route::get('/logout','PagesController@logout');// NEW

Route::get('/termsandcondition', 'PagesController@termsandcondition')->name('termsandcondition');

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

Route::get('/leads', 'LeadsController@lead_supplier')->name('leads.index');

Route::get('dashboard/', 'DashboardController@index')->name('dashboard');

Route::get('dashboard/banner', 'DashboardController@banner')->name('dashboard.banner');

Route::get('banners/', 'BannersController@index')->name('banners');

Route::get('dashboard/products', 'DashboardController@product')->name('dashboard.products');

Route::get('products/', 'ProductsController@index')->name('products');

Route::get('admin/', 'Admin\DashPagesController@adminIndex')->middleware('can:edit-blog')->name('admin');


// Admin Routes Only


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

Route::resource('admin/subscription', 'Admin\SubscriptionController');

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
Route::get('{location}/{slug}','PagesController@single_product_state_wise')->name('location.slug');// NEW






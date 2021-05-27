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

/*
 * ========================================================
 * Tropic: Store Front Router
 * Description: Start from here all front-end store routes.
 * ========================================================
 */

Route::namespace('Frontend')->group(function () {
    Route::get('/', 'HomeController@index')->name('front.home');
    Route::get('/shape-collections', 'ConfigureController@index')->name('front.collection');
    Route::get('/shape-collection-{id}/products', 'ConfigureController@show')->name('front.shop');
    Route::
        get('/product/{slug}/3d-configure-{id}/'.md5('/product/3d-configure'), 'HomeController@single')
        ->name('front.product');

    //Cart Routes
    Route::get('/cart', 'CartController@index')->name('front.cart.show');
    Route::post('/cart', 'CartController@store')->name('front.cart.store');
    Route::get('/cart-remove/{id}', 'CartController@destroy')->name('front.cart.remove');

    //Auth Required Checkout Routes
    Route::middleware(['auth', 'verified'])->group(function (){
        Route::get('/checkout', 'CheckoutController@index')->name('front.checkout.show');
        Route::post('/checkout', 'CheckoutController@store')->name('front.checkout.store');
        Route::get('order-confirmation/{id}/'.md5('order'), 'CheckoutController@show')->name('front.checkout.confirm');
    });
});

/*
 * ============================================================
 * Tropic: Customer Auth Router
 * Description: Start from here customer login/register routes.
 * ============================================================
 */

Auth::routes(['verify' => true]);

/*
 * ========================================================
 * Tropic: Customer Dashboard Router
 * Description: Start from here all customer dashboard routes.
 * ========================================================
 */
Route::prefix('customer')->middleware(['auth', 'verified'])->group(function (){
    Route::get('/dashboard', 'Frontend\CustomerController@index')->name('home');
    Route::get('/order/{id}', 'Frontend\CustomerController@show')->name('customer.order.single');
    Route::post('/address-update/{id}', 'Frontend\CustomerController@update')->name('customer.address.update');
    Route::post('/password/update', 'Frontend\CustomerController@passwordUpdate')->name('customer.password.update');
    Route::post('/update/{id}', 'Frontend\CustomerController@customerUpdate')->name('customer.update');
});


/*
 * ========================================================
 * Tropic: Admin Dashboard Router
 * Description: Start from here all admin dashboard routes.
 * ========================================================
 */

Route::prefix('admin')->group(function (){

    //Login Route
    Route::get('/', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login.form');
    Route::post('/login', 'Admin\Auth\LoginController@login')->name('admin.login');

    //Logout Route
    Route::get('/logout', 'Admin\DashboardController@logout')->name('admin.logout');

    //Rest Password Route
    Route::post('/password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Admin\Auth\ResetPasswordController@reset')->name('admin.password.update');
    Route::get('/password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');

    //Confirm Password
    Route::get('/password/confirm', 'Admin\Auth\ConfirmPasswordController@showConfirmForm')->name('admin.password.confirm');
    Route::post('/password/confirm', 'Admin\Auth\ConfirmPasswordController@confirm')->name('admin.password.confirm');

    Route::middleware(['auth:admin'])->namespace('Admin')->group(function (){
        Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
        //Category Routes
        Route::resource('/category', 'Inventory\CategoryController');
        Route::post('/all-category', 'Inventory\CategoryController@delete');
        Route::post('/category-update', 'Inventory\CategoryController@categoryUpdate')->name('admin.category.update');
        //Product Route
        Route::resource('/product', 'Inventory\ProductController');
        Route::post('/product-update/{id}', 'Inventory\ProductController@updateData')->name('product.update.data');
        Route::delete('/product/image/delete/{id}', 'Inventory\ProductController@remove')->name('product.remove.image');
        Route::get('/product/delete/{id}', 'Inventory\ProductController@destroy')->name('product.delete.data');

        //Collection Attribute Route
        Route::resource('/collections', 'Inventory\AttributeController');
        Route::post('/all-collections', 'Inventory\AttributeController@delete');
        Route::post('/collection-update', 'Inventory\AttributeController@updateData')->name('admin.collections.update');

        //Variant Routes
        Route::get('/collection/variations', 'Inventory\VariantController@index')->name('variant.index');
        Route::get('/collection/{id}/variations', 'Inventory\VariantController@edit')->name('variant.edit');
        Route::get('/collection/{id}/variation/{v_id}/edit', 'Inventory\VariantController@editData')->name('variant.edit.all');
        Route::post('/variant-update/{id}', 'Inventory\VariantController@updateData')->name('variant.update');
        Route::post('/variant/store', 'Inventory\VariantController@store')->name('variant.store');
        Route::post('/variant/update/all/{id}', 'Inventory\VariantController@updateAll')->name('variant.update.all');
        Route::delete('/photo/delete/v-{id}', 'Inventory\VariantController@imageDelete');
        Route::delete('/variant/{id}', 'Inventory\VariantController@destroy');

        //Order Routes List
        Route::get('/orders/create', 'Ecommerce\OrderController@create')->name('orders.create');
        Route::get('/orders/all', 'Ecommerce\OrderController@index')->name('orders.index.all');
        Route::get('/orders/{id}', 'Ecommerce\OrderController@show')->name('orders.show');
        Route::get('/orders/edit/{id}', 'Ecommerce\OrderController@edit')->name('order.edit');
        Route::get('/orders/hold/{id}', 'Ecommerce\OrderController@hold')->name('order.hold');
        Route::get('/orders/refund/{id}', 'Ecommerce\OrderController@refund')->name('order.refund');
        Route::get('/orders/invoice/{id}', 'Ecommerce\OrderController@invoice')->name('order.invoice');
        Route::get('/orders/delete/{id}', 'Ecommerce\OrderController@destroy')->name('order.delete');
        Route::get('/order/confirmation/{id}/'.md5('order'), 'Ecommerce\OrderController@showOrder')->name('order.confirm');

        //Photos Route
        Route::resource('/photos', 'Common\PhotoController');
    });
});

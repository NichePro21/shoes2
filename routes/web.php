<?php

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
use Illuminate\Support\Facades\Route;
//frontend
Route::get('/','HomeController@index');

Route::get('/product/{product_id}', 'ProductController@details_product');






//backend
//Employee

Route::get('/employee_login', 'EmployeeController@index');
Route::get('/staff-dashboard', 'EmployeeController@ShowStaff');
Route::get('/logout', 'EmployeeController@logout');
Route::post('/staff', 'EmployeeController@staffdashboard');



Route::get('/check-order-list', 'EmployeeController@checkOrderlist');
Route::get('/check-order-process', 'EmployeeController@checkOrderProcess');

//admin
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@ShowDashboard');
Route::get('/logout', 'AdminController@logout');
Route::post('/admin-dashboard', 'AdminController@dashboard');



//brand Products
Route::get('/add-brand', 'brandController@add_brand');
Route::get('/edit-brand/{brand_id}', 'brandController@edit_brand');
Route::get('/delete-brand/{brand_id}', 'brandController@delete_brand');
Route::get('/all-brand', 'brandController@all_brand');
Route::get('/unactive-brand/{brand_id}', 'brandController@unactive_brand');
Route::get('/active-brand/{brand_id}', 'brandController@active_brand');

Route::post('/save-brand', 'brandController@save_brand');
Route::post('/update-brand/{brand_id}', 'brandController@update_brand');
//CategoryDetail Products
Route::get('/add-categorydetail', 'CategoryDetail@add_category_detail_product');
Route::get('/edit-categorydetail/{category_id}', 'CategoryDetail@edit_category_detail_product');
Route::get('/delete-categorydetail/{category_id}', 'CategoryDetail@delete_category_detail_product');
Route::get('/all-categorydetail', 'CategoryDetail@all_category_detail_product');
Route::get('/unactive-categorydetail/{category_id}', 'CategoryDetail@unactive_category_detail');
Route::get('/active-categorydetail/{category_id}', 'CategoryDetail@active_category_detail');

Route::post('/save-categorydetail-product', 'CategoryDetail@save_category_detail_product');
Route::post('/update-categorydetail-product/{category_id}', 'CategoryDetail@update_category_detail_product');
//Category Products
Route::get('/add-category', 'CategoryProduct@add_category_product');
Route::get('/edit-category/{category_id}', 'CategoryProduct@edit_category_product');
Route::get('/delete-category/{category_id}', 'CategoryProduct@delete_category_product');
Route::get('/all-category', 'CategoryProduct@all_category_product');
Route::get('/unactive-category/{category_id}', 'CategoryProduct@unactive_category');
Route::get('/active-category/{category_id}', 'CategoryProduct@active_category');

Route::post('/save-category-product', 'CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_id}', 'CategoryProduct@update_category_product');

//Product

Route::get('/add-product', 'ProductController@add_product');
Route::get('/edit-product/{product_id}', 'ProductController@edit_product');
Route::get('/delete-product/{product_id}', 'ProductController@delete_product');
Route::get('/all-product', 'ProductController@all_product');
Route::get('/unactive-product/{product_id}', 'ProductController@unactive_product');
Route::get('/active-product/{product_id}', 'ProductController@active_product');

Route::post('/save-product', 'ProductController@save_product');
Route::post('/update-product/{product_id}', 'ProductController@update_product');

//Cart

Route::post('/save-cart', 'CartController@save_cart');
Route::get('/show-cart', 'CartController@show_cart');
Route::get('/delete-to-cart/{rowId}', 'CartController@delete_to_cart');
Route::post('/update-cart-quantity', 'CartController@update_cart_quantity');


//checkout

Route::get('/login-checkout','CheckoutController@login_checkout');
Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::post('/add_customer','CheckoutController@add_customer');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');
Route::get('/payment','CheckoutController@payment');
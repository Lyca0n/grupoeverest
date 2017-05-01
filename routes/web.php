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

Route::get('/','WelcomeController@index');
Route::get('/contact','WelcomeController@contact')->name('contact');

//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');


// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('inquiry/delete/{id}', 'HomeController@delete')->name('inquiry.delete');

Route::get('admin/property/type', 'Admin\PropertyController@index')->name('property.type.index');
Route::get('admin/property/type/create', 'Admin\PropertyController@create')->name('property.type.create');
Route::get('admin/property/type/edit/{id}', 'Admin\PropertyController@edit')->name('property.type.edit');
Route::post('admin/property/type/save', 'Admin\PropertyController@store')->name('property.type.save');
Route::post('admin/property/type/update/{id}', 'Admin\PropertyController@update')->name('property.type.update');
Route::get('admin/property/type/delete/{id}', 'Admin\PropertyController@delete')->name('property.type.delete');

Route::get('admin/listing/type', 'Admin\ListingTypeController@index')->name('listing.type.index');
Route::get('admin/listing/type/create', 'Admin\ListingTypeController@create')->name('listing.type.create');
Route::get('admin/listing/type/edit/{id}', 'Admin\ListingTypeController@edit')->name('listing.type.edit');
Route::post('admin/listing/type/save', 'Admin\ListingTypeController@store')->name('listing.type.save');
Route::post('admin/listing/type/update/{id}', 'Admin\ListingTypeController@update')->name('listing.type.update');
Route::get('admin/listing/type/delete/{id}', 'Admin\ListingTypeController@delete')->name('listing.type.delete');

Route::get('admin/listing', 'Admin\ListingController@index')->name('listing.index');
Route::get('admin/listing/create', 'Admin\ListingController@create')->name('listing.create');
Route::get('admin/listing/edit/{id}', 'Admin\ListingController@edit')->name('listing.edit');
Route::post('admin/listing/save', 'Admin\ListingController@store')->name('listing.save');
Route::post('admin/listing/update/{id}', 'Admin\ListingController@update')->name('listing.update');
Route::get('admin/listing/delete/{id}', 'Admin\ListingController@delete')->name('listing.delete');
Route::get('admin/listing/properties/{id}', 'Admin\ListingController@properties')->name('listing.properties');
Route::post('admin/listing/propertiesstore/{id}', 'Admin\ListingController@propertiesStore')->name('listing.properties.store');

Route::get('listing', 'ListingController@index')->name('customer.listing.index');
Route::get('listing/show/{id}', 'ListingController@show')->name('customer.listing.show');
Route::get('search/{ltype?}/{otype?}/{state?}/{city?}', 'ListingController@search')->name('customer.listing.search');
Route::post('inquiry/{id?}', 'ListingController@inquiry')->name('customer.listing.inquiry');


Route::get('pictures/{image}', function($image = null)
{
    $path = storage_path().'/app/pictures/' . $image;
    if (file_exists($path)) {
        return Response::download($path);
    }
});

Route::get('admin/operation/type', 'Admin\OperationTypeController@index')->name('operation.type.index');
Route::get('admin/operation/type/create', 'Admin\OperationTypeController@create')->name('operation.type.create');
Route::get('admin/operation/type/edit/{id}', 'Admin\OperationTypeController@edit')->name('operation.type.edit');
Route::post('admin/operation/type/save', 'Admin\OperationTypeController@store')->name('operation.type.save');
Route::post('admin/operation/type/update/{id}', 'Admin\OperationTypeController@update')->name('operation.type.update');
Route::get('admin/operation/type/delete/{id}', 'Admin\OperationTypeController@delete')->name('operation.type.delete');

Route::get('admin/state', 'Admin\StateController@index')->name('state.index');
Route::get('admin/state/create', 'Admin\StateController@create')->name('state.create');
Route::get('admin/state/edit/{id}', 'Admin\StateController@edit')->name('state.edit');
Route::post('admin/state/save', 'Admin\StateController@store')->name('state.save');
Route::post('admin/state/update/{id}', 'Admin\StateController@update')->name('state.update');
Route::get('admin/state/delete/{id}', 'Admin\StateController@delete')->name('state.delete');

Route::get('admin/city', 'Admin\CityController@index')->name('city.index');
Route::get('admin/city/create', 'Admin\CityController@create')->name('city.create');
Route::get('admin/city/edit/{id}', 'Admin\CityController@edit')->name('city.edit');
Route::post('admin/city/save', 'Admin\CityController@store')->name('city.save');
Route::post('admin/city/update/{id}', 'Admin\CityController@update')->name('city.update');
Route::get('admin/city/delete/{id}', 'Admin\CityController@delete')->name('city.delete');
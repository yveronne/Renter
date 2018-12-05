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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/buildings', 'BuildingController@index');
    Route::view('/buildings/create', 'buildings.createBuilding');
    Route::post('/buildings/create', 'BuildingController@store')->name('buildings.store');
    Route::get('/buildings/{building}', 'BuildingController@show')->name('buildings.show');
    Route::post('/buildings/{building}/update', 'BuildingController@update')->name('buildings.update');
    Route::get('/buildings/{building}/addapartment', 'BuildingController@addApartmentView');
    Route::post('/buildings/{building}/addapartment', 'BuildingController@addApartment');
    Route::post('/buildings/{building}/destroy', 'BuildingController@destroy')->name('buildings.destroy');

    Route::get('/apartments', 'ApartmentController@index')->name('apartments.index');
    Route::get('/apartments/{apartment}', 'ApartmentController@show')->name('apartments.show');
    Route::post('/apartments/{apartment}/update', 'ApartmentController@update')->name('apartments.update');
    Route::get('/apartments/{apartment}/addtenant', 'TenantController@addTenantView');
    Route::post('/apartments/{apartment}/addtenant', 'TenantController@addTenant');
    Route::post('/apartments/{apartment}/removetenant', 'ApartmentController@removeTenant')->name('apartments.removeTenant'); // todo Try with get method instead of post


    Route::get('/tenants', 'TenantController@index')->name('tenants.index');
    Route::get('/tenants/details/{tenant}', 'TenantController@show');
    Route::get('/tenants/insolvent', 'TenantController@indexInsolvent');

    Route::post('/tenants/details/{tenant}/addpayment', 'PaymentController@addPayment')->name('tenants.addPayment');
    });

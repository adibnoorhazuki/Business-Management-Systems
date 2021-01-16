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



//Thasvin's Client Sitge web
Route::get('/', function () {
    return view('auth/login');
});
//Thasvin's Client Sitge web end

//Thasvin's Admin's side web
// Route::get('/stats', function () {
//     return view('pages/stats');
// });

// Route::get('/maps', function () {
//     return view('pages/maps');
// });

// Route::get('/icons', function () {
//     return view('pages/icons');
// });

// Route::get('/notifications', function () {
//     return view('pages/notifications');
// });

// Route::get('/table', function () {
//     return view('pages/table');
// });

// Route::get('/typography', function () {
//     return view('pages/typography');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	/********************************ROUTES ADD & VIEW CUSTOMER*****************************/

	Route::post('/customerview','CustomerController@viewtable');
	Route::get('/customerview','CustomerController@index');
	Route::get('/customer','CustomerController@displayform' );
	Route::post('/addcustomer','CustomerController@save' );

	/********************************ROUTES ADD & VIEW CUSTOMER*****************************

	|---------------------------------------------------------------------------------------

	*******************************ROUTES EDIT CUSTOMER*************************************/

	Route::get('edit_customer/{cust_id}','CustomerController@edit_customer');
	Route::post('/updatecustomer/{cust_id}','CustomerController@update_customer');

	/********************************ROUTES EDIT CUSTOMER************************************

	|---------------------------------------------------------------------------------------

	/*********************************ROUTES ADD & VIEW INVENTORY****************************/

	Route::get('/inventory','InventoryController@displayinventory');
	Route::post('/addinventory','InventoryController@save');
	Route::get('/inventoryview','InventoryController@viewinventory');
	Route::get('/inventoryview','InventoryController@index');

	/*********************************ROUTES ADD & VIEW INVENTORY****************************

	|---------------------------------------------------------------------------------------

	/*********************************ROUTES EDIT INVENTORY**********************************/

	Route::get('edit_inventory/{item_id}','InventoryController@edit_inventory');
	Route::post('/updateinventory/{item_id}','InventoryController@update_inventory');

	/*********************************ROUTES EDIT INVENTORY**********************************

	|---------------------------------------------------------------------------------------

	*********************************ROUTES DELETE INVENTORY*********************************/

	Route::get('/delete_inventory/{item_id}','InventoryController@delete_inventory');


	/*********************************ROUTES DELETE INVENTORY********************************

	|---------------------------------------------------------------------------------------

	/*********************************ROUTES ADD SERVICE************************************/
	
	Route::get('/services','ServiceController@displayservice');
	Route::post('/add_service','ServiceController@save');
	Route::get('/services','ServiceController@select');
	
	/*********************************ROUTES ADD SERVICE************************************

	|---------------------------------------------------------------------------------------

	****************************************ROUTES EDIT SERVICE*****************************/

	Route::get('edit_service/{service_id}','ServiceController@edit_service');
	Route::post('/updateservice/{service_id}','ServiceController@update_service');


	/****************************************ROUTES EDIT SERVICE*****************************

	|---------------------------------------------------------------------------------------

	****************************************ROUTES VIEW SERVICE*****************************/

	Route::get('/viewservice','ServiceController@viewform');
	Route::get('/viewservice','ServiceController@index');
	Route::get('invoiceserv/{service_id}','ServiceController@invoice');
	Route::get('status/{service_id}','ServiceController@invoice');


	/*********************************ROUTES VIEW SERVICE***********************************

	|---------------------------------------------------------------------------------------

	*******************************************ROUTES ADD SALES*****************************/

	Route::get('/sales','SalesController@displaysales');
	Route::post('/add_sales','SalesController@save');
	Route::get('/sales','SalesController@select');
	

	/*********************************ROUTES ADD SALES**************************************

	|---------------------------------------------------------------------------------------

	*******************************************ROUTES VIEW SALES*****************************/

	Route::get('/viewsales','SalesController@viewform');
	Route::get('/viewsales','SalesController@index');

	/*********************************ROUTES VIEW SALES**************************************/



	Route::get('{page}', ['as' => 'page.index', 'uses' => 'CustomerController@customer']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'CustomerController@customerview']);
	
	
});


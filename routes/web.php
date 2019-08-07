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
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Route::get('/', 'PagesController@index');

//Route::resource('Posts', 'PostsController');


//Route::get('/home', 'HomeController@index')->name('home');

//Route::post('/index', 'HomeController@index');



Route::get('ThirdParty/request', 'ThirdPartyController@getRequests')->name('requests')->middleware('auth');
Route::get('ThirdParty/dashboard', 'ThirdPartyController@dashboard')->name('dashboard')->middleware('auth');
Route::get('ThirdParty/index', 'ThirdPartyController@index')->name('index')->middleware('auth');
Route::get('ThirdParty', 'ThirdPartyController@index')->middleware('auth');


//Route::resource('Client', 'ClientController');
Route::resource('ClientThirdParty', 'ClientThirdPartyController');
//Route::resource('ClientType', 'ClientTypeController');
//Route::resource('Product', 'ProductController');
//Route::resource('ThirdParty', 'ThirdPartyController');
Route::resource('ThirdPartyRating', 'ThirdPartyRatingController');
Route::resource('UserThirdParty', 'UserThirdPartyController');


//Route::get('ThirdParty/index', 'ThirdPartyController@index');
Route::get('ThirdParty/disconnectThirdParty/{userID}/{third_party_ID}/{platform_id}', 'ThirdPartyController@disconnectThirdParty');
Route::get('ThirdParty/connect', 'ThirdPartyController@connect')->middleware('auth');//TESTing Purposes
Route::get('ThirdParty/disconnectThirdParty/{userID}/{platform_id}/{third_party_ID}', 'ThirdPartyController@disconnectThirdParty');

Route::get('ThirdParty/listThirdPartyBy/{type}/{type_id}/{platform_id}', ['as' => 'listThirdPartyBy', 'uses' =>'ThirdPartyController@listThirdPartyBy'])->middleware('auth');
Route::get('ThirdParty/listThirdPartyBy/{type}/{platform_id_OR_orderType}', ['as' => 'listThirdPartyBy', 'uses' =>'ThirdPartyController@listThirdPartyBy'])->middleware('auth');
Route::get('ThirdParty/listThirdPartyBy/{type}', ['as' => 'listThirdPartyBy', 'uses' =>'ThirdPartyController@listThirdPartyBy'])->middleware('auth');

Route::get('ThirdParty/create', 'ThirdPartyController@create_interface')->name('create_interface')->middleware('auth');//TESTing Purposes
 

// Route::get('ThirdParty/create', function () {
//     return view('Third_party.create_interface');
// })->name('create_interface')->middleware('auth');

//return view('Third_party.create');


Route::get('ThirdParty/createAdmin', function () {
    return view('Third_party.createAdmin');
})->name('newAdmin')->middleware('auth');

// Route::get('ThirdParty/listThirdParty', function () {
//     return view('Third_party.listThirdParty', []);
// })->name('listThirdParty')->middleware('auth');

Route::post('ThirdParty/list_third_party', ['as' => 'ThirdParty.list_third_party', 'uses' =>'ThirdPartyController@list_third_party']);


Route::post('ThirdParty/connect_third_party', ['as' => 'ThirdParty.connect_third_party', 'uses' =>'ThirdPartyController@connect_third_party']);
Route::post('ThirdParty/createAdmin','ThirdPartyController@createAdmin')->name('addAdmin')->middleware('auth');

Route::post('ThirdParty/add_to_client', ['as' => 'ThirdParty.add_to_client', 'uses' => 'ThirdPartyController@add_to_client']);
Route::post('ThirdParty/delete_client_third_party', ['as' => 'ThirdParty.delete_client_third_party', 'uses' => 'ThirdPartyController@delete_client_third_party']);

Route::post('ThirdParty/create', ['as' => 'create', 'uses' => 'ThirdPartyController@create'])->middleware('auth');
Route::post('ThirdParty/register','ThirdPartyController@register');
Route::get('ThirdParty/delete/{x}','ThirdPartyController@delete')->name('delete')->middleware('auth');//tested
Route::get('ThirdParty/reject/{x}','ThirdPartyController@reject_third_party')->name('reject')->middleware('auth');//tested
Route::get('ThirdParty/accept/{x}','ThirdPartyController@accept_third_party')->name('accept')->middleware('auth');//tested
Route::get('ThirdParty/records','ThirdPartyController@getRecords')->name('records')->middleware('auth');//tested
Route::get('ThirdParty/restore_third_part/{x}','ThirdPartyController@restore_third_party')->name('restore')->middleware('auth');//tested
//Route::get('ThirdParty/delete/{id}','ThirdPartyController@delete');
Route::get('ThirdParty/search','ThirdPartyController@search')->name('search')->middleware('auth');//tested
Route::get('ThirdPartyRating/rate/{user_id}/{plat_id}/{third_party_id}/{rating}/{comment}','ThirdPartyRatingController@rate');//tested
Route::get('ThirdPartyRating/showRatings/{TPid}','ThirdPartyRatingController@showRatings');//tested

Route::get('ThirdParty/viewThirdParty/{x}', 'ThirdPartyController@viewThirdParty')->name('viewThirdParty')->middleware('auth');//tested
Route::post('ThirdParty/reorder/{x}', 'ThirdPartyController@reorder')->name('reorder')->middleware('auth');//tested
Route::post('ThirdParty/update/{x}', 'ThirdPartyController@update')->name('update')->middleware('auth');

Route::get('ThirdParty/update/{x}', 'ThirdPartyController@update_interface')->name('update_interface')->middleware('auth');//tested

// Route::get('ThirdParty/update/{x}', function () {
//     return view('Third_party.update')->with('id' , request()->all());
// })->name('update_interface');

// Route::get('ThirdParty/delete', function () {
//     return view('Third_party.delete')->with('id' , request()->all());
// });
Route::post('ThirdParty/show_user_subscriptions', 'ThirdPartyController@show_subscribed_third_parties');
Route::post('ThirdParty/show_user_avilable_subscriptions', 'ThirdPartyController@show_unsubscribed_third_parties');

Route::post('ThirdParty/requestPartnership', 'ThirdPartyController@requestPartnership');


Route::get('ThirdParty/token', 'ThirdPartyController@token');


Route::post('ThirdParty/ClientThirdParty/create', ['as' => 'ClientThirdParty.create', 'uses' => 'ClientThirdPartyController@create']);
Route::post('ThirdParty/ClientThirdParty/delete', ['as' => 'ClientThirdParty.delete', 'uses' => 'ClientThirdPartyController@delete']);
//Route::get('ThirdParty/dropboxToeken/{x}', ['as' => 'ThirdParty.dropboxToeken', 'uses' =>'ThirdPartyController@dropboxToeken']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('ClientThirdParty/create', ['as' => 'ClientThirdParty.create', 'uses' => 'ClientThirdPartyController@create']);
Route::post('ClientThirdParty/delete', ['as' => 'ClientThirdParty.delete', 'uses' => 'ClientThirdPartyController@delete']);
Route::post('ClientThirdParty/delete', 'ClientThirdPartyController@delete');
//Route::get('ThirdParty/dropboxToeken/{x}', ['as' => 'ThirdParty.dropboxToeken', 'uses' =>'ThirdPartyController@dropboxToeken']);

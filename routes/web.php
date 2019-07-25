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

Route::get('/', 'PagesController@index');

Route::resource('Posts', 'PostsController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');




Route::resource('Client', 'ClientController');
Route::resource('ClientThirdParty', 'ClientThirdPartyController');
Route::resource('ClientType', 'ClientTypeController');
//Route::resource('Product', 'ProductController');
//Route::resource('ThirdParty', 'ThirdPartyController');
Route::resource('ThirdPartyRating', 'ThirdPartyRatingController');
Route::resource('UserThirdParty', 'UserThirdPartyController');


Route::get('ThirdParty/index', 'ThirdPartyController@index');

Route::get('ThirdParty/listThirdPartyBy/{type}/{type_id}/{platform_id}', ['as' => 'ThirdParty.list_third_party', 'uses' =>'ThirdPartyController@listThirdPartyBy']);
Route::get('ThirdParty/listThirdPartyBy/{type}/{platform_id_OR_orderType}', ['as' => 'ThirdParty.list_third_party', 'uses' =>'ThirdPartyController@listThirdPartyBy']);
Route::get('ThirdParty/listThirdPartyBy/{type}', ['as' => 'ThirdParty.list_third_party', 'uses' =>'ThirdPartyController@listThirdPartyBy']);




Route::post('ThirdParty/list_third_party', ['as' => 'ThirdParty.list_third_party', 'uses' =>'ThirdPartyController@list_third_party']);


Route::post('ThirdParty/connect_third_party', ['as' => 'ThirdParty.connect_third_party', 'uses' =>'ThirdPartyController@connect_third_party']);


Route::post('ThirdParty/add_to_client', ['as' => 'ThirdParty.add_to_client', 'uses' => 'ThirdPartyController@add_to_client']);
Route::post('ThirdParty/delete_client_third_party', ['as' => 'ThirdParty.delete_client_third_party', 'uses' => 'ThirdPartyController@delete_client_third_party']);

Route::post('ThirdParty/create', ['as' => 'ThirdParty.create', 'uses' => 'ThirdPartyController@create']);
Route::post('ThirdParty/register','ThirdPartyController@register');
Route::post('ThirdParty/delete','ThirdPartyController@delete');
//Route::get('ThirdParty/delete/{id}','ThirdPartyController@delete');
Route::get('ThirdParty/search/{key}','ThirdPartyController@search');
Route::get('ThirdPartyRating/rate/{user_id}/{plat_id}/{third_party_id}/{rating}/{comment}','ThirdPartyRatingController@rate');
Route::get('/Third_party_rating/showRatings/{TPid}','ThirdPartyRatingController@showRatings');

Route::get('ThirdParty/viewThirdParty/{x}', 'ThirdPartyController@viewThirdParty');
Route::post('ThirdParty/reorder/{x}', 'ThirdPartyController@reorder');
Route::put('ThirdParty/update/{x}', 'ThirdPartyController@update');

Route::post('ThirdParty/show_user_subscriptions', 'ThirdPartyController@show_subscribed_third_parties');
Route::post('ThirdParty/show_user_avilable_subscriptions', 'ThirdPartyController@show_unsubscribed_third_parties');

Route::get('ThirdParty/token', 'ThirdPartyController@token');



Route::post('ThirdParty/ClientThirdParty/create', ['as' => 'ClientThirdParty.create', 'uses' => 'ClientThirdPartyController@create']);
Route::post('ThirdParty/ClientThirdParty/delete', ['as' => 'ClientThirdParty.delete', 'uses' => 'ClientThirdPartyController@delete']);
//Route::get('ThirdParty/dropboxToeken/{x}', ['as' => 'ThirdParty.dropboxToeken', 'uses' =>'ThirdPartyController@dropboxToeken']);

<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PresentationController@getIndex');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Api routes
Route::get('api/albums', 'APIController@getAlbums');
Route::post('api/contact', 'APIController@postContact');


// Create api to get albums data like in presentationjs loadAlbums!


// Admin routes...
Route::group(['namespace' => 'Admin'], function()
{
    // Controllers Within The "App\Http\Controllers\Admin" Namespace

    Route::get('admin', function()
    {
    	return redirect('admin/albums');
    });

    Route::get('admin/albums', 'AlbumsController@getIndex');

    Route::get('admin/albums/add', 'AlbumsController@getAdd');
    Route::post('admin/albums/add', 'AlbumsController@postAdd');

    Route::get('admin/albums/{id}/edit', 'AlbumsController@getEdit');
    Route::post('admin/albums/{id}/edit', 'AlbumsController@postEdit');

    Route::get('admin/albums/{id}/images', 'AlbumsController@getImages');

    Route::get('admin/albums/{id}/add-images', 'AlbumsController@getAddImages');
    Route::post('admin/albums/{id}/add-images', 'AlbumsController@postAddImages');

    Route::get('admin/albums/{id_album}/delete-image/{id_image}', 'AlbumsController@getDeleteImage');
    Route::get('admin/albums/{id_album}/delete', 'AlbumsController@getDeleteAlbum');
});

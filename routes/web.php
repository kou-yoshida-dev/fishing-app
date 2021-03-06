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

Route::get('/','MicropostsController@index');
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');



Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');








Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix'=>'users/{id}'], function(){
        Route::post('follow','UserFollowController@store')->name('user.follow');
        Route::delete('unfollow','UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings','UsersController@followings')->name('users.followings');
        Route::get('followers' ,'UsersController@followers')->name('users.followers');
        
        Route::get('favorites' ,'UsersController@favorite')->name('users.favorite');
        
    });
   
    Route::group(['prefix'=>'microposts/{id}'],function(){
        Route::post('favorite','FavoritesController@store')->name('micropost.fav');
        Route::delete('unfavorite','FavoritesController@destroy')->name('micropost.unfav');
    });
  
    
    
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
   
    Route::resource('microposts', 'MicropostsController', ['only' => ['store', 'destroy','update','edit']]);

    Route::get('search','MicropostsController@search')->name('microposts.search');
    Route::get('result','MicropostsController@result')->name('microposts.result');


    Route::get('map/{id}','MicropostsController@map')->name('microposts.map');
    
    
    
    
    
});
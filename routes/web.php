<?php

/*
|--------------------------------------------------------------------------
| Webルート
|--------------------------------------------------------------------------
|
| ここでアプリケーションのWebルートを登録できます。"web"ルートは
| ミドルウェアのグループの中へ、RouteServiceProviderによりロード
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('home', 'HomeController@index')->name('home');

});

//Route::get('login', 'Auth\LoginController@login');
//Route::post('login', 'Auth\LoginController@login');
//Route::get('logout', 'Auth\LoginController@logout');

//Route::get('auth/register', 'Auth\RegisterController@register');
//Route::post('auth/register', 'Auth\RegisterController@register');
Route::post('home', 'HomeController@post_home')->name('post_home');

Route::get('settings/account', 'MockController@account')->name('account');
Route::put('settings/account', 'MockController@updateAccount')->name('updateAccount');

Route::get('settings/profile', 'MockController@profile')->name('profile');
Route::put('settings/profile', 'MockController@updateProfile')->name('updateProfile');

//Route::get('search', 'MockController@search')->name('search');
Route::post('search', 'MockController@search')->name('search');

Route::get('{user}', 'MockController@user')->name('user');
Route::post('{user}', 'MockController@followed')->name('user_followed');

Route::get('{user}/following', 'MockController@following')->name('following');
Route::get('{user}/followers', 'MockController@followers')->name('followers');
//Route::get('{}/settings', 'MockController@profile');
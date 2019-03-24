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

Route::get('edit-article/{id}', 'ArticleController@edit');
Route::post('edit-article/{id}', 'ArticleController@update');
Route::get('/', 'HomeController@index')->name('home');
Route::get('my-articles', 'UserController@myarticles');
Route::get('categories', 'HomeController@categories');
Route::get('articles', 'HomeController@articles');
Route::get('about', 'HomeController@about');
Route::get('/search/{query}', 'ArticleController@search');
Route::get('last-hour', 'ArticleController@lastHour');
Route::get('today', 'ArticleController@today');
Route::get('month', 'ArticleController@month');
Route::get('year', 'ArticleController@year');
Route::get('top1', 'ArticleController@top1');
Route::get('top10', 'ArticleController@top10');
Route::get('top100', 'ArticleController@top100');
Route::get('top1000', 'ArticleController@top1000');
Route::get('topuser', 'ArticleController@topuser');
Route::get('top10users', 'ArticleController@top10users');
Route::get('top100users', 'ArticleController@top100users');
Route::get('top1000users', 'ArticleController@top1000users');
Route::get('science', 'ArticleController@science');
Route::get('technology', 'ArticleController@technology');
Route::get('engineer', 'ArticleController@engineer');
Route::get('mathematics', 'ArticleController@mathematics');
Route::get('contact', 'HomeController@contactindex');
Route::post('contact', 'HomeController@contact');
Route::get('/home', 'HomeController@index');
Route::get('/register', 'RegisterController@index');
Route::post('/register', 'RegisterController@store');
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@store');
Route::get('/logout', 'LoginController@destroy');
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
Route::get('edit-profile','HomeController@edit');
Route::post('edit-profile','UpdateController@update');
Route::get('profile','HomeController@profile');
Route::post('users','UserController@search');
Route::get('users','UserController@index');
Route::get('user','UserController@user_profile');
Route::get('add-article','ArticleController@index');
Route::post('add-article','ArticleController@store');
Route::post('add-article/floara','ImagesController@index');
Route::get('leaderboard', 'UserController@leaderboard');
Route::post('/{article}/reply', 'ArticleController@reply');
Route::post('/{article}/delete', 'ArticleController@delete');
Route::post('{article}/vote', 'ArticleController@vote');
Route::post('/{article}/comment', 'ArticleController@comment');
Route::get('/{article}', 'ArticleController@find');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset.token');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

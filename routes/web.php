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

Route::get('/', 'HomeController')->name('home');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::any('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//pages
Route::get('page/{id}-{title}','PageController')->where(['id'=>'\d+','title'=>'[\s\S]*'])
												->name('page.show');

//teams
Route::get('team/{id}-{title}','TeamController')->where(['id'=>'\d+','title'=>'[\s\S]*'])
    ->name('team.show');

//contactUs
Route::get('contactUs','ContactUsController@create')->name('contactUs.create');
Route::post('contactUs','ContactUsController@store')->name('contactUs.store');

//faq
Route::get('faq','FaqController')->name('faq.show');

//blog
Route::get('blog','BlogController@index')->name('blog.index');
Route::get('blog/{id}-{title}','BlogController@show')->where(['id'=>'\d+','title'=>'[\s\S]*'])->name('blog.show');

//blog comment
Route::post('blog/{id}/comment','CommentController')->name('comment.store');

//blog category
Route::get('blog/category/{id}-{title}','CategoryController@show')->where(['id'=>'\d+','title'=>'[\s\S]*'])->name('category.show');

//blog tag
Route::get('blog/tag/{id}-{title}','TagController@show')->where(['id'=>'\d+','title'=>'[\s\S]*'])->name('tag.show');

//service
Route::get('service','ServiceController@index')->name('service.index');
Route::get('service/{id}-{title}','ServiceController@show')->where(['id'=>'\d+','title'=>'[\s\S]*'])->name('service.show');

/**
 *
 * panel routes
 *
 **/

Route::any('panel/logout', 'Auth\LoginController@logout')->name('panel.logout');
Route::group(['prefix'=>'panel', 'namespace'=>'Panel', 'as'=>'panel.'],function() {

	Route::group(['middleware'=>['auth']],function() {
		Route::get('/','PanelController')->name('index');

		//profile
		Route::get('profile','ProfileController@edit')->name('profile.edit');
		Route::patch('profile','ProfileController@update')->name('profile.update');

		//menu
		Route::get('menu/modify','MenuController@modify')->name('menu.modify');
		Route::resource('menu','MenuController');

		//category
		Route::get('category/modify','CategoryController@modify')->name('category.modify');
		Route::resource('category','CategoryController');

		//blog
		Route::post('blog/note','BlogController@note')->name('blog.note');
		Route::resource('blog','BlogController');

		//page
		Route::resource('page','PageController');

		//team
		Route::resource('team','TeamController');

		//comment
		Route::get('comment/toggle/publish/{comment}','CommentController@togglePublish')->name('comment.toggle.publish');
		Route::resource('comment','CommentController');

		//tag
		Route::resource('tag','TagController');

		//faq
		Route::resource('faq','FaqController');

		//contactUs
		Route::resource('contactUs','ContactUsController');

		//customer
		Route::resource('customer','CustomerController');

		//service
		Route::resource('service','ServiceController');

		//slide
		Route::resource('slide','SlideController');

	});

});
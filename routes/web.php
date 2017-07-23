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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/read/{slug}', 'HomeController@readPost')->name('home.read');
Route::get('/category', 'HomeController@categories')->name('home.listcat');
Route::get('/category/{category}', 'HomeController@readPostByCategory')->name('home.category');

// User Inviation
Route::get('/daftar/{token}', 'HomeController@processRegistration')->name('invite.register');
Route::post('/daftar/{token}', 'HomeController@storeRegistration')->name('invite.store');

 // Authentication Routes...
Route::get('/masukjadiadmin', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/masukjadiadmin', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


// Admin Routes
Route::prefix('/adminfanclb')->group(function(){
	Route::get('/', 'AdminController@index')->name('admin.index');

	// Artikel
	Route::get('/artikel', 'AdminController@getArtikel')->name('admin.artikel');
	Route::get('/artikel/add', 'AdminController@createArtikel')->name('admin.artikel.add');
	Route::post('/artikel/add', 'AdminController@storeArtikel')->name('admin.artikel.store');
	Route::get('/artikel/edit/{id}', 'AdminController@editArtikel')->name('admin.artikel.edit');
	Route::post('/artikel/edit/{id}', 'AdminController@storeEditedArtikel')->name('admin.artikel.storeEdit');
	Route::get('/artikel/delete/{id}', 'AdminController@deleteArtikel')->name('admin.artikel.delete');
	Route::get('/artikel/terbitkan/{id}', 'AdminController@terbitkanArtikel')->name('admin.artikel.publish');

	// Kategori
	Route::get('/kategori', 'AdminController@getCategories')->name('admin.category');
	Route::get('/kategori/add', 'AdminController@createCategory')->name('admin.category.add');
	Route::post('/kategori/add', 'AdminController@storeCategory')->name('admin.category.storeAdd');
	Route::get('/kategori/edit/{id}', 'AdminController@editCategory')->name('admin.category.edit');
	Route::post('/kategori/edit/{id}', 'AdminController@storeEditedCategory')->name('admin.category.storeEdit');
	Route::get('/kategori/delete/{id}', 'AdminController@deleteCategory')->name('admin.category.delete');

	// Tag
	Route::get('/tags', 'AdminController@getTags')->name('admin.tag');
	Route::get('/tags/add', 'AdminController@createTag')->name('admin.tag.add');
	Route::post('/tags/add', 'AdminController@storeTag')->name('admin.tag.store');
	Route::get('/tags/edit/{id}', 'AdminController@editTag')->name('admin.tag.edit');
	Route::post('/tags/edit/{id}', 'AdminController@storeEditedTag')->name('admin.tag.storeEdit');
	Route::get('/tags/delete/{id}', 'AdminController@deleteTag')->name('admin.tag.delete');

	// Invite User
	Route::get('/invite', 'AdminController@getInviteList')->name('admin.invite');
	Route::get('/invite/add', 'AdminController@createInvite')->name('admin.invite.add');
	Route::post('/invite/add', 'AdminController@processInvite')->name('admin.invite.process');

	// User Profile
	Route::get('/profile', 'AdminController@profile')->name('admin.profil');
});

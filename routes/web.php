<?php


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

// chat admin
Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/riwayat/data', 'HomeController@getData');

Route::get('/pesan/{id_tiket}', 'TiketController@index')->name('pesan');
Route::get('/pesan/user/{id_tiket}', 'TiketController@user')->name('pesan.user');
Route::get('/pesan/detail/{id_tiket}', 'TiketController@detail')->name('pesan.detail');

Route::get('/riwayat_keluhan', 'HomeController@riwayat_keluhan')->name('riwayat_keluhan');
Route::get('/riwayat_detail', 'HomeController@riwayat_detail')->name('riwayat_detail');
Route::get('/user_chat', 'HomeController@user_chat')->name('user_chat');
Route::get('/ssd', 'HomeController@ssd')->name('ssd');
// Route::controller('users', 'UserController');
Route::get('/admin', 'AdminChatController@index')->name('admin.chat');
Route::get('/admin/admin_chat_head', 'AdminChatController@admin_chat_head');
Route::get('/admin/admin_chat_main/{status}', 'AdminChatController@admin_chat_main');
Route::get('/admin/antrian', 'AdminChatController@antrian')->name('antrian');
Route::get('/admin/pesan/{id_tiket}', 'AdminChatController@pesan');
Route::get('/admin/detail/{id_tiket}', 'AdminChatController@detail');

Route::get('/search', 'HomeController@search')->name('search');
// Route::get('/search', 'SearchController@search')->name('search');
// Route::get('/paginate', 'HomeController@paginate')->name('paginate');

//chat user
Route::get('/user/pesan', 'UserChatController@index')->name('user.pesan');
Route::get('/user/pesan/{id_tiket}', 'UserChatController@pesan')->name('user.isi.pesan');
Route::get('/user/riwayat', 'UserChatController@riwayat')->name('user.riwayat');
Route::get('/user/riwayat/detail/{id_tiket}', 'ViewChatController@riwayat_detail')->name('user.riwayat.detail');

// mengirim pesan
Route::post('/kirimPesan', 'PesanController@kirimPesan');

// SSD user
Route::get('/ssd', 'SSDController@index')->name('ssd');
Route::get('/ssd/search/{query}', 'SSDController@show')->name('ssd.search');

// SSD admin

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

Route::get('/home', 'HomeController@index')->name('home');

// chat admin
Route::get('/admin', 'AdminChatController@index')->middleware('admin')->name('admin.chat');
// content
Route::get('/admin/admin_chat_head', 'AdminChatController@admin_chat_head');
Route::get('/admin/admin_chat_main/{id_pengguna}', 'AdminChatController@admin_chat_main');
// searching
Route::post('/admin/pesan/search', 'AdminChatController@showSearch');
// subcontent
Route::get('/admin/pesan/home', 'AdminChatController@home')->name('home');
Route::get('/admin/pesan/melayani/{active}', 'AdminChatController@melayani');
Route::get('/admin/pesan/{id_tiket}', 'AdminChatController@pesan');
Route::get('/admin/pesan/update/{id_tiket}/{status}', 'AdminChatController@update');
Route::get('/admin/pesan/terima/{id_tiket}/{id_pengguna}', 'AdminChatController@pesanTerima');
Route::get('/admin/pesan/detail/{id_tiket}', 'AdminChatController@detail');
Route::get('/admin/pesan/akhiri/{id_tiket}', 'AdminChatController@akhiriPesan');


//chat user
Route::get('/user/pesan', 'UserChatController@index')->middleware('users')->name('user.pesan');
Route::get('/user/pesan/{id_tiket}', 'UserChatController@pesan')->name('user.isi.pesan');
Route::get('/user/pesan/akhiri/{id_tiket}', 'UserChatController@akhiri');
Route::get('/user/riwayat', 'UserChatController@riwayat')->name('user.riwayat');
Route::get('/user/riwayat/detail/{id_tiket}', 'UserChatController@detailRiwayat')->name('user.riwayat.detail');

// mengirim pesan
Route::post('/kirimPesan', 'PesanController@kirimPesan');

// notifikasi
Route::get('/notifikasi/{id_tiket}/{pesan}/{aksi}', 'NotifikasiController@index');

// SSD user
Route::get('/ssd', 'SSDController@index')->name('ssd');
Route::get('/ssd/kategori', 'SSDController@kategori')->name('ssd');
Route::get('/ssd/admin', 'SSDController@admin')->name('ssd');
Route::get('/ssd/form', 'SSDController@form')->name('ssd');
Route::post('/ssd/search', 'SSDController@show')->name('ssd.search');

// SSD admin
Route::post('/ssd/add/{id_ssd}', 'SSDController@create')->name('add.ssd');
Route::get('/ssd/delete/{id_ssd}', 'SSDController@destroy')->name('delete.ssd');
Route::get('/ssd/update_page/{id}', 'SSDController@edit')->name('edit.ssd');
Route::post('/ssd/update/{id}', 'SSDController@update')->name('update.ssd');
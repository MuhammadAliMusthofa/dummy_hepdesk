<?php


use App\Events\Message;
use App\Http\Controllers\Controller;
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

//chat user
Route::get('/user/pesan', 'ViewChatController@userChat')->name('user.chat');
Route::get('/user/riwayat', 'ViewChatController@riwayat')->name('user.riwayat');
Route::get('/user/riwayat/detail/{id_tiket}', 'ViewChatController@riwayat_detail')->name('user.riwayat.detail');

// chat admin
Route::get('/admin/pesan', 'ViewChatController@adminChat')->name('admin.chat');
Route::get('/admin/pesan/{id_tiket}', 'ViewChatController@adminChatUser')->name('admin.chat.user');
Route::get('/admin/pesan/detail/{id_tiket}', 'ViewChatController@adminChatDetail')->name('admin.chat.user.detail');

// SSD user
Route::get('/ssd', 'SSDController@index')->name('ssd');
Route::get('/ssd/search/{query}', 'SSDController@show')->name('ssd.search');

// SSD admin


Route::post('/send-message', function (Request $request) {
    event(
        new Message(
            $request->input('username'),
            $request->input('message')
        )
    );
});

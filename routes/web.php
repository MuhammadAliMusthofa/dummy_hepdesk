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
Route::get('/user/pesan', 'ViewChatController@user');
Route::get('/user/riwayat/{id_pengguna}', 'ViewChatController@riwayat');
Route::get('/user/riwayat/detail/{id_tiket}', 'ViewChatController@riwayat_detail');

// chat admin
Route::get('/admin/pesan', 'ViewChatController@admin');
Route::get('/admin/pesan/{id_tiket}', 'ViewChatController@admin_chat');
Route::get('/admin/pesan/detail/{id_tiket}', 'ViewChatController@admin_detail');

// SSD user
Route::get('/ssd', 'SSDController@index');
Route::get('/ssd/search/{query}', 'SSDController@show');

// SSD admin


Route::post('/send-message', function (Request $request) {
    event(
        new Message(
            $request->input('username'),
            $request->input('message')
        )
    );
});

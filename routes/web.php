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

Route::get('/search', 'HomeController@search')->name('search');
// Route::get('/search', 'SearchController@search')->name('search');
// Route::get('/paginate', 'HomeController@paginate')->name('paginate');

Route::post('/send-message', function (Request $request) {
    event(
        new Message(
            $request->input('username'),
            $request->input('message')
        )
    );
});

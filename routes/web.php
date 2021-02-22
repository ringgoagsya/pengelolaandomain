<?php

use App\Http\Controllers\Auth\RegisterController;
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
    return redirect()->route('login');
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admins', 'adminsController@home')->name('admins.home');;
Route::get('/pengelola','PengelolaController@home')->name('Pengelola.home');

Route::resource('user', 'UserController');
Route::get('dataTableUSer', 'UserController@dataTable')->name('dataTableUser');
Route::get('/pengelola/referensi','DomainController@referensi')->name('referensi');
//Route Pengelola

Route::get('/pengelola/index','PengelolaController@index')->name('pengelolaIndex');
Route::get('/pengelola/daftardomain','PengelolaController@daftardomain')->name('daftardomain');
Route::get('/pengelola/lihatdomain','PengelolaController@lihatdomain')->name('lihatdomain');
Route::get('/pengelola/detaildomain/{id}','DomainController@detaildomain')->name('detaildomain');
Route::get('/pengelola/profil','PengelolaController@profil')->name('profil');
Route::get('/pengelola/detailprofil','PengelolaController@detailprofil')->name('detailprofil');
Route::patch('/pengelola/detailprofil','PengelolaController@editprofil')->name('editprofil');
Route::post('/pengelola/index','PengelolaController@storepengajuan')->name('pengajuanstore');
Route::post('/pengelola/confirm/{id}', 'PengelolaController@confirm')->name('confirm');

//Route Admin
Route::get('/admins/daftardomain','adminsController@index')->name('indexadmins');
Route::get('/admins/referensi','DomainController@referensiadmin')->name('referensiadmin');
//Admin Aksi Pengajuan
Route::get('/admins/terima/{id}', 'adminsController@terima')->name('terima');
Route::post('/admins/tambahpesan/{id}', 'adminsController@tambahpesan')->name('tambahpesan');
Route::get('/admins/tolak/{id}', 'adminsController@tolak')->name('tolak');
Route::get('/admins/pengajuan/detail/{id}','PengajuanController@show')->name('detailpengajuan');
//Admin Aksi Domain
Route::get('/admins/adddomain/{id}','adminsController@create')->name('adddomain');
Route::post('/admins/adddomain/{id}','adminsController@store')->name('storedomain');
Route::get('admins/daftardomain/list','DomainController@index')->name('indexname');
Route::get('admins/daftardomain/list/{id}/edit','DomainController@edit')->name('editdomain');
Route::patch('admins/daftardomain/list/{id}/edit','DomainController@update')->name('updatedomain');
Route::delete('admins/daftardomain/list/{id}/delete','DomainController@destroy')->name('deletedomain');
//Admin Aksi Profil
Route::get('/admins/profil','adminsController@profiladmin')->name('profiladmin');



// Route By Ringgo

Route::get('/logina', function(){
    return view('login.login');
})->name('login');
Route::get('/login/daftar', function(){
    return view('login.daftar');
});
Route::get('/register','UnitController@create');
Route::post('/daftar','UnitController@store')->name('simpanpengelola');


Route::post('/masuk', 'loginController@login')->name('masuk');
Route::get('/keluar', 'loginController@logout')->name('keluar');


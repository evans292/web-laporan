<?php

use App\Report;
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

Route::resource('admin-page', 'AdminController', ['except' => ['show']]);
Route::get('/admin-page/{report:slug}', 'AdminController@show')->name('admin.show');

Route::get('/reports/myreports', 'ReportController@myReports')->name('myReports');
Route::resource('/reports', 'ReportController');
Route::get('/reports/{report:slug}', 'ReportController@show')->name('reports.show');

Route::resource('/comments', 'CommentController');

Route::get('/', function () {
    $count = Report::all()->count();
    return view('welcome', compact('count'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController')->middleware('role:admin')->name('dashboard');

Route::get('/reports', 'ReportController@index')->name('user.page');



Route::middleware('role:admin')->group(function () {
    Route::get('/eksport', 'PdfController@index')->name('eksport');
    Route::get('/eksport/preview', 'PdfController@preview');
    Route::post('/eksport/cetak_pdf', 'PdfController@cetak_pdf');
    Route::post('/eksport/cetak_pdf_show', 'PdfController@cetak_pdf_show');

    Route::get('/user', 'UserController@index')->name('user');
    Route::delete('/user/{user}/delete', 'UserController@destroy');
    Route::patch('/user/{user}/edit', 'UserController@update');
});

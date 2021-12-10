<?php

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

Route::middleware('role:admin')->group(function(){
    Route::resource('categories','CategoryController');
    
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/download-pdf', 'ExportController@downloadPDF')->name('downloadPdf');

Route::get("/pie", "ProductController@get_all_products_for_pie_chart")->name('piechart');

Route::get('/allProduct', 'ProductController@index')->name('allProductPage');

Route::get('/line-chart', 'ProductController@google_line_chart')->name('linechart');

Route::get('/download', 'ExportController@download')->name('download');

Route::get('/echart_bar', 'ExportController@showEchart');

Route::get('/google-map', 'ExportController@googleMap');

Route::get('/showProduct', 'ExcelCsvController@index');
Route::get('/export-excel', 'ExcelCsvController@exportExcel');
Route::get('/export-csv', 'ExcelCsvController@exportCsv');


Route::get('send-mail', function () {
    $details = [

        'title' => 'Mail from ItSolutionStuff.com',

        'body' => 'This is for testing email using smtp'

    ];

    \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\MyTestMail($details));

    dd("Email is Sent.");

});

Route::get('laravel-signature-pad','SignatureController@index');
Route::post('laravel-signature-pad','SignatureController@store');

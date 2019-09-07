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
Route::get('/', 'CKEditor@accessimage');

Route::get('/admin', function () {
    return view('ckeditor.admin');
});
//Image
Route::get('/ckeditor/image', 'CKEditor@lnk')->name('image');
Route::get('/ckeditor/footer', 'CKEditor@footer');
Route::get('/ckeditor/image/create', 'CKEditor@imgCreate')->name('imageCreate');
Route::post('/ckeditor/image/store', 'CKEditor@imgStore')->name('imageStore');
Route::get('/ckeditor/image/{images}', 'CKEditor@destroyImage');
Route::get('/ckeditor/edit/{images}', 'CKEditor@changeTitle');
Route::patch('/ckeditor/image/update/{images}', 'CKEditor@update')->name('update');
Route::get('/ckeditor/image/{id}/{move}', 'CKEditor@move')->name('move');
//Route::get('/ckeditor/image/{down}', 'CKEditor@downButton')->name('downButton');

//Footer
Route::get('/ckeditor/footer', 'CKEditor@createFooterTitle')->name('createFooterTitle');
Route::post('/ckeditor/footer/store', 'CKEditor@footStore')->name('footerStore');
Route::get('/ckeditor/alterFooter', 'CKEditor@alterFooter')->name('alterFoo');
Route::get('/ckeditor/editFooter/{footer}', 'CKEditor@editFooter');
Route::patch('/ckeditor/footer/update/{footer}', 'CKEditor@updateFooter')->name('updateFooter');
Route::get('/ckeditor/alterFooter/{footer}', 'CKEditor@destroyFooter');
